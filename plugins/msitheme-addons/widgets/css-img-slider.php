<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class CssImgSlider extends Widget_Base {

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
		return 'css-imgslider';
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
		return __( 'Css Image Slider', 'msitheme' );
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
				'label' => __( 'Slider content', 'msitheme' ),
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'image1',
			[
				'label' => esc_html__( 'Choose Image', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

        $this->add_control(
			'images1',
			[
				'label' => esc_html__( 'Image slide', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'image1_nav',
			[
				'label' => esc_html__( 'Nav', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

        $this->add_control(
			'images1_navs',
			[
				'label' => esc_html__( 'Image slide navs', 'msitheme' ),
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
				'selector' => '{{WRAPPER}} .tabbed-solution',
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
            <?php if ( !empty( $settings['images1'] ) ) : ?>
                <div class="tab-solutions-slider">
                    <?php if ( !empty( $settings['images1_navs'] ) ) : ?>
                        <div class="solutions-slider-navs">
                            <?php $i = 0; foreach ( $settings['images1_navs'] as $nav1 ) : $i++; ?>
                                <label for="slide-solutions-dot<?php echo esc_attr( $i ); ?>"></label>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php $i = 0; foreach ( $settings['images1'] as $imgs1 ) : $i++; ?>
                        <input id="slide-solutions-dot<?php echo esc_attr( $i ); ?>" type="radio" name="solutions-slides" checked>
                        <div class="solutions-slide slide<?php echo esc_attr( $i ); ?>" style="background: url('<?php echo esc_url(wp_get_attachment_image_url( $imgs1['image1']['id'], 'large' )); ?>')"></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <style>
                .tab-solutions-slider {
                    height: 75%;
                    width: var(--hundred);
                    position: var(--relative);
                    overflow: var(--hidden); 
                    text-align: var(--center);
                }
                .solutions-slider-navs {
                    position: var(--absolute);
                    left: var(--zero);
                    z-index: 900;
                    width: var(--hundred);
                    bottom: var(--zero);
                } 
                .solutions-slider-navs label {
                    cursor: var(--pointer);
                    display: var(--dInlineBlock);
                    width: 10px;
                    height: 10px;
                    background: var(--clrGrey);
                    border-radius: 50px;
                    margin: 0 .2em 1em;
                }
                .solutions-slider-navs label:hover {
                    background: var(--clrOrange);
                }
                .solutions-slide {
                    width: var(--hundred);
                    height: var(--hundred);
                    position: var(--absolute);
                    top: var(--zero);
                    left: var(--hundred);
                    z-index: 10;
                    padding: 8em 1em var(--zero);
                    background-size: var(--cover);
                    background-position: 50% 50%;
                    transition: var(--taLeft) 0s .75s;
                }

                [id^="slide"]:checked + .solutions-slide {
                    left: var(--zero);
                    z-index: 100;
                    transition: left .65s ease-out;
                }
                .solutions-slide {
                    background-size: var(--cover) !important;
                    background-position: var(--center) !important;
                    background-repeat: no-repeat !important;
                    border-radius: 10px;
                }

            </style>
		<?php
	}

}
