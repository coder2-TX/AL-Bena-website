<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

    <!-- ===== SEO ===== -->
    <title>{{ $field->name_ar }} - معرض الصور | مؤسسة البناء للتنمية المستدامة</title>

    <!-- ===== Social Share / Open Graph ===== -->
    @php
        $shareTitle = ($field->name_ar ?? 'معرض الصور') . ' - معرض الصور | مؤسسة البناء للتنمية المستدامة';

        $shareDescription = 'استعرض معرض الصور الخاص بـ '
            . ($field->name_ar ?? 'هذا المجال')
            . ' في مؤسسة البناء للتنمية المستدامة.';
    @endphp

    @include('partials.social-share')

    <meta property="og:locale" content="ar_YE">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/styles.css') }}?v={{ filemtime(public_path('assets/css/styles.css')) }}"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css"
    >

    <style>
        /* ستايلات خاصة بصفحة معرض الصور */
        .gallery-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 20px;
    }
    
    /* هيدر المعرض - تم تعديل الـ padding */
    .gallery-header-section {
      position: relative;
      overflow: hidden;
      padding: 150px 0 0 0; /* زدنا من 120px إلى 150px */
      margin: 60px 0 80px;
    }
    
    .gallery-header-background {
      position: absolute;
      width: 100vw;
      height: calc(100% - 60px);
      background: var(--primary-color);
      top: 60px;
      left: 0;
      z-index: 1;
    }
    
    .gallery-header-container {
      position: relative;
      z-index: 2;
      width: 100%;
      padding: 0px 20px 50px; /* زدنا من 40px إلى 60px */
      display: flex;
      justify-content: flex-end;
    }
    
    .gallery-header-content {
      color: white;
      text-align: right;
      width: 45%;
      max-width: 550px;
      margin-right: 100px;
    }
    
    .gallery-main-title {
      font-size: 2.8rem; /* كبرنا الخط شوية */
      font-weight: 800;
      margin-bottom: 20px; /* زدنا المسافة */
      line-height: 1.2;
      text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .gallery-subtitle {
      font-size: 1.5rem; /* كبرنا الخط */
      font-weight: 300;
      opacity: 0.95;
      margin: 0;
      padding-right: 10px;
    }
    
    /* شبكة الصور - تم تقليل المسافة العلوية */
    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 30px;
      margin: 100px 0 80px; /* قللنا من 40px إلى 20px */
    }
    
    .gallery-item {
      background: white;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .gallery-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    .gallery-image {
      width: 100%;
      height: 250px;
      object-fit: cover;
      border-bottom: 3px solid var(--primary-color);
      cursor: pointer;
    }
    
    .gallery-info {
      padding: 20px;
      text-align: center; /* توسيط النص */
    }
    
    .gallery-name-ar {
      color: var(--black);
      font-size: 1.1rem;
      font-weight: 600;
      margin: 0;
    }
    
    /* حالة عدم وجود صور */
    .empty-gallery {
      text-align: center;
      padding: 100px 20px;
      color: #666;
    }
    
    .empty-gallery-icon {
      font-size: 4rem;
      color: #ddd;
      margin-bottom: 25px;
    }
    
    .empty-gallery-text {
      font-size: 1.4rem;
      margin-bottom: 15px;
      color: var(--black);
    }
    
    .empty-gallery-subtext {
      font-size: 1.1rem;
      margin-bottom: 30px;
      color: #777;
    }
    
    .back-button {
      display: inline-block;
      padding: 12px 30px;
      background: var(--primary-color);
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 500;
      transition: background 0.3s ease;
    }
    
    .back-button:hover {
      background: var(--secondary-color);
    }
    
    /* Lightbox أساسي */
    .lightbox-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.95);
      z-index: 1000;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }
    
    .lightbox-content {
      max-width: 90%;
      max-height: 90%;
      position: relative;
    }
    
    .lightbox-image {
      width: 100%;
      height: auto;
      max-height: 80vh;
      object-fit: contain;
      border-radius: 10px;
      box-shadow: 0 0 40px rgba(0,0,0,0.5);
    }
    
    .lightbox-close {
      position: absolute;
      top: -50px;
      left: 0;
      color: white;
      font-size: 2.5rem;
      cursor: pointer;
      background: none;
      border: none;
      opacity: 0.8;
      transition: opacity 0.3s ease;
    }
    
    .lightbox-close:hover {
      opacity: 1;
    }
    
    .lightbox-nav {
      position: absolute;
      top: 50%;
      width: 100%;
      display: flex;
      justify-content: space-between;
      padding: 0 30px;
      transform: translateY(-50%);
    }
    
    .lightbox-nav button {
      background: rgba(255, 255, 255, 0.25);
      border: none;
      color: white;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      font-size: 1.8rem;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .lightbox-nav button:hover {
      background: rgba(255, 255, 255, 0.4);
      transform: scale(1.1);
    }
    
    /* تنسيق العداد */
    .lightbox-counter {
      position: absolute;
      bottom: -50px;
      left: 0;
      color: white;
      font-size: 1.2rem;
      text-align: center;
      width: 100%;
    }
    
    /* التجاوب */
    @media (max-width: 768px) {
      .gallery-header-section {
        padding: 130px 0 0 0; /* تعديل للجوال */
      }
      
      .gallery-header-container {
        padding: 40px 20px 40px; /* تقليل للجوال */
      }
      
      .gallery-header-content {
        width: 100%;
        margin-right: 0;
        text-align: center;
      }
      
      .gallery-main-title {
        font-size: 2.2rem;
      }
      
      .gallery-subtitle {
        font-size: 1.3rem;
      }
      
      .gallery-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        margin: 15px 0 60px;
      }
      
      .gallery-image {
        height: 220px;
      }
      
      .lightbox-nav button {
        width: 50px;
        height: 50px;
        font-size: 1.5rem;
      }
    }
    
    @media (max-width: 480px) {
      .gallery-grid {
        grid-template-columns: 1fr;
        gap: 15px;
      }
      
      .gallery-image {
        height: 200px;
      }
    }
  </style>
</head>

<body>

  <!-- ===== Header ===== -->
  <header class="site-header" id="header">
    <div class="container header-inner">
      <a class="brand" href="/" aria-label="مؤسسة البناء">
        <img src="{{ asset('assets/images/logo.svg') }}" alt="شعار مؤسسة البناء" class="brand-logo">
      </a>

      <button class="nav-toggle" aria-expanded="false" aria-controls="primary-nav" aria-label="فتح القائمة" id="navToggle">
        <span class="nav-toggle-bar"></span>
        <span class="nav-toggle-bar"></span>
        <span class="nav-toggle-bar"></span>
      </button>

      <nav id="primary-nav" class="nav" aria-label="التنقل الرئيسي">
        <ul class="nav-list">
          <li><a href="/" class="nav-link">الرئيسية</a></li>
          <li><a href="/#about" class="nav-link">من نحن</a></li>
          <li><a href="/#goals" class="nav-link">الأهداف</a></li>
          <li><a href="/#fields" class="nav-link active">المجالات</a></li>
          <li><a href="/#projects" class="nav-link">المشاريع</a></li>
          <li><a href="/#news" class="nav-link">الاخبار</a></li>
          <li><a href="/#success-stories" class="nav-link">قصص النجاح</a></li>
          <li><a href="/reports" class="nav-link">التقارير</a></li>
          <li><a href="/contact" class="nav-link">تواصل معنا</a></li>
        </ul>
        <a class="lang-switch" href="/en/field/{{ $field->id }}/gallery" hreflang="en" aria-label="Switch to English">EN</a>
      </nav>
    </div>
  </header>
  
  <!-- ===== قسم هيدر المعرض ===== -->
  <section class="gallery-header-section">
    <div class="gallery-header-background"></div>
    
    <div class="container gallery-header-container">
      <div class="gallery-header-content">
        <h1 class="gallery-main-title">{{ $field->name_ar }}</h1>
        <p class="gallery-subtitle">معرض الصور والفعاليات</p>
      </div>
    </div>
  </section>

  <!-- ===== قسم معرض الصور ===== -->
  <section class="contact-form-section">
    <div class="gallery-container">
      @if($field->galleries->count() > 0)
        <div class="gallery-grid" id="galleryGrid">
          @foreach($field->galleries as $gallery)
            <div class="gallery-item" data-index="{{ $loop->index }}">
              <img src="{{ asset('storage/' . $gallery->image) }}" 
                   alt="{{ $gallery->name_ar }}" 
                   class="gallery-image"
                   onclick="openLightbox({{ $loop->index }})">
              
              <div class="gallery-info">
                <h3 class="gallery-name-ar">{{ $gallery->name_ar }}</h3>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="empty-gallery">
          <div class="empty-gallery-icon">
            <i class="fas fa-images"></i>
          </div>
          <h3 class="empty-gallery-text">لا توجد صور في هذا المجال بعد</h3>
          <p class="empty-gallery-subtext">سيتم إضافة الصور قريباً</p>
          <a href="/" class="back-button">العودة للرئيسية</a>
        </div>
      @endif
    </div>
  </section>

  <!-- ===== Lightbox مع العداد ===== -->
  <div class="lightbox-overlay" id="lightbox">
    <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
    
    <div class="lightbox-nav">
      <button onclick="prevImage()"><i class="fas fa-chevron-right"></i></button>
      <button onclick="nextImage()"><i class="fas fa-chevron-left"></i></button>
    </div>
    
    <div class="lightbox-content">
      <img id="lightboxImage" src="" alt="" class="lightbox-image">
      <div class="lightbox-counter">
        <span id="currentIndex">1</span> / <span id="totalImages">{{ $field->galleries->count() }}</span>
      </div>
    </div>
  </div>

  <!-- ===== الفوتر ===== -->
  <footer class="site-footer">
    <div class="footer-container">
      <div class="footer-content">
        <!-- النص الرئيسي والفرعي -->
        <div class="footer-text">
          <h3 class="footer-main-text">{{ $footer->main_text_ar ?? 'معًا نصنع الأثر' }}</h3>
          <p class="footer-sub-text">{{ $footer->sub_text_ar ?? 'تواصل معنا لمعرفة المزيد' }}</p>
        </div>

        <!-- رقم الهاتف -->
        <div class="footer-contact">
          <h4 class="contact-title">رقم الهاتف</h4>
          <p class="contact-info">{{ $footer->phone_ar ?? '+967 777 777 777' }}</p>
        </div>

        <!-- البريد الإلكتروني -->
        <div class="footer-contact">
          <h4 class="contact-title">البريد الالكتروني</h4>
          <p class="contact-info">{{ $footer->email_ar ?? 'albena@gmail.com' }}</p>
        </div>

        <!-- الموقع -->
        <div class="footer-contact">
          <h4 class="contact-title">الموقع</h4>
          <p class="contact-info">{{ $footer->location_ar ?? 'سيئون - القرن - مدرسة القرن' }}</p>
        </div>

        <!-- وسائل التواصل -->
        <div class="footer-social">
          <h4 class="social-title">{{ $footer->social_title_ar ?? 'تواصل معنا عبر' }}</h4>
          <div class="social-icons">
            <a href="{{ $footer->whatsapp_url ?? '#' }}" class="social-icon" target="_blank">
              <i class="fab fa-whatsapp"></i>
            </a>
            <a href="{{ $footer->facebook_url ?? '#' }}" class="social-icon" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          </div>
        </div>
      </div>
      
      <!-- حقوق النشر -->
      <div class="footer-bottom">
        <p class="copyright">{{ $footer->copyright_ar ?? 'جميع الحقوق محفوظة لمؤسسة البناء للتنمية البشرية © 2025' }}</p>
      </div>
    </div>
  </footer>
  
  <!-- ===== ملف JavaScript منفصل ===== -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  
  <script>
    // Lightbox Script مع العداد
    let currentIndex = 0;
    const images = [];
    
    @foreach($field->galleries as $gallery)
      images.push({
        src: "{{ asset('storage/' . $gallery->image) }}",
        alt: "{{ $gallery->name_ar }}"
      });
    @endforeach
    
    function openLightbox(index) {
      currentIndex = index;
      const lightbox = document.getElementById('lightbox');
      const lightboxImage = document.getElementById('lightboxImage');
      const currentIndexSpan = document.getElementById('currentIndex');
      const totalImagesSpan = document.getElementById('totalImages');
      
      lightboxImage.src = images[index].src;
      lightboxImage.alt = images[index].alt;
      currentIndexSpan.textContent = index + 1;
      totalImagesSpan.textContent = images.length;
      lightbox.style.display = 'flex';
      document.body.style.overflow = 'hidden';
    }
    
    function closeLightbox() {
      document.getElementById('lightbox').style.display = 'none';
      document.body.style.overflow = 'auto';
    }
    
    function nextImage() {
      currentIndex = (currentIndex + 1) % images.length;
      updateLightboxImage();
    }
    
    function prevImage() {
      currentIndex = (currentIndex - 1 + images.length) % images.length;
      updateLightboxImage();
    }
    
    function updateLightboxImage() {
      const lightboxImage = document.getElementById('lightboxImage');
      const currentIndexSpan = document.getElementById('currentIndex');
      
      lightboxImage.src = images[currentIndex].src;
      lightboxImage.alt = images[currentIndex].alt;
      currentIndexSpan.textContent = currentIndex + 1;
    }
    
    // إغلاق Lightbox عند الضغط على ESC
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') closeLightbox();
      if (e.key === 'ArrowRight' || e.key === 'd') nextImage();
      if (e.key === 'ArrowLeft' || e.key === 'a') prevImage();
    });
    
    // إغلاق Lightbox عند الضغط على الخلفية
    document.getElementById('lightbox').addEventListener('click', function(e) {
      if (e.target === this) closeLightbox();
    });
    
  </script>
  
</body>
</html>