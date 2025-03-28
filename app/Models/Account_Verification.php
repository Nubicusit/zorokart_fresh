<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account_Verification extends Model
{
    protected $table = 'account_verification';
    public $timestamps = false;
    protected $fillable = ['business_pan ', 'gstin', 'aadhar', 'user_id', ];

}
