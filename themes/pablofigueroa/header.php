<?php
/**
 * Header do tema Pablo Figueroa.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/sankofa2.png' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="pf-header">
	<div class="pf-header-inner">
		<a class="pf-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="pf-brand-name">Pablo <span>Figueroa</span></span>
			<span class="pf-brand-sub">Produtor e Artista Independente</span>
		</a>

		<nav class="pf-nav" aria-label="Menu principal">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'pf-nav-menu',
				) );
			} else {
				pf_fallback_menu();
			}
			?>
		</nav>

		<button class="pf-nav-toggle" aria-label="Abrir menu" aria-expanded="false">
			<span></span>
		</button>
	</div>
	<div class="pf-nav-overlay"></div>
</header>
