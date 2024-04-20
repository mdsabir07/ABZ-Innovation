<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class Documents extends Widget_Base {

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
		return 'documents';
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
		return __( 'Documents upload', 'msitheme' );
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
		return 'eicon-document-file';
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

        $this->add_control(
			'document_title1',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'docs_desc1',
			[
				'label' => __( 'Document text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater->add_control(
			'file_type1',
			[
				'label' => __( 'Select file type', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'	=> __( 'PDF', 'msitheme' ), 
					'2'	=> __( 'Others', 'msitheme' ), 
				]
			]
		);

        $repeater->add_control(
			'pdf1',
			[
				'label' => esc_html__( 'Choose PDF', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/pdf' ],
                'condition'	=> [
					'file_type1'	=> '1',
				],
			]
		);

        $repeater->add_control(
			'others1',
			[
				'label' => esc_html__( 'Insert your file link', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
                'label_block'	=> true,
                'condition'	=> [
					'file_type1'	=> '2',
				],
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


        // Tab 1 content
		$this->start_controls_section(
			'section_content2',
			[
				'label' => __( 'Tab 2 content', 'msitheme' ),
			]
		);

        $this->add_control(
			'document_title2',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'docs_desc2',
			[
				'label' => __( 'Document text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater->add_control(
			'file_type2',
			[
				'label' => __( 'Select file type', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'	=> __( 'PDF', 'msitheme' ), 
					'2'	=> __( 'Others', 'msitheme' ), 
				]
			]
		);

        $repeater->add_control(
			'pdf2',
			[
				'label' => esc_html__( 'Choose PDF', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/pdf' ],
                'condition'	=> [
					'file_type2'	=> '1',
				],
			]
		);

        $repeater->add_control(
			'others2',
			[
				'label' => esc_html__( 'Insert your file link', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
                'label_block'	=> true,
                'condition'	=> [
					'file_type2'	=> '2',
				],
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
			'document_title3',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'docs_desc3',
			[
				'label' => __( 'Document text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater->add_control(
			'file_type3',
			[
				'label' => __( 'Select file type', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'	=> __( 'PDF', 'msitheme' ), 
					'2'	=> __( 'Others', 'msitheme' ), 
				]
			]
		);

        $repeater->add_control(
			'pdf3',
			[
				'label' => esc_html__( 'Choose PDF', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/pdf' ],
                'condition'	=> [
					'file_type3'	=> '1',
				],
			]
		);

        $repeater->add_control(
			'others3',
			[
				'label' => esc_html__( 'Insert your file link', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
                'label_block'	=> true,
                'condition'	=> [
					'file_type3'	=> '2',
				],
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
			'document_title4',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'docs_desc4',
			[
				'label' => __( 'Document text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater->add_control(
			'file_type4',
			[
				'label' => __( 'Select file type', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'	=> __( 'PDF', 'msitheme' ), 
					'2'	=> __( 'Others', 'msitheme' ), 
				]
			]
		);

        $repeater->add_control(
			'pdf4',
			[
				'label' => esc_html__( 'Choose PDF', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/pdf' ],
                'condition'	=> [
					'file_type4'	=> '1',
				],
			]
		);

        $repeater->add_control(
			'others4',
			[
				'label' => esc_html__( 'Insert your file link', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
                'label_block'	=> true,
                'condition'	=> [
					'file_type4'	=> '2',
				],
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
			'document_title5',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'docs_desc5',
			[
				'label' => __( 'Document text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater->add_control(
			'file_type5',
			[
				'label' => __( 'Select file type', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'	=> __( 'PDF', 'msitheme' ), 
					'2'	=> __( 'Others', 'msitheme' ), 
				]
			]
		);

        $repeater->add_control(
			'pdf5',
			[
				'label' => esc_html__( 'Choose PDF', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/pdf' ],
                'condition'	=> [
					'file_type5'	=> '1',
				],
			]
		);

        $repeater->add_control(
			'others5',
			[
				'label' => esc_html__( 'Insert your file link', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
                'label_block'	=> true,
                'condition'	=> [
					'file_type5'	=> '2',
				],
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
			'document_title6',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'docs_desc6',
			[
				'label' => __( 'Document text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater->add_control(
			'file_type6',
			[
				'label' => __( 'Select file type', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'	=> __( 'PDF', 'msitheme' ), 
					'2'	=> __( 'Others', 'msitheme' ), 
				]
			]
		);

        $repeater->add_control(
			'pdf6',
			[
				'label' => esc_html__( 'Choose PDF', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/pdf' ],
                'condition'	=> [
					'file_type6'	=> '1',
				],
			]
		);

        $repeater->add_control(
			'others6',
			[
				'label' => esc_html__( 'Insert your file link', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
                'label_block'	=> true,
                'condition'	=> [
					'file_type6'	=> '2',
				],
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
			'document_title7',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'docs_desc7',
			[
				'label' => __( 'Document text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater->add_control(
			'file_type7',
			[
				'label' => __( 'Select file type', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'	=> __( 'PDF', 'msitheme' ), 
					'2'	=> __( 'Others', 'msitheme' ), 
				]
			]
		);

        $repeater->add_control(
			'pdf7',
			[
				'label' => esc_html__( 'Choose PDF', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/pdf' ],
                'condition'	=> [
					'file_type7'	=> '1',
				],
			]
		);

        $repeater->add_control(
			'others7',
			[
				'label' => esc_html__( 'Insert your file link', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
                'label_block'	=> true,
                'condition'	=> [
					'file_type7'	=> '2',
				],
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
			'document_title8',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'docs_desc8',
			[
				'label' => __( 'Document text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater->add_control(
			'file_type8',
			[
				'label' => __( 'Select file type', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'	=> __( 'PDF', 'msitheme' ), 
					'2'	=> __( 'Others', 'msitheme' ), 
				]
			]
		);

        $repeater->add_control(
			'pdf8',
			[
				'label' => esc_html__( 'Choose PDF', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/pdf' ],
                'condition'	=> [
					'file_type8'	=> '1',
				],
			]
		);

        $repeater->add_control(
			'others8',
			[
				'label' => esc_html__( 'Insert your file link', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
                'label_block'	=> true,
                'condition'	=> [
					'file_type8'	=> '2',
				],
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
			'document_title9',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'docs_desc9',
			[
				'label' => __( 'Document text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater->add_control(
			'file_type9',
			[
				'label' => __( 'Select file type', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'	=> __( 'PDF', 'msitheme' ), 
					'2'	=> __( 'Others', 'msitheme' ), 
				]
			]
		);

        $repeater->add_control(
			'pdf9',
			[
				'label' => esc_html__( 'Choose PDF', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/pdf' ],
                'condition'	=> [
					'file_type9'	=> '1',
				],
			]
		);

        $repeater->add_control(
			'others9',
			[
				'label' => esc_html__( 'Insert your file link', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
                'label_block'	=> true,
                'condition'	=> [
					'file_type9'	=> '2',
				],
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
			'document_title10',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'docs_desc10',
			[
				'label' => __( 'Document text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater->add_control(
			'file_type10',
			[
				'label' => __( 'Select file type', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'	=> __( 'PDF', 'msitheme' ), 
					'2'	=> __( 'Others', 'msitheme' ), 
				]
			]
		);

        $repeater->add_control(
			'pdf10',
			[
				'label' => esc_html__( 'Choose PDF', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/pdf' ],
                'condition'	=> [
					'file_type10'	=> '1',
				],
			]
		);

        $repeater->add_control(
			'others10',
			[
				'label' => esc_html__( 'Insert your file link', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
                'label_block'	=> true,
                'condition'	=> [
					'file_type10'	=> '2',
				],
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
				'name' => 'heading_typography',
				'label' => __( 'Typography for heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .document-tab-content h4',
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
					'{{WRAPPER}} .document-tab-content h4' => 'color: {{VALUE}}',
				],
			]
		);

        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography for document text', 'msitheme' ),
				'selector' => '{{WRAPPER}} .doc-desc',
			]
		);

        $this->add_control(
			'desc_color',
			[
				'label' => __( 'Document text Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .doc-desc' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .document-content a i' => 'color: {{VALUE}}',
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
        <div class="document-tabbed">
            <div class="container-default">
                <input type="radio" id="document-tab1" name="css-tabs2" checked>
                <input type="radio" id="document-tab2" name="css-tabs2">
                <input type="radio" id="document-tab3" name="css-tabs2">
                <input type="radio" id="document-tab4" name="css-tabs2">
                <input type="radio" id="document-tab5" name="css-tabs2">
                <input type="radio" id="document-tab6" name="css-tabs2">
                <input type="radio" id="document-tab7" name="css-tabs2">
                <input type="radio" id="document-tab8" name="css-tabs2">
                <input type="radio" id="document-tab9" name="css-tabs2">
                <input type="radio" id="document-tab10" name="css-tabs2">
                
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
                
				<?php if ( !empty( $settings['content_box1'] ) ) : ?>
                	<div class="document-tab-content">
                        <?php if ( !empty( $settings['document_title1'] ) ) : ?>
                            <h4>
                                <?php echo wp_kses_post( $settings['document_title1'] ); ?>
                            </h4>
                        <?php endif; 
                        foreach ( $settings['content_box1'] as $box ) : 

                            // $pdf_url = $box['pdf']['url'];
                            // if ( ! empty( $pdf_url ) ) {
                            //     return;
                            // }
                        ?>
                            <div class="document-content flex align-center justify-between">
                                <div class="doc-desc">
                                    <?php echo esc_html( $box['docs_desc1'] ); ?>
                                </div>
                                <?php if($box['file_type1'] === '2') : if ( !empty( $box['others1'] ) ) : ?>
                                    <a download href="<?php echo esc_url( $box['others1'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; if($box['file_type1'] === '1') : if ( !empty( $box['pdf1'] ) ) : ?>
                                    <a download href="<?php echo esc_attr( $box['pdf1']['url'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; ?>
                            </div>
                        <?php endforeach; ?>
					</div>
                <?php endif; ?>
                
				<?php if ( !empty( $settings['content_box2'] ) ) : ?>
                	<div class="document-tab-content">
                        <?php if ( !empty( $settings['document_title2'] ) ) : ?>
                            <h4>
                                <?php echo wp_kses_post( $settings['document_title2'] ); ?>
                            </h4>
                        <?php endif; 
                        foreach ( $settings['content_box2'] as $box ) : 

                            // $pdf_url = $box['pdf']['url'];
                            // if ( ! empty( $pdf_url ) ) {
                            //     return;
                            // }
                        ?>
                            <div class="document-content flex align-center justify-between">
                                <div class="doc-desc">
                                    <?php echo esc_html( $box['docs_desc2'] ); ?>
                                </div>
                                <?php if($box['file_type2'] === '2') : if ( !empty( $box['others2'] ) ) : ?>
                                    <a download href="<?php echo esc_url( $box['others2'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; if($box['file_type2'] === '1') : if ( !empty( $box['pdf2'] ) ) : ?>
                                    <a download href="<?php echo esc_attr( $box['pdf2']['url'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; ?>
                            </div>
                        <?php endforeach; ?>
					</div>
                <?php endif; ?>
                
				<?php if ( !empty( $settings['content_box3'] ) ) : ?>
                	<div class="document-tab-content">
                        <?php if ( !empty( $settings['document_title3'] ) ) : ?>
                            <h4>
                                <?php echo wp_kses_post( $settings['document_title3'] ); ?>
                            </h4>
                        <?php endif; 
                        foreach ( $settings['content_box3'] as $box ) : 

                            // $pdf_url = $box['pdf']['url'];
                            // if ( ! empty( $pdf_url ) ) {
                            //     return;
                            // }
                        ?>
                            <div class="document-content flex align-center justify-between">
                                <div class="doc-desc">
                                    <?php echo esc_html( $box['docs_desc3'] ); ?>
                                </div>
                                <?php if($box['file_type3'] === '2') : if ( !empty( $box['others3'] ) ) : ?>
                                    <a download href="<?php echo esc_url( $box['others3'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; if($box['file_type3'] === '1') : if ( !empty( $box['pdf3'] ) ) : ?>
                                    <a download href="<?php echo esc_attr( $box['pdf3']['url'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; ?>
                            </div>
                        <?php endforeach; ?>
					</div>
                <?php endif; ?>
                
				<?php if ( !empty( $settings['content_box4'] ) ) : ?>
                	<div class="document-tab-content">
                        <?php if ( !empty( $settings['document_title4'] ) ) : ?>
                            <h4>
                                <?php echo wp_kses_post( $settings['document_title4'] ); ?>
                            </h4>
                        <?php endif; 
                        foreach ( $settings['content_box4'] as $box ) : 

                            // $pdf_url = $box['pdf']['url'];
                            // if ( ! empty( $pdf_url ) ) {
                            //     return;
                            // }
                        ?>
                            <div class="document-content flex align-center justify-between">
                                <div class="doc-desc">
                                    <?php echo esc_html( $box['docs_desc4'] ); ?>
                                </div>
                                <?php if($box['file_type4'] === '2') : if ( !empty( $box['others4'] ) ) : ?>
                                    <a download href="<?php echo esc_url( $box['others4'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; if($box['file_type4'] === '1') : if ( !empty( $box['pdf4'] ) ) : ?>
                                    <a download href="<?php echo esc_attr( $box['pdf4']['url'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; ?>
                            </div>
                        <?php endforeach; ?>
					</div>
                <?php endif; ?>
                
				<?php if ( !empty( $settings['content_box5'] ) ) : ?>
                	<div class="document-tab-content">
                        <?php if ( !empty( $settings['document_title5'] ) ) : ?>
                            <h4>
                                <?php echo wp_kses_post( $settings['document_title5'] ); ?>
                            </h4>
                        <?php endif; 
                        foreach ( $settings['content_box5'] as $box ) : 

                            // $pdf_url = $box['pdf']['url'];
                            // if ( ! empty( $pdf_url ) ) {
                            //     return;
                            // }
                        ?>
                            <div class="document-content flex align-center justify-between">
                                <div class="doc-desc">
                                    <?php echo esc_html( $box['docs_desc5'] ); ?>
                                </div>
                                <?php if($box['file_type5'] === '2') : if ( !empty( $box['others5'] ) ) : ?>
                                    <a download href="<?php echo esc_url( $box['others5'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; if($box['file_type5'] === '1') : if ( !empty( $box['pdf5'] ) ) : ?>
                                    <a download href="<?php echo esc_attr( $box['pdf5']['url'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; ?>
                            </div>
                        <?php endforeach; ?>
					</div>
                <?php endif; ?>
                
				<?php if ( !empty( $settings['content_box6'] ) ) : ?>
                	<div class="document-tab-content">
                        <?php if ( !empty( $settings['document_title6'] ) ) : ?>
                            <h4>
                                <?php echo wp_kses_post( $settings['document_title6'] ); ?>
                            </h4>
                        <?php endif; 
                        foreach ( $settings['content_box6'] as $box ) : 

                            // $pdf_url = $box['pdf']['url'];
                            // if ( ! empty( $pdf_url ) ) {
                            //     return;
                            // }
                        ?>
                            <div class="document-content flex align-center justify-between">
                                <div class="doc-desc">
                                    <?php echo esc_html( $box['docs_desc6'] ); ?>
                                </div>
                                <?php if($box['file_type6'] === '2') : if ( !empty( $box['others6'] ) ) : ?>
                                    <a download href="<?php echo esc_url( $box['others6'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; if($box['file_type6'] === '1') : if ( !empty( $box['pdf6'] ) ) : ?>
                                    <a download href="<?php echo esc_attr( $box['pdf6']['url'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; ?>
                            </div>
                        <?php endforeach; ?>
					</div>
                <?php endif; ?>
                
				<?php if ( !empty( $settings['content_box7'] ) ) : ?>
                	<div class="document-tab-content">
                        <?php if ( !empty( $settings['document_title7'] ) ) : ?>
                            <h4>
                                <?php echo wp_kses_post( $settings['document_title7'] ); ?>
                            </h4>
                        <?php endif; 
                        foreach ( $settings['content_box7'] as $box ) : 

                            // $pdf_url = $box['pdf']['url'];
                            // if ( ! empty( $pdf_url ) ) {
                            //     return;
                            // }
                        ?>
                            <div class="document-content flex align-center justify-between">
                                <div class="doc-desc">
                                    <?php echo esc_html( $box['docs_desc7'] ); ?>
                                </div>
                                <?php if($box['file_type7'] === '2') : if ( !empty( $box['others7'] ) ) : ?>
                                    <a download href="<?php echo esc_url( $box['others7'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; if($box['file_type7'] === '1') : if ( !empty( $box['pdf7'] ) ) : ?>
                                    <a download href="<?php echo esc_attr( $box['pdf7']['url'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; ?>
                            </div>
                        <?php endforeach; ?>
					</div>
                <?php endif; ?>
                
				<?php if ( !empty( $settings['content_box8'] ) ) : ?>
                	<div class="document-tab-content">
                        <?php if ( !empty( $settings['document_title8'] ) ) : ?>
                            <h4>
                                <?php echo wp_kses_post( $settings['document_title8'] ); ?>
                            </h4>
                        <?php endif; 
                        foreach ( $settings['content_box8'] as $box ) : 

                            // $pdf_url = $box['pdf']['url'];
                            // if ( ! empty( $pdf_url ) ) {
                            //     return;
                            // }
                        ?>
                            <div class="document-content flex align-center justify-between">
                                <div class="doc-desc">
                                    <?php echo esc_html( $box['docs_desc8'] ); ?>
                                </div>
                                <?php if($box['file_type8'] === '2') : if ( !empty( $box['others8'] ) ) : ?>
                                    <a download href="<?php echo esc_url( $box['others8'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; if($box['file_type8'] === '1') : if ( !empty( $box['pdf8'] ) ) : ?>
                                    <a download href="<?php echo esc_attr( $box['pdf8']['url'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; ?>
                            </div>
                        <?php endforeach; ?>
					</div>
                <?php endif; ?>
                
				<?php if ( !empty( $settings['content_box9'] ) ) : ?>
                	<div class="document-tab-content">
                        <?php if ( !empty( $settings['document_title9'] ) ) : ?>
                            <h4>
                                <?php echo wp_kses_post( $settings['document_title9'] ); ?>
                            </h4>
                        <?php endif; 
                        foreach ( $settings['content_box9'] as $box ) : 

                            // $pdf_url = $box['pdf']['url'];
                            // if ( ! empty( $pdf_url ) ) {
                            //     return;
                            // }
                        ?>
                            <div class="document-content flex align-center justify-between">
                                <div class="doc-desc">
                                    <?php echo esc_html( $box['docs_desc9'] ); ?>
                                </div>
                                <?php if($box['file_type9'] === '2') : if ( !empty( $box['others9'] ) ) : ?>
                                    <a download href="<?php echo esc_url( $box['others9'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; if($box['file_type9'] === '1') : if ( !empty( $box['pdf9'] ) ) : ?>
                                    <a download href="<?php echo esc_attr( $box['pdf9']['url'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; ?>
                            </div>
                        <?php endforeach; ?>
					</div>
                <?php endif; ?>
                
				<?php if ( !empty( $settings['content_box10'] ) ) : ?>
                	<div class="document-tab-content">
                        <?php if ( !empty( $settings['document_title10'] ) ) : ?>
                            <h4>
                                <?php echo wp_kses_post( $settings['document_title10'] ); ?>
                            </h4>
                        <?php endif; 
                        foreach ( $settings['content_box10'] as $box ) : 

                            // $pdf_url = $box['pdf']['url'];
                            // if ( ! empty( $pdf_url ) ) {
                            //     return;
                            // }
                        ?>
                            <div class="document-content flex align-center justify-between">
                                <div class="doc-desc">
                                    <?php echo esc_html( $box['docs_desc10'] ); ?>
                                </div>
                                <?php if($box['file_type10'] === '2') : if ( !empty( $box['others10'] ) ) : ?>
                                    <a download href="<?php echo esc_url( $box['others10'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; if($box['file_type10'] === '1') : if ( !empty( $box['pdf10'] ) ) : ?>
                                    <a download href="<?php echo esc_attr( $box['pdf10']['url'] ); ?>">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                <?php endif; endif; ?>
                            </div>
                        <?php endforeach; ?>
					</div>
                <?php endif; ?>
            </div>
        </div>
            		
		<?php
	}

}
