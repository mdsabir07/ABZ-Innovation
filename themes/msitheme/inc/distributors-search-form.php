<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function distributor_list_shortcode($atts) {
    extract( shortcode_atts( array(
        'count' => -1,
	), $atts) );
	

	if(!empty($_GET['c_name'])) {
		$c_name = $_GET['c_name'];
	} else {
		$c_name = '';
	}

	if(!empty($_GET['d_country'])) {
		$d_country = $_GET['d_country'];
	} else {
		$d_country = '';
	}


	$tax_query = array('relation' => 'AND');

	if(!empty($d_country)) {
		$tax_query[] = array(
			'taxonomy' => 'distributor_cat',
			'fields' => 'id',
			'terms' => $d_country
		);
	}
     
    $q = new WP_Query(
		array(
			'posts_per_page' => $count, 
			'post_type' => 'distributor',
			's' => $c_name,
			'tax_query' => $tax_query
		)
	); 
	
        $list = '';

        $list .= '<form action="" class="distributor-search" style="display: flex;justify-content: space-around;">
            <input value="'.$c_name.'" type="search" style="width: 95%;" name="c_name" placeholder="Type countries Name"/>
        ';

            $distributor_cat = get_terms( 'distributor_cat' );
            if(! empty( $distributor_cat ) && ! is_wp_error( $distributor_cat )) {
                $list .='<div class="search-element" style="width: 100%;"><select name="d_country" style="width: 95%;"><option value="">All countries</option>';
                foreach ( $distributor_cat as $country ) {
                    if($d_country == $country->term_id) {
                        $c_markup = 'selected="selected"';
                    } else {
                        $c_markup = '';
                    }
                    $list .= '<option '.$c_markup.' value="' . $country->term_id . '">' . $country->name . '</option>';
                }
                $list .='</select></div>';
            }

            $list .='
            <button type="submit">Search</button>
        </form>';
            
        $list .= '<div class="distributor-list">';
        if ( $q->have_posts() ) :
            while($q->have_posts()) : $q->the_post();
                $post_id = get_the_ID();
                $title = get_the_title( $post_id );
                $content = get_the_content($post_id);

                if (get_post_meta( get_the_ID(), 'msitheme_distributors_meta', true )) {
                    $page_meta = get_post_meta( get_the_ID(), 'msitheme_distributors_meta', true );
                } else {
                    $page_meta = array();
                }
                
                if (array_key_exists('distributor_city', $page_meta)) {
                    $distributor_city = $page_meta['distributor_city'];
                } else {
                    $distributor_city = '';
                }
                
                if (array_key_exists('distributor_address', $page_meta)) {
                    $distributor_address = $page_meta['distributor_address'];
                } else {
                    $distributor_address = '';
                }
                
                if (array_key_exists('distributor_email', $page_meta)) {
                    $distributor_email = $page_meta['distributor_email'];
                } else {
                    $distributor_email = '';
                }
                
                if (array_key_exists('distributor_website', $page_meta)) {
                    $distributor_website = $page_meta['distributor_website'];
                } else {
                    $distributor_website = '';
                }

                $list .= '<div class="single-distributor-item grid">';
                    $countries = get_the_terms( $post_id, 'distributor_cat' );
                    if ( $countries && ! is_wp_error( $countries )) :
                        $countries_array = array();
                        foreach($countries as $country){
                            $countries_array[] = $country->name;
                        }
                        $countrie = join( ", ", $countries_array );
                        $list .= '
                        <div class="dist-country">
                            <label class="distributor-label clrOrange fw-700 fz-24 lh-29">Country</label> 
                            '.esc_html( $countrie ).'
                        </div>';
                    endif;
                    if ( !empty( $distributor_city ) ) :
                        $list .= '
                        <div class="dist-city">
                            <label class="distributor-label clrOrange fw-700 fz-24 lh-29">City</label> 
                            '.esc_html( $distributor_city ).'
                        </div>';
                    endif; if ( !empty($title) ) :
                        $list .= '
                        <div class="dist-company">
                            <label class="distributor-label clrOrange fw-700 fz-24 lh-29">Company</label>
                            '.esc_html( $title ).'
                        </div>';
                    endif; if ( !empty( $distributor_address ) ) :
                        $list .= '
                        <div class="dist-address">
                            <label class="distributor-label clrOrange fw-700 fz-24 lh-29">Contact</label>
                            '.esc_html( $distributor_address ).'
                        </div>';
                    endif; if ( !empty($content) ) :
                        $list .= '
                        <div class="dist-phone">
                            <label class="distributor-label clrOrange fw-700 fz-24 lh-29">Phone number</label>
                            '.wp_kses_post( $content ).'
                        </div>';
                    endif; if ( !empty( $distributor_email ) ) :
                        $list .= '
                        <div class="dist-email">
                            <label class="distributor-label clrOrange fw-700 fz-24 lh-29">Email</label>
                            <a href="mailto:'.$distributor_email.'">'.esc_html( $distributor_email ).'</a>
                        </div>';
                    endif; if ( !empty( $distributor_website ) ) :
                        $list .= '
                        <div class="dist-website">
                            <label class="distributor-label clrOrange fw-700 fz-24 lh-29">Website</label>
                            <a href="'.esc_url( $distributor_website ).'">'.esc_html( $distributor_website ).'</a>
                        </div>';
                    endif;   
                $list.= '</div>';    
            endwhile;
            else : 
                $list.= '
                <div>
                    
                    <label class="d-block clrOrange fw-700">Note:</label>
                    While we have distributors in many countries, some regions are still awaiting partners. In these areas, please reach out directly to our Hungarian headquarters. We provide full production support, direct sales, and everything you need. <b>Or contact us to become a distributor</b>.
                </div>';
            endif;
        $list.= '</div>';
    wp_reset_query();
    return $list;
}
add_shortcode('distributors', 'distributor_list_shortcode');


// Distributor filter shortcode
function msitheme_distributor_filter_shortcode( $atts ){
    extract( shortcode_atts( 
        array(
            'count' => -1,
            'post_type' => 'distributor',
            'order' => 'DESC',
            'orderby' => 'comment_count',
        ), $atts  )
    );

    ?>
    <div class="msitheme-distributor-filter">
        <div class="container-default">
            <div class="distributor-open">
                <input type="text" class="distributor-placeholder" id="distributorToggle" placeholder="Select a country" readonly>
                <ul class="distributor-filter-cats list-unstyled">
                    <?php 
                        $cat_info = get_terms( 'distributor_cat', array('hide_empty' => true) );
                        foreach ($cat_info as $cat) : 
                    ?>
                        <li class="distributor-cat-list fz-12 fw-700 lh-18 uppercase" data-filter="<?php echo esc_attr( $cat->slug ); ?>">
                            <?php echo esc_attr( $cat->name ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <!-- <select id="mySelect">
                    <?php 
                        // $cat_info = get_terms( 'distributor_cat', array('hide_empty' => true) );
                        // foreach ($cat_info as $cat) : 
                    ?>
                        <option class="distributor-cat-list fz-12 fw-700 lh-18 uppercase" value="1" data-filter="<?php//echo esc_attr( $cat->slug ); ?>">
                            <?php //echo esc_attr( $cat->name ); ?>
                        </option>
                    <?php //endforeach; ?>
                </select> -->
            </div>
            <div class="all-distributors">
                <?php 
                $q = new WP_Query( 
                    array(
                        'post_type'	=> $post_type,
                        'posts_per_page' => $count,
                        'order' => $order,
                        'orderby' => $orderby
                    ) 
                );

                while($q->have_posts()) : $q->the_post();
                    $post_id = get_the_ID();
                    $title = get_the_title( $post_id );
                    $content = get_the_content($post_id);

                    if (get_post_meta( get_the_ID(), 'msitheme_distributors_meta', true )) {
                        $page_meta = get_post_meta( get_the_ID(), 'msitheme_distributors_meta', true );
                    } else {
                        $page_meta = array();
                    }
                    
                    if (array_key_exists('distributor_city', $page_meta)) {
                        $distributor_city = $page_meta['distributor_city'];
                    } else {
                        $distributor_city = '';
                    }
                    
                    if (array_key_exists('distributor_address', $page_meta)) {
                        $distributor_address = $page_meta['distributor_address'];
                    } else {
                        $distributor_address = '';
                    }
                    
                    if (array_key_exists('distributor_email', $page_meta)) {
                        $distributor_email = $page_meta['distributor_email'];
                    } else {
                        $distributor_email = '';
                    }
                    
                    if (array_key_exists('distributor_website', $page_meta)) {
                        $distributor_website = $page_meta['distributor_website'];
                    } else {
                        $distributor_website = '';
                    }

                    $distributor_category = get_the_terms( $post_id, 'distributor_cat' );
                    if ( !empty( $distributor_category && ! is_wp_error( $distributor_category ) ) ) {
                        $distributor_cat_list = array();
                        foreach ($distributor_category as $category) {
                            $distributor_cat_list[] = $category->slug;
                        }
                        $distributor_assigned_cat = join(" ", $distributor_cat_list);
                    } else {
                        $distributor_assigned_cat = '';
                    }
	
					if ( !empty( $distributor_category && ! is_wp_error( $distributor_category ) ) ) {
                        $distributor_cat_name_list = array();
                        foreach ($distributor_category as $category) {
                            $distributor_cat_name_list[] = $category->name;
                        }
                        $distributor_assigned_cat_name = join(", ", $distributor_cat_name_list);
                    } else {
                        $distributor_assigned_cat_name = '';
                    }
                    ?>
                    <div class="single-distributor-item grid <?php echo esc_attr( $distributor_assigned_cat ) ?>">
                        <div class="dist-country">
                            <label class="distributor-label clrOrange fw-700 fz-24 lh-29">Country</label> 
                            <?php echo esc_html( $distributor_assigned_cat_name /*$category->name*/ ); ?>
                        </div>
                        <?php if ( !empty( $distributor_city ) ) : ?>
                            <div class="dist-city">
                                <label class="distributor-label clrOrange fw-700 fz-24 lh-29">City</label> 
                                <?php echo esc_html( $distributor_city ); ?>
                            </div>
                        <?php endif; if ( !empty($title) ) : ?>
                            <div class="dist-company">
                                <label class="distributor-label clrOrange fw-700 fz-24 lh-29">Company</label>
                                <?php echo esc_html( $title ); ?>
                            </div>
                        <?php endif; if ( !empty( $distributor_address ) ) : ?>
                            <div class="dist-address">
                                <label class="distributor-label clrOrange fw-700 fz-24 lh-29">Contact</label>
                                <?php echo esc_html( $distributor_address ); ?>
                            </div>
                        <?php endif; if ( !empty($content) ) : ?>
                            <div class="dist-phone">
                                <label class="distributor-label clrOrange fw-700 fz-24 lh-29">Phone number</label>
                                <?php echo wp_kses_post( $content ); ?>
                            </div>
                        <?php endif; if ( !empty( $distributor_email ) ) : ?>
                            <div class="dist-email">
                                <label class="distributor-label clrOrange fw-700 fz-24 lh-29">Email</label>
                                <a href="mailto:<?php echo $distributor_email; ?>">
                                    <?php echo esc_html( $distributor_email ); ?>
                                </a>
                            </div>
                        <?php endif; if ( !empty( $distributor_website ) ) : ?>
                            <div class="dist-website">
                                <label class="distributor-label clrOrange fw-700 fz-24 lh-29">Website</label>
                                <a href="<?php echo esc_url( $distributor_website ); ?>">
                                    <?php echo esc_html( $distributor_website ); ?>
                                </a>
                            </div>
                        <?php endif; ?> 
                    </div>
                <?php endwhile; wp_reset_query(); ?>
				<div id="no-distributor" class="">
					<div class="call-to-action-wrap">
						<div class="call-to-action-content">
							<div class="desc">
								<p>While we have distributors in many countries, some regions are still awaiting partners. In these areas, <span style="color: #f25119">please reach out directly</span> to our European headquarters. We provide full production support, direct sales, and everything you need.</p>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
        <script>
            // document.addEventListener("DOMContentLoaded", function() {
            //     var selectElement = document.getElementById("mySelect");
                
            //     selectElement.addEventListener("change", function() {
            //         var selectedOption = this.options[this.selectedIndex];
                    
            //         var options = selectElement.getElementsByTagName("option");
            //         for (var i = 0; i < options.length; i++) {
            //         options[i].classList.remove("active");
            //         }
                    
            //         selectedOption.classList.add("active");
            //     });
            // });

            // jQuery(document).ready(function($){
            //     $('#mySelect').on('change', function(){
            //         var selectedOption = $(this).val();
            //         if(selectedOption === '1') {
            //             $('.all-distributors').addClass('highlighted');
            //         } else {
            //             $('.all-distributors').removeClass('highlighted');
            //         }
            //     });
            // });
            
        </script>
    <?php
} 
add_shortcode( 'distributor_filter', 'msitheme_distributor_filter_shortcode'); 