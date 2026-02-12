<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQuestion extends Model
{
    protected $table = 'faq_questions';

    protected $fillable = [
        'name',
        'email',
        'question',
        'department',
        'answer',
        'is_answered',
    ];
}