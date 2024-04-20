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
class ContentList extends Widget_Base
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
		return 'content-list';
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
		return esc_html__('Content List', 'msitheme');
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
		return 'eicon-table-of-contents';
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
				'label' => __('Content', 'msitheme'),
			]
		);

        $this->add_control(
			'title_top',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'left_txt',
			[
				'label' => __( 'List left text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
		$repeater->add_control(
			'right_txt',
			[
				'label' => __( 'List right text', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $this->add_control(
			'lists',
			[
				'label' => esc_html__( 'List box', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
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
				'name' => 'top_heading_typography',
				'label' => __( 'Typography for heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .list-heading',
			]
		);
        $this->add_control(
			'top_heading_color',
			[
				'label' => __( 'Heading Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#070028',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .list-heading' => 'color: {{VALUE}}',
				],
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'list_left_typography',
				'label' => __( 'Typography for list left', 'msitheme' ),
				'selector' => '{{WRAPPER}} .list-block span',
			]
		);
        $this->add_control(
			'list_left_color',
			[
				'label' => __( 'List left Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#070028',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .list-block span' => 'color: {{VALUE}}',
				],
			]
		);

        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'list_b_typography',
				'label' => __( 'Typography for right text', 'msitheme' ),
				'selector' => '{{WRAPPER}} .list-block b',
			]
		);

        $this->add_control(
			'list_b_color',
			[
				'label' => __( 'Right text Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#070028',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .list-block b' => 'color: {{VALUE}}',
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
            if ( !empty( $settings['lists'] ) ) :
        ?>

            <!-- start of list block -->
            <div class="msitheme-list-block">
                <?php if ( !empty( $settings['title_top'] ) ) : ?>
                    <h6 class="list-heading">
                        <?php echo esc_html( $settings['title_top'] ); ?>
                    </h6>
                <?php endif; foreach ( $settings['lists']  as $list ) : ?>
                    <div class="list-block flex justify-between align-center f-gap-20">
                        <?php if ( !empty( $list['left_txt'] ) ) : ?>
                            <span>
                                <?php echo esc_html( $list['left_txt'] ); ?>
                            </span>
                        <?php endif; if ( !empty( $list['right_txt'] ) ) : ?>
                            <b>
                                <?php echo esc_html( $list['right_txt'] ); ?>
                            </b>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
    	<?php
        endif;
    } 
}
