<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products_Model extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'prodct_id';
    protected $fillable = [
        'cat_id',
        'sub_cat_id',
        'unique_id',
        'off_id',
        'coup_id',
        'rte_id',
        'prodct_name',
        'prodct_desc',
        'product_img',
        'price',
        'bst_selling',
        'new_arrival',
        'prodct_count',
        'status',
        'flag',
        'updated_at',
        'created_at'
    ];
    public function offers()
    {
        return $this->hasMany(Offers_Model::class, 'prodct_id', 'prodct_id', 'off_id');
        // return $this->hasOne(Offers_Model::class, 'off_id'. 'off_id');
    }
    public function category()
    {
        return $this->belongsTo(Category_Model::class, 'cat_id', 'cat_id');
        
    }
    public function sub_category()
    {
        return $this->belongsTo(Sub_Category_Model::class, 'sub_cat_id', 'sub_cat_id'); // Adjust keys as needed
    }
    public function offer()
    {
        return $this->belongsTo(Offers_Model::class, 'off_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImages_Model::class, 'prodct_id');
    }
    public function products()
    {
        return $this->hasMany(Products_Model::class);
    }
    public function category1()
    {
        return $this->belongsTo(Category_Model::class);
    }

    public function subcategory1()
    {
        return $this->belongsTo(Sub_Category_Model::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class); 
    }

}
