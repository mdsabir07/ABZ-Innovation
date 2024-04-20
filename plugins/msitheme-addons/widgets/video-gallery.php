<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
/**
 * Elementor widget for Video gallery.
 *
 * @since 1.0.0
 */
class VideoGallery extends Widget_Base
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
		return 'video-gallery';
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
		return esc_html__('Video Gallery', 'msitheme');
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
		return 'eicon-slider-video';
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
			'section_content',
			[
				'label' => __('Gallery content', 'msitheme'),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'msitheme' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .gallery-wrapper',
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'top_heading',
			[
				'label' => __( 'Top heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'section_title',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater->add_control(
			'play_label',
			[
				'label' => __( 'Play label', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater->add_control(
			'btn_type',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'Select Button type', 'msitheme' ),
				'default' => '1',
				'options' => [
					'1' => esc_html__( 'Video', 'msitheme' ),
					'2' => esc_html__( 'Custom link', 'msitheme' ),
				],
			]
		);
		$repeater->add_control(
			'btn_label',
			[
				'label'	=> __( 'Button label', 'msitheme' ),
				'type'	=> Controls_Manager::TEXT,
				'label_block'	=> true,
				'condition'	=> [
					'btn_type'	=> '2',
				],
			]
		);

		$repeater->add_control(
			'btn_link',
			[
				'label' => esc_html__( 'Button Link', 'msitheme' ),
				'type'	=> Controls_Manager::TEXT,
				'label_block'	=> true,
			]
		);

        $repeater->add_control(
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
				'condition'	=> [
					'btn_type'	=> '1',
				],
			]
		);

        $repeater->add_control(
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
        $repeater->add_control(
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
        $repeater->add_control(
			'media_library',
			[
				'label' => __( 'Inser media library video link', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'condition'	=> [
					'video_type'	=> '3',
				],
			]
		);
        
		$this->add_control(
			'galleries',
			[
				'label' => esc_html__( 'Galleries', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
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
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'top_heading_typography',
				'label' => __( 'Typography for top heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .section-top-heading',
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
					'{{WRAPPER}} .section-top-heading' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'top_heading_border_color',
			[
				'label' => __( 'Top Heading Border Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#AF1A15',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-top-heading::before, .section-top-heading::after' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __( 'Typography for heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .section-heading',
			]
		);

        $this->add_control(
			'heading_color',
			[
				'label' => __( 'Heading Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFF',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-heading' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'label' => __( 'Typography for link', 'msitheme' ),
				'selector' => '{{WRAPPER}} .video-item a',
			]
		);

        $this->add_control(
			'link_color',
			[
				'label' => __( 'Link Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFF',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .video-item a' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'link_hover_color',
			[
				'label' => __( 'Link Hover Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFF',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .video-item a:hover' => 'color: {{VALUE}}',
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
        if ( !empty($settings['galleries']) ) : ?>

            <!-- start of video gallery -->
			<div class="video-galleries overflow-x-hidden">
				<div class="video-gallery gallery-wrapper">
					<?php 
					$i = 0; 
					foreach( $settings['galleries'] as $video ) : 
						$i++; 
						// $target = $video['btn_link']['is_external'] ? ' target="_blank"' : '';
						// $nofollow = $video['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
					?>
						<div class="single-v-gallery relative v-gallery-<?php echo esc_attr( $i ); ?>">
							<?php if( !empty($video['top_heading']) ) : ?>
								<div class="v-gallery-top-heading absolute">
									<h6 class="section-top-heading theme-border relative">
										<?php echo esc_html( $video['top_heading'] ); ?>
									</h6>
								</div>
							<?php endif; if( !empty($video['section_title']) ) : ?>
								<h4 class="section-heading absolute"><?php echo wp_kses_post( $video['section_title'] ); ?></h4>
							<?php endif;
							if( $video['btn_type'] === '1' ) :
								if( $video['video_type'] === '1' ) : ?>
									<div class="video-item absolute">
										<a class="popup-youtube" href="<?php echo esc_url( $video['youtube'] ); ?>">
											<?php echo esc_html( $video['play_label'] ); ?>
										</a>
									</div>
								<?php endif; if( !empty($video['vimeo']) ) : ?>
									<div class="video-item absolute">
										<a class="popup-vimeo" href="<?php echo esc_url( $video['vimeo'] ); ?>">
											<?php echo esc_html( $video['play_label'] ); ?>
										</a>
									</div>
								<?php endif; if( !empty($video['media_library']) ) : ?>
									<div class="video-item absolute">
										<a class="popup-media-v" href="<?php echo esc_url( $video['media_library'] ); ?>">
											<?php echo esc_html( $video['play_label'] ); ?>
										</a>
									</div>
								<?php endif; 
							endif; 
							if( $video['btn_type'] === '2' ) : ?>
								<div class="video-item absolute">
									<a class="readmore-btn theme-btn" href="<?php echo esc_url( $video['btn_link'] ); ?>">
										<?php echo esc_html( $video['btn_label'] ); ?>
									</a>
								</div>
							<?php endif; if( !empty($video['image']) ) : ?>
								<img class="v-gallery-img" src="<?php echo esc_url(wp_get_attachment_image_url( $video['image']['id'], 'large' )); ?>">
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
            </div>
    	<?php endif; 
    } 
}
