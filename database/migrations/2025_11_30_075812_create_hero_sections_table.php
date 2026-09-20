<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            
            // المحتوى العربي
            $table->string('main_title_ar');
            $table->string('highlighted_text_ar');
            $table->text('subtitle_ar');
            
            // المحتوى الإنجليزي
            $table->string('main_title_en');
            $table->string('highlighted_text_en');
            $table->text('subtitle_en');
            
            // الصور
            $table->string('image1_url');
            $table->string('image2_url');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};