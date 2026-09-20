<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();
            
            // النصوص العربية
            $table->string('main_text_ar')->nullable();
            $table->string('sub_text_ar')->nullable();
            $table->string('phone_ar')->nullable();
            $table->string('email_ar')->nullable();
            $table->text('location_ar')->nullable();
            $table->string('social_title_ar')->nullable();
            $table->string('copyright_ar')->nullable();
            
            // النصوص الإنجليزية
            $table->string('main_text_en')->nullable();
            $table->string('sub_text_en')->nullable();
            $table->string('phone_en')->nullable();
            $table->string('email_en')->nullable();
            $table->text('location_en')->nullable();
            $table->string('social_title_en')->nullable();
            $table->string('copyright_en')->nullable();
            
            // روائل التواصل الاجتماعي
            $table->string('whatsapp_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_settings');
    }
};
