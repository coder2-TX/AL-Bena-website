// ===== تهيئة التطبيق =====
document.addEventListener('DOMContentLoaded', function() {
    initMobileNav();
    initSliders();
    initScrollEffects();
    initActiveNavigation();
});

// إدارة الهيدر المتنقل
function initMobileNav() {
    const navToggle = document.querySelector('.nav-toggle');
    const nav = document.querySelector('.nav');
    const navLinks = document.querySelectorAll('.nav-link');
    
    console.log('Mobile Nav Elements:', { navToggle, nav, navLinks: navLinks.length });
    
    if (navToggle && nav) {
        navToggle.addEventListener('click', function(e) {
            e.stopPropagation(); // منع انتشار الحدث
            this.classList.toggle('active');
            nav.classList.toggle('active');
            document.body.style.overflow = nav.classList.contains('active') ? 'hidden' : '';
            console.log('Nav toggled:', nav.classList.contains('active'));
        });
        
        // إغلاق القائمة عند النقر على رابط
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                navToggle.classList.remove('active');
                nav.classList.remove('active');
                document.body.style.overflow = '';
                console.log('Nav closed by link click');
            });
        });
        
        // إغلاق القائمة عند النقر خارجها
        document.addEventListener('click', function(event) {
            const isClickInsideNav = nav.contains(event.target);
            const isClickOnToggle = navToggle.contains(event.target);
            
            if (!isClickInsideNav && !isClickOnToggle && nav.classList.contains('active')) {
                navToggle.classList.remove('active');
                nav.classList.remove('active');
                document.body.style.overflow = '';
                console.log('Nav closed by outside click');
            }
        });
        
        // إغلاق القائمة عند الضغط على زر Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && nav.classList.contains('active')) {
                navToggle.classList.remove('active');
                nav.classList.remove('active');
                document.body.style.overflow = '';
                console.log('Nav closed by Escape key');
            }
        });
    } else {
        console.error('Mobile nav elements not found!');
    }
}

// ===== وظائف التأثيرات =====
function initScrollEffects() {
    // تأثير التمرير للهيدر
    const header = document.querySelector('.site-header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }
}

function initActiveNavigation() {
    const sectionLinks = Array.from(
        document.querySelectorAll('.nav-link[href^="#"]')
    );

    if (sectionLinks.length === 0) {
        return;
    }

    const navigationItems = sectionLinks
        .map(function(link) {
            const sectionId = link.getAttribute('href').substring(1);
            const section = document.getElementById(sectionId);

            return {
                link: link,
                section: section,
            };
        })
        .filter(function(item) {
            return item.section !== null;
        });

    if (navigationItems.length === 0) {
        return;
    }

    let isUpdating = false;

    function activateLink(activeLink) {
        sectionLinks.forEach(function(link) {
            link.classList.remove('active');
        });

        activeLink.classList.add('active');
    }

    function updateActiveLink() {
        const header = document.querySelector('.site-header');
        const headerHeight = header ? header.offsetHeight : 80;
        const scrollMarker = window.scrollY + headerHeight + 40;

        let currentItem = navigationItems[0];

        navigationItems.forEach(function(item) {
            if (item.section.offsetTop <= scrollMarker) {
                currentItem = item;
            }
        });

        const reachedPageBottom =
            window.innerHeight + window.scrollY >=
            document.documentElement.scrollHeight - 2;

        if (reachedPageBottom) {
            currentItem = navigationItems[navigationItems.length - 1];
        }

        activateLink(currentItem.link);
        isUpdating = false;
    }

    sectionLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            activateLink(link);
        });
    });

    window.addEventListener(
        'scroll',
        function() {
            if (!isUpdating) {
                window.requestAnimationFrame(updateActiveLink);
                isUpdating = true;
            }
        },
        { passive: true }
    );

    window.addEventListener('resize', updateActiveLink);
    window.addEventListener('load', updateActiveLink);

    updateActiveLink();
}

// ===== وظائف السلايدرات =====
function initSliders() {
    initGoalsSlider();
    initProjectsSlider();
    initNewsSlider();
    initStoriesSlider();
    initFieldsSlider();
    initReportsSlider();
    initReportDownloadModal();
    initReportsSlider(); 
}

// سلايدر الأهداف
function initGoalsSlider() {
    const track = document.querySelector('.goals-slider .slider-track');
    const slides = document.querySelectorAll('.goal-slide');
    const prevBtn = document.querySelector('.goals-section .prev-btn');
    const nextBtn = document.querySelector('.goals-section .next-btn');
    
    if (track && prevBtn && nextBtn) {
        let currentIndex = 0;
        
        // حساب عدد الشرائح المرئية بناءً على حجم الشاشة
        function calculateVisibleSlides() {
            if (window.innerWidth <= 480) {
                return 1; // شريحة واحدة للهواتف الصغيرة
            } else if (window.innerWidth <= 768) {
                return 1.2; // شريحة ونصف للهواتف
            } else if (window.innerWidth <= 1024) {
                return 1.5; // شريحة ونصف للأجهزة اللوحية
            } else {
                return 2; // شريحتين للشاشات الكبيرة
            }
        }
        
        // حساب عرض الشريحة بناءً على حجم الشاشة
        function calculateSlideWidth() {
            const slide = slides[0];
            if (!slide) return 300; // قيمة افتراضية
            
            // عرض الشريحة + الهوامش
            const style = window.getComputedStyle(slide);
            const width = slide.offsetWidth;
            const marginLeft = parseFloat(style.marginLeft) || 0;
            const marginRight = parseFloat(style.marginRight) || 0;
            
            return width + marginLeft + marginRight + 20; // + الفجوة
        }
        
        function updateSlider() {
            const visibleSlides = calculateVisibleSlides();
            const slideWidth = calculateSlideWidth();
            const maxIndex = Math.max(0, slides.length - Math.floor(visibleSlides));
            
            currentIndex = Math.min(Math.max(0, currentIndex), maxIndex);
            
            // حساب الموضع مع دعم الكسور في الشرائح المرئية
            const position = currentIndex * slideWidth;
            track.style.transform = `translateX(${position}px)`;
            
            // تحديث حالة الأزرار
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex >= maxIndex;
            
            // إضافة/إزالة كلاس الشفافية للأزرار المعطلة
            prevBtn.style.opacity = prevBtn.disabled ? '0.5' : '1';
            nextBtn.style.opacity = nextBtn.disabled ? '0.5' : '1';
            
            // إظهار مؤشر بسيط للسلايد الحالي (اختياري)
            slides.forEach((slide, index) => {
                slide.classList.toggle('active', index === currentIndex);
            });
        }
        
        // دالة للانتقال للشريحة التالية
        function nextSlide() {
            const visibleSlides = calculateVisibleSlides();
            if (currentIndex < slides.length - Math.floor(visibleSlides)) {
                currentIndex++;
                updateSlider();
            }
        }
        
        // دالة للانتقال للشريحة السابقة
        function prevSlide() {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        }
        
        // إضافة أحداث الأزرار
        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);
        
        // التهيئة الأولية
        updateSlider();
        
        // إعادة حساب الأبعاد عند تغيير حجم النافذة
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                updateSlider();
            }, 250);
        });
        
        // === دعم السحب باللمس (مُحسّن) ===
        let startX = 0;
        let currentX = 0;
        let isDragging = false;
        let startTime = 0;
        
        track.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            currentX = startX;
            isDragging = true;
            startTime = Date.now();
            track.style.transition = 'none';
            track.style.cursor = 'grabbing';
        });
        
        track.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            e.preventDefault();
            
            currentX = e.touches[0].clientX;
            const diff = startX - currentX;
            const slideWidth = calculateSlideWidth();
            
            // تحريك السلايدر مع مقاومة عند الحواف
            let newPosition = (currentIndex * slideWidth) + diff;
            
            // مقاومة للسحب بعد الحدود
            if (currentIndex === 0 && diff < 0) {
                newPosition = diff * 0.3; // مقاومة عند الشريحة الأولى
            } else if (currentIndex >= slides.length - Math.floor(calculateVisibleSlides()) && diff > 0) {
                newPosition = (currentIndex * slideWidth) + (diff * 0.3); // مقاومة عند الشريحة الأخيرة
            }
            
            track.style.transform = `translateX(${newPosition}px)`;
        });
        
        track.addEventListener('touchend', () => {
            if (!isDragging) return;
            isDragging = false;
            track.style.transition = 'transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            track.style.cursor = 'grab';
            
            const diff = startX - currentX;
            const slideWidth = calculateSlideWidth();
            const duration = Date.now() - startTime;
            const velocity = Math.abs(diff) / duration;
            
            // تحسين عتبة السحب بناءً على السرعة
            let threshold = 50;
            if (velocity > 0.5) { // سرعة عالية
                threshold = 30;
            }
            
            // تحديد الاتجاه بناءً على السحب
            if (diff > threshold) { // سحب لليسار (التالي)
                if (currentIndex < slides.length - Math.floor(calculateVisibleSlides())) {
                    currentIndex++;
                }
            } else if (diff < -threshold) { // سحب لليمين (السابق)
                if (currentIndex > 0) {
                    currentIndex--;
                }
            }
            
            updateSlider();
        });
        
        // === إضافة مؤشرات النقاط للشاشات الصغيرة (اختياري) ===
        function addDotsIndicator() {
            if (window.innerWidth > 768) return; // فقط للشاشات الصغيرة
            
            const existingDots = track.parentElement.querySelector('.slider-dots');
            if (existingDots) existingDots.remove();
            
            const dotsContainer = document.createElement('div');
            dotsContainer.className = 'slider-dots';
            dotsContainer.style.cssText = `
                display: flex;
                justify-content: center;
                gap: 8px;
                margin-top: 20px;
                direction: ltr;
            `;
            
            for (let i = 0; i < slides.length; i++) {
                const dot = document.createElement('button');
                dot.className = `slider-dot ${i === 0 ? 'active' : ''}`;
                dot.style.cssText = `
                    width: 8px;
                    height: 8px;
                    border-radius: 50%;
                    border: none;
                    background: ${i === 0 ? 'var(--primary-color)' : '#ccc'};
                    cursor: pointer;
                    transition: background 0.3s;
                    padding: 0;
                `;
                dot.addEventListener('click', () => {
                    currentIndex = i;
                    updateSlider();
                });
                dotsContainer.appendChild(dot);
            }
            
            track.parentElement.appendChild(dotsContainer);
            
            // تحديث النقاط عند تغيير السلايد
            const originalUpdate = updateSlider;
            updateSlider = function() {
                originalUpdate();
                const dots = dotsContainer.querySelectorAll('.slider-dot');
                dots.forEach((dot, index) => {
                    dot.style.background = index === currentIndex ? 
                        'var(--primary-color)' : '#ccc';
                });
            };
        }
        
        // إضافة النقاط للشاشات الصغيرة
        if (window.innerWidth <= 768) {
            addDotsIndicator();
        }
        
        // تحديث النقاط عند تغيير حجم النافذة
        window.addEventListener('resize', function() {
            if (window.innerWidth <= 768) {
                addDotsIndicator();
            } else {
                const dots = track.parentElement.querySelector('.slider-dots');
                if (dots) dots.remove();
            }
        });
    }
}

// سلايدر مشاريعنا
function initProjectsSlider() {
    const track = document.querySelector('.projects-track');
    const prevBtn = document.querySelector('.prev-projects-btn');
    const nextBtn = document.querySelector('.next-projects-btn');

    if (track && prevBtn && nextBtn) {
        const slides = document.querySelectorAll('.project-card'); // ← أضفنا هذا السطر
        let currentIndex = 0;
        const slideWidth = 375; // 350px + 25px gap
        const visibleSlides = 3; // عدد المشاريع المرئية في نفس الوقت
        
        function updateSlider() {
            const maxIndex = Math.max(0, slides.length - visibleSlides);
            currentIndex = Math.min(Math.max(0, currentIndex), maxIndex);
            
            // في التصميم العربي (RTL) نستخدم translateX موجبة للتحريك لليسار
            const position = currentIndex * slideWidth;
            track.style.transform = `translateX(${position}px)`;
            
            // تحديث حالة الأزرار
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex >= maxIndex;
            
            // إضافة/إزالة كلاس الشفافية للأزرار المعطلة
            prevBtn.style.opacity = prevBtn.disabled ? '0.5' : '1';
            nextBtn.style.opacity = nextBtn.disabled ? '0.5' : '1';
        }
        
        nextBtn.addEventListener('click', function() {
            if (currentIndex < slides.length - visibleSlides) {
                currentIndex++;
                updateSlider();
            }
        });
        
        prevBtn.addEventListener('click', function() {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });
        
        // التهيئة الأولية
        updateSlider();
        
        // إضافة دعم السحب على الهواتف
        let startX = 0;
        let currentX = 0;
        let isDragging = false;
        
        track.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            isDragging = true;
            track.style.transition = 'none';
        });
        
        track.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            currentX = e.touches[0].clientX;
            
            // حساب المسافة وتحريك السلايدر
            const diff = startX - currentX;
            track.style.transform = `translateX(${currentIndex * slideWidth + diff}px)`;
        });
        
        track.addEventListener('touchend', () => {
            if (!isDragging) return;
            isDragging = false;
            track.style.transition = 'transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            
            const diff = startX - currentX;
            const threshold = 50;
            
            if (diff > threshold && currentIndex < slides.length - visibleSlides) {
                currentIndex++;
            } else if (diff < -threshold && currentIndex > 0) {
                currentIndex--;
            }
            
            updateSlider();
        });
        
        // إعادة الحساب عند تغيير حجم النافذة
        window.addEventListener('resize', updateSlider);
        
    } else {
        console.error('Projects slider elements not found!');
    }
}

// سلايدر التقارير
function initReportsSlider() {
    const track = document.querySelector('.reports-track');
    const prevBtn = document.querySelector('.prev-reports-btn');
    const nextBtn = document.querySelector('.next-reports-btn');

    if (track && prevBtn && nextBtn) {
        const slides = track.querySelectorAll('.report-card');
        let currentIndex = 0;
        const slideWidth = 305; // 280px + 25px gap
        const visibleSlides = 4; // عدد التقارير المرئية في نفس الوقت
        
        function updateSlider() {
            const maxIndex = Math.max(0, slides.length - visibleSlides);
            currentIndex = Math.min(Math.max(0, currentIndex), maxIndex);
            
            const position = currentIndex * slideWidth;
            track.style.transform = `translateX(${position}px)`;
            
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex >= maxIndex;
            
            prevBtn.classList.toggle('disabled', prevBtn.disabled);
            nextBtn.classList.toggle('disabled', nextBtn.disabled);
        }
        
        nextBtn.addEventListener('click', function() {
            if (currentIndex < slides.length - visibleSlides) {
                currentIndex++;
                updateSlider();
            }
        });
        
        prevBtn.addEventListener('click', function() {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });
        
        updateSlider();
    }
}
// سلايدر التقارير
function initReportsSlider() {
    const track  = document.querySelector('.reports-track');
    const prevBtn = document.querySelector('.prev-reports-btn');
    const nextBtn = document.querySelector('.next-reports-btn');

    if (track && prevBtn && nextBtn) {
        const slides = document.querySelectorAll('.report-card');
        if (!slides.length) return;

        let currentIndex = 0;
        const slideWidth   = 375; // 350px + 25px gap تقريباً
        const visibleSlides = 3;  // عدد الكروت المرئية في نفس الوقت

        function updateSlider() {
            const maxIndex = Math.max(0, slides.length - visibleSlides);
            currentIndex = Math.min(Math.max(0, currentIndex), maxIndex);

            // RTL: نستخدم translateX قيمة موجبة للتحريك لليسار بصرياً
            const position = currentIndex * slideWidth;
            track.style.transform = `translateX(${position}px)`;

            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex >= maxIndex;

            prevBtn.classList.toggle('disabled', prevBtn.disabled);
            nextBtn.classList.toggle('disabled', nextBtn.disabled);
        }

        nextBtn.addEventListener('click', function () {
            if (currentIndex < slides.length - visibleSlides) {
                currentIndex++;
                updateSlider();
            }
        });

        prevBtn.addEventListener('click', function () {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });

        // دعم السحب باللمس
        let startX = 0;
        let currentX = 0;
        let isDragging = false;

        track.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            isDragging = true;
            track.style.transition = 'none';
        });

        track.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            currentX = e.touches[0].clientX;
            const diff = startX - currentX;
            track.style.transform = `translateX(${currentIndex * slideWidth + diff}px)`;
        });

        track.addEventListener('touchend', () => {
            if (!isDragging) return;
            isDragging = false;
            track.style.transition = 'transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';

            const diff = startX - currentX;
            const threshold = 50;

            if (diff > threshold && currentIndex < slides.length - visibleSlides) {
                currentIndex++;
            } else if (diff < -threshold && currentIndex > 0) {
                currentIndex--;
            }

            updateSlider();
        });

        window.addEventListener('resize', updateSlider);

        // التهيئة الأولية
        updateSlider();
    } else {
        console.warn('Reports slider elements not found.');
    }
}

// مودال اختيار نوع تحميل التقرير (PDF / Excel)
function initReportDownloadModal() {
    const modal      = document.getElementById('reportDownloadModal');
    const backdrop   = document.getElementById('reportModalBackdrop');
    const closeBtn   = document.getElementById('reportModalClose');
    const pdfLink    = document.getElementById('reportPdfLink');
    const excelLink  = document.getElementById('reportExcelLink');
    const subtitleEl = document.getElementById('reportDownloadSubtitle');

    if (!modal || !pdfLink || !excelLink) {
        console.warn('Report download modal elements not found.');
        return;
    }

    const triggers = document.querySelectorAll('.report-download-trigger');

    function openModal(trigger) {
        const title    = trigger.getAttribute('data-title') || 'التقرير';
        const pdfUrl   = trigger.getAttribute('data-pdf-url') || '';
        const excelUrl = trigger.getAttribute('data-excel-url') || '';

        // تحديث النص
        if (subtitleEl) {
            subtitleEl.textContent = `يمكنك تحميل "${title}" بصيغة PDF أو Excel (في حال توفرها).`;
        }

        // PDF
        if (pdfUrl) {
            pdfLink.classList.remove('disabled');
            pdfLink.href = pdfUrl;
            pdfLink.setAttribute('download', '');
        } else {
            pdfLink.classList.add('disabled');
            pdfLink.removeAttribute('href');
            pdfLink.removeAttribute('download');
        }

        // Excel
        if (excelUrl) {
            excelLink.classList.remove('disabled');
            excelLink.href = excelUrl;
            excelLink.setAttribute('download', '');
        } else {
            excelLink.classList.add('disabled');
            excelLink.removeAttribute('href');
            excelLink.removeAttribute('download');
        }

        modal.classList.add('open');
        document.body.classList.add('report-modal-open');
    }

    function closeModal() {
        modal.classList.remove('open');
        document.body.classList.remove('report-modal-open');
    }

    triggers.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            openModal(btn);
        });
    });

    if (backdrop) {
        backdrop.addEventListener('click', closeModal);
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('open')) {
            closeModal();
        }
    });
}

// سلايدر مجالات المؤسسة
function initFieldsSlider() {
    const track = document.getElementById('fieldsTrack');  // ← التعديل هنا
    const slides = track.querySelectorAll('.field-item');  // ← التعديل هنا
    const prevBtn = document.querySelector('#fieldsPrevBtn');  // ← التعديل هنا
    const nextBtn = document.querySelector('#fieldsNextBtn');  // ← والتعديل هنا
        
    if (track && prevBtn && nextBtn) {
        let currentIndex = 0;
        const slideWidth = 145; // 120px + 25px gap
        const visibleSlides = 5; // عدد المجالات المرئية في نفس الوقت
        
        function updateSlider() {
            const maxIndex = Math.max(0, slides.length - visibleSlides);
            currentIndex = Math.min(Math.max(0, currentIndex), maxIndex);
            
            // في التصميم العربي (RTL) نستخدم translateX موجبة للتحريك لليسار
            const position = currentIndex * slideWidth;
            track.style.transform = `translateX(${position}px)`;
            
            // تحديث حالة الأزرار
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex >= maxIndex;
            
            // إضافة/إزالة كلاس الشفافية للأزرار المعطلة
            prevBtn.style.opacity = prevBtn.disabled ? '0.5' : '1';
            nextBtn.style.opacity = nextBtn.disabled ? '0.5' : '1';
        }
        
        nextBtn.addEventListener('click', function() {
            if (currentIndex < slides.length - visibleSlides) {
                currentIndex++;
                updateSlider();
            }
        });
        
        prevBtn.addEventListener('click', function() {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });
        
        // التهيئة الأولية
        updateSlider();
        
        // إضافة دعم السحب على الهواتف
        let startX = 0;
        let currentX = 0;
        let isDragging = false;
        
        track.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            isDragging = true;
            track.style.transition = 'none';
        });
        
        track.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            currentX = e.touches[0].clientX;
            
            // حساب المسافة وتحريك السلايدر
            const diff = startX - currentX;
            track.style.transform = `translateX(${currentIndex * slideWidth + diff}px)`;
        });
        
        track.addEventListener('touchend', () => {
            if (!isDragging) return;
            isDragging = false;
            track.style.transition = 'transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            
            const diff = startX - currentX;
            const threshold = 50;
            
            if (diff > threshold && currentIndex < slides.length - visibleSlides) {
                currentIndex++;
            } else if (diff < -threshold && currentIndex > 0) {
                currentIndex--;
            }
            
            updateSlider();
        });
    }
}

// سلايدر الأخبار - صور لكل خبر
function initNewsSlider() {
    const newsSlides = document.querySelectorAll('.news-slide');
    const imagesTrack = document.getElementById('currentNewsImagesTrack');
    const imagesDots = document.getElementById('currentNewsImagesDots');
    const prevBtn = document.getElementById('prevNewsBtn');
    const nextBtn = document.getElementById('nextNewsBtn');
    
    if (!newsSlides.length || !imagesTrack || !imagesDots) {
        console.log('عناصر السلايدر غير موجودة');
        return;
    }
    
    let currentNewsIndex = 0;
    
    // جمع بيانات الأخبار من الـ DOM بدلاً من PHP
    const newsData = Array.from(newsSlides).map(slide => {
        const newsId = slide.getAttribute('data-news-id');
        const title = slide.querySelector('.news-item-title')?.textContent || '';
        
        // نحتاج طريقة أخرى لجلب الصور - سنستخدم data attribute
        const imagesJson = slide.getAttribute('data-images');
        let images = [];
        
        try {
            images = imagesJson ? JSON.parse(imagesJson) : [];
        } catch (e) {
            console.error('خطأ في تحليل بيانات الصور:', e);
        }
        
        return {
            id: newsId,
            images: images,
            title: title
        };
    });
    
    console.log('بيانات الأخبار:', newsData);
    
    // عرض صور الخبر الحالي
    function showCurrentNewsImages() {
        const currentNews = newsData[currentNewsIndex];
        
        // تفريغ السلايدر الحالي
        imagesTrack.innerHTML = '';
        imagesDots.innerHTML = '';
        
        if (currentNews && currentNews.images && currentNews.images.length > 0) {
            console.log('عرض صور للخبر:', currentNewsIndex, currentNews.images);
            
            // إضافة صور الخبر الحالي
            currentNews.images.forEach((image, index) => {
                const slide = document.createElement('div');
                slide.className = `news-image-slide ${index === 0 ? 'active' : ''}`;
                slide.innerHTML = `
                    <img src="${getAssetUrl('storage/' + image)}" alt="${currentNews.title}" class="news-main-image">
                `;
                imagesTrack.appendChild(slide);
            });
            
            // إضافة نقاط الصور
            currentNews.images.forEach((image, index) => {
                const dot = document.createElement('button');
                dot.className = `news-image-dot ${index === 0 ? 'active' : ''}`;
                dot.setAttribute('data-image-index', index);
                dot.addEventListener('click', () => showImage(index));
                imagesDots.appendChild(dot);
            });
        } else {
            console.log('لا توجد صور لهذا الخبر');
            // عرض صورة افتراضية إذا لم توجد صور
            const defaultSlide = document.createElement('div');
            defaultSlide.className = 'news-image-slide active';
            defaultSlide.innerHTML = `
                <img src="${getAssetUrl('assets/images/default-news.jpg')}" alt="لا توجد صورة" class="news-main-image">
            `;
            imagesTrack.appendChild(defaultSlide);
        }
    }
    
    // تبديل بين صور الخبر الواحد
    function showImage(index) {
        const imageSlides = imagesTrack.querySelectorAll('.news-image-slide');
        const dots = imagesDots.querySelectorAll('.news-image-dot');
        
        imageSlides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        if (imageSlides[index]) {
            imageSlides[index].classList.add('active');
        }
        if (dots[index]) {
            dots[index].classList.add('active');
        }
    }
    
    // تبديل بين الأخبار
    function showNewsSlide(index) {
        // إخفاء كل أخبار النصوص
        newsSlides.forEach(slide => slide.classList.remove('active'));
        
        // إظهار الخبر المطلوب
        if (newsSlides[index]) {
            newsSlides[index].classList.add('active');
            currentNewsIndex = index;
            
            // عرض صور الخبر الجديد
            showCurrentNewsImages();
            
            // تحديث حالة الأزرار
            updateNewsButtons();
        }
    }
    
    function updateNewsButtons() {
        if (prevBtn) {
            prevBtn.disabled = currentNewsIndex === 0;
            prevBtn.style.opacity = prevBtn.disabled ? '0.5' : '1';
        }
        
        if (nextBtn) {
            nextBtn.disabled = currentNewsIndex === newsSlides.length - 1;
            nextBtn.style.opacity = nextBtn.disabled ? '0.5' : '1';
        }
    }
    
    // أزرار التحكم بين الأخبار
    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            if (currentNewsIndex > 0) {
                showNewsSlide(currentNewsIndex - 1);
            }
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            if (currentNewsIndex < newsSlides.length - 1) {
                showNewsSlide(currentNewsIndex + 1);
            }
        });
    }
    
    // التهيئة الأولية
    showCurrentNewsImages();
    updateNewsButtons();
}

// دالة مساعدة لـ asset
function getAssetUrl(path) {
    // إذا كان المسار يبدأ بـ http أو / فلا نضيف /
    if (path.startsWith('http') || path.startsWith('/')) {
        return path;
    }
    return '/' + path;
}
// المودال والتحميل للتقارير
let currentReportId = null;
let currentReportYear = null;

function openReportModal(reportId, year) {
    currentReportId = reportId;
    currentReportYear = year;
    
    const modalYearTitle = document.getElementById('modalYearTitle');
    if (modalYearTitle) {
        modalYearTitle.textContent = `تحميل تقارير سنة ${year}`;
    }
    
    const reportModal = document.getElementById('reportModal');
    if (reportModal) {
        reportModal.classList.add('show');
        document.body.style.overflow = 'hidden'; // منع التمرير خلف المودال
    }
}

function closeReportModal() {
    const reportModal = document.getElementById('reportModal');
    if (reportModal) {
        reportModal.classList.remove('show');
        document.body.style.overflow = ''; // إعادة التمرير
    }
    currentReportId = null;
    currentReportYear = null;
}

function downloadReport(type) {
    if (!currentReportId || !window.reportsData) {
        alert('بيانات التقرير غير متوفرة');
        return;
    }
    
    const report = window.reportsData.find(r => r.id == currentReportId);
    if (!report) {
        alert('التقرير غير موجود');
        return;
    }
    
    let fileUrl = '';
    let fileName = '';
    
    switch(type) {
        case 'annual_pdf':
            fileUrl = report.annual_pdf;
            fileName = `تقرير_سنوي_${currentReportYear}.pdf`;
            break;
        case 'annual_excel':
            fileUrl = report.annual_excel;
            fileName = `تقرير_سنوي_${currentReportYear}.xlsx`;
            break;
        case 'half_year_pdf':
            fileUrl = report.half_year_pdf;
            fileName = `تقرير_نصف_سنوي_${currentReportYear}.pdf`;
            break;
        case 'half_year_excel':
            fileUrl = report.half_year_excel;
            fileName = `تقرير_نصف_سنوي_${currentReportYear}.xlsx`;
            break;
    }
    
    if (fileUrl) {
        const link = document.createElement('a');
        link.href = '/storage/' + fileUrl;
        link.download = fileName;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    } else {
        alert('هذا الملف غير متوفر حالياً');
    }
    
    closeReportModal();
}

// إغلاق المودال عند الضغط على Esc
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeReportModal();
    }
});

// إغلاق المودال عند الضغط خارج المحتوى
document.addEventListener('click', function(event) {
    const modal = document.getElementById('reportModal');
    const modalContent = document.querySelector('.report-modal-content');
    
    if (modal && modal.classList.contains('show') && 
        modalContent && !modalContent.contains(event.target)) {
        closeReportModal();
    }
});
// تشغيل السلايدر عند تحميل الصفحة
document.addEventListener('DOMContentLoaded', function() {
    initNewsSlider();
});

// سلايدر قصص النجاح
function initStoriesSlider() {
    const track = document.querySelector('.stories-track');
    const slides = document.querySelectorAll('.story-slide');
    const dots = document.querySelectorAll('.story-dot');
    const prevBtn = document.querySelector('.prev-story-btn');
    const nextBtn = document.querySelector('.next-story-btn');
    const readMoreBtns = document.querySelectorAll('.story-read-more');
    
    let currentSlide = 0;
    const totalSlides = slides.length;

    // تحديث السلايد النشط
    function updateSlide() {
        // إخفاء جميع السلايدات
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        // إظهار السلايد النشط
        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
        
        // تحديث حالة الأزرار - هذا هو الإصلاح!
        // في التصميم العربي: السهم الأيمن (prev) للسابق، السهم الأيسر (next) للتالي
        prevBtn.disabled = currentSlide === 0;           // السهم الأيمن معطل عند القصة الأولى
        nextBtn.disabled = currentSlide === totalSlides - 1; // السهم الأيسر معطل عند القصة الأخيرة
        
        // إضافة شفافية للأزرار المعطلة
        prevBtn.style.opacity = prevBtn.disabled ? '0.5' : '1';
        nextBtn.style.opacity = nextBtn.disabled ? '0.5' : '1';
    }

    // الانتقال للسلايد التالي - هذا هو الإصلاح!
    function nextSlide() {
        if (currentSlide < totalSlides - 1) {
            currentSlide++;
            updateSlide();
        }
    }

    // الانتقال للسلايد السابق - هذا هو الإصلاح!
    function prevSlide() {
        if (currentSlide > 0) {
            currentSlide--;
            updateSlide();
        }
    }

    // الانتقال لسلايد محدد
    function goToSlide(index) {
        currentSlide = index;
        updateSlide();
    }

    // أحداث الأزرار - هذا هو الإصلاح!
    nextBtn.addEventListener('click', nextSlide);   // السهم الأيسر للتالي
    prevBtn.addEventListener('click', prevSlide);   // السهم الأيمن للسابق

    // أحداث النقاط
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => goToSlide(index));
    });

    // أحداث زر قراءة المزيد
    readMoreBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const storyTitle = this.closest('.story-slide').querySelector('.story-title').textContent;
            alert(`سيتم عرض التفاصيل الكاملة لقصة: ${storyTitle}`);
        });
    });

    // التبديل التلقائي (اختياري)
    let autoSlide = setInterval(nextSlide, 5000);

    // إيقاف التبديل التلقائي عند التمرير يدوياً
    [nextBtn, prevBtn, ...dots].forEach(element => {
        element.addEventListener('click', () => {
            clearInterval(autoSlide);
            autoSlide = setInterval(nextSlide, 5000);
        });
    });

    // التهيئة الأولية
    updateSlide();
}



/* =============================
   سلايدر الأهداف: بنفس طريقة سلايدر الخدمات
   ============================= */
function initGoalsSlider() {
  const viewport = document.getElementById('goalsViewport');
  const track    = document.getElementById('goalsTrack');
  const dotsBox  = document.querySelector('.goals-dots');
  const prevBtn  = document.getElementById('goalsArrowPrev');
  const nextBtn  = document.getElementById('goalsArrowNext');

  if (!viewport || !track) return;

  const slides = Array.from(track.querySelectorAll('.goals-slide'));
  if (slides.length === 0) return;

  const totalPages = slides.length;
  let pagePositions = [];
  let activePage = 0;

  function computePagePositions() {
    const base = slides[0].offsetLeft;
    pagePositions = slides.map(slide => slide.offsetLeft - base);
  }

  function setActive(idx) {
    activePage = idx;

    if (dotsBox) {
      const dots = dotsBox.querySelectorAll('.goal-dot');
      dots.forEach((d, i) => d.classList.toggle('active', i === idx));
    }

    if (prevBtn) prevBtn.classList.toggle('is-disabled', idx === 0);
    if (nextBtn) nextBtn.classList.toggle('is-disabled', idx === totalPages - 1);
  }

  function goToPage(idx, smooth = true) {
    const i = Math.max(0, Math.min(idx, totalPages - 1));
    const left = pagePositions[i] ?? 0;
    viewport.scrollTo({ left, behavior: smooth ? 'smooth' : 'auto' });
    setActive(i);
  }

  function buildDots() {
    if (!dotsBox) return;
    dotsBox.innerHTML = '';
    for (let i = 0; i < totalPages; i++) {
      const b = document.createElement('button');
      b.type = 'button';
      b.className = 'goal-dot' + (i === 0 ? ' active' : '');
      b.addEventListener('click', () => goToPage(i));
      dotsBox.appendChild(b);
    }
  }

  let scrollTimer;
  function onScroll() {
    clearTimeout(scrollTimer);
    scrollTimer = setTimeout(() => {
      const x = viewport.scrollLeft;
      let best = 0;
      let bestD = Infinity;
      for (let i = 0; i < pagePositions.length; i++) {
        const d = Math.abs(pagePositions[i] - x);
        if (d < bestD) {
          bestD = d;
          best = i;
        }
      }
      setActive(best);
    }, 80);
  }

  function reflow() {
    const current = activePage;
    computePagePositions();
    goToPage(current, false);
  }

  prevBtn && prevBtn.addEventListener('click', () => goToPage(activePage - 1));
  nextBtn && nextBtn.addEventListener('click', () => goToPage(activePage + 1));

  computePagePositions();
  buildDots();
  setActive(0);

  viewport.addEventListener('scroll', onScroll);
  window.addEventListener('resize', reflow);
  window.addEventListener('load', reflow);
}

// في DOMContentLoaded أضف:
document.addEventListener('DOMContentLoaded', () => {
  // ... الكود الحالي ...
  
  if (typeof initGoalsSlider === 'function') {
    initGoalsSlider();
  }
  
  // ... باقي الكود ...
});



/* =============================
   سلايدر المشاريع
   ============================= */
function initProjectsSlider() {
    // تعريف العناصر للعربية
    const viewportAr = document.getElementById('projectsViewport');
    const trackAr = document.getElementById('projectsTrack');
    const dotsBoxAr = document.querySelectorAll('.projects-dots')[0];
    const prevBtnAr = document.getElementById('projectsArrowPrev');
    const nextBtnAr = document.getElementById('projectsArrowNext');
    
    // تعريف العناصر للإنجليزية
    const viewportEn = document.getElementById('projectsViewportEn');
    const trackEn = document.getElementById('projectsTrackEn');
    const dotsBoxEn = document.querySelectorAll('.projects-dots')[1];
    const prevBtnEn = document.getElementById('projectsArrowPrevEn');
    const nextBtnEn = document.getElementById('projectsArrowNextEn');

    // دالة لتهيئة سلايدر واحد
    function initSingleSlider(viewport, track, dotsBox, prevBtn, nextBtn) {
        if (!viewport || !track) return;

        const cards = Array.from(track.querySelectorAll('.project-card'));
        if (cards.length <= 1) {
            // إذا كان هناك بطاقة واحدة أو أقل، إخفاء الأزرار والنقاط
            if (prevBtn) prevBtn.style.display = 'none';
            if (nextBtn) nextBtn.style.display = 'none';
            if (dotsBox) dotsBox.style.display = 'none';
            return;
        }

        // حساب عدد البطاقات المعروضة بناءً على حجم الشاشة
        function getCardsPerView() {
            const viewportWidth = viewport.offsetWidth;
            
            if (viewportWidth >= 1200) {
                return 4; // 4 بطاقات في الشاشات الكبيرة جداً
            } else if (viewportWidth >= 992) {
                return 3; // 3 بطاقات في الشاشات الكبيرة
            } else if (viewportWidth >= 768) {
                return 2; // 2 بطاقة في التابلت
            } else if (viewportWidth >= 576) {
                return 2; // 2 بطاقة في الهواتف الكبيرة
            } else {
                return 1; // بطاقة واحدة في الهواتف الصغيرة
            }
        }

        let perPage = getCardsPerView();
        let totalPages = Math.ceil(cards.length / perPage);
        let activePage = 0;
        let pagePositions = [];

        function computePagePositions() {
            if (cards.length === 0) return;
            
            const base = cards[0].offsetLeft;
            pagePositions = [];
            
            for (let p = 0; p < totalPages; p++) {
                const firstIdx = Math.min(p * perPage, cards.length - 1);
                pagePositions.push(cards[firstIdx].offsetLeft - base);
            }
        }

        function buildDots() {
            if (!dotsBox) return;
            dotsBox.innerHTML = '';
            
            for (let i = 0; i < totalPages; i++) {
                const b = document.createElement('button');
                b.type = 'button';
                b.className = 'project-dot' + (i === 0 ? ' active' : '');
                b.addEventListener('click', () => goToPage(i));
                dotsBox.appendChild(b);
            }
        }

        function setActive(idx) {
            activePage = idx;

            if (dotsBox) {
                const dots = dotsBox.querySelectorAll('.project-dot');
                dots.forEach((d, i) => d.classList.toggle('active', i === idx));
            }

            if (prevBtn) {
                prevBtn.classList.toggle('is-disabled', idx === 0);
                prevBtn.disabled = idx === 0;
            }
            
            if (nextBtn) {
                nextBtn.classList.toggle('is-disabled', idx === totalPages - 1);
                nextBtn.disabled = idx === totalPages - 1;
            }
        }

        function goToPage(idx, smooth = true) {
            const i = Math.max(0, Math.min(idx, totalPages - 1));
            const left = pagePositions[i] ?? 0;
            viewport.scrollTo({ left, behavior: smooth ? 'smooth' : 'auto' });
            setActive(i);
        }

        let scrollTimer;
        function onScroll() {
            clearTimeout(scrollTimer);
            scrollTimer = setTimeout(() => {
                const x = viewport.scrollLeft;
                let best = 0;
                let bestD = Infinity;
                for (let i = 0; i < pagePositions.length; i++) {
                    const d = Math.abs(pagePositions[i] - x);
                    if (d < bestD) {
                        bestD = d;
                        best = i;
                    }
                }
                setActive(best);
            }, 80);
        }

        function reflow() {
            // إعادة حساب عدد البطاقات
            const newPerPage = getCardsPerView();
            const newTotalPages = Math.ceil(cards.length / newPerPage);
            
            // إذا تغير عدد البطاقات، إعادة الحساب
            if (newPerPage !== perPage || newTotalPages !== totalPages) {
                perPage = newPerPage;
                totalPages = newTotalPages;
                computePagePositions();
                buildDots();
                
                // التأكد من أن الصفحة الحالية صالحة
                const newActivePage = Math.min(activePage, totalPages - 1);
                if (newActivePage !== activePage) {
                    activePage = newActivePage;
                    goToPage(activePage, false);
                } else {
                    setActive(activePage);
                }
            }
        }

        // إضافة الأحداث
        if (prevBtn) {
            prevBtn.addEventListener('click', () => goToPage(activePage - 1));
        }
        
        if (nextBtn) {
            nextBtn.addEventListener('click', () => goToPage(activePage + 1));
        }

        // التهيئة الأولية
        computePagePositions();
        buildDots();
        setActive(0);

        viewport.addEventListener('scroll', onScroll);
        window.addEventListener('resize', reflow);
        window.addEventListener('load', reflow);
    }

    // تهيئة السلايدرز
    initSingleSlider(viewportAr, trackAr, dotsBoxAr, prevBtnAr, nextBtnAr);
    initSingleSlider(viewportEn, trackEn, dotsBoxEn, prevBtnEn, nextBtnEn);
}

// في DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
    if (typeof initProjectsSlider === 'function') {
        initProjectsSlider();
    }
});


/* =============================
   سلايدر المجالات
   ============================= */
function initFieldsSlider() {
    // العناصر العربية
    const viewportAr = document.getElementById('fieldsViewport');
    const trackAr = document.getElementById('fieldsTrack');
    const dotsBoxAr = document.querySelector('.fields-section:not(.lang-en) .fields-dots');
    const prevBtnAr = document.getElementById('fieldsArrowPrev');
    const nextBtnAr = document.getElementById('fieldsArrowNext');
    
    // العناصر الإنجليزية
    const viewportEn = document.getElementById('fieldsViewportEn');
    const trackEn = document.getElementById('fieldsTrackEn');
    const dotsBoxEn = document.querySelector('.lang-en .fields-dots');
    const prevBtnEn = document.getElementById('fieldsArrowPrevEn');
    const nextBtnEn = document.getElementById('fieldsArrowNextEn');

    // دالة لتهيئة سلايدر واحد
    function initSingleSlider(viewport, track, dotsBox, prevBtn, nextBtn, isRTL) {
        if (!viewport || !track) return;

        const items = Array.from(track.querySelectorAll('.field-item'));
        if (items.length === 0) return;

        // حساب عدد العناصر المعروضة بناءً على عرض العنصر و الجاب
        function getItemsPerView() {
            if (items.length === 0) return 1;
            
            const viewportWidth = viewport.offsetWidth;
            const itemWidth = items[0].offsetWidth;
            const gap = 25; // قيمة الجاب من CSS
            
            // حساب عدد العناصر التي تناسب العرض بدون قص
            let itemsPerView = Math.floor(viewportWidth / (itemWidth + gap));
            
            // إذا كان عدد العناصر قليلاً، نعرضها جميعاً
            if (itemsPerView >= items.length) {
                return items.length;
            }
            
            // الحد الأدنى عنصر واحد
            return Math.max(1, itemsPerView);
        }

        let perPage = getItemsPerView();
        let totalPages = Math.ceil(items.length / perPage);
        let activePage = 0;
        let pagePositions = [];

        function computePagePositions() {
            if (items.length === 0) return;
            
            const base = items[0].offsetLeft;
            pagePositions = [];
            
            for (let p = 0; p < totalPages; p++) {
                const firstIdx = p * perPage;
                if (firstIdx < items.length) {
                    pagePositions.push(items[firstIdx].offsetLeft - base);
                }
            }
        }

        function buildDots() {
            if (!dotsBox) {
                console.log('dotsBox not found for', isRTL ? 'Arabic' : 'English');
                return;
            }
            dotsBox.innerHTML = '';
            
            for (let i = 0; i < totalPages; i++) {
                const b = document.createElement('button');
                b.type = 'button';
                b.className = 'field-dot' + (i === 0 ? ' active' : '');
                b.addEventListener('click', () => goToPage(i));
                b.setAttribute('aria-label', isRTL ? `الصفحة ${i + 1}` : `Page ${i + 1}`);
                dotsBox.appendChild(b);
            }
        }

        function setActive(idx) {
            activePage = idx;

            if (dotsBox) {
                const dots = dotsBox.querySelectorAll('.field-dot');
                dots.forEach((d, i) => d.classList.toggle('active', i === idx));
            }

            if (prevBtn) {
                prevBtn.classList.toggle('is-disabled', idx === 0);
                prevBtn.disabled = idx === 0;
            }
            
            if (nextBtn) {
                nextBtn.classList.toggle('is-disabled', idx === totalPages - 1);
                nextBtn.disabled = idx === totalPages - 1;
            }
        }

        function goToPage(idx, smooth = true) {
            const i = Math.max(0, Math.min(idx, totalPages - 1));
            const left = pagePositions[i] ?? 0;
            viewport.scrollTo({ left, behavior: smooth ? 'smooth' : 'auto' });
            setActive(i);
        }

        let scrollTimer;
        function onScroll() {
            clearTimeout(scrollTimer);
            scrollTimer = setTimeout(() => {
                const x = viewport.scrollLeft;
                let best = 0;
                let bestD = Infinity;
                for (let i = 0; i < pagePositions.length; i++) {
                    const d = Math.abs(pagePositions[i] - x);
                    if (d < bestD) {
                        bestD = d;
                        best = i;
                    }
                }
                setActive(best);
            }, 80);
        }

        function reflow() {
            // إعادة حساب عدد العناصر المعروضة
            const newPerPage = getItemsPerView();
            const newTotalPages = Math.ceil(items.length / newPerPage);
            
            // إذا تغير عدد العناصر في الصفحة، نعيد الحساب
            if (newPerPage !== perPage || newTotalPages !== totalPages) {
                perPage = newPerPage;
                totalPages = newTotalPages;
                computePagePositions();
                buildDots();
                
                // التأكد من أن الصفحة الحالية صالحة
                const newActivePage = Math.min(activePage, totalPages - 1);
                if (newActivePage !== activePage) {
                    activePage = newActivePage;
                    goToPage(activePage, false);
                } else {
                    setActive(activePage);
                }
            }
        }

        // إضافة الأحداث
        if (prevBtn) {
            prevBtn.addEventListener('click', () => goToPage(activePage - 1));
        }
        
        if (nextBtn) {
            nextBtn.addEventListener('click', () => goToPage(activePage + 1));
        }

        // التهيئة الأولية
        computePagePositions();
        buildDots();
        setActive(0);

        viewport.addEventListener('scroll', onScroll);
        window.addEventListener('resize', reflow);
        window.addEventListener('load', reflow);
        
        // إعادة الحساب بعد تحميل الصور
        const images = track.querySelectorAll('img');
        images.forEach(img => {
            img.addEventListener('load', reflow);
        });

        // أيضًا، إعادة الحساب بعد 500ms للتأكد من تحميل كل شيء
        setTimeout(reflow, 500);
    }

    // تهيئة السلايدرز - مع التحقق من وجود العناصر
    if (viewportAr && trackAr) {
        initSingleSlider(viewportAr, trackAr, dotsBoxAr, prevBtnAr, nextBtnAr, true);
    }
    
    if (viewportEn && trackEn) {
        initSingleSlider(viewportEn, trackEn, dotsBoxEn, prevBtnEn, nextBtnEn, false);
    }
}

// في DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
    if (typeof initFieldsSlider === 'function') {
        initFieldsSlider();
    }
});