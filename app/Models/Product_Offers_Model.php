<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Offers_Model extends Model
{
    protected $table = 'product_offers';
    protected $primaryKey = 'offer_id';
    protected $fillable = ['offer_id ', 'offer_code', 'offer_name', 'offer_description', 'discount_type', 'discount_value', 'start_date', 'end_date', 'status', 'min_purchase_amount', 'max_discount_value', 'applicable_to', 'is_deleted', ];

}
