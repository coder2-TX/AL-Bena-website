<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Middleware\SetSiteLocale;

// الصفحة الرئيسية العربية
Route::middleware(SetSiteLocale::class)->group(function () {
    Route::get('/', [PageController::class, 'index']);
    
    // صفحة التواصل العربية
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::post('/contact', [PageController::class, 'contactStore'])->name('contact.store');
    
    // الصفحة الإنجليزية الرئيسية
    Route::get('/en', [PageController::class, 'english']);
    
    // صفحة التواصل الإنجليزية
    Route::get('/en/contact', [PageController::class, 'contactEnglish'])->name('contact.en');
    Route::post('/en/contact', [PageController::class, 'contactStore'])->name('contact.en.store');
    
    // صفحة التقارير العربية
    Route::get('/reports', [PageController::class, 'reports'])->name('reports');
    // صفحة التقارير الإنجليزية
    // صفحة التقارير الإنجليزية
    Route::get('/en/reports', [PageController::class, 'reportsEnglish'])->name('reports.en');
    // صفحات معرض الصور للمجالات
    Route::get('/field/{id}/gallery', [PageController::class, 'fieldGallery'])->name('field.gallery');
    Route::get('/en/field/{id}/gallery', [PageController::class, 'fieldGalleryEnglish'])->name('field.gallery.en');
});
