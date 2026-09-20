<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

    <!-- ===== SEO ===== -->
    <title>{{ $field->name_en }} - Photo Gallery | Al-Benaa Foundation</title>

    <!-- ===== Social Share / Open Graph ===== -->
    @php
        $shareTitle = ($field->name_en ?? 'Field Gallery') . ' - Photo Gallery | Al-Benaa Foundation';

        $shareDescription = 'Explore the photo gallery for '
            . ($field->name_en ?? 'this field')
            . ' at Albena Foundation for Sustainable Development.';
    @endphp

    @include('partials.social-share')

    <meta property="og:locale" content="en_US">

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
        /* Gallery Page Styles */
      .gallery-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 20px;
    }
    
    /* Gallery Header */
    .gallery-header-section {
      position: relative;
      overflow: hidden;
      padding: 150px 0 0 0;
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
      padding: 0px 20px 50px;
      display: flex;
      justify-content: flex-start;
    }
    
    .gallery-header-content {
      color: white;
      text-align: left;
      width: 45%;
      max-width: 550px;
      margin-left: 100px;
    }
    
    .gallery-main-title {
      font-size: 2.8rem;
      font-weight: 800;
      margin-bottom: 20px;
      line-height: 1.2;
      text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .gallery-subtitle {
      font-size: 1.5rem;
      font-weight: 300;
      opacity: 0.95;
      margin: 0;
      padding-left: 10px;
    }
    
    /* Gallery Grid */
    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 30px;
      margin: 100px 0 80px;
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
      text-align: center;
    }
    
    .gallery-name-en {
      color: var(--black);
      font-size: 1.1rem;
      font-weight: 600;
      margin: 0;
    }
    
    /* Empty State */
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
    
    /* Lightbox */
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
      right: 0;
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
    
    /* Counter */
    .lightbox-counter {
      position: absolute;
      bottom: -50px;
      right: 0;
      color: white;
      font-size: 1.2rem;
      text-align: center;
      width: 100%;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
      .gallery-header-section {
        padding: 130px 0 0 0;
      }
      
      .gallery-header-container {
        padding: 40px 20px 40px;
      }
      
      .gallery-header-content {
        width: 100%;
        margin-left: 0;
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
      <a class="brand" href="/en" aria-label="Al-Benaa Foundation">
        <img src="{{ asset('assets/images/logo.svg') }}" alt="Al-Benaa Foundation Logo" class="brand-logo">
      </a>

      <button class="nav-toggle" aria-expanded="false" aria-controls="primary-nav" aria-label="Open menu" id="navToggle">
        <span class="nav-toggle-bar"></span>
        <span class="nav-toggle-bar"></span>
        <span class="nav-toggle-bar"></span>
      </button>

      <nav id="primary-nav" class="nav" aria-label="Main Navigation">
        <ul class="nav-list">
          <li><a href="/en" class="nav-link">Home</a></li>
          <li><a href="/en#about" class="nav-link">About Us</a></li>
          <li><a href="/en#goals" class="nav-link">Goals</a></li>
          <li><a href="/en#fields" class="nav-link active">Fields</a></li>
          <li><a href="/en#projects" class="nav-link">Projects</a></li>
          <li><a href="/en#news" class="nav-link">News</a></li>
          <li><a href="/en#success-stories" class="nav-link">Success Stories</a></li>
          <li><a href="/en/reports" class="nav-link">Reports</a></li>
          <li><a href="/en/contact" class="nav-link">Contact Us</a></li>
        </ul>
        <a class="lang-switch" href="/field/{{ $field->id }}/gallery" hreflang="ar" aria-label="التبديل إلى العربية">AR</a>
      </nav>
    </div>
  </header>
  
  <!-- ===== Gallery Header Section ===== -->
  <section class="gallery-header-section">
    <div class="gallery-header-background"></div>
    
    <div class="container gallery-header-container">
      <div class="gallery-header-content">
        <h1 class="gallery-main-title">{{ $field->name_en }}</h1>
        <p class="gallery-subtitle">Photo Gallery & Events</p>
      </div>
    </div>
  </section>

  <!-- ===== Photo Gallery Section ===== -->
  <section class="contact-form-section">
    <div class="gallery-container">
      @if($field->galleries->count() > 0)
        <div class="gallery-grid" id="galleryGrid">
          @foreach($field->galleries as $gallery)
            <div class="gallery-item" data-index="{{ $loop->index }}">
              <img src="{{ asset('storage/' . $gallery->image) }}" 
                   alt="{{ $gallery->name_en }}" 
                   class="gallery-image"
                   onclick="openLightbox({{ $loop->index }})">
              
              <div class="gallery-info">
                <h3 class="gallery-name-en">{{ $gallery->name_en }}</h3>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="empty-gallery">
          <div class="empty-gallery-icon">
            <i class="fas fa-images"></i>
          </div>
          <h3 class="empty-gallery-text">No photos in this field yet</h3>
          <p class="empty-gallery-subtext">Photos will be added soon</p>
          <a href="/en" class="back-button">Back to Home</a>
        </div>
      @endif
    </div>
  </section>

  <!-- ===== Lightbox with Counter ===== -->
  <div class="lightbox-overlay" id="lightbox">
    <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
    
    <div class="lightbox-nav">
      <button onclick="prevImage()"><i class="fas fa-chevron-left"></i></button>
      <button onclick="nextImage()"><i class="fas fa-chevron-right"></i></button>
    </div>
    
    <div class="lightbox-content">
      <img id="lightboxImage" src="" alt="" class="lightbox-image">
      <div class="lightbox-counter">
        <span id="currentIndex">1</span> / <span id="totalImages">{{ $field->galleries->count() }}</span>
      </div>
    </div>
  </div>

  <!-- ===== Footer ===== -->
  <footer class="site-footer">
    <div class="footer-container">
      <div class="footer-content">
        <!-- Main and Sub Text -->
        <div class="footer-text">
          <h3 class="footer-main-text">{{ $footer->main_text_en ?? 'Together We Make an Impact' }}</h3>
          <p class="footer-sub-text">{{ $footer->sub_text_en ?? 'Contact us to learn more' }}</p>
        </div>

        <!-- Phone Number -->
        <div class="footer-contact">
          <h4 class="contact-title">Phone Number</h4>
          <p class="contact-info">{{ $footer->phone_en ?? '+967 777 777 777' }}</p>
        </div>

        <!-- Email -->
        <div class="footer-contact">
          <h4 class="contact-title">Email</h4>
          <p class="contact-info">{{ $footer->email_en ?? 'albena@gmail.com' }}</p>
        </div>

        <!-- Location -->
        <div class="footer-contact">
          <h4 class="contact-title">Location</h4>
          <p class="contact-info">{{ $footer->location_en ?? 'Seiyun - Al-Qarn - Al-Qarn School' }}</p>
        </div>

        <!-- Social Media -->
        <div class="footer-social">
          <h4 class="social-title">{{ $footer->social_title_en ?? 'Connect with us' }}</h4>
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
      
      <!-- Copyright -->
      <div class="footer-bottom">
        <p class="copyright">{{ $footer->copyright_en ?? 'All rights reserved to Al-Benaa Foundation © 2025' }}</p>
      </div>
    </div>
  </footer>
  
  <!-- ===== Separate JavaScript File ===== -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  
  <script>
    // Lightbox Script with Counter
    let currentIndex = 0;
    const images = [];
    
    @foreach($field->galleries as $gallery)
      images.push({
        src: "{{ asset('storage/' . $gallery->image) }}",
        alt: "{{ $gallery->name_en }}"
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
    
    // Close Lightbox on ESC
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') closeLightbox();
      if (e.key === 'ArrowRight' || e.key === 'd') nextImage();
      if (e.key === 'ArrowLeft' || e.key === 'a') prevImage();
    });
    
    // Close Lightbox on background click
    document.getElementById('lightbox').addEventListener('click', function(e) {
      if (e.target === this) closeLightbox();
    });
  </script>
  
</body>
</html>