<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
