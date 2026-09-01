<?php
/**
 * Footer do tema Pablo Figueroa.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pf_arte_id = pf_get_page_id_by_template( 'page-portfolio-arte.php' );
$pf_prod_id = pf_get_page_id_by_template( 'page-portfolio-produtor.php' );
$pf_icons   = get_template_directory_uri() . '/assets/img/icones/';
?>
	<footer class="pf-footer">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/sankofa2.png' ); ?>" alt="" class="pf-sankofa pf-sankofa-2" aria-hidden="true">

		<div class="pf-container pf-footer-grid">
			<div>
				<div class="pf-footer-brand">Pablo <span>Figueroa</span></div>
				<p class="pf-footer-tagline">Produtor cultural e multiartista em Brasília. Gestão, produção e curadoria a serviço da cultura independente.</p>

				<div class="pf-footer-social">
					<a href="https://instagram.com/<?php echo esc_attr( pf_instagram_geral_handle() ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><img src="<?php echo esc_url( $pf_icons . 'instagram.png' ); ?>" alt="" loading="lazy"></a>
					<a href="https://wa.me/<?php echo esc_attr( pf_whatsapp_number() ); ?>" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><img src="<?php echo esc_url( $pf_icons . 'whatsapp.png' ); ?>" alt="" loading="lazy"></a>
					<a href="mailto:<?php echo esc_attr( pf_email() ); ?>" aria-label="E-mail"><img src="<?php echo esc_url( $pf_icons . 'mensagem.png' ); ?>" alt="" loading="lazy"></a>
				</div>
			</div>

			<div class="pf-footer-col">
				<h4>Navegação</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/#bio' ) ); ?>">Sobre</a></li>
					<li><a href="<?php echo esc_url( get_permalink( $pf_arte_id ) ); ?>">Portfólio Arte</a></li>
					<li><a href="<?php echo esc_url( get_permalink( $pf_prod_id ) ); ?>">Portfólio Produtor</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#contato' ) ); ?>">Contato</a></li>
				</ul>
			</div>
		</div>

		<div class="pf-container pf-footer-bottom">
			&copy; <?php echo esc_html( date( 'Y' ) ); ?> Pablo Figueroa. Todos os direitos reservados.
		</div>
	</footer>

<?php wp_footer(); ?>
</body>
</html>
