<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

    <!-- ===== SEO ===== -->
    <title>Contact Us - Al Bena Foundation</title>

    <!-- ===== Social Share / Open Graph ===== -->
    @php
        $shareTitle = 'Contact Us | Albena Foundation for Sustainable Development';
        $shareDescription = 'Get in touch with Albena Foundation for Sustainable Development for inquiries, partnerships, and more information.';
    @endphp

    @include('partials.social-share')

    <meta property="og:locale" content="en_US">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/styles.css') }}?v={{ filemtime(public_path('assets/css/styles.css')) }}"
    >

    <!-- Font Awesome Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css"
    >

    <!-- Add SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Add these styles in head */
        .alert {
        padding: 12px 20px;
        margin: 15px 0;
        border-radius: 8px;
        text-align: center;
        font-weight: 500;
        display: none;
    }
    
    /* تغيير لون النجاح إلى الذهبي */
    .alert-success {
        background-color: #fff8e1;
        color: #b8860b;
        border: 1px solid #C79E70;
    }
    
    /* تغيير لون الخطأ إلى البنفسجي */
    .alert-error {
        background-color: #f3e5f5;
        color: #732068;
        border: 1px solid #732068;
    }
    
    .loading {
        display: none;
        text-align: center;
        padding: 10px;
        color: #666;
        font-size: 0.9rem;
    }
    
    .loading i {
        margin-right: 5px;
    }
    
    .submit-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    /* تصحيح المسافة بين الأيقونات والنصوص + جعل العناصر تحت بعض */
    .company-info {
        display: flex !important;
        flex-direction: column !important;
        gap: 20px !important;
    }
    
    .company-info .info-item {
        display: flex;
        align-items: center;
        gap: 12px !important;
    }
    
    .company-info .info-icon {
        min-width: 24px;
        text-align: center;
    }
    
    /* للشاشات الصغيرة فقط - توسيط العناصر مع الحفاظ على الأيقونة والنص في نفس السطر */
    @media (max-width: 768px) {
        .company-info {
            align-items: center !important;  /* توسيط كل العناصر أفقياً */
            justify-content: center !important; /* توسيط محور عمودياً */
        }
        
        .company-info .info-item {
            justify-content: center !important; /* توسيط الأيقونة والنص معاً */
            flex-wrap: nowrap !important; /* منع الانتقال لسطر جديد */
            gap: 10px !important;
            width: 100%; /* تأكد من أخذ العرض الكامل */
            text-align: left; /* المحاذاة اليسرى للنصوص */
        }
        
        /* التأكد من أن النص لا ينتقل لسطر جديد */
        .company-info .info-text {
            white-space: nowrap !important; /* منع كسر النص لأسطر متعددة */
            display: inline-block !important;
        }
        
        /* التأكد من أن الأيقونة والنص يبقون معاً */
        .company-info .info-icon {
            display: inline-block !important;
            vertical-align: middle !important;
        }
    }
    
    /* للتأكد من أن العناصر تبقى في صف واحد حتى في الشاشات الصغيرة جداً */
    @media (max-width: 480px) {
        .company-info .info-item {
            flex-direction: row !important; /* الحفاظ على الترتيب الأفقي */
            justify-content: center !important;
            align-items: center !important;
        }
        
        /* إذا كان النص طويلاً جداً، نضعه في سطر مع السماح باللف */
        .company-info .info-text {
            white-space: normal !important; /* السماح بلف النص إذا كان طويلاً جداً */
            max-width: 200px; /* تحديد عرض أقصى للنص */
            text-align: left !important;
        }
    }
    
    /* تخصيص تصميم أزرار SweetAlert2 */
    .swal2-confirm {
        border-radius: 18px 0 18px 0 !important; /* الزاوية العلوية اليمنى والزاوية السفلية اليسرى فقط */
        background-color: #732068 !important; /* لون بنفسجي */
        border: none !important;
        padding: 10px 30px !important;
        font-weight: 600 !important;
        color: white !important;
    }
    
    .swal2-confirm:hover {
        background-color: #732068 !important; /* لون بنفسجي أغمق عند التمرير */
    }
    
    /* تخصيص رسالة النجاح */
    .swal2-popup.swal2-icon-success {
        border: 2px solid #C79E70 !important; /* إطار ذهبي */
    }
    
    .swal2-icon.swal2-success {
        border-color: #C79E70 !important; /* لون ذهبي للأيقونة */
    }
    
    .swal2-success-ring {
        border: 4px solid rgba(184, 134, 11, 0.2) !important; /* حلقة ذهبية */
    }
    
    .swal2-success-line-tip,
    .swal2-success-line-long {
        background-color: #C79E70 !important; /* خطوط ذهبية */
    }
    
    /* تخصيص رسالة الخطأ */
    .swal2-popup.swal2-icon-error {
        border: 2px solid #732068 !important; /* إطار بنفسجي */
    }
    
    .swal2-icon.swal2-error {
        border-color: #732068 !important; /* لون بنفسجي للأيقونة */
    }
    
    .swal2-x-mark-line-left,
    .swal2-x-mark-line-right {
        background-color: #732068 !important; /* علامة X بنفسجية */
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
                    <li><a href="{{ route('reports.en') }}" class="nav-link">Reports</a></li>
                    <li><a href="/en/contact" class="nav-link active">Contact Us</a></li>
                </ul>
                <a class="lang-switch" href="/contact" hreflang="ar" aria-label="Switch to Arabic">AR</a>
            </nav>
        </div>
    </header>
    
  <!-- ===== Contact Header Section ===== -->
  <section class="contact-header-section">
    <div class="contact-header-background"></div>
    
    <div class="container contact-header-container">
      <div class="contact-header-content">
        <h1 class="contact-main-title">Contact Us</h1>
        <p class="contact-subtitle">Don't miss any updates — stay in touch with us..</p>
      </div>
    </div>
  </section>

  <!-- ===== Contact Form Section ===== -->
  <section class="contact-form-section">
    <div class="container">
      <!-- Add these alerts here -->
      <div id="successAlert" class="alert alert-success"></div>
      <div id="errorAlert" class="alert alert-error"></div>
      
      <!-- Loading indicator -->
      <div id="loading" class="loading">
        <i class="fas fa-spinner fa-spin"></i> Sending message...
      </div>
      
      <div class="contact-form-grid">
        <!-- Contact Form -->
        <div class="contact-form-wrapper">
          <div class="contact-form-header">
            <h2 class="contact-form-title">Enter your details to contact us</h2>
          </div>
          
          <!-- Add @csrf here -->
          <form class="contact-form" id="contactForm" method="POST">
            @csrf
            <!-- Name field -->
            <div class="form-group">
              <input type="text" class="form-input" name="name" placeholder="Name" required>
            </div>
            
            <!-- Phone field -->
            <div class="form-group">
              <input type="tel" class="form-input" name="phone" placeholder="Phone Number" required>
            </div>
            
            <!-- Email field -->
            <div class="form-group">
              <input type="email" class="form-input" name="email" placeholder="Email Address" required>
            </div>
            
            <!-- Subject field -->
            <div class="form-group">
              <input type="text" class="form-input" name="subject" placeholder="Subject" required>
            </div>
            
            <!-- Message content field -->
            <div class="form-group">
              <textarea class="form-input message-input" name="message" placeholder="Message Content" rows="5" required></textarea>
            </div>
            
            <!-- Submit button - add id -->
            <button type="submit" class="submit-btn" id="submitBtn">
              <span class="button-text">Send Message</span>
              <div class="button-icon">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 8H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M8 1L15 8L8 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
            </button>
          </form>
        </div>

        <!-- Company Information -->
        <div class="company-info">
          <!-- Address -->
          <div class="info-item">
            <i class="fas fa-map-marker-alt info-icon"></i>
            <span class="info-text">{{ $footer->location_en ?? 'Seiyun - Al-Qarn - Al-Qarn School' }}</span>
          </div>
          
          <!-- Phone -->
          <div class="info-item">
            <i class="fas fa-phone info-icon"></i>
            <span class="info-text">{{ $footer->phone_en ?? '+967 666 939 783' }}</span>
          </div>
          
          <!-- Email -->
          <div class="info-item">
            <i class="fas fa-envelope info-icon"></i>
            <span class="info-text">{{ $footer->email_en ?? 'albena@gmail.com' }}</span>
          </div>
        </div>
      </div>
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
    
    <!-- Add this script only at the bottom -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.getElementById('contactForm');
        const submitBtn = document.getElementById('submitBtn');
        const loading = document.getElementById('loading');
        const successAlert = document.getElementById('successAlert');
        const errorAlert = document.getElementById('errorAlert');

        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Show loading indicator
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="button-text">Sending...</span><div class="button-icon"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 8H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M8 1L15 8L8 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></div>';
            loading.style.display = 'block';
            successAlert.style.display = 'none';
            errorAlert.style.display = 'none';
            
            try {
                const formData = new FormData(this);
                const response = await fetch('/en/contact', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json'
                    },
                    body: formData
                });
                
                const result = await response.json();
                
                if (response.ok) {
                    // Show success alert
                    successAlert.textContent = result.message;
                    successAlert.style.display = 'block';
                    
                    // Reset form
                    contactForm.reset();
                    
                    // Show SweetAlert2 with custom styling
                    Swal.fire({
                        icon: 'success',
                        title: 'Message Sent Successfully!',
                        text: result.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#7b1fa2',
                        customClass: {
                            confirmButton: 'swal2-confirm',
                            popup: 'swal2-popup swal2-icon-success'
                        },
                        buttonsStyling: false
                    });
                } else {
                    // If there are errors
                    let errorMessage = result.message || 'An error occurred while sending';
                    
                    // If there are field errors
                    if (result.errors) {
                        errorMessage = Object.values(result.errors).join('\n');
                    }
                    
                    throw new Error(errorMessage);
                }
            } catch (error) {
                // Show error alert
                errorAlert.textContent = error.message;
                errorAlert.style.display = 'block';
                
                // Show SweetAlert2 for error with custom styling
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: error.message,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#7b1fa2',
                    customClass: {
                        confirmButton: 'swal2-confirm',
                        popup: 'swal2-popup swal2-icon-error'
                    },
                    buttonsStyling: false
                });
            } finally {
                // Restore submit button to original state
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<span class="button-text">Send Message</span><div class="button-icon"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 8H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M8 1L15 8L8 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></div>';
                loading.style.display = 'none';
                
                // Hide alerts after 5 seconds
                setTimeout(() => {
                    successAlert.style.display = 'none';
                    errorAlert.style.display = 'none';
                }, 5000);
            }
        });
    });
    </script>
</body>
</html>