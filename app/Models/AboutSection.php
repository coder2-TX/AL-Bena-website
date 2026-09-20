<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'description_ar',
        'description_en', 
        'image_url'
    ];
}
