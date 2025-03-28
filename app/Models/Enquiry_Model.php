<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry_Model extends Model
{
    protected $table = 'enquiries';
    protected $primaryKey = 'enquiry_id';
    protected $fillable = ['vendor_id ', 'enquiry_title', 'enquiry_message', 'enquiry_status', 'created_date', 'response_date', 'flag' ];

    public function users()
    {
        return $this->belongsTo(User::class); 
    }
}
