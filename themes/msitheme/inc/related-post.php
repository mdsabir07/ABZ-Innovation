<?php 

// 1
$related = get_posts( 
    array( 
        'category__in' => wp_get_post_categories( $post->ID ), 
        'numberposts'  => 5, 
        'post__not_in' => array( $post->ID ) 
    ) 
);

if( $related ) { 
    foreach( $related as $post ) {
        setup_postdata($post);
        /*whatever you want to output*/
    }
    wp_reset_postdata();
}

// by WP_Query
$related = new WP_Query(
    array(
        'category__in'   => wp_get_post_categories( $post->ID ),
        'posts_per_page' => 5,
        'post__not_in'   => array( $post->ID )
    )
);

if( $related->have_posts() ) { 
    while( $related->have_posts() ) { 
        $related->the_post(); 
        /*whatever you want to output*/
    }
    wp_reset_postdata();
}

// -----------------------------

// 2
function echo_related_posts() {
    global $post;
    // Get the current post's tags
    $tags = wp_get_post_tags( $post->ID );
    $tagIDs = array();
    if ( $tags ) {
        // Fill an array with the current post's tag ids
        $tagcount = count( $tags );
        for ( $i = 0; $i < $tagcount; $i++ ) {
            $tagIDs[$i] = $tags[$i]->term_id;
        }
        // Query options, the magic is with 'tag__in'
        $args = array(
            'tag__in' => $tagIDs,
            'post__not_in' => array( $post->ID ),
            'showposts'=> 5
        );
        $my_query = new WP_Query( $args );
        // If we have related posts, show them
        if ( $my_query->have_posts() ) {
            $related = '';
            while ( $my_query->have_posts() ) {
                $my_query->the_post();
                $current = $my_query->current_post + 1;
                $related .= "Related post " . $current . ": ";
                $related .= "<a href='" . get_permalink() . "' >";
                $related .= get_the_title();
                $related .= "</a>";
                if ( ( $my_query->current_post + 1 ) != ( $my_query->post_count ) ) $related .= ", ";
            }
            echo $related;
        }
        else echo "No related posts";
    }
    else echo "No related posts";
    wp_reset_query();
}
// https://stackoverflow.com/questions/12292332/displaying-related-posts-by-tags-on-category-template-page-in-wordpress
// --------------------------


// 3
$post_tag = get_the_tags ( $post->ID );
// Define an empty array
$ids = array();
// Check if the post has any tags
if ( $post_tag ) {
    foreach ( $post_tag as $tag ) {
        $ids[] = $tag->term_id; 
    }
}
// Now pass the IDs to tag__in
$args = array(
    'post_type' => 'property',
    'tag__in'   => $ids,
);
// Now proceed with the rest of your query
$related_posts = new WP_Query( $args );
// https://wordpress.stackexchange.com/questions/278128/wp-query-related-posts-by-current-page-tag-id
// --------------------------------


// 4
function custom_related_posts() {
    // Get the post ID.
    $post_id = get_the_ID();
    // Get the categories.
    $categories = get_the_category( $post_id );
    // Get the tags.
    $tags = get_the_tags( $post_id );
    // Initialize an empty array for the related posts.
    $related_posts = array();
    // If there are categories or tags, get related posts based on them.
    if ( $categories || $tags ) {
    // Set up the query arguments.
    $args = array(
    'post__not_in'   => array( $post_id ),
    'posts_per_page' => 3,
    'orderby'        => 'rand',
    );
    // If there are categories, add them to the query.
    if ( $categories ) {
    $category_ids = array();
    foreach ( $categories as $category ) {
    $category_ids[] = $category->term_id;
    }
    $args['category__in'] = $category_ids;
    }
    // If there are tags, add them to the query.
    if ( $tags ) {
    $tag_ids = array();
    foreach ( $tags as $tag ) {
    $tag_ids[] = $tag->term_id;
    }
    $args['tag__in'] = $tag_ids;
    }
    // Get the related posts.
    $related_posts = get_posts( $args );
    }
    // If there are no related posts based on categories or tags, get random posts.
    if ( empty( $related_posts ) ) {
    // Set up the query arguments.
    $args = array(
    'post__not_in'   => array( $post_id ),
    'posts_per_page' => 3,
    'orderby'        => 'rand',
    );
    // Get the random posts.
    $related_posts = get_posts( $args );
    }
    // Output the related posts.
    if ( ! empty( $related_posts ) ) {
    echo '<div class="related-posts">';
    foreach ( $related_posts as $related_post ) {
    setup_postdata( $related_post );
    echo '<div class="related-post">';
    echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
    if ( has_post_thumbnail() ) {
    echo '<img src="' . esc_url( get_the_post_thumbnail_url( $related_post->ID, 'medium' ) ) . '" alt="' . esc_attr( get_the_title() ) . '">';
    }
    echo '<h3>' . esc_html( get_the_title() ) . '</h3>';
    echo '<p>' . esc_html( get_the_content() ) . '</p>';
    echo '</a>';
    echo '</div>';
    }
    echo '</div>';
    wp_reset_postdata();
    }
   }
//    https://hoolite.be/wordpress/how-to-add-related-posts-to-your-wordpress-site-without-plugins-a-simple-guide/
