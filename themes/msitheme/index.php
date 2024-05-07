<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MSITheme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container-default">
			<!-- <div class="section-title">
				<h6 class="theme-border section-top-heading relative clrWhite upercase">
					<?php //esc_html_e( 'reach the sky', 'msitheme' ); ?>
				</h6>
				<h2 class="clrWhite upercase">
					<?php //esc_html_e( 'News', 'msitheme' ); ?>
				</h2>
			</div> -->
			<?php if ( ! wp_is_mobile() ) : echo do_shortcode( '[featured_post]' ); endif; ?>
			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;
				?>
				<div class="blog-page news-items grid grid-3 g-gap-25">
				<?php 

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;
					?>

				</div>
				<?php 

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</div>
	</main><!-- #main -->

<?php
get_footer();
