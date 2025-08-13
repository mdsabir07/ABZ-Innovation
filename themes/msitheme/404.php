<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MSITheme
 */

get_header();

$msitheme = get_option('msitheme_options');


if (array_key_exists('404_main_img', $msitheme)) {
	$img_404 = $msitheme['404_main_img'];
} else {
	$img_404 = '';
}

if (array_key_exists('left_border_img', $msitheme)) {
	$left_border_img = $msitheme['left_border_img'];
} else {
	$left_border_img = '';
}

if (array_key_exists('right_border_img', $msitheme)) {
	$right_border_img = $msitheme['right_border_img'];
} else {
	$right_border_img = '';
}
if (array_key_exists('head_404', $msitheme)) {
	$head_404 = $msitheme['head_404'];
} else {
	$head_404 = '';
}
if (array_key_exists('paragraph_404', $msitheme)) {
	$paragraph_404 = $msitheme['paragraph_404'];
} else {
	$paragraph_404 = '';
}
if (array_key_exists('btns_404', $msitheme)) {
	$btns_404 = $msitheme['btns_404'];
} else {
	$btns_404 = '';
}

?>

	<main id="primary" class="site-main">
		<div class="container-default">
			<section class="error-404 not-found relative">
				<?php if ( !empty($left_border_img) ) : ?>
					<div class="section-border-left absolute top-0">
						<img src="<?php echo ( $left_border_img['url'] ); ?>" alt="">
					</div>
				<?php endif; ?>
				<?php if ( !empty($img_404) ) : ?>
					<div class="img-404 flex justify-center align-center">
						<img src="<?php echo ( $img_404['url'] ); ?>" alt="404">
					</div>
				<?php endif; ?>

				<div class="page-content text-center">
					<?php if ( !empty( $head_404 ) ) : /* ?>
						<h1 class="page-title fz-64 lh-76 clrBlack uppercase"><?php echo wp_kses_post( $head_404 ); ?></h1>
					<?php else : ?>
						<h1 class="page-title fz-64 lh-76 clrBlack uppercase">
							<span><?php esc_html_e( 'oh... the page', 'msitheme' ); ?></span><br>
							<span><?php esc_html_e( 'is fly away...', 'msitheme' ); ?></span>
						</h1>
					<?php  */ endif; if ( !empty( $paragraph_404 ) ) : /*?>
						<p class="fw-700 clrBlack paragraph-404"><?php echo wp_kses_post( $paragraph_404 ); ?></p>
					<?php else : ?>
						<p class="fw-700 clrBlack paragraph-404"><?php esc_html_e( 'But you can find an other destination', 'msitheme' ); ?></p>
					<?php */ endif; if ( !empty( $btns_404 ) ) : ?>
						<div class="readmore-btns flex align-center justify-center f-gap-25">
							<?php foreach ( $btns_404 as $btn ) : ?>
								<a href="<?php echo esc_url($btn['link_404']); ?>" class="readmore-btn fz-12 fw-700 clrBlack uppercase">
									<?php echo esc_html( $btn['btn_404'] ); ?>
								</a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

				</div><!-- .page-content -->
				<?php if ( !empty($right_border_img) ) : ?>
					<div class="section-border-right absolute top-0">
						<img src="<?php echo ( $right_border_img['url'] ); ?>" alt="">
					</div>
				<?php endif; ?>
			</section><!-- .error-404 -->
		</div>
	</main><!-- #main -->

<?php
get_footer();
