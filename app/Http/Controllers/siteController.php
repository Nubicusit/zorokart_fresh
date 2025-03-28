<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class siteController extends Controller
{
    //Calling index files UI
    public function index(){
        return view('index');
    }




    //Calling all products
    public function products(){
        return view('products');
    }
    //Show Product details
    public function productDetails(){
        return view('products.viewProduct');
    }
    
    public function productCart()
    {
        return view('products.cart');
    }

    public function productWishlist()
    {
        return view('products.wishlist');
    }

    public function profile()
    {
        return view('products.profile');
    }
    
     public function orders()
    {
        return view('products.orders');
    }
    
     public function coupon()
    {
        return view('products.coupon');
    }

    //view category
    public function cat()
    {
        return view('products.category');
    }

    public function login(){
        return view('login.login');
    }

    public function signup(){
        return view('signup.signup');
    }

    public function postSignup(Request $req){
        $user = new User;
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->phone = $req->input('phone');
        $user->password = Crypt::encrypt($req->input('password'));
        $user->save();$req->session()->put('user',$req->input('name'));
        return redirect('/login');
    }

    public function postLogin(Request $req){
        return $req->input();
    }

    public function admin(){
        return view('admin.adminDashboard');
    }

    public function category(){
        return view('admin.category');
    }

    public function subcategory(){
        return view('admin.subcategory');
    }

}
