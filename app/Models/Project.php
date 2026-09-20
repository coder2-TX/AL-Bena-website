<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'order',
        'name_ar',
        'name_en',
        'image_url',
        'pdf_url'
    ];
}
