<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

    <!-- ===== SEO ===== -->
    <title>تواصل معنا | مؤسسة البناء للتنمية المستدامة</title>

    <!-- ===== Social Share / Open Graph ===== -->
    @php
        $shareTitle = 'تواصل معنا | مؤسسة البناء للتنمية المستدامة';
        $shareDescription = 'تواصل مع مؤسسة البناء للتنمية المستدامة للاستفسارات والشراكات ومعرفة المزيد عن أنشطة المؤسسة.';
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

    <!-- إضافة SweetAlert2 فقط -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* أضف هذه الستايلات فقط في head */
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
        margin-left: 5px;
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
            text-align: right; /* المحاذاة اليمنى للنصوص */
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
            text-align: right !important;
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
                    <li><a href="" class="nav-link">التقارير</a></li>
                    <li><a href="/contact" class="nav-link active">تواصل معنا</a></li>
                </ul>
                <a class="lang-switch" href="/en" hreflang="en" aria-label="Switch to English">EN</a>
            </nav>
        </div>
    </header>
    
  <!-- ===== قسم التواصل الرئيسي ===== -->
  <section class="contact-header-section">
    <div class="contact-header-background"></div>
    
    <div class="container contact-header-container">
      <div class="contact-header-content">
        <h1 class="contact-main-title">تواصل معنا</h1>
        <p class="contact-subtitle">لا تفوّت أي جديد — ابقَ على اتصال بنا..</p>
      </div>
    </div>
  </section>

  <!-- ===== قسم نموذج التواصل ===== -->
  <section class="contact-form-section">
    <div class="container">
      <!-- أضف هذه التنبيهات هنا -->
      <div id="successAlert" class="alert alert-success"></div>
      <div id="errorAlert" class="alert alert-error"></div>
      
      <!-- مؤشر التحميل -->
      <div id="loading" class="loading">
        <i class="fas fa-spinner fa-spin"></i> جاري إرسال الرسالة...
      </div>
      
      <div class="contact-form-grid">
        <!-- نموذج التواصل -->
        <div class="contact-form-wrapper">
          <div class="contact-form-header">
            <h2 class="contact-form-title">أدخل بياناتك للتواصل معنا</h2>
          </div>
          
          <!-- أضف @csrf هنا -->
          <form class="contact-form" id="contactForm" method="POST">
            @csrf
            <!-- حقل الاسم -->
            <div class="form-group">
              <input type="text" class="form-input" name="name" placeholder="الاسم" required>
            </div>
            
            <!-- حقل الهاتف -->
            <div class="form-group">
              <input type="tel" class="form-input" name="phone" placeholder="رقم الهاتف" required>
            </div>
            
            <!-- حقل البريد الإلكتروني -->
            <div class="form-group">
              <input type="email" class="form-input" name="email" placeholder="البريد الإلكتروني" required>
            </div>
            
            <!-- حقل الموضوع -->
            <div class="form-group">
              <input type="text" class="form-input" name="subject" placeholder="موضوع الرسالة" required>
            </div>
            
            <!-- حقل محتوى الرسالة الكبير -->
            <div class="form-group">
              <textarea class="form-input message-input" name="message" placeholder="محتوى الرسالة" rows="5" required></textarea>
            </div>
            
            <!-- زر الإرسال - أضف id -->
            <button type="submit" class="submit-btn" id="submitBtn">
              <span class="button-text">إرسال الرسالة</span>
              <div class="button-icon">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 8H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M8 1L15 8L8 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
            </button>
          </form>
        </div>

        <!-- معلومات الشركة - استبدل القيم الثابتة -->
        <div class="company-info">
          <!-- العنوان -->
          <div class="info-item">
            <i class="fas fa-map-marker-alt info-icon"></i>
            <span class="info-text">{{ $footer->location_ar ?? 'سيئون - القرن - مدرسة القرن' }}</span>
          </div>
          
          <!-- الهاتف -->
          <div class="info-item">
            <i class="fas fa-phone info-icon"></i>
            <span class="info-text" dir="ltr">{{ $footer->phone_ar ?? '+967 666 939 783' }}</span>
          </div>
          
          <!-- البريد الإلكتروني -->
          <div class="info-item">
            <i class="fas fa-envelope info-icon"></i>
            <span class="info-text">{{ $footer->email_ar ?? 'albena@gmail.com' }}</span>
          </div>
        </div>
      </div>
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
    
    <!-- أضف هذا السكريبت فقط في الأسفل -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.getElementById('contactForm');
        const submitBtn = document.getElementById('submitBtn');
        const loading = document.getElementById('loading');
        const successAlert = document.getElementById('successAlert');
        const errorAlert = document.getElementById('errorAlert');

        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // إظهار مؤشر التحميل
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="button-text">جاري الإرسال...</span><div class="button-icon"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 8H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M8 1L15 8L8 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></div>';
            loading.style.display = 'block';
            successAlert.style.display = 'none';
            errorAlert.style.display = 'none';
            
            try {
                const formData = new FormData(this);
                const response = await fetch('/contact', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json'
                    },
                    body: formData
                });
                
                const result = await response.json();
                
                if (response.ok) {
                    // إظهار تنبيه النجاح
                    successAlert.textContent = result.message;
                    successAlert.style.display = 'block';
                    
                    // إعادة تعيين النموذج
                    contactForm.reset();
                    
                    // عرض SweetAlert2 مع التنسيق المخصص
                    Swal.fire({
                        icon: 'success',
                        title: 'تم الإرسال بنجاح!',
                        text: result.message,
                        confirmButtonText: 'حسناً',
                        confirmButtonColor: '#732068',
                        customClass: {
                            confirmButton: 'swal2-confirm',
                            popup: 'swal2-popup swal2-icon-success'
                        },
                        buttonsStyling: false
                    });
                } else {
                    // إذا كان هناك أخطاء
                    let errorMessage = result.message || 'حدث خطأ أثناء الإرسال';
                    
                    // إذا كان هناك أخطاء في الحقول
                    if (result.errors) {
                        errorMessage = Object.values(result.errors).join('\n');
                    }
                    
                    throw new Error(errorMessage);
                }
            } catch (error) {
                // إظهار تنبيه الخطأ
                errorAlert.textContent = error.message;
                errorAlert.style.display = 'block';
                
                // عرض SweetAlert2 للخطأ مع التنسيق المخصص
                Swal.fire({
                    icon: 'error',
                    title: 'خطأ!',
                    text: error.message,
                    confirmButtonText: 'حسناً',
                    confirmButtonColor: '#732068',
                    customClass: {
                        confirmButton: 'swal2-confirm',
                        popup: 'swal2-popup swal2-icon-error'
                    },
                    buttonsStyling: false
                });
            } finally {
                // إعادة زر الإرسال لحالته الأصلية
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<span class="button-text">إرسال الرسالة</span><div class="button-icon"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 8H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M8 1L15 8L8 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></div>';
                loading.style.display = 'none';
                
                // إخفاء التنبيهات بعد 5 ثواني
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