<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}?v={{ filemtime(public_path('assets/css/styles.css')) }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">

    <title>Reports - Al Bena Foundation</title>

    <!-- ===== Social Share / Open Graph ===== -->
    @php
        $shareTitle = 'Reports | Albena Foundation for Sustainable Development';
        $shareDescription = 'Explore reports and publications from Albena Foundation for Sustainable Development.';
    @endphp

    @include('partials.social-share')

    <meta property="og:locale" content="en_US">

    <style>
        /* Reports page specific styles */
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
      text-align: left;
      padding-left: 5px;
      position: relative;
    }
    
    .report-section-title::after {
      content: '';
      position: absolute;
      left: 0;
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
    
    /* Header styling */
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
      justify-content: flex-start;
    }
    
    .reports-header-content {
      color: white;
      text-align: left;
      width: 45%;
      max-width: 550px;
      margin-left: 100px;
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
    
    /* New download icon style for reports page */
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
    
    /* Remove old styles we won't use */
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
            <a class="brand" href="/en" aria-label="Al Bena Foundation">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="Al Bena Foundation Logo" class="brand-logo">
            </a>

            <button class="nav-toggle" aria-expanded="false" aria-controls="primary-nav" aria-label="Open menu" id="navToggle">
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
            </button>

            <nav id="primary-nav" class="nav" aria-label="Main navigation">
                <ul class="nav-list">
                    <li><a href="/en" class="nav-link">Home</a></li>
                    <li><a href="/en#about" class="nav-link">About Us</a></li>
                    <li><a href="/en#goals" class="nav-link">Goals</a></li>
                    <li><a href="/en#fields" class="nav-link">Fields</a></li>
                    <li><a href="/en#projects" class="nav-link">Projects</a></li>
                    <li><a href="/en#news" class="nav-link">News</a></li>
                    <li><a href="/en#success-stories" class="nav-link">Success Stories</a></li>
                    <li><a href="/en/reports" class="nav-link active">Reports</a></li>
                    <li><a href="/en/contact" class="nav-link">Contact Us</a></li>
                </ul>
                <a class="lang-switch" href="/reports" hreflang="ar" aria-label="Switch to Arabic">AR</a>
            </nav>
        </div>
    </header>
    
  <!-- ===== Reports Header Section ===== -->
  <section class="reports-header-section">
    <div class="reports-header-background"></div>
    
    <div class="container reports-header-container">
      <div class="reports-header-content">
        <h1 class="reports-main-title">Annual Reports</h1>
        <p class="reports-subtitle">View our latest reports and future plans</p>
      </div>
    </div>
  </section>

  <!-- ===== Reports Display Section ===== -->
  <section class="contact-form-section">
    <div class="reports-container">
      @if($reports->count() > 0)
        <div class="reports-grid">
          @foreach($reports as $report)
            <div class="report-card">
              <div class="report-year">{{ $report->year }}</div>
              
              <!-- Annual Report -->
              @if($report->annual_pdf_path || $report->annual_excel_path)
              <div class="report-section">
                <h3 class="report-section-title">Annual Report</h3>
                <div class="report-files">
                  @if($report->annual_pdf_path)
                  <div class="report-file">
                    <div class="file-info">
                      <div class="file-name">Annual Report {{ $report->year }}</div>
                      <div class="file-type">PDF Document</div>
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
                      <div class="file-name">Annual Report {{ $report->year }}</div>
                      <div class="file-type">Excel Spreadsheet</div>
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
              
              <!-- Half Year Report -->
              @if($report->half_year_pdf_path || $report->half_year_excel_path)
              <div class="report-section">
                <h3 class="report-section-title">Half Year Report</h3>
                <div class="report-files">
                  @if($report->half_year_pdf_path)
                  <div class="report-file">
                    <div class="file-info">
                      <div class="file-name">Half Year Report {{ $report->year }}</div>
                      <div class="file-type">PDF Document</div>
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
                      <div class="file-name">Half Year Report {{ $report->year }}</div>
                      <div class="file-type">Excel Spreadsheet</div>
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
          <h3 class="empty-state-text">No reports available</h3>
          <p>Reports will be uploaded soon</p>
        </div>
      @endif
    </div>
  </section>

    <!-- ===== Footer ===== -->
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-content">
                <!-- Main and sub text -->
                <div class="footer-text">
                    <h3 class="footer-main-text">{{ $footer->main_text_en ?? 'Together We Make Impact' }}</h3>
                    <p class="footer-sub-text">{{ $footer->sub_text_en ?? 'Contact us to learn more' }}</p>
                </div>

                <!-- Spacer -->
                
                <!-- Phone number -->
                <div class="footer-contact">
                    <h4 class="contact-title">Phone Number</h4>
                    <p class="contact-info">{{ $footer->phone_en ?? '+967 777 777 777' }}</p>
                </div>

                <!-- Spacer -->
                
                <!-- Email -->
                <div class="footer-contact">
                    <h4 class="contact-title">Email</h4>
                    <p class="contact-info">{{ $footer->email_en ?? 'albena@gmail.com' }}</p>
                </div>

                <!-- Spacer -->
                
                <!-- Location -->
                <div class="footer-contact">
                    <h4 class="contact-title">Location</h4>
                    <p class="contact-info">{{ $footer->location_en ?? 'Seiyun - Al-Qarn - Al-Qarn School' }}</p>
                </div>

                <!-- Spacer -->
                
                <!-- Social media -->
                <div class="footer-social">
                    <h4 class="social-title">{{ $footer->social_title_en ?? 'Connect with us via' }}</h4>
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
            
            <!--  Line and new paragraph -->
            <div class="footer-bottom">
                <p class="copyright">{{ $footer->copyright_en ?? 'All rights reserved to Al Bena Foundation for Human Development © 2025' }}</p>
            </div>
        </div>
    </footer>
    
    <!-- ===== Separate JavaScript file ===== -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
</body>
</html>