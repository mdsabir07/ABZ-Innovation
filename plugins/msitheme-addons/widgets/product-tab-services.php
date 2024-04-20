<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class ProductServices extends Widget_Base {

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
		return 'product-service';
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
		return __( 'Product Service Filter', 'msitheme' );
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
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'heading',
			[
				'label' => __( 'Heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
        $repeater->add_control(
			'desc',
			[
				'label' => __( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
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
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'msitheme' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-tabbed-service',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				'label' => __( 'Typography for label', 'msitheme' ),
				'selector' => '{{WRAPPER}} .service-tab label',
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
					'{{WRAPPER}} .service-tab label' => 'color: {{VALUE}};opacity:0.45',
				],
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __( 'Typography for heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .single-services-product h3',
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
					'{{WRAPPER}} .single-services-product h3' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'top_heading_border_width',
			[
				'label' => __( 'Designation Border width', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '100',
				'selectors' => [
					'{{WRAPPER}} .msitheme-content-block h6::before' => 'width: {{VALUE}}%',
				],
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography for description', 'msitheme' ),
				'selector' => '{{WRAPPER}} .block-desc',
			]
		);

        $this->add_control(
			'desc_color',
			[
				'label' => __( 'description Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#B1DEE3',
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
        	<div class="product-tabbed-service">
                <input type="radio" id="service-tab1" name="css-tabs3" checked>
                <input type="radio" id="service-tab2" name="css-tabs3">
                <input type="radio" id="service-tab3" name="css-tabs3">
                <input type="radio" id="service-tab4" name="css-tabs3">
                <input type="radio" id="service-tab5" name="css-tabs3">
                <input type="radio" id="service-tab6" name="css-tabs3">
                <input type="radio" id="service-tab7" name="css-tabs3">
                <input type="radio" id="service-tab8" name="css-tabs3">
                <input type="radio" id="service-tab9" name="css-tabs3">
                <input type="radio" id="service-tab10" name="css-tabs3">
                <input type="radio" id="service-tab11" name="css-tabs3">
                
                <?php if ( !empty( $settings['tab_labels'] ) ) : ?>
					<ul class="service-tabs list-unstyled flex justify-center f-gap-25 align-center">
						<?php $i = 0; foreach ( $settings['tab_labels'] as $tab ) : $i++; ?>
							<?php if ( !empty( $tab['label'] ) ) : ?>
								<li class="service-tab">
									<label for="service-tab<?php echo esc_attr( $i ); ?>">
										<?php echo esc_html( $tab['label'] ); ?>
									</label>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
                <?php endif; ?>
                
                <?php if ( !empty( $settings['content_box'] ) ) : foreach ( $settings['content_box'] as $box ) : ?>
                    <div class="product-services">
                        <div class="single-services-product">
                            <?php if ( !empty( $box['heading'] ) ) : ?>
                                <div class="flex justify-start">
                                    <h3>
                                        <?php echo wp_kses_post( $box['heading'] ); ?>
                                    </h3>
                                </div>
                            <?php endif; if ( !empty( $box['image'] ) ) : ?>
                                <div class="flex justify-center">
                                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $box['image']['id'], 'large' )); ?>" alt="">
                                </div>
                            <?php endif; if ( !empty( $box['desc'] ) ) : ?>
                                <div class="block-desc flex justify-end">
                                    <p>
                                        <?php echo wp_kses_post( $box['desc'] ); ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
    		</div>	
		<?php
	}

}
