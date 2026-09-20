@extends('layouts.site')

@section('html_lang', 'ar')
@section('html_dir', 'rtl')

@section('head')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== SEO Meta Tags ===== -->
    <title>مؤسسة البناء للتنمية المستدامة | مؤسسة تنموية يمنية</title>
    <meta name="description" content="مؤسسة البناء للتنمية المستدامة - مؤسسة خيرية يمنية في صنعاء وسيئون. نقدم كفالات ومشاريع خيرية، صدقات، ونساهم في تعليم وتنمية المجتمع اليمني.">
    <meta name="keywords" content="مؤسسة البناء, مؤسسة خيرية, كفالات خيرية, مشاريع خيرية, صدقات, مؤسسة يمنية, صنعاء, سيئون, تنمية مستدامة, مساعدات إنسانية, اليمن">
    
<!-- ===== FAVICON - الحل النهائي ===== -->
<link rel="shortcut icon" href="/favicon.ico?v=2" type="image/x-icon">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=2">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=2">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=2">
<link rel="manifest" href="/site.webmanifest">
<meta name="theme-color" content="#ffffff">
    
	<!-- ===== Open Graph لوسائل التواصل ===== -->
	<meta property="og:title" content="مؤسسة البناء للتنمية المستدامة">
	<meta property="og:description" content="مؤسسة تنموية يمنية تعمل في المجالات الإنسانية والتنموية وتمكين المجتمع.">
	<meta property="og:url" content="https://albenaa.org/">
	<meta property="og:type" content="website">

	@include('partials.social-share')
    
    <!-- ===== روابط CSS ===== -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}?v={{ filemtime(public_path('assets/css/styles.css')) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">
@endsection

@section('content')
<!-- ===== Header ===== -->
    <header class="site-header" id="header">
        <div class="container header-inner">
            <a class="brand" href="#home" aria-label="مؤسسة البناء">
                <img src="/assets/images/logo.svg" alt="شعار مؤسسة البناء" class="brand-logo">
            </a>

            <button class="nav-toggle" aria-expanded="false" aria-controls="primary-nav" aria-label="فتح القائمة" id="navToggle">
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
            </button>

            <nav id="primary-nav" class="nav" aria-label="التنقل الرئيسي">
                <ul class="nav-list">
                    <li><a href="#home" class="nav-link active">الرئيسية</a></li>
                    <li><a href="#about" class="nav-link">من نحن</a></li>
                    <li><a href="#goals" class="nav-link">الأهداف</a></li>
                    <li><a href="#fields" class="nav-link">المجالات</a></li>
                    <li><a href="#projects" class="nav-link">المشاريع</a></li>
                    <li><a href="#news" class="nav-link">الاخبار</a></li>
                    <li><a href="#success-stories" class="nav-link">قصص النجاح</a></li>
                    <li><a href="{{ url('/reports') }}" class="nav-link">تقارير</a></li>
                    <li><a href="{{ url('/contact') }}" class="nav-link">تواصل معنا</a></li>

                </ul>
                    <a class="lang-switch" href="/en" hreflang="en" aria-label="Switch to English">EN</a>
            </nav>
        </div>
    </header>

    <!-- ===== قسم الهيرو الرئيسي ===== -->
    <section class="hero" id="home">
        
        <!-- ===== محتوى النصوص على اليمين ===== -->
        <div class="hero-content">
            <div class="hero-pattern"></div>
            <h1 class="hero-title">
                {{ optional($hero)->main_title_ar ?? 'مؤسسة البناء' }}
                <span class="highlighted-text">
                    {{ optional($hero)->highlighted_text_ar ?? 'للتنمية المستدامة' }}
                    <img src="/assets/images/Decore-line.svg" alt="" class="title-line">
                </span>
            </h1>
            <p class="hero-subtitle">
                {{ optional($hero)->subtitle_ar ?? 'نصنع فرصًا حقيقية لنهوض الأفراد والمجتمع… دعم، تمليم، وأثرٌ يبقى.' }}
            </p>
            
            <!-- ===== زر تواصل معنا ===== -->
            <a href="{{ url('/contact') }}" class="cta-button">
                <i class="fas fa-phone-alt"></i>
                تواصل معنا
            </a>
        </div>

        <!-- ===== حاوية الصور على اليسار ===== -->
        <div class="hero-images">
            
            <!-- الحاوية الأولى (الكبيرة - اللون الأساسي) -->
            <div class="image-container-1">
                <div class="frame-1"></div>
                <div class="color-box-1" 
                    style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), 
                    @if(optional($hero)->image1_url)
                        url('{{ asset('storage/' . $hero->image1_url) }}')
                    @else
                        url('/assets/images/default-hero.jpg')
                    @endif
                    center/cover">
                </div>
            </div>

            <!-- الحاوية الثانية (الصغيرة - اللون الثانوي) -->
            <div class="image-container-2">
                <div class="frame-2"></div>
                <div class="color-box-2"
                    style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), 
                    @if(optional($hero)->image2_url)
                        url('{{ asset('storage/' . $hero->image2_url) }}')
                    @else
                        url('/assets/images/default-hero-2.jpg')
                    @endif
                    center/cover">
                </div>
            </div>
        </div>
    </section>

    <!-- ===== قسم من نحن ===== -->
    <section class="about-section" id="about">
        <div class="about-pattern"></div>
        <div class="about-container">
            <div class="about-content">

                <!-- الصورة على اليمين -->
                <div class="about-image">
                    <div class="about-image-container">
                        <div class="about-frame"></div>
                        <div class="about-color-box" 
                            style="background: linear-gradient(rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.1)), 
                            @if(optional($about)->image_url)
                                url('{{ asset('storage/' . $about->image_url) }}')
                            @else
                                url('/assets/images/default-about.jpg')
                            @endif
                            center/cover">
                        </div>
                    </div>
                </div>
                
                <!-- النصوص على اليسار -->
                <div class="about-text">
                    <h2 class="about-title">
                        من 
                        <span class="highlighted-text">
                            نحن
                            <img src="/assets/images/Decore-line.svg" alt="" class="title-line">
                        </span>
                    </h2>
                    <p class="about-description">
                        {{ optional($about)->description_ar ?? 'مؤسسة البناء للتنمية المستدامة مؤسسة تنموية لا تسعى للربح، أنشئت عام ٢٠٠٦م متخصصة في تنمية وتطوير المرأة اليمنية لتمكينها من أداء أدوارها وتحقيق التأثير في المجتمع. أنشأت المؤسسة في نفس العام مركزاً للتدريب والاستشارات إيماناً منها بدور التدريب في بناء وتكوين شخصية المرأة، وتقديم الاستشارات في مختلف المجالات التي تمس حياتها. كما قامت عام ٢٠١١م بإنشاء وحدة للبحوث والتطوير – والتي تحولت لاحقاً إلى مركز للفكر والدراسات - بهدف إعداد الدراسات والبحوث فيما يخص المرأة والأسرة والاهتمام بالبناء الفكري والثقافي كأحد مكونات بناء شخصية المرأة اليمنية. ومع الظروف التي تمر بها البلاد منذ العام ٢٠١٥م اتجهت المؤسسة للعمل الإغاثي والمشاريع المرتبطة باحتياجات المجتمع العاجلة، فتم إنشاء وحدة للإغاثة والمشاريع والتي تهتم بتقديم الإغاثة العاجلة ومشاريع دعم التعليم والإعمار، كما أنشأت وحدة للمشروعات الصغيرة لتمكين الأسر من تحقيق الاكتفاء الذاتي، كما أولت عناية خاصة ببرامج الطفولة والدعم والتأهيل النفسي للتخفيف من معاناة المرأة والمحافظة على القيم والأخلاق والعقيدة.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

<!-- ===== قسم الرؤية والرسالة والقيم ===== -->
<section class="vision-mission-section" id="vision-mission">
    <div class="vision-mission-container">
        <h2 class="section-title">
            رؤيتنا 
            <span class="highlighted-text">
                ورسالتنا
                <img src="/assets/images/Decore-line.svg" alt="" class="title-line">
            </span>
        </h2>
        
        <div class="half-circle-pattern"></div>

        <div class="vision-mission-content">
            <!-- الرؤية -->
            <div class="vision-item">
                <div class="icon-container">
                    <div class="icon-frame"></div>
                    <div class="icon-background"></div>
                    <i class="fas fa-eye icon"></i>
                </div>
                <h3 class="item-title">الرؤية</h3>
                <p class="item-description">
                    {{ optional($visionMission)->vision_ar ?? 'امرأة (يمنية) تستلهم دورها الحضاري لصناعة المستقبل.' }}
                </p>
            </div>
            <div class="half-circle-pattern2"></div>
            <!-- الرسالة -->
            <div class="mission-item">
                <div class="icon-container">
                    <div class="icon-frame"></div>
                    <div class="icon-background"></div>
                    <i class="fas fa-bullseye icon"></i>
                </div>
                <h3 class="item-title">الرسالة</h3>
                <p class="item-description">
                    {{ optional($visionMission)->mission_ar ?? 'بناء متوازن للمرأة اليمنية بما يمكنها من أداء دورها الرسالي في الحياة وفق منظومة قيمية عادلة ومتكاملة.' }}
                </p>
            </div>
            
            <!-- القيم -->
            <div class="values-item">
                <div class="icon-container">
                    <div class="icon-frame"></div>
                    <div class="icon-background"></div>
                    <i class="fas fa-heart icon"></i>
                </div>
                <h3 class="item-title">القيم</h3>
                <p class="item-description">
                    {{ optional($visionMission)->values_ar ?? 'الجودة، تنمية المجتمع، مخرجات نوعية، التجديد، المسؤولية المشتركة.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ===== قسم الأهداف ===== -->
<section id="goals" class="section goals-section">
    <div class="goals-container">
        <div class="goals-content">
            
            <!-- النصوص مع السلايدر -->
            <div class="goals-text">
                <h2 class="goals-title">
                    أهداف
                    <span class="highlighted-text">
                        المؤسسة
                        <img src="/assets/images/Decore-line.svg" alt="" class="title-line">
                    </span>
                </h2>

                @php
                    $defaultGoals = [
                        'تنمية قدرات المرأة اليمنية بما يمكنها من أداء أدوارها الحياتية المختلفة بكفاءة وفاعلية.',
                        'إعداد نماذج نسائية قادرة على التأثير في المجتمع.',
                        'الاهتمام بالطفولة والنشء وتطوير قدرات المتميزين والمتفوقين.',
                        'تمكين الأسر اقتصاديًا عبر تنفيذ المشاريع التنموية ودعم المشاريع الصغيرة المدرة للدخل.',
                        'المساهمة في صياغة حلول لمشكلات المجتمع وقضايا المرأة.',
                        'المساهمة في الدفع بالعملية التعليمية ومحو أمية النساء.',
                        'إغاثة الأسر المتضررة والمنكوبة والمشاركة في مشاريع الإعمار.',
                        'رفع الوعي المجتمعي بأهمية وضرورة ممارسة المرأة لأدوارها الحضارية.',
                    ];

                    $displayGoals = (isset($goals) && $goals->count() > 0)
                        ? $goals
                        : collect($defaultGoals);
                @endphp

                <div class="goals-slider-container">
                    <div class="goals-slider">
                        <!-- زر السابق -->
                        <button id="goalsArrowPrev" class="goals-arrow-btn" aria-label="السابق">
                            <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M15.5 5l-7 7 7 7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>

                        <!-- منطقة العرض -->
                        <div id="goalsViewport" class="goals-viewport">
                            <div id="goalsTrack" class="goals-track">
                                @foreach($displayGoals as $index => $goal)
                                    <div class="goals-slide">
                                        <span class="goal-number">{{ $index + 1 }}</span>
                                        <p class="goal-text">
                                            {{ is_object($goal) ? ($goal->goal_ar ?? 'هدف المؤسسة') : $goal }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- زر التالي -->
                        <button id="goalsArrowNext" class="goals-arrow-btn" aria-label="التالي">
                            <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.5 19l7-7-7-7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>

                    <!-- نقاط التنقل -->
                    <div class="goals-dots" aria-label="التنقل بين الأهداف"></div>
                </div>

                <div class="goals-circle-pattern"></div>
            </div>

            <!-- الصورة -->
            <div class="goals-image">
                <div class="goals-image-container">
                    <div class="goals-background"></div>
                    <div class="goals-frame"></div>
                    <div class="goals-color-box" 
                        style="background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), 
                        @if(isset($goals) && $goals->first() && $goals->first()->image_url)
                            url('{{ asset('storage/' . $goals->first()->image_url) }}')
                        @else
                            url('/assets/images/download.png')
                        @endif
                        center/cover">
                    </div>
                    <div class="goals-overlay"></div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ===== قسم مجالات المؤسسة ===== -->
<section class="fields-section" id="fields">
    <div class="fields-container">
        <div class="fields-content">
            
            <!-- النصوص مع السلايدر -->
            <div class="fields-text">
                <h2 class="fields-title">
                    مجالات
                    <span class="highlighted-text">
                        المؤسسة
                        <img src="/assets/images/Decore-line.svg" alt="" class="title-line">
                    </span>
                </h2>

                @php
                    $defaultFields = [
                        [
                            'name' => 'التدريب',
                            'icon' => '/assets/images/Fields/workshop.svg',
                        ],
                        [
                            'name' => 'الاستشارات',
                            'icon' => '/assets/images/Fields/consulting.svg',
                        ],
                        [
                            'name' => 'برامج الطفولة',
                            'icon' => '/assets/images/Fields/child.svg',
                        ],
                        [
                            'name' => 'البحوث والدراسات',
                            'icon' => '/assets/images/Fields/research.svg',
                        ],
                        [
                            'name' => 'مشاريع الإغاثة والإعمار',
                            'icon' => '/assets/images/Fields/humanitarian.svg',
                        ],
                        [
                            'name' => 'المشروعات الصغيرة',
                            'icon' => '/assets/images/Fields/small business.svg',
                        ],
                        [
                            'name' => 'التعليم',
                            'icon' => '/assets/images/Fields/education.svg',
                        ],
                        [
                            'name' => 'البناء الفكري',
                            'icon' => '/assets/images/Fields/mind.svg',
                        ],
                    ];

                    $displayFields = (isset($fields) && $fields->count() > 0)
                        ? $fields
                        : collect($defaultFields);
                @endphp

                <div class="fields-content-wrapper">
                    <!-- السلايدر -->
                    <div class="fields-slider-container">
                        <div class="fields-slider">

                            <!-- زر السابق -->
                            <button id="fieldsArrowPrev" class="fields-arrow-btn" aria-label="السابق">
                                <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M15.5 5l-7 7 7 7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>

                            <!-- منطقة العرض -->
                            <div id="fieldsViewport" class="fields-viewport">
                                <div id="fieldsTrack" class="fields-track">

                                    @foreach($displayFields as $field)
                                        @if(is_object($field))
                                            <!-- من قاعدة البيانات -->
                                            <a href="{{ route('field.gallery', $field->id) }}" class="field-link">
                                                <div class="field-item">
                                                    <div class="field-icon-container">
                                                        <div class="field-icon-wrapper">
                                                            <img src="{{ $field->icon_image ? asset('storage/' . $field->icon_image) : '/assets/images/default-field.svg' }}"
                                                                 alt="{{ $field->name_ar ?? 'مجال المؤسسة' }}"
                                                                 class="field-icon-img">
                                                        </div>
                                                    </div>
                                                    <span class="field-name">{{ $field->name_ar ?? 'المجال' }}</span>
                                                </div>
                                            </a>
                                        @else
                                            <!-- مؤقت -->
                                            <div class="field-item">
                                                <div class="field-icon-container">
                                                    <div class="field-icon-wrapper">
                                                        <img src="{{ $field['icon'] }}"
                                                             alt="{{ $field['name'] }}"
                                                             class="field-icon-img">
                                                    </div>
                                                </div>
                                                <span class="field-name">{{ $field['name'] }}</span>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>

                            <!-- زر التالي -->
                            <button id="fieldsArrowNext" class="fields-arrow-btn" aria-label="التالي">
                                <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.5 19l7-7-7-7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>

                        </div>

                        <!-- نقاط التنقل -->
                        <div class="fields-dots" aria-label="التنقل بين المجالات"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- ===== قسم مشاريعنا ===== -->
<section class="projects-section" id="projects">
    <div class="projects-container">
        <div class="projects-header">
            <h2 class="projects-title">
                مشاريع
                <span class="highlighted-text">
                    المؤسسة
                    <img src="/assets/images/Decore-line.svg" alt="" class="title-line">
                </span>
            </h2>
        </div>

        <div class="projects-slider-container">
            <!-- السلايدر -->
            <div class="projects-slider">
                <!-- زر السابق -->
                <button id="projectsArrowPrev" class="projects-arrow-btn" aria-label="السابق">
                    <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M15.5 5l-7 7 7 7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <!-- منطقة العرض -->
                <div id="projectsViewport" class="projects-viewport">
                    <div id="projectsTrack" class="projects-track">
                        @if(isset($projects) && $projects->count() > 0)
                            @foreach($projects as $project)
                            <!-- المشروع {{ $loop->iteration }} -->
                            <div class="project-card">
                                <div class="project-image-container">
                                    <img class="project-image" 
                                         src="{{ $project->image_url ? asset('storage/' . $project->image_url) : '/assets/images/default-project.jpg' }}" 
                                         alt="{{ $project->name_ar ?? 'مشروع المؤسسة' }}">
                                    <div class="project-overlay">
                                        <div class="project-info">
                                            <h3 class="project-title">{{ $project->name_ar ?? 'اسم المشروع' }}</h3>
                                            @if($project->pdf_url)
                                                <a href="{{ asset('storage/' . $project->pdf_url) }}" class="download-link" target="_blank" download>
                                                    <div class="download-icon">
                                                        <i class="fas fa-arrow-down"></i>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <!-- عرض رسالة إذا لم توجد مشاريع -->
                            <div class="project-card no-projects-message">
                                <p>لا توجد مشاريع مضافة حالياً</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- زر التالي -->
                <button id="projectsArrowNext" class="projects-arrow-btn" aria-label="التالي">
                    <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.5 19l7-7-7-7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            
            <!-- نقاط التنقل -->
            <div class="projects-dots" aria-label="التنقل بين المشاريع"></div>
        </div>
    </div>
</section>

<!-- ===== قسم الأخبار ===== -->
<section class="news-section" id="news">
    <div class="news-container">
        <div class="news-header">
            <h2 class="news-title">
                <span class="highlighted-text">
                    أخبار المؤسسة
                    <img src="/assets/images/Decore-line.svg" alt="" class="title-line">
                </span>
            </h2>
        </div>

        <div class="news-content">
            <!-- الصور على اليسار -->
            <div class="news-images">
                <div class="news-image-container">
                    <div class="news-frame"></div>
                    <div class="news-color-box">
                        <!-- سلايدر الصور للخبر الحالي -->
                        <div class="news-images-slider">
                            <div class="news-images-track" id="currentNewsImagesTrack">
                                @if(isset($news) && $news->count() > 0)
                                    @php
                                        $firstNews = $news->first();
                                        $images = $firstNews->images ?? [];
                                    @endphp
                                    @if(count($images) > 0)
                                        @foreach($images as $index => $image)
                                            <div class="news-image-slide {{ $index === 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $image) }}" 
                                                     alt="صورة الخبر {{ $index + 1 }}" 
                                                     class="news-main-image">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="news-image-slide active">
                                            <img src="/assets/images/default-news.jpg" 
                                                 alt="لا توجد صور" 
                                                 class="news-main-image">
                                        </div>
                                    @endif
                                @else
                                    <div class="news-image-slide active">
                                        <img src="/assets/images/default-news.jpg" 
                                             alt="لا توجد أخبار" 
                                             class="news-main-image">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- نقاط سلايدر الصور للخبر الحالي -->
                        <div class="news-images-dots" id="currentNewsImagesDots">
                            <!-- سيتم تعبئته بالجافاسكريبت -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- النصوص على اليمين -->
            <div class="news-text">
                @if(isset($news) && $news->count() > 0)
                <!-- سلايدر الأخبار -->
                <div class="news-slider">
                    <div class="news-track" id="newsTrack">
                        @foreach($news as $index => $newsItem)
                        <!-- الخبر {{ $index + 1 }} -->
                        <div class="news-slide {{ $index === 0 ? 'active' : '' }}" 
                             data-index="{{ $index }}" 
                             data-news-id="{{ $newsItem->id }}"
                             data-images='@json($newsItem->images ?? [])'>
                            <h3 class="news-item-title">{{ $newsItem->title_ar ?? 'عنوان الخبر' }}</h3>
                            <p class="news-item-description">
                                {{ $newsItem->content_ar ?? 'محتوى الخبر' }}
                            </p>
                            <p class="news-item-date">
                                <i class="fas fa-calendar-alt"></i>
                                {{ optional($newsItem->date)->format('d M Y') ?? 'تاريخ غير محدد' }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- أزرار تحكم سلايدر الأخبار -->
                <div class="news-controls">
                    <button class="news-btn prev-news-btn" id="prevNewsBtn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    <button class="news-btn next-news-btn" id="nextNewsBtn">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                </div>
                @else
                <div class="no-news-message">
                    <p>لا توجد أخبار مضافة حالياً</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- ===== قسم قصص النجاح ===== -->
<section class="success-stories-section" id="success-stories">
    <div class="success-stories-pattern"></div>
    <div class="success-stories-container">
        <h2 class="success-stories-title">
            <span class="highlighted-text">
                قصص النجاح
                <img src="/assets/images/Decore-line.svg" alt="" class="title-line">
            </span>
        </h2>

        @if(isset($successStories) && $successStories->count() > 0)
            <div class="success-stories-content">
                <!-- الكارد الكبير في المنتصف -->
                <div class="success-stories-card">
                    <div class="quotation-mark-bottom"></div>

                    <div class="quotation-mark">
                        <img src="/assets/images/quotation mark.svg" alt="علامة اقتباس">
                    </div>

                    <!-- سلايدر القصص -->
                    <div class="stories-slider">
                        <div class="stories-track" id="storiesTrack">
                            @foreach($successStories as $index => $story)
                                <div class="story-slide {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                                    <h3 class="story-title">{{ $story->title_ar ?? 'عنوان القصة' }}</h3>
                                    <p class="story-description">
                                        {{ $story->content_ar ?? 'محتوى القصة' }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- أزرار التحكم -->
                    <div class="stories-controls">
                        <button class="story-btn prev-story-btn" id="prevStoryBtn">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="story-btn next-story-btn" id="nextStoryBtn">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>

                    <!-- نقاط التبديل -->
                    <div class="stories-dots" id="storiesDots">
                        @foreach($successStories as $index => $story)
                            <button
                                class="story-dot {{ $index === 0 ? 'active' : '' }}"
                                data-index="{{ $index }}"
                            ></button>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div class="no-stories-message">
                <p>لا توجد قصص نجاح حالياً.</p>
            </div>
        @endif
    </div>
</section>

<!-- ===== الفوتر ===== -->
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-content">
            <!-- النص الرئيسي والفرعي -->
            <div class="footer-text">
                <h3 class="footer-main-text">{{ optional($footer)->main_text_ar ?? 'معًا نصنع الأثر' }}</h3>
                <p class="footer-sub-text">{{ optional($footer)->sub_text_ar ?? 'تواصل معنا لمعرفة المزيد' }}</p>
            </div>

            <!-- فراغ -->
            
            <!-- رقم الهاتف -->
            <div class="footer-contact">
                <h4 class="contact-title">رقم الهاتف</h4>
                <p class="contact-info">{{ optional($footer)->phone_ar ?? '+967 777 777 777' }}</p>
            </div>

            <!-- فراغ -->
            
            <!-- البريد الإلكتروني -->
            <div class="footer-contact">
                <h4 class="contact-title">البريد الالكتروني</h4>
                <p class="contact-info">{{ optional($footer)->email_ar ?? 'albena@gmail.com' }}</p>
            </div>

            <!-- فراغ -->
            
            <!-- الموقع -->
            <div class="footer-contact">
                <h4 class="contact-title">الموقع</h4>
                <p class="contact-info">{{ optional($footer)->location_ar ?? 'سيئون - القرن - مدرسة القرن' }}</p>
            </div>

            <!-- فراغ -->
            
            <!-- وسائل التواصل -->
            <div class="footer-social">
                <h4 class="social-title">{{ optional($footer)->social_title_ar ?? 'تواصل معنا عبر' }}</h4>
                <div class="social-icons">
                    <a href="{{ optional($footer)->whatsapp_url ?? '#' }}" class="social-icon" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="{{ optional($footer)->facebook_url ?? '#' }}" class="social-icon" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!--  الخط والفقرة الجديدة -->
        <div class="footer-bottom">
            <p class="copyright">{{ optional($footer)->copyright_ar ?? 'جميع الحقوق محفوظة لمؤسسة البناء للتنمية البشرية © 2025' }}</p>
        </div>
    </div>
</footer>

    <!-- ===== ملف JavaScript منفصل ===== -->
    <script src="/assets/js/main.js">
        
    </script>

    <!-- ===== كود إجبار تحميل الأيقونة الجديدة ===== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // حل 1: إضافة رابط جديد للأيقونة
    var link = document.createElement('link');
    link.rel = 'icon';
    link.href = '/favicon.ico?force=' + new Date().getTime();
    document.head.appendChild(link);
    
    // حل 2: إعادة تحميل الصفحة إذا كانت الأيقونة القديمة
    setTimeout(function() {
        if (!document.querySelector('link[href*="favicon"]')) {
            location.reload();
        }
    }, 500);
});
</script>
@endsection