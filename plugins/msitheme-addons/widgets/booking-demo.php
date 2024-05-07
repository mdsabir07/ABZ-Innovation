<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class BookingDemo extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'booking-demo';
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
	public function get_title() {
		return __( 'Booking Demo', 'msitheme' );
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
	public function get_icon() {
		return 'eicon-form-horizontal';
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
	public function get_categories() {
		return [ 'msitheme' ];
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
	public function get_script_depends() {
		return [ 'msitheme' ];
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
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Booking Demo content', 'msitheme' ),
			]
		);

		$this->add_control(
			'top_heading',
			[
				'label' => __( 'Top heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => __( 'Heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

		$this->add_control(
			'booking_content',
			[
				'label' => __( 'Form shortcodes', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'show_label' => true,
			]
		);

		$this->add_control(
			'drone',
			[
				'label' => esc_html__( 'Choose Drone Image for right side', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$this->end_controls_section();

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
				'selector' => '{{WRAPPER}} .booking-content-top h4',
			]
		);

        $this->add_control(
			'top_heading_color',
			[
				'label' => __( 'Top Heading Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .booking-content-top h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __( 'Typography for heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .booking-content-top h2',
			]
		);
		$this->add_control(
			'heading_variation',
			[
				'label' => __( 'Heading Variation', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				// 'show_label' => true,
				'default' => '125',
				'selectors' => [
					'{{WRAPPER}} .booking-content-top h2' => 'font-variation-settings: "wdth" {{VALUE}}',
				],
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
					'{{WRAPPER}} .booking-content-top h2' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'form_indicator_typography',
				'label' => __( 'Typography for form indicator', 'msitheme' ),
				'selector' => '{{WRAPPER}} .booking-form .indicator',
			]
		);

        $this->add_control(
			'form_indicator_color',
			[
				'label' => __( 'Form indicator Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .booking-form .indicator' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'field_placeholder_color',
			[
				'label' => __('Field Placeholder Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#A0A0A0',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .booking-form input::-webkit-input-placeholder, .booking-form input::-moz-placeholder, .booking-form input:-ms-input-placeholder, .booking-form textarea::-webkit-input-placeholder, .booking-form textarea::-moz-placeholder, .booking-form textarea:-ms-input-placeholder, .booking-form select::-webkit-input-placeholder, .booking-form select::-moz-placeholder, .booking-form select:-ms-input-placeholder' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'form_field_typography',
				'label' => __( 'Typography for form field', 'msitheme' ),
				'selector' => '{{WRAPPER}} .booking-form input, .booking-form textarea, .booking-form select',
			]
		);

		$this->add_control(
			'field_color',
			[
				'label' => __('Field Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .booking-form input, .booking-form textarea, .booking-form select' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'field_bg',
			[
				'label' => __('Field Background Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255, 255, 255, 0.24)',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .booking-form input, .booking-form textarea, .booking-form select' => 'background: {{VALUE}};backdrop-filter: blur(4px)',
				],
			]
		);
				
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Form field Border', 'msitheme' ),
				'selector' => '{{WRAPPER}} .booking-form input, .booking-form textarea, .booking-form select',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Form Field Border radius', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'selectors' => [
					'{{WRAPPER}} .booking-form input, .booking-form textarea, .booking-form select' => 'border-radius: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'input_height',
			[
				'label' => __( 'Field height', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'default' => '48px',
				'selectors' => [
					'{{WRAPPER}} .booking-form input, .booking-form select' => 'height: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'field_width',
			[
				'label' => esc_html__( 'Field Width', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .booking-form input, .booking-form textarea, .booking-form select' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'textarea_height',
			[
				'label' => __( 'Textarea height', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'default' => '148px',
				'selectors' => [
					'{{WRAPPER}} .booking-form textarea' => 'height: {{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'acceptence_typography',
				'label' => __('Typography for acceptance', 'msitheme'),
				'selector' => '{{WRAPPER}} .acceptance-field label',
			]
		);
		$this->add_control(
			'acceptence_color',
			[
				'label' => __('Acceptance Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .acceptance-field label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __('Typography for button', 'msitheme'),
				'selector' => '{{WRAPPER}} .booking-form .theme-btn',
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
					'{{WRAPPER}} .booking-form .theme-btn' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .booking-form .theme-btn' => 'background: {{VALUE}}',
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
					'{{WRAPPER}} .booking-form .theme-btn:hover' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .booking-form .theme-btn:hover' => 'background: {{VALUE}}',
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
					'{{WRAPPER}} .booking-form .theme-btn' => 'border-color: {{VALUE}}',
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
					'{{WRAPPER}} .booking-form .theme-btn:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'margin',
			[
				'label' => esc_html__( 'Form Margin', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .booking-form-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'width',
			[
				'label' => esc_html__( 'Content area Width', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .booking-content-top' => 'width: {{SIZE}}{{UNIT}};',
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
            <div class="join-distribute-wrapper BookingDemo relative">
				<div class="container-default">
					<div class="booking-content-top">
						<?php if ( !empty( $settings['top_heading'] ) ) : ?>
							<h4>
								<?php echo wp_kses_post( $settings['top_heading'] ); ?>
							</h4>
						<?php endif; ?>
						<?php if ( !empty( $settings['heading'] ) ) : ?>
							<h2 class="fontVariation">
								<?php echo wp_kses_post( $settings['heading'] ); ?>
							</h2>
						<?php endif; if ( !empty( $settings['booking_content'] ) ) : ?>
							<div class="booking-form-wrap">
								<?php echo wp_kses_post( $settings['booking_content'] ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php if ( !empty( $settings['drone'] ) ) : ?>
					<div class="drone-img absolute right-0 top-0 bottom-0">
						<img src="<?php echo esc_url(wp_get_attachment_image_url( $settings['drone']['id'], 'full' )); ?>" alt="">
					</div>
				<?php endif; ?>
            </div>
            		
		<?php
	}

}
