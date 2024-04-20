<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class ProductTab extends Widget_Base {

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
		return 'product-tab';
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
		return __( 'Product tab', 'msitheme' );
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
				'label' => __( 'Product label content', 'msitheme' ),
			]
		);

        $this->add_control(
			'label1',
			[
				'label' => __( 'Tab label 1', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

		$this->add_control(
			'label2',
			[
				'label' => __( 'Tab label 2', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);
		$this->end_controls_section();


        // Tab 1 content
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Product 1 content', 'msitheme' ),
			]
		);

        $this->add_control(
			'product_title',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'border_title',
			[
				'label' => __( 'Bottom title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'desc1',
			[
				'label' => __( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $this->add_control(
			'tab_left_content',
			[
				'label' => esc_html__( 'Fusion 212 left content', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
        $this->add_control(
			'fusion21img',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
        $this->add_control(
			'btn_label',
			[
				'label'	=> __( 'Button label', 'msitheme' ),
				'type'	=> Controls_Manager::TEXT,
				'label_block'	=> true,
			]
		);

		$this->add_control(
			'btn_link',
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
		$this->end_controls_section();

        // Tab 2 content
		$this->start_controls_section(
			'tab2_content',
			[
				'label' => __( 'Product 2 content', 'msitheme' ),
			]
		);

        $this->add_control(
			'product_title2',
			[
				'label' => __( 'Title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'border_title2',
			[
				'label' => __( 'Bottom title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'desc2',
			[
				'label' => __( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

        $this->add_control(
			'tab_left_content2',
			[
				'label' => esc_html__( 'Fusion sentinel left content', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
        $this->add_control(
			'sentinel_img',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

        $this->add_control(
			'btn_label2',
			[
				'label'	=> __( 'Button label', 'msitheme' ),
				'type'	=> Controls_Manager::TEXT,
				'label_block'	=> true,
			]
		);

		$this->add_control(
			'btn_link2',
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
				'selector' => '{{WRAPPER}} .product-tab label',
			]
		);

        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __( 'Typography for heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .tab-content-left h2',
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
					'{{WRAPPER}} .tab-content-left h2' => 'color: {{VALUE}}',
				],
			]
		);

        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'bottom_heading_typography',
				'label' => __( 'Typography for bottom heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .tab-content-left h4',
			]
		);

        $this->add_control(
			'bottom_heading_color',
			[
				'label' => __( 'Bottom heading Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .tab-content-left h4' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'bottom_heading_border_color',
			[
				'label' => __( 'Bottom heading border Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .tab-content-left h4::before, .tab-content-left h4::after' => 'background: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'bottom_heading_border_width',
			[
				'label' => __( 'Bottom heading Border width', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tab-content-left h4::before' => 'width: {{VALUE}}%',
				],
			]
		);


                
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography for description', 'msitheme' ),
				'selector' => '{{WRAPPER}} .product-tab-content p',
			]
		);
        $this->add_control(
			'desc_color',
			[
				'label' => __( 'Description Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .product-tab-content p' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'tab_1bg',
			[
				'label' => __( 'Tab 1 background color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#546988',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .tablist-1-active-new' => 'background: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'tab_2bg',
			[
				'label' => __( 'Tab 2 background color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#474B55',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .tablist-2-active' => 'background: {{VALUE}}',
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

        $target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';

        $target2 = $settings['btn_link2']['is_external'] ? ' target="_blank"' : '';
		$nofollow2 = $settings['btn_link2']['nofollow'] ? ' rel="nofollow"' : '';
		?>
        <div class="product-tabbed tablist-1-active">
            <div class="container-default">
                <input type="radio" id="product-tab1" name="css-tabs2" checked>
                <input type="radio" id="product-tab2" name="css-tabs2">
                
                <ul class="product-tabs list-unstyled">
                    <?php if ( !empty( $settings['label1'] ) ) : ?>
                        <li class="product-tab tablist-1">
                            <label for="product-tab1">
                                <?php echo esc_html( $settings['label1'] ); ?>
                            </label>
                        </li>
                    <?php endif; if ( !empty( $settings['label2'] ) ) : ?>
                        <li class="product-tab tablist-2">
                            <label for="product-tab2">
                                <?php echo esc_html( $settings['label2'] ); ?>
                            </label>
                        </li>
                    <?php endif; ?>
                </ul>
                
                <div class="product-tab-content product-1-tab-content">
                    <div class="tab-content-inner grid">
                        <?php if ( !empty( $settings['tab_left_content'] ) ) : ?>
                            <div class="tab-content-left">
                                <?php if ( !empty( $settings['product_title'] ) ) : ?>
                                    <h2 class="uppercase">
                                        <?php echo wp_kses_post( $settings['product_title'] ); ?>
                                    </h2>
                                <?php endif; 
                                $i = 0;
                                foreach ( $settings['tab_left_content'] as $left_tab ) : 
									$i++; 
									if ( $i === 1 ) :
										$add_default_class = " btn-content1-active-default";
									else :
										$add_default_class = "";
									endif;
								?>
                                    <div id="div<?php echo esc_attr( $i ); ?>" class="plus-btn-content<?php echo esc_attr( $add_default_class ); ?> btn-content-<?php echo esc_attr( $i ); ?>">
                                        <?php if ( !empty( $left_tab['border_title'] ) ) : ?>
                                            <h4 class="theme-border relative fz-32 uppercase">
                                                <?php echo esc_html( $left_tab['border_title'] ); ?>
                                            </h4>
                                        <?php endif; if ( !empty( $left_tab['desc1'] ) ) : ?>
                                            <p>
                                                <?php echo wp_kses_post( $left_tab['desc1'] ); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                               <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <div class="tab-content-right">
                            <div class="pulse tab-content-right-bg">
                                <div class="tab-content-right-img relative">
                                    <?php if ( !empty( $settings['fusion21img'] ) ) : ?>
                                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $settings['fusion21img']['id'], 'large' )); ?>" alt="<?php echo esc_attr( $settings['label1'] ); ?>">
                                        <i class="fa-solid fa-plus aircraft-icon1 absolute" data-target="1"></i>
                                        <i class="fa-solid fa-plus aircraft-icon2 absolute" data-target="2"></i>
                                        <i class="fa-solid fa-plus aircraft-icon3 absolute" data-target="3"></i>
                                        <i class="fa-solid fa-plus aircraft-icon4 absolute" data-target="4"></i>
                                        <i class="fa-solid fa-plus aircraft-icon5 absolute" data-target="5"></i>
                                        <i class="fa-solid fa-plus aircraft-icon6 absolute" data-target="6"></i>
                                    <?php endif; if ( !empty( $settings['btn_label'] ) ) : ?>
                                        <a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?>  class="aircraft-icon-btn absolute">
                                            <?php echo esc_html( $settings['btn_label'] ); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="product-tab-content product-2-tab-content">
                    <div class="tab-content-inner grid">
                        <?php if ( !empty( $settings['tab_left_content2'] ) ) : ?>
                            <div class="tab-content-left">
                                <?php if ( !empty( $settings['product_title2'] ) ) : ?>
                                    <h2 class="uppercase">
                                        <?php echo wp_kses_post( $settings['product_title2'] ); ?>
                                    </h2>
                                <?php endif; 
                                $i = 0;
                                foreach ( $settings['tab_left_content2'] as $left_tab2 ) : 
									$i++; 
									if ( $i === 1 ) :
										$add_default_class = " btn-content1-active-default";
									else :
										$add_default_class = "";
									endif;
								?>
                                    <div id="div<?php echo esc_attr( $i ); ?>" class="plus-btn-content<?php echo esc_attr( $add_default_class ); ?> btn-content-<?php echo esc_attr( $i ); ?>">
                                        <?php if ( !empty( $left_tab2['border_title2'] ) ) : ?>
                                            <h4 class="theme-border relative fz-32 uppercase">
                                                <?php echo esc_html( $left_tab2['border_title2'] ); ?>
                                            </h4>
                                        <?php endif; if ( !empty( $left_tab2['desc2'] ) ) : ?>
                                            <p>
                                                <?php echo wp_kses_post( $left_tab2['desc2'] ); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        <?php endif; ?>
                        <div class="tab-content-right">
                            <div class="pulse tab-content-right-bg">
                                <div class="tab-content-right-img relative">
                                    <?php if ( !empty( $settings['sentinel_img'] ) ) : ?>
                                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $settings['sentinel_img']['id'], 'large' )); ?>" alt="<?php echo esc_attr( $settings['label2'] ); ?>">
                                        <i class="fa-solid fa-plus aircraft-icon1 absolute" data-target="1"></i>
                                        <i class="fa-solid fa-plus aircraft-icon2 absolute" data-target="2"></i>
                                        <i class="fa-solid fa-plus aircraft-icon3 absolute" data-target="3"></i>
                                        <i class="fa-solid fa-plus aircraft-icon4 absolute" data-target="4"></i>
                                        <i class="fa-solid fa-plus aircraft-icon5 absolute" data-target="5"></i>
                                    <?php endif; if ( !empty( $settings['btn_label2'] ) ) : ?>
                                        <a href="<?php echo esc_url( $settings['btn_link2']['url'] ); ?>" <?php echo esc_attr( $target2 ); ?> <?php echo esc_attr( $nofollow2 ); ?>  class="aircraft-icon-btn absolute">
                                            <?php echo esc_html( $settings['btn_label2'] ); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            		
		<?php
	}

}
