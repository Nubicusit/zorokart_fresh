<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category_Model;
use App\Models\Sub_Category_Model;

class UserController extends Controller
{
    
    //Calling the dashborad
    public function userIndex(){
        return view('user.userDashboard');
    }
}