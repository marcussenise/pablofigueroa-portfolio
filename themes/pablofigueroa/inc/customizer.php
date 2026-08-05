<?php
/**
 * Customizer: dados de contato editáveis pelo admin sem tocar em código.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function pf_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'pf_contact', array(
		'title'    => __( 'Contato — Pablo Figueroa', 'pablofigueroa' ),
		'priority' => 30,
	) );

	$fields = array(
		'pf_whatsapp'        => '+55 61 8101-7427',
		'pf_email'           => 'pablobfig@gmail.com',
		'pf_instagram_arte'  => '@osretalhos',
		'pf_instagram_geral' => '@pblfigueroa',
		'pf_linkedin'        => '@pablobfigueroa',
	);

	$labels = array(
		'pf_whatsapp'        => 'WhatsApp (com DDI/DDD)',
		'pf_email'           => 'E-mail de contato',
		'pf_instagram_arte'  => 'Instagram (artes — @osretalhos)',
		'pf_instagram_geral' => 'Instagram (contato/produção)',
		'pf_linkedin'        => 'LinkedIn (usuário)',
	);

	foreach ( $fields as $id => $default ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $default,
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $labels[ $id ],
			'section' => 'pf_contact',
			'type'    => 'text',
		) );
	}
}
add_action( 'customize_register', 'pf_customize_register' );

/**
 * Helpers para recuperar os dados de contato em qualquer template.
 */
function pf_whatsapp_number() {
	$raw = get_theme_mod( 'pf_whatsapp', '+55 61 8101-7427' );
	return preg_replace( '/\D/', '', $raw );
}

function pf_whatsapp_display() {
	return get_theme_mod( 'pf_whatsapp', '+55 61 8101-7427' );
}

function pf_email() {
	return get_theme_mod( 'pf_email', 'pablobfig@gmail.com' );
}

function pf_instagram_arte_handle() {
	return ltrim( get_theme_mod( 'pf_instagram_arte', '@osretalhos' ), '@' );
}

function pf_instagram_geral_handle() {
	return ltrim( get_theme_mod( 'pf_instagram_geral', '@pblfigueroa' ), '@' );
}

function pf_linkedin_handle() {
	return ltrim( get_theme_mod( 'pf_linkedin', '@pablobfigueroa' ), '@' );
}
