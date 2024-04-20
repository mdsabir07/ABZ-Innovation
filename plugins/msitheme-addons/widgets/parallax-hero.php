<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
/**
 * Elementor widget for Parallax Hero.
 *
 * @since 1.0.0
 */
class ParallaxHero extends Widget_Base
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
		return 'parallax-hero';
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
		return esc_html__('Parallax Hero', 'msitheme');
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
		return 'eicon-posts-ticker';
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
				'label' => __('Slider content', 'msitheme'),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'msitheme' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .hero-wrapper',
			]
		);

		$this->add_control(
			'top_right_txt',
			[
				'label'	=> __( 'Top right text', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
				'label_block'	=> true,
			]
		);

		$this->add_control(
			'top_heading',
			[
				'label'	=> __( 'Top heading', 'msitheme' ),
				'type'	=> Controls_Manager::TEXT,
				'label_block'	=> true,
			]
		);

		$this->add_control(
			'bottom_heading',
			[
				'label'	=> __( 'Bottom heading', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
				'label_block'	=> true,
			]
		);

		$this->add_control(
			'aircraft',
			[
				'label' => esc_html__( 'Choose Aircraft Image', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'hand',
			[
				'label' => esc_html__( 'Choose Hand Image', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'cloud',
			[
				'label' => esc_html__( 'Choose Cloud Image', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'btn_label',
			[
				'label'	=> __( 'Button label', 'msitheme' ),
				'type'	=> Controls_Manager::TEXT,
				'label_block'	=> true,
			]
		);

		$repeater->add_control(
			'btn_link',
			[
				'label' => esc_html__( 'Button Link', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://domain-link.com', 'msitheme' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'btns',
			[
				'label' => esc_html__( 'Buttons', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'section_style',
			[
				'label' => __('Style', 'msitheme'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'top_heading_typography',
				'label' => __('Typography for top heading', 'msitheme'),
				'selector' => '{{WRAPPER}} .slider-txts h2',
				'default' => '36px',
			]
		);
		$this->add_control(
			'top_heading_color',
			[
				'label' => __('Top Heading Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .slider-txts h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'bottom_heading_typography',
				'label' => __('Typography for bottom heading', 'msitheme'),
				'selector' => '{{WRAPPER}} .slider-txts h1',
				'default' => '100px',
			]
		);
		$this->add_control(
			'bottom_heading_color',
			[
				'label' => __('Bottom Heading Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .slider-txts h1' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __('Typography for button', 'msitheme'),
				'selector' => '{{WRAPPER}} .slider-txts a.btn',
				'default' => '100px',
			]
		);
		$this->add_control(
			'button_color',
			[
				'label' => __('Button Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-btn' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' => __('Button background Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FA6400',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-btn' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' => __( 'Button hover Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#B1DEE3',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-btn.theme-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button_hover_bg',
			[
				'label' => __( 'Button hover background Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#050028',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-btn.theme-btn:hover' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button_hover_border',
			[
				'label' => __( 'Button hover border Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#050028',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-btn.theme-btn:hover' => 'border-color: {{VALUE}}',
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
			<!-- start of hero -->
			<div class="hero-wrapper">
				<div class="parallax-hero">
					<?php if ( ! wp_is_mobile() ) : if ( !empty($settings['top_right_txt']) ) : ?>
						<div class="hero-top-right fz-18 lh-27 fw-700 clrDarkBlue">
							<?php echo wp_kses_post( $settings['top_right_txt'] ); ?>
						</div>
					<?php endif; endif; ?>
					<div class="hero-bottom-content" id="heroText">
						<?php if(!empty($settings['bottom_heading'])) : ?>
							<div class="hero-text">
								<?php if(!empty($settings['top_heading'])) : ?>
									<h6><?php echo esc_html( $settings['top_heading'] ); ?></h6>
								<?php endif; ?>
								<h2><?php echo esc_html( $settings['bottom_heading'] ); ?></h2>
							</div>
							<?php if ( wp_is_mobile() ) : if ( !empty($settings['top_right_txt']) ) : ?>
								<div class="hero-top-right fz-18 lh-27 fw-700 clrDarkBlue">
									<?php echo wp_kses_post( $settings['top_right_txt'] ); ?>
								</div>
							<?php endif; endif; ?>
						<?php endif; if(!empty($settings['btns'])) : ?>
							<div class="flex align-center f-gap-25" id="heroBtns">
								<?php 
								foreach( $settings['btns'] as $btn ) :
									$target = $btn['btn_link']['is_external'] ? ' target="_blank"' : '';
									$nofollow = $btn['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
								?>
									<a class="hover-border-btn hero-btn theme-btn" href="<?php echo esc_url( $btn['btn_link']['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> id="btn">
										<?php echo esc_html( $btn['btn_label'] ); ?>
									</a>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
					<?php if(!empty($settings['aircraft'])) : ?>
						<img src="<?php echo esc_url(wp_get_attachment_image_url( $settings['aircraft']['id'], 'large' )); ?>" alt="Aircraft" id="aircraft">
					<?php endif; if(!empty($settings['hand'])) : ?>
						<img src="<?php echo esc_url(wp_get_attachment_image_url( $settings['hand']['id'], 'large' )); ?>" alt="Hand" id="hand">
					<?php endif; if(!empty($settings['cloud'])) : ?>
						<img src="<?php echo esc_url(wp_get_attachment_image_url( $settings['cloud']['id'], 'large' )); ?>" alt="cloud" id="cloud">
					<?php endif; ?>
				</div>
			</div>
			<!-- end of hero slider -->
			<script>
				// let text = document.getElementById("heroText");
				// let aircraft = document.getElementById("aircraft");
				// let hand = document.getElementById("hand");
				let btn = document.getElementById("heroBtns");
				let cloud = document.getElementById("cloud");
				let masthead = document.getElementById("masthead");

				window.addEventListener('scroll', function() {
					let value = window.scrollY;

					// text.style.marginTop = value * 50 + 'px';
					// text.style.right = value * -5.2 + 'px';
					// aircraft.style.top = value * 1 + 'px';
					// aircraft.style.left = value * -0.1 + '%';
					// hand.style.top = value * -1.5 + 'px';
					// hand.style.left = value * 2 + 'px';
					btn.style.marginTop = value * -1.5 + 'px';
					cloud.style.top = value * -1.12 + 'px';
					masthead.style.top = value * 0.7 + 'px';
				});
			</script>					
		<?php
	}

}
