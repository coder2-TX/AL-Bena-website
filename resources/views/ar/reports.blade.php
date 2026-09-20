<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

    <!-- ===== SEO ===== -->
    <title>التقارير - مؤسسة البناء للتنمية المستدامة</title>

    <!-- ===== Social Share / Open Graph ===== -->
    @php
        $shareTitle = 'التقارير | مؤسسة البناء للتنمية المستدامة';
        $shareDescription = 'اطلع على تقارير وإصدارات مؤسسة البناء للتنمية المستدامة.';
    @endphp

    @include('partials.social-share')

    <meta property="og:locale" content="ar_YE">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/styles.css') }}?v={{ filemtime(public_path('assets/css/styles.css')) }}"
    >

    <!-- رابط أيقونات Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css"
    >

    <style>
     /* ستايلات خاصة بصفحة التقارير */
    .reports-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }
    
    .reports-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 30px;
      margin: 40px 0;
    }
    
    .report-card {
      background: white;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      padding: 25px;
      transition: transform 0.3s ease;
    }
    
    .report-card:hover {
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .report-year {
      color: var(--primary-color);
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 25px;
      text-align: center;
      border-bottom: 2px solid var(--accent);
      padding-bottom: 10px;
    }
    
    .report-section {
      margin-bottom: 30px;
    }
    
    .report-section-title {
      color: var(--black);
      font-size: 1.3rem;
      font-weight: 600;
      margin-bottom: 18px;
      text-align: right;
      padding-right: 5px;
      position: relative;
    }
    
    .report-section-title::after {
      content: '';
      position: absolute;
      right: 0;
      bottom: -5px;
      width: 40px;
      height: 3px;
      background: var(--accent);
      border-radius: 2px;
    }
    
    .report-files {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    
    .report-file {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 15px;
      background: #f8f9fa;
      border-radius: 10px;
      transition: all 0.3s ease;
      border: 1px solid #eee;
    }
    
    .report-file:hover {
      background: #eef2f7;
      border-color: #ddd;
    }
    
    .file-info {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 4px;
    }
    
    .file-name {
      font-weight: 500;
      color: var(--black);
      font-size: 1rem;
    }
    
    .file-type {
      font-size: 0.85rem;
      color: #666;
      display: flex;
      align-items: center;
      gap: 5px;
    }
    
    .file-type::before {
      content: '';
      width: 8px;
      height: 8px;
      background: var(--accent);
      border-radius: 50%;
      display: inline-block;
    }
    
    .empty-state {
      text-align: center;
      padding: 60px 20px;
      color: #666;
    }
    
    .empty-state-icon {
      font-size: 3rem;
      color: #ddd;
      margin-bottom: 20px;
    }
    
    .empty-state-text {
      font-size: 1.2rem;
      margin-bottom: 10px;
    }
    
    /* تنسيق الهيدر */
    .reports-header-section {
      position: relative;
      overflow: hidden;
      padding: 120px 0 0 0;
      margin: 60px 0 100px;
    }
    
    .reports-header-background {
      position: absolute;
      width: 100vw;
      height: calc(100% - 60px);
      background: var(--primary-color);
      top: 60px;
      left: 0;
      z-index: 1;
    }
    
    .reports-header-container {
      position: relative;
      z-index: 2;
      width: 100%;
      padding: 40px 20px 60px;
      display: flex;
      justify-content: flex-end;
    }
    
    .reports-header-content {
      color: white;
      text-align: right;
      width: 45%;
      max-width: 550px;
      margin-right: 100px;
    }
    
    .reports-main-title {
      font-size: 2.5rem;
      font-weight: 800;
      margin-bottom: 16px;
      line-height: 1.2;
    }
    
    .reports-subtitle {
      font-size: 1.4rem;
      font-weight: 300;
      opacity: 0.9;
      margin: 0;
    }
    
    /* ستايل أيقونة التحميل الجديدة لصفحة التقارير */
    .download-link {
      text-decoration: none;
      display: inline-block;
    }
    
    .download-icon {
      width: 40px;
      height: 40px;
      background: rgba(90, 25, 80, 0.9);
      backdrop-filter: blur(10px);
      border-bottom-right-radius: 15px;
      border-top-left-radius: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--white);
      border: 1px solid rgba(255, 255, 255, 0.3);
      cursor: pointer;
      transition: all 0.3s ease;
      flex-shrink: 0;
    }
    
    .download-icon:hover {
      background: var(--secondary-color);
      border-color: var(--secondary-color);
    }
    
    .download-icon i {
      font-size: 1.2rem;
    }
    
    /* إزالة الأنماط القديمة التي لن نستخدمها */
    .file-icon,
    .file-icon.pdf,
    .file-icon.excel {
      display: none;
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
                    <li><a href="/#fields" class="nav-link">المجالات</a></li>
                    <li><a href="/#projects" class="nav-link">المشاريع</a></li>
                    <li><a href="/#news" class="nav-link">الاخبار</a></li>
                    <li><a href="/#success-stories" class="nav-link">قصص النجاح</a></li>
                    <li><a href="/reports" class="nav-link active">التقارير</a></li>
                    <li><a href="/contact" class="nav-link">تواصل معنا</a></li>
                </ul>
                <a class="lang-switch" href="/en/reports" hreflang="en" aria-label="Switch to English">EN</a>
            </nav>
        </div>
    </header>
    
  <!-- ===== قسم هيدر التقارير ===== -->
  <section class="reports-header-section">
    <div class="reports-header-background"></div>
    
    <div class="container reports-header-container">
      <div class="reports-header-content">
        <h1 class="reports-main-title">التقارير السنوية</h1>
        <p class="reports-subtitle">اطلع على أحدث تقاريرنا وخططنا المستقبلية</p>
      </div>
    </div>
  </section>

  <!-- ===== قسم عرض التقارير ===== -->
  <section class="contact-form-section">
    <div class="reports-container">
      @if($reports->count() > 0)
        <div class="reports-grid">
          @foreach($reports as $report)
            <div class="report-card">
              <div class="report-year">{{ $report->year }}</div>
              
              <!-- التقرير السنوي -->
              @if($report->annual_pdf_path || $report->annual_excel_path)
              <div class="report-section">
                <h3 class="report-section-title">التقرير السنوي</h3>
                <div class="report-files">
                  @if($report->annual_pdf_path)
                  <div class="report-file">
                    <div class="file-info">
                      <div class="file-name">التقرير السنوي {{ $report->year }}</div>
                      <div class="file-type">PDF مستند</div>
                    </div>
                    <a href="{{ asset('storage/' . $report->annual_pdf_path) }}" 
                       class="download-link" 
                       target="_blank"
                       download>
                      <div class="download-icon">
                        <i class="fas fa-arrow-down"></i>
                      </div>
                    </a>
                  </div>
                  @endif
                  
                  @if($report->annual_excel_path)
                  <div class="report-file">
                    <div class="file-info">
                      <div class="file-name">التقرير السنوي {{ $report->year }}</div>
                      <div class="file-type">Excel جدول بيانات</div>
                    </div>
                    <a href="{{ asset('storage/' . $report->annual_excel_path) }}" 
                       class="download-link" 
                       target="_blank"
                       download>
                      <div class="download-icon">
                        <i class="fas fa-arrow-down"></i>
                      </div>
                    </a>
                  </div>
                  @endif
                </div>
              </div>
              @endif
              
              <!-- تقرير نصف السنة -->
              @if($report->half_year_pdf_path || $report->half_year_excel_path)
              <div class="report-section">
                <h3 class="report-section-title">تقرير نصف السنة</h3>
                <div class="report-files">
                  @if($report->half_year_pdf_path)
                  <div class="report-file">
                    <div class="file-info">
                      <div class="file-name">تقرير نصف السنة {{ $report->year }}</div>
                      <div class="file-type">PDF مستند</div>
                    </div>
                    <a href="{{ asset('storage/' . $report->half_year_pdf_path) }}" 
                       class="download-link" 
                       target="_blank"
                       download>
                      <div class="download-icon">
                        <i class="fas fa-arrow-down"></i>
                      </div>
                    </a>
                  </div>
                  @endif
                  
                  @if($report->half_year_excel_path)
                  <div class="report-file">
                    <div class="file-info">
                      <div class="file-name">تقرير نصف السنة {{ $report->year }}</div>
                      <div class="file-type">Excel جدول بيانات</div>
                    </div>
                    <a href="{{ asset('storage/' . $report->half_year_excel_path) }}" 
                       class="download-link" 
                       target="_blank"
                       download>
                      <div class="download-icon">
                        <i class="fas fa-arrow-down"></i>
                      </div>
                    </a>
                  </div>
                  @endif
                </div>
              </div>
              @endif
            </div>
          @endforeach
        </div>
      @else
        <div class="empty-state">
          <div class="empty-state-icon">
            <i class="fas fa-file-alt"></i>
          </div>
          <h3 class="empty-state-text">لا توجد تقارير حالياً</h3>
          <p>سيتم رفع التقارير قريباً</p>
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
                    <h3 class="footer-main-text">{{ $footer->main_text_ar ?? 'معًا نصنع الأثر' }}</h3>
                    <p class="footer-sub-text">{{ $footer->sub_text_ar ?? 'تواصل معنا لمعرفة المزيد' }}</p>
                </div>

                <!-- فراغ -->
                
                <!-- رقم الهاتف -->
                <div class="footer-contact">
                    <h4 class="contact-title">رقم الهاتف</h4>
                    <p class="contact-info">{{ $footer->phone_ar ?? '+967 777 777 777' }}</p>
                </div>

                <!-- فراغ -->
                
                <!-- البريد الإلكتروني -->
                <div class="footer-contact">
                    <h4 class="contact-title">البريد الالكتروني</h4>
                    <p class="contact-info">{{ $footer->email_ar ?? 'albena@gmail.com' }}</p>
                </div>

                <!-- فراغ -->
                
                <!-- الموقع -->
                <div class="footer-contact">
                    <h4 class="contact-title">الموقع</h4>
                    <p class="contact-info">{{ $footer->location_ar ?? 'سيئون - القرن - مدرسة القرن' }}</p>
                </div>

                <!-- فراغ -->
                
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
            
            <!--  الخط والفقرة الجديدة -->
            <div class="footer-bottom">
                <p class="copyright">{{ $footer->copyright_ar ?? 'جميع الحقوق محفوظة لمؤسسة البناء للتنمية البشرية © 2025' }}</p>
            </div>
        </div>
    </footer>
    
    <!-- ===== ملف JavaScript منفصل ===== -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
</body>
</html>