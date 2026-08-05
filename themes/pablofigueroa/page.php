<?php
/**
 * Template genérico para páginas sem template específico.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main">
	<section class="pf-page-hero pf-section-alt">
		<div class="pf-container">
			<div class="pf-breadcrumb">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / <span><?php the_title(); ?></span>
			</div>
			<h1><?php the_title(); ?></h1>
		</div>
	</section>

	<section class="pf-section">
		<div class="pf-container pf-page-content">
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>
		</div>
	</section>
</main>

<?php get_footer(); ?>
