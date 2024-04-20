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
class AsForm extends Widget_Base
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
		return 'as-form';
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
		return esc_html__('Advanced Search Form', 'coderdevsbd');
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
		return 'eicon-posts-ticker';
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
		return ['coderdevsbd'];
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
		return ['coderdevsbd'];
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
				'label' => __('Advanced search form', 'coderdevsbd'),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'msitheme' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .advanced-form',
			]
		);

		$this->add_control(
			'desti_label',
			[
				'label' => __('Destinations heading', 'coderdevsbd'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'desti_place',
			[
				'label' => __('Destinations placeholder', 'coderdevsbd'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'checkin_label',
			[
				'label' => __('Check-In heading', 'coderdevsbd'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'checkin_place',
			[
				'label' => __('Check-In placeholder', 'coderdevsbd'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'checkin_month',
			[
				'label' => __('Check-In month', 'coderdevsbd'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'checkout_label',
			[
				'label' => __('Check-Out heading', 'coderdevsbd'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'checkout_place',
			[
				'label' => __('Check-Out placeholder', 'coderdevsbd'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'checkout_month',
			[
				'label' => __('Check-Out month', 'coderdevsbd'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'adult_label',
			[
				'label' => __('Adult Person heading', 'coderdevsbd'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'adult_place',
			[
				'label' => __('Adult Person placeholder', 'coderdevsbd'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'child_label',
			[
				'label' => __('Children heading', 'coderdevsbd'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'child_place',
			[
				'label' => __('Children placeholder', 'coderdevsbd'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'submit',
			[
				'label' => __('Submit label', 'coderdevsbd'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
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
			<div class="advanced-form clr-blue-bg">
				<div class="container">
					<form action="/">
						<div class="inner-form grid align-center">
							<div class="location">
								<?php if ( !empty($settings['desti_label']) ) : ?>
									<label for="search"><?php echo esc_html( $settings['desti_label'] ); ?></label>
								<?php endif; ?>
								<div class="input-field flex align-center">
									<input id="search" clr-white type="text" placeholder="<?php echo esc_html( $settings['desti_place'] ); ?>">
									<div class="icon-location">
										<i class="fas fa-map-marker-alt"></i>
									</div>
								</div>
							</div>
							<div class="check-in">
								<?php if ( !empty($settings['checkin_label']) ) : ?>
									<label for="checkin"><?php echo esc_html( $settings['checkin_label'] ); ?></label>
								<?php endif; ?>
								<div class="input-field flex align-center">
									<div class="from-icon">
										<i class="fas fa-calendar-alt"></i>
									</div>
									<div class="datepicker flex align-center">
										<input class="clr-white brygada-1918 fw-500" id="checkin" type="text" placeholder="<?php echo esc_html( $settings['checkin_place'] ); ?>"><span><?php echo esc_html( $settings['checkin_month'] ); ?></span>
									</div>
								</div>
							</div>
							<div class="check-out">
								<?php if ( !empty($settings['checkout_label']) ) : ?>
									<label for="checkin"><?php echo esc_html( $settings['checkout_label'] ); ?></label>
								<?php endif; ?>
								<div class="input-field flex align-center">
									<div class="from-icon">
										<i class="fas fa-calendar-alt"></i>
									</div>
									<div class="datepicker flex align-center">
										<input class="clr-white brygada-1918 fw-500" id="checkout" type="text" placeholder="<?php echo esc_html( $settings['checkout_place'] ); ?>"><span><?php echo esc_html( $settings['checkout_month'] ); ?></span>
									</div>
								</div>
							</div>
							<div class="adult">
								<?php if ( !empty($settings['adult_label']) ) : ?>
									<label for="adult"><?php echo esc_html( $settings['adult_label'] ); ?></label>
								<?php endif; ?>
								<div class="input-field flex align-center">
									<div class="from-icon">
										<i class="fas fa-user"></i>
									</div>
									<input class="number clr-white brygada-1918 fw-500" id="adult" type="number" placeholder="<?php echo esc_html( $settings['adult_place'] ); ?>">
								</div>
							</div>
							<div class="children">
								<?php if ( !empty($settings['child_label']) ) : ?>
									<label for="children"><?php echo esc_html( $settings['child_label'] ); ?></label>
								<?php endif; ?>
								<div class="input-field flex align-center">
									<div class="from-icon">
										<i class="fas fa-child"></i>
									</div>
									<input class="number clr-white brygada-1918 fw-500" id="children" type="number" placeholder="<?php echo esc_html( $settings['child_place'] ); ?>">
								</div>
							</div>
							<?php if ( !empty($settings['submit']) ) : ?>
								<div class="submit">
									<label for=""></label>
									<button class="btn clr-orange-bg clr-white fw-500 flex align-center" type="button"><?php echo esc_html( $settings['submit'] ); ?> <i class="fas fa-search"></i></button>
								</div>
							<?php endif; ?>
						</div>
					</form>
				</div>
			</div>
		<?php
	}

}
