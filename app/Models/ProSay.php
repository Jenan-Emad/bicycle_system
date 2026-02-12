<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProSay extends Model
{
    use HasFactory;
    protected $table = 'pro_says';
    protected $fillable = [
        'name',
        'content',
        'title',
    ];
}