<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class SimpleDocs extends Widget_Base {

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
		return 'simple-docs';
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
		return __( 'Simple documents', 'msitheme' );
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
			'section_content',
			[
				'label' => __( 'Docs', 'msitheme' ),
			]
		);

        $this->add_control(
			'document_title',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'docs_desc',
			[
				'label' => __( 'Document text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater->add_control(
			'file_type',
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
			'pdf',
			[
				'label' => esc_html__( 'Choose PDF', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types' => [ 'application/pdf' ],
                'condition'	=> [
					'file_type'	=> '1',
				],
			]
		);

        $repeater->add_control(
			'others',
			[
				'label' => esc_html__( 'Insert your file link', 'msitheme' ),
				'type'	=> Controls_Manager::TEXTAREA,
                'label_block'	=> true,
                'condition'	=> [
					'file_type'	=> '2',
				],
			]
		);

        $this->add_control(
			'content_box',
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
				'name' => 'heading_typography',
				'label' => __( 'Typography for heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .document-simple-content h4',
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
					'{{WRAPPER}} .document-simple-content h4' => 'color: {{VALUE}}',
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
        <div class="document-simple">
            <?php if ( !empty( $settings['content_box'] ) ) : ?>
                <div class="document-simple-content">
                    <?php if ( !empty( $settings['document_title'] ) ) : ?>
                        <h4>
                            <?php echo wp_kses_post( $settings['document_title'] ); ?>
                        </h4>
                    <?php endif; 
                    foreach ( $settings['content_box'] as $box ) : 
                    ?>
                        <div class="document-content flex align-center justify-between">
                            <div class="doc-desc">
                                <?php echo esc_html( $box['docs_desc'] ); ?>
                            </div>
                            <?php if($box['file_type'] === '2') : if ( !empty( $box['others'] ) ) : ?>
                                <a download href="<?php echo esc_url( $box['others'] ); ?>">
                                    <i class="fa-solid fa-download"></i>
                                </a>
                            <?php endif; endif; if($box['file_type'] === '1') : if ( !empty( $box['pdf'] ) ) : ?>
                                <a download href="<?php echo esc_attr( $box['pdf']['url'] ); ?>">
                                    <i class="fa-solid fa-download"></i>
                                </a>
                            <?php endif; endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
            		
		<?php
	}

}
