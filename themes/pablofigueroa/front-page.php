<?php
/**
 * Template Name: Home
 * Página inicial — bio, contato e acesso ao portfólio.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$img = get_template_directory_uri() . '/assets/img/';
$icons = $img . 'icones/';
$arte_id = pf_get_page_id_by_template( 'page-portfolio-arte.php' );
$prod_id = pf_get_page_id_by_template( 'page-portfolio-produtor.php' );
$wa_msg  = rawurlencode( 'Olá, Pablo! Vi seu portfólio e gostaria de falar sobre um projeto.' );
?>

<main id="main">

	<!-- HERO -->
	<section class="pf-hero">
		<img src="<?php echo esc_url( $img . 'sankofabird.png' ); ?>" alt="" class="pf-sankofa pf-sankofa-1" aria-hidden="true">

		<div class="pf-container pf-hero-grid">
			<div class="pf-hero-content">
				<span class="pf-eyebrow">Brasília · DF</span>
				<h1 class="pf-hero-title">Pablo <span>Figueroa</span></h1>
				<p class="pf-hero-subtitle">Produtor e Artista Independente</p>
				<p class="pf-hero-lead">Gestão, produção e curadoria cultural a serviço de projetos artísticos independentes — do palco à página.</p>

				<div class="pf-hero-actions">
					<a href="#portfolio" class="pf-btn pf-btn-solid">Ver Portfólio</a>
					<a href="#contato" class="pf-btn pf-btn-outline">Falar com Pablo</a>
				</div>
			</div>

			<div class="pf-hero-photos">
				<div class="pf-photo pf-float" data-depth="16">
					<img src="<?php echo esc_url( $img . 'KLBR-brunogustavo-18.jpg' ); ?>" alt="Pablo Figueroa — retrato" loading="eager">
				</div>
			</div>
		</div>
	</section>

	<!-- BIO -->
	<section id="bio" class="pf-section pf-section-alt">
		<div class="pf-container pf-bio-grid">
			<div>
				<span class="pf-eyebrow">Apresentação</span>
				<h2>Quem é Pablo</h2>
				<div class="pf-photo pf-bio-photo pf-float" data-depth="12">
					<img src="<?php echo esc_url( $img . 'KLBR-brunogustavo-21.jpg' ); ?>" alt="Pablo Figueroa em produção" loading="lazy">
				</div>
			</div>

			<div class="pf-bio-text">
				<p>Nascido no Vale do Aço (Minas Gerais) e radicado em Brasília, Pablo Figueroa é professor, produtor cultural e multiartista. Atualmente cursa técnico em Produção Cultural no Senac e também atua como revisor de textos e tradutor.</p>
				<p>Desde 2022 atua como produtor cultural e artista independente em projetos solo ou em parceria com seus coletivos artísticos — <strong>TN1</strong> e <strong>Cer.Coletivo</strong>.</p>

				<blockquote class="pf-quote">&ldquo;A cultura não é um ornamento — é a substância do que somos.&rdquo;</blockquote>

				<p>Suas artes e demais trabalhos podem ser encontrados no Instagram <a href="https://instagram.com/<?php echo esc_attr( pf_instagram_arte_handle() ); ?>" target="_blank" rel="noopener noreferrer">@<?php echo esc_html( pf_instagram_arte_handle() ); ?></a> e em suas duas obras publicadas.</p>

				<div class="pf-books">
					<div class="pf-book-card">
						<img src="<?php echo esc_url( $img . 'surrealirico.png' ); ?>" alt="Capa do livro Surrealírico" class="pf-book-cover" loading="lazy">
						<h4>Surrealírico</h4>
						<p>Obra publicada — lançamento na Feira do Livro 2022.</p>
					</div>
					<div class="pf-book-card">
						<img src="<?php echo esc_url( $img . 'diaspora-negra.jpeg' ); ?>" alt="Capa do livro Diáspora Negra" class="pf-book-cover" style="object-position: top;" loading="lazy">
						<h4>Diáspora Negra</h4>
						<p>Projeto e programa — gestão de projetos e captação de recursos.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- INSTAGRAM -->
	<section class="pf-section">
		<div class="pf-container" style="text-align:center;">
			<span class="pf-eyebrow">Acompanhe e adquira</span>
			<h2>Veja mais no Instagram</h2>
			<p class="pf-hero-lead" style="margin:0 auto 2em;">Novas artes, bastidores e lançamentos são publicados primeiro por lá.</p>

			<a class="pf-instagram-frame" href="https://www.instagram.com/<?php echo esc_attr( pf_instagram_arte_handle() ); ?>" target="_blank" rel="noopener noreferrer">
				<img src="<?php echo esc_url( $img . 'instagram-demo.png' ); ?>" alt="Instagram @<?php echo esc_attr( pf_instagram_arte_handle() ); ?>" loading="lazy">
				<span class="pf-instagram-handle">@<?php echo esc_html( pf_instagram_arte_handle() ); ?></span>
			</a>
		</div>
	</section>

	<!-- EXPERTISE -->
	<section class="pf-section pf-expertise-section">
		<img src="<?php echo esc_url( $img . 'african-pattern.jpg' ); ?>" alt="" class="pf-expertise-bg" aria-hidden="true">
		<div class="pf-container pf-expertise-content">
			<span class="pf-eyebrow">Áreas de expertise</span>
			<h2>O que Pablo faz</h2>
			<div class="pf-chip-list">
				<span class="pf-chip">Produção de Eventos</span>
				<span class="pf-chip">Produção Artística</span>
				<span class="pf-chip">Curadoria e Programação</span>
				<span class="pf-chip">Captação de Recursos</span>
				<span class="pf-chip">Gestão de Projetos</span>
				<span class="pf-chip">Comunicação Cultural</span>
				<span class="pf-chip">Economia Criativa</span>
			</div>
		</div>
	</section>

	<!-- PORTFÓLIO -->
	<section id="portfolio" class="pf-section pf-section-alt">
		<div class="pf-container">
			<span class="pf-eyebrow">Trabalhos</span>
			<h2>Portfólio</h2>
			<div class="pf-portfolio-grid">
				<div class="pf-portfolio-card">
					<span class="pf-portfolio-tag">Artista</span>
					<h3>Portfólio Arte</h3>
					<p>Obras literárias, produções autorais e trabalhos artísticos — Surrealírico, Diáspora Negra e criações do dia a dia.</p>
					<a href="<?php echo esc_url( get_permalink( $arte_id ) ); ?>" class="pf-btn pf-btn-solid">Explorar arte</a>
				</div>
				<div class="pf-portfolio-card">
					<span class="pf-portfolio-tag">Produtor</span>
					<h3>Portfólio Produtor</h3>
					<p>Experiência em gestão e produção de eventos, festivais e projetos culturais independentes.</p>
					<a href="<?php echo esc_url( get_permalink( $prod_id ) ); ?>" class="pf-btn pf-btn-solid">Ver produções</a>
				</div>
			</div>
		</div>
	</section>

	<!-- CONTATO -->
	<section id="contato" class="pf-section pf-contact">
		<div class="pf-container">
			<span class="pf-eyebrow">Vamos conversar</span>
			<h2>Contato</h2>
			<p class="pf-hero-lead">Disponível para projetos culturais, produções, curadoria e parcerias artísticas. Entre em contato pelo canal de sua preferência.</p>

			<div class="pf-contact-grid">
				<ul class="pf-contact-list">
					<li class="pf-contact-item">
						<span class="pf-contact-icon"><img src="<?php echo esc_url( $icons . 'mensagem.png' ); ?>" alt="" loading="lazy"></span>
						<a href="mailto:<?php echo esc_attr( pf_email() ); ?>">
							<span class="pf-contact-label">E-mail</span>
							<span class="pf-contact-value"><?php echo esc_html( pf_email() ); ?></span>
						</a>
					</li>
					<li class="pf-contact-item">
						<span class="pf-contact-icon"><img src="<?php echo esc_url( $icons . 'instagram.png' ); ?>" alt="" loading="lazy"></span>
						<a href="https://instagram.com/<?php echo esc_attr( pf_instagram_geral_handle() ); ?>" target="_blank" rel="noopener noreferrer">
							<span class="pf-contact-label">Instagram</span>
							<span class="pf-contact-value">@<?php echo esc_html( pf_instagram_geral_handle() ); ?></span>
						</a>
					</li>
				</ul>

				<div class="pf-contact-card">
					<h3>Fale agora pelo WhatsApp</h3>
					<p class="pf-hero-lead" style="margin-bottom:0;">Resposta rápida para orçamentos, parcerias e propostas de produção ou curadoria.</p>
					<a class="pf-whatsapp-cta" href="https://wa.me/<?php echo esc_attr( pf_whatsapp_number() ); ?>?text=<?php echo esc_attr( $wa_msg ); ?>" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo esc_url( $icons . 'whatsapp.png' ); ?>" alt="" loading="lazy">
						Enviar mensagem
					</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
