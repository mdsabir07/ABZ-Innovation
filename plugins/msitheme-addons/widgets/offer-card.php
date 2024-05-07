<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class OfferCard extends Widget_Base {

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
		return 'offer-card';
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
		return __( 'Offer Card', 'msitheme' );
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
		return 'eicon-menu-card';
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
				'label' => __( 'Offer Card content', 'msitheme' ),
			]
		);
		
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'msitheme' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .card-wrapper',
			]
		);

		$this->add_control(
			'top_heading',
			[
				'label' => __( 'Top heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

		$this->add_control(
			'bottom_heading',
			[
				'label' => __( 'Bottom heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $this->add_control(
			'heading_position',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'Bottom heading position', 'msitheme' ),
				'default' => '1',
				'options' => [
					'1' => esc_html__( 'Top', 'msitheme' ),
					'2' => esc_html__( 'Bottom', 'msitheme' ),
				],
			]
		);

        $this->add_control(
			'bottom_sub_heading',
			[
				'label' => __( 'Bottom sub heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

		
        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'hover_content',
			[
				'label' => __( 'Hover text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);


		$this->add_control(
			'hover_txts',
			[
				'label' => esc_html__( 'Hover content', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
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

		$this->add_control(
			'card_height',
			[
				'label' => __( 'Card height (number only)', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'default' => '352',
				'selectors' => [
					'{{WRAPPER}} .card-wrapper' => 'height: {{VALUE}}px',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'top_heading_typography',
				'label' => __( 'Typography for top heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .card-top-heading',
			]
		);

        $this->add_control(
			'top_heading_color',
			[
				'label' => __( 'Top heading Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .card-top-heading' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'bottom_heading_typography',
				'label' => __( 'Typography for bottom heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .card-bottom-heading',
			]
		);

        $this->add_control(
			'bottom_heading_color',
			[
				'label' => __( 'Bottom heading Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .card-bottom-heading' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'bottom_txt_typography',
				'label' => __( 'Typography for bottom text', 'msitheme' ),
				'selector' => '{{WRAPPER}} .card-bottom-text',
			]
		);

        $this->add_control(
			'bottom_txt_color',
			[
				'label' => __( 'Bottom text Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .card-bottom-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hover_txt_typography',
				'label' => __( 'Typography for hover text', 'msitheme' ),
				'selector' => '{{WRAPPER}} .card-hover-content li',
			]
		);

        $this->add_control(
			'hover_txt_color',
			[
				'label' => __( 'hover text Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .card-hover-content li' => 'color: {{VALUE}}',
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
            <div class="card-wrapper">
				<div class="card-inner">
					<div class="card-content relative">
						<?php if ( !empty( $settings['top_heading'] ) ) : ?>
							<div class="card-top-heading absolute">
								<?php echo esc_html( $settings['top_heading'] ); ?>
							</div>
						<?php endif; if ( !empty( $settings['hover_txts'] ) ) : ?>
							<div class="card-hover-content absolute">
								<ul>
									<?php foreach ( $settings['hover_txts'] as $hover ) : ?>
										<li><?php echo esc_html( $hover['hover_content'] ); ?></li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
						<div class="card-bottom-content flex align-center justify-between absolute">
							<div class="card-bottom-content-left">
								<?php if ( !empty( $settings['bottom_heading'] ) ) : if ( $settings['heading_position'] === '1' ) : ?>
									<div class="card-bottom-heading">
										<?php echo esc_html( $settings['bottom_heading'] ); ?>
									</div>
								<?php endif; endif; if ( !empty( $settings['bottom_sub_heading'] ) ) : ?>
									<div class="card-bottom-text">
										<?php echo esc_html( $settings['bottom_sub_heading'] ); ?>
									</div>
								<?php endif; if ( !empty( $settings['bottom_heading'] ) ) : if ( $settings['heading_position'] === '2' ) : ?>
									<div class="card-bottom-heading">
										<?php echo esc_html( $settings['bottom_heading'] ); ?>
									</div>
								<?php endif; endif; ?>
							</div>
							<div class="card-bottom-content-right">
								<!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M0 8H16" stroke="#F25119"/>
									<path d="M8 16L8 3.57628e-07" stroke="#F25119"/>
								</svg> -->
								<i class="fa-solid fa-plus"></i>
								<i class="fa-solid fa-minus d-none"></i>
							</div>
						</div>
					</div>
				</div>
            </div>
            		
		<?php
	}

}
