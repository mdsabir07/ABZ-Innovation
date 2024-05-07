<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
/**
 * Elementor widget for List.
 *
 * @since 1.0.0
 */
class IconBox extends Widget_Base
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
		return 'icon-box';
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
		return esc_html__('Icon Box', 'msitheme');
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
		return 'eicon-icon-box';
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
				'label' => __('Icon Content', 'msitheme'),
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'show_icon',
			[
				'label' => __( 'Show icon', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes'	=> __( 'Yes', 'msitheme' ), 
					'no'	=> __( 'No', 'msitheme' ), 
				],
			]
		);
		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Choose Image', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition'	=> [
					'show_icon'	=> 'yes',
				],
			]
		);
		$repeater->add_control(
			'heading',
			[
				'label' => __( 'Heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
				'label_block'	=> true,
			]
		);
		$repeater->add_control(
			'desc',
			[
				'label' => __( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
				'label_block'	=> true,
			]
		);
        $this->add_control(
			'icons',
			[
				'label' => esc_html__( 'Icon box', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->add_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'msitheme' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'msitheme' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'msitheme' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justify', 'msitheme' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .msitheme-icon-box' => 'text-align: {{VALUE}};',
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
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __( 'Typography for heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .icon-heading',
			]
		);
        $this->add_control(
			'heading_color',
			[
				'label' => __( 'Heading Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#070028',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-heading' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'heading_variation',
			[
				'label' => __( 'Heading Variation', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '125',
				'selectors' => [
					'{{WRAPPER}} .icon-heading' => 'font-variation-settings: "wdth" {{VALUE}}',
				],
			]
		);

		
		$this->add_control(
			'heading_margin',
			[
				'label' => esc_html__( 'Heading Margin', 'msitheme' ),
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
					'{{WRAPPER}} .icon-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography for description', 'msitheme' ),
				'selector' => '{{WRAPPER}} .icon-description',
			]
		);
        $this->add_control(
			'desc_color',
			[
				'label' => __( 'Description Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#070028',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-description' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_size',
			[
				'label' => __( 'Image size', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'default' => '32px',
				'selectors' => [
					'{{WRAPPER}} .icon-box-img' => 'height: {{VALUE}} !important;width: {{VALUE}} !important',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Icon Border', 'msitheme' ),
				'selector' => '{{WRAPPER}} .icon-box-img',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Form Field Border radius', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'selectors' => [
					'{{WRAPPER}} .icon-box-img' => 'border-radius: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Icon Padding', 'msitheme' ),
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
					'{{WRAPPER}} .icon-box-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'margin',
			[
				'label' => esc_html__( 'Icon Margin', 'msitheme' ),
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
					'{{WRAPPER}} .icon-box-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'content_align',
			[
				'label' => esc_html__( 'Content Alignment', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex' => [
						'title' => esc_html__( 'Flex', 'msitheme' ),
						'icon' => 'eicon-text-align-left',
					],
					'grid' => [
						'title' => esc_html__( 'Grid', 'msitheme' ),
						'icon' => 'eicon-text-align-center',
					],
					'block' => [
						'title' => esc_html__( 'Block', 'msitheme' ),
						'icon' => 'eicon-text-align-right',
					],
					'inline-block' => [
						'title' => esc_html__( 'Inline-block', 'msitheme' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'block',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .msitheme-icon-box' => 'display: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'verticle_align',
			[
				'label' => esc_html__( 'Verticle Alignment', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => esc_html__( 'Start', 'msitheme' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'msitheme' ),
						'icon' => 'eicon-text-align-center',
					],
					'end' => [
						'title' => esc_html__( 'End', 'msitheme' ),
						'icon' => 'eicon-text-align-right',
					]
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .msitheme-icon-box' => 'align-items: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'gap',
			[
				'label' => __( 'Content gap', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'default' => '15px',
				'selectors' => [
					'{{WRAPPER}} .msitheme-icon-box' => 'gap: {{VALUE}} !important;',
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
            if ( !empty( $settings['icons'] ) ) :
        ?>
            <!-- start of icon box -->
            <div class="msitheme-icon-box">
                <?php foreach ( $settings['icons']  as $icon ) : ?>
					<?php if($icon['show_icon'] === 'yes') :   if( !empty( $icon['icon'] ) ) : ?>
						<img class="icon-box-img" src="<?php echo esc_url(wp_get_attachment_image_url( $icon['icon']['id'] )); ?>">
					<?php endif; endif; if( !empty( $icon['heading'] ) ) : ?>
                    	<div class="icon-heading">
							<?php echo wp_kses_post( $icon['heading'] ); ?>
						</div>
					<?php endif; if( !empty( $icon['desc'] ) ) : ?>
                    	<div class="icon-description">
							<?php echo wp_kses_post( $icon['desc'] ); ?>
						</div>
					<?php endif; ?>
                <?php endforeach; ?>
            </div>
    	<?php
        endif;
    } 
}
