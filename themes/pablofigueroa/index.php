<?php
/**
 * Template padrão (fallback exigido pelo WordPress).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main">
	<section class="pf-section">
		<div class="pf-container pf-page-content">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class(); ?>>
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</article>
					<?php
				endwhile;
			else :
				?>
				<p><?php esc_html_e( 'Nada encontrado.', 'pablofigueroa' ); ?></p>
				<?php
			endif;
			?>
		</div>
	</section>
</main>

<?php get_footer(); ?>
