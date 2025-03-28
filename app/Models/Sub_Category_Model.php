<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_Category_Model extends Model
{
    protected $table = 'sub_category';
    protected $primaryKey = 'sub_cat_id';
    protected $fillable = ['cat_id',  'sub_name', 'sub_desc', 'status'];

    public function category()
    {
        return $this->belongsTo(Category_Model::class, 'cat_id', 'cat_id');
        
    }
    public function offers()
    {
        return $this->hasMany(Offers_Model::class, 'sub_cat_id', 'sub_cat_id');
    }
    public function products()
    {
        return $this->hasMany(Products_Model::class, 'sub_cat_id', 'sub_cat_id');
    }
}
