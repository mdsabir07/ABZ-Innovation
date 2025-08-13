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
 if (array_key_exists('social_style', $msitheme)) {
	$social_style = $msitheme['social_style'];
} else {
	$social_style = '';
}

?>
	<footer id="colophon" class="site-footer">
		<div class="container-default">
			<div class="footer-top">
				<?php if ( is_active_sidebar( 'footer-top-1' ) ) : ?>
					<div class="footer-logo">
						<?php dynamic_sidebar( 'footer-top-1' ) ?>
					</div>
					<?php endif; 
					if ( wp_is_mobile() ) :
					if ( is_active_sidebar( 'footer-mid-4' ) ) : 
					?>
						<div class="foo-mid-4">
							<?php dynamic_sidebar( 'footer-mid-4' ) ?>
						</div>
					<?php endif; endif; ?>
			</div>
			<div class="footer-middle grid grid-4 g-gap-20">
				<div class="foo-mid-1 relative">
					<?php if ( !empty( $msitheme['logo_heading'] ) ) : ?> 
						<h6 class="widget-title fw-700 clrOrange uppercase">
							<?php echo esc_html( $msitheme['logo_heading'] ); ?>
						</h6>
					<?php endif; ?>
					<div class="site-address">
						<?php if ( !empty( $msitheme['address_head'] ) ) : ?>
							<strong class="fz-16">
								<?php echo esc_html( $msitheme['address_head'] ); ?> 
							</strong>
						<?php endif; if ( !empty( $msitheme['address_txt'] ) ) : ?>
							<p class="fz-16 clrBlack lh-24"><?php echo wp_kses_post( $msitheme['address_txt'] ); ?></p>
						<?php endif; ?>
					</div>
					<?php if ( $social_style === 'style2' ) : ?>
						<div class="footer-social-media absolute left-0">
							<?php if ( !empty( $msitheme['social_head'] ) ) : ?>
								<strong class="fz-16 fw-700 lh-24">
									<?php echo esc_html( $msitheme['social_head'] ); ?> 
								</strong>
							<?php endif; ?>
							<div class="footer-socials flex align-center">
								<?php if ( !empty( $msitheme['facebook'] ) ) : ?>
									<a href="<?php echo esc_url( $msitheme['facebook'] ); ?>" class="facebook">
										<i class="fa-brands fa-facebook-f"></i>
									</a>
								<?php endif; if ( !empty( $msitheme['linkedin'] ) ) : ?>
									<a href="<?php echo esc_url( $msitheme['linkedin'] ); ?>" class="linkedin">
										<i class="fa-brands fa-linkedin-in"></i>
									</a>
								<?php endif; if ( !empty( $msitheme['instagram'] ) ) : ?>
									<a href="<?php echo esc_url( $msitheme['instagram'] ); ?>" class="instagram">
										<i class="fa-brands fa-instagram"></i>
									</a>
								<?php endif; if ( !empty( $msitheme['twitter'] ) ) : ?>
									<a href="<?php echo esc_url( $msitheme['twitter'] ); ?>" class="twitter">
										<i class="fa-brands fa-x-twitter"></i>
									</a>
								<?php endif; if ( !empty( $msitheme['tiktok'] ) ) : ?>
									<a href="<?php echo esc_url( $msitheme['tiktok'] ); ?>" class="tiktok">
										<i class="fa-brands fa-tiktok"></i>
									</a>
								<?php endif; if ( !empty( $msitheme['youtube'] ) ) : ?>
									<a href="<?php echo esc_url( $msitheme['youtube'] ); ?>" class="youtube">
										<i class="fa-brands fa-youtube"></i>
									</a>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if ( $social_style === 'style1' ) : ?>
						<div class="footer-social-media absolute left-0">
							<?php if ( !empty( $msitheme['social_head'] ) ) : ?>
								<strong class="fz-16 fw-700 lh-24">
									<?php echo esc_html( $msitheme['social_head'] ); ?> 
								</strong>
							<?php endif; ?>
							<div class="social-links">
								<?php if ( !empty( $msitheme['facebook_link'] ) ) : ?>
									<a href="<?php echo esc_url($msitheme['facebook_link']); ?>" class="social-icon">
										<?php echo esc_html( $msitheme['facebook_label'] ); ?>
									</a>
								<?php endif; if ( !empty( $msitheme['linkedin_link'] ) ) : ?>
									<a href="<?php echo esc_url($msitheme['linkedin_link']); ?>" class="social-icon">
										<?php echo esc_html( $msitheme['linkedin_label'] ); ?>
									</a>
								<?php endif; if ( !empty( $msitheme['instagram_link'] ) ) : ?>
									<a href="<?php echo esc_url($msitheme['instagram_link']); ?>" class="social-icon">
										<?php echo esc_html( $msitheme['instagram_label'] ); ?>
									</a>
								<?php endif; if ( !empty( $msitheme['twitter_link'] ) ) : ?>
									<a href="<?php echo esc_url($msitheme['twitter_link']); ?>" class="social-icon">
										<?php echo esc_html( $msitheme['twitter_label'] ); ?>
									</a>
								<?php endif; if ( !empty( $msitheme['tiktok_link'] ) ) : ?>
									<a href="<?php echo esc_url($msitheme['tiktok_link']); ?>" class="social-icon">
										<?php echo esc_html( $msitheme['tiktok_label'] ); ?>
									</a>
								<?php endif; if ( !empty( $msitheme['youtube_link'] ) ) : ?>
									<a href="<?php echo esc_url($msitheme['youtube_link']); ?>" class="social-icon">
										<?php echo esc_html( $msitheme['youtube_label'] ); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<?php if( ! wp_is_mobile() ) : if ( !empty($msitheme['foo_emails']) ) : ?>
					<div class="foo-mid-2">
						<?php if ( !empty( $msitheme['email_widget_heading'] ) ) : ?> 
							<h6 class="widget-title fw-700 clrOrange uppercase">
								<?php echo esc_html( $msitheme['email_widget_heading'] ); ?>
							</h6>
						<?php endif; foreach ($msitheme['foo_emails'] as $email) : ?>
							<div class="footer-contact">
								<strong class="fz-16 lh-24 clrBlack">
									<?php echo esc_html( $email['email_heading'] ); ?>
								</strong>
								<a href="mailto:<?php echo esc_html( $email['email_link'] ); ?>" class="d-block fz-16 lh-24 clrBlack">
									<?php echo esc_html( $email['email'] ); ?>
								</a>
							</div>
						<?php endforeach; ?>
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
				<?php if ( wp_is_mobile() ) : if ( is_active_sidebar( 'footer-bottom-2' ) ) : ?>
					<div class="languages-footer footer-lang">
						<?php dynamic_sidebar( 'footer-bottom-2' ) ?>
					</div>
				<?php endif; endif; if ( is_active_sidebar( 'footer-bottom-1' ) ) : ?>
					<div class="copyright">
						<?php dynamic_sidebar( 'footer-bottom-1' ) ?>
					</div>
				<?php endif; if ( ! wp_is_mobile() ) :  if ( is_active_sidebar( 'footer-bottom-2' ) ) : ?>
					<div class="languages-footer footer-lang">
						<?php dynamic_sidebar( 'footer-bottom-2' ) ?>
					</div>
				<?php endif; endif; ?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
