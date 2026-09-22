@php
    $isEnglish = app()->getLocale() === 'en';

    $mainText = $isEnglish
        ? optional($footer)->main_text_en ?? 'Together We Make Impact'
        : optional($footer)->main_text_ar ?? 'معًا نصنع الأثر';

    $subText = $isEnglish
        ? optional($footer)->sub_text_en ?? 'Contact us to learn more'
        : optional($footer)->sub_text_ar ?? 'تواصل معنا لمعرفة المزيد';

    $phone = $isEnglish
        ? optional($footer)->phone_en ?? '+967 777 777 777'
        : optional($footer)->phone_ar ?? '+967 777 777 777';

    $email = $isEnglish
        ? optional($footer)->email_en ?? 'albena@gmail.com'
        : optional($footer)->email_ar ?? 'albena@gmail.com';

    $location = $isEnglish
        ? optional($footer)->location_en ?? 'Seiyun - Al-Qarn - Al-Qarn School'
        : optional($footer)->location_ar ?? 'سيئون - القرن - مدرسة القرن';

    $socialTitle = $isEnglish
        ? optional($footer)->social_title_en ?? 'Connect With Us'
        : optional($footer)->social_title_ar ?? 'تواصل معنا عبر';

    $copyright = $isEnglish
        ? optional($footer)->copyright_en ?? 'All rights reserved to Albena Foundation for Human Development © 2025'
        : optional($footer)->copyright_ar ?? 'جميع الحقوق محفوظة لمؤسسة البناء للتنمية البشرية © 2025';

    $phoneLabel = $isEnglish ? 'Phone Number' : 'رقم الهاتف';
    $emailLabel = $isEnglish ? 'Email' : 'البريد الالكتروني';
    $locationLabel = $isEnglish ? 'Location' : 'الموقع';
@endphp

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-text">
                <h3 class="footer-main-text">{{ $mainText }}</h3>
                <p class="footer-sub-text">{{ $subText }}</p>
            </div>

            <div class="footer-contact">
                <h4 class="contact-title">{{ $phoneLabel }}</h4>
                <p class="contact-info">{{ $phone }}</p>
            </div>

            <div class="footer-contact">
                <h4 class="contact-title">{{ $emailLabel }}</h4>
                <p class="contact-info">{{ $email }}</p>
            </div>

            <div class="footer-contact">
                <h4 class="contact-title">{{ $locationLabel }}</h4>
                <p class="contact-info">{{ $location }}</p>
            </div>

            <div class="footer-social">
                <h4 class="social-title">{{ $socialTitle }}</h4>
                <div class="social-icons">
                    <a href="{{ optional($footer)->whatsapp_url ?? '#' }}" class="social-icon" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="{{ optional($footer)->facebook_url ?? '#' }}" class="social-icon" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="copyright">{{ $copyright }}</p>
        </div>
    </div>
</footer>