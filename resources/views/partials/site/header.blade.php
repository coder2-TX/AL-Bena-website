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