<?php
/**
 * Template Name: Portfólio Arte
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$img = get_template_directory_uri() . '/assets/img/';
$wa_diaspora = rawurlencode( 'Olá, Pablo! Tenho interesse em saber mais sobre o projeto Diáspora Negra.' );
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
			<h2>Portfólio</h2>

			<div class="pf-tabs" data-pf-tabs>
				<div class="pf-tabs-nav" role="tablist" aria-label="Categorias do portfólio">
					<button type="button" class="pf-tab-btn is-active" role="tab" aria-selected="true" data-tab-target="livros">Livros</button>
					<button type="button" class="pf-tab-btn" role="tab" aria-selected="false" data-tab-target="textos">Textos</button>
					<button type="button" class="pf-tab-btn" role="tab" aria-selected="false" data-tab-target="ilustracoes">Ilustrações</button>
					<button type="button" class="pf-tab-btn" role="tab" aria-selected="false" data-tab-target="zines">Zines</button>
				</div>

				<div class="pf-tab-panel is-active" id="tab-livros" role="tabpanel">
					<div class="pf-book-grid">
						<div class="pf-book-card">
							<span class="pf-portfolio-tag">Livro</span>
							<h3>Diáspora Negra</h3>
							<img src="<?php echo esc_url( $img . 'diaspora-negra.jpeg' ); ?>" alt="Capa do livro Diáspora Negra" class="pf-book-cover" style="object-position: top;">

							<div class="pf-book-price-group">
								<span>R$ 20 - Livro Digital</span>
								<span>R$ 35 - Livro físico</span>
							</div>

							<p>Projeto e programa de gestão de projetos e captação de recursos, com curadoria voltada à ancestralidade e cultura negra.</p>

							<div style="text-align:center; margin-top: 14px">
								<a class="pf-btn pf-btn-solid" target="_blank" rel="noopener noreferrer" href="https://wa.me/<?php echo esc_attr( pf_whatsapp_number() ); ?>?text=<?php echo esc_attr( $wa_diaspora ); ?>">Comprar pelo WhatsApp</a>
							</div>
						</div>
						<div class="pf-book-card">
							<span class="pf-portfolio-tag">Livro</span>
							<h3>Surrealírico</h3>
							<img src="<?php echo esc_url( $img . 'surrealirico.png' ); ?>" alt="Capa do livro Surrealírico" class="pf-book-cover">

							<div class="pf-book-price-group">
								<span>R$ 25</span>
							</div>

							<p>Existem facetas que se desenvolvem e muitas vezes não são exploradas a fundo: personas em simbiose com a face mais externa, aquela que dá a cara a tapa. Em “Surrealírico” adentro o romântico sonhador, o visceral, o louco, deixando que venham à tona sem medo da exposição.</p>
							<p>Composto de cinco poesias e um pequeno conto, este livro é meu manto de timidez sendo removido, revelando por baixo a psicodelia diária canalizada na arte. O lúcido e o lúdico descritos e ilustrados com os mesmos traços de sinceridade.</p>

							<div class="pf-book-details">
								<h4>Detalhes do livro</h4>
								<ul>
									<li>Tam: 12×21</li>
									<li>Páginas: 16</li>
									<li>Ilustrado pelo autor</li>
									<li>Colorido</li>
									<li>Costura Manual</li>
								</ul>
							</div>

							<div style="text-align:center;">
								<a class="pf-btn pf-btn-solid" target="_blank" rel="noopener noreferrer" href="https://avaeditora.com.br/p/livro-surrealirico-pablo-figueroa/">Comprar</a>
							</div>
						</div>
					</div>
					
				</div>

				<div class="pf-tab-panel" id="tab-textos" role="tabpanel" hidden>
					<p class="pf-tab-empty">Em breve, novos textos serão publicados por aqui.</p>
				</div>

				<div class="pf-tab-panel" id="tab-ilustracoes" role="tabpanel" hidden>
					<p class="pf-tab-empty">Em breve, novas ilustrações serão publicadas por aqui.</p>
				</div>

				<div class="pf-tab-panel" id="tab-zines" role="tabpanel" hidden>
					<p class="pf-tab-empty">Em breve, novos zines serão publicados por aqui.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="pf-section pf-section-alt">
		<div class="pf-container">
			<span class="pf-eyebrow">Curadoria e coletivos</span>
			<h2>Projetos artísticos</h2>
			<ul class="pf-timeline">
				<li>
					<strong>O Encanto Era Eu</strong>
					<span>Projeto — curadoria e produção.</span>
				</li>
				<li>
					<strong>Domingão TN1</strong>
					<span>Intervenções artísticas em parceria com o coletivo TN1.</span>
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
