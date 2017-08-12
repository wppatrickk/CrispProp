<?php
function crispprop_customizer( $wp_customize ) {
	$wp_customize->add_section( 'crispprop_settings', array(
	    'title' => __( 'General Settings', 'crispprop' ),
	    'priority' => 30,
	));

	$wp_customize->add_setting( 'crispprop_logo', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_img_sanitize_fallback',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'crispprop_logo', array(
	    'label'    => __( 'Logo', 'crispprop' ),
	    'section'  => 'crispprop_settings',
	    'settings' => 'crispprop_logo',
	)));

	$wp_customize->add_setting( 'crispprop_logo_max_width', array(
		'capability' => 'edit_theme_options',
		'default' => '250px',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_logo_max_width', array(
        'label'     => __('Logo Max Width', 'crispprop'),
        'description'     => __('In Pixels, for example 250px', 'crispprop'),
        'section'   => 'crispprop_settings',
        'settings'  => 'crispprop_logo_max_width',
        'type'      => 'text',
    )));

	$wp_customize->add_setting( 'crispprop_favicon', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_img_sanitize_fallback',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'crispprop_favicon', array(
	    'label'    => __( 'Favicon', 'crispprop' ),
	    'section'  => 'crispprop_settings',
	    'settings' => 'crispprop_favicon',
	)));

	$wp_customize->add_setting( 'crispprop_link_color', array(
		'default' => '#531c1b',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'crispprop_link_color', array(
		'label' => __( 'Default Link Color', 'crispprop' ),
		'settings' => 'crispprop_link_color',
		'section' => 'crispprop_settings',
	)));

	$wp_customize->add_section( 'crispprop_top_bar', array(
	    'title' => __( 'Top Bar Settings', 'crispprop' ),
	    'priority' => 31,
	));

	$wp_customize->add_setting( 'crispprop_top_bar_display', array(
		'capability' => 'edit_theme_options',
		'default' => false,
		'sanitize_callback' => 'crispprop_sanitize_checkbox',
	));

	$wp_customize->add_control( 'crispprop_top_bar_display', array(
		'type' => 'checkbox',
		'settings' => 'crispprop_top_bar_display',
		'section' => 'crispprop_top_bar',
		'label' => __( 'Hide Top Bar' ),
	));

	$wp_customize->add_setting( 'crispprop_top_bg', array(
		'default' => '#531c1b',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'crispprop_top_bg', array(
		'label' => __( 'Background', 'crispprop' ),
		'settings' => 'crispprop_top_bg',
		'section' => 'crispprop_top_bar',
	)));

	$wp_customize->add_setting( 'crispprop_top_font_color', array(
		'default' => '#ddd4b8',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'crispprop_top_font_color', array(
		'label' => __( 'Font Color', 'crispprop' ),
		'settings' => 'crispprop_top_font_color',
		'section' => 'crispprop_top_bar',
	)));

	$wp_customize->add_setting( 'crispprop_phone_number', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_phone_number', array(
        'label'     => __('Phone Number', 'crispprop'),
        'section'   => 'crispprop_top_bar',
        'settings'  => 'crispprop_phone_number',
        'type'      => 'text',
    )));

    $wp_customize->add_setting( 'crispprop_email', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_email', array(
        'label'     => __('Email Address', 'crispprop'),
        'description' => __('Contact form emails will be sent to this email.', 'crispprop'),
        'section'   => 'crispprop_top_bar',
        'settings'  => 'crispprop_email',
        'type'      => 'text',
    )));

    $wp_customize->add_section( 'crispprop_menu_settings', array(
	    'title' => __( 'Menu Color Settings', 'crispprop' ),
	    'priority' => 31,
	));

	$wp_customize->add_setting( 'crispprop_menu_color', array(
		'default' => '#777',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'crispprop_menu_color', array(
		'label' => __( 'Menu Color', 'crispprop' ),
		'settings' => 'crispprop_menu_color',
		'section' => 'crispprop_menu_settings',
	)));

	$wp_customize->add_setting( 'crispprop_menu_hover_color', array(
		'default' => '#531c1b',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'crispprop_menu_hover_color', array(
		'label' => __( 'Menu Hover Color', 'crispprop' ),
		'settings' => 'crispprop_menu_hover_color',
		'section' => 'crispprop_menu_settings',
	)));

	$wp_customize->add_section( 'crispprop_font', array(
	    'title' => __( 'Font Settings', 'crispprop' ),
	    'priority' => 31,
	));

	$wp_customize->add_setting( 'crispprop_site_font', array(
		'default' => 'open_sans',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_site_font', array(
	    'label' => __( 'Site Font', 'crispprop' ),
	    'section' => 'crispprop_font',
	    'settings' => 'crispprop_site_font',
	    'type' => 'select',
	    'choices' => array(
	        'droid_sans' => __( 'Droid Sans', 'crispprop' ),
	        'open_sans' => __( 'Open Sans', 'crispprop' ),
	        'oswald' => __( 'Oswald', 'crispprop' ),
	        'pt_sans' => __( 'PT Sans', 'crispprop' ),
	        'lato' => __( 'Lato', 'crispprop' ),
	        'raleway' => __( 'Raleway', 'crispprop' ),
	        'ubuntu' => __( 'Ubuntu', 'crispprop' )
	    )
	)));

	$wp_customize->add_setting( 'crispprop_site_font_size', array(
		'default' => '14px',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_site_font_size', array(
	    'label' => __( 'Site Font Size', 'crispprop' ),
	    'section' => 'crispprop_font',
	    'settings' => 'crispprop_site_font_size',
	    'type' => 'select',
	    'choices' => array(
	    	'12px' => __( '12px', 'crispprop' ),
	        '13px' => __( '13px', 'crispprop' ),
			'14px' => __( '14px', 'crispprop' ),
			'15px' => __( '15px', 'crispprop' ),
			'16px' => __( '16px', 'crispprop' ),
			'17px' => __( '17px', 'crispprop' ),
			'18px' => __( '18px', 'crispprop' ),
			'19px' => __( '19px', 'crispprop' ),
			'20px' => __( '20px', 'crispprop' )
	    )
	)));

	$wp_customize->add_setting( 'crispprop_site_font_color', array(
		'default' => '#111',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'crispprop_site_font_color', array(
		'label' => __( 'Site Font Color', 'crispprop' ),
		'settings' => 'crispprop_site_font_color',
		'section' => 'crispprop_font',
	)));

	$wp_customize->add_setting( 'crispprop_site_font_style', array(
		'default' => '400',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_site_font_style', array(
	    'label' => __( 'Site Font Style', 'crispprop' ),
	    'section' => 'crispprop_font',
	    'settings' => 'crispprop_site_font_style',
	    'type' => 'select',
	    'choices' => array(
	    	'300' => __( 'Light', 'crispprop' ),
	        '400' => __( 'Normal', 'crispprop' ),
			'700' => __( 'Bold', 'crispprop' )
	    )
	)));

	$wp_customize->add_section( 'crispprop_hfont', array(
	    'title' => __( 'Header Font Settings', 'crispprop' ),
	    'priority' => 31,
	));

	$wp_customize->add_setting( 'crispprop_site_hfont', array(
		'default' => 'open_sans',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_site_hfont', array(
	    'label' => __( 'Heading Font', 'crispprop' ),
	    'section' => 'crispprop_hfont',
	    'settings' => 'crispprop_site_hfont',
	    'type' => 'select',
	    'choices' => array(
	        'droid_sans' => __( 'Droid Sans', 'crispprop' ),
	        'open_sans' => __( 'Open Sans', 'crispprop' ),
	        'oswald' => __( 'Oswald', 'crispprop' ),
	        'pt_sans' => __( 'PT Sans', 'crispprop' ),
	        'lato' => __( 'Lato', 'crispprop' ),
	        'raleway' => __( 'Raleway', 'crispprop' ),
	        'ubuntu' => __( 'Ubuntu', 'crispprop' )
	    )
	)));

	$wp_customize->add_setting( 'crispprop_site_hfont_color', array(
		'default' => '#111',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'crispprop_site_hfont_color', array(
		'label' => __( 'Heading Font Color', 'crispprop' ),
		'settings' => 'crispprop_site_hfont_color',
		'section' => 'crispprop_hfont',
	)));

	$wp_customize->add_setting( 'crispprop_site_hfont_style', array(
		'default' => '700',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_site_hfont_style', array(
	    'label' => __( 'Heading Font Style', 'crispprop' ),
	    'section' => 'crispprop_hfont',
	    'settings' => 'crispprop_site_hfont_style',
	    'type' => 'select',
	    'choices' => array(
	    	'300' => __( 'Light', 'crispprop' ),
	        '400' => __( 'Normal', 'crispprop' ),
			'700' => __( 'Bold', 'crispprop' )
	    )
	)));

	$wp_customize->add_setting( 'crispprop_site_hfont1_size', array(
		'default' => '28px',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_site_hfont1_size', array(
	    'label' => __( 'H1 Font Size', 'crispprop' ),
	    'section' => 'crispprop_hfont',
	    'settings' => 'crispprop_site_hfont1_size',
	    'type' => 'select',
	    'choices' => array(
	    	'16px' => __( '16px', 'crispprop' ),
			'18px' => __( '18px', 'crispprop' ),
			'20px' => __( '20px', 'crispprop' ),
			'22px' => __( '22px', 'crispprop' ),
			'24px' => __( '24px', 'crispprop' ),
			'26px' => __( '26px', 'crispprop' ),
			'28px' => __( '28px', 'crispprop' ),
			'30px' => __( '30px', 'crispprop' ),
			'32px' => __( '32px', 'crispprop' ),
			'34px' => __( '34px', 'crispprop' ),
			'36px' => __( '36px', 'crispprop' )
	    )
	)));

	$wp_customize->add_setting( 'crispprop_site_hfont2_size', array(
		'default' => '24px',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_site_hfont2_size', array(
	    'label' => __( 'H2 Font Size', 'crispprop' ),
	    'section' => 'crispprop_hfont',
	    'settings' => 'crispprop_site_hfont2_size',
	    'type' => 'select',
	    'choices' => array(
	    	'16px' => __( '16px', 'crispprop' ),
			'18px' => __( '18px', 'crispprop' ),
			'20px' => __( '20px', 'crispprop' ),
			'22px' => __( '22px', 'crispprop' ),
			'24px' => __( '24px', 'crispprop' ),
			'26px' => __( '26px', 'crispprop' ),
			'28px' => __( '28px', 'crispprop' ),
			'30px' => __( '30px', 'crispprop' ),
			'32px' => __( '32px', 'crispprop' ),
			'34px' => __( '34px', 'crispprop' ),
			'36px' => __( '36px', 'crispprop' )
	    )
	)));

	$wp_customize->add_setting( 'crispprop_site_hfont3_size', array(
		'default' => '20px',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_site_hfont3_size', array(
	    'label' => __( 'H3 Font Size', 'crispprop' ),
	    'section' => 'crispprop_hfont',
	    'settings' => 'crispprop_site_hfont3_size',
	    'type' => 'select',
	    'choices' => array(
	    	'16px' => __( '16px', 'crispprop' ),
			'18px' => __( '18px', 'crispprop' ),
			'20px' => __( '20px', 'crispprop' ),
			'22px' => __( '22px', 'crispprop' ),
			'24px' => __( '24px', 'crispprop' ),
			'26px' => __( '26px', 'crispprop' ),
			'28px' => __( '28px', 'crispprop' ),
			'30px' => __( '30px', 'crispprop' ),
			'32px' => __( '32px', 'crispprop' ),
			'34px' => __( '34px', 'crispprop' ),
			'36px' => __( '36px', 'crispprop' )
	    )
	)));

	$wp_customize->add_setting( 'crispprop_site_hfont4_size', array(
		'default' => '16px',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_site_hfont4_size', array(
	    'label' => __( 'H4 Font Size', 'crispprop' ),
	    'section' => 'crispprop_hfont',
	    'settings' => 'crispprop_site_hfont4_size',
	    'type' => 'select',
	    'choices' => array(
	    	'12px' => __( '12px', 'crispprop' ),
			'14px' => __( '14px', 'crispprop' ),
	    	'16px' => __( '16px', 'crispprop' ),
			'18px' => __( '18px', 'crispprop' ),
			'20px' => __( '20px', 'crispprop' ),
			'22px' => __( '22px', 'crispprop' ),
			'24px' => __( '24px', 'crispprop' ),
			'26px' => __( '26px', 'crispprop' ),
			'28px' => __( '28px', 'crispprop' ),
			'30px' => __( '30px', 'crispprop' ),
			'32px' => __( '32px', 'crispprop' )
	    )
	)));

	$wp_customize->add_setting( 'crispprop_site_hfont5_size', array(
		'default' => '14px',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_site_hfont5_size', array(
	    'label' => __( 'H5 Font Size', 'crispprop' ),
	    'section' => 'crispprop_hfont',
	    'settings' => 'crispprop_site_hfont5_size',
	    'type' => 'select',
	    'choices' => array(
	    	'12px' => __( '12px', 'crispprop' ),
			'14px' => __( '14px', 'crispprop' ),
	    	'16px' => __( '16px', 'crispprop' ),
			'18px' => __( '18px', 'crispprop' ),
			'20px' => __( '20px', 'crispprop' ),
			'22px' => __( '22px', 'crispprop' ),
			'24px' => __( '24px', 'crispprop' ),
			'26px' => __( '26px', 'crispprop' ),
			'28px' => __( '28px', 'crispprop' ),
			'30px' => __( '30px', 'crispprop' ),
			'32px' => __( '32px', 'crispprop' )
	    )
	)));

	$wp_customize->add_setting( 'crispprop_site_hfont6_size', array(
		'default' => '12px',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_site_hfont6_size', array(
	    'label' => __( 'H6 Font Size', 'crispprop' ),
	    'section' => 'crispprop_hfont',
	    'settings' => 'crispprop_site_hfont6_size',
	    'type' => 'select',
	    'choices' => array(
	    	'12px' => __( '12px', 'crispprop' ),
			'14px' => __( '14px', 'crispprop' ),
	    	'16px' => __( '16px', 'crispprop' ),
			'18px' => __( '18px', 'crispprop' ),
			'20px' => __( '20px', 'crispprop' ),
			'22px' => __( '22px', 'crispprop' ),
			'24px' => __( '24px', 'crispprop' ),
			'26px' => __( '26px', 'crispprop' ),
			'28px' => __( '28px', 'crispprop' ),
			'30px' => __( '30px', 'crispprop' ),
			'32px' => __( '32px', 'crispprop' )
	    )
	)));

	$wp_customize->add_section( 'crispprop_social_media', array(
	    'title' => __( 'Social Media Settings', 'crispprop' ),
	    'priority' => 33,
	));

	$wp_customize->add_setting( 'crispprop_facebook', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_url',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_facebook', array(
        'label'     => __('Facebook URL', 'crispprop'),
        'section'   => 'crispprop_social_media',
        'settings'  => 'crispprop_facebook',
        'type'      => 'text',
    )));

    $wp_customize->add_setting( 'crispprop_twitter', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_url',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_twitter', array(
        'label'     => __('Twitter URL', 'crispprop'),
        'section'   => 'crispprop_social_media',
        'settings'  => 'crispprop_twitter',
        'type'      => 'text',
    )));

    $wp_customize->add_setting( 'crispprop_pinterest', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_url',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_pinterest', array(
        'label'     => __('Pinterest URL', 'crispprop'),
        'section'   => 'crispprop_social_media',
        'settings'  => 'crispprop_pinterest',
        'type'      => 'text',
    )));

    $wp_customize->add_setting( 'crispprop_gplus', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_url',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_gplus', array(
        'label'     => __('Google+ URL', 'crispprop'),
        'section'   => 'crispprop_social_media',
        'settings'  => 'crispprop_gplus',
        'type'      => 'text',
    )));

    $wp_customize->add_setting( 'crispprop_instagram', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_url',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_instagram', array(
        'label'     => __('Instragram URL', 'crispprop'),
        'section'   => 'crispprop_social_media',
        'settings'  => 'crispprop_instagram',
        'type'      => 'text',
    )));

    $wp_customize->add_setting( 'crispprop_youtube', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_url',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_youtube', array(
        'label'     => __('YouTube URL', 'crispprop'),
        'section'   => 'crispprop_social_media',
        'settings'  => 'crispprop_youtube',
        'type'      => 'text',
    )));

    $wp_customize->add_section( 'crispprop_home_page', array(
	    'title' => __( 'Home Page', 'crispprop' ),
	    'priority' => 33,
	));

	$wp_customize->add_setting( 'shopfree_slider_images', array(
        'default' => array(),
        'sanitize_callback' => 'wp_parse_id_list',
    ));

    $wp_customize->add_control( new CustomizeImageGalleryControl\Control($wp_customize,'featured_image_gallery', array(
        'label'    => __( 'Slider Images' ),
        'section'  => 'crispprop_home_page',
        'settings' => 'shopfree_slider_images',
        'type'     => 'image_gallery',
	)));

	$wp_customize->add_setting( 'crispprop_home_heading', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_home_heading', array(
        'label'     => __('Banner Heading', 'crispprop'),
        'section'   => 'crispprop_home_page',
        'settings'  => 'crispprop_home_heading',
        'type'      => 'text',
    )));

    $wp_customize->add_setting( 'crispprop_home_intro', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_home_intro', array(
        'label'     => __('Banner Intro', 'crispprop'),
        'section'   => 'crispprop_home_page',
        'settings'  => 'crispprop_home_intro',
        'type'      => 'textarea',
    )));

    $wp_customize->add_section( 'crispprop_contact_page', array(
	    'title' => __( 'Contact Page', 'crispprop' ),
	    'priority' => 33,
	));

    $wp_customize->add_setting( 'crispprop_contact_fax', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_contact_fax', array(
        'label'     => __('FAX', 'crispprop'),
        'section'   => 'crispprop_contact_page',
        'settings'  => 'crispprop_contact_fax',
        'type'      => 'text',
    )));

    $wp_customize->add_setting( 'crispprop_contact_address', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_contact_address', array(
        'label'     => __('Address', 'crispprop'),
        'section'   => 'crispprop_contact_page',
        'settings'  => 'crispprop_contact_address',
        'type'      => 'text',
    )));

    $wp_customize->add_setting( 'crispprop_contact_map', array(
		'capability' => 'edit_theme_options',
		'default' => false,
		'sanitize_callback' => 'crispprop_sanitize_checkbox',
	));

	$wp_customize->add_control( 'crispprop_contact_map', array(
		'type' => 'checkbox',
		'settings' => 'crispprop_contact_map',
		'section' => 'crispprop_contact_page',
		'label' => __( 'Hide Map' ),
	));

    $wp_customize->add_section( 'crispprop_footer_settings', array(
	    'title' => __( 'Footer Settings', 'crispprop' ),
	    'priority' => 33,
	));

	$wp_customize->add_setting( 'crispprop_footer_bg', array(
		'default' => '#ddd4b8',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'crispprop_footer_bg', array(
		'label' => __( 'Footer Background', 'crispprop' ),
		'settings' => 'crispprop_footer_bg',
		'section' => 'crispprop_footer_settings',
	)));

	$wp_customize->add_setting( 'crispprop_footer_text', array(
		'default' => '#531c1b',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'crispprop_footer_text', array(
		'label' => __( 'Footer Font Color', 'crispprop' ),
		'settings' => 'crispprop_footer_text',
		'section' => 'crispprop_footer_settings',
	)));

	$wp_customize->add_setting( 'crispprop_footer_logo', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_img_sanitize_fallback',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'crispprop_footer_logo', array(
	    'label'    => __( 'Footer Logo', 'crispprop' ),
	    'settings' => 'crispprop_footer_logo',
		'section' => 'crispprop_footer_settings',
	)));

	$wp_customize->add_setting( 'crispprop_footer_logo_max_width', array(
		'capability' => 'edit_theme_options',
		'default' => '150px',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_footer_logo_max_width', array(
        'label'     => __('Logo Max Width', 'crispprop'),
        'description'     => __('In Pixels, for example 150px', 'crispprop'),
        'section'   => 'crispprop_footer_settings',
        'settings'  => 'crispprop_footer_logo_max_width',
        'type'      => 'text',
    )));

	$wp_customize->add_setting( 'crispprop_footer_intro', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'crispprop_sanitize_input',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'crispprop_footer_intro', array(
        'label'     => __('Footer Intro', 'crispprop'),
        'settings' => 'crispprop_footer_intro',
		'section' => 'crispprop_footer_settings',
        'type'      => 'textarea',
    )));
}

add_action('customize_register','crispprop_customizer');

function crispprop_sanitize_input( $input ) {
    return esc_html( $input );
}

function crispprop_sanitize_checkbox( $input ) {
	return ( $input === true ) ? true : false;
}

function crispprop_sanitize_url( $input ) {
	return esc_url_raw( $input );
}

function crispprop_img_sanitize_fallback( $image, $setting ) {
	$mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	
	$file = wp_check_filetype( $image, $mimes );
	return ( $file['ext'] ? $image : $setting->default );
}
?>