<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class siteController extends Controller
{
    //Calling index files UI
    public function index(){
        return view('index');
    }

    //Show Product details
    public function productDetails($id){
        return view('products.viewProduct');
    }
}
