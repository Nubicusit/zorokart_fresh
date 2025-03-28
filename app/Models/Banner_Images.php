<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner_Images extends Model
{
    protected $table = 'banner_images';
    protected $primaryKey = 'id';
    protected $fillable = ['b_images', 'status'];
}
