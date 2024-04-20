<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
/**
 * Elementor widget for hero slider.
 *
 * @since 1.0.0
 */
class SocialLinks extends Widget_Base
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
		return 'social-links';
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
		return esc_html__('Social link style 2', 'msitheme');
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
		return 'eicon-social-icons';
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
				'label' => __('Social link', 'msitheme'),
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'social',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'Select social icon', 'msitheme' ),
				'default' => 'fa-facebook-f',
				'options' => [
					'fa-facebook-f' => esc_html__( 'Facebook', 'msitheme' ),
					'fa-linkedin-in' => esc_html__( 'Linkedin', 'msitheme' ),
					'fa-instagram' => esc_html__( 'Instagram', 'msitheme' ),
					'fa-x-twitter' => esc_html__( 'Twitter', 'msitheme' ),
					'fa-tiktok' => esc_html__( 'Tiktok', 'msitheme' ),
					'fa-youtube' => esc_html__( 'fa-youtube', 'msitheme' ),
					'fa-pinterest-p' => esc_html__( 'Pinterest', 'msitheme' ),
					'fa-github' => esc_html__( 'Github', 'msitheme' ),
					'fa-telegram' => esc_html__( 'Telegram', 'msitheme' ),
					'fa-whatsapp' => esc_html__( 'Whatsapp', 'msitheme' ),
					'fa-dribbble' => esc_html__( 'Dribbble', 'msitheme' ),
					'fa-behance' => esc_html__( 'Behance', 'msitheme' ),
					'fa-snapchat' => esc_html__( 'Snapchat', 'msitheme' ),
					'fa-skype' => esc_html__( 'Skype', 'msitheme' ),
				],
			]
		);
        $repeater->add_control(
			'link',
			[
				'label' => __('Insert Social link', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

        $this->add_control(
			'socials',
			[
				'label' => esc_html__( 'Socials', 'msitheme' ),
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
				'name' => 'social_typography',
				'label' => __( 'Typography', 'msitheme' ),
				'selector' => '{{WRAPPER}} .social-icon',
			]
		);
        $this->add_control(
			'social_color',
			[
				'label' => __( 'Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#070028',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .social-icon' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'social_hover_color',
			[
				'label' => __( 'Hover Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#AF1A15',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .social-icon:hover' => 'color: {{VALUE}}',
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
        if ( !empty($settings['socials']) ) :

		?>
			<div class="footer-socials social-icons flex align-center">
                <?php foreach ( $settings['socials'] as $socail ) : if ( !empty( $socail['link']) ) : ?>
                    <a target="_blank" href="<?php echo esc_url( $socail['link'] ); ?>" class="facebook">
                        <i class="fa-brands <?php echo esc_attr( $socail['social'] ); ?>"></i>
                    </a>
                <?php endif; endforeach; ?>
            </div>
		<?php

        endif;
	}

}
