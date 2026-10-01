

    <footer>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo.png' ); ?>" alt="لوگوی فوتر شرکت کارکیا ترابر" width="150" height="60" loading="lazy">
        <div>
            <span class="lang-fa">&copy; 2026 کارکیا ترابر آسیا. تمامی حقوق محفوظ است.</span>
            <span class="lang-en" lang="en" dir="ltr">&copy; 2026 Karkia Tarabar Asia. All Rights Reserved.</span>
            <span class="lang-ru" lang="ru" dir="ltr">&copy; 2026 Karkia Tarabar Asia. Все права защищены.</span>
            <br>
            <div class="footer-credit" dir="ltr">
                Designed &amp; Developed by
                <details class="designer-card" id="designerCard">
                    <summary>Mohammad Honarvar</summary>
                    <div class="designer-panel">
                        <strong>محمد هنرور</strong>
                        <button type="button" class="designer-role-btn" id="designerRoleBtn" aria-expanded="false" aria-controls="designerPhone">
                            <span class="designer-role lang-fa">طراح و توسعه‌دهنده وب</span>
                            <span class="designer-role lang-en" lang="en" dir="ltr">Web designer &amp; developer</span>
                            <span class="designer-role lang-ru" lang="ru" dir="ltr">Веб-дизайнер и разработчик</span>
                        </button>
                        <a class="designer-phone" id="designerPhone" href="tel:+989154442870" dir="ltr">0915 444 2870</a>
                        <p class="lang-fa">طراح و برنامه‌نویس وب؛ این سایت را از طراحی تا پیاده‌سازی انجام داده است.</p>
                        <p class="lang-en" lang="en" dir="ltr">Web designer and developer who designed and built this website.</p>
                        <p class="lang-ru" lang="ru" dir="ltr">Веб-дизайнер и разработчик, создавший этот сайт от концепции до запуска.</p>
                    </div>
                </details>
            </div>
        </div>
    </footer>

    <!-- Floating Buttons Container -->
    <div class="floating-btns">
        <button type="button" class="scroll-top-btn" id="scrollTopBtn" aria-label="بازگشت به بالای صفحه" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">
            <i class="fa-solid fa-chevron-up" aria-hidden="true"></i>
        </button>
        <button type="button" class="chat-toggle-btn" id="chatToggleBtn" aria-label="پیام واتس‌اپ" aria-expanded="false" aria-controls="chatBox">
            <i class="fa-solid fa-comments" aria-hidden="true"></i>
        </button>
        <a href="https://wa.me/<?php echo esc_attr( karkia_get_option( 'whatsapp', '989152444149' ) ); ?>?text=%D8%B3%D9%84%D8%A7%D9%85%D8%8C%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D8%A7%D8%B3%D8%AA%D8%B9%D9%84%D8%A7%D9%85%20%DA%A9%D8%B1%D8%A7%DB%8C%D9%87%20%D9%BE%DB%8C%D8%A7%D9%85%20%D9%85%DB%8C%E2%80%8C%D8%AF%D9%87%D9%85." class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="ارتباط مستقیم در واتس‌اپ" title="WhatsApp">
            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
        </a>
    </div>

    <!-- Live Chat Widget -->
    <div class="chat-box" id="chatBox">
        <div class="chat-header">
            <div>
                <strong>
                    <span class="lang-fa">پیام به واتس‌اپ</span>
                    <span class="lang-en" lang="en" dir="ltr">WhatsApp message</span>
                    <span class="lang-ru" lang="ru" dir="ltr">Сообщение в WhatsApp</span>
                </strong>
                <span class="chat-status">
                    <span class="lang-fa">چت زنده نیست</span>
                    <span class="lang-en" lang="en" dir="ltr">Not a live chat</span>
                    <span class="lang-ru" lang="ru" dir="ltr">Не живой чат</span>
                </span>
            </div>
            <button type="button" id="closeChatBtn" aria-label="Close Chat"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
        </div>
        <div class="chat-body" id="chatBody">
            <div class="chat-message agent-message">
                <span class="lang-fa">سلام. این پنجره چت زنده نیست. متن را بنویسید تا در واتس‌اپ برای واحد ترافیک باز شود.</span>
                <span class="lang-en" lang="en" dir="ltr">Hi. This is not live chat. Type a message and we will open it in WhatsApp for the traffic desk.</span>
                <span class="lang-ru" lang="ru" dir="ltr">Здравствуйте. Это не живой чат. Напишите текст — откроем его в WhatsApp для отдела трафика.</span>
            </div>
        </div>
        <div class="chat-input-area">
            <input type="text" id="chatInput" data-placeholder-fa="پیام خود را بنویسید..." data-placeholder-en="Type your message..." data-placeholder-ru="Напишите сообщение..." placeholder="پیام خود را بنویسید..." autocomplete="off">
            <button type="button" id="sendChatBtn" aria-label="Send"><i class="fa-solid fa-paper-plane" aria-hidden="true"></i></button>
        </div>
    </div>

    
<?php wp_footer(); ?>
</body>
</html>
