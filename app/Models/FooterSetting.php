<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $fillable = [
        'main_text_ar',
        'sub_text_ar',
        'phone_ar',
        'email_ar',
        'location_ar',
        'social_title_ar',
        'copyright_ar',
        'main_text_en',
        'sub_text_en',
        'phone_en',
        'email_en',
        'location_en',
        'social_title_en',
        'copyright_en',
        'whatsapp_url',
        'facebook_url',
        'twitter_url',
    ];
}
