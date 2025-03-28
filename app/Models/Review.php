<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    protected $table = 'reviews';
    protected $primaryKey = 'review_id ';
    protected $fillable = ['user_id ', 'product_id', 'rating', 'review_text', 'verified_purchase' ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); 
    }

    public function product()
    {
        return $this->belongsTo(Products_Model::class, 'product_id', 'prodct_id'); 
    }

    public function reply()
    {
        return $this->hasOne(Review_Reply_Model::class, 'review_id','review_id');
    }

}
