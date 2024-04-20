<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class ProductTabNav extends Widget_Base {

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
		return 'product-tabfilter';
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
		return __( 'Product Tab Filter', 'msitheme' );
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
		return 'eicon-product-tabs';
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
			'label_content',
			[
				'label' => __( 'Tab label content', 'msitheme' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'msitheme' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-tabbed-nav',
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'label',
			[
				'label' => __( 'Tab label', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

		$this->add_control(
			'tab_labels',
			[
				'label' => esc_html__( 'Tab labels', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();


        // Tab 1 content
		$this->start_controls_section(
			'section_content1',
			[
				'label' => __( 'Tab 1 content', 'msitheme' ),
			]
		);

        $this->add_control(
			'prod_title_top1',
			[
				'label' => __( 'Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $this->add_control(
			'prod_title1',
			[
				'label' => __( 'Title bottom', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
		$this->add_control(
			'prod_desc1',
			[
				'label' => esc_html__( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'msitheme' ),
			]
		);

		$this->add_control(
			'prod_right_top1',
			[
				'label' => __( 'Right side Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'prod_right_info1',
			[
				'label' => __( 'Right side info', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $this->add_control(
			'content_box1',
			[
				'label' => esc_html__( 'Content box', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();


        // Tab 2 content
		$this->start_controls_section(
			'section_content2',
			[
				'label' => __( 'Tab 2 content', 'msitheme' ),
			]
		);

        $this->add_control(
			'prod_title_top2',
			[
				'label' => __( 'Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $this->add_control(
			'prod_title2',
			[
				'label' => __( 'Title bottom', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
		$this->add_control(
			'prod_desc2',
			[
				'label' => esc_html__( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'msitheme' ),
			]
		);

		$this->add_control(
			'prod_right_top2',
			[
				'label' => __( 'Right side Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'prod_right_info2',
			[
				'label' => __( 'Right side info', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $this->add_control(
			'content_box2',
			[
				'label' => esc_html__( 'Content box', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();


        // Tab 3 content
		$this->start_controls_section(
			'section_content3',
			[
				'label' => __( 'Tab 3 content', 'msitheme' ),
			]
		);

        $this->add_control(
			'prod_title_top3',
			[
				'label' => __( 'Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $this->add_control(
			'prod_title3',
			[
				'label' => __( 'Title bottom', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
		$this->add_control(
			'prod_desc3',
			[
				'label' => esc_html__( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'msitheme' ),
			]
		);

		$this->add_control(
			'prod_right_top3',
			[
				'label' => __( 'Right side Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'prod_right_info3',
			[
				'label' => __( 'Right side info', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $this->add_control(
			'content_box3',
			[
				'label' => esc_html__( 'Content box', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();


        // Tab 4 content
		$this->start_controls_section(
			'section_content4',
			[
				'label' => __( 'Tab 4 content', 'msitheme' ),
			]
		);

        $this->add_control(
			'prod_title_top4',
			[
				'label' => __( 'Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $this->add_control(
			'prod_title4',
			[
				'label' => __( 'Title bottom', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
		$this->add_control(
			'prod_desc4',
			[
				'label' => esc_html__( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'msitheme' ),
			]
		);

		$this->add_control(
			'prod_right_top4',
			[
				'label' => __( 'Right side Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'prod_right_info4',
			[
				'label' => __( 'Right side info', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $this->add_control(
			'content_box4',
			[
				'label' => esc_html__( 'Content box', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();


        // Tab 5 content
		$this->start_controls_section(
			'section_content5',
			[
				'label' => __( 'Tab 5 content', 'msitheme' ),
			]
		);

        $this->add_control(
			'prod_title_top5',
			[
				'label' => __( 'Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $this->add_control(
			'prod_title5',
			[
				'label' => __( 'Title bottom', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
		$this->add_control(
			'prod_desc5',
			[
				'label' => esc_html__( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'msitheme' ),
			]
		);

		$this->add_control(
			'prod_right_top5',
			[
				'label' => __( 'Right side Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'prod_right_info5',
			[
				'label' => __( 'Right side info', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $this->add_control(
			'content_box5',
			[
				'label' => esc_html__( 'Content box', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();


        // Tab 6 content
		$this->start_controls_section(
			'section_content6',
			[
				'label' => __( 'Tab 6 content', 'msitheme' ),
			]
		);

        $this->add_control(
			'prod_title_top6',
			[
				'label' => __( 'Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $this->add_control(
			'prod_title6',
			[
				'label' => __( 'Title bottom', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
		$this->add_control(
			'prod_desc6',
			[
				'label' => esc_html__( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'msitheme' ),
			]
		);

		$this->add_control(
			'prod_right_top6',
			[
				'label' => __( 'Right side Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'prod_right_info6',
			[
				'label' => __( 'Right side info', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $this->add_control(
			'content_box6',
			[
				'label' => esc_html__( 'Content box', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();


        // Tab 7 content
		$this->start_controls_section(
			'section_content7',
			[
				'label' => __( 'Tab 7 content', 'msitheme' ),
			]
		);

        $this->add_control(
			'prod_title_top7',
			[
				'label' => __( 'Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $this->add_control(
			'prod_title7',
			[
				'label' => __( 'Title bottom', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
		$this->add_control(
			'prod_desc7',
			[
				'label' => esc_html__( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'msitheme' ),
			]
		);

		$this->add_control(
			'prod_right_top7',
			[
				'label' => __( 'Right side Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'prod_right_info7',
			[
				'label' => __( 'Right side info', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $this->add_control(
			'content_box7',
			[
				'label' => esc_html__( 'Content box', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();


        // Tab 8 content
		$this->start_controls_section(
			'section_content8',
			[
				'label' => __( 'Tab 8 content', 'msitheme' ),
			]
		);

        $this->add_control(
			'prod_title_top8',
			[
				'label' => __( 'Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $this->add_control(
			'prod_title8',
			[
				'label' => __( 'Title bottom', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
		$this->add_control(
			'prod_desc8',
			[
				'label' => esc_html__( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'msitheme' ),
			]
		);

		$this->add_control(
			'prod_right_top8',
			[
				'label' => __( 'Right side Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'prod_right_info8',
			[
				'label' => __( 'Right side info', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $this->add_control(
			'content_box8',
			[
				'label' => esc_html__( 'Content box', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();


        // Tab 9 content
		$this->start_controls_section(
			'section_content9',
			[
				'label' => __( 'Tab 9 content', 'msitheme' ),
			]
		);

        $this->add_control(
			'prod_title_top9',
			[
				'label' => __( 'Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $this->add_control(
			'prod_title9',
			[
				'label' => __( 'Title bottom', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
		$this->add_control(
			'prod_desc9',
			[
				'label' => esc_html__( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'msitheme' ),
			]
		);

		$this->add_control(
			'prod_right_top9',
			[
				'label' => __( 'Right side Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'prod_right_info9',
			[
				'label' => __( 'Right side info', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $this->add_control(
			'content_box9',
			[
				'label' => esc_html__( 'Content box', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();


        // Tab 10 content
		$this->start_controls_section(
			'section_content10',
			[
				'label' => __( 'Tab 10 content', 'msitheme' ),
			]
		);

        $this->add_control(
			'prod_title_top10',
			[
				'label' => __( 'Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $this->add_control(
			'prod_title10',
			[
				'label' => __( 'Title bottom', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
		$this->add_control(
			'prod_desc10',
			[
				'label' => esc_html__( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'msitheme' ),
			]
		);

		$this->add_control(
			'prod_right_top10',
			[
				'label' => __( 'Right side Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'prod_right_info10',
			[
				'label' => __( 'Right side info', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $this->add_control(
			'content_box10',
			[
				'label' => esc_html__( 'Content box', 'msitheme' ),
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
				'name' => 'label_typography',
				'label' => __( 'Typography for label', 'msitheme' ),
				'selector' => '{{WRAPPER}} .document-tab label',
			]
		);
		
        $this->add_control(
			'label_color',
			[
				'label' => __( 'Label Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .document-tab label' => 'color: {{VALUE}};opacity:0.45',
				],
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'top_heading_typography',
				'label' => __( 'Typography for top heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .tabNav-left h6, .tabNav-right-content h6',
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
					'{{WRAPPER}} .tabNav-left h6, .tabNav-right-content h6' => 'color: {{VALUE}}',
				],
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __( 'Typography for heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .tabNav-left h4',
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
					'{{WRAPPER}} .tabNav-left h4' => 'color: {{VALUE}}',
				],
			]
		);

        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography for left description', 'msitheme' ),
				'selector' => '{{WRAPPER}} .tabNav-left-desc',
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
					'{{WRAPPER}} .tabNav-left-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'info_typography',
				'label' => __( 'Typography for right info', 'msitheme' ),
				'selector' => '{{WRAPPER}} .tabNav-right-info',
			]
		);

        $this->add_control(
			'info_color',
			[
				'label' => __( 'Info Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .tabNav-right-info' => 'color: {{VALUE}}',
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
        	<div class="document-tabbed product-tabbed-nav">
                <input type="radio" id="document-tab1" name="css-tabs5" checked>
                <input type="radio" id="document-tab2" name="css-tabs5">
                <input type="radio" id="document-tab3" name="css-tabs5">
                <input type="radio" id="document-tab4" name="css-tabs5">
                <input type="radio" id="document-tab5" name="css-tabs5">
                <input type="radio" id="document-tab6" name="css-tabs5">
                <input type="radio" id="document-tab7" name="css-tabs5">
                <input type="radio" id="document-tab8" name="css-tabs5">
                <input type="radio" id="document-tab9" name="css-tabs5">
                <input type="radio" id="document-tab10" name="css-tabs5">
                <input type="radio" id="document-tab11" name="css-tabs5">
                
                <?php
                if ( !empty( $settings['tab_labels'] ) ) : ?>
					<ul class="document-tabs list-unstyled flex f-gap-25 align-center">
						<?php $i = 0; foreach ( $settings['tab_labels'] as $tab ) : $i++; ?>
							<?php if ( !empty( $tab['label'] ) ) : ?>
								<li class="document-tab">
									<label for="document-tab<?php echo esc_attr( $i ); ?>">
										<?php echo esc_html( $tab['label'] ); ?>
									</label>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
                <?php endif; ?>
                
				<?php if ( !empty( $settings['prod_title1'] || !empty( $settings['content_box1'] ) ) ) : ?>
					<!-- content box 1 -->
					<div class="product-tabNav-content">
						<div class="tabNav-grid grid">
							<div class="tabNav-left">
								<?php if ( !empty( $settings['prod_title_top1'] ) ) : ?>
									<h6 class="theme-border relative">
										<?php echo esc_html( $settings['prod_title_top1'] ); ?>
									</h6>
								<?php endif; if ( !empty( $settings['prod_title1'] ) ) : ?>
									<h4>
										<?php echo wp_kses_post( $settings['prod_title1'] ); ?>
									</h4>
								<?php endif; if ( !empty( $settings['prod_desc1'] ) ) : ?>
									<div class="tabNav-left-desc">
										<?php echo $settings['prod_desc1']; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="tabNav-right">
								<div class="tabNav-right-content">
									<?php if ( !empty( $settings['prod_right_top1'] ) ) : ?>
										<h6 class="theme-border relative">
											<?php echo esc_html( $settings['prod_right_top1'] ); ?>
										</h6>
									<?php endif; if ( !empty( $settings['content_box1'] ) ) : foreach( $settings['content_box1'] as $box ) : ?>
										<div class="tabNav-right-info">
											<?php echo wp_kses_post( $box['prod_right_info1'] ); ?>
										</div>
									<?php endforeach; endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; if ( !empty( $settings['prod_title2'] || !empty( $settings['content_box2'] ) ) ) : ?>
					<!-- content box 2 -->
					<div class="product-tabNav-content">
						<div class="tabNav-grid grid">
							<div class="tabNav-left">
								<?php if ( !empty( $settings['prod_title_top2'] ) ) : ?>
									<h6 class="theme-border relative">
										<?php echo esc_html( $settings['prod_title_top2'] ); ?>
									</h6>
								<?php endif; if ( !empty( $settings['prod_title2'] ) ) : ?>
									<h4>
										<?php echo wp_kses_post( $settings['prod_title2'] ); ?>
									</h4>
								<?php endif; if ( !empty( $settings['prod_desc2'] ) ) : ?>
									<div class="tabNav-left-desc">
										<?php echo $settings['prod_desc2']; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="tabNav-right">
								<div class="tabNav-right-content">
									<?php if ( !empty( $settings['prod_right_top2'] ) ) : ?>
										<h6 class="theme-border relative">
											<?php echo esc_html( $settings['prod_right_top2'] ); ?>
										</h6>
									<?php endif; if ( !empty( $settings['content_box2'] ) ) : foreach( $settings['content_box2'] as $box ) : ?>
										<div class="tabNav-right-info">
											<?php echo wp_kses_post( $box['prod_right_info2'] ); ?>
										</div>
									<?php endforeach; endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; if ( !empty( $settings['prod_title3'] || !empty( $settings['content_box3'] ) ) ) : ?>
					<!-- content box 3 -->
					<div class="product-tabNav-content">
						<div class="tabNav-grid grid">
							<div class="tabNav-left">
								<?php if ( !empty( $settings['prod_title_top3'] ) ) : ?>
									<h6 class="theme-border relative">
										<?php echo esc_html( $settings['prod_title_top3'] ); ?>
									</h6>
								<?php endif; if ( !empty( $settings['prod_title3'] ) ) : ?>
									<h4>
										<?php echo wp_kses_post( $settings['prod_title3'] ); ?>
									</h4>
								<?php endif; if ( !empty( $settings['prod_desc3'] ) ) : ?>
									<div class="tabNav-left-desc">
										<?php echo $settings['prod_desc3']; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="tabNav-right">
								<div class="tabNav-right-content">
									<?php if ( !empty( $settings['prod_right_top3'] ) ) : ?>
										<h6 class="theme-border relative">
											<?php echo esc_html( $settings['prod_right_top3'] ); ?>
										</h6>
									<?php endif; if ( !empty( $settings['content_box3'] ) ) : foreach( $settings['content_box3'] as $box ) : ?>
										<div class="tabNav-right-info">
											<?php echo wp_kses_post( $box['prod_right_info3'] ); ?>
										</div>
									<?php endforeach; endif; ?>
								</div>
							</div>
						</div>
					</div>
                <?php endif; if ( !empty( $settings['prod_title4'] || !empty( $settings['content_box4'] ) ) ) : ?>
					<!-- content box 4 -->
					<div class="product-tabNav-content">
						<div class="tabNav-grid grid">
							<div class="tabNav-left">
								<?php if ( !empty( $settings['prod_title_top4'] ) ) : ?>
									<h6 class="theme-border relative">
										<?php echo esc_html( $settings['prod_title_top4'] ); ?>
									</h6>
								<?php endif; if ( !empty( $settings['prod_title4'] ) ) : ?>
									<h4>
										<?php echo wp_kses_post( $settings['prod_title4'] ); ?>
									</h4>
								<?php endif; if ( !empty( $settings['prod_desc4'] ) ) : ?>
									<div class="tabNav-left-desc">
										<?php echo $settings['prod_desc4']; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="tabNav-right">
								<div class="tabNav-right-content">
									<?php if ( !empty( $settings['prod_right_top4'] ) ) : ?>
										<h6 class="theme-border relative">
											<?php echo esc_html( $settings['prod_right_top4'] ); ?>
										</h6>
									<?php endif; if ( !empty( $settings['content_box4'] ) ) : foreach( $settings['content_box4'] as $box ) : ?>
										<div class="tabNav-right-info">
											<?php echo wp_kses_post( $box['prod_right_info4'] ); ?>
										</div>
									<?php endforeach; endif; ?>
								</div>
							</div>
						</div>
					</div>
                <?php endif; if ( !empty( $settings['prod_title5'] || !empty( $settings['content_box5'] ) ) ) : ?>
					<!-- content box 5 -->
					<div class="product-tabNav-content">
						<div class="tabNav-grid grid">
							<div class="tabNav-left">
								<?php if ( !empty( $settings['prod_title_top5'] ) ) : ?>
									<h6 class="theme-border relative">
										<?php echo esc_html( $settings['prod_title_top5'] ); ?>
									</h6>
								<?php endif; if ( !empty( $settings['prod_title5'] ) ) : ?>
									<h4>
										<?php echo wp_kses_post( $settings['prod_title5'] ); ?>
									</h4>
								<?php endif; if ( !empty( $settings['prod_desc5'] ) ) : ?>
									<div class="tabNav-left-desc">
										<?php echo $settings['prod_desc5']; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="tabNav-right">
								<div class="tabNav-right-content">
									<?php if ( !empty( $settings['prod_right_top5'] ) ) : ?>
										<h6 class="theme-border relative">
											<?php echo esc_html( $settings['prod_right_top5'] ); ?>
										</h6>
									<?php endif; if ( !empty( $settings['content_box5'] ) ) : foreach( $settings['content_box5'] as $box ) : ?>
										<div class="tabNav-right-info">
											<?php echo wp_kses_post( $box['prod_right_info5'] ); ?>
										</div>
									<?php endforeach; endif; ?>
								</div>
							</div>
						</div>
					</div>
                <?php endif; if ( !empty( $settings['prod_title6'] || !empty( $settings['content_box6'] ) ) ) : ?>
					<!-- content box 6 -->
					<div class="product-tabNav-content">
						<div class="tabNav-grid grid">
							<div class="tabNav-left">
								<?php if ( !empty( $settings['prod_title_top6'] ) ) : ?>
									<h6 class="theme-border relative">
										<?php echo esc_html( $settings['prod_title_top6'] ); ?>
									</h6>
								<?php endif; if ( !empty( $settings['prod_title6'] ) ) : ?>
									<h4>
										<?php echo wp_kses_post( $settings['prod_title6'] ); ?>
									</h4>
								<?php endif; if ( !empty( $settings['prod_desc6'] ) ) : ?>
									<div class="tabNav-left-desc">
										<?php echo $settings['prod_desc6']; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="tabNav-right">
								<div class="tabNav-right-content">
									<?php if ( !empty( $settings['prod_right_top6'] ) ) : ?>
										<h6 class="theme-border relative">
											<?php echo esc_html( $settings['prod_right_top6'] ); ?>
										</h6>
									<?php endif; if ( !empty( $settings['content_box6'] ) ) : foreach( $settings['content_box6'] as $box ) : ?>
										<div class="tabNav-right-info">
											<?php echo wp_kses_post( $box['prod_right_info6'] ); ?>
										</div>
									<?php endforeach; endif; ?>
								</div>
							</div>
						</div>
					</div>
                <?php endif; if ( !empty( $settings['prod_title7'] || !empty( $settings['content_box7'] ) ) ) : ?>
				<!-- content box 7 -->
					<div class="product-tabNav-content">
						<div class="tabNav-grid grid">
							<div class="tabNav-left">
								<?php if ( !empty( $settings['prod_title_top7'] ) ) : ?>
									<h6 class="theme-border relative">
										<?php echo esc_html( $settings['prod_title_top7'] ); ?>
									</h6>
								<?php endif; if ( !empty( $settings['prod_title7'] ) ) : ?>
									<h4>
										<?php echo wp_kses_post( $settings['prod_title7'] ); ?>
									</h4>
								<?php endif; if ( !empty( $settings['prod_desc7'] ) ) : ?>
									<div class="tabNav-left-desc">
										<?php echo $settings['prod_desc7']; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="tabNav-right">
								<div class="tabNav-right-content">
									<?php if ( !empty( $settings['prod_right_top7'] ) ) : ?>
										<h6 class="theme-border relative">
											<?php echo esc_html( $settings['prod_right_top7'] ); ?>
										</h6>
									<?php endif; if ( !empty( $settings['content_box7'] ) ) : foreach( $settings['content_box7'] as $box ) : ?>
										<div class="tabNav-right-info">
											<?php echo wp_kses_post( $box['prod_right_info7'] ); ?>
										</div>
									<?php endforeach; endif; ?>
								</div>
							</div>
						</div>
					</div>
                <?php endif; if ( !empty( $settings['prod_title8'] || !empty( $settings['content_box8'] ) ) ) : ?>
					<!-- content box 8 -->
					<div class="product-tabNav-content">
						<div class="tabNav-grid grid">
							<div class="tabNav-left">
								<?php if ( !empty( $settings['prod_title_top8'] ) ) : ?>
									<h6 class="theme-border relative">
										<?php echo esc_html( $settings['prod_title_top8'] ); ?>
									</h6>
								<?php endif; if ( !empty( $settings['prod_title8'] ) ) : ?>
									<h4>
										<?php echo wp_kses_post( $settings['prod_title8'] ); ?>
									</h4>
								<?php endif; if ( !empty( $settings['prod_desc8'] ) ) : ?>
									<div class="tabNav-left-desc">
										<?php echo $settings['prod_desc8']; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="tabNav-right">
								<div class="tabNav-right-content">
									<?php if ( !empty( $settings['prod_right_top8'] ) ) : ?>
										<h6 class="theme-border relative">
											<?php echo esc_html( $settings['prod_right_top8'] ); ?>
										</h6>
									<?php endif; if ( !empty( $settings['content_box8'] ) ) : foreach( $settings['content_box8'] as $box ) : ?>
										<div class="tabNav-right-info">
											<?php echo wp_kses_post( $box['prod_right_info8'] ); ?>
										</div>
									<?php endforeach; endif; ?>
								</div>
							</div>
						</div>
					</div>
                <?php endif; if ( !empty( $settings['prod_title9'] || !empty( $settings['content_box9'] ) ) ) : ?>
					<!-- content box 9 -->
					<div class="product-tabNav-content">
						<div class="tabNav-grid grid">
							<div class="tabNav-left">
								<?php if ( !empty( $settings['prod_title_top9'] ) ) : ?>
									<h6 class="theme-border relative">
										<?php echo esc_html( $settings['prod_title_top9'] ); ?>
									</h6>
								<?php endif; if ( !empty( $settings['prod_title9'] ) ) : ?>
									<h4>
										<?php echo wp_kses_post( $settings['prod_title9'] ); ?>
									</h4>
								<?php endif; if ( !empty( $settings['prod_desc9'] ) ) : ?>
									<div class="tabNav-left-desc">
										<?php echo $settings['prod_desc9']; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="tabNav-right">
								<div class="tabNav-right-content">
									<?php if ( !empty( $settings['prod_right_top9'] ) ) : ?>
										<h6 class="theme-border relative">
											<?php echo esc_html( $settings['prod_right_top9'] ); ?>
										</h6>
									<?php endif; if ( !empty( $settings['content_box9'] ) ) : foreach( $settings['content_box9'] as $box ) : ?>
										<div class="tabNav-right-info">
											<?php echo wp_kses_post( $box['prod_right_info9'] ); ?>
										</div>
									<?php endforeach; endif; ?>
								</div>
							</div>
						</div>
					</div>
                <?php endif; if ( !empty( $settings['prod_title10'] || !empty( $settings['content_box10'] ) ) ) : ?>
					<!-- content box 10 -->
					<div class="product-tabNav-content">
						<div class="tabNav-grid grid">
							<div class="tabNav-left">
								<?php if ( !empty( $settings['prod_title_top10'] ) ) : ?>
									<h6 class="theme-border relative">
										<?php echo esc_html( $settings['prod_title_top10'] ); ?>
									</h6>
								<?php endif; if ( !empty( $settings['prod_title10'] ) ) : ?>
									<h4>
										<?php echo wp_kses_post( $settings['prod_title10'] ); ?>
									</h4>
								<?php endif; if ( !empty( $settings['prod_desc10'] ) ) : ?>
									<div class="tabNav-left-desc">
										<?php echo $settings['prod_desc10']; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="tabNav-right">
								<div class="tabNav-right-content">
									<?php if ( !empty( $settings['prod_right_top10'] ) ) : ?>
										<h6 class="theme-border relative">
											<?php echo esc_html( $settings['prod_right_top10'] ); ?>
										</h6>
									<?php endif; if ( !empty( $settings['content_box10'] ) ) : foreach( $settings['content_box10'] as $box ) : ?>
										<div class="tabNav-right-info">
											<?php echo wp_kses_post( $box['prod_right_info10'] ); ?>
										</div>
									<?php endforeach; endif; ?>
								</div>
							</div>
						</div>
					</div>
                <?php endif; ?>
    		</div>
            		
		<?php
	}

}
