<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category_Model extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cat_id';
    protected $fillable = ['cat_name', 'cat_desc', 'cat_img', 'status', 'updated_at', 'created_at'];

    public function subCatgories(){

        return $this->hasMany(Sub_Category_Model::class, 'cat_id', 'cat_id');
        
    }
    public function offers()
    {
        return $this->hasMany(Offers_Model::class, 'cat_id', 'cat_id');
    }
    public function products()
    {
        return $this->hasMany(Products_Model::class, 'cat_id', 'cat_id');
    }
    public function product()
    {
        return $this->hasMany(Products_Model::class);
    }
}

