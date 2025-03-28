<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages_Model extends Model
{
    protected $table = 'product_images';
    protected $primaryKey = 'img_id';
    protected $fillable = ['prodct_id', 'image_path', 'unique_id'];

    public function product()
    {
        return $this->belongsTo(Products_Model::class, 'prodct_id');
    }
}
