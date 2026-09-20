<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-content">
            <!-- النص الرئيسي والفرعي -->
            <div class="footer-text">
                <h3 class="footer-main-text">{{ optional($footer)->main_text_ar ?? 'معًا نصنع الأثر' }}</h3>
                <p class="footer-sub-text">{{ optional($footer)->sub_text_ar ?? 'تواصل معنا لمعرفة المزيد' }}</p>
            </div>

            <!-- فراغ -->
            
            <!-- رقم الهاتف -->
            <div class="footer-contact">
                <h4 class="contact-title">رقم الهاتف</h4>
                <p class="contact-info">{{ optional($footer)->phone_ar ?? '+967 777 777 777' }}</p>
            </div>

            <!-- فراغ -->
            
            <!-- البريد الإلكتروني -->
            <div class="footer-contact">
                <h4 class="contact-title">البريد الالكتروني</h4>
                <p class="contact-info">{{ optional($footer)->email_ar ?? 'albena@gmail.com' }}</p>
            </div>

            <!-- فراغ -->
            
            <!-- الموقع -->
            <div class="footer-contact">
                <h4 class="contact-title">الموقع</h4>
                <p class="contact-info">{{ optional($footer)->location_ar ?? 'سيئون - القرن - مدرسة القرن' }}</p>
            </div>

            <!-- فراغ -->
            
            <!-- وسائل التواصل -->
            <div class="footer-social">
                <h4 class="social-title">{{ optional($footer)->social_title_ar ?? 'تواصل معنا عبر' }}</h4>
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
        
        <!--  الخط والفقرة الجديدة -->
        <div class="footer-bottom">
            <p class="copyright">{{ optional($footer)->copyright_ar ?? 'جميع الحقوق محفوظة لمؤسسة البناء للتنمية البشرية © 2025' }}</p>
        </div>
    </div>
</footer>