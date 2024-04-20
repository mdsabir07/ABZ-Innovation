<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
/**
 * Elementor widget for Safety.
 *
 * @since 1.0.0
 */
class ProductSafety extends Widget_Base
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
		return 'product-safety';
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
		return esc_html__('Product Safety', 'msitheme');
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
		return 'eicon-text';
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
				'label' => __( 'Title top', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $this->add_control(
			'title',
			[
				'label' => __( 'Title bottom', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
		$this->add_control(
			'desc',
			[
				'label' => esc_html__( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your description here', 'msitheme' ),
			]
		);

        $this->add_control(
			'safety_img',
			[
				'label' => esc_html__( 'Choose Safety Image', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
        $this->add_control(
			'cloud_img',
			[
				'label' => esc_html__( 'Choose Cloud Image', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
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
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'msitheme' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .safety-wrap',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'top_heading_typography',
				'label' => __( 'Typography for top heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .msitheme-content-block h6',
			]
		);
        $this->add_control(
			'top_heading_color',
			[
				'label' => __( 'Top Heading Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#070028',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .msitheme-content-block h6' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_border_color',
			[
				'label' => __( 'Top heading Border Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#070028',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .msitheme-content-block h6::before, .msitheme-content-block h6::after' => 'background: {{VALUE}}',
				],
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __( 'Typography for heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .msitheme-content-block h4',
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
					'{{WRAPPER}} .msitheme-content-block h4' => 'color: {{VALUE}}',
				],
			]
		);

        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography for left description', 'msitheme' ),
				'selector' => '{{WRAPPER}} .block-desc',
			]
		);

        $this->add_control(
			'desc_color',
			[
				'label' => __( 'Left description Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#070028',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .block-desc' => 'color: {{VALUE}}',
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

            <!-- start of safety -->
            <div class="safety-wrap relative">
                <div class="container-default">
                    <div class="safety-content grid align-center">
                        <div class="msitheme-content-block">
                            <?php if ( !empty( $settings['title_top'] ) ) : ?>
                                <h6 class="theme-border relative">
                                    <?php echo esc_html( $settings['title_top'] ); ?>
                                </h6>
                            <?php endif; if ( !empty( $settings['title'] ) ) : ?>
                                <h4>
                                    <?php echo wp_kses_post( $settings['title'] ); ?>
                                </h4>
                            <?php endif; if ( !empty( $settings['desc'] ) ) : ?>
                                <div class="block-desc">
                                    <?php echo $settings['desc']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if ( !empty( $settings['safety_img'] ) ) : ?>
                            <div class="safety-content-right">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $settings['safety_img']['id'], 'large' )); ?>" alt="">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ( !empty( $settings['cloud_img'] ) ) : ?>
                    <div id="infinite-slide" class="safety-clould absolute">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $settings['cloud_img']['id'], 'large' )); ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
            
    	<?php
    } 
}
