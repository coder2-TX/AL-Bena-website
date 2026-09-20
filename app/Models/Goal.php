<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = [
        'order',
        'goal_ar',
        'goal_en',
        'image_url'
    ];
}
