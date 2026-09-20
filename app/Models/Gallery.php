<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 

class Gallery extends Model
{
    protected $fillable = [
        'field_id',
        'image',
        'name_ar',
        'name_en',
        'order'
    ];
    
    protected $appends = ['image_url']; // ← هذا يطلب attribute

    // ← يجب إضافة هذه الدالة ↓
    public function getImageUrlAttribute()
    {
        // إذا ما في صورة
        if (!$this->image) {
            return null;
        }
        
        // بساطة: رجع المسار مع storage/
        return asset('storage/' . $this->image);
    }
    // ← انتهت الدالة ↑

    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class);
    }

    
}