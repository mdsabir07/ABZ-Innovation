<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

function msitheme_post_cat_list( ) {
    $elements = get_terms( 'category', array('hide_empty' => true) );
    $post_cat_array = array();

    if ( !empty($elements) ) {
        foreach ( $elements as $element ) {
            $info = get_term($element, 'category');
            $post_cat_array[ $info->term_id ] = $info->name;
        }
    }
    return $post_cat_array;
}

class Blogs extends Widget_Base {

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
		return 'blogs';
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
		return __( 'Blogs', 'msitheme' );
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
		return 'eicon-posts-grid';
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
				'label' => __( 'Section title', 'msitheme' ),
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
        		
		$this->add_control(
			'show_top_heading',
			[
				'label' => __( 'Show top heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes'	=> __( 'Yes', 'msitheme' ), 
					'no'	=> __( 'No', 'msitheme' ), 
				],
			]
		);

		$this->add_control(
			'top_heading',
			[
				'label' => __( 'Top heading', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'condition'	=> [
					'show_top_heading'	=> 'yes',
				],
			]
		);

		$this->add_control(
			'show_section_title',
			[
				'label' => __( 'Show section title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes'	=> __( 'Yes', 'msitheme' ), 
					'no'	=> __( 'No', 'msitheme' ), 
				],
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' => __( 'Section title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'condition'	=> [
					'show_section_title'	=> 'yes',
				],
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
		
		$this->add_control(
			'button_type',
			[
				'label' => esc_html__( 'Button type', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'1' => esc_html__( 'Filled button', 'msitheme' ),
					'2' => esc_html__( 'Bordered button', 'msitheme' ),
					'3' => esc_html__( 'Icon button', 'msitheme' ),
				]
		
			]
		);

		$this->add_control(
			'count',
			[
				'label' => __( 'Post count', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '2',
			]
		);

        $this->add_control(
            'cat_ids',
            [
                'label' => __( 'Select Categories', 'msitheme' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => msitheme_post_cat_list(),
            ]
        );

		$this->add_control(
			'orderby',
			[
				'label' => esc_html__( 'Order by', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'menu_order',
				'options' => [
					'menu_order' => esc_html__( 'Default post', 'msitheme' ),
					'title' => esc_html__( 'Post Title', 'msitheme' ),
					'ID' => esc_html__( 'Post ID', 'msitheme' ),
					'name'  => esc_html__( 'Post slug', 'msitheme' ),
					'date'  => esc_html__( 'Post date', 'msitheme' ),
					'modified'  => esc_html__( 'Modified post', 'msitheme' ),
					'rand'  => esc_html__( 'Random post', 'msitheme' ),
					'comment_count' => esc_html__( 'Popular post', 'msitheme' ),
				]
			]
		);


		$this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__( 'DESC', 'msitheme' ),
					'ASC' => esc_html__( 'ASC', 'msitheme' ),
				]
			]
		);

		$this->add_control(
			'post_status',
			[
				'label' => esc_html__( 'Post status', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'publish',
				'options' => [
					'publish' => esc_html__( 'Publish', 'msitheme' ),
					'pending' => esc_html__( 'Pending', 'msitheme' ),
					'draft' => esc_html__( 'Draft', 'msitheme' ),
					'future'  => esc_html__( 'Future post', 'msitheme' ),
					'private'  => esc_html__( 'Private', 'msitheme' ),
					'trash'  => esc_html__( 'Trashbin post', 'msitheme' ),
					'any'  => esc_html__( 'Any post', 'msitheme' ),
				]
			]
		);
		
		$this->add_control(
			'show_date',
			[
				'label' => __( 'Show date', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'msitheme' ),
				'label_off' => __( 'Hide', 'msitheme' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		
		$this->add_control(
			'show_cats',
			[
				'label' => __( 'Show categories', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'msitheme' ),
				'label_off' => __( 'Hide', 'msitheme' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
	
		$this->add_control(
			'show_img',
			[
				'label' => __( 'Show Image', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'msitheme' ),
				'label_off' => __( 'Hide', 'msitheme' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'show_title',
			[
				'label' => __( 'Show title', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'msitheme' ),
				'label_off' => __( 'Hide', 'msitheme' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'show_excerpt',
			[
				'label' => __( 'Show excerpt', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'msitheme' ),
				'label_off' => __( 'Hide', 'msitheme' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
			'excerpt_count',
			[
				'label' => __( 'Excerpt count (letter only)', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'show_label' => true,
				'condition'	=> [
					'show_excerpt'	=> 'yes',
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
				'name' => 'top_heading_typography',
				'label' => __( 'Typography for top heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .section-title h6',
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
					'{{WRAPPER}} .section-title h6' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'top_heading_variation',
			[
				'label' => __( 'Top Heading Variation (example: 125)', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'selectors' => [
					'{{WRAPPER}} .section-title h6' => 'font-variation-settings: "wdth" {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'section_heading_typography',
				'label' => __( 'Typography for section heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .section-title h3',
			]
		);

        $this->add_control(
			'section_heading_color',
			[
				'label' => __( 'Section Heading Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFF',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-title h3' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'section_heading_variation',
			[
				'label' => __( 'Section Heading Variation (example: 125)', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'selectors' => [
					'{{WRAPPER}} .section-title h3' => 'font-variation-settings: "wdth" {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __('Typography for button', 'msitheme'),
				'selector' => '{{WRAPPER}} .section-title .theme-btn',
			]
		);
		$this->add_control(
			'button_color',
			[
				'label' => __('Button Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-title .theme-btn' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' => __('Button background Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#F25119',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-title .theme-btn' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' => __( 'Button hover Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-title .theme-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button_hover_bg',
			[
				'label' => __( 'Button hover background Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#DA4711',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-title .theme-btn:hover' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button_border',
			[
				'label' => __( 'Button border Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-title .theme-btn' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button_hover_border',
			[
				'label' => __( 'Button hover border Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#F25119',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-title .theme-btn:hover' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
				'label' => __('Typography for button icon', 'msitheme'),
				'selector' => '{{WRAPPER}} .section-title .theme-btn i',
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __('Button Icon Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-title .theme-btn i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_hover_border_color',
			[
				'label' => __('Button Icon hover border Color', 'msitheme'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .section-title .theme-btn:hover i' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_border_width',
			[
				'label' => __('Button Icon border width', 'msitheme'),
				'type'	=> Controls_Manager::TEXT,
				'default' => '2',
				'label_block'	=> true,
				'selectors' => [
					'{{WRAPPER}} .section-title .theme-btn i' => 'border-width: {{VALUE}}px',
				],
			]
		);

		$this->add_control(
			'margin',
			[
				'label' => esc_html__( 'Section heading Margin', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography for post heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .entry-details h4 a',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Post Heading Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .entry-details h4 a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'label' => __( 'Typography for post excerpt', 'msitheme' ),
				'selector' => '{{WRAPPER}} .entry-details .excerpt',
			]
		);
		$this->add_control(
			'excerpt_color',
			[
				'label' => __( 'Post excerpt Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#B1DEE3',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .entry-details .excerpt' => 'color: {{VALUE}}',
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

		if ($settings['cat_ids']) {
			$q = new \WP_Query( array(
				'post_type'	=> 'post', 
				'posts_per_page' => $settings['count'],
				'orderby'	=> $settings['orderby'],
				'order'	=> $settings['order'],
				'post_status'	=> $settings['post_status'],
				'tax_query'	=> array(
					array(
						'taxonomy'	=> 'category',
						'field'		=> 'term_id',
						'terms'		=> $settings['cat_ids']
					)
				),
			) );
		} else {
			$q = new \WP_Query( array(
				'post_type'	=> 'post',  
				'posts_per_page' => $settings['count'],
				'orderby'	=> $settings['orderby'],
				'order'	=> $settings['order'],
				'post_status'	=> $settings['post_status'],
			) );
		} 
		
		?>

			<div class="msitheme-news-wrap">
                <div class="container-default">
                    <?php if($settings['show_section_title'] === 'yes') : ?>
                        <div class="section-title flex justify-between align-center">
							<div class="blog-section-heading">
								<?php if($settings['show_top_heading'] === 'yes') : 
									if ( !empty($settings['top_heading']) ) : 
										if ( $settings['top_heading_border'] === 'yes' ) :
											$border = 'theme-border relative';
										else : 
											$border = '';
										endif;
								?>
									<h6 class="<?php echo esc_attr( $border ); ?>">
										<?php echo esc_html( $settings['top_heading'] ); ?>
									</h6>
								<?php endif; endif; if ( !empty($settings['section_title']) ) : ?>
									<h3>
										<?php echo esc_html( $settings['section_title'] ); ?>
									</h3>
								<?php endif; ?>
							</div>
							<?php if ( !empty( $settings['btn_label'] ) ) : 

								$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
								$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';

								if ( $settings['button_type'] === '1' ) :
									$btn_class = 'filled-btn';
								elseif ( $settings['button_type'] === '2' ) :
									$btn_class = 'bordered-btn';
								else : 
									$btn_class = 'bordered-btn icon-btn';
								endif;

								?>
								<a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" class="theme-btn <?php echo esc_attr( $btn_class ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?>>
									<span class="btn-label">
										<?php echo esc_html( $settings['btn_label'] ); ?>
									</span> 
									<?php if ( $settings['button_type'] === '3' ) : ?>
										<i class="fa-solid fa-arrow-right"></i>
									<?php endif; ?>
								</a>
							<?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="blog-page news-posts g-gap-25">
                        <?php 
                        while($q->have_posts()) : $q->the_post(); 
                            $post_id = get_the_ID(); 
                            $categories = get_the_category($post_id);

                            if ( $settings['excerpt_count'] ) {
                                $excerpt = word_count(get_the_excerpt($post_id), ''.$settings['excerpt_count'].'');
                            } else {
                                $excerpt = word_count(get_the_excerpt($post_id), '20');
                            }

                            if (get_post_meta( $post_id, 'msitheme_post_meta', true ) ) {
                                $msitheme_meta = get_post_meta( $post_id, 'msitheme_post_meta', true );
                            } else {
                                $msitheme_meta = array();
                            }
                            
                            if(array_key_exists('post_extra_img', $msitheme_meta)) {
                                $post_extra_img = $msitheme_meta['post_extra_img'];
                            } else {
                                $post_extra_img = '';
                            }
                        ?>
                            <article id="post-<?php echo esc_attr( $post_id ); ?>" class="post single-news-post">
                                <?php if($settings['show_img'] === 'yes') : ?>
                                    <div class="entry-media">
                                        <?php if(has_post_thumbnail( $post_id )) :
                                            if ( !empty($msitheme_meta['post_extra_img']) ) : ?>
												<a class="post-thumbnail" href="<?php echo the_permalink(); ?>">
													<img class="custom-blog-img" src="<?php echo esc_url($post_extra_img['url']); ?>" alt="<?php echo esc_attr( the_title() ); ?>">
												</a>
                                            <?php else : ?>
												<a class="post-thumbnail" href="<?php echo the_permalink(); ?>">
													<?php the_post_thumbnail($post_id); ?>
												</a>
											<?php endif;
                                        endif; ?>
                                        <?php if($settings['show_cats'] === 'yes') : $categories = get_the_category($post_id);  foreach($categories as $category) : ?>
                                            <button><?php echo esc_html($category->cat_name); ?></button>
                                        <?php endforeach; endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="entry-details">
                                    <?php if($settings['show_title'] === 'yes') : ?>
                                        <h4 class="entry-title fz-18 lh-27 uppercase">
                                            <a href="<?php echo the_permalink(); ?>">
                                                <?php esc_html( the_title() ); ?>
                                            </a>
                                        </h4>
                                    <?php endif; ?>
                                    <?php if($settings['show_excerpt'] === 'yes') : ?>
                                        <div class="entry-content"><?php echo esc_html( $excerpt ); ?></div>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                </div>
			</div>
		<?php wp_reset_query(); 
	}

}
