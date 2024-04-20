<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
/**
 * Elementor widget for Video.
 *
 * @since 1.0.0
 */
class ProductVideo extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'product-video';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__('Product Video', 'msitheme');
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-product-description';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['msitheme'];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends()
	{
		return ['msitheme'];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls()
	{

		$this->start_controls_section(
			'section_content_left',
			[
				'label' => __('Content left', 'msitheme'),
			]
		);
        $this->add_control(
			'prod_title_top',
			[
				'label' => __( 'Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $this->add_control(
			'prod_title',
			[
				'label' => __( 'Title bottom', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
		$this->add_control(
			'prod_desc',
			[
				'label' => esc_html__( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'msitheme' ),
			]
		);
        $this->end_controls_section();


        // right content
		$this->start_controls_section(
			'section_content_right',
			[
				'label' => __('Content right', 'msitheme'),
			]
		);

        $this->add_control(
			'play_label',
			[
				'label' => __( 'Play label', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'video_type',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'Select video type', 'msitheme' ),
				'default' => '1',
				'options' => [
					'1' => esc_html__( 'YouTube', 'msitheme' ),
					'2' => esc_html__( 'Vimeo', 'msitheme' ),
					'3' => esc_html__( 'From media library', 'msitheme' ),
				],
			]
		);

        $this->add_control(
			'youtube',
			[
				'label' => __( 'Inser YouTube video link', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'condition'	=> [
					'video_type'	=> '1',
				],
			]
		);
        $this->add_control(
			'vimeo',
			[
				'label' => __( 'Inser vimeo video link', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'condition'	=> [
					'video_type'	=> '2',
				],
			]
		);
        $this->add_control(
			'media_library',
			[
				'label' => esc_html__( 'Choose Video File', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'video' ],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition'	=> [
					'video_type'	=> '3',
				],
			]
		); 
		$this->end_controls_section();

        // style
        $this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'msitheme' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'msitheme' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-video-wrap',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'top_heading_typography',
				'label' => __( 'Typography for top heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .product-video-left h6',
			]
		);
        $this->add_control(
			'top_heading_color',
			[
				'label' => __( 'Top Heading Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#B1DEE3',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .product-video-left h6' => 'color: {{VALUE}}',
				],
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __( 'Typography for heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .product-video-left h4',
			]
		);
        $this->add_control(
			'heading_color',
			[
				'label' => __( 'Heading Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .product-video-left h4' => 'color: {{VALUE}}',
				],
			]
		);

        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography for left description', 'msitheme' ),
				'selector' => '{{WRAPPER}} .product-left-desc',
			]
		);

        $this->add_control(
			'desc_color',
			[
				'label' => __( 'Left description Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#B1DEE3',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .product-left-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'play_typography',
				'label' => __( 'Typography for play button', 'msitheme' ),
				'selector' => '{{WRAPPER}} .product-video-item a',
			]
		);

        $this->add_control(
			'play_color',
			[
				'label' => __( 'play Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFF',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .product-video-item a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
        ?>

            <!-- start of video gallery -->
			<div class="product-video-wrap">
				<div class="container-default">
                    <div class="product-video-grid grid align-center">
                        <div class="product-video-left">
                            <?php if ( !empty( $settings['prod_title_top'] ) ) : ?>
                                <h6 class="theme-border relative">
                                    <?php echo esc_html( $settings['prod_title_top'] ); ?>
                                </h6>
                            <?php endif; if ( !empty( $settings['prod_title'] ) ) : ?>
                                <h4>
                                    <?php echo wp_kses_post( $settings['prod_title'] ); ?>
                                </h4>
                            <?php endif; if ( !empty( $settings['prod_desc'] ) ) : ?>
                                <div class="product-left-desc">
                                    <?php echo $settings['prod_desc']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="product-video-right flex justify-center align-center">
                            <img class="product-video-right-img" src="<?php echo esc_url(wp_get_attachment_image_url( $settings['image']['id'], 'large' )); ?>">
                            <?php if( $settings['video_type'] === '1' ) : ?>
                                <div class="product-video-item absolute">
                                    <a class="product-popup-youtube" href="<?php echo esc_url( $settings['youtube'] ); ?>">
                                        <?php echo esc_html( $settings['play_label'] ); ?>
                                    </a>
                                </div>
                            <?php endif; if( $settings['video_type'] === '2' ) : ?>
                                <div class="product-video-item absolute">
                                    <a class="product-popup-vimeo" href="<?php echo esc_url( $settings['vimeo'] ); ?>">
                                        <?php echo esc_html( $settings['play_label'] ); ?>
                                    </a>
                                </div>
                            <?php endif; if( $settings['video_type'] === '3' ) : ?>
                                <div class="product-video-item absolute">
                                    <a class="product-popup-media-v" href="<?php echo esc_url( $settings['media_library']['url'] ); ?>">
                                        <!-- <video src="<?php //echo esc_url( $settings['media_library']['url'] ); ?>" class="elementor-video"></video> -->
                                        <?php echo esc_html( $settings['play_label'] ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
				</div>
            </div>
    	<?php
    } 
}
