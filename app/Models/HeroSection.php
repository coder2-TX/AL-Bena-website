<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'main_title_ar',
        'highlighted_text_ar', 
        'subtitle_ar',
        'main_title_en',
        'highlighted_text_en',
        'subtitle_en',
        'image1_url',
        'image2_url'
    ];
    
}
