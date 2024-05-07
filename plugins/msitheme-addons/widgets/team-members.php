<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

class TeamMembers extends Widget_Base {

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
		return 'team-members';
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
		return __( 'Team members', 'msitheme' );
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
		return 'eicon-user-circle-o';
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
				'label' => __( 'Team member content', 'msitheme' ),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', 
				'exclude' => [],
				'include' => [],
				'default' => 'large',
			]
		);

		$this->add_control(
			'name',
			[
				'label' => __( 'Name', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'label_block'	=> true,
			]
		);

        $this->add_control(
			'name_tag',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'HTML tag for name', 'msitheme' ),
				'default' => 'h3',
				'options' => [
					'h1' => esc_html__( 'H1', 'msitheme' ),
					'h2' => esc_html__( 'H2', 'msitheme' ),
					'h3' => esc_html__( 'H3', 'msitheme' ),
					'h4' => esc_html__( 'H4', 'msitheme' ),
					'h5' => esc_html__( 'H5', 'msitheme' ),
					'h6' => esc_html__( 'H6', 'msitheme' ),
					'div' => esc_html__( 'div', 'msitheme' ),
					'span' => esc_html__( 'span', 'msitheme' ),
					'p' => esc_html__( 'p', 'msitheme' ),
				],
			]
		);

		$this->add_control(
			'desig',
			[
				'label' => __( 'Designation', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'label_block'	=> true,
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => __( 'Description', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => true,
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
				'name' => 'name_typography',
				'label' => __( 'Typography for name', 'msitheme' ),
				'selector' => '{{WRAPPER}} .section-heading',
			]
		);

        $this->add_control(
			'name_color',
			[
				'label' => __( 'Name Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#282929',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-heading' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'name_variation',
			[
				'label' => __( 'Font Variation for name', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '125',
				'selectors' => [
					'{{WRAPPER}} .section-heading' => 'font-variation-settings: "wdth" {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'designation_typography',
				'label' => __( 'Typography for designation', 'msitheme' ),
				'selector' => '{{WRAPPER}} .team-designation',
			]
		);

        $this->add_control(
			'designation_color',
			[
				'label' => __( 'Designation Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#282929',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team-designation' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography for description', 'msitheme' ),
				'selector' => '{{WRAPPER}} .team-description',
			]
		);

        $this->add_control(
			'desc_color',
			[
				'label' => __( 'Description Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#282929',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team-description' => 'color: {{VALUE}}',
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
		<div class="team-member-wrap">
			<div class="team-member-box relative">
				<?php if( !empty($settings['desc']) ) : ?>
					<div class="team-description absolute top-0">
						<?php echo wp_kses_post( $settings['desc'] ); ?>
					</div>
				<?php endif; if ( !empty($settings['image']) ) : ?>
					<div class="team-member-img">
						<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'large', 'image' ); ?>
					</div>
				<?php endif; ?>
				<div class="team-member-content absolute bottom-0">
					<<?php echo esc_attr( $settings['name_tag'] ); ?> class="section-heading">
						<?php if( !empty($settings['name']) ) : ?>
							<?php echo esc_html( $settings['name'] ); ?>
						<?php endif; ?>
					</<?php echo esc_attr( $settings['name_tag'] ); ?>>

					<?php if( !empty($settings['desig']) ) : ?>
						<div class="team-designation">
							<?php echo esc_html( $settings['desig'] ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
            		
		<?php
	}

}
