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
		
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'msitheme' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .msitheme-news-wrap',
			]
		);

        $repeater = new \Elementor\Repeater();
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
			'section_title',
			[
				'label' => __( 'Name part 1', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'section_title2',
			[
				'label' => __( 'Name part 2', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

        $repeater->add_control(
			'section_title_tag',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'HTML tag', 'msitheme' ),
				'default' => 'h2',
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

        $repeater->add_control(
			'top_heading',
			[
				'label' => __( 'Designation', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'top_heading_border',
			[
				'label' => __( 'Designation border?', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes'	=> __( 'Yes', 'msitheme' ), 
					'no'	=> __( 'No', 'msitheme' ), 
				]
			]
		);

        $this->add_control(
			'members',
			[
				'label' => esc_html__( 'Member box', 'msitheme' ),
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
				'name' => 'section_heading_typography',
				'label' => __( 'Typography for name part 1', 'msitheme' ),
				'selector' => '{{WRAPPER}} .section-heading .name-part1',
			]
		);

        $this->add_control(
			'name1_color',
			[
				'label' => __( 'Name part 1 Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFF',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-heading .name-part1' => 'color: {{VALUE}}',
				],
			]
		);

        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name2_typography',
				'label' => __( 'Typography for name part 2', 'msitheme' ),
				'selector' => '{{WRAPPER}} .section-heading .name-part2',
			]
		);
        $this->add_control(
			'name2_color',
			[
				'label' => __( 'Name part 2 Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#AF1A15',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-heading .name-part2' => 'color: {{VALUE}}',
				],
			]
		);

        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'top_heading_typography',
				'label' => __( 'Typography for designation', 'msitheme' ),
				'selector' => '{{WRAPPER}} .section-top-heading',
			]
		);

        $this->add_control(
			'top_heading_color',
			[
				'label' => __( 'Designation Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#B1DEE3',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-top-heading' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'top_heading_border_color',
			[
				'label' => __( 'Designation border Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-top-heading::before, .section-top-heading::after' => 'background: {{VALUE}}',
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
					'{{WRAPPER}} .section-top-heading::before' => 'width: {{VALUE}}%',
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

		if ( !empty( $settings['members'] ) ) :
		?>
            <div class="team-member-wrapper">
                <div class="team-member-inner grid">
                    <?php foreach ( $settings['members'] as $member ) : ?>
                        <div class="team-member-box">
                            <?php if ( !empty($member['image']) ) : ?>
                                <div class="team-member-img">
                                    <img class="member-img" src="<?php echo esc_url(wp_get_attachment_image_url( $member['image']['id'], 'large' )); ?>">
                                </div>
                            <?php endif; ?>
                            <div class="section-title-wrap team-member-content">
                                <<?php echo esc_attr( $member['section_title_tag'] ); ?> class="section-heading">
                                    <?php if( !empty($member['section_title']) ) : ?>
                                        <span class="name-part1"><?php echo esc_html( $member['section_title'] ); ?></span>
                                    <?php endif; if( !empty($member['section_title']) ) : ?>
                                        <span class="name-part2"><?php echo esc_html( $member['section_title2'] ); ?></span>
                                    <?php endif; ?>
                                </<?php echo esc_attr( $member['section_title_tag'] ); ?>>
                                <?php 
                                if ( !empty($member['top_heading']) ) : 
                                    if ( $member['top_heading_border'] === 'yes' ) :
                                        $border = ' theme-border relative';
                                    else : 
                                        $border = '';
                                    endif;
                                ?>
                                    <h6 class="section-top-heading<?php echo esc_attr( $border ); ?>">
                                        <?php echo esc_html( $member['top_heading'] ); ?>
                                    </h6>
                                <?php endif; if( !empty($member['section_title']) ) : ?>
                                    <<?php echo esc_attr( $member['section_title_tag'] ); ?> class="section-heading">
                                        <?php echo wp_kses_post( $member['section_title'] ); ?>
                                    </<?php echo esc_attr( $member['section_title_tag'] ); ?>>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            		
		<?php
        endif;
	}

}
