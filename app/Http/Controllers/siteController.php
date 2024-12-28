<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class siteController extends Controller
{
    //Calling index files UI
    public function index(){
        return view('index');
    }

<<<<<<< HEAD
    //Calling all products
    public function products(){
        return view('products');
=======
    //Show Product details
    public function productDetails($id){
        return view('products.viewProduct');
>>>>>>> da76346ad368246c2358771a64be5fd8615aadf7
    }
}
