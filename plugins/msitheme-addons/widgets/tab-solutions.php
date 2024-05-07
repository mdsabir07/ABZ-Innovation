<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class TabSolutions extends Widget_Base {

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
		return 'tab-solutions';
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
		return __( 'Tab Solutions', 'msitheme' );
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

		// Inner tab label
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'inner_label1',
			[
				'label' => esc_html__( 'Label', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

        $this->add_control(
			'inner_tabs1',
			[
				'label' => esc_html__( 'Inner tabs label', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		// Inner tab content 1
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'image1',
			[
				'label' => esc_html__( 'Choose drone Image', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
        $repeater->add_control(
			'inner_heading1',
			[
				'label' => esc_html__( 'Heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
        $repeater->add_control(
			'inner_desc1',
			[
				'label' => esc_html__( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		// inner image box 1
		$repeater->add_control(
			'inner_img1',
			[
				'label' => esc_html__( 'Choose Image 1', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$repeater->add_control(
			'inner_img1_heading1',
			[
				'label' => esc_html__( 'Image 1 Heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img1_heading1_small',
			[
				'label' => esc_html__( 'Image 1 Heading small text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img1_desc1',
			[
				'label' => esc_html__( 'Image 1 description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		// inner image box 2
		$repeater->add_control(
			'inner_img2',
			[
				'label' => esc_html__( 'Choose Image 2', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$repeater->add_control(
			'inner_img2_heading1',
			[
				'label' => esc_html__( 'Image 2 Heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img2_heading1_small',
			[
				'label' => esc_html__( 'Image 2 Heading small text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img2_desc1',
			[
				'label' => esc_html__( 'Image 2 description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		// inner image box 3
		$repeater->add_control(
			'inner_img3',
			[
				'label' => esc_html__( 'Choose Image 3', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$repeater->add_control(
			'inner_img3_heading1',
			[
				'label' => esc_html__( 'Image 3 Heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img3_heading1_small',
			[
				'label' => esc_html__( 'Image 3 Heading small text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img3_desc1',
			[
				'label' => esc_html__( 'Image 3 description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		// inner image box 4
		$repeater->add_control(
			'inner_img4',
			[
				'label' => esc_html__( 'Choose Image 4', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$repeater->add_control(
			'inner_img4_heading1',
			[
				'label' => esc_html__( 'Image 4 Heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img4_heading1_small',
			[
				'label' => esc_html__( 'Image 4 Heading small text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img4_desc1',
			[
				'label' => esc_html__( 'Image 4 description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		
		$repeater->add_control(
			'btn_label1',
			[
				'label'	=> __( 'Button label', 'msitheme' ),
				'type'	=> Controls_Manager::TEXT,
				'label_block'	=> true,
			]
		);

		$repeater->add_control(
			'btn_link1',
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

		$repeater->add_control(
			'inner_bottom_desc1',
			[
				'label'	=> __( 'Button description', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
				'label_block'	=> true,
			]
		);
        $this->add_control(
			'inner_content1',
			[
				'label' => esc_html__( 'Inner tabs content', 'msitheme' ),
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

		// Inner tab label
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'inner_label12',
			[
				'label' => esc_html__( 'Label', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

        $this->add_control(
			'inner_tabs12',
			[
				'label' => esc_html__( 'Inner tabs label', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		// Inner tab content 1
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'image12',
			[
				'label' => esc_html__( 'Choose drone Image', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
        $repeater->add_control(
			'inner_heading12',
			[
				'label' => esc_html__( 'Heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
        $repeater->add_control(
			'inner_desc12',
			[
				'label' => esc_html__( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		// inner image box 1
		$repeater->add_control(
			'inner_img12',
			[
				'label' => esc_html__( 'Choose Image 1', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$repeater->add_control(
			'inner_img1_heading12',
			[
				'label' => esc_html__( 'Image 1 Heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img1_heading12_small',
			[
				'label' => esc_html__( 'Image 1 Heading small text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img1_desc12',
			[
				'label' => esc_html__( 'Image 1 description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		// inner image box 2
		$repeater->add_control(
			'inner_img22',
			[
				'label' => esc_html__( 'Choose Image 2', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$repeater->add_control(
			'inner_img2_heading12',
			[
				'label' => esc_html__( 'Image 2 Heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img2_heading12_small',
			[
				'label' => esc_html__( 'Image 2 Heading small text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img2_desc12',
			[
				'label' => esc_html__( 'Image 2 description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		// inner image box 3
		$repeater->add_control(
			'inner_img32',
			[
				'label' => esc_html__( 'Choose Image 3', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$repeater->add_control(
			'inner_img3_heading12',
			[
				'label' => esc_html__( 'Image 3 Heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img3_heading12_small',
			[
				'label' => esc_html__( 'Image 3 Heading small text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img3_desc12',
			[
				'label' => esc_html__( 'Image 3 description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		// inner image box 4
		$repeater->add_control(
			'inner_img42',
			[
				'label' => esc_html__( 'Choose Image 4', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$repeater->add_control(
			'inner_img4_heading12',
			[
				'label' => esc_html__( 'Image 4 Heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img4_heading12_small',
			[
				'label' => esc_html__( 'Image 4 Heading small text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'inner_img4_desc12',
			[
				'label' => esc_html__( 'Image 4 description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		
		$repeater->add_control(
			'btn_label12',
			[
				'label'	=> __( 'Button label', 'msitheme' ),
				'type'	=> Controls_Manager::TEXT,
				'label_block'	=> true,
			]
		);

		$repeater->add_control(
			'btn_link12',
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

		$repeater->add_control(
			'inner_bottom_desc12',
			[
				'label'	=> __( 'Button description', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
				'label_block'	=> true,
			]
		);
        $this->add_control(
			'inner_content2',
			[
				'label' => esc_html__( 'Inner tabs content', 'msitheme' ),
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
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'msitheme' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .tabbed-solution',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				'label' => __( 'Typography for label', 'msitheme' ),
				'selector' => '{{WRAPPER}} .solution-tab label',
			]
		);
		
        $this->add_control(
			'label_color',
			[
				'label' => __( 'Label Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#282929',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .solution-tab label' => 'color: {{VALUE}};opacity:0.45',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'inner_label_typography',
				'label' => __( 'Typography for Inner label', 'msitheme' ),
				'selector' => '{{WRAPPER}} .solution-tab-inner label',
			]
		);
		
        $this->add_control(
			'inner_label_color',
			[
				'label' => __( 'Inner Label Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#282929',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .solution-tab-inner label' => 'color: {{VALUE}};opacity:0.45',
				],
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __( 'Typography for heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .single-solutions-content1 h2',
			]
		);
        $this->add_control(
			'heading_color',
			[
				'label' => __( 'Heading Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#282929',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .single-solutions-content1 h2' => 'color: {{VALUE}}',
				],
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'inner_desc',
				'label' => __( 'Typography for inner description', 'msitheme' ),
				'selector' => '{{WRAPPER}} .content-inner-desc',
			]
		);
        $this->add_control(
			'inner_desc_color',
			[
				'label' => __( 'Inner description Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#282929',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content-inner-desc' => 'color: {{VALUE}}',
				],
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'inner_box_title',
				'label' => __( 'Typography for inner box title', 'msitheme' ),
				'selector' => '{{WRAPPER}} .content-inner-grid-title',
			]
		);
        $this->add_control(
			'inner_box_title_color',
			[
				'label' => __( 'Inner box title Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#282929',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content-inner-grid-title' => 'color: {{VALUE}}',
				],
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'inner_box_title_sub',
				'label' => __( 'Typography for inner box title sub', 'msitheme' ),
				'selector' => '{{WRAPPER}} .content-inner-grid-title sub',
			]
		);
        $this->add_control(
			'inner_box_title_sub_color',
			[
				'label' => __( 'Inner box title sub Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#282929',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content-inner-grid-title sub' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'inner_box_desc',
				'label' => __( 'Typography for inner box description', 'msitheme' ),
				'selector' => '{{WRAPPER}} .content-inner-grid-desc',
			]
		);
        $this->add_control(
			'inner_box_desc_color',
			[
				'label' => __( 'Inner box description Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#282929',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content-inner-grid-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'inner_bottom_desc',
				'label' => __( 'Typography for inner bottom', 'msitheme' ),
				'selector' => '{{WRAPPER}} .content-inner-bottom-desc',
			]
		);
        $this->add_control(
			'inner_bottom_desc_color',
			[
				'label' => __( 'Inner bottom description Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#282929',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content-inner-bottom-desc' => 'color: {{VALUE}}',
				],
			]
		);
       
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __('Typography for button', 'msitheme'),
				'selector' => '{{WRAPPER}} .content-inner-bottom .theme-btn',
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
					'{{WRAPPER}} .content-inner-bottom .theme-btn' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .content-inner-bottom .theme-btn' => 'background: {{VALUE}}',
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
					'{{WRAPPER}} .content-inner-bottom .theme-btn:hover' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .content-inner-bottom .theme-btn:hover' => 'background: {{VALUE}}',
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
					'{{WRAPPER}} .content-inner-bottom .theme-btn' => 'border-color: {{VALUE}}',
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
					'{{WRAPPER}} .content-inner-bottom .theme-btn:hover' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
				'label' => __('Typography for button icon', 'msitheme'),
				'selector' => '{{WRAPPER}} .content-inner-bottom .theme-btn i',
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
					'{{WRAPPER}} .content-inner-bottom .theme-btn i' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .content-inner-bottom .theme-btn:hover i' => 'border-color: {{VALUE}}',
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
					'{{WRAPPER}} .content-inner-bottom .theme-btn i' => 'border-width: {{VALUE}}px',
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
        	<div class="tabbed-solution">
                <input type="radio" id="solution-tab1" name="css-tabs" checked>
                <input type="radio" id="solution-tab2" name="css-tabs">
                <input type="radio" id="solution-tab3" name="css-tabs">
                <input type="radio" id="solution-tab4" name="css-tabs">
                
                <?php if ( !empty( $settings['tab_labels'] ) ) : ?>
					<ul class="solution-tabs list-unstyled flex f-gap-25 align-center">
						<?php $i = 0; foreach ( $settings['tab_labels'] as $tab ) : $i++; ?>
							<?php if ( !empty( $tab['label'] ) ) : ?>
								<li class="solution-tab pointer">
									<label for="solution-tab<?php echo esc_attr( $i ); ?>">
										<?php echo esc_html( $tab['label'] ); ?>
									</label>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
                <?php endif; ?>
                
                <?php if ( !empty( $settings['inner_content1'] ) ) : ?>
                    <div class="content1-solutions">
						<div class="tabbed-solution-inner1">
							<div class="tab-inner-right">
								<input type="radio" id="solution-tab-inner1" name="css-tabs-inner" checked>
								<input type="radio" id="solution-tab-inner2" name="css-tabs-inner">
								<input type="radio" id="solution-tab-inner3" name="css-tabs-inner">

								<?php if ( !empty( $settings['inner_tabs1'] ) ) : ?>
									<ul class="solution-tabs-inner1 list-unstyled flex justify-end f-gap-10 align-center">
										<?php $i = 0; foreach ( $settings['inner_tabs1'] as $tab ) : $i++; ?>
											<?php if ( !empty( $tab['inner_label1'] ) ) : ?>
												<li class="solution-tab-inner pointer">
													<label for="solution-tab-inner<?php echo esc_attr( $i ); ?>">
														<?php echo esc_html( $tab['inner_label1'] ); ?>
													</label>
												</li>
											<?php endif; ?>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
								<?php foreach ( $settings['inner_content1'] as $inner_cont ) : ?>
									<div class="content1-inner-solutions content12-inner-solutions">
										<div class="single-solutions-content1">
											<?php if ( !empty( $inner_cont['image1'] ) ) : ?>
												<div class="solutions-drone-img">
													<img src="<?php echo esc_url(wp_get_attachment_image_url( $inner_cont['image1']['id'], 'large' )); ?>" alt="<?php echo esc_attr( $inner_cont['inner_heading1'] ); ?>">
												</div>
											<?php endif; ?>
											<div class="content1-inner-content">
												<?php if ( !empty( $inner_cont['inner_heading1'] ) ) : ?>
													<h2 class="fontVariation">
														<?php echo esc_html( $inner_cont['inner_heading1'] ); ?>
													</h2>
												<?php endif; if ( !empty( $inner_cont['inner_desc1'] ) ) : ?>
													<div class="content-inner-desc">
														<?php echo wp_kses_post( $inner_cont['inner_desc1'] ); ?>
													</div>
												<?php endif; ?>
												<div class="content-inner-grid grid">
													<div class="content-inner-grid-single">
														<?php if ( !empty( $inner_cont['inner_img1'] ) ) : ?>
															<img src="<?php echo esc_url(wp_get_attachment_image_url( $inner_cont['inner_img1']['id'], 'thumbnail' )); ?>" alt="">
														<?php endif; if ( !empty( $inner_cont['inner_img1_heading1'] ) ) : ?>
															<div class="content-inner-grid-title">
																<?php echo esc_html( $inner_cont['inner_img1_heading1'] ); ?>
																<?php if ( !empty( $inner_cont['inner_img1_heading1_small'] ) ) : ?>
																	<sub><?php echo esc_html( $inner_cont['inner_img1_heading1_small'] ); ?></sub>
																<?php endif; ?>
															</div>
														<?php endif; if ( !empty( $inner_cont['inner_img1_desc1'] ) ) : ?>
															<div class="content-inner-grid-desc">
																<?php echo esc_html( $inner_cont['inner_img1_desc1'] ); ?>
															</div>
														<?php endif; ?>
													</div>
													<div class="content-inner-grid-single">
														<?php if ( !empty( $inner_cont['inner_img2'] ) ) : ?>
															<img src="<?php echo esc_url(wp_get_attachment_image_url( $inner_cont['inner_img2']['id'], 'thumbnail' )); ?>" alt="">
														<?php endif; if ( !empty( $inner_cont['inner_img2_heading1'] ) ) : ?>
															<div class="content-inner-grid-title">
																<?php echo esc_html( $inner_cont['inner_img2_heading1'] ); ?>

																<?php if ( !empty( $inner_cont['inner_img2_heading1_small'] ) ) : ?>
																	<sub><?php echo esc_html( $inner_cont['inner_img2_heading1_small'] ); ?></sub>
																<?php endif; ?>
															</div>
														<?php endif; if ( !empty( $inner_cont['inner_img2_desc1'] ) ) : ?>
															<div class="content-inner-grid-desc">
																<?php echo esc_html( $inner_cont['inner_img2_desc1'] ); ?>
															</div>
														<?php endif; ?>
													</div>
													<div class="content-inner-grid-single">
														<?php if ( !empty( $inner_cont['inner_img3'] ) ) : ?>
															<img src="<?php echo esc_url(wp_get_attachment_image_url( $inner_cont['inner_img3']['id'], 'thumbnail' )); ?>" alt="">
														<?php endif; if ( !empty( $inner_cont['inner_img3_heading1'] ) ) : ?>
															<div class="content-inner-grid-title">
																<?php echo esc_html( $inner_cont['inner_img3_heading1'] ); ?>

																<?php if ( !empty( $inner_cont['inner_img3_heading1_small'] ) ) : ?>
																	<sub><?php echo esc_html( $inner_cont['inner_img3_heading1_small'] ); ?></sub>
																<?php endif; ?>
															</div>
														<?php endif; if ( !empty( $inner_cont['inner_img3_desc1'] ) ) : ?>
															<div class="content-inner-grid-desc">
																<?php echo esc_html( $inner_cont['inner_img3_desc1'] ); ?>
															</div>
														<?php endif; ?>
													</div>
													<div class="content-inner-grid-single">
														<?php if ( !empty( $inner_cont['inner_img4'] ) ) : ?>
															<img src="<?php echo esc_url(wp_get_attachment_image_url( $inner_cont['inner_img4']['id'], 'thumbnail' )); ?>" alt="">
														<?php endif; if ( !empty( $inner_cont['inner_img4_heading1'] ) ) : ?>
															<div class="content-inner-grid-title">
																<?php echo esc_html( $inner_cont['inner_img4_heading1'] ); ?>

																<?php if ( !empty( $inner_cont['inner_img4_heading1_small'] ) ) : ?>
																	<sub><?php echo esc_html( $inner_cont['inner_img4_heading1_small'] ); ?></sub>
																<?php endif; ?>
															</div>
														<?php endif; if ( !empty( $inner_cont['inner_img4_desc1'] ) ) : ?>
															<div class="content-inner-grid-desc">
																<?php echo esc_html( $inner_cont['inner_img4_desc1'] ); ?>
															</div>
														<?php endif; ?>
													</div>
												</div>
												<?php if ( !empty( $inner_cont['btn_label1'] ) ) : 
													$target = $inner_cont['btn_link1']['is_external'] ? ' target="_blank"' : '';
													$nofollow = $inner_cont['btn_link1']['nofollow'] ? ' rel="nofollow"' : '';
												?>
													<div class="content-inner-bottom flex align-center f-gap-20">
														<a href="<?php echo esc_url( $inner_cont['btn_link1']['url'] ); ?>" class="theme-btn filled-btn clrOrange-bg clrWhite" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?>>
															<?php echo esc_html( $inner_cont['btn_label1'] ); ?>
														</a>
														<?php if ( !empty( $inner_cont['inner_bottom_desc1'] ) ) : ?>
															<div class="content-inner-bottom-desc">
																<?php echo wp_kses_post( $inner_cont['inner_bottom_desc1'] ); ?>
															</div>
														<?php endif; ?>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div> <!-- tabbed-inner -->
                    </div>
                <?php endif; ?>
                
                <?php if ( !empty( $settings['inner_content2'] ) ) : ?>
                    <div class="content1-solutions content2-solutions">
						<div class="tabbed-solution-inner1">
							<div class="tab-inner-right">
								<input type="radio" id="solution-tab-inner12" name="css-tabs-inner2" checked>
								<input type="radio" id="solution-tab-inner22" name="css-tabs-inner2">
								<input type="radio" id="solution-tab-inner32" name="css-tabs-inner2">
								<?php if ( !empty( $settings['inner_tabs12'] ) ) : ?>
									<ul class="solution-tabs-inner1 solution-tabs-inner12 list-unstyled flex justify-end f-gap-10 align-center">
										<?php $i = 0; foreach ( $settings['inner_tabs12'] as $tab ) : $i++; ?>
											<?php if ( !empty( $tab['inner_label12'] ) ) : ?>
												<li class="solution-tab-inner pointer">
													<label for="solution-tab-inner<?php echo esc_attr( $i ); ?>2">
														<?php echo esc_html( $tab['inner_label12'] ); ?>
													</label>
												</li>
											<?php endif; ?>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
								<?php if ( !empty( $settings['inner_content2'] ) ) : foreach ( $settings['inner_content2'] as $inner_cont ) : ?>
									<div class="content1-inner-solutions">
										<div class="single-solutions-content1">
											<?php if ( !empty( $inner_cont['image12'] ) ) : ?>
												<div class="solutions-drone-img">
													<img src="<?php echo esc_url(wp_get_attachment_image_url( $inner_cont['image12']['id'], 'large' )); ?>" alt="<?php echo esc_attr( $inner_cont['inner_heading12'] ); ?>">
												</div>
											<?php endif; ?>
											<div class="content1-inner-content">
												<?php if ( !empty( $inner_cont['inner_heading12'] ) ) : ?>
													<h2 class="fontVariation">
														<?php echo esc_html( $inner_cont['inner_heading12'] ); ?>
													</h2>
												<?php endif; if ( !empty( $inner_cont['inner_desc12'] ) ) : ?>
													<div class="content-inner-desc">
														<?php echo wp_kses_post( $inner_cont['inner_desc12'] ); ?>
													</div>
												<?php endif; ?>
												<div class="content-inner-grid grid">
													<div class="content-inner-grid-single">
														<?php if ( !empty( $inner_cont['inner_img12'] ) ) : ?>
															<img src="<?php echo esc_url(wp_get_attachment_image_url( $inner_cont['inner_img12']['id'], 'thumbnail' )); ?>" alt="">
														<?php endif; if ( !empty( $inner_cont['inner_img1_heading12'] ) ) : ?>
															<div class="content-inner-grid-title">
																<?php echo esc_html( $inner_cont['inner_img1_heading12'] ); ?>
																<?php if ( !empty( $inner_cont['inner_img1_heading12_small'] ) ) : ?>
																	<sub><?php echo esc_html( $inner_cont['inner_img1_heading12_small'] ); ?></sub>
																<?php endif; ?>
															</div>
														<?php endif; if ( !empty( $inner_cont['inner_img1_desc12'] ) ) : ?>
															<div class="content-inner-grid-desc">
																<?php echo esc_html( $inner_cont['inner_img1_desc12'] ); ?>
															</div>
														<?php endif; ?>
													</div>
													<div class="content-inner-grid-single">
														<?php if ( !empty( $inner_cont['inner_img22'] ) ) : ?>
															<img src="<?php echo esc_url(wp_get_attachment_image_url( $inner_cont['inner_img22']['id'], 'thumbnail' )); ?>" alt="">
														<?php endif; if ( !empty( $inner_cont['inner_img2_heading12'] ) ) : ?>
															<div class="content-inner-grid-title">
																<?php echo esc_html( $inner_cont['inner_img2_heading12'] ); ?>

																<?php if ( !empty( $inner_cont['inner_img2_heading12_small'] ) ) : ?>
																	<sub><?php echo esc_html( $inner_cont['inner_img2_heading12_small'] ); ?></sub>
																<?php endif; ?>
															</div>
														<?php endif; if ( !empty( $inner_cont['inner_img2_desc12'] ) ) : ?>
															<div class="content-inner-grid-desc">
																<?php echo esc_html( $inner_cont['inner_img2_desc12'] ); ?>
															</div>
														<?php endif; ?>
													</div>
													<div class="content-inner-grid-single">
														<?php if ( !empty( $inner_cont['inner_img32'] ) ) : ?>
															<img src="<?php echo esc_url(wp_get_attachment_image_url( $inner_cont['inner_img32']['id'], 'thumbnail' )); ?>" alt="">
														<?php endif; if ( !empty( $inner_cont['inner_img3_heading12'] ) ) : ?>
															<div class="content-inner-grid-title">
																<?php echo esc_html( $inner_cont['inner_img3_heading12'] ); ?>

																<?php if ( !empty( $inner_cont['inner_img3_heading12_small'] ) ) : ?>
																	<sub><?php echo esc_html( $inner_cont['inner_img3_heading12_small'] ); ?></sub>
																<?php endif; ?>
															</div>
														<?php endif; if ( !empty( $inner_cont['inner_img3_desc12'] ) ) : ?>
															<div class="content-inner-grid-desc">
																<?php echo esc_html( $inner_cont['inner_img3_desc12'] ); ?>
															</div>
														<?php endif; ?>
													</div>
													<div class="content-inner-grid-single">
														<?php if ( !empty( $inner_cont['inner_img42'] ) ) : ?>
															<img src="<?php echo esc_url(wp_get_attachment_image_url( $inner_cont['inner_img42']['id'], 'thumbnail' )); ?>" alt="">
														<?php endif; if ( !empty( $inner_cont['inner_img4_heading12'] ) ) : ?>
															<div class="content-inner-grid-title">
																<?php echo esc_html( $inner_cont['inner_img4_heading12'] ); ?>

																<?php if ( !empty( $inner_cont['inner_img4_heading12_small'] ) ) : ?>
																	<sub><?php echo esc_html( $inner_cont['inner_img4_heading12_small'] ); ?></sub>
																<?php endif; ?>
															</div>
														<?php endif; if ( !empty( $inner_cont['inner_img4_desc12'] ) ) : ?>
															<div class="content-inner-grid-desc">
																<?php echo esc_html( $inner_cont['inner_img4_desc12'] ); ?>
															</div>
														<?php endif; ?>
													</div>
												</div>
												<?php if ( !empty( $inner_cont['btn_label12'] ) ) : 
													$target = $inner_cont['btn_link12']['is_external'] ? ' target="_blank"' : '';
													$nofollow = $inner_cont['btn_link12']['nofollow'] ? ' rel="nofollow"' : '';
												?>
													<div class="content-inner-bottom flex align-center f-gap-20">
														<a href="<?php echo esc_url( $inner_cont['btn_link12']['url'] ); ?>" class="theme-btn filled-btn clrOrange-bg clrWhite" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?>>
															<?php echo esc_html( $inner_cont['btn_label12'] ); ?>
														</a>
														<?php if ( !empty( $inner_cont['inner_bottom_desc12'] ) ) : ?>
															<div class="content-inner-bottom-desc">
																<?php echo wp_kses_post( $inner_cont['inner_bottom_desc12'] ); ?>
															</div>
														<?php endif; ?>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php endforeach; endif; ?>
							</div>
						</div> <!-- tabbed-inner -->
                        
                    </div>
                <?php endif; ?>
    		</div>	
		<?php
	}

}
