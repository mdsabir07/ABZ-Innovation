<?php
namespace MsiThemeEssentialAddons;
use MsiThemeEssentialAddons\Widgets\SectionTitle;
use MsiThemeEssentialAddons\Widgets\Hero;
use MsiThemeEssentialAddons\Widgets\OfferCard;
use MsiThemeEssentialAddons\Widgets\CounterUp;
use MsiThemeEssentialAddons\Widgets\SocialShare;
use MsiThemeEssentialAddons\Widgets\SocialLinks;
use MsiThemeEssentialAddons\Widgets\Blogs;
use MsiThemeEssentialAddons\Widgets\TabSolutions;
use MsiThemeEssentialAddons\Widgets\JoinDistribute;
use MsiThemeEssentialAddons\Widgets\BorderHeading;
use MsiThemeEssentialAddons\Widgets\VideoGallery;
use MsiThemeEssentialAddons\Widgets\IconBox;
// use MsiThemeEssentialAddons\Widgets\ImageSlider;
// use MsiThemeEssentialAddons\Widgets\AboutUs;
// use MsiThemeEssentialAddons\Widgets\Products;
// use MsiThemeEssentialAddons\Widgets\TextBlock;
// use MsiThemeEssentialAddons\Widgets\TeamBlock;
// use MsiThemeEssentialAddons\Widgets\TeamMembers;
// use MsiThemeEssentialAddons\Widgets\ProductTab;
// use MsiThemeEssentialAddons\Widgets\EventFilter;
// use MsiThemeEssentialAddons\Widgets\Galleries;
// use MsiThemeEssentialAddons\Widgets\OwnFusion;
// use MsiThemeEssentialAddons\Widgets\CareerPageBlocks;
// use MsiThemeEssentialAddons\Widgets\DealerFilter;
// use MsiThemeEssentialAddons\Widgets\Documents;
// use MsiThemeEssentialAddons\Widgets\SimpleDocs;
// use MsiThemeEssentialAddons\Widgets\FaqsFilter;
// use MsiThemeEssentialAddons\Widgets\ProductHero;
// use MsiThemeEssentialAddons\Widgets\Productdata;
// use MsiThemeEssentialAddons\Widgets\ProductTabNav;
// use MsiThemeEssentialAddons\Widgets\ProductVideo;
// use MsiThemeEssentialAddons\Widgets\ProductPower;
// use MsiThemeEssentialAddons\Widgets\ProductSafety;
// use MsiThemeEssentialAddons\Widgets\ProductServices;
// use MsiThemeEssentialAddons\Widgets\ContentBlock;
// use MsiThemeEssentialAddons\Widgets\ContentList;
/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class MsiThemeEssentialAddonsPlugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_enqueue_script( 'magnific-popup', plugins_url( 'assets/js/jquery.magnific-popup.min.js', __FILE__ ), array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'msitheme-addons', plugins_url( 'assets/js/msitheme-addons.js', __FILE__ ), array('jquery'), '1.0.0', true );
	}

	/**
	 *  widgets styles
	 *
	 * Load widgets styles
	 *
	 */
	public function widget_styles() { 
		wp_enqueue_style( 'magnific-popup', plugins_url( '/assets/css/magnific-popup.css', __FILE__ ) );
		wp_enqueue_style( 'msitheme-addons-css', plugins_url( '/assets/css/msitheme-addons.css', __FILE__ ) );
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/section-title.php' );
		require_once( __DIR__ . '/widgets/hero.php' );
		require_once( __DIR__ . '/widgets/offer-card.php' );
		require_once( __DIR__ . '/widgets/counter-up.php' );
		require_once( __DIR__ . '/widgets/social-share.php' );
		require_once( __DIR__ . '/widgets/social-links.php' );
		require_once( __DIR__ . '/widgets/blog-posts.php' );
		require_once( __DIR__ . '/widgets/tab-solutions.php' );
		require_once( __DIR__ . '/widgets/join-distributor.php' );
		require_once( __DIR__ . '/widgets/border-heading.php' );
		require_once( __DIR__ . '/widgets/video-gallery.php' );
		require_once( __DIR__ . '/widgets/icon-box.php' );
		// require_once( __DIR__ . '/widgets/image-slider.php' );
		// require_once( __DIR__ . '/widgets/about-us.php' );
		// require_once( __DIR__ . '/widgets/products.php' );
		// require_once( __DIR__ . '/widgets/text-block.php' );
		// require_once( __DIR__ . '/widgets/team-block.php' );
		// require_once( __DIR__ . '/widgets/team-members.php' );
		// require_once( __DIR__ . '/widgets/product-tab.php' );
		// require_once( __DIR__ . '/widgets/event-filter.php' );
		// require_once( __DIR__ . '/widgets/galleries.php' );
		// require_once( __DIR__ . '/widgets/own-fusion.php' );
		// require_once( __DIR__ . '/widgets/career-page-block.php' );
		// require_once( __DIR__ . '/widgets/dealer-filter.php' );
		// require_once( __DIR__ . '/widgets/documents.php' );
		// require_once( __DIR__ . '/widgets/simple-docs.php' );
		// require_once( __DIR__ . '/widgets/faqs-filter.php' );
		// require_once( __DIR__ . '/widgets/product-hero.php' );
		// require_once( __DIR__ . '/widgets/product-data.php' );
		// require_once( __DIR__ . '/widgets/product-tab-nav.php' );
		// require_once( __DIR__ . '/widgets/product-video.php' );
		// require_once( __DIR__ . '/widgets/product-power.php' );
		// require_once( __DIR__ . '/widgets/product-safety.php' );
		// require_once( __DIR__ . '/widgets/product-tab-services.php' );
		// require_once( __DIR__ . '/widgets/content-block.php' );
		// require_once( __DIR__ . '/widgets/content-list.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new SectionTitle() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Hero() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new OfferCard() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new CounterUp() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new SocialShare() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new SocialLinks() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Blogs() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TabSolutions() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new JoinDistribute() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BorderHeading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new VideoGallery() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new IconBox() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ImageSlider() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new AboutUs() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Products() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TextBlock() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TeamBlock() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TeamMembers() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ProductTab() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new EventFilter() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Galleries() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new OwnFusion() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new CareerPageBlocks() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DealerFilter() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Documents() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new SimpleDocs() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new FaqsFilter() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ProductHero() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Productdata() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ProductTabNav() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ProductVideo() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ProductPower() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ProductSafety() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ProductServices() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ContentBlock() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ContentList() );
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widget Style
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

		// Register categories
		add_action( 'elementor/elements/categories_registered', [$this, 'register_msitheme_category'] );
	}
	
	public function register_msitheme_category($manager) {
		$manager->add_category('msitheme',[
			'title'	=> esc_html__( 'MsiTheme', 'msitheme' ),
			'icon'	=> esc_attr__( 'fas fa-image', 'msitheme' ),
		]);
	}
}

// Instantiate Plugin Class
MsiThemeEssentialAddonsPlugin::instance();
