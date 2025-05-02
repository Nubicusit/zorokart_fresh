<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\siteController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});
Route::get('/category', [siteController::class, 'cat'])->name('products.category');
Route::get('/products', [siteController::class, 'products'])->name('products');
Route::get('/products/{id}', [siteController::class, 'productDetails'])->name('products.viewProduct');
Route::get('/cart', [siteController::class, 'productCart'])->name('products.cart');
Route::get('/wishlist', [siteController::class, 'productWishlist'])->name('products.wishlist');
Route::get('/profilee', [siteController::class, 'profile'])->name('products.profile');
Route::get('/order',[siteController::class,'orders'])->name('products.orders');
Route::get('/coupon', [siteController::class, 'coupon'])->name('products.coupon');

//==================================Policy=============================================//
Route::get('/privacy-policy', [siteController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms-and-conditions', [siteController::class, 'termsAndConditions'])->name('terms.conditions');
Route::get('/shipping-delivery',[siteController::class,'shippingDelivery'])->name('privacy.shippingDelivery');
Route::get('/cancellation-refund',[siteController::class,'cancellationRefund'])->name('privacy.cancellationRefund');

//==================================About=============================================//
Route::get('/about-us', [siteController::class, 'aboutUs'])->name('aboutus');

//==================================Contact Us=============================================//
Route::get('/contact-us', [siteController::class, 'contactUs'])->name('contactus');

Route::get('admin/dashboard',[HomeController::class,'adminIndex'])->middleware(['auth','admin'])->name('admin.dashboard');
Route::get('user/dashboard',[HomeController::class,'userIndex'])->middleware(['auth','user']);
Route::get('vendor/dashboard',[HomeController::class,'vendorIndex'])->middleware(['auth','vendor']);

//==================================Admin Controller Starts=============================================//
//Dashboard
Route::get('admin/dashboard',[AdminController::class,'adminIndex'])->middleware(['auth','admin'])->name('admin.dashboard');
Route::get('/profile', [AdminController::class, 'editProfile'])->name('adminProfile.edit')->middleware(['auth','admin']);
Route::patch('/profile', [AdminController::class, 'updateProfile'])->name('adminProfile.update')->middleware(['auth','admin']);
Route::put('password', [AdminController::class, 'updatePassword'])->name('adminPassword.update')->middleware(['auth','admin']);
Route::delete('/profile', [AdminController::class, 'destroyProfile'])->name('adminProfile.destroy');
//Category side
Route::get('admin/category', [AdminController::class, 'category'])->middleware(['auth','admin'])->name('admin.category');
Route::post('/category/insert', [AdminController::class, 'insert'])->middleware(['auth','admin'])->name('category.insert');
Route::put('/category/update/{cat_id}', [AdminController::class, 'update'])->middleware(['auth','admin'])->name('category.update');
Route::get('/category/delete/{cat_id}', [AdminController::class, 'delete'])->middleware(['auth','admin'])->name('category.delete');
Route::put('/category/update-status', [AdminController::class, 'updateStatus'])->middleware(['auth','admin'])->name('category.updateStatus');
//Subcategory side
Route::get('admin/subcategory', [AdminController::class, 'subcategory'])->middleware(['auth','admin'])->name('admin.subcategory');
Route::post('/subcategory/insert', [AdminController::class, 'insert_sub'])->middleware(['auth','admin'])->name('subcategory.insert');
Route::put('/subcategory/update/{sub_cat_id}', [AdminController::class, 'update_subcategory'])->middleware(['auth','admin'])->name('subcategory.update');
Route::get('/subcategory/delete/{sub_cat_id}', [AdminController::class, 'delete_subcategory'])->middleware(['auth','admin'])->name('subcategory.delete');
Route::put('/subcategory/update-status', [AdminController::class, 'updatesubCategoryStatus'])->middleware(['auth','admin'])->name('category.updatesubCategoryStatus');
//Add Products By Admin
Route::get('admin/addprdocuct', [AdminController::class, 'addproduct_by_admin'])->middleware(['auth','admin'])->name('admin.addproduct');
Route::get('/fetch-subcategories', [AdminController::class, 'fetch_subcategory_for_inserting_products']);
Route::post('/addproduct/insert', [AdminController::class, 'insert_products_admin'])->middleware(['auth','admin'])->name('addproduct.insert');
Route::post('/addproduct/addoffer', [AdminController::class, 'add_offer_product'])->middleware(['auth','admin'])->name('addproduct.addoffer');
Route::post('/addproduct/{productId}/uploadimages', [AdminController::class, 'uploadImages'])->middleware(['auth','admin'])->name('addproduct.uploadImages');
Route::put('/addproduct/updatestatus', [AdminController::class, 'update_product_status'])->middleware(['auth','admin'])->name('addproduct.updatestatus');
Route::get('/addproduct/delete/{prodct_id}', [AdminController::class, 'delete_products_by_admin'])->middleware(['auth','admin'])->name('addproduct.delete');
Route::get('/addproduct/get-product-data/{id}', [AdminController::class, 'getProductData']);
Route::get('/addproduct/get-product-images/{id}', [AdminController::class, 'getProductImages']);
Route::post('/addproduct/update/{prodct_id}', [AdminController::class, 'update_products_by_admin'])->name('addproduct.update');
//Add Offers By Admin
Route::get('admin/addoffer', [AdminController::class, 'addoffer_by_admin'])->middleware(['auth','admin'])->name('admin.addoffer');
Route::get('/get-subcategories/{cat_id}', [AdminController::class, 'getSubcategories'])->middleware(['auth','admin']);
Route::get('/get-products/{sub_cat_id}', [AdminController::class, 'getProducts'])->middleware(['auth','admin']);
Route::post('/addoffer/insert', [AdminController::class, 'insert_offer_admin'])->middleware(['auth','admin'])->name('addoffer.insert');
Route::put('/addoffer/offers/{off_id}', [AdminController::class, 'update_offer_admin'])->middleware(['auth','admin'])->name('offers.update');
Route::get('/addoffer/delete/{off_id}', [AdminController::class, 'delete_offers_admin'])->middleware(['auth','admin'])->name('offers.delete');
Route::put('/addoffer/update-status', [AdminController::class, 'update_status_offer'])->middleware(['auth','admin'])->name('category.update-status');
//view all products
Route::get('admin/viewproducts', [AdminController::class, 'view_products'])->middleware(['auth','admin'])->name('admin.view-products');
Route::put('/viewproducts/updatestatus', [AdminController::class, 'update_product_status'])->middleware(['auth','admin'])->name('viewproducts.updatestatus');
Route::get('/get-subcategories', [AdminController::class, 'product_adding_for_users']);
Route::post('/viewproducts/insert', [AdminController::class, 'insert_products_for_users'])->middleware(['auth','admin'])->name('viewproducts.insert');

//Masters enteries
Route::get('admin/banner', [AdminController::class, 'banner_view'])->middleware(['auth','admin'])->name('admin.banner');
Route::post('/banner/insert', [AdminController::class, 'add_banner'])->middleware(['auth','admin'])->name('banner.insert');
Route::put('/banner/updatestatus', [AdminController::class, 'banner_status'])->middleware(['auth','admin'])->name('banner.updatestatus');
Route::get('admin/enquiry-list', [AdminController::class, 'enquiryList'])->middleware(['auth','admin'])->name('admin.enquires');
Route::post('/enquiries/delete-multiple', [AdminController::class, 'deleteMultiple'])->name('enquiries.deleteMultiple');
Route::post('admin/update-enquiry/{id}', [AdminController::class, 'respondToEnquiry'])->name('admin.respondToEnquiry')->middleware(['auth', 'admin']);


//Vendors verification.
Route::get('admin/vendor_verification', [AdminController::class, 'view_vendor_verification'])->middleware(['auth','admin'])->name('admin.vendor_verification');
Route::put('/vendor_verification/update-status', [AdminController::class, 'v_verification_status'])->middleware(['auth','admin'])->name('vendor_verification.update-status');

//Category Request Approval
Route::get('admin/category-requests', [AdminController::class, 'categoryRequests'])->middleware(['auth','admin'])->name('admin.categoryRequests');
Route::put('/category-requests/approve', [AdminController::class, 'categoryRequestsApprove'])->middleware(['auth','admin'])->name('categoryRequest.approve');

//SubCategory Request Approval
Route::get('admin/subcategory-requests', [AdminController::class, 'subCategoryRequests'])->middleware(['auth','admin'])->name('admin.subCategoryRequests');
Route::put('/subcategory-requests/approve', [AdminController::class, 'subCategoryRequestsApprove'])->middleware(['auth','admin'])->name('subcategoryRequest.approve');

//==================================Vendor Controller Starts=============================================//
//Dashboard
Route::get('vendor/dashboard',[VendorController::class,'vendorIndex'])->name('vendorDashboard')->middleware(['auth','vendor']);
Route::get('vendor/profile', [VendorController::class, 'editVendorProfile'])->name('vendorProfile.edit')->middleware(['auth','vendor']);
Route::patch('vendor/profile', [VendorController::class, 'updateVendorProfile'])->name('vendorProfile.update')->middleware(['auth','vendor']);
Route::put('vendor/password', [VendorController::class, 'updateVendorPassword'])->name('vendorPassword.update')->middleware(['auth','vendor']);
Route::delete('vendor/profile', [VendorController::class, 'destroyVendorProfile'])->name('vendorProfile.destroy');

//Product Management - Vendor
Route::get('vendor/product-list', [VendorController::class, 'productListVendor'])->name('vendor.productList')->middleware(['auth','vendor']);
Route::put('vendor/product-status-update', [VendorController::class, 'updateProductStatusVendor'])->name('vendor.updateProductStatus')->middleware(['auth', 'vendor']);
Route::post('/product-list/add-product', [VendorController::class, 'addProductsVendor'])->name('vendor.addProduct')->middleware(['auth','vendor']);
Route::post('/product-list/add-offer', [VendorController::class, 'addProductOfferVendor'])->name('vendor.addProductOffer')->middleware(['auth','vendor']);
Route::delete('vendor/product-delete/{id}', [VendorController::class, 'deleteProductVendor'])->name('vendor.deleteProduct')->middleware(['auth', 'vendor']);
Route::post('vendor/product-update/{id}', [VendorController::class, 'updateProductVendor'])->name('vendor.updateProduct')->middleware(['auth', 'vendor']);
Route::get('/fetch-subcategories', [VendorController::class, 'addProductFetchSubcategory']);
Route::get('/get-subcategories/{cat_id}', [VendorController::class, 'addOfferGetSubcategories'])->middleware(['auth','vendor']);

//Offer Management - Vendor
Route::get('vendor/offer-list', [VendorController::class, 'offerListVendor'])->name('vendor.offerList')->middleware(['auth','vendor']);
Route::post('offer-list/add-offer', [VendorController::class, 'addOffer'])->name('vendor.addOffer')->middleware(['auth','vendor']);
Route::delete('vendor/delete-offer/{id}', [VendorController::class, 'deleteOffer'])->name('vendor.deleteOffer')->middleware(['auth', 'vendor']);
Route::post('vendor/update-offer/{id}', [VendorController::class, 'updateOffer'])->name('vendor.updateOffer')->middleware(['auth', 'vendor']);

//Enquiries - Vendor
Route::get('vendor/enquiry-list', [VendorController::class, 'enquiryListVendor'])->name('vendor.enquiryList')->middleware(['auth','vendor']);
Route::post('enquiry-list/add-enquiry', [VendorController::class, 'addEnquiry'])->name('vendor.addEnquiry')->middleware(['auth','vendor']);
Route::delete('vendor/delete-enquiry/{id}', [VendorController::class, 'deleteEnquiry'])->name('vendor.deleteEnquiry')->middleware(['auth', 'vendor']);
Route::post('vendor/close-enquiry/{id}', [VendorController::class, 'closeEnquiry'])->name('vendor.closeEnquiry')->middleware(['auth', 'vendor']);
Route::post('vendor/update-enquiry/{id}', [VendorController::class, 'updateEnquiry'])->name('vendor.updateEnquiry')->middleware(['auth', 'vendor']);

//User Ratings - Vendor
Route::get('vendor/rating-list', [VendorController::class, 'ratingListVendor'])->name('vendor.rating')->middleware(['auth','vendor']);
Route::post('/vendor/create-review-reply/{review}', [VendorController::class, 'storeReply'])->middleware(['auth','vendor']);
Route::post('/vendor/update-review-reply/{reply}', [VendorController::class, 'updateReply'])->middleware(['auth','vendor']);

//Request for category - Vendor
Route::get('vendor/category-request', [VendorController::class, 'createCategoryRequest'])->middleware(['auth','vendor'])->name('vendor.categoryRequest');
Route::post('/category-request/store', [VendorController::class, 'storeCategoryRequestStore'])->middleware(['auth','vendor'])->name('categoryRequest.store');

//Request for subcategory - Vendor
Route::get('vendor/subcategory-request', [VendorController::class, 'createSubCategoryRequest'])->middleware(['auth','vendor'])->name('vendor.subCategoryRequest');
Route::post('/subcategory-request/store', [VendorController::class, 'storeSubCategoryRequestStore'])->middleware(['auth','vendor'])->name('subCategoryRequest.store');


