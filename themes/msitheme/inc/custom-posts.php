<?php 

/*
* Creating a function to create our CPT
*/
  
function msitheme_product_custom_post_type() {
    $labels = array(
        'name'                => _x( 'Products', 'Post Type General Name', 'msitheme' ),
        'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'msitheme' ),
        'menu_name'           => __( 'Products', 'msitheme' ),
        'parent_item_colon'   => __( 'Parent Product', 'msitheme' ),
        'all_items'           => __( 'All Products', 'msitheme' ),
        'view_item'           => __( 'View Product', 'msitheme' ),
        'add_new_item'        => __( 'Add New Product', 'msitheme' ),
        'add_new'             => __( 'Add New', 'msitheme' ),
        'edit_item'           => __( 'Edit Product', 'msitheme' ),
        'update_item'         => __( 'Update Product', 'msitheme' ),
        'search_items'        => __( 'Search Product', 'msitheme' ),
        'not_found'           => __( 'Not Found', 'msitheme' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'msitheme' ),
    );
   
    $args = array(
        'label'               => __( 'products', 'msitheme' ),
        'description'         => __( 'Product news and reviews', 'msitheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions',       
                                        'custom-fields', 'trackbacks', 'page-attributes', 'post-formats' ),
        'taxonomies'          => array( 'product_cats' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-airplane',
    
    );
    register_post_type( 'product', $args );


     // Event
     register_post_type( 'event', [
        'labels'    => [
            'name'  => 'Events',
            'singular_name' => 'Event',
            'add_new_item'  => 'Add New Event'
        ],
        'public'    => true,
        'supports'  => ['title', 'editor', 'thumbnail', 'page-attributes', 'comments'],
        'menu_position' => 6,
        'menu_icon'           => 'dashicons-networking',
        'can_export'          => true,
    ] );

     // Gallery
     register_post_type( 'gallery', [
        'labels'    => [
            'name'  => 'Galleries',
            'singular_name' => 'Gallery',
            'add_new_item'  => 'Add New Gallery'
        ],
        'public'    => false,
        'show_ui'    => true,
        'supports'  => ['title', 'editor', 'thumbnail', 'page-attributes', 'comments'],
        'menu_position' => 7,
        'menu_icon'         => 'dashicons-format-gallery',
        'can_export'          => true,
    ] );

     // Dealer
     register_post_type( 'dealer', [
            'labels'    => [
                'name'  => 'Dealers',
                'singular_name' => 'Dealer',
                'add_new_item'  => 'Add New Dealer'
            ],
            'public'    => false,
            'show_ui'    => true,
            'supports'  => ['title', 'thumbnail', 'page-attributes'],
            'menu_position' => 8,
            'menu_icon'     => 'dashicons-groups',
            'can_export'    => true,
        ] 
    );

     // Dealer
     register_post_type( 'faq', [
            'labels'    => [
                'name'  => 'FAQs',
                'singular_name' => 'FAQ',
                'add_new_item'  => 'Add New FAQ'
            ],
            'public'    => false,
            'show_ui'    => true,
            'supports'  => ['title', 'editor', 'page-attributes'],
            'menu_position' => 9,
            'menu_icon'     => 'dashicons-info-outline',
            'can_export'    => true,
        ] 
    );


    // Create product custom post taxonomy
    register_taxonomy( 'product_cats', 'product', [
        'hierarchical'  => true,
        'label' => 'Product Category',
        'query_var' => true,
        'show_admin_column' => true,
        'rewrite'   => [
            'slug'  => 'product-category',
            'with_front'    => true
        ]
    ] );

    // Create product custom post taxonomy
    register_taxonomy( 'event_cat', 'event', [
        'hierarchical'  => true,
        'label' => 'Event Category',
        'query_var' => true,
        'show_admin_column' => true,
        'rewrite'   => [
            'slug'  => 'event-category',
            'with_front'    => true
        ]
    ] );

    // Create product custom post taxonomy
    register_taxonomy( 'gallery_cat', 'gallery', [
        'hierarchical'  => true,
        'label' => 'Gallery Category',
        'query_var' => true,
        'show_admin_column' => true,
        'rewrite'   => [
            'slug'  => 'gallery-category',
            'with_front'    => true
        ]
    ] );
    // Create product custom post taxonomy
    register_taxonomy( 
        'dealer_cat', 'dealer', 
        [
            'hierarchical'  => true,
            'label' => 'Dealer Category',
            'query_var' => true,
            'show_admin_column' => true,
            'rewrite'   => [
                'slug'  => 'dealer-category',
                'with_front'    => true
            ]
        ] 
    );
    // Create product custom post taxonomy
    register_taxonomy( 
        'faq_cat', 'faq', 
        [
            'hierarchical'  => true,
            'label' => 'FAQ Category',
            'query_var' => true,
            'show_admin_column' => true,
            'rewrite'   => [
                'slug'  => 'faq-category',
                'with_front'    => true
            ]
        ] 
    );
    
}
add_action( 'init', 'msitheme_product_custom_post_type', 0 );