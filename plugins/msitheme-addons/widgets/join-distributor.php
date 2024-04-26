<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class JoinDistribute extends Widget_Base {

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
		return 'join-distribute';
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
		return __( 'Join Distribute', 'msitheme' );
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
		return 'eicon-user-circle-o';
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
				'label' => __( 'Join Distribute content', 'msitheme' ),
			]
		);
		
		// $this->add_group_control(
		// 	\Elementor\Group_Control_Background::get_type(),
		// 	[
		// 		'name' => 'background',
		// 		'label' => esc_html__( 'Background', 'msitheme' ),
		// 		'types' => [ 'classic', 'gradient', 'video' ],
		// 		'selector' => '{{WRAPPER}} .join-distribute-wrapper',
		// 	]
		// );

		$this->add_control(
			'top_heading',
			[
				'label' => __( 'Top heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => __( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
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
				'default' => '1',
				'options' => [
					'1' => esc_html__( 'Filled button', 'msitheme' ),
					'2' => esc_html__( 'Bordered button', 'msitheme' ),
					'3' => esc_html__( 'Icon button', 'msitheme' ),
				]
		
			]
		);

        $this->add_control(
			'icon_img',
			[
				'label' => esc_html__( 'Choose Image for bottom left', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

        $this->add_control(
			'bottom_heading',
			[
				'label' => __( 'Bottom icon heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
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
				'name' => 'heading_typography',
				'label' => __( 'Typography for heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .join-content-left1 h2',
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
					'{{WRAPPER}} .join-content-left1 h2' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography for description', 'msitheme' ),
				'selector' => '{{WRAPPER}} .join-left-content1 p',
			]
		);

        $this->add_control(
			'desc_color',
			[
				'label' => __( 'Description Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .join-left-content1 p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __('Typography for button', 'msitheme'),
				'selector' => '{{WRAPPER}} .join-left-content1 .theme-btn',
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
					'{{WRAPPER}} .join-left-content1 .theme-btn' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .join-left-content1 .theme-btn' => 'background: {{VALUE}}',
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
					'{{WRAPPER}} .join-left-content1 .theme-btn:hover' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .join-left-content1 .theme-btn:hover' => 'background: {{VALUE}}',
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
					'{{WRAPPER}} .join-left-content1 .theme-btn' => 'border-color: {{VALUE}}',
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
					'{{WRAPPER}} .join-left-content1 .theme-btn:hover' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
				'label' => __('Typography for button icon', 'msitheme'),
				'selector' => '{{WRAPPER}} .join-left-content1 .theme-btn i',
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
					'{{WRAPPER}} .join-left-content1 .theme-btn i' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .join-left-content1 .theme-btn:hover i' => 'border-color: {{VALUE}}',
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
					'{{WRAPPER}} .join-left-content1 .theme-btn i' => 'border-width: {{VALUE}}px',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'bottom_txt_typography',
				'label' => __( 'Typography for bottom text', 'msitheme' ),
				'selector' => '{{WRAPPER}} .join-left-content2 p',
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
					'{{WRAPPER}} .join-left-content2 p' => 'color: {{VALUE}}',
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
            <div class="join-distribute-wrapper relative">
				<div class="container-default">
					<div class="join-content grid align-center">
						<div class="join-content-left relative">
							<div class="join-content-left1 absolute top-0 left-0">
								<?php if ( !empty( $settings['top_heading'] ) ) : ?>
									<h2 class="fontVariation">
										<?php echo wp_kses_post( $settings['top_heading'] ); ?>
									</h2>
								<?php endif; ?>
								<div class="join-left-content1 flex justify-between align-center">
									<?php if ( !empty( $settings['desc'] ) ) : ?>
										<p>
											<?php echo wp_kses_post( $settings['desc'] ); ?>
										</p>
									<?php endif; if ( !empty( $settings['btn_label'] ) ) : 
										$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
										$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';

										if ( $settings['button_type'] === '3' ) :
											$btn_class = 'bordered-btn icon-btn';
										elseif ( $settings['button_type'] === '2' ) :
											$btn_class = 'bordered-btn';
										else : 
											$btn_class = 'filled-btn';
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
							<div class="join-content-left2 absolute bottom-0 left-0">
								<div class="join-left-content2 flex align-center">
									<?php if ( !empty( $settings['icon_img'] ) ) : ?>
										<img src="<?php echo esc_url(wp_get_attachment_image_url( $settings['icon_img']['id'], 'thumbnail' )); ?>" alt="">
									<?php endif; if ( !empty( $settings['bottom_heading'] ) ) : ?>
										<p><?php echo wp_kses_post( $settings['bottom_heading'] ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
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
