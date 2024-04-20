<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MSITheme
 */

 $msitheme = get_option('msitheme_options');

?>
	<footer id="colophon" class="site-footer">
		<div class="container-default">
			<div class="footer-top">
				<?php if ( is_active_sidebar( 'footer-top-1' ) ) : ?>
				<div class="footer-logo">
					<?php dynamic_sidebar( 'footer-top-1' ) ?>
				</div>
				<!-- <?php //endif; if ( is_active_sidebar( 'footer-top-2' ) ) : ?>
				<div class="newsletter">
					<?php //dynamic_sidebar( 'footer-top-2' ) ?>
				</div> -->
				<?php endif; ?>
			</div>
			<div class="footer-middle grid grid-4 g-gap-20">
				<div class="foo-mid-1">
					<?php if ( !empty( $msitheme['logo_text'] ) ) : ?> 
						<div class="site-dialougue fw-700 clrMidWhite">
							<?php echo wp_kses_post( $msitheme['logo_text'] ); ?>
						</div>
					<?php endif; ?>
					<div class="site-address">
					<?php if ( !empty( $msitheme['address_head'] ) ) : ?>
						<h6 class="clrMidWhite fz-18">
							<?php echo esc_html( $msitheme['address_head'] ); ?> 
						</h6>
					<?php endif; if ( !empty( $msitheme['address_txt'] ) ) : ?>
						<p class="clrMidWhite"><?php echo wp_kses_post( $msitheme['address_txt'] ); ?></p>
					<?php endif; ?>
					</div>
					<div class="footer-contact">
					<?php if ( !empty( $msitheme['phone_number'] ) ) : ?>
						<a href="tel:<?php echo esc_html( $msitheme['phone_link'] ); ?>" class="d-block clrMidWhite fz-18"><?php echo esc_html( $msitheme['phone_number'] ); ?></a>
					<?php endif; if ( !empty( $msitheme['email'] ) ) : ?>
						<a href="mailto:<?php echo esc_html( $msitheme['email_link'] ); ?>" class="d-block clrMidWhite fz-18"><?php echo esc_html( $msitheme['email'] ); ?></a>
					<?php endif; ?>
					</div>
					<div class="footer-socials flex align-center">
						<?php if ( !empty( $msitheme['facebook'] ) ) : ?>
							<a href="<?php echo esc_url( $msitheme['facebook'] ); ?>" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
						<?php endif; if ( !empty( $msitheme['linkedin'] ) ) : ?>
							<a href="<?php echo esc_url( $msitheme['linkedin'] ); ?>" class="linkedin"><i class="fa-brands fa-linkedin-in"></i></a>
						<?php endif; if ( !empty( $msitheme['instagram'] ) ) : ?>
							<a href="<?php echo esc_url( $msitheme['instagram'] ); ?>" class="instagram"><i class="fa-brands fa-instagram"></i></a>
						<?php endif; if ( !empty( $msitheme['twitter'] ) ) : ?>
							<a href="<?php echo esc_url( $msitheme['twitter'] ); ?>" class="twitter"><i class="fa-brands fa-x-twitter"></i></a>
						<?php endif; if ( !empty( $msitheme['tiktok'] ) ) : ?>
							<a href="<?php echo esc_url( $msitheme['tiktok'] ); ?>" class="tiktok"><i class="fa-brands fa-tiktok"></i></a>
						<?php endif; if ( !empty( $msitheme['youtube'] ) ) : ?>
							<a href="<?php echo esc_url( $msitheme['youtube'] ); ?>" class="youtube"><i class="fa-brands fa-youtube"></i></a>
						<?php endif; ?>
					</div>
				</div>

				<?php if ( ! wp_is_mobile() ) : if ( is_active_sidebar( 'footer-mid-2' ) ) : ?>
					<div class="foo-mid-2">
						<?php dynamic_sidebar( 'footer-mid-2' ) ?>
					</div>
				<?php endif; if ( is_active_sidebar( 'footer-mid-3' ) ) : ?>
					<div class="foo-mid-3">
						<?php dynamic_sidebar( 'footer-mid-3' ) ?>
					</div>
				<?php endif; if ( is_active_sidebar( 'footer-mid-4' ) ) : ?>
					<div class="foo-mid-4">
						<?php dynamic_sidebar( 'footer-mid-4' ) ?>
					</div>
				<?php endif; endif; ?>
			</div>
			<div class="footer-bottom flex justify-between align-center">
				<?php if ( is_active_sidebar( 'footer-bottom-1' ) ) : ?>
					<div class="copyright">
						<?php dynamic_sidebar( 'footer-bottom-1' ) ?>
					</div>
				<?php endif; if ( is_active_sidebar( 'footer-bottom-2' ) ) : ?>
					<div class="languages-footer footer-lang">
						<?php dynamic_sidebar( 'footer-bottom-2' ) ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
