<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MSITheme
 */
if (get_post_meta( $post->ID, 'msitheme_post_meta', true ) ) {
	$msitheme_meta = get_post_meta( $post->ID, 'msitheme_post_meta', true );
} else {
	$msitheme_meta = array();
}

if(array_key_exists('post_extra_img', $msitheme_meta)) {
	$post_extra_img = $msitheme_meta['post_extra_img'];
} else {
	$post_extra_img = '';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 
	if ( !is_singular() ) :
		if ( !empty($msitheme_meta['post_extra_img']) ) : ?>
			<a class="post-thumbnail" href="<?php esc_url( the_permalink() ); ?>">
				<img class="custom-blog-imgs" src="<?php echo esc_url($post_extra_img['url']); ?>" alt="<?php echo esc_attr( the_title() ); ?>">
			</a>
		<?php 
		else : 
			msitheme_post_thumbnail();
		endif;
	endif;
	?>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title fz-48 lh-48 uppercase clrDarkBlue">', '</h1>' );
			msitheme_post_thumbnail();
		else :
			the_title( '<h2 class="entry-title fz-18 lh-27 uppercase"><a class="" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				// msitheme_posted_on();
				// msitheme_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		if ( is_single() ) :
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'msitheme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		else : 
			echo word_count(get_the_excerpt(), '20');
		endif;

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'msitheme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //msitheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
