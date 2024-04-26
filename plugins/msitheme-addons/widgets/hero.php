<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
/**
 * Elementor widget for Hero.
 *
 * @since 1.0.0
 */
class Hero extends Widget_Base
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
		return 'hero';
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
		return esc_html__('Hero', 'msitheme');
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
				'label' => __('Hero content', 'msitheme'),
			]
		);

		$this->add_control(
			'video',
			[
				'label' => esc_html__( 'Choose Video File', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'video' ],
			]
		);

		$this->add_control(
			'heading',
			[
				'label'	=> __( 'Heading', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
				'label_block'	=> true,
			]
		);

		$this->add_control(
			'left_desc',
			[
				'label'	=> __( 'Left description', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
				'label_block'	=> true,
			]
		);

		$this->add_control(
			'right_desc',
			[
				'label'	=> __( 'Right description', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
				'label_block'	=> true,
			]
		);

		$this->add_control(
			'btn_label',
			[
				'label'	=> __( 'Button label', 'msitheme' ),
				'type'	=> Controls_Manager::TEXT,
				'label_block'	=> true,
			]
		);

		$this->add_control(
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
			'button_type',
			[
				'label' => esc_html__( 'Button type', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'1' => esc_html__( 'Filled button', 'msitheme' ),
					'2' => esc_html__( 'Bordered button', 'msitheme' ),
					'3' => esc_html__( 'Icon button', 'msitheme' ),
				]
		
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
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'msitheme' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .hero-wrapper',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __('Typography for heading', 'msitheme'),
				'selector' => '{{WRAPPER}} .hero-title',
				'default' => '64px',
			]
		);
		$this->add_control(
			'heading_color',
			[
				'label' => __('Heading Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'left_desc_typography',
				'label' => __('Typography for left description', 'msitheme'),
				'selector' => '{{WRAPPER}} .hero-left-content p',
				'default' => '18px',
			]
		);
		$this->add_control(
			'left_desc_color',
			[
				'label' => __('Left description Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-left-content p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'right_desc_typography',
				'label' => __('Typography for right description', 'msitheme'),
				'selector' => '{{WRAPPER}} .hero-right-content p',
				'default' => '18px',
			]
		);
		$this->add_control(
			'right_desc_color',
			[
				'label' => __('Right description Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-right-content p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __('Typography for button', 'msitheme'),
				'selector' => '{{WRAPPER}} .hero-right-content .theme-btn',
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
					'{{WRAPPER}} .hero-right-content .theme-btn' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' => __('Button background Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#F25119',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-right-content .theme-btn' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' => __( 'Button hover Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-right-content .theme-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button_hover_bg',
			[
				'label' => __( 'Button hover background Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#DA4711',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-right-content .theme-btn:hover' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button_border',
			[
				'label' => __( 'Button border Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-right-content .theme-btn' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button_hover_border',
			[
				'label' => __( 'Button hover border Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#F25119',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-right-content .theme-btn:hover' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
				'label' => __('Typography for button icon', 'msitheme'),
				'selector' => '{{WRAPPER}} .hero-right-content .theme-btn i',
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __('Button Icon Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-right-content .theme-btn i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_hover_border_color',
			[
				'label' => __('Button Icon hover border Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-right-content .theme-btn:hover i' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_border_width',
			[
				'label' => __('Button Icon border width', 'msitheme'),
				'type'	=> Controls_Manager::TEXT,
				'default' => '2',
				'label_block'	=> true,
				'selectors' => [
					'{{WRAPPER}} .hero-right-content .theme-btn i' => 'border-width: {{VALUE}}px',
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
			<div class="hero-wrapper relative">
				<div class="hero-video-wrap relative">
					<div class="hero-video-shape shape-top-left absolute"></div>
					<div class="hero-video-shape shape-bottom-right absolute"></div>
					<video src="<?php echo esc_url( $settings['video']['url'] ); ?>" class="hero-video" autoplay muted loop></video>
				</div>
				<div class="hero-content">
					<div class="container-default">
						<div class="hero-content-inner flex align-center justify-between">
							<div class="hero-left-content">
								<?php if ( !empty( $settings['heading'] ) ) : ?>
									<h1 class="hero-title"><?php echo wp_kses_post( $settings['heading'] ); ?></h1>
								<?php endif; if ( !empty( $settings['left_desc'] ) ) : ?>
									<p><?php echo wp_kses_post( $settings['left_desc'] ); ?></p>
								<?php endif; ?>
							</div>
							<div class="hero-right-content">
								<?php if ( !empty( $settings['right_desc'] ) ) : ?>
									<p><?php echo wp_kses_post( $settings['right_desc'] ); ?></p>
								<?php endif; if ( !empty( $settings['btn_label'] ) ) : 

									$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
									$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';

									if ( $settings['button_type'] === '1' ) :
										$btn_class = 'filled-btn';
									elseif ( $settings['button_type'] === '2' ) :
										$btn_class = 'bordered-btn';
									else : 
										$btn_class = 'bordered-btn icon-btn';
									endif;

								?>
									<a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" class="theme-btn <?php echo esc_attr( $btn_class ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?>>
										<span class="btn-label">
											<?php echo esc_html( $settings['btn_label'] ); ?>
										</span> 
										<?php if ( $settings['button_type'] === '3' ) : ?>
											<i class="fa-solid fa-arrow-right"></i>
										<?php endif; ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end of hero slider -->					
		<?php
	}

}
