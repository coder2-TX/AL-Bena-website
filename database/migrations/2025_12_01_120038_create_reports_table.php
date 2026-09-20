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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();

            // سنة التقرير
            $table->unsignedSmallInteger('year')->unique();

            // تقرير سنوي
            $table->string('annual_pdf_path')->nullable();
            $table->string('annual_excel_path')->nullable();

            // تقرير نصف السنة
            $table->string('half_year_pdf_path')->nullable();
            $table->string('half_year_excel_path')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
