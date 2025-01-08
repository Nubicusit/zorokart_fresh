<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class siteController extends Controller
{
    //Calling index files UI
    public function index(){
        return view('index');
    }

    public function login(){
        return view('login.login');
    }

    public function signup(){
        return view('signup.signup');
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
