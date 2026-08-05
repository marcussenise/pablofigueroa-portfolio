<?php
/**
 * Template Name: Portfólio Arte
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$img = get_template_directory_uri() . '/assets/img/';
$wa_surrealirico = rawurlencode( 'Olá, Pablo! Tenho interesse em adquirir o livro Surrealírico.' );
$wa_diaspora     = rawurlencode( 'Olá, Pablo! Tenho interesse em saber mais sobre o projeto Diáspora Negra.' );
?>

<main id="main">

	<section class="pf-page-hero pf-section-alt">
		<img src="<?php echo esc_url( $img . 'sankofabird.png' ); ?>" alt="" class="pf-sankofa pf-sankofa-1" aria-hidden="true">
		<div class="pf-container">
			<div class="pf-breadcrumb">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / <span>Portfólio Arte</span>
			</div>
			<span class="pf-eyebrow">Multiartista</span>
			<h1><?php the_title(); ?></h1>
			<p>Literatura, produção artística e criações autorais de Pablo Figueroa — @<?php echo esc_html( pf_instagram_arte_handle() ); ?></p>
		</div>
	</section>

	<section class="pf-section">
		<div class="pf-container">
			<span class="pf-eyebrow">Obras publicadas</span>
			<h2>Livros à venda</h2>

			<div class="pf-portfolio-grid">
				<div class="pf-portfolio-card">
					<span class="pf-portfolio-tag">Livro</span>
					<h3>Surrealírico</h3>
					<p>Obra literária de Pablo Figueroa, lançada na Feira do Livro de 2022. Poesia e lirismo em diálogo com o surreal.</p>
					<div style="text-align:center;">
						<a class="pf-btn pf-btn-solid" target="_blank" rel="noopener noreferrer" href="https://wa.me/<?php echo esc_attr( pf_whatsapp_number() ); ?>?text=<?php echo esc_attr( $wa_surrealirico ); ?>">Comprar pelo WhatsApp</a>
					</div>
				</div>

				<div class="pf-portfolio-card">
					<span class="pf-portfolio-tag">Projeto / Programa</span>
					<h3>Diáspora Negra</h3>
					<p>Projeto e programa de gestão de projetos e captação de recursos, com curadoria voltada à ancestralidade e cultura negra.</p>
					<div style="text-align:center;">
						<a class="pf-btn pf-btn-solid" target="_blank" rel="noopener noreferrer" href="https://wa.me/<?php echo esc_attr( pf_whatsapp_number() ); ?>?text=<?php echo esc_attr( $wa_diaspora ); ?>">Saber mais</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="pf-section pf-section-alt">
		<div class="pf-container">
			<span class="pf-eyebrow">Curadoria e exposições</span>
			<h2>Projetos artísticos</h2>
			<ul class="pf-timeline">
				<li>
					<strong>O Encanto Era Eu</strong>
					<span>Projeto / Exposição — curadoria e produção.</span>
				</li>
				<li>
					<strong>Domingão TN1</strong>
					<span>Ações artísticas em parceria com o coletivo TN1.</span>
				</li>
				<li>
					<strong>Cer.Coletivo</strong>
					<span>Produções e intervenções artísticas coletivas — @cer.coletivo.</span>
				</li>
			</ul>
		</div>
	</section>

	<?php
	while ( have_posts() ) :
		the_post();
		if ( trim( get_the_content() ) !== '' ) :
			?>
			<section class="pf-section">
				<div class="pf-container pf-page-content">
					<?php the_content(); ?>
				</div>
			</section>
			<?php
		endif;
	endwhile;
	?>

	<section class="pf-section pf-section-alt">
		<div class="pf-container" style="text-align:center;">
			<span class="pf-eyebrow">Acompanhe e adquira</span>
			<h2>Veja mais no Instagram</h2>
			<p class="pf-hero-lead" style="margin:0 auto 2em;">Novas artes, bastidores e lançamentos são publicados primeiro por lá.</p>

			<a class="pf-instagram-frame" href="https://www.instagram.com/<?php echo esc_attr( pf_instagram_arte_handle() ); ?>" target="_blank" rel="noopener noreferrer">
				<img src="<?php echo esc_url( $img . 'instagram-demo.png' ); ?>" alt="Instagram @<?php echo esc_attr( pf_instagram_arte_handle() ); ?>" loading="lazy">
				<span class="pf-instagram-handle">@<?php echo esc_html( pf_instagram_arte_handle() ); ?></span>
			</a>

			<a class="pf-btn pf-btn-outline" href="<?php echo esc_url( home_url( '/#contato' ) ); ?>" style="margin-top:32px;">Falar com Pablo</a>
		</div>
	</section>

</main>

<?php get_footer(); ?>
