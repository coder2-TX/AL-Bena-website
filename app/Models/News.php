<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'order',
        'title_ar',
        'title_en',
        'content_ar',
        'content_en',
        'date',
        'images'
    ];

    protected $casts = [
        'images' => 'array',
        'date' => 'date'
    ];
}
