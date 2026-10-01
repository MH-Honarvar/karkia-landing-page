<?php
/**
 * Plugin Name: Karkia default theme
 * Description: یک‌بار بعد از نصب وردپرس، تم کارکیا را فعال می‌کند.
 * Author: Karkia Tarabar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'init',
	static function () {
		if ( get_option( 'karkia_theme_activated' ) ) {
			return;
		}
		if ( ! function_exists( 'switch_theme' ) ) {
			return;
		}
		$theme = wp_get_theme( 'karkia-tarabar' );
		if ( ! $theme->exists() ) {
			return;
		}
		switch_theme( 'karkia-tarabar' );
		update_option( 'show_on_front', 'posts' );
		update_option( 'karkia_theme_activated', 1 );
	}
);
