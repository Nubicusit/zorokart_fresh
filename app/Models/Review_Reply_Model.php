<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review_Reply_Model extends Model
{
    use HasFactory;

    protected $table = 'review_replies';
    protected $primaryKey = 'reply_id';
    protected $fillable = ['review_id ', 'user_id', 'reply_text'];

    public function review()
    {
        return $this->belongsTo(Review::class, 'review_id', 'review_id');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
