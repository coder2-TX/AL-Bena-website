<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
    protected $fillable = [
        'vision_ar',
        'vision_en',
        'mission_ar', 
        'mission_en',
        'values_ar',
        'values_en'
    ];
}
