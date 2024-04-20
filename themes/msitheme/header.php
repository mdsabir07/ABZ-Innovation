<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MSITheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); 
$msitheme = get_option('msitheme_options');
if (get_post_meta( get_the_ID(), 'msitheme_page_meta', true )) {
	$page_meta = get_post_meta( get_the_ID(), 'msitheme_page_meta', true );
} else {
	$page_meta = array();
}

if (array_key_exists('header-logo', $page_meta)) {
	$logo = $page_meta['header-logo'];
} else {
	$logo = '';
}


?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'msitheme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container-default">
			<div class="header-wrap grid grid-2-7-3 align-center g-gap-30">
				<div class="site-branding">
					<?php
					if ( !empty($logo) ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home">
							<img width="151" height="56" src="<?php echo ( $logo['url'] ); ?>" class="custom-logo" alt="<?php bloginfo( 'name' ); ?>" decoding="async">
						</a>
					<?php $custom_logo = get_theme_mod( 'custom_logo' );
					else : 
						the_custom_logo();
					endif;
					?>
				</div><!-- .site-branding -->
				<div class="responsive-menu cursor-pointer">
					<div class="menu-bars">
						<?php esc_html_e( 'Menu', 'msitheme' ); ?> <i class="fa-solid fa-bars"></i>
					</div>
				</div>
				<nav id="site-navigation" class="main-navigation">
					<div class="responsive-menu-close cursor-pointer">
						<?php esc_html_e( 'Close', 'msitheme' ); ?> <i class="fa-solid fa-xmark"></i>
					</div>
					<?php if ( wp_is_mobile() ) : ?>
						<div class="header-btn">
							<?php if ( !empty( $msitheme['header_button'] ) ) : ?>
								<a href="<?php echo esc_url( $msitheme['header_button_link'] ); ?>" class="button theme-btn bordered-btn uppercase flex align-center justify-center fz-12 fw-700 clrDarkBlue">
									<?php echo esc_html( $msitheme['header_button'] ); ?>
								</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
				<div class="header-right-content flex align-center f-gap-10">
					<?php if ( !empty( $msitheme['language'] ) ) : ?>
						<div class="languages clrDarkBlue fz-12 fw-700">
							<?php echo esc_html( $msitheme['language'] ); ?>
						</div>
					<?php endif; ?>
					<?php if ( ! wp_is_mobile() ) : ?>
						<div class="header-btn">
							<?php if ( !empty( $msitheme['header_button'] ) ) : ?>
								<a href="<?php echo esc_url( $msitheme['header_button_link'] ); ?>" class="button theme-btn bordered-btn uppercase flex align-center justify-center fz-12 fw-700 clrDarkBlue">
									<?php echo esc_html( $msitheme['header_button'] ); ?>
								</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
