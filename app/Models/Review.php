<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'comment',
        'rating',
        'user_id',
        'product_id'
    ];
    
    public function user() {
        $this->belongsTo(User::class);
    }

    public function product() {
        $this->belongsTo(Product::class);
    }

}