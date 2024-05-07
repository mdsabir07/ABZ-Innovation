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
				]
			]
		);

        $this->add_control(
			'youtube',
			[
				'label' => __( 'Inser YouTube video link', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'label_block'	=> true,
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
				'label_block'	=> true,
				'condition'	=> [
					'video_type'	=> '2',
				],
			]
		);
        $this->add_control(
			'media_library',
			[
				'label' => __( 'Inser media library video link', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'label_block'	=> true,
				'condition'	=> [
					'video_type'	=> '3',
				],
			]
		);
		$this->add_control(
			'poster',
			[
				'label' => esc_html__( 'Choose Poster Image', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
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
		$this->add_control(
			'video_section_typography',
			[
				'label' => __( 'Video section height', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'default' => '500px',
				'selectors' => [
					'{{WRAPPER}} .video-wrapper, .selfhosted-video, .video-block-img' => 'height: {{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'msitheme' ),
				'selector' => '{{WRAPPER}} .video-wrapper, .selfhosted-video, .video-block-img',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border radius', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'selectors' => [
					'{{WRAPPER}} .video-wrapper, .selfhosted-video, .video-block-img' => 'border-radius: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'play_main_typography',
			[
				'label' => __( 'Typography for Play button', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'default' => '70',
				'selectors' => [
					'{{WRAPPER}} .video-modal i, .popup-youtube i, .popup-vimeo i' => 'font-size: {{VALUE}}px',
				],
			]
		);
        $this->add_control(
			'play_main_color',
			[
				'label' => __( 'Play button Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#EC5118',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .video-modal i, .popup-youtube i, .popup-vimeo i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'play_video_typography',
			[
				'label' => __( 'Typography for Play video button', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'default' => '50',
				'selectors' => [
					'{{WRAPPER}} .play-pause-btn i' => 'font-size: {{VALUE}}px',
				],
			]
		);
        $this->add_control(
			'play_video_color',
			[
				'label' => __( 'Play video button Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#EC5118',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .play-pause-btn i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'close_typography',
			[
				'label' => __( 'Typography for close button', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'default' => '40',
				'selectors' => [
					'{{WRAPPER}} .video-modal-dismiss i' => 'font-size: {{VALUE}}px',
				],
			]
		);
        $this->add_control(
			'close_color',
			[
				'label' => __( 'Close button Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#EC5118',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .video-modal-dismiss i' => 'color: {{VALUE}}',
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
			<div class="video-wrapper">
				<div class="single-video-block flex justify-center align-center">
					<?php if( $settings['video_type'] === '1' ) : ?>
						<div class="video-item-youtube absolute">
							<a class="popup-youtube" href="<?php echo esc_url( $settings['youtube'] ); ?>">
								<i class="fa-solid fa-circle-play"></i>
							</a>
						</div>
						<?php if( !empty($settings['image']) ) : ?>
							<img class="video-block-img" src="<?php echo esc_url(wp_get_attachment_image_url( $settings['image']['id'], 'large' )); ?>" width="100%">
						<?php endif; ?>
					<?php endif; if( !empty($settings['vimeo']) ) : ?>
						<div class="video-item-vimeo absolute">
							<a class="popup-vimeo" href="<?php echo esc_url( $settings['vimeo'] ); ?>">
								<i class="fa-solid fa-circle-play"></i>
							</a>
						</div>
						<?php if( !empty($settings['image']) ) : ?>
							<img class="video-block-img" src="<?php echo esc_url(wp_get_attachment_image_url( $settings['image']['id'], 'large' )); ?>" width="100%">
						<?php endif; ?>
					<?php endif; if( !empty($settings['media_library']) ) : ?>
						<div class="selfhosted-video">
							<a class="video-modal absolute" href="#media-video-open">
								<i class="fa-solid fa-circle-play"></i>
							</a>
							<div class="video-item relative" id="media-video-open">
								<video id="media-video" preload="auto" poster="<?php echo esc_url(wp_get_attachment_image_url( $settings['poster']['id'], 'large' )); ?>">
									<source src="<?php echo esc_url( $settings['media_library'] ); ?>" type="video/mp4">
								</video>
								<div class="play-pause-btn absolute flex justify-between align-center">
									<i onclick="playVid()" class="fa-solid fa-circle-play pointer"></i>
									<i onclick="pauseVid()" class="fa-solid fa-circle-pause pointer"></i>
								</div>
								<a class="video-modal-dismiss absolute" href="#"><i class="fa-solid fa-circle-xmark"></i></a>
							</div>
							<script> 
								let vid = document.getElementById("media-video"); 
								function playVid() { 
									vid.play(); 
								} 
								function pauseVid() { 
									vid.pause(); 
								} 
							</script> 
							<?php if( !empty($settings['image']) ) : ?>
								<img class="video-block-img" src="<?php echo esc_url(wp_get_attachment_image_url( $settings['image']['id'], 'large' )); ?>" width="100%">
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
            </div>
    	<?php 
    } 
}
