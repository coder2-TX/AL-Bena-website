<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\VisionMission; 
use App\Models\Goal;
use App\Models\Field;
use App\Models\Project;
use App\Models\News;
use App\Models\SuccessStory;
use App\Models\Report;
use App\Models\FooterSetting;
use App\Models\ContactMessage;
use App\Models\Gallery;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // الصفحة العربية الرئيسية
    public function index()
    {
        $hero = HeroSection::first();
        $about = AboutSection::first(); 
        $visionMission = VisionMission::first();
        $goals = Goal::orderBy('order')->get();
        $fields = Field::orderBy('order')->get();
        $projects = Project::orderBy('order')->get();
        $news = News::orderBy('date', 'desc')->get();
        $successStories = SuccessStory::latest()->get();
        $reports = Report::orderBy('year', 'desc')->get();
        $footer = FooterSetting::first();
        
        return view('ar.index', [
            'hero' => $hero,
            'about' => $about,
            'visionMission' => $visionMission,
            'goals' => $goals,
            'fields' => $fields,
            'projects' => $projects,
            'news' => $news,
            'successStories' => $successStories,
            'reports' => $reports,
            'footer' => $footer,
        ]);
    }

    // صفحة التواصل العربية
    public function contact()
    {
        $footer = FooterSetting::first();
        
        return view('ar.contact', [
            'footer' => $footer,
        ]);
    }

    // صفحة التواصل الإنجليزية
    public function contactEnglish()
    {
        $footer = FooterSetting::first();
        
        return view('en.contact', [
            'footer' => $footer,
        ]);
    }

    // استقبال رسائل التواصل (لللغتين)
    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // حفظ الرسالة في قاعدة البيانات
        ContactMessage::create($validated);

        // تحديد لغة الرسالة بناءً على المسار
        $lang = $request->route()->getName() == 'contact.en.store' ? 'en' : 'ar';
        
        $messages = [
            'ar' => 'تم إرسال رسالتك بنجاح. سنتواصل معك قريباً.',
            'en' => 'Your message has been sent successfully. We will contact you soon.'
        ];

        return response()->json([
            'success' => true,
            'message' => $messages[$lang] ?? $messages['ar']
        ]);
    }

        // صفحة التقارير العربية
    public function reports()
    {
        $footer = FooterSetting::first();
        $reports = Report::orderBy('year', 'desc')->get();
        
        return view('ar.reports', [
            'footer' => $footer,
            'reports' => $reports,
        ]);
    }
    
    // صفحة التقارير الإنجليزية
    public function reportsEnglish()
    {
        $footer = FooterSetting::first();
        $reports = Report::orderBy('year', 'desc')->get();
        
        return view('en.reports', [
            'footer' => $footer,
            'reports' => $reports,
        ]);
    }
    
    // الصفحة الإنجليزية الرئيسية
    public function english()
    {
        $hero = HeroSection::first();
        $about = AboutSection::first(); 
        $visionMission = VisionMission::first();
        $goals = Goal::orderBy('order')->get();
        $fields = Field::orderBy('order')->get();
        $projects = Project::orderBy('order')->get(); 
        $news = News::orderBy('date', 'desc')->get();
        $successStories = SuccessStory::latest()->get(); 
        $reports = Report::orderBy('year', 'desc')->get();
        $footer = FooterSetting::first();
        
        return view('en.index', [
            'hero' => $hero,
            'about' => $about,
            'visionMission' => $visionMission,
            'goals' => $goals,
            'fields' => $fields,
            'projects' => $projects,
            'news' => $news,
            'successStories' => $successStories,
            'reports' => $reports,
            'footer' => $footer,
        ]);
    }

    // صفحة معرض الصور للمجال (عربي)
    public function fieldGallery($id)
    {
        $field = Field::with('galleries')->findOrFail($id);
        $footer = FooterSetting::first();
        
        return view('ar.field-gallery', [
            'field' => $field,
            'footer' => $footer,
        ]);
    }
    
    // صفحة معرض الصور للمجال (إنجليزي)
    public function fieldGalleryEnglish($id)
    {
        $field = Field::with('galleries')->findOrFail($id);
        $footer = FooterSetting::first();
        
        return view('en.field-gallery', [
            'field' => $field,
            'footer' => $footer,
        ]);
    }
}