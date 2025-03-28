<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offers_Model extends Model
{
    protected $table = 'offers';
    protected $primaryKey = 'off_id';
    protected $fillable = ['cat_id', 'sub_cat_id', 'off_price', 'prodct_id', 'off_percentage', 'status', 'updated_at', 'created_at'];

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category_Model::class, 'cat_id', 'cat_id');
    }

    // Define the relationship with the SubCategory model
    public function subCategory()
    {
        return $this->belongsTo(Sub_Category_Model::class, 'sub_cat_id', 'sub_cat_id');
    }
    // Define the relationship with the Productsmodel
    public function products()
    {
        return $this->belongsTo(Products_Model::class, 'prodct_id', 'prodct_id', 'off_id');
    }
}
