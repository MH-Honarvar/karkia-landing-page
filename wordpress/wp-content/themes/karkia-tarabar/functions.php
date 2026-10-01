<?php
/**
 * Karkia Tarabar theme bootstrap.
 *
 * @package Karkia_Tarabar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'KARKIA_THEME_VERSION', '1.0.1' );

require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/forms.php';

/**
 * Theme option helper (Customizer mods).
 *
 * @param string $key     Option key.
 * @param string $default Default value.
 * @return string
 */
function karkia_get_option( $key, $default = '' ) {
	$map = array(
		'phone_display'  => 'karkia_phone_display',
		'phone_tel'      => 'karkia_phone_tel',
		'mobile_display' => 'karkia_mobile_display',
		'whatsapp'       => 'karkia_whatsapp',
		'email'          => 'karkia_email',
		'address_mashhad'=> 'karkia_address_mashhad',
		'address_bandar' => 'karkia_address_bandar',
	);
	if ( ! isset( $map[ $key ] ) ) {
		return $default;
	}
	$value = get_theme_mod( $map[ $key ], $default );
	return is_string( $value ) && $value !== '' ? $value : $default;
}

/**
 * Setup.
 */
function karkia_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'automatic-feed-links' );
	load_theme_textdomain( 'karkia-tarabar', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'karkia_setup' );

add_filter(
	'locale',
	static function ( $locale ) {
		if ( ! $locale ) {
			return 'fa_IR';
		}
		return $locale;
	}
);

/**
 * Enqueue assets.
 */
function karkia_enqueue_assets() {
	$uri = get_template_directory_uri();

	wp_enqueue_style(
		'karkia-fontawesome',
		$uri . '/assets/vendor/fontawesome/css/all.min.css',
		array(),
		KARKIA_THEME_VERSION
	);
	wp_enqueue_style(
		'karkia-theme',
		$uri . '/css/theme.css',
		array( 'karkia-fontawesome' ),
		KARKIA_THEME_VERSION
	);

	wp_enqueue_script(
		'karkia-boot',
		$uri . '/js/boot.js',
		array(),
		KARKIA_THEME_VERSION,
		false
	);
	wp_enqueue_script(
		'karkia-theme',
		$uri . '/js/theme.js',
		array(),
		KARKIA_THEME_VERSION,
		true
	);

	wp_localize_script(
		'karkia-theme',
		'KTA',
		array(
			'uri'   => $uri,
			'wa'    => karkia_get_option( 'whatsapp', '989152444149' ),
			'mail'  => karkia_get_option( 'email', 'Traffic@karkiatarabar.com' ),
			'ajax'  => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'karkia_forms' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'karkia_enqueue_assets' );

/**
 * Default document title (matches static landing).
 *
 * @param array $parts Title parts.
 * @return array
 */
function karkia_document_title( $parts ) {
	if ( is_front_page() || is_home() ) {
		$parts['title']   = 'کارکیا ترابر آسیا | Karkia Tarabar Asia | لجستیک و حمل و نقل بین‌المللی';
		$parts['site']    = '';
		$parts['tagline'] = '';
	}
	return $parts;
}
add_filter( 'document_title_parts', 'karkia_document_title' );

/**
 * SEO metas, hreflang, OG/Twitter, fonts, favicons, JSON-LD.
 */
function karkia_head_extras() {
	$uri  = get_template_directory_uri();
	$home = home_url( '/' );
	$desc = 'شرکت کارکیا ترابر آسیا، پیشرو در خدمات لجستیک و حمل و نقل بین‌المللی جاده‌ای، ریلی، هوایی و دریایی. ترانزیت ایمن محموله‌های تجاری با شبکه جهانی گسترده و نمایندگان بین المللی.';
	$og_desc = 'خدمات جامع حمل و نقل بین‌المللی. درخواست استعلام کرایه از طریق فرم، تماس یا واتس‌اپ؛ نرخ نهایی پس از بررسی مسیر اعلام می‌شود.';
	$tw_desc = 'خدمات جامع حمل و نقل بین‌المللی. درخواست استعلام کرایه از طریق فرم، تماس یا واتس‌اپ.';
	$og_title = 'کارکیا ترابر آسیا | راهکارهای نوین لجستیک بین‌المللی';
	$logo = $uri . '/assets/logo.png';
	$wa   = 'https://wa.me/' . karkia_get_option( 'whatsapp', '989152444149' );

	echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
	echo '<meta name="author" content="Karkia Tarabar Asia">' . "\n";
	echo '<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">' . "\n";
	echo '<link rel="canonical" href="' . esc_url( $home ) . '">' . "\n";
	echo '<link rel="alternate" hreflang="fa" href="' . esc_url( $home ) . '">' . "\n";
	echo '<link rel="alternate" hreflang="en" href="' . esc_url( add_query_arg( 'lang', 'en', $home ) ) . '">' . "\n";
	echo '<link rel="alternate" hreflang="ru" href="' . esc_url( add_query_arg( 'lang', 'ru', $home ) ) . '">' . "\n";
	echo '<link rel="alternate" hreflang="x-default" href="' . esc_url( $home ) . '">' . "\n";

	echo '<meta property="og:locale" content="fa_IR">' . "\n";
	echo '<meta property="og:type" content="website">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $og_title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $og_desc ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $home ) . '">' . "\n";
	echo '<meta property="og:site_name" content="Karkia Tarabar Asia">' . "\n";
	echo '<meta property="og:image" content="' . esc_url( $logo ) . '">' . "\n";

	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	echo '<meta name="twitter:title" content="کارکیا ترابر آسیا | لجستیک بین‌المللی">' . "\n";
	echo '<meta name="twitter:description" content="' . esc_attr( $tw_desc ) . '">' . "\n";
	echo '<meta name="twitter:image" content="' . esc_url( $logo ) . '">' . "\n";

	echo '<link rel="preload" as="font" type="font/woff2" href="' . esc_url( $uri . '/assets/fonts/Vazirmatn-Regular.woff2' ) . '" crossorigin>' . "\n";
	echo '<link rel="preload" as="font" type="font/woff2" href="' . esc_url( $uri . '/assets/fonts/Vazirmatn-Bold.woff2' ) . '" crossorigin>' . "\n";
	echo '<link rel="icon" href="' . esc_url( $uri . '/assets/favicon.png' ) . '" type="image/png" sizes="32x32">' . "\n";
	echo '<link rel="icon" href="' . esc_url( $uri . '/assets/favicon-192.png' ) . '" type="image/png" sizes="192x192">' . "\n";
	echo '<link rel="apple-touch-icon" href="' . esc_url( $uri . '/assets/apple-touch-icon.png' ) . '" sizes="180x180">' . "\n";

	$schema = array(
		array(
			'@context'  => 'https://schema.org',
			'@type'     => 'LogisticsService',
			'name'      => 'Karkia Tarabar Asia',
			'image'     => $logo,
			'@id'       => $home,
			'url'       => $home,
			'telephone' => karkia_get_option( 'phone_tel', '+985138338411' ),
			'email'     => karkia_get_option( 'email', 'Traffic@karkiatarabar.com' ),
			'address'   => array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => karkia_get_option( 'address_mashhad', 'مشهد، بلوار هفت تیر، بین هفت تیر ۸، برج اداری تجاری آرمیتاژ گلشن، طبقه ۵، واحدهای ۵۰۱ و ۵۰۲' ),
				'addressLocality' => 'Mashhad',
				'postalCode'      => '9178772890',
				'addressCountry'  => 'IR',
			),
			'geo'       => array(
				'@type'     => 'GeoCoordinates',
				'latitude'  => 36.324305,
				'longitude' => 59.499507,
			),
			'sameAs'    => array( $wa ),
		),
		array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array(
					'@type'          => 'Question',
					'name'           => 'خدمات اصلی شرکت کارکیا ترابر چیست؟',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'خدمات جامع حمل و نقل جاده‌ای، ریلی، هوایی و دریایی، همراه با ترانزیت تخصصی محموله‌های صادراتی و وارداتی در سطح بین‌المللی.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'آیا شما در کشورهای دیگر هم نمایندگی دارید؟',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'کارکیا ترابر دارای دفاتر فعال در امارات متحده عربی، عمان و نمایندگان تجاری رسمی در چین و کشورهای کلیدی آسیای میانه می‌باشد.',
					),
				),
				array(
					'@type'          => 'Question',
					'name'           => 'چگونه می‌توانم استعلام قیمت بگیرم؟',
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => 'از فرم درخواست استعلام در سایت، فرم تماس، تلفن دفتر یا واتس‌اپ جزئیات بار را بفرستید تا کارشناس نرخ را اعلام کند.',
					),
				),
			),
		),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_head', 'karkia_head_extras', 2 );

/**
 * Replace nav logo if Custom Logo is set.
 */
function karkia_custom_logo_js() {
	$logo_id = get_theme_mod( 'custom_logo' );
	if ( ! $logo_id ) {
		return;
	}
	$url = wp_get_attachment_image_url( $logo_id, 'full' );
	if ( ! $url ) {
		return;
	}
	?>
	<script>
	document.addEventListener('DOMContentLoaded', function () {
		var img = document.getElementById('navLogo');
		if (img) img.src = <?php echo wp_json_encode( $url ); ?>;
	});
	</script>
	<?php
}
add_action( 'wp_footer', 'karkia_custom_logo_js', 1 );
