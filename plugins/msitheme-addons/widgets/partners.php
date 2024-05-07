<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
/**
 * Elementor widget for Partners.
 *
 * @since 1.0.0
 */
class Partners extends Widget_Base
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
		return 'partners';
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
		return esc_html__('Partners', 'msitheme');
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
		return 'eicon-media-carousel';
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
				'label' => __('Partners content', 'msitheme'),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'msitheme' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .partners-wrapper',
			]
		);
		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Images', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => false,
				'default' => [],
			]
		);

		$this->add_control(
			'sliding_alignment',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'Sliding alignment', 'msitheme' ),
				'default' => '1',
				'options' => [
					'left' => esc_html__( 'Left to right', 'msitheme' ),
					'right' => esc_html__( 'Right to left', 'msitheme' ),
					'down' => esc_html__( 'Up to bottom', 'msitheme' ),
					'up' => esc_html__( 'Bottom to up', 'msitheme' ),
				],
			]
		);

        $this->add_control(
			'gap',
			[
				'label' => __( 'Gap between logos', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '20px',
				'show_label' => true,
			]
		);

        $this->add_control(
			'delay',
			[
				'label' => __( 'Delay time', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '5',
				'show_label' => true,
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
        if ( !empty($settings['gallery']) ) { ?>
            <!-- start of image gallery -->
			<div class="partners-wrapper">
				<marquee behavior='scroll' direction='<?php echo esc_attr( $settings['sliding_alignment'] ); ?>' scrollamount='<?php echo esc_attr( $settings['delay'] ); ?>' onmouseover='this.stop()' onmouseout='this.start()'>
					<div class="partners-logos flex align-center" style="gap:<?php echo esc_attr( $settings['gap'] ); ?>">
						<?php $i = 0; foreach( $settings['gallery'] as $image ) : $i++; ?>
							<img class="gallery-img<?php echo esc_attr( $i ); ?>" src="<?php echo esc_attr( $image['url'] ); ?>">
						<?php endforeach; ?>
					</div>
				</marquee>
            </div>
    <?php } } 
    protected function content_template() { 
        ?>
            <# _.each( settings.gallery, function( image ) { #>
                <img src="{{ image.url }}">
            <# }); #>
        <?php
    }

}
