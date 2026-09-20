<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    protected $fillable = [
        'title_ar',
        'content_ar',
        'title_en',
        'content_en',
    ];
}
