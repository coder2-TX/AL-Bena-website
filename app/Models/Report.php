<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'year',
        'annual_pdf_path',
        'annual_excel_path',
        'half_year_pdf_path',
        'half_year_excel_path',
    ];
}
