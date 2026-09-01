<?php
/**
 * Template Name: Portfólio Produtor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$img = get_template_directory_uri() . '/assets/img/';
$wa_msg = rawurlencode( 'Olá, Pablo! Vi seu portfólio de produção e gostaria de conversar sobre um projeto.' );
?>

<main id="main">

	<section class="pf-page-hero pf-section-alt">
		<img src="<?php echo esc_url( $img . 'sankofa2.png' ); ?>" alt="" class="pf-sankofa pf-sankofa-1" aria-hidden="true">
		<div class="pf-container">
			<div class="pf-breadcrumb">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / <span>Portfólio Produtor</span>
			</div>
			<span class="pf-eyebrow">Gestão · Produção · Curadoria</span>
			<h1><?php the_title(); ?></h1>
			<p>Produção de eventos, gestão de projetos culturais e curadoria — experiência em iniciativas independentes e institucionais.</p>
		</div>
	</section>

	<section class="pf-section pf-section-alt">
		<div class="pf-container">
			<span class="pf-eyebrow">Experiência profissional</span>
			<h2>Produções e projetos</h2>

			<ul class="pf-timeline">
				<li>
					<strong>Direção Criativa — Satélite HUB</strong>
					<span>Produção de eventos e direção criativa na empresa.</span>
				</li>
				<li>
					<strong>Festival Fluxos</strong>
					<span>Produção e gestão comprovadas pelo Senac e iniciativas independentes.</span>
				</li>
				<li>
					<strong>Diáspora Negra</strong>
					<span>Gestão de projetos e captação de recursos.</span>
				</li>
				<li>
					<strong>O Encanto Era Eu</strong>
					<span>Curadoria e produção de projeto/exposição.</span>
				</li>
				<li>
					<strong>Domingão TN1</strong>
					<span>Intervenções artísticas.</span>
				</li>
				<li>
					<strong>Green Lab</strong>
					<span>Produção e gestão de projeto cultural.</span>
				</li>
				<li>
					<strong>Copão</strong>
					<span>Produção e gestão de projeto cultural.</span>
				</li>
				<li>
					<strong>Lançamento do livro Surrealírico — Feira do Livro 2022</strong>
					<span>Produção do lançamento editorial.</span>
				</li>
			</ul>
		</div>
	</section>

	<section class="pf-section">
		<div class="pf-container">
			<span class="pf-eyebrow">Formação</span>
			<h2>Trajetória</h2>
			<div class="pf-bio-grid">
				<div>
					<p class="pf-hero-lead">Bacharel em Gestão Pública pela UnB. Técnico em Produção Cultural em formação pelo Senac DF. Atua também como revisor de textos e tradutor.</p>
				</div>
				<div class="pf-book-card">
					<h4>Coletivos artísticos</h4>
					<p>Integra os coletivos <strong>TN1</strong> e <strong>Cer.Coletivo</strong>, elaborando e gerenciando projetos culturais.</p>
				</div>
			</div>
		</div>
	</section>

	<?php
	while ( have_posts() ) :
		the_post();
		if ( trim( get_the_content() ) !== '' ) :
			?>
			<section class="pf-section pf-section-alt">
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
			<span class="pf-eyebrow">Vamos produzir juntos</span>
			<h2>Contrate a produção de Pablo</h2>
			<p class="pf-hero-lead" style="margin:0 auto 1.6em;">Disponível para gestão de projetos, produção de eventos e curadoria cultural.</p>
			<a class="pf-btn pf-btn-solid" target="_blank" rel="noopener noreferrer" href="https://wa.me/<?php echo esc_attr( pf_whatsapp_number() ); ?>?text=<?php echo esc_attr( $wa_msg ); ?>">Falar no WhatsApp</a>
			<a class="pf-btn pf-btn-outline" href="<?php echo esc_url( home_url( '/#contato' ) ); ?>" style="margin-left:14px;">Ver todos os contatos</a>
		</div>
	</section>

</main>

<?php get_footer(); ?>
