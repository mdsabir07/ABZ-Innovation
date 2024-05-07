<?php

// Control core classes for avoid errors
if (class_exists('CSF')) {

	// Set a unique slug-like ID
	$msitheme_options_prefix = 'msitheme_options';

	// Create options
	CSF::createOptions($msitheme_options_prefix, array(
		'menu_title' => 'Theme Options',
		'framework_title' => 'Theme Options',
		'menu_slug' => 'theme-options',
	));

	// Header options
	CSF::createCustomizeOptions( $msitheme_options_prefix );
	CSF::createSection( $msitheme_options_prefix, array(
		'id'    => 'header-options',
		'title' => esc_html__( 'Header settings', 'msitheme' ),
		'icon'   => 'fab fa-wordpress-simple',
	) );
	CSF::createSection($msitheme_options_prefix, array(
		'parent' => 'header-options',
        'title'  => esc_html__('Header options', 'msitheme'),
        'icon'   => 'fas fa-file-code',
		'fields' => array(
			// A text field
			
			array(
				'id' => 'header_button',
				'type' => 'text',
				'title' => esc_html__('Header button text', 'msitheme'),
			),
			
			array(
				'id' => 'header_button_link',
				'type' => 'text',
				'title' => esc_html__('Header button link', 'msitheme'),
			),
		)
	));




	 // Footer options
	 CSF::createCustomizeOptions( $msitheme_options_prefix );
	 CSF::createSection( $msitheme_options_prefix, array(
		 'id'    => 'footer-options',
		 'title' => esc_html__( 'Footer settings', 'msitheme' ),
		 'icon'   => 'fab fa-wordpress-simple',
	 ) );
	CSF::createSection($msitheme_options_prefix, array(
		'parent' => 'footer-options',
        'title'  => esc_html__('Footer informations', 'msitheme'),
        'icon'   => 'fas fa-file-code',
		'fields' => array(
			array(
				'id'                              => 'footer_bg',
				'type'                            => 'background',
				'title'                           => 'Background',
				'background_image'             => true,
				'background_blend_mode'           => true,
				'background_image_preview'           => true,
				'output'           => '.site-footer',
				'default'                         => array(
					'background-color'              => '',
					'background-gradient-color'     => '',
					'background-gradient-direction' => 'to bottom',
					'background-size'               => 'cover',
					'background-position'           => 'center center',
					'background-repeat'             => 'repeat',
				)
			),
			  
			
			array(
				'id' => 'logo_heading',
				'type' => 'text',
				'title' => esc_html__('Type heading under the logo', 'msitheme'),
			),
			
			array(
				'id' => 'address_head',
				'type' => 'text',
				'title' => esc_html__('Type address heading', 'msitheme'),
			),
			
			array(
				'id' => 'address_txt',
				'type' => 'textarea',
				'title' => esc_html__('Type address', 'msitheme'),
			),
		)
	));
	
	CSF::createSection($msitheme_options_prefix, array(
		'parent' => 'footer-options',
        'title'  => esc_html__('Social media', 'msitheme'),
        'icon'   => 'fas fa-file-code',
		'fields' => array(
			// A text field
			array(
				'id' => 'social_head',
				'type' => 'text',
				'title' => esc_html__('Type social heading', 'msitheme'),
			),
			array(
				'id'          => 'social_style',
				'type'        => 'select',
				'title'       => 'Social style',
				'placeholder' => 'Select social style',
				'options'     => array(
					'style1'  => 'Style 1',
					'style2'  => 'Style 2',
				),
				'default'     => 'style1'
			),
			// style 1
			array(
				'id' => 'facebook_label',
				'type' => 'text',
				'title' => esc_html__('Insert facebook label', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style1' ),
			),
			array(
				'id' => 'facebook_link',
				'type' => 'text',
				'title' => esc_html__('Insert facebook link', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style1' ),
			),
			
			array(
				'id' => 'linkedin_label',
				'type' => 'text',
				'title' => esc_html__('Insert linkedin label', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style1' ),
			),
			array(
				'id' => 'linkedin_link',
				'type' => 'text',
				'title' => esc_html__('Insert linkedin link', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style1' ),
			),
			
			array(
				'id' => 'instagram_label',
				'type' => 'text',
				'title' => esc_html__('Insert instagram label', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style1' ),
			),
			array(
				'id' => 'instagram_link',
				'type' => 'text',
				'title' => esc_html__('Insert instagram link', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style1' ),
			),
			
			array(
				'id' => 'twitter_label',
				'type' => 'text',
				'title' => esc_html__('Insert twitter label', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style1' ),
			),
			array(
				'id' => 'twitter_link',
				'type' => 'text',
				'title' => esc_html__('Insert twitter link', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style1' ),
			),
			
			array(
				'id' => 'tiktok_label',
				'type' => 'text',
				'title' => esc_html__('Insert tiktok label', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style1' ),
			),
			array(
				'id' => 'tiktok_link',
				'type' => 'text',
				'title' => esc_html__('Insert tiktok link', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style1' ),
			),
			
			array(
				'id' => 'youtube_label',
				'type' => 'text',
				'title' => esc_html__('Insert youtube label', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style1' ),
			),
			array(
				'id' => 'youtube_link',
				'type' => 'text',
				'title' => esc_html__('Insert youtube link', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style1' ),
			),

			// style 2
			array(
				'id' => 'facebook',
				'type' => 'text',
				'title' => esc_html__('Insert facebook link', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style2' ),
			),
			
			array(
				'id' => 'linkedin',
				'type' => 'text',
				'title' => esc_html__('Insert linkedin link', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style2' ),
			),
			
			array(
				'id' => 'instagram',
				'type' => 'text',
				'title' => esc_html__('Insert instagram link', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style2' ),
			),
			
			array(
				'id' => 'twitter',
				'type' => 'text',
				'title' => esc_html__('Insert twitter link', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style2' ),
			),
			
			array(
				'id' => 'tiktok',
				'type' => 'text',
				'title' => esc_html__('Insert tiktok link', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style2' ),
			),
			
			array(
				'id' => 'youtube',
				'type' => 'text',
				'title' => esc_html__('Insert youtube link', 'msitheme'),
				'dependency' => array( 'social_style', '==', 'style2' ),
			),
			array(
				'id'      => 'social_typo',
				'type'    => 'typography',
				'title'   => 'Social Typography',
				'output'  => '.social-links a, footer-socials a',
				'default' => array(
					'color'          => '#282929',
					'font-family'    => 'Archivo',
					'font-size'      => '16',
					'line-height'    => '24',
					'letter-spacing' => '',
					'text-align'     => 'center',
					'text-transform' => 'Capitalize',
					'subset'         => 'latin-ext',
					'type'           => 'google',
					'unit'           => 'px',
				),
			),
			array(
				'id'      => 'social_border',
				'type'    => 'border',
				'title'   => 'Social Border',
				'output'  => '.social-links a, footer-socials a',
				'default' => array(
					'top'    => '',
					'right'  => '',
					'bottom' => '',
					'left'   => '',
					'style'  => '',
					'color'  => '#1e73be',
					'unit'   => 'px',
				),
			),
		)
	));

	CSF::createSection($msitheme_options_prefix, array(
		'parent' => 'footer-options',
        'title'  => esc_html__('Contact information', 'msitheme'),
        'icon'   => 'fas fa-file-code',
		'fields' => array(
			// A text field
			array(
				'id'    => 'email_widget_heading',
				'type'  => 'text',
				'title' => 'widget heading',
			),
			array(
				'id'        => 'foo_emails',
				'type'      => 'repeater',
				'title'     => 'Emails',
				'fields'    => array(
					array(
						'id'    => 'email_heading',
						'type'  => 'text',
						'title' => 'Email heading Text',
					),
					array(
						'id'    => 'email',
						'type'  => 'text',
						'title' => 'Email Text',
					),
					array(
						'id'    => 'email_link',
						'type'  => 'text',
						'title' => 'Email link',
					),
				
				)
			),
		)
	));


	
	// 404 options
	CSF::createCustomizeOptions( $msitheme_options_prefix );
	CSF::createSection( $msitheme_options_prefix, array(
		'id'    => 'error-options',
		'title' => esc_html__( '404 page settings', 'msitheme' ),
		'icon'   => 'fab fa-wordpress-simple',
	) );
	CSF::createSection($msitheme_options_prefix, array(
		'parent' => 'error-options',
        'title'  => esc_html__('404 page options', 'msitheme'),
        'icon'   => 'fas fa-file-code',
		'fields' => array(
			// A text field
			array(
                'id'    => '404_main_img',
                'type'  => 'media',
                'title' => esc_html__('Add 404 image', 'msitheme'),
            ),
			array(
                'id'    => 'left_border_img',
                'type'  => 'media',
                'title' => esc_html__('Add 404 left border image', 'msitheme'),
            ),
			array(
                'id'    => 'right_border_img',
                'type'  => 'media',
                'title' => esc_html__('Add 404 right border image', 'msitheme'),
            ),
			array(
				'id' => 'head_404',
				'type' => 'textarea',
				'title' => esc_html__('Type heading text', 'msitheme'),
			),
			array(
				'id' => 'paragraph_404',
				'type' => 'textarea',
				'title' => esc_html__('Type description text', 'msitheme'),
			),
			array(
				'id'        => 'btns_404',
				'type'      => 'repeater',
				'title'     => '404 Buttons',
				'fields'    => array(
					array(
						'id'    => 'btn_404',
						'type'  => 'text',
						'title' => 'Button Text',
					),
					array(
						'id'    => 'link_404',
						'type'  => 'text',
						'title' => 'Button link',
					),
				
				)
			),
		)
	));


	// Create a section
	CSF::createSection($msitheme_options_prefix, array(
		'title' => 'Backup',
		'fields' => array(
			// A textarea field
			array(
				'id' => 'backup',
				'type' => 'backup',
				'title' => 'Backup',
			),
		)
	));
} 

// Metabox 
if (class_exists('CSF')) {
	// Set a unique slug-like ID
	$msitheme_metabox_prefix = 'msitheme_page_meta';
	// Create a metabox
	CSF::createMetabox($msitheme_metabox_prefix, array(
		'title' => 'Page Options',
		'post_type' => 'page',
		'data_type' => 'serialize',
	));

	// Create a section
	CSF::createSection($msitheme_metabox_prefix, array(
		'fields' => array(
			
			array(
				'id'          => 'header_type',
				'type'        => 'select',
				'title'       => 'Heady type',
				'placeholder' => 'Select Heady type',
				'options'     => array(
					'style1'  => 'Full width',
					'style2'  => 'Box',
				),
				'default'     => 'style1'
			),
			array(
				'id'                              => 'absolute_header_bg',
				'type'                            => 'background',
				'title'                           => 'Header Background',
				// 'background_image'             => true,
				'background_origin'               => true,
  				'background_clip'                 => true,
				'background_gradient'             => true,
				'background_blend_mode'           => true,
				'background_image_preview'           => true,
				'output'           => '.absolute-header .header-wrap',
				'default'                         => array(
					'background-color'              => '',
					'background-gradient-color'     => '',
					'background-gradient-direction' => 'right to left',
					'background-size'               => 'cover',
					'background-position'           => 'center center',
					'background-repeat'             => 'repeat',
				),
				'dependency' => array( 'header_type', '==', 'style2' ),
			),
			array(
				'id'          => 'absolute_header_padding',
				'type'        => 'spacing',
				'title'       => 'Header Padding',
				'output'      => '.absolute-header .header-wrap',
				'output_mode' => 'padding', // or margin, relative
				'default'     => array(
					'top'       => '5',
					'right'     => '5',
					'bottom'    => '5',
					'left'      => '15',
					'unit'      => 'px',
				),
				'dependency' => array( 'header_type', '==', 'style2' ),
			),
			array(
				'id'      => 'absolute_header_border',
				'type'    => 'border',
				'title'   => 'Border',
				'output'  => '.absolute-header .header-wrap',
				'default' => array(
					'top'    => '',
					'right'  => '',
					'bottom' => '',
					'left'   => '',
					'style'  => '',
					'color'  => '#1e73be',
					'unit'   => 'px',
				),
				'dependency' => array( 'header_type', '==', 'style2' ),
			),
			array(
				'id' => 'absolute_header_border_radius',
				'type' => 'text',
				'title' => esc_html__('Header border redius', 'msitheme'),
				'output'  => array(	'border-radius' => '.absolute-header .header-wrap' ),
				'dependency' => array( 'header_type', '==', 'style2' ),
			),
			array(
				'id'                              => 'header_bg',
				'type'                            => 'background',
				'title'                           => 'Header Background',
				'background_image'             => true,
				'background_gradient'             => true,
				'background_blend_mode'           => true,
				'background_image_preview'           => true,
				'output'           => '.fullwidth-header',
				'default'                         => array(
					'background-color'              => '#282929',
					'background-gradient-color'     => '#555',
					'background-gradient-direction' => 'to bottom',
					'background-size'               => 'cover',
					'background-position'           => 'center center',
					'background-repeat'             => 'repeat',
				),
				'dependency' => array( 'header_type', '==', 'style1' ),
			),
			// changing header menu color as per the page
			array(
				'id'     => 'header_menu_color',
				'type'   => 'color',
				'title'  => 'Change Header Menu Color',
				'output' => array( 
					'color' => '.main-navigation ul li a, .header-btn .theme-btn, .header-right-content .languages', 
					'border-color' => '.main-navigation ul ul li, .header-btn .bordered-btn', 
					'background' => '.main-navigation ul ul li::before' 
				)
			),
			array(
				'id'     => 'header_drop_menu_color',
				'type'   => 'color',
				'title'  => 'Change Header Dropdown Menu Background Color',
				'output' => array( 'background' => '.main-navigation ul ul' )
			),
			array(
				'id'     => 'header_btn_color',
				'type'   => 'color',
				'title'  => 'Change Header button Color',
				'output' => array( 'color' => '.header-btn .theme-btn' )
			),
			array(
				'id'      => 'header-logo',
				'type'    => 'media',
				'title'   => 'Change header logo',
				'library' => 'image',
			),
			
			array(
				'id'                              => 'body_bg',
				'type'                            => 'background',
				'title'                           => 'Body Background',
				// 'background_image'             => true,
				'background_origin'               => true,
  				'background_clip'                 => true,
				'background_gradient'             => true,
				'background_blend_mode'           => true,
				'background_image_preview'           => true,
				'output'           => 'body',
				'default'                         => array(
					'background-color'              => '',
					'background-gradient-color'     => '',
					'background-gradient-direction' => 'right to left',
					'background-size'               => 'cover',
					'background-position'           => 'center center',
					'background-repeat'             => 'repeat',
				)
			),
		)
	));


	// Metabox 
	// Set a unique slug-like ID
	$msitheme_post_metabox_prefix = 'msitheme_post_meta';
	// Create a metabox
	CSF::createMetabox($msitheme_post_metabox_prefix, array(
		'title' => 'Extra Post Options',
		'post_type' => 'post',
		'data_type' => 'serialize',
		'context'   => 'side',
	));

	// Create a section
	CSF::createSection($msitheme_post_metabox_prefix, array(
		'title' => esc_html__('Post small image', 'msitheme'),
		'fields' => array(
			array(
				'id' => 'post_extra_img',
				'type' => 'media',
				'title' => 'Upload image',
			),
		)
	));

	// Dealer post Metabox 
	// Set a unique slug-like ID
	$msitheme_dealer_metabox_prefix = 'msitheme_dealer_meta';
	// Create a metabox
	CSF::createMetabox($msitheme_dealer_metabox_prefix, array(
		'title' => 'Dealer optons',
		'post_type' => 'dealer',
		'data_type' => 'serialize',
	));

	// Create a section
	CSF::createSection($msitheme_dealer_metabox_prefix, array(
		'title' => esc_html__('Dealer name and business', 'msitheme'),
		'fields' => array(
			array(
				'id' => 'dealer_name',
				'type' => 'text',
				'title' => 'Dealer name',
			),
			array(
				'id' => 'dealer_business',
				'type' => 'text',
				'title' => 'Dealer business',
			),
		)
	));

	// Create a section
	CSF::createSection($msitheme_dealer_metabox_prefix, array(
		'title' => esc_html__('Dealer contact informatons', 'msitheme'),
		'fields' => array(
			// phone 
			array(
				'id'      => 'phone_icon',
				'type'    => 'icon',
				'title'   => 'Select phone Icon',
				'default' => 'fa fa-phone'
			),
			array(
				'id'    => 'phone_num',
				'type'  => 'text',
				'title' => 'Phone number',
				// 'dependency' => array( 'info_field_type', '==', 'text' ),
			),
			array(
				'id'    => 'num_link',
				'type'  => 'text',
				'title' => 'Insert link (exam: tel:+34523542)',
				// 'dependency' => array( 'info_field_type', '==', 'link' ),
			),
			// email 
			array(
				'id'      => 'mail_icon',
				'type'    => 'icon',
				'title'   => 'Select email Icon',
				'default' => 'fa fa-heart'
			),
			array(
				'id'    => 'mail_name',
				'type'  => 'text',
				'title' => 'Insert email address',
				// 'dependency' => array( 'info_field_type', '==', 'text' ),
			),
			array(
				'id'    => 'email_link',
				'type'  => 'text',
				'title' => 'Insert link (exam: mailto:email@domain.com)',
				// 'dependency' => array( 'info_field_type', '==', 'link' ),
			),
			// address
			array(
				'id'      => 'address_icon',
				'type'    => 'icon',
				'title'   => 'Select address Icon',
				'default' => 'fa fa-heart'
			),
			array(
				'id'    => 'address_name',
				'type'  => 'textarea',
				'title' => 'Address',
				// 'dependency' => array( 'info_field_type', '==', 'text' ),
			),
		)
	));


	// Create a section
	CSF::createSection($msitheme_post_metabox_prefix, array(
		'title' => esc_html__('Post header customization', 'msitheme'),
		'fields' => array(
			// changing header menu color as per the page
			array(
				'id'     => 'header_menu_color',
				'type'   => 'color',
				'title'  => 'Change Header Menu Color',
				'output' => array( 
					'color' => '.main-navigation ul li a, .header-btn .theme-btn, .header-right-content .languages', 
					'border-color' => '.main-navigation ul ul li, .site-header .header-wrap, .header-btn .bordered-btn', 
					'background' => '.main-navigation ul ul li::before' 
				)
			),
			array(
				'id'     => 'header_drop_menu_color',
				'type'   => 'color',
				'title'  => 'Change Header Dropdown Menu Background Color',
				'output' => array( 'background' => '.main-navigation ul ul' )
			),
			array(
				'id'      => 'header-logo',
				'type'    => 'media',
				'title'   => 'Change header logo',
				'library' => 'image',
			),
			// array(
			// 	'id'                              => 'header_bg',
			// 	'type'                            => 'background',
			// 	'title'                           => 'Header Background',
			// 	'background_gradient'             => true,
			// 	'background_blend_mode'           => true,
			// 	'background_image_preview'           => true,
			// 	'output'           => '.site-header',
			// 	'default'                         => array(
			// 		'background-color'              => '#111',
			// 		'background-gradient-color'     => '#555',
			// 		'background-gradient-direction' => 'to bottom',
			// 		'background-size'               => 'cover',
			// 		'background-position'           => 'center center',
			// 		'background-repeat'             => 'repeat',
			// 	)
			// ),
		)
	));

} 