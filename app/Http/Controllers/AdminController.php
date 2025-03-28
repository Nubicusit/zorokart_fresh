<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category_Model;
use App\Models\Sub_Category_Model;
use App\Models\ProductImages_Model;
use App\Models\Products_Model;
use App\Models\Offers_Model;
use App\Models\Banner_Images;
use App\Models\Enquiry_Model;

use Carbon\Carbon;

class AdminController extends Controller
{

    //Calling the dashboard
    public function adminIndex()
    {
        return view('admin.adminDashboard');
    }


    //Display the admin's profile form.
    public function editProfile(Request $request): View
    {
        return view('admin.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    //Update admin's profile information.
    public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) { //check whether if the value of the email field has been modified or changed from its initial state.
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();
        return Redirect::route('adminProfile.edit')->with('status', 'profile-updated');
    }

    //Update admin's password.
    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
        return back()->with('status', 'password-updated');
    }

    //Delete admin's account.
    public function destroyProfile(Request $request): RedirectResponse
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

    //Calling the category
    public function category()
    {
        //Calling category model to fetch datas.
        $categories = Category_Model::all();
        return view('admin.category', compact('categories'));
    }

    //Insertion function calling for category insertion
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'cat_name' => 'required|string|max:255',
            'cat_desc' => 'required|string',
            'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/uploads/categories'), $imageName);
            $imagePath = 'img/uploads/categories/' . $imageName;
        }

        $category = new Category_Model();
        $category->cat_name = $validated['cat_name'];
        $category->cat_desc = $validated['cat_desc'];
        $category->status = $validated['status'];
        $category->cat_img = $imagePath;
        $category->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    //Updation function for category
    public function update(Request $request, $id)
    {
        $category = Category_Model::findOrFail($id);
        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        $category->status = $request->status;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/uploads/categories'), $imageName);
            $category->cat_img = 'img/uploads/categories/' . $imageName;
        }

        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully!');
    }
    //delete category
    public function delete($id)
    {
        $category = Category_Model::findOrFail($id);
        if ($category->cat_img && file_exists(public_path($category->cat_img))) {
            unlink(public_path($category->cat_img));
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
    //update category status
    public function updateStatus(Request $request)
    {
        $request->validate([
            'cat_id' => 'required|exists:category,cat_id',
            'status' => 'required|in:0,1',
        ]);
        $category = Category_Model::find($request->cat_id);
        if ($category) {
            $category->status = $request->status == 1 ? 1 : 0;
            $category->save();
            return redirect()->back()->with('success', 'Category status updated successfully.');
        }
        return redirect()->back()->with('error', 'Category not found.');
    }

    //Calling the subcategory
    public function subcategory()
    {

        $category = Category_Model::all();
        $sub_category = Sub_Category_Model::all();
        return view('admin.subcategory', compact('category', 'sub_category'));
    }
    //inserting sub-category
    public function insert_sub(Request $request)
    {
        $validated = $request->validate([
            'cat_id' => 'required|integer|exists:category,cat_id',
            'sub_name' => 'required|string|max:255',
            'sub_desc' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $sub_category = new Sub_Category_Model();
        $sub_category->cat_id = $validated['cat_id'];
        $sub_category->sub_name = $validated['sub_name'];
        $sub_category->sub_desc = $validated['sub_desc'];
        $sub_category->status = $validated['status'];
        $sub_category->save();

        return redirect()->back()->with('success', 'Sub category added successfully!');
    }
    //update sub_category
    public function update_subcategory(Request $request, $id)
    {
        $subcategory = Sub_Category_Model::findOrFail($id);
        $subcategory->sub_name = $request->sub_name;
        $subcategory->sub_desc = $request->sub_desc;
        $subcategory->status = $request->status;
        $subcategory->save();

        return redirect()->back()->with('success', 'Sub Category updated successfully!');
    }
    //delete sub category
    public function delete_subcategory($id)
    {
        $category = Sub_Category_Model::findOrFail($id);

        $category->delete();

        return redirect()->back()->with('success', 'Sub Category deleted successfully!');
    }
    //Update sub category status
    public function updatesubCategoryStatus(Request $request)
    {
        $request->validate([
            'sub_cat_id' => 'required|exists:sub_category,sub_cat_id',
            'status' => 'required|in:0,1',
        ]);
        $sub_category = Sub_Category_Model::find($request->sub_cat_id);
        if ($sub_category) {
            $sub_category->status = $request->status == 1 ? 1 : 0;
            $sub_category->save();
            return redirect()->back()->with('success', 'Category status updated successfully.');
        }
        return redirect()->back()->with('error', 'Category not found.');
    }
    //Add offers by admin
    public function addoffer_by_admin()
    {
        $category = Category_Model::all();
        $sub_category = Sub_Category_Model::all();
        $offers = Offers_Model::with(['category', 'subCategory', 'products'])->get();
        ;
        return view('admin.addoffer', compact('category', 'sub_category', 'offers'));
    }
    //get subcategories
    public function getSubcategories($cat_id)
    {
        $subcategories = Sub_Category_Model::where('cat_id', $cat_id)->get();
        return response()->json($subcategories);
    }
    //get products
    public function getProducts($sub_cat_id)
    {
        $products = Products_Model::where('sub_cat_id', $sub_cat_id)->get();
        return response()->json($products);
    }
    //Insert offers by admin
    public function insert_offer_admin(Request $request)
    {
        $validated = $request->validate([
            'cat_id' => 'required|integer|exists:category,cat_id',
            'sub_cat_id' => 'required|integer|exists:sub_category,sub_cat_id',
            'prodct_id' => 'required|integer',
            'off_price' => 'required|integer',
            'off_percentage' => 'numeric',
            'status' => 'required|boolean',
        ]);
        $offer = new Offers_Model();
        $offer->cat_id = $validated['cat_id'];
        $offer->sub_cat_id = $validated['sub_cat_id'];
        $offer->prodct_id = $validated['prodct_id'];
        $offer->off_price = $validated['off_price'];
        $offer->off_percentage = $validated['off_percentage'];
        $offer->status = $validated['status'];
        $offer->save();

        return redirect()->back()->with('success', 'Offer added successfully..!');
    }
    //Update offers by admin
    public function update_offer_admin(Request $request, $id)
    {
        $request->validate([
            'off_price' => 'required|numeric|min:0',
            'off_percentage' => 'required|numeric|min:0|max:100',
            'status' => 'required|in:0,1',
        ]);

        $offer = Offers_Model::with(['category', 'subCategory', 'products'])->find($id);
        if (!$offer) {
            return redirect()->route('admin.addoffer')->with('error', 'Offer not found.');
        }
        $offer->off_price = $request->off_price;
        $offer->off_percentage = $request->off_percentage;
        $offer->status = $request->status;
        $offer->save();
        return redirect()->back()->with('success', 'Offer updated successfully!');
    }
    //delete offers by admin
    public function delete_offers_admin($id)
    {
        $offer = Offers_Model::findOrFail($id);
        $offer->delete();
        return redirect()->back()->with('success', 'Offers deleted successfully!');
    }
    //update status offer by admin
    public function update_status_offer(Request $request)
    {
        $request->validate([
            'off_id' => 'required|exists:offers,off_id',
            'status' => 'required|in:0,1',
        ]);
        $offer = Offers_Model::find($request->off_id);
        if ($offer) {
            $offer->status = $request->status == 1 ? 1 : 0;
            $offer->save();
            return redirect()->back()->with('success', 'Offer status updated successfully.');
        }
        return redirect()->back()->with('error', 'Offers not found.');
    }
    //Add prodct by admin
    public function addproduct_by_admin()
    {
        $category = Category_Model::all();
        $product = Products_Model::all();
        $products = Products_Model::with('category', 'sub_category', 'offers')->get();
        // $products = Products_Model::with('sub_category')->get();
        return view('admin.addproduct', compact('category', 'products', 'product'));
    }
    //fetch subcategory by admin for inserting
    public function fetch_subcategory_for_inserting_products(Request $request)
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
    //inerting products by admin.
    public function insert_products_admin(Request $request)
    {
        $validated = $request->validate([
            'cat_id' => 'required|exists:category,cat_id',
            'sub_cat_id' => 'required|exists:sub_category,sub_cat_id',
            'prodct_name' => 'required|string|max:255',
            'prodct_desc' => 'required|string',
            'prodct_count' => 'required|integer',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validate image
            'price' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('product_img')) {
            $image = $request->file('product_img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/uploads/products'), $imageName);
            $imagePath = 'img/uploads/products/' . $imageName;
        }

        $products = new Products_Model();
        $products->cat_id = $validated['cat_id'];
        $products->sub_cat_id = $validated['sub_cat_id'];
        $products->prodct_name = $validated['prodct_name'];
        $products->prodct_desc = $validated['prodct_desc'];
        $products->prodct_count = $validated['prodct_count'];
        $products->price = $validated['price'];
        $products->product_img = $imagePath;
        $products->status = $validated['status'];
        $products->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }
    //Add offers in porducts by admin
    public function add_offer_product(Request $request)
    {
        $validated = $request->validate([
            'cat_id' => 'required|exists:category,cat_id',
            'sub_cat_id' => 'required|exists:sub_category,sub_cat_id',
            'prodct_id' => 'required|integer',
            'price' => 'required|numeric',
            'off_price' => 'required|numeric',
            'off_percentage' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $offer = Offers_Model::create([
            'cat_id' => $validated['cat_id'],
            'sub_cat_id' => $validated['sub_cat_id'],
            'prodct_id' => $validated['prodct_id'],
            'off_price' => $validated['off_price'],
            'off_percentage' => $validated['off_percentage'],
            'status' => $validated['status'],
        ]);

        $products_id = explode(',', $validated['prodct_id']);
        Products_Model::WhereIn('prodct_id', $products_id)->update(['off_id' => $offer->off_id]);

        return redirect()->back()->with('success', 'Offer applied Successfully..!');
    }
    //Add additional images fro the products by admin
    public function uploadImages(Request $request, $productId)
    {
        $request->validate([
            'productImages.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $product = Products_Model::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        if (empty($product->unique_id)) {
            $uniqueId = uniqid('prod_' . $productId . '_', true);
            $product->unique_id = $uniqueId;
            $product->save();
        } else {
            $uniqueId = $product->unique_id;
        }
        if ($request->hasFile('productImages')) {
            foreach ($request->file('productImages') as $image) {
                $imageName = $uniqueId . '_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('img/uploads/products');

                if ($image->move($destinationPath, $imageName)) {
                    \Log::info("Image moved to: " . $destinationPath . '/' . $imageName);
                    $imagePath = 'img/uploads/products/' . $imageName;
                    $product->images()->create([
                        'image_path' => $imagePath,
                        'unique_id' => $uniqueId,
                    ]);
                    \Log::info("Image path saved to database: " . $imagePath);
                } else {
                    \Log::error("Failed to move the image");
                }
            }
        } else {
            \Log::error("No image file found");
        }
        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }
    //Update product status by admin 
    public function update_product_status(Request $request)
    {
        $request->validate([
            'prodct_id' => 'required|integer',
            'status' => 'required|in:0,1',
        ]);
        $product = Products_Model::find($request->prodct_id);
        if ($product) {
            $product->status = $request->status == 1 ? 1 : 0;
            $product->save();
            return redirect()->back()->with('success', 'Status updated successfully.');
        }
        return redirect()->back()->with('error', 'Offers not found.');
    }
    //Delete Products by Admin
    public function delete_products_by_admin($id)
    {
        $product = Products_Model::findOrFail($id);
        $product->images()->each(function ($image) {
            $imagePath = public_path($image->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        });
        $product->offers()->each(function ($offer) {
            $offer->delete();
        });
        $product->delete();
        return redirect()->back()->with('success', 'Product, its images, and offers deleted successfully!');
    }
    //getProductData
    public function getProductData($id)
    {
        $product = Products_Model::find($id);
        if ($product) {
            $category = Category_Model::find($product->cat_id);
            $subcategory = Sub_Category_Model::find($product->sub_cat_id);
            $offers = Offers_Model::find($product->off_id);
            $data = [
                'success' => true,
                'product' => [
                    'id' => $product->prodct_id,
                    'name' => $product->prodct_name,
                    'description' => $product->prodct_desc,
                    'price' => $product->price,
                    'category' => $category ? $category->cat_name : null,
                    'cat_id' => $category ? $category->cat_id : null,
                    'subcategory' => $subcategory ? $subcategory->sub_name : null,
                    'sub_cat_id' => $subcategory ? $subcategory->sub_cat_id : null,
                    'off_price' => $offers ? $offers->off_price : null,
                    'off_percentage' => $offers ? $offers->off_percentage : null,
                    'image_url' => asset($product->product_img),
                    'status' => $product->status,
                    'count' => $product->prodct_count
                ]
            ];
            return response()->json($data);
        }
        return response()->json(['success' => false, 'message' => 'Product not found']);
    }
    //get product images
    public function getProductImages($id)
    {
        try {
            $product = Products_Model::find($id);
            if (!$product) {
                return response()->json(['success' => false, 'message' => 'Product not found'], 404);
            }

            // Get all images with the same unique ID
            $productImages = ProductImages_Model::where('unique_id', $product->unique_id)->get();

            return response()->json([
                'success' => true,
                'images' => $productImages->map(function ($image) {
                    return ['img_id' => $image->img_id, 'image_path' => asset($image->image_path)];
                })
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    //update products category
    public function update_products_by_admin(Request $request, $productId)
    {
        // Validate the incoming data
        $validator = Validator::make($request->all(), [
            'cat_id' => 'required|required|exists:category,cat_id',
            'sub_cat_id' => 'required|required|exists:sub_category,sub_cat_id',
            'product_name' => 'required|string',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric',
            'status' => 'required|boolean',
            'offer_price' => 'required|numeric',
            'offer_percentage' => 'required|numeric',
            'choosed_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'new_product_images' => 'nullable|array',
            'new_product_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'u_productCount' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $product = Products_Model::findOrFail($productId);
        $offers = Offers_Model::updateOrCreate(
            // Check if the product already has an offer
            ['off_id' => $product->off_id],
            [
                'cat_id' => $request->cat_id,
                'sub_cat_id' => $request->sub_cat_id,
                'prodct_id' => $productId,
                'off_price' => $request->offer_price,
                'off_percentage' => $request->offer_percentage,
            ]
        );

        if ($product->off_id !== $offers->off_id) {
            $product->update(['off_id' => $offers->off_id]);
        }
        $product->update([
            'prodct_name' => $request->product_name,
            'prodct_desc' => $request->product_description,
            'price' => $request->product_price,
            'prodct_count' => $request->u_productCount,
            'status' => $request->status,
        ]);

        if (empty($product->unique_id)) {
            $uniqueId = uniqid('prod_' . $productId . '_', true);
            $product->unique_id = $uniqueId;
            $product->save();
        } else {
            $uniqueId = $product->unique_id;
        }

        if ($request->hasFile('new_product_images')) {
            $images = $request->file('new_product_images');

            foreach ($images as $image) {
                $destinationPath = public_path('img/uploads/products');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                $image->move($destinationPath, $filename);

                ProductImages_Model::create([
                    'unique_id' => $uniqueId,
                    'prodct_id' => $productId,
                    'image_path' => 'img/uploads/products/' . $filename,
                ]);
            }
        }

        if ($request->hasFile('choosed_image')) {
            $mainImage = $request->file('choosed_image');
            $destinationPath = public_path('img/uploads/products');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $filename = time() . '_' . uniqid() . '.' . $mainImage->getClientOriginalExtension();
            $mainImage->move($destinationPath, $filename);
            $product->update(['product_img' => 'img/uploads/products/' . $filename]);
        }

        return redirect()->route('admin.addproduct')->with('success', 'Product updated successfully!');
    }
    //All product list
    public function view_products()
    {
        $product = Products_Model::leftJoin('users', 'users.id', '=', 'products.id')
            ->select(
                'products.*',
                'users.name as user_name',
                'users.usertype as usertype',
                DB::raw("CASE WHEN products.id = 0 THEN 'Admin' ELSE users.name END as display_name"),
                DB::raw("CASE WHEN products.id = 0 THEN 'admin' ELSE users.usertype END as display_role")
            )
            ->paginate(10);
        $users = User::where('usertype', 'vendor')->get();
        $categories = Category_Model::all();
        $subcategories = Sub_Category_Model::all();
        return view('admin.view-products', compact('product', 'users', 'categories'));
    }
    //Update product status by admin 
    public function verify_products(Request $request)
    {
        $request->validate([
            'prodct_id' => 'required|integer',
            'status' => 'required|in:0,1',
        ]);
        $product = Products_Model::find($request->prodct_id);
        if ($product) {
            $product->status = $request->status == 1 ? 1 : 0;
            $product->save();
            return redirect()->back()->with('success', 'Status updated successfully.');
        }
        return redirect()->back()->with('error', 'Offers not found.');
    }
    //fetch subcategory by admin for inserting products for users
    public function product_adding_for_users(Request $request)
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
    //Insert products by admin for users
    public function insert_products_for_users(Request $request)
    {
        if ($request->method() !== 'POST') {
            return response()->json(['error' => 'Invalid request method'], 405);
        }

        $validator = Validator::make($request->all(), [
            $product = new Products_Model(),
            'id' => 'required|integer',
            'cat_id' => 'required|exists:category,cat_id',
            'sub_cat_id' => 'required|exists:sub_category,sub_cat_id',
            'productName' => 'required|string',
            'productPrice' => 'required|numeric',
            'productCount' => 'required|integer',
            'productDescription' => 'required|string',
            'mainImage' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'unique_id' => 'nullable|string',
            'productImages' => 'nullable|array',
            'productImages*.' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            // 'off_id' => 'nullable|integer',
            'offerPrice' => 'nullable|numeric',
            'offerPercentage' => 'nullable|numeric',
        ]);
        //dd($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $mainImage = null;
        if ($request->hasFile('mainImage')) {
            $mainImage = $request->file('mainImage');
            $filename = time() . '_' . uniqid() . '.' . $mainImage->getClientOriginalExtension();
            $mainImage->move(public_path('img/uploads/products'), $filename);
            $mainImagePath = 'img/uploads/products/' . $filename;
        }

        $status_id = 1;
        $product = Products_Model::create([
            'id' => $request->id,
            'cat_id' => $request->cat_id,
            'sub_cat_id' => $request->sub_cat_id,
            'prodct_name' => $request->productName,
            'prodct_desc' => $request->productDescription,
            'price' => $request->productPrice,
            'prodct_count' => $request->productCount,
            'status' => $status_id,
            'product_img' => $mainImagePath,
            'off_id' => null,
        ]);

        if ($request->offerPrice || $request->offerPercentage) {
            $offer = Offers_Model::create([
                'prodct_id' => $request->id,
                'cat_id' => $request->cat_id,
                'sub_cat_id' => $request->sub_cat_id,
                'off_price' => $request->offerPrice,
                'off_percentage' => $request->offerPercentage,
            ]);

            // ✅ Step 3: Update Product with the Generated `off_id`
            $product->update(['off_id' => $offer->off_id]);
        }
        if ($request->hasFile('productImages')) {
            $productImages = $request->file('productImages');
            if (!is_array($productImages)) {
                $productImages = [$productImages];
            }

            $uniqueId = uniqid('prod_' . $product->id . '_', true);

            foreach ($productImages as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('img/uploads/products'), $filename);

                ProductImages_Model::create([
                    'unique_id' => $uniqueId,
                    'prodct_id' => $product->id,
                    'image_path' => 'img/uploads/products/' . $filename,
                ]);
            }
        }
        return redirect()->route('viewproducts.insert')->with('success', 'Product inserted successfully!');
    }

    // Master section:

    //banner view home page
    public function banner_view()
    {
        $banner = Banner_Images::all();
        return view('admin.banner', compact('banner'));
    }
    //add banner
    public function add_banner(Request $request)
    {
        $request->validate([
            'b_images' => 'required|array',
            'b_images*.' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        //dd($request->all());
        if ($request->hasFile('b_images')) {
            $b_images = $request->file('b_images');
            if (!is_array($b_images)) {
                $b_images = [$b_images];
            }
            foreach ($b_images as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('img/uploads/banner'), $filename);
                // dd($image);
                Banner_Images::create([
                    'b_images' => 'img/uploads/banner/' . $filename,
                ]);
            }
        }
        // return redirect()->route('banner.insert')->with('success', 'Banner inserted successfully!');
        return back()->with('success', 'Banner inserted successfully!');
    }
    //status
    public function banner_status(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'status' => 'required|in:0,1',
        ]);
        $banner = Banner_Images::find($request->id);
        if ($banner) {
            $banner->status = $request->status == 1 ? 1 : 0;
            $banner->save();
            return redirect()->back()->with('success', 'Status updated successfully.');
        }
        return redirect()->back()->with('error', 'banner not found.');
    }
    //view vendor verification
    public function view_vendor_verification()
    {
        $users = User::where('usertype', 'vendor')->paginate(10);
        return view('admin.vendor_verification', compact('users'));
    }
    //status
    public function v_verification_status(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'flag' => 'required|in:0,1',
        ]);
        $flag = User::find($request->id);
        if ($flag) {
            $flag->flag = $request->flag == 1 ? 1 : 0;
            $flag->save();
            return redirect()->back()->with('success', 'Status updated successfully.');
        }
        return redirect()->back()->with('error', 'Vendor not found.');
    }

    //Enquiry from Vendors: Listing
    public function enquiryList()
    {
        $enquiries = Enquiry_Model::whereIn('enquiry_status', ['1', '2'])->get();
        return view('admin.enquiry-list', compact('enquiries'));
    }

    //Enquiry : Multiple delete
    public function deleteMultiple(Request $request)
    {
        try {
            $request->validate([
                'enquiry_ids' => 'required|array',
                'enquiry_ids.*' => 'exists:enquiries,enquiry_id'
            ]);

            Enquiry_Model::whereIn('enquiry_id', $request->enquiry_ids)->delete();

            return response()->json(['success' => true, 'message' => 'Selected enquiries deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    //Update Enquiry
    public function respondToEnquiry(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'response_message' => 'required',

        ]);

        $enquiry = Enquiry_Model::findOrFail($id);

        $enquiry->response_message = $request['response_message'];
        $enquiry->enquiry_status = '2';
        $enquiry->response_date = Carbon::now();
        $enquiry->save();

        return response()->json(['success' => 'Response added successfully.']);
    }

    //Category Requests from Vendors: Listing
    public function categoryRequests()
    {
        $cat_requests = Category_Model::where('user_id', '!=', '0')->get();
        // return $cat_requests;
        return view('admin.category-request', compact('cat_requests'));
    }

    //Approve category request
    public function categoryRequestsApprove(Request $request)
    {
        $request->validate([
            'cat_id' => 'required|exists:category,cat_id',
            'status' => 'required|in:0,1',
        ]);
        $category = Category_Model::find($request->cat_id);
        if ($category) {
            $category->status = $request->status == 1 ? 1 : 0;
            $category->save();
            $message = $request->status == 1 ? 'Category Approved.' : 'Category Rejected.';

            return redirect()->back()->with('success', $message);
        }
        return redirect()->back()->with('error', 'Category not found.');
    }

    //SubCategory Requests from Vendors: Listing
    public function subCategoryRequests()
    {
        $subcat_requests = Sub_Category_Model::where('user_id', '!=', '0')->get();
        // return $subcat_requests;
        return view('admin.subcategory-request', compact('subcat_requests'));
    }

    //Approve subcategory request
    public function subCategoryRequestsApprove(Request $request)
    {
        $request->validate([
            'sub_cat_id' => 'required|exists:sub_category,sub_cat_id',
            'status' => 'required|in:0,1',
        ]);
        $subcategory = Sub_Category_Model::find($request->sub_cat_id);
        if ($subcategory) {
            $subcategory->status = $request->status == 1 ? 1 : 0;
            $subcategory->save();
            $message = $request->status == 1 ? 'Sub Category Approved.' : 'Sub Category Rejected.';

            return redirect()->back()->with('success', $message);
        }
        return redirect()->back()->with('error', 'Category not found.');
    }
}
