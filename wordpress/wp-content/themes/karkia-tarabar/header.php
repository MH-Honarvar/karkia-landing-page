<?php
/**
 * Theme header
 *
 * @package Karkia_Tarabar
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$kta_phone  = karkia_get_option( 'phone_display', '05138338411 - 13' );
$kta_tel    = karkia_get_option( 'phone_tel', '+985138338411' );
$kta_mobile = karkia_get_option( 'mobile_display', '0915 244 4149' );
$kta_wa     = karkia_get_option( 'whatsapp', '989152444149' );
$kta_email  = karkia_get_option( 'email', 'Traffic@karkiatarabar.com' );
?><!DOCTYPE html>
<html <?php language_attributes(); ?> dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
	<meta name="referrer" content="strict-origin-when-cross-origin">
	<meta name="theme-color" content="#04111f">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <a class="skip-link" href="#main-content">رد شدن از منو / Skip to content</a>
    <noscript>
        <style>#loader{display:none!important}.fade-in{opacity:1!important;transform:none!important}</style>
        <div class="noscript-banner">برای فرم استعلام، جاوااسکریپت را فعال کنید. تماس: <a href="tel:<?php echo esc_attr( $kta_tel ); ?>" style="color:#fff"><?php echo esc_html( $kta_phone ); ?></a> — واتس‌اپ: <a href="https://wa.me/<?php echo esc_attr( $kta_wa ); ?>" style="color:#fff"><?php echo esc_html( $kta_mobile ); ?></a></div>
    </noscript>

    <!-- 🚨 FIX: Loader Text Repaired -->
    <div id="loader">
        <i class="fa-solid fa-truck-fast loader-icon" aria-hidden="true"></i>
        <div class="loader-text lang-fa">در حال بارگذاری...</div>
        <div class="loader-text lang-en" style="display:none;" lang="en" dir="ltr">Loading...</div>
        <div class="loader-text lang-ru" style="display:none;" lang="ru" dir="ltr">Загрузка...</div>
    </div>

    <!-- 🚨 FIX: Navigation Bar UI/UX Restored -->
    <nav id="navbar" aria-label="Main Navigation">
        <div class="logo-container">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo.png' ); ?>" alt="لوگوی شرکت کارکیا ترابر آسیا" width="150" height="60" id="navLogo">
        </div>
        
        <div class="nav-right">
            <ul id="navLinks">
                <li><a href="#hero" onclick="closeMobileMenu()"><i class="fa-solid fa-house nav-ico" aria-hidden="true"></i><span class="lang-fa">خانه</span><span class="lang-en" lang="en" dir="ltr">Home</span><span class="lang-ru" lang="ru" dir="ltr">Главная</span></a></li>
                <li><a href="#about" onclick="closeMobileMenu()"><i class="fa-solid fa-building nav-ico" aria-hidden="true"></i><span class="lang-fa">درباره ما</span><span class="lang-en" lang="en" dir="ltr">About Us</span><span class="lang-ru" lang="ru" dir="ltr">О нас</span></a></li>
                <li><a href="#services" onclick="closeMobileMenu()"><i class="fa-solid fa-truck-fast nav-ico" aria-hidden="true"></i><span class="lang-fa">خدمات</span><span class="lang-en" lang="en" dir="ltr">Services</span><span class="lang-ru" lang="ru" dir="ltr">Услуги</span></a></li>
                <li><a href="#advantages" onclick="closeMobileMenu()"><i class="fa-solid fa-medal nav-ico" aria-hidden="true"></i><span class="lang-fa">مزیت‌ها</span><span class="lang-en" lang="en" dir="ltr">Advantages</span><span class="lang-ru" lang="ru" dir="ltr">Преимущества</span></a></li>
                <li><a href="#route-map" onclick="closeMobileMenu()"><i class="fa-solid fa-map-location-dot nav-ico" aria-hidden="true"></i><span class="lang-fa">نقشه مسیرها</span><span class="lang-en" lang="en" dir="ltr">Route Map</span><span class="lang-ru" lang="ru" dir="ltr">Карта маршрутов</span></a></li>
                <li><a class="nav-quote" href="#freight-calculator" onclick="closeMobileMenu()"><i class="fa-solid fa-file-invoice-dollar nav-ico" aria-hidden="true"></i><span class="lang-fa">استعلام کرایه</span><span class="lang-en" lang="en" dir="ltr">Get Quote</span><span class="lang-ru" lang="ru" dir="ltr">Запрос тариفا</span></a></li>
                <li><a href="#contact" onclick="closeMobileMenu()"><i class="fa-solid fa-headset nav-ico" aria-hidden="true"></i><span class="lang-fa">تماس با ما</span><span class="lang-en" lang="en" dir="ltr">Contact</span><span class="lang-ru" lang="ru" dir="ltr">Контакты</span></a></li>
            </ul>
            <div class="btn-group">
                <button type="button" class="action-btn theme-toggle" aria-label="Toggle Dark/Light Mode" id="themeBtn">
                    <i class="fa-solid fa-moon" aria-hidden="true"></i>
                </button>
                <button type="button" class="action-btn lang-toggle" aria-label="Toggle Language" onclick="toggleLanguage()" id="langBtn">
                    <i class="fa-solid fa-globe" aria-hidden="true"></i> <span id="langText" lang="en" dir="ltr">EN</span>
                </button>
                <button type="button" class="mobile-menu-btn" id="mobileMenuBtn" aria-label="منوی سایت" aria-expanded="false" aria-controls="navLinks">
                    <span class="menu-icon" aria-hidden="true"><span></span><span></span></span>
                </button>
            </div>
        </div>
    </nav>

    