<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use App\Models\Product_Offers_Model;
use App\Models\ProductImages_Model;
use App\Models\Account_Verification;
use App\Models\Review_Reply_Model;
use App\Models\Sub_Category_Model;
use App\Models\Category_Model;
use App\Models\Enquiry_Model;
use App\Models\Products_Model;
use App\Models\Offers_Model;
use App\Models\Review;

class VendorController extends Controller
{
    
    // //Calling the dashborad
    public function vendorIndex(){
        return view('vendor.vendorDashboard');
    }

    //Display the vendor's profile form.
    public function editVendorProfile(Request $request): View
    {
        $user_id = $request->user()->id;
        $user_verify_data = Account_Verification::where('user_id',$user_id)->first();
        // dd($user_verify_data);
        return view('vendor.profile.edit', [
            'user'   => $request->user(),
            'v_data' => $user_verify_data,
        ]);
    }

    //Update vendor's profile information.
    public function updateVendorProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) { //check whether if the value of the email field has been modified or changed from its initial state.
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();
        return Redirect::route('vendorProfile.edit')->with('status', 'profile-updated');
    }

    //Update vendor's password.
    public function updateVendorPassword(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password'  => ['required', 'current_password'],
            'password'          => ['required', Password::defaults(), 'confirmed'],
        ]);
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
        return back()->with('status', 'password-updated');
    }
    
    //Stores or update vendor's verification details.
    public function verificationDataVendor(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'business_pan' => ['required', 'string', 'size:10', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/'],
            'aadhar' => ['required', 'string', 'size:12', 'regex:/^[0-9]{12}$/'],
            'gstin' => ['required', 'string', 'size:15', 'regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}[Z]{1}[0-9A-Z]{1}$/'],
        ]);

        $user_id = Auth::id();

        // Check if the user already has verification data
        $user_verify_data = Account_Verification::where('user_id', $user_id)->first();
        // dd($user_verify_data);
        if ($user_verify_data) {
            // Update the existing record
            $user_verify_data->business_pan = $validated['business_pan'];
            $user_verify_data->aadhar       = $validated['aadhar'];
            $user_verify_data->gstin        = $validated['gstin'];
            $user_verify_data->user_id      = $user_id;
            $user_verify_data->update();
        }else{

            $user_verify_data = new Account_Verification();
            $user_verify_data->business_pan = $validated['business_pan'];
            $user_verify_data->aadhar       = $validated['aadhar'];
            $user_verify_data->gstin        = $validated['gstin'];
            $user_verify_data->user_id      = $user_id;

            $user_verify_data->save();
        }

        

        return back()->with('status', 'verification-data-submitted');
    }

    //Delete vendor's account.
    public function destroyVendorProfile(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');
    }

    //Product Lisitng
    public function productListVendor()
    {
        $user       = Auth::user()->unique_id;
        $category   = Category_Model::all();
        $products   = Products_Model::with('category', 'sub_category', 'offers')->
                    where('user_id',$user)->get();

        return view('vendor.productList', compact('category', 'products'));
    }

    //Add Products
    public function addProductsVendor(Request $request)
    {
        $validated = $request->validate([
            'cat_id'                => 'required|exists:category,cat_id',
            'sub_cat_id'            => 'required|exists:sub_category,sub_cat_id',
            'product_name'          => 'required|string',
            'product_count'         => 'required|integer',
            'product_description'   => 'required|string',
            'product_price'         => 'required|numeric',
            'status'                => 'required|boolean',
            'offer_price'           => 'required|numeric',
            'offer_percentage'      => 'required|numeric',
            'choosed_image'         => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'new_product_images'    => 'nullable|array',
            'new_product_images.*'  => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('product_img')) {
            $image      = $request->file('product_img');
            $imageName  = time() . '_' . $image->getClientOriginalName(); 
            $image->move(public_path('img/uploads/products'), $imageName); 
            $imagePath  = 'img/uploads/products/' . $imageName; 
        }

        $user = Auth::user()->unique_id;

        $products = new Products_Model();
        $products->user_id      = $user;
        $products->cat_id       = $validated['cat_id'];
        $products->sub_cat_id   = $validated['sub_cat_id'];
        $products->prodct_name  = $validated['prodct_name'];
        $products->prodct_desc  = $validated['prodct_desc'];
        $products->prodct_count = $validated['prodct_count'];
        $products->price        = $validated['price'];
        $products->product_img  = $imagePath;
        $products->status       = $validated['status'];
        $products->save();

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    //Update Product status
    public function updateProductStatusVendor(Request $request)
    {
        $product = Products_Model::find($request->prodct_id);
        // dd($request->status);
        if ($product) {
            $product->status = $request->status;
            $product->save();
        }

        return redirect()->route('vendor.productList')->with('success', 'Product status updated successfully.');
    }

    //Delete product
    public function deleteProductVendor($id)
    {
        $product = Products_Model::find($id);

        if ($product) {
            $product->delete();
            return response()->json(['success' => true, 'message' => 'Product deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
    }

    //Update Product
    public function updateProductVendor(Request $request, $id)
    {
        $request->validate([
            'cat_id'        => 'required',
            'sub_cat_id'    => 'required',
            'prodct_name'   => 'required',
            'prodct_desc'   => 'required',
            'price'         => 'required|numeric',
            'status'        => 'required|boolean',
            'product_img'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Products_Model::findOrFail($id);

        $product->cat_id        = $request->cat_id;
        $product->sub_cat_id    = $request->sub_cat_id;
        $product->prodct_name   = $request->prodct_name;
        $product->prodct_desc   = $request->prodct_desc;
        $product->price         = $request->price;
        $product->status        = $request->status;

        if ($request->hasFile('product_img')) {
            $image = $request->file('product_img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->product_img = 'images/' . $imageName;
        }

        $product->save();

        return response()->json(['success' => 'Product updated successfully.']);
    }

    //Add Offers to Products
    public function addProductOfferVendor(Request $request)
    {
        $validated = $request->validate([
            'cat_id'            => 'required|exists:category,cat_id',
            'sub_cat_id'        => 'required|exists:sub_category,sub_cat_id',
            'prodct_id'         => 'required|integer',
            'price'             => 'required|numeric',
            'off_price'         => 'required|numeric',
            'off_percentage'    => 'required|numeric',
            'status'            => 'required|boolean',
        ]);

        $offer = Offers_Model::create([
            'cat_id'            => $validated['cat_id'],
            'sub_cat_id'        => $validated['sub_cat_id'],
            'prodct_id'         => $validated['prodct_id'],
            'off_price'         => $validated['off_price'],
            'off_percentage'    => $validated['off_percentage'],
            'status'            => $validated['status'],
        ]);

        $products_id = explode(',', $validated['prodct_id']);
        Products_Model::WhereIn('prodct_id', $products_id)->update(['off_id' => $offer->off_id]);

        return redirect()->back()->with('success', 'Offer applied Successfully..!');
    }

    //fetch subcategory
    public function addProductFetchSubcategory(Request $request)
    {
        $cat_id = $request->cat_id;
        $subcategories = Sub_Category_Model::where('cat_id', $cat_id)->get();

        if ($subcategories->isEmpty()) {
            return response()->json(['success' => false]);
        }

        return response()->json([
            'success' => true,
            'subcategories' => $subcategories,
        ]);
    }

    //get subcategories
    public function addOfferGetSubcategories($cat_id)
    {
        $subcategories = Sub_Category_Model::where('cat_id', $cat_id)->get();
        dd($subcategories);
        return response()->json($subcategories);
    }

    //Offer Lisitng
    public function offerListVendor()
    {
        $offers   = Product_Offers_Model::all();
        return view('vendor.offerList', compact('offers'));
    }

    //Add Offer
    public function addOffer(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'offer_code'            => 'required',
            'offer_name'            => 'required',
            'offer_description'     => 'required|string|max:255',
            'discount_type'         => 'required',
            'discount_value'        => 'required|integer',
            'start_date'            => 'required|date', 
            'end_date'              => 'required|date',
            'min_purchase_amount'   => 'required|numeric',
            'max_discount_amount'   => 'required|numeric',
            'applicable_to'         => 'required',
        ]);

        $offers = new Product_Offers_Model();
        $offers->offer_code         = $validated['offer_code'];
        $offers->offer_name         = $validated['offer_name'];
        $offers->offer_description  = $validated['offer_description'];
        $offers->discount_type      = $validated['discount_type'];
        $offers->discount_value     = $validated['discount_value'];
        $offers->start_date         = $validated['start_date'];
        $offers->end_date           = $validated['end_date'];;
        $offers->status             = '3';
        $offers->min_purchase_amount= $validated['min_purchase_amount'];
        $offers->max_discount_value = $validated['max_discount_amount'];
        $offers->applicable_to      = $validated['applicable_to'];
        $offers->save();

        return redirect()->back()->with('success', 'Offer Successfully Added.');
    }

    //Delete Offer
    public function deleteOffer($id)
    {
        $offer = Product_Offers_Model::find($id);
        if ($offer) {
            $offer->status = '5';
            $offer->save();
            return response()->json(['success' => true, 'message' => 'Offer deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Operation Failed!!'], 404);
    }

    //Update Offer
    public function updateOffer(Request $request, $id)
    {
        $request->validate([
            'offer_id'              => 'required',
            'offer_code'            => 'required',
            'offer_name'            => 'required',
            'offer_description'     => 'required|string|max:255',
            'discount_type'         => 'required',
            'discount_value'        => 'required|integer',
            'start_date'            => 'required|date',
            'end_date'              => 'required|date',
            'min_purchase_amount'   => 'required|numeric',
            'max_discount_value'    => 'required|numeric',
            'applicable_to'         => 'required',
        ]);

        $offers = Product_Offers_Model::findOrFail($id);

        $offers->offer_code         = $request['offer_code'];
        $offers->offer_name         = $request['offer_name'];
        $offers->offer_description  = $request['offer_description'];
        $offers->discount_type      = $request['discount_type'];
        $offers->discount_value     = $request['discount_value'];
        $offers->start_date         = $request['start_date'];
        $offers->end_date           = $request['end_date'];
        $offers->min_purchase_amount= $request['min_purchase_amount'];
        $offers->max_discount_value = $request['max_discount_amount'];
        $offers->applicable_to      = $request['applicable_to'];

        $offers->save();

        return response()->json(['success' => 'Offer updated successfully.']);
    }

    //Enquiry Lisitng
    public function enquiryListVendor()
    {
        $vendor_id=Auth::user()->id;
        $enquiries   = Enquiry_Model::where('vendor_id', $vendor_id)->get();
        return view('vendor.enquiryList', compact('enquiries'));
    }

    //Add Enquiry
    public function addEnquiry(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'enquiry_title'   => 'required',
            'enquiry_message' => 'required|string|max:255',
            
        ]);

        $vendor_id=Auth::user()->id;
        $enquiries = new Enquiry_Model();
        $enquiries->vendor_id        = $vendor_id;
        $enquiries->enquiry_title    = $validated['enquiry_title'];
        $enquiries->enquiry_message  = $validated['enquiry_message'];
        $enquiries->enquiry_status   = '1';
        
        $enquiries->save();

        return redirect()->back()->with('success', 'Enquiry Successfully Added.');
    }

    //Delete Enquiry
    public function deleteEnquiry($id)
    {
        $enquiry = Enquiry_Model::find($id);

        if ($enquiry) {
            $enquiry->delete();
            return response()->json(['success' => true, 'message' => 'Enquiry deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Enquiry not found.'], 404);
    }

    //Update Enquiry
    public function updateEnquiry(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'enquiry_title'     => 'required',
            'enquiry_message'   => 'required',
            
        ]);

        $enquiry = Enquiry_Model::findOrFail($id);

        $enquiry->enquiry_title     = $request['enquiry_title'];
        $enquiry->enquiry_message   = $request['enquiry_message'];

        $enquiry->save();

        return response()->json(['success' => 'Enquiry updated successfully.']);
    }
    
    //Close an Enquiry
    public function closeEnquiry($id)
    {
        $enquiry    = Enquiry_Model::find($id);
        
        if ($enquiry) {
            $enquiry->enquiry_status   = '3';
            $enquiry->save();
            return response()->json(['success' => true, 'message' => 'Enquiry closed successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Enquiry not found.'], 404);
    }
    
    //User ratings Lisitng
    public function ratingListVendor()
    {
        $reviews = Review::with(['user', 'product', 'reply'])->get();
        // return $reviews;
        return view('vendor.userReviewList', compact('reviews'));
    }

    //Store reply to reviews
    public function storeReply(Request $request, $reviewId)
    {
        $validated = $request->validate([
            'reply_text' => 'required|string|max:1000',
        ]);

        $vendor_id=Auth::user()->id;
        $reply = new Review_Reply_Model();

        $reply->review_id    = $reviewId;
        $reply->user_id    = $vendor_id;
        $reply->reply_text   = $validated['reply_text'];
        
        $reply->save();

        return response()->json(['success' => 'Reply added successfully.']);
    }

    //Update reply to reviews
    public function updateReply(Request $request, $replyId)
    {
        $request->validate([
            'reply_text' => 'required|string|max:1000',
        ]);

        $reply = Review_Reply_Model::findOrFail($replyId);
        $reply->update([
            'reply_text' => $request->reply_text,
        ]);

        return response()->json(['success' => 'Reply updated successfully.']);
    }
    
    //Category Requests Lisitng
    public function createCategoryRequest(): View
    {
        $user_id = Auth::id();
        $categories = Category_Model::where('user_id',$user_id)->get();
        return view('vendor.categoryRequest', compact('categories'));
    }

    //Store Category Requests
    public function storeCategoryRequestStore(Request $request)
    {
        $validated = $request->validate([
            'cat_name'  => 'required|string|max:255',
            'cat_desc'  => 'required|string',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $imageName  = time() . '_' . $image->getClientOriginalName(); 
            $image->move(public_path('img/uploads/categories'), $imageName); 
            $imagePath  = 'img/uploads/categories/' . $imageName; 
        }

        $user_id = Auth::id();

        $mail_id = "mary.nubicus@gmail.com" ; 
        $message="New category request";
        $to = "mary.nubicus@gmail.com" ;
        $subject = "Category request";
        $headers = 'From:mary.nubicus@gmail.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();
        $success = mail($to, $subject, $message, $headers);

        $category = new Category_Model();
        $category->cat_name = $validated['cat_name'];
        $category->cat_desc = $validated['cat_desc'];
        $category->user_id  = $user_id;
        $category->status   = '0';
        $category->cat_img  = $imagePath;
        $category->save();

        if($success)
        {
            return redirect()->back()->with('success', 'Category Request Submitted!');
        }
        else
        {
            return redirect()->back()->with('status','Please Try lalter.');
        }
        
    }
    
    //SubCategory Requests Lisitng
    public function createSubCategoryRequest()
    {
        $user_id = Auth::id();
        $category       = Category_Model::all();
        $subcategories  = Sub_Category_Model::with('category')->where('user_id',$user_id)->get();
        return view('vendor.subCategoryRequest', compact('subcategories','category'));
    }

    //Store SubCategory Requests
    public function storeSubCategoryRequestStore(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'cat_id'    => 'required|integer|exists:category,cat_id',
            'sub_name'  => 'required|string|max:255',
            'sub_desc'  => 'required|string',
        ]);

        $mail_id = "mary.nubicus@gmail.com" ; 
        $message="New Sub category request";
        $to = "mary.nubicus@gmail.com" ;
        $subject = "SubCategory request";
        $headers = 'From:mary.nubicus@gmail.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();
        $success = mail($to, $subject, $message, $headers);

        $user_id = Auth::id();
        $sub_category           = new Sub_Category_Model();
        $sub_category->cat_id   = $validated['cat_id'];
        $sub_category->sub_name = $validated['sub_name'];
        $sub_category->sub_desc = $validated['sub_desc'];
        $sub_category->status   = '0';
        $sub_category->user_id  = $user_id;
        $sub_category->save();

        if($success)
        {
            return redirect()->back()->with('success', 'SubCategory Request Submitted!');
        }
        else
        {
            return redirect()->back()->with('status','Please Try lalter.');
        }
        
    }
    
}
