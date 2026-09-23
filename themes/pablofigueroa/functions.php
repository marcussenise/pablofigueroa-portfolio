<?php
/**
 * Pablo Figueroa theme functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'PF_VERSION', '1.1.4' );

/**
 * Theme setup.
 */
function pf_setup() {
	load_theme_textdomain( 'pablofigueroa', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus( array(
		'primary' => __( 'Menu Principal', 'pablofigueroa' ),
	) );
}
add_action( 'after_setup_theme', 'pf_setup' );

/**
 * Enqueue styles and scripts.
 */
function pf_assets() {
	wp_enqueue_style( 'pf-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Inter:wght@400;500;600&display=swap', array(), null );
	wp_enqueue_style( 'pf-style', get_template_directory_uri() . '/assets/css/style.css', array(), PF_VERSION );
	wp_enqueue_script( 'pf-main', get_template_directory_uri() . '/assets/js/main.js', array(), PF_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'pf_assets' );

/**
 * Lista as imagens de uma pasta dentro de assets/ (ordem natural pelo nome).
 *
 * @param string $folder Caminho relativo a assets/, ex.: 'img/Ilustrações' ou 'textos'.
 * @return string[] URLs das imagens.
 */
function pf_get_gallery_images( $folder ) {
	$dir  = get_template_directory() . '/assets/' . $folder;
	$base = get_template_directory_uri() . '/assets/' . implode( '/', array_map( 'rawurlencode', explode( '/', $folder ) ) ) . '/';

	if ( ! is_dir( $dir ) ) {
		return array();
	}

	$files = array_filter( scandir( $dir ), function ( $file ) {
		return (bool) preg_match( '/\.(jpe?g|png|webp|gif)$/i', $file );
	} );
	natcasesort( $files );

	return array_map( function ( $file ) use ( $base ) {
		return $base . rawurlencode( $file );
	}, array_values( $files ) );
}

/**
 * Fallback menu when no menu is assigned.
 */
function pf_fallback_menu() {
	echo '<ul id="primary-menu" class="pf-nav-menu">';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/#bio' ) ) . '">Sobre</a></li>';
	echo '<li><a href="' . esc_url( get_permalink( pf_get_page_id_by_template( 'page-portfolio-arte.php' ) ) ) . '">Portfólio Arte</a></li>';
	echo '<li><a href="' . esc_url( get_permalink( pf_get_page_id_by_template( 'page-portfolio-produtor.php' ) ) ) . '">Portfólio Produtor</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/#contato' ) ) . '">Contato</a></li>';
	echo '</ul>';
}

/**
 * Helper: get a page ID assigned to a given template file.
 */
function pf_get_page_id_by_template( $template ) {
	static $cache = array();
	if ( isset( $cache[ $template ] ) ) {
		return $cache[ $template ];
	}
	$pages = get_posts( array(
		'post_type'      => 'page',
		'meta_key'       => '_wp_page_template',
		'meta_value'     => $template,
		'posts_per_page' => 1,
		'fields'         => 'ids',
	) );
	$cache[ $template ] = ! empty( $pages ) ? $pages[0] : 0;
	return $cache[ $template ];
}

/**
 * Cria automaticamente as páginas essenciais e o menu ao ativar o tema,
 * para que o site funcione "pronto para uso" sem passos manuais no admin.
 */
function pf_setup_site_on_activation() {

	// Home.
	$home_id = get_option( 'pf_home_page_id' );
	if ( ! $home_id || 'publish' !== get_post_status( $home_id ) ) {
		$home_id = wp_insert_post( array(
			'post_title'   => 'Início',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '',
		) );
		update_option( 'pf_home_page_id', $home_id );
	}
	update_post_meta( $home_id, '_wp_page_template', 'front-page.php' );

	// Portfólio Arte.
	$arte_id = get_option( 'pf_arte_page_id' );
	if ( ! $arte_id || 'publish' !== get_post_status( $arte_id ) ) {
		$arte_id = wp_insert_post( array(
			'post_title'   => 'Portfólio Arte',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '',
		) );
		update_option( 'pf_arte_page_id', $arte_id );
	}
	update_post_meta( $arte_id, '_wp_page_template', 'page-portfolio-arte.php' );

	// Portfólio Produtor.
	$prod_id = get_option( 'pf_produtor_page_id' );
	if ( ! $prod_id || 'publish' !== get_post_status( $prod_id ) ) {
		$prod_id = wp_insert_post( array(
			'post_title'   => 'Portfólio Produtor',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '',
		) );
		update_option( 'pf_produtor_page_id', $prod_id );
	}
	update_post_meta( $prod_id, '_wp_page_template', 'page-portfolio-produtor.php' );

	// Define a página inicial estática.
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $home_id );

	// Cria o menu principal, se ainda não existir.
	$menu_name = 'Menu Principal';
	$menu_exists = wp_get_nav_menu_object( $menu_name );
	if ( ! $menu_exists ) {
		$menu_id = wp_create_nav_menu( $menu_name );

		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  => 'Home',
			'menu-item-url'    => home_url( '/' ),
			'menu-item-status' => 'publish',
		) );
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  => 'Sobre',
			'menu-item-url'    => home_url( '/#bio' ),
			'menu-item-status' => 'publish',
		) );
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  => 'Portfólio Arte',
			'menu-item-object-id' => $arte_id,
			'menu-item-object' => 'page',
			'menu-item-type'   => 'post_type',
			'menu-item-status' => 'publish',
		) );
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  => 'Portfólio Produtor',
			'menu-item-object-id' => $prod_id,
			'menu-item-object' => 'page',
			'menu-item-type'   => 'post_type',
			'menu-item-status' => 'publish',
		) );
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  => 'Contato',
			'menu-item-url'    => home_url( '/#contato' ),
			'menu-item-status' => 'publish',
		) );

		$locations = get_theme_mod( 'nav_menu_locations' );
		$locations['primary'] = $menu_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}
}
add_action( 'after_switch_theme', 'pf_setup_site_on_activation' );

/**
 * Custom excerpt length / widgets not used — site é institucional e estático.
 */

require get_template_directory() . '/inc/customizer.php';
