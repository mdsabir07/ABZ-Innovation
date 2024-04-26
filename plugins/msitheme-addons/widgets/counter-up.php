<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class CounterUp extends Widget_Base {

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
		return 'counter';
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
		return __( 'Counter Up', 'msitheme' );
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
		return 'eicon-counter';
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
				'label' => __( 'About us content', 'msitheme' ),
			]
		);
		
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'msitheme' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .counter-fun-wrap',
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'fun_icon',
			[
				'label' => esc_html__( 'Select icon', 'textmsithemedomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'fa-globe' => esc_html__( 'Globe', 'msitheme' ),
					'fa-user-group'  => esc_html__( 'Users', 'msitheme' ),
					'fa-calendar-check' => esc_html__( 'Calendar', 'msitheme' ),
					'fa-trophy' => esc_html__( 'Trophy', 'msitheme' ),
				]
			]
		);

		$repeater->add_control(
			'fun_number',
			[
				'label' => esc_html__( 'Counter', 'msitheme' ),
				'type'	=> Controls_Manager::TEXT,
				'label_block'	=> true,
			]
		);

		$repeater->add_control(
			'fun_symbol',
			[
				'label' => esc_html__( 'Counter symbol', 'msitheme' ),
				'type'	=> Controls_Manager::TEXT,
				'label_block'	=> true,
			]
		);
		$repeater->add_control(
			'fun_txt',
			[
				'label'	=> __( 'Counter text', 'msitheme' ),
				'type'	=> Controls_Manager::TEXT,
				'label_block'	=> true,
			]
		);

		// $repeater->add_control(
		// 	'data_color',
		// 	[
		// 		'label' => __( 'Data Color', 'msitheme' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'default' => '#F25119',
		// 		'scheme' => [
		// 			'type' => \Elementor\Core\Schemes\Color::get_type(),
		// 			'value' => \Elementor\Core\Schemes\Color::COLOR_1,
		// 		]
		// 	]
		// );

		$this->add_control(
			'funs',
			[
				'label' => esc_html__( 'Counter box', 'msitheme' ),
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

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'counter_typography',
				'label' => __( 'Typography for counter number', 'msitheme' ),
				'selector' => '{{WRAPPER}} .count',
			]
		);
		$this->add_control(
			'counter_color',
			[
				'label' => __( 'Counter number Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#F25119',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .count' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'symbol_typography',
				'label' => __( 'Typography for counter symbol', 'msitheme' ),
				'selector' => '{{WRAPPER}} .counter-symbol',
			]
		);
		$this->add_control(
			'symbol_color',
			[
				'label' => __( 'Counter symbol Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#F25119',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .counter-symbol' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'txt_typography',
				'label' => __( 'Typography for text', 'msitheme' ),
				'selector' => '{{WRAPPER}} .fun-text',
			]
		);

        $this->add_control(
			'text_color',
			[
				'label' => __( 'Counter text Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFF',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fun-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon size', 'msitheme' ),
				'type'	=> Controls_Manager::TEXT,
				'label_block'	=> true,
				'default' => '20',
				'selectors' => [
					'{{WRAPPER}} .fun-icon i' => 'font-size: {{VALUE}}px',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#F25119',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fun-icon i' => 'color: {{VALUE}}',
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
            <!-- start counter fun -->
			<div class="counter-fun-wrap">
                <div class="container-default">
					<?php if ( !empty($settings['funs']) ) : ?>
						<div class="counter-inner flex align-center justify-between">
							<?php foreach( $settings['funs'] as $fun ) : ?>
								<div class="counter-single-inner relative">
								<!-- data-color="<?php // echo esc_attr( $fun['data_color'] ); ?>" -->
									<div class="single-fun flex align-center justify-between" data-degree="<?php echo esc_attr( $fun['fun_number'] ); ?>">
										<?php if ( !empty( $fun['fun_icon'] ) ) : ?>
											<div class="fun-icon">
												<i class="fa-solid <?php echo esc_attr( $fun['fun_icon'] ) ?>"></i>
											</div>
										<?php endif; ?>
										<div class="fun-content">
											<?php if (!empty($fun['fun_number']) ) : ?>
												<span class="count">
													<?php echo esc_html( $fun['fun_number'] ); ?>
												</span>
											<?php endif; if (!empty($fun['fun_symbol']) ) :  ?>
												<span class="counter-symbol">
													<?php echo esc_html( $fun['fun_symbol'] ); ?>
												</span>
											<?php endif; if (!empty($fun['fun_txt']) ) :  ?>
												<div class="fun-text">
													<?php echo esc_html( $fun['fun_txt'] ); ?>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
                </div>
			</div>
            <!-- end counter up -->

		<?php 
	}

}
