<?php
/**
 * Quote and contact form mail handlers.
 *
 * @package Karkia_Tarabar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shared mail sender.
 *
 * @param string $subject Subject.
 * @param string $body    Body.
 * @param string $reply   Reply-to email.
 * @return bool
 */
function karkia_send_mail( $subject, $body, $reply = '' ) {
	$to = karkia_get_option( 'email', 'Traffic@karkiatarabar.com' );
	if ( ! is_email( $to ) ) {
		$to = get_option( 'admin_email' );
	}
	$headers = array( 'Content-Type: text/plain; charset=UTF-8' );
	if ( $reply && is_email( $reply ) ) {
		$headers[] = 'Reply-To: ' . $reply;
	}
	return wp_mail( $to, $subject, $body, $headers );
}

/**
 * AJAX: freight quote.
 */
function karkia_ajax_quote() {
	check_ajax_referer( 'karkia_forms', 'nonce' );

	$honey = isset( $_POST['_honey'] ) ? sanitize_text_field( wp_unslash( $_POST['_honey'] ) ) : '';
	if ( $honey !== '' ) {
		wp_send_json_success();
	}

	$ref   = sanitize_text_field( wp_unslash( $_POST['Quote_Ref'] ?? '' ) );
	$orig  = sanitize_text_field( wp_unslash( $_POST['Origin'] ?? '' ) );
	$dest  = sanitize_text_field( wp_unslash( $_POST['Destination'] ?? '' ) );
	$cargo = sanitize_text_field( wp_unslash( $_POST['Cargo'] ?? '' ) );
	$weight = sanitize_text_field( wp_unslash( $_POST['Weight'] ?? '' ) );
	$phone = sanitize_text_field( wp_unslash( $_POST['Phone'] ?? '' ) );
	$reply = sanitize_email( wp_unslash( $_POST['Reply_Email'] ?? '' ) );
	$msg   = sanitize_textarea_field( wp_unslash( $_POST['Message'] ?? '' ) );

	$body = "Karkia quote {$ref}\n";
	$body .= "Origin: {$orig}\nDestination: {$dest}\nCargo: {$cargo}\nWeight: {$weight}\nPhone: {$phone}\nEmail: {$reply}\n\n{$msg}\n";

	$ok = karkia_send_mail( 'Karkia quote ' . $ref, $body, $reply );
	if ( $ok ) {
		wp_send_json_success();
	}
	wp_send_json_error();
}
add_action( 'wp_ajax_karkia_quote', 'karkia_ajax_quote' );
add_action( 'wp_ajax_nopriv_karkia_quote', 'karkia_ajax_quote' );

/**
 * AJAX: contact form.
 */
function karkia_ajax_contact() {
	check_ajax_referer( 'karkia_forms', 'nonce' );

	$name    = sanitize_text_field( wp_unslash( $_POST['Name'] ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['Phone'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['Email'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['Message'] ?? '' ) );

	$body = "Website contact\n{$name}\n{$phone}\n{$email}\n\n{$message}\n";
	$ok   = karkia_send_mail( 'Contact — Karkia Tarabar', $body, $email );
	if ( $ok ) {
		wp_send_json_success();
	}
	wp_send_json_error();
}
add_action( 'wp_ajax_karkia_contact', 'karkia_ajax_contact' );
add_action( 'wp_ajax_nopriv_karkia_contact', 'karkia_ajax_contact' );
