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
class SocialShare extends Widget_Base
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
		return 'social-share';
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
		return esc_html__('Social link style 1', 'msitheme');
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

		$this->add_control(
			'facebook',
			[
				'label' => __('Facebook link', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'facebook_label',
			[
				'label' => __('Facebook label', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'insta',
			[
				'label' => __('Instagram link', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'insta_label',
			[
				'label' => __('Instagram label', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'linked',
			[
				'label' => __('Linkedin link', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'linked_label',
			[
				'label' => __('Linkedin label', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'tiktok',
			[
				'label' => __('Tiktok link', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'tiktok_label',
			[
				'label' => __('Tiktok label', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'youtube',
			[
				'label' => __('YouTube link', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'youtube_label',
			[
				'label' => __('YouTube label', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'twitter',
			[
				'label' => __('Twitter link', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'twitter_label',
			[
				'label' => __('Twitter label', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'pinterest',
			[
				'label' => __('Pinterest link', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'pinterest_label',
			[
				'label' => __('Pinterest label', 'msitheme'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'show_icon',
			[
				'label' => __( 'Show icon', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'no',
				'options' => [
					'yes'	=> __( 'Yes', 'msitheme' ), 
					'no'	=> __( 'No', 'msitheme' ), 
				],
			]
		);
		$this->add_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => esc_html__( 'Left', 'msitheme' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'msitheme' ),
						'icon' => 'eicon-text-align-center',
					],
					'end' => [
						'title' => esc_html__( 'Right', 'msitheme' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'end',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .social-links' => 'justify-content: {{VALUE}};',
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
		?>
			<div class="social-links">
				<?php if ( !empty($settings['facebook']) ) : ?>
					<a href="<?php echo esc_url($settings['facebook']); ?>" class="social-icon">
						<?php if ( !empty($settings['facebook_label']) ) : ?>
							<?php echo esc_html( $settings['facebook_label'] ); ?>
						<?php endif; if ( $settings['show_icon'] === 'yes') : ?>
							<i class="fab fa-facebook-f"></i>
						<?php endif; ?>
					</a>
				<?php endif; if ( !empty($settings['insta']) ) : ?>
					<a href="<?php echo esc_url($settings['insta']); ?>" class="social-icon">
						<?php if ( !empty($settings['insta_label']) ) : ?>
							<?php echo esc_html( $settings['insta_label'] ); ?>
						<?php endif; if ( $settings['show_icon'] === 'yes') : ?>
							<i class="fab fa-instagram"></i>
						<?php endif; ?>
					</a>
				<?php endif; if ( !empty($settings['linked']) ) : ?>
					<a href="<?php echo esc_url($settings['linked']); ?>" class="social-icon">
						<?php if ( !empty($settings['linked_label']) ) : ?>
							<?php echo esc_html( $settings['linked_label'] ); ?>
						<?php endif; if ( $settings['show_icon'] === 'yes') : ?>
							<i class="fab fa-linkedin-in"></i>
						<?php endif; ?>
					</a>
				<?php endif; if ( !empty($settings['tiktok']) ) : ?>
					<a href="<?php echo esc_url($settings['tiktok']); ?>" class="social-icon">
						<?php if ( !empty($settings['tiktok_label']) ) : ?>
							<?php echo esc_html( $settings['tiktok_label'] ); ?>
						<?php endif; if ( $settings['show_icon'] === 'yes') : ?>
							<i class="fa-brands fa-tiktok"></i>
						<?php endif; ?>
					</a>
				<?php endif; if ( !empty($settings['youtube']) ) : ?>
					<a href="<?php echo esc_url($settings['youtube']); ?>" class="social-icon">
						<?php if ( !empty($settings['youtube_label']) ) : ?>
							<?php echo esc_html( $settings['youtube_label'] ); ?>
						<?php endif; if ( $settings['show_icon'] === 'yes') : ?>
							<i class="fa-brands fa-youtube"></i>
						<?php endif; ?>
					</a>
				<?php endif; if ( !empty($settings['twitter']) ) : ?>
					<a href="<?php echo esc_url($settings['twitter']); ?>" class="social-icon">
						<?php if ( !empty($settings['twitter_label']) ) : ?>
							<?php echo esc_html( $settings['twitter_label'] ); ?>
						<?php endif; if ( $settings['show_icon'] === 'yes') : ?>
							<i class="fa-brands fa-x-twitter"></i>
						<?php endif; ?>
					</a>
				<?php endif; if ( !empty($settings['pinterest']) ) : ?>
					<a href="<?php echo esc_url($settings['pinterest']); ?>" class="social-icon">
						<?php if ( !empty($settings['pinterest_label']) ) : ?>
							<?php echo esc_html( $settings['pinterest_label'] ); ?>
						<?php endif; if ( $settings['show_icon'] === 'yes') : ?>
							<i class="fa-brands fa-pinterest"></i>
						<?php endif; ?>
					</a>
				<?php endif; ?>
			</div>
		<?php
	}

}
