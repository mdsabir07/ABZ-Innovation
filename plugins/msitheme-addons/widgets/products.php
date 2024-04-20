<?php
namespace MsiThemeEssentialAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

function msitheme_product_cat_list( ) {
    $elements = get_terms( 'product_cats', array('hide_empty' => true) );
    $post_cat_array = array();

    if ( !empty($elements) ) {
        foreach ( $elements as $element ) {
            $info = get_term($element, 'product_cats');
            $post_cat_array[ $info->term_id ] = $info->name;
        }
    }
    return $post_cat_array;
}
class Products extends Widget_Base {

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
		return 'products';
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
		return __( 'Aircrafts Products', 'msitheme' );
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
		return 'eicon-products';
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
				'label' => __( 'Products content', 'msitheme' ),
			]
		);
		
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'msitheme' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .msitheme-product-wrap',
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
			'top_heading_border',
			[
				'label' => __( 'Top heading border?', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes'	=> __( 'Yes', 'msitheme' ), 
					'no'	=> __( 'No', 'msitheme' ), 
				],
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
			'count',
			[
				'label' => __( 'Post count', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '3',
			]
		);

        $this->add_control(
            'cat_ids',
            [
                'label' => __( 'Select Categories', 'msitheme' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => msitheme_product_cat_list(),
				'condition' => [
					'post_type' => 'product',
				],
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
			'show_bottom_content',
			[
				'label' => __( 'Show bottom content?', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'msitheme' ),
				'label_off' => __( 'Hide', 'msitheme' ),
				'return_value' => 'yes',
				'default' => 'yes',
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
				'condition'	=> [
					'show_bottom_content'	=> 'yes',
				],
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
				'condition'	=> [
					'show_bottom_content'	=> 'yes',
				],
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
				'condition'	=> [
					'show_bottom_content'	=> 'yes',
				],
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
				'condition'	=> [
					'show_bottom_content'	=> 'yes',
				],
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
		$this->add_control(
			'show_btn',
			[
				'label' => __( 'Show button', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'msitheme' ),
				'label_off' => __( 'Hide', 'msitheme' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition'	=> [
					'show_bottom_content'	=> 'yes',
				],
			]
		);
		$this->add_control(
			'btn_label',
			[
				'label'	=> __( 'Button label', 'msitheme' ),
				'type'	=> Controls_Manager::TEXT,
				'label_block'	=> true,
				'condition'	=> [
					'show_btn'	=> 'yes',
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
				'label' => __( 'TOp Heading Color', 'msitheme' ),
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

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography for post heading', 'msitheme' ),
				'selector' => '{{WRAPPER}} .single-product-item .entry-details h4 a',
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
					'{{WRAPPER}} .single-product-item .entry-details h4 a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'label' => __( 'Typography for post excerpt', 'msitheme' ),
				'selector' => '{{WRAPPER}} .single-product-item .entry-details .excerpt',
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
					'{{WRAPPER}} .single-product-item .entry-details .excerpt' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'label' => __( 'Typography for post category', 'msitheme' ),
				'selector' => '{{WRAPPER}} .single-product-item .entry-details .section-top-heading',
			]
		);
		$this->add_control(
			'cat_color',
			[
				'label' => __( 'Post category Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#B1DEE3',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .single-product-item .entry-details .section-top-heading' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'heading_border_color',
			[
				'label' => __( 'Category Border Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#fff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .single-product-item .entry-details .section-top-heading::before, .single-product-item .entry-details .section-top-heading::after' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'heading_border_width',
			[
				'label' => __( 'Border width', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .single-product-item .entry-details .section-top-heading::before' => 'width: {{VALUE}}%',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => __( 'Typography for button', 'msitheme' ),
				'selector' => '{{WRAPPER}} .single-product-item .entry-details a.readmore-btn',
			]
		);
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Button Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFF',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .single-product-item .video-item a.readmore-btn' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'link_hover_color',
			[
				'label' => __( 'Link Hover Color', 'msitheme' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFF',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .single-product-item .video-item a.readmore-btn:hover' => 'color: {{VALUE}}',
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
			$q = new \WP_Query( [
				'post_type'	=> 'product', 
				'posts_per_page' => $settings['count'],
				'orderby'	=> $settings['orderby'],
				'order'	=> $settings['order'],
				'post_status'	=> $settings['post_status'],
				'tax_query'	=> array(
					array(
						'taxonomy'	=> 'product_cats',
						'field'		=> 'term_id',
						'terms'		=> $settings['cat_ids']
					)
				),
			] );
		} else {
			$q = new \WP_Query( [
				'post_type'	=> 'product',  
				'posts_per_page' => $settings['count'],
				'orderby'	=> $settings['orderby'],
				'order'	=> $settings['order'],
				'post_status'	=> $settings['post_status'],
			
			] );
		} 
		
		?>

			<div class="msitheme-product-wrap">
                <div class="container-default">
					<?php if($settings['show_section_title'] === 'yes') : ?>
						<div class="section-title">
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
					<?php endif; ?>

					<div class="gallery-wrapper products-wrap">
						<?php 
						while($q->have_posts()) : $q->the_post(); 
							$post_id = get_the_ID(); 

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
							<div class="single-product-item relative">
								<?php if($settings['show_img'] === 'yes') : ?>
									<div class="entry-media">
										<?php 
										if(has_post_thumbnail( $post_id )) :
											if ( !empty($msitheme_meta['post_extra_img']) ) { ?>
												<img class="custom-blog-img" src="<?php echo esc_url($post_extra_img['url']); ?>" alt="<?php echo esc_attr( the_title() ); ?>">
											<?php 
											} else {
												the_post_thumbnail($post_id); 
											}
										endif; 
										?>
										
									</div>
								<?php endif;

								if ( $settings['show_bottom_content'] === 'yes' ) : ?>
									<div class="entry-details absolute">
										<?php if($settings['show_cats'] === 'yes') : 
											$terms = get_the_terms($post_id, 'product_cats');
											if ($terms && !is_wp_error($terms)):
												if (!empty ($terms)) {
													$single_cat = $terms[0]->name;
													// $single_cat_link = get_category_link($terms[0]->term_id);
												}
											endif; 
											?>
												<h6 class="section-top-heading theme-border relative">
													<?php echo esc_html($single_cat); ?>
												</h6>
										<?php endif; ?>
										
										<?php if($settings['show_title'] === 'yes') : ?>
											<h4>
												<a href="<?php esc_url(the_permalink( $post_id )); ?>">
													<?php esc_html( the_title() ); ?>
												</a>
											</h4>
										<?php endif; ?>
										<?php if($settings['show_excerpt'] === 'yes') : ?>
											<p class="excerpt"><?php echo esc_html( $excerpt ); ?></p>
										<?php endif; ?>
										<?php if($settings['show_btn'] === 'yes') : ?>
											<div class="video-item">
												<a class="readmore-btn fz-12 fw-700 clrMidWhite" href="<?php esc_url(the_permalink( $post_id )); ?>">
													<?php if ( !empty($settings['btn_label']) ) : ?>
														<?php echo esc_html( $settings['btn_label'] ); ?>
													<?php else : ?>
														<?php esc_html_e( 'CHECK THE AIRCRAFT', 'msitheme' ); ?>
													<?php endif; ?>
												</a>
											</div>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		<?php wp_reset_query(); 
	}

}
