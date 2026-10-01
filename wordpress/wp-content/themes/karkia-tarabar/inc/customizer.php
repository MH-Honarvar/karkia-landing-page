<?php
/**
 * Customizer settings for contact details.
 *
 * @package Karkia_Tarabar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer fields.
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 */
function karkia_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'karkia_contact',
		array(
			'title'       => 'تماس کارکیا',
			'description' => 'شماره، واتساپ، ایمیل و آدرس‌های نمایش‌داده‌شده در لندینگ.',
			'priority'    => 30,
		)
	);

	$fields = array(
		'karkia_phone_display'  => array( 'تلفن نمایشی دفتر', '05138338411 - 13' ),
		'karkia_phone_tel'      => array( 'لینک تلفن (با کد کشور)', '+985138338411' ),
		'karkia_mobile_display' => array( 'موبایل نمایشی', '0915 244 4149' ),
		'karkia_whatsapp'       => array( 'واتساپ (فقط رقم، مثل 98915...)', '989152444149' ),
		'karkia_email'          => array( 'ایمیل سازمانی', 'Traffic@karkiatarabar.com' ),
		'karkia_address_mashhad' => array( 'آدرس مشهد (فارسی)', 'مشهد، بلوار هفت تیر، بین هفت تیر ۸، برج اداری تجاری آرمیتاژ گلشن، طبقه ۵، واحدهای ۵۰۱ و ۵۰۲' ),
		'karkia_address_bandar'  => array( 'آدرس بندرعباس (فارسی)', 'بندر عباس، اوزینها، بلوار طالقانی، کوچه موج ۸، مجتمع تجاری سفیر، طبقه ۴، واحد ۵۰۲' ),
	);

	foreach ( $fields as $id => $meta ) {
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $meta[1],
				'sanitize_callback' => false !== strpos( $id, 'address' ) ? 'sanitize_textarea_field' : 'sanitize_text_field',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			$id,
			array(
				'label'   => $meta[0],
				'section' => 'karkia_contact',
				'type'    => false !== strpos( $id, 'address' ) ? 'textarea' : 'text',
			)
		);
	}
}
add_action( 'customize_register', 'karkia_customize_register' );
