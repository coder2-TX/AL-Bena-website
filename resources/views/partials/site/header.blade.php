@php
    $isEnglish = app()->getLocale() === 'en';

    $brandLabel = $isEnglish
        ? 'Albena Foundation'
        : 'مؤسسة البناء';

    $logoAlt = $isEnglish
        ? 'Albena Foundation Logo'
        : 'شعار مؤسسة البناء';

    $menuLabel = $isEnglish
        ? 'Open menu'
        : 'فتح القائمة';

    $navigationLabel = $isEnglish
        ? 'Main navigation'
        : 'التنقل الرئيسي';

    $navigationItems = $isEnglish
        ? [
            ['href' => '#home', 'label' => 'Home'],
            ['href' => '#about', 'label' => 'About Us'],
            ['href' => '#goals', 'label' => 'Goals'],
            ['href' => '#fields', 'label' => 'Fields'],
            ['href' => '#projects', 'label' => 'Projects'],
            ['href' => '#news', 'label' => 'News'],
            ['href' => '#success-stories', 'label' => 'Success Stories'],
            ['href' => route('reports.en'), 'label' => 'Reports'],
            ['href' => url('/en/contact'), 'label' => 'Contact Us'],
        ]
        : [
            ['href' => '#home', 'label' => 'الرئيسية'],
            ['href' => '#about', 'label' => 'من نحن'],
            ['href' => '#goals', 'label' => 'الأهداف'],
            ['href' => '#fields', 'label' => 'المجالات'],
            ['href' => '#projects', 'label' => 'المشاريع'],
            ['href' => '#news', 'label' => 'الاخبار'],
            ['href' => '#success-stories', 'label' => 'قصص النجاح'],
            ['href' => url('/reports'), 'label' => 'تقارير'],
            ['href' => url('/contact'), 'label' => 'تواصل معنا'],
        ];

    $languageUrl = $isEnglish ? '/' : '/en';
    $languageCode = $isEnglish ? 'AR' : 'EN';
    $languageHreflang = $isEnglish ? 'ar' : 'en';
    $languageLabel = $isEnglish
        ? 'Switch to Arabic'
        : 'Switch to English';
@endphp

<header class="site-header" id="header">
    <div class="container header-inner">
        <a class="brand" href="#home" aria-label="{{ $brandLabel }}">
            <img
                src="{{ $isEnglish ? asset('assets/images/logo.svg') : '/assets/images/logo.svg' }}"
                alt="{{ $logoAlt }}"
                class="brand-logo"
            >
        </a>

        <button
            class="nav-toggle"
            aria-expanded="false"
            aria-controls="primary-nav"
            aria-label="{{ $menuLabel }}"
            id="navToggle"
        >
            <span class="nav-toggle-bar"></span>
            <span class="nav-toggle-bar"></span>
            <span class="nav-toggle-bar"></span>
        </button>

        <nav
            id="primary-nav"
            class="nav"
            aria-label="{{ $navigationLabel }}"
        >
            <ul class="nav-list">
                @foreach ($navigationItems as $item)
                    <li><a href="{{ $item['href'] }}" class="nav-link{{ $loop->first ? ' active' : '' }}">{{ $item['label'] }}</a></li>
                @endforeach
            </ul>

            <a class="lang-switch" href="{{ $languageUrl }}" hreflang="{{ $languageHreflang }}" aria-label="{{ $languageLabel }}">{{ $languageCode }}</a>
        </nav>
    </div>
</header>