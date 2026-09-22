@extends('layouts.site')

@section('html_lang', 'en')
@section('html_dir', 'ltr')

@section('head')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== SEO Meta Tags ===== -->
    <title>Albena Foundation for Sustainable Development | Yemeni Charity Organization</title>
    <meta name="description" content="Albena Foundation for Sustainable Development - A Yemeni charitable organization in Sana'a and Seiyun. We provide sponsorships, charity projects, donations, and contribute to education and community development in Yemen.">
    <meta name="keywords" content="Albena Foundation, charity organization, charitable sponsorship, charity projects, donations, Yemeni charity, Sana'a, Seiyun, sustainable development, humanitarian aid, Yemen, education in Yemen, community development, development projects, donations, orphan sponsorship, relief">
    
    <meta name="author" content="Albena Foundation for Sustainable Development">
    <meta http-equiv="Content-Language" content="en">
    
    <!-- ===== FAVICON - Final Solution ===== -->
    <link rel="shortcut icon" href="/favicon.ico?v=2" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=2">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#ffffff">
    
	<!-- ===== Social Share / Open Graph ===== -->
	@php
		$shareTitle = 'Albena Foundation for Sustainable Development';
		$shareDescription = 'A Yemeni charitable organization providing sponsorships, humanitarian projects, education and community development.';
	@endphp

	@include('partials.social-share')

	<meta property="og:locale" content="en_US">
    
    <!-- ===== CSS Links ===== -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}?v={{ filemtime(public_path('assets/css/styles.css')) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">
@endsection

@section('content')
<!-- ===== Header ===== -->
    @include('partials.site.header')

    <!-- ===== Hero Section ===== -->
    <section class="hero" id="home">
        
        <!-- ===== Text Content on Right ===== -->
        <div class="hero-content">
            <div class="hero-pattern"></div>
            <h1 class="hero-title">
                {{ optional($hero)->main_title_en ?? 'Albena Foundation' }}
                <span class="highlighted-text">
                    {{ optional($hero)->highlighted_text_en ?? 'for Sustainable Development' }}
                    <img src="{{ asset('assets/images/Decore-line.svg') }}" alt="" class="title-line">
                </span>
            </h1>
            <p class="hero-subtitle">
                {{ optional($hero)->subtitle_en ?? 'We create real opportunities for the advancement of individuals and society... Support, empowerment, and lasting impact.' }}
            </p>
            
            <!-- ===== Contact Us Button ===== -->
            <a href="{{ url('/en/contact') }}" class="cta-button">
                <i class="fas fa-phone-alt"></i>
                Contact Us
            </a>
        </div>

        <!-- ===== Images Container on Left ===== -->
        <div class="hero-images">
            
            <!-- First Container (Large - Primary Color) -->
            <div class="image-container-1">
                <div class="frame-1"></div>
                <div class="color-box-1"
                    style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), 
                    @if(optional($hero)->image1_url)
                        url('{{ asset('storage/' . $hero->image1_url) }}')
                    @else
                        url('{{ asset('assets/images/default-hero.jpg') }}')
                    @endif
                    center/cover">
                </div>
            </div>

            <!-- Second Container (Small - Secondary Color) -->
            <div class="image-container-2">
                <div class="frame-2"></div>
                <div class="color-box-2"
                    style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), 
                    @if(optional($hero)->image2_url)
                        url('{{ asset('storage/' . $hero->image2_url) }}')
                    @else
                        url('{{ asset('assets/images/default-hero-2.jpg') }}')
                    @endif
                    center/cover">
                </div>
            </div>
        </div>
    </section>

    <!-- ===== About Us Section ===== -->
    <section class="about-section" id="about">
        <div class="about-pattern"></div>
        <div class="about-container">
            <div class="about-content">

                <!-- Image on Right -->
                <div class="about-image">
                    <div class="about-image-container">
                        <div class="about-frame"></div>
                        <div class="about-color-box"
                            style="background: linear-gradient(rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.1)), 
                            @if(optional($about)->image_url)
                                url('{{ asset('storage/' . $about->image_url) }}')
                            @else
                                url('{{ asset('assets/images/default-about.jpg') }}')
                            @endif
                            center/cover">
                        </div>
                    </div>
                </div>
                
                <!-- Text on Left -->
                <div class="about-text">
                    <h2 class="about-title">
                        About 
                        <span class="highlighted-text">
                            Us
                            <img src="{{ asset('assets/images/Decore-line.svg') }}" alt="" class="title-line">
                        </span>
                    </h2>
                    <p class="about-description">
                        {{ optional($about)->description_en ?? 'Albena Foundation for Sustainable Development is a civil society organization established in June 2022, based in Yemen - Hadramout Governorate. The foundation seeks to achieve community knowledge and skills development to be among the pioneering civil society organizations in creating a decent life. The foundation aims to develop the capacities and skills of Yemeni women to enable them to perform their life roles efficiently and effectively, as well as building youth capacities to qualify them for competing in the labor market; caring for children and developing the capacities of outstanding and distinguished ones; the foundation also aims to economically empower the Yemeni family through implementing developmental projects and supporting small income-generating projects. We also aim to contribute to formulating solutions for society\'s problems and issues; likewise, among our goals is contributing to advancing the educational process and women\'s literacy. Relief and assistance projects and contributing to reconstruction and rebuilding what was destroyed by the war are among our most important and prominent goals.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Vision, Mission & Values Section ===== -->
    <section class="vision-mission-section" id="vision-mission">
        <div class="vision-mission-container">
            <h2 class="section-title">
                Our Vision 
                <span class="highlighted-text">
                    & Mission
                    <img src="{{ asset('assets/images/Decore-line.svg') }}" alt="" class="title-line">
                </span>
            </h2>
            
            <div class="half-circle-pattern"></div>

            <div class="vision-mission-content">
                <!-- Vision -->
                <div class="vision-item">
                    <div class="icon-container">
                        <div class="icon-frame"></div>
                        <div class="icon-background"></div>
                        <i class="fas fa-eye icon"></i>
                    </div>
                    <h3 class="item-title">Vision</h3>
                    <p class="item-description">
                        {{ optional($visionMission)->vision_en ?? 'A Yemeni woman who draws inspiration from her civilizational role to shape the future' }}
                    </p>
                </div>
                <div class="half-circle-pattern2"></div>
                <!-- Mission -->
                <div class="mission-item">
                    <div class="icon-container">
                        <div class="icon-frame"></div>
                        <div class="icon-background"></div>
                        <i class="fas fa-bullseye icon"></i>
                    </div>
                    <h3 class="item-title">Mission</h3>
                    <p class="item-description">
                        {{ optional($visionMission)->mission_en ?? 'Balanced building of Yemeni women to enable them to perform their mission role in life, according to a fair and integrated value system.' }}
                    </p>
                </div>
                
                <!-- Values -->
                <div class="values-item">
                    <div class="icon-container">
                        <div class="icon-frame"></div>
                        <div class="icon-background"></div>
                        <i class="fas fa-heart icon"></i>
                    </div>
                    <h3 class="item-title">Values</h3>
                    <p class="item-description">
                        {{ optional($visionMission)->values_en ?? 'Quality, qualitative outputs, innovation, community development, shared responsibility' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

<!-- ===== Goals Section ===== -->
<section id="goals" class="section goals-section">
    <div class="goals-container">
        <div class="goals-content">
            
            <!-- Text with Slider -->
            <div class="goals-text">
                <h2 class="goals-title">
                    Organization
                    <span class="highlighted-text">
                        Goals
                        <img src="/assets/images/Decore-line.svg" alt="" class="title-line">
                    </span>
                </h2>
                
                @if(isset($goals) && $goals->count() > 0)
                <div class="goals-slider-container">
                    <div class="goals-slider">
                        <!-- Previous Button -->
                        <button id="goalsArrowPrev" class="goals-arrow-btn" aria-label="Previous">
                            <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M15.5 5l-7 7 7 7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>

                        <!-- Viewport -->
                        <div id="goalsViewport" class="goals-viewport">
                            <div id="goalsTrack" class="goals-track">
                                @foreach($goals as $index => $goal)
                                <!-- Goal {{ $index + 1 }} -->
                                <div class="goals-slide">
                                    <span class="goal-number">{{ $index + 1 }}</span>
                                    <p class="goal-text">{{ $goal->goal_en ?? 'Organization Goal' }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Next Button -->
                        <button id="goalsArrowNext" class="goals-arrow-btn" aria-label="Next">
                            <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.5 19l7-7-7-7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Pagination Dots -->
                    <div class="goals-dots" aria-label="Navigate between goals"></div>
                </div>
                @else
                <div class="no-goals">
                    <p>No goals added yet</p>
                </div>
                @endif
                <div class="goals-circle-pattern"></div>
            </div>

            <!-- Image -->
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
<!-- ===== Foundation Fields Section ===== -->
<section class="fields-section" id="fields">
    <div class="fields-container">
        <div class="fields-content">
            
            <!-- Text with Slider -->
            <div class="fields-text">
                <h2 class="fields-title">
                    Foundation
                    <span class="highlighted-text">
                        Fields
                        <img src="{{ asset('assets/images/Decore-line.svg') }}" alt="" class="title-line">
                    </span>
                </h2>
                
                <div class="fields-content-wrapper">
                    <!-- Slider -->
                    <div class="fields-slider-container">
                        <div class="fields-slider">
                            <!-- Previous Button -->
                            <button id="fieldsArrowPrevEn" class="fields-arrow-btn" aria-label="Previous">
                                <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M15.5 5l-7 7 7 7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>

                            <!-- Viewport -->
                            <div id="fieldsViewportEn" class="fields-viewport">
                                <div id="fieldsTrackEn" class="fields-track">
                                    @if(isset($fields) && $fields->count() > 0)
                                        @foreach($fields as $field)
                                        <!-- Field {{ $loop->iteration }} -->
                                        <a href="{{ route('field.gallery.en', $field->id) }}" class="field-link">
                                            <div class="field-item">
                                                <div class="field-icon-container">
                                                    <div class="field-icon-wrapper">
                                                        <img src="{{ $field->icon_image ? asset('storage/' . $field->icon_image) : asset('assets/images/default-field.svg') }}" 
                                                            alt="{{ $field->name_en ?? 'Foundation Field' }}" 
                                                            class="field-icon-img">
                                                    </div>
                                                </div>
                                                <span class="field-name">{{ $field->name_en ?? 'Field' }}</span>
                                            </div>
                                        </a>
                                        @endforeach
                                    @else
                                        <!-- Show message if no fields -->
                                        <div class="no-fields-message">
                                            <p>No fields added yet</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Next Button -->
                            <button id="fieldsArrowNextEn" class="fields-arrow-btn" aria-label="Next">
                                <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.5 19l7-7-7-7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Pagination Dots -->
                        <div class="fields-dots" aria-label="Navigate between fields"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== Our Projects Section ===== -->
<section class="projects-section" id="projects">
    <div class="projects-container">
        <div class="projects-header">
            <h2 class="projects-title">
                Foundation
                <span class="highlighted-text">
                    Projects
                    <img src="{{ asset('assets/images/Decore-line.svg') }}" alt="" class="title-line">
                </span>
            </h2>
        </div>

        <div class="projects-slider-container">
            <!-- Slider -->
            <div class="projects-slider">
                <!-- Previous Button -->
                <button id="projectsArrowPrevEn" class="projects-arrow-btn" aria-label="Previous">
                    <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M15.5 5l-7 7 7 7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <!-- Viewport -->
                <div id="projectsViewportEn" class="projects-viewport">
                    <div id="projectsTrackEn" class="projects-track">
                        @if(isset($projects) && $projects->count() > 0)
                            @foreach($projects as $project)
                            <!-- Project {{ $loop->iteration }} -->
                            <div class="project-card">
                                <div class="project-image-container">
                                    <img class="project-image" 
                                         src="{{ $project->image_url ? asset('storage/' . $project->image_url) : asset('assets/images/default-project.jpg') }}" 
                                         alt="{{ $project->name_en ?? 'Foundation Project' }}">
                                    <div class="project-overlay">
                                        <div class="project-info">
                                            <h3 class="project-title">{{ $project->name_en ?? 'Project Name' }}</h3>
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
                            <!-- Show message if no projects -->
                            <div class="project-card no-projects-message">
                                <p>No projects added yet</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Next Button -->
                <button id="projectsArrowNextEn" class="projects-arrow-btn" aria-label="Next">
                    <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.5 19l7-7-7-7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            
            <!-- Pagination Dots -->
            <div class="projects-dots" aria-label="Navigate between projects"></div>
        </div>
    </div>
</section>

<!-- ===== News Section ===== -->
<section class="news-section" id="news">
    <div class="news-container">
        <div class="news-header">
            <h2 class="news-title">
                <span class="highlighted-text">
                    Foundation News
                    <img src="{{ asset('assets/images/Decore-line.svg') }}" alt="" class="title-line">
                </span>
            </h2>
        </div>

        <div class="news-content">
            <!-- Images on Left -->
            <div class="news-images">
                <div class="news-image-container">
                    <div class="news-frame"></div>
                    <div class="news-color-box">
                        <!-- Current news images slider -->
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
                                                     alt="News Image {{ $index + 1 }}" 
                                                     class="news-main-image">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="news-image-slide active">
                                            <img src="{{ asset('assets/images/default-news.jpg') }}" 
                                                 alt="No images available" 
                                                 class="news-main-image">
                                        </div>
                                    @endif
                                @else
                                    <div class="news-image-slide active">
                                        <img src="{{ asset('assets/images/default-news.jpg') }}" 
                                             alt="No news available" 
                                             class="news-main-image">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Dots for current news images slider -->
                        <div class="news-images-dots" id="currentNewsImagesDots">
                            <!-- Will be filled by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Text on Right -->
            <div class="news-text">
                @if(isset($news) && $news->count() > 0)
                <!-- News Slider -->
                <div class="news-slider">
                    <div class="news-track" id="newsTrack">
                        @foreach($news as $index => $newsItem)
                        <!-- News {{ $index + 1 }} -->
                        <div class="news-slide {{ $index === 0 ? 'active' : '' }}"
                             data-index="{{ $index }}"
                             data-news-id="{{ $newsItem->id }}"
                             data-images='@json($newsItem->images ?? [])'>
                            <h3 class="news-item-title">{{ $newsItem->title_en ?? 'News Title' }}</h3>
                            <p class="news-item-description">
                                {{ $newsItem->content_en ?? 'News Content' }}
                            </p>
                            <p class="news-item-date">
                                <i class="fas fa-calendar-alt"></i>
                                {{ optional($newsItem->date ?? $newsItem->created_at)->format('F d, Y') ?? 'Date not specified' }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- News Slider Control Buttons -->
                <div class="news-controls">
                    <button class="news-btn prev-news-btn" id="prevNewsBtn">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="news-btn next-news-btn" id="nextNewsBtn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                @else
                <div class="no-news-message">
                    <p>No news added yet</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>


<!-- ===== Success Stories Section ===== -->
<section class="success-stories-section" id="success-stories">
    <div class="success-stories-pattern"></div>
    <div class="success-stories-container">
        <!-- Text on Left with Slider -->
        <h2 class="success-stories-title">
            <span class="highlighted-text">
                Success Stories
                <img src="{{ asset('assets/images/Decore-line.svg') }}" alt="" class="title-line">
            </span>
        </h2>

        @if(isset($successStories) && $successStories->count() > 0)
            <div class="success-stories-content">
                <!-- Large Card in Center -->
                <div class="success-stories-card">
                    <div class="quotation-mark-bottom"></div>

                    <div class="quotation-mark">
                        <img src="{{ asset('assets/images/quotation mark.svg') }}" alt="Quotation mark">
                    </div>

                    <!-- Stories Slider -->
                    <div class="stories-slider">
                        <div class="stories-track" id="storiesTrack">
                            @foreach($successStories as $index => $story)
                                <div class="story-slide {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                                    <h3 class="story-title">{{ $story->title_en ?? 'Story Title' }}</h3>
                                    <p class="story-description">
                                        {{ $story->content_en ?? 'Story Content' }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Control Buttons -->
                    <div class="stories-controls">
                        <button class="story-btn prev-story-btn" id="prevStoryBtn">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="story-btn next-story-btn" id="nextStoryBtn">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>

                    <!-- Navigation Dots -->
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
                <p>No success stories available at the moment.</p>
            </div>
        @endif
    </div>
</section>


<!-- ===== Footer ===== -->
@include('partials.site.footer')

    <!-- ===== Separate JavaScript File ===== -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- ===== Code to force loading new favicon ===== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Solution 1: Add new favicon link
    var link = document.createElement('link');
    link.rel = 'icon';
    link.href = '/favicon.ico?force=' + new Date().getTime();
    document.head.appendChild(link);
    
    // Solution 2: Reload page if old favicon is loaded
    setTimeout(function() {
        if (!document.querySelector('link[href*="favicon"]')) {
            location.reload();
        }
    }, 500);
});
</script>
@endsection