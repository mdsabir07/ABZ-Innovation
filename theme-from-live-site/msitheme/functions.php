<?php
/**
 * MSITheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MSITheme
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function msitheme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on MSITheme, use a find and replace
		* to change 'msitheme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'msitheme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'msitheme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'msitheme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 56,
			'width'       => 150,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	 /**
	 * Enable suporrt for Post Formats
	 * see: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', [
		'gallery',
		'image',
		'quote',
		'video',
		'standard'
	] );
}
add_action( 'after_setup_theme', 'msitheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function msitheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'msitheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'msitheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function msitheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'msitheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'msitheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title uppercase fz-16 lh-21 clrOrange">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer top left', 'msitheme' ),
			'id'            => 'footer-top-1',
			'description'   => esc_html__( 'Add widgets here.', 'msitheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		)
	);
	// register_sidebar(
	// 	array(
	// 		'name'          => esc_html__( 'Footer top right', 'msitheme' ),
	// 		'id'            => 'footer-top-2',
	// 		'description'   => esc_html__( 'Add widgets here.', 'msitheme' ),
	// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 		'after_widget'  => '</section>',
	// 	)
	// );
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer middle 3', 'msitheme' ),
			'id'            => 'footer-mid-3',
			'description'   => esc_html__( 'Add widgets here.', 'msitheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title uppercase fz-16 lh-21 clrOrange">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer middle 4', 'msitheme' ),
			'id'            => 'footer-mid-4',
			'description'   => esc_html__( 'Add widgets here.', 'msitheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title uppercase fz-16 lh-21 clrOrange">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer bottom left', 'msitheme' ),
			'id'            => 'footer-bottom-1',
			'description'   => esc_html__( 'Add widgets here.', 'msitheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer bottom right', 'msitheme' ),
			'id'            => 'footer-bottom-2',
			'description'   => esc_html__( 'Add widgets here.', 'msitheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		)
	);
}
add_action( 'widgets_init', 'msitheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function msitheme_scripts() {
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), 'all' );
	wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css2?family=Archivo+Black&family=Archivo:ital,wdth,wght@0,62..125,100..900;1,62..125,100..900&display=swap' );
	wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default.css', array(), _S_VERSION, 'all' );
	wp_enqueue_style( 'msitheme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'msitheme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'msitheme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'msitheme-script', get_template_directory_uri() . '/assets/js/msitheme-script.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'msitheme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Metabox and options
 */
require get_template_directory() . '/inc/metabox-and-options.php';

/**
 * Custom post type
 */
require get_template_directory() . '/inc/custom-posts.php';

/**
 * Shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Excerpt length
 */
function word_count($string, $limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $limit));
}
