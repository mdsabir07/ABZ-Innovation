<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class ProductPower extends Widget_Base {

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
		return 'product-power';
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
		return __( 'Product Power Filter', 'msitheme' );
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
				'selector' => '{{WRAPPER}} .product-tabbed-power',
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
			'image1',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
        $repeater->add_control(
			'pp_top_heading1',
			[
				'label' => __( 'Top heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_bottom_heading1',
			[
				'label' => __( 'Bottom heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_top_heading11',
			[
				'label' => __( 'Top heading 2', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_bottom_heading11',
			[
				'label' => __( 'Bottom heading 2', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_desc1',
			[
				'label' => __( 'Description', 'msitheme' ),
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
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'image2',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
        $repeater->add_control(
			'pp_top_heading2',
			[
				'label' => __( 'Top heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_bottom_heading2',
			[
				'label' => __( 'Bottom heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        
        $repeater->add_control(
			'pp_top_heading21',
			[
				'label' => __( 'Top heading 2', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_bottom_heading21',
			[
				'label' => __( 'Bottom heading 2', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_desc2',
			[
				'label' => __( 'Description', 'msitheme' ),
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
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'image3',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
        $repeater->add_control(
			'pp_top_heading3',
			[
				'label' => __( 'Top heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_bottom_heading3',
			[
				'label' => __( 'Bottom heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        
        $repeater->add_control(
			'pp_top_heading31',
			[
				'label' => __( 'Top heading 2', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_bottom_heading31',
			[
				'label' => __( 'Bottom heading 2', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_desc3',
			[
				'label' => __( 'Description', 'msitheme' ),
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
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'image4',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
        $repeater->add_control(
			'pp_top_heading4',
			[
				'label' => __( 'Top heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_bottom_heading4',
			[
				'label' => __( 'Bottom heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        
        $repeater->add_control(
			'pp_top_heading41',
			[
				'label' => __( 'Top heading 2', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_bottom_heading41',
			[
				'label' => __( 'Bottom heading 2', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_desc4',
			[
				'label' => __( 'Description', 'msitheme' ),
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
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'image5',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
        $repeater->add_control(
			'pp_top_heading5',
			[
				'label' => __( 'Top heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_bottom_heading5',
			[
				'label' => __( 'Bottom heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        
        $repeater->add_control(
			'pp_top_heading51',
			[
				'label' => __( 'Top heading 2', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_bottom_heading51',
			[
				'label' => __( 'Bottom heading 2', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
        $repeater->add_control(
			'pp_desc5',
			[
				'label' => __( 'Description', 'msitheme' ),
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
				'selector' => '{{WRAPPER}} .msitheme-content-block h6',
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
					'{{WRAPPER}} .msitheme-content-block h6' => 'color: {{VALUE}}',
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
				'default' => '#fff',
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
        	<div class="product-tabbed-power">
                <input type="radio" id="power-tab1" name="css-tabs4" checked>
                <input type="radio" id="power-tab2" name="css-tabs4">
                <input type="radio" id="power-tab3" name="css-tabs4">
                <input type="radio" id="power-tab4" name="css-tabs4">
                <input type="radio" id="power-tab5" name="css-tabs4">
                
                <?php if ( !empty( $settings['tab_labels'] ) ) : ?>
					<ul class="power-tabs list-unstyled flex justify-center f-gap-25 align-center">
						<?php $i = 0; foreach ( $settings['tab_labels'] as $tab ) : $i++; ?>
							<?php if ( !empty( $tab['label'] ) ) : ?>
								<li class="power-tab">
									<label for="power-tab<?php echo esc_attr( $i ); ?>">
										<?php echo esc_html( $tab['label'] ); ?>
									</label>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
                <?php endif; ?>
                
                <?php if ( !empty( $settings['content_box1'] ) ) : ?>
                    <div class="product-power-slider power-slider1">
                        <?php foreach ( $settings['content_box1'] as $box ) : ?>
                            <div class="single-slider-product">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $box['image1']['id'], 'large' )); ?>" alt="">
                                <div class="msitheme-content-block">
                                    <?php if ( !empty( $box['pp_top_heading1'] ) ) : ?>
                                        <h6 class="theme-border relative">
                                            <?php echo esc_html( $box['pp_top_heading1'] ); ?>
                                        </h6>
                                    <?php endif; if ( !empty( $box['pp_bottom_heading1'] ) ) : ?>
                                        <h4>
                                            <?php echo wp_kses_post( $box['pp_bottom_heading1'] ); ?>
                                        </h4>
                                    <?php endif; ?>
                                </div>
                                <div class="msitheme-content-block">
                                    <?php if ( !empty( $box['pp_top_heading11'] ) ) : ?>
                                        <h6 class="theme-border relative">
                                            <?php echo esc_html( $box['pp_top_heading11'] ); ?>
                                        </h6>
                                    <?php endif; if ( !empty( $box['pp_bottom_heading11'] ) ) : ?>
                                        <h4>
                                            <?php echo wp_kses_post( $box['pp_bottom_heading11'] ); ?>
                                        </h4>
                                    <?php endif; ?>
                                </div>
                                <?php if ( !empty( $box['pp_desc1'] ) ) : ?>
                                    <div class="block-desc">
                                        <?php echo wp_kses_post( $box['pp_desc1'] ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ( !empty( $settings['content_box2'] ) ) : ?>
                    <div class="product-power-slider power-slider2">
                        <?php foreach ( $settings['content_box2'] as $box ) : ?>
                            <div class="single-slider-product">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $box['image2']['id'], 'large' )); ?>" alt="">
                                <div class="msitheme-content-block">
                                    <?php if ( !empty( $box['pp_top_heading2'] ) ) : ?>
                                        <h6 class="theme-border relative">
                                            <?php echo esc_html( $box['pp_top_heading2'] ); ?>
                                        </h6>
                                    <?php endif; if ( !empty( $box['pp_bottom_heading2'] ) ) : ?>
                                        <h4>
                                            <?php echo wp_kses_post( $box['pp_bottom_heading2'] ); ?>
                                        </h4>
                                    <?php endif; ?>
                                </div>
                                <div class="msitheme-content-block">
                                    <?php if ( !empty( $box['pp_top_heading21'] ) ) : ?>
                                        <h6 class="theme-border relative">
                                            <?php echo esc_html( $box['pp_top_heading21'] ); ?>
                                        </h6>
                                    <?php endif; if ( !empty( $box['pp_bottom_heading21'] ) ) : ?>
                                        <h4>
                                            <?php echo wp_kses_post( $box['pp_bottom_heading21'] ); ?>
                                        </h4>
                                    <?php endif; ?>
                                </div>
                                <?php if ( !empty( $box['pp_desc2'] ) ) : ?>
                                    <div class="block-desc">
                                        <?php echo wp_kses_post( $box['pp_desc2'] ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ( !empty( $settings['content_box3'] ) ) : ?>
                    <div class="product-power-slider power-slider3">
                        <?php foreach ( $settings['content_box3'] as $box ) : ?>
                            <div class="single-slider-product">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $box['image3']['id'], 'large' )); ?>" alt="">
                                <div class="msitheme-content-block">
                                    <?php if ( !empty( $box['pp_top_heading1'] ) ) : ?>
                                        <h6 class="theme-border relative">
                                            <?php echo esc_html( $box['pp_top_heading3'] ); ?>
                                        </h6>
                                    <?php endif; if ( !empty( $box['pp_bottom_heading3'] ) ) : ?>
                                        <h4>
                                            <?php echo wp_kses_post( $box['pp_bottom_heading3'] ); ?>
                                        </h4>
                                    <?php endif; ?>
                                </div>
                                <div class="msitheme-content-block">
                                    <?php if ( !empty( $box['pp_top_heading31'] ) ) : ?>
                                        <h6 class="theme-border relative">
                                            <?php echo esc_html( $box['pp_top_heading31'] ); ?>
                                        </h6>
                                    <?php endif; if ( !empty( $box['pp_bottom_heading31'] ) ) : ?>
                                        <h4>
                                            <?php echo wp_kses_post( $box['pp_bottom_heading31'] ); ?>
                                        </h4>
                                    <?php endif; ?>
                                </div>
                                <?php if ( !empty( $box['pp_desc3'] ) ) : ?>
                                    <div class="block-desc">
                                        <?php echo wp_kses_post( $box['pp_desc3'] ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ( !empty( $settings['content_box4'] ) ) : ?>
                    <div class="product-power-slider power-slider4">
                        <?php foreach ( $settings['content_box4'] as $box ) : ?>
                            <div class="single-slider-product">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $box['image4']['id'], 'large' )); ?>" alt="">
                                <div class="msitheme-content-block">
                                    <?php if ( !empty( $box['pp_top_heading4'] ) ) : ?>
                                        <h6 class="theme-border relative">
                                            <?php echo esc_html( $box['pp_top_heading4'] ); ?>
                                        </h6>
                                    <?php endif; if ( !empty( $box['pp_bottom_heading4'] ) ) : ?>
                                        <h4>
                                            <?php echo wp_kses_post( $box['pp_bottom_heading4'] ); ?>
                                        </h4>
                                    <?php endif; ?>
                                </div>
                                <div class="msitheme-content-block">
                                    <?php if ( !empty( $box['pp_top_heading41'] ) ) : ?>
                                        <h6 class="theme-border relative">
                                            <?php echo esc_html( $box['pp_top_heading41'] ); ?>
                                        </h6>
                                    <?php endif; if ( !empty( $box['pp_bottom_heading41'] ) ) : ?>
                                        <h4>
                                            <?php echo wp_kses_post( $box['pp_bottom_heading41'] ); ?>
                                        </h4>
                                    <?php endif; ?>
                                </div>
                                <?php if ( !empty( $box['pp_desc4'] ) ) : ?>
                                    <div class="block-desc">
                                        <?php echo wp_kses_post( $box['pp_desc4'] ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ( !empty( $settings['content_box5'] ) ) : ?>
                    <div class="product-power-slider power-slider5">
                        <?php foreach ( $settings['content_box5'] as $box ) : ?>
                            <div class="single-slider-product">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $box['image5']['id'], 'large' )); ?>" alt="">
                                <div class="msitheme-content-block">
                                    <?php if ( !empty( $box['pp_top_heading5'] ) ) : ?>
                                        <h6 class="theme-border relative">
                                            <?php echo esc_html( $box['pp_top_heading5'] ); ?>
                                        </h6>
                                    <?php endif; if ( !empty( $box['pp_bottom_heading5'] ) ) : ?>
                                        <h4>
                                            <?php echo wp_kses_post( $box['pp_bottom_heading5'] ); ?>
                                        </h4>
                                    <?php endif; ?>
                                </div>
                                <div class="msitheme-content-block">
                                    <?php if ( !empty( $box['pp_top_heading11'] ) ) : ?>
                                        <h6 class="theme-border relative">
                                            <?php echo esc_html( $box['pp_top_heading51'] ); ?>
                                        </h6>
                                    <?php endif; if ( !empty( $box['pp_bottom_heading51'] ) ) : ?>
                                        <h4>
                                            <?php echo wp_kses_post( $box['pp_bottom_heading51'] ); ?>
                                        </h4>
                                    <?php endif; ?>
                                </div>
                                <?php if ( !empty( $box['pp_desc5'] ) ) : ?>
                                    <div class="block-desc">
                                        <?php echo wp_kses_post( $box['pp_desc5'] ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

    		</div>
            		
		<?php
	}

}
