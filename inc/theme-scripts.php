<?php
function crispprop_theme_scripts() {
	$fonts = array();
	$fonts[] = get_theme_mod('crispprop_site_font', 'open_sans');
	$fonts[] = get_theme_mod('crispprop_site_hfont', 'open_sans');
	
	if (in_array("droid_sans", $fonts)) {
		wp_enqueue_style( 'crispprop-droid-sans', 'https://fonts.googleapis.com/css?family=Droid+Sans:400,700' );
	} 

	if (in_array("open_sans", $fonts)) {
		wp_enqueue_style( 'crispprop-open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i' );
	} 

	if (in_array("oswald", $fonts)) {
		wp_enqueue_style( 'crispprop-oswald', 'https://fonts.googleapis.com/css?family=Oswald:300,400,700' );
	} 

	if (in_array("pt_sans", $fonts)) {
		wp_enqueue_style( 'crispprop-pt-sans', 'https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i' );
	} 

	if (in_array("lato", $fonts)) {
		wp_enqueue_style( 'crispprop-lato', 'https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i' );
	} 

	if (in_array("raleway", $fonts)) {
		wp_enqueue_style( 'wpd-inspire-raleway', 'https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,700,700i' );
	} 

	if (in_array("ubuntu", $fonts)) {
		wp_enqueue_style( 'crispprop-ubuntu', 'https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,700,700i' );
	} 

	if (empty($fonts)) {
		wp_enqueue_style( 'crispprop-open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i' );
	}

	wp_enqueue_style( 'crispprop-jquery-ui-css', 'http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', '1.12.1' );
	wp_enqueue_script('jquery');
	
    if (is_front_page()) {
		wp_enqueue_style( 'crispprop-flexslider', get_template_directory_uri() . '/css/flexslider.css', '2.6.3' );
		wp_enqueue_script( 'crispprop-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '2.6.3', true );
		wp_enqueue_script( 'crispprop-home', get_template_directory_uri() . '/js/crispprop-home.js', array('jquery'), '1.0.0', true );
	}

	if (is_singular('property')) {
		wp_enqueue_style( 'crispprop-flexslider', get_template_directory_uri() . '/css/flexslider.css', '2.6.3' );
		wp_enqueue_script( 'crispprop-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '2.6.3', true );
		wp_enqueue_script( 'crispprop-single', get_template_directory_uri() . '/js/crispprop-single.js', array('jquery'), '1.0.0', true );
        wp_localize_script( 'crispprop-single', 'crispprop_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}

	wp_enqueue_style( 'crispprop-font-awesome', get_template_directory_uri() . '/css/font-awesome.css', '1.0.0' );
	wp_enqueue_style( 'crispprop-style', get_stylesheet_uri(), '', '1.0.0' );
	wp_enqueue_style( 'crispprop-custom', get_template_directory_uri() . '/css/crispprop-custom.css', '1.0.0' );

	wp_enqueue_script( 'crispprop-scripts', get_template_directory_uri() . '/js/crispprop-scripts.js', array('jquery'), '1.0.0', true );
	wp_localize_script( 'crispprop-scripts', 'crisppropAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'crispprop_theme_scripts' );

function crispprop_admin_script( $hook_suffix ){
    $cpt = 'property';

    if( in_array($hook_suffix, array('post.php', 'post-new.php') ) ){
        $screen = get_current_screen();
        if( is_object( $screen ) && $cpt == $screen->post_type ){
            wp_register_style( 'crispprop-style-admin', get_template_directory_uri() . '/css/admin/crispprop-style-admin.css', array(), '1.0.0', 'screen' );
            wp_enqueue_style( 'crispprop-gallery-metabox', get_template_directory_uri() . '/css/admin/gallery-metabox.css', '1.0.0' );
			wp_enqueue_style( 'crispprop-style-admin' );
			wp_enqueue_script( 'crispprop-gallery-metabox', get_template_directory_uri() . '/js/admin/gallery-metabox.js', array('jquery'), '1.0.0', true );
			wp_enqueue_script( 'crispprop-script-admin', get_template_directory_uri() . '/js/admin/crispprop-script-admin.js', array('jquery'), '1.0.0', true );
        }
    }
}

add_action( 'admin_enqueue_scripts', 'crispprop_admin_script');

function crispprop_custom_css() {
    $font_stack = array('droid_sans' => 'Droid Sans, sans-serif', 'open_sans' => 'Open Sans, sans-serif', 'oswald' => 'Oswald, sans-serif', 'pt_sans' => 'PT Sans, sans-serif', 'lato' => 'Lato, sans-serif', 'raleway' => 'Raleway, sans-serif', 'ubuntu' => 'Ubuntu, sans-serif');

    $background = get_theme_mod('crispprop_bg');
    $site_font = get_theme_mod('crispprop_site_font', 'open_sans');
    $site_size = get_theme_mod('crispprop_site_font_size', '14px');
    $site_style = get_theme_mod('crispprop_site_font_style', '400');
    $site_color = get_theme_mod('crispprop_site_font_color', '#111');
    
    $site_css = 'body {';
    if ($background) {
        $site_css .= ' background: ' . $background .'; ';
    }
    if(isset($font_stack[$site_font])){
        $site_font_face = $font_stack[$site_font];
        $site_css .= ' font-family:' . $site_font_face .'; ';
    }
    if ($site_size) {
        $site_css .= ' font-size:' . $site_size .'; ';
    }
    if ($site_style) {
        $site_css .= ' font-weight:' . $site_style .'; ';
    }
    if ($site_color) {
        $site_css .= ' color:' . $site_color .'; ';
    }
    $site_css .= '}';

    $crispprop_link_color = get_theme_mod('crispprop_link_color', '#531c1b');

    $site_css .= 'a {';
    $site_css .= ' color:' . $crispprop_link_color .'; ';
    $site_css .= '}';

    $site_bh_font = get_theme_mod('crispprop_site_hfont', 'open_sans');
    $site_bh_font_style = get_theme_mod('crispprop_site_hfont_style', '700');
    $site_bh_font_color = get_theme_mod('crispprop_site_hfont_color', '#111');

    $site_css .= 'h1, h2, h3, h4, h5, h6 {';
    if ($site_bh_font_style) {
        $site_css .= ' font-weight:' . $site_bh_font_style .'; ';
    }
    if(isset($font_stack[$site_bh_font])){
        $site_bh_font_face = $font_stack[$site_bh_font];
        $site_css .= ' font-family:' . $site_bh_font_face .'; ';
    }
    if ($site_bh_font_color) {
        $site_css .= ' color:' . $site_bh_font_color .'; ';
    }
    $site_css .= '}';

    $crispprop_site_hfont1_size = get_theme_mod('crispprop_site_hfont1_size', '32px');

    $site_css .= 'h1 {';
    if ($crispprop_site_hfont1_size) {
        $site_css .= ' font-size:' . $crispprop_site_hfont1_size .'; ';
    }
    $site_css .= '}';

    $crispprop_site_hfont2_size = get_theme_mod('crispprop_site_hfont2_size', '26px');

    if ($crispprop_site_hfont2_size) {
        $site_css .= 'h2 {';
        $site_css .= ' font-size:' . $crispprop_site_hfont2_size .'; ';
        $site_css .= '}';
    }

    $crispprop_site_hfont3_size = get_theme_mod('crispprop_site_hfont3_size', '22px');

    $site_css .= 'h3 {';
    if ($crispprop_site_hfont3_size) {
        $site_css .= ' font-size:' . $crispprop_site_hfont3_size .'; ';
    }
    $site_css .= '}';

    $crispprop_site_hfont4_size = get_theme_mod('crispprop_site_hfont4_size', '18px');

    $site_css .= 'h4 {';
    if ($crispprop_site_hfont4_size) {
        $site_css .= ' font-size:' . $crispprop_site_hfont4_size .'; ';
    }
    $site_css .= '}';

    $crispprop_site_hfont5_size = get_theme_mod('crispprop_site_hfont5_size', '14px');

    $site_css .= 'h5 {';
    if ($crispprop_site_hfont5_size) {
        $site_css .= ' font-size:' . $crispprop_site_hfont5_size .'; ';
    }
    $site_css .= '}';

    $crispprop_site_hfont6_size = get_theme_mod('crispprop_site_hfont6_size', '12px');

    $site_css .= 'h6 {';
    if ($crispprop_site_hfont6_size) {
        $site_css .= ' font-size:' . $crispprop_site_hfont6_size .'; ';
    }
    $site_css .= '}';

    $crispprop_top_bg = get_theme_mod('crispprop_top_bg', '#531c1b');
    $crispprop_top_font_color = get_theme_mod('crispprop_top_font_color', '#ddd4b8');

    $site_css .= '#top {';
    $site_css .= ' background-color:' . $crispprop_top_bg .'; ';
    $site_css .= ' color:' . $crispprop_top_font_color .'; ';
    $site_css .= '}';

    $site_css .= '#top a {';
    $site_css .= ' color:' . $crispprop_top_font_color .'; ';
    $site_css .= '}';

    $site_css .= '.top-phone:before {';
    $site_css .= ' border-color:' . $crispprop_top_font_color .'; ';
    $site_css .= '}';

    $crispprop_logo_max_width = get_theme_mod('crispprop_logo_max_width', '250px');

    $site_css .= '.site-branding img {';
    $site_css .= ' max-width:' . $crispprop_logo_max_width .'; ';
    $site_css .= '}';

    $crispprop_menu_color = get_theme_mod('crispprop_menu_color', '#777');

    $site_css .= '.main-navigation ul li a {';
    $site_css .= ' color:' . $crispprop_menu_color .'; ';
    $site_css .= '}';

    $crispprop_menu_hover_color = get_theme_mod('crispprop_menu_hover_color', '#531c1b');

    $site_css .= '.main-navigation ul li a:hover, .site-header .main-navigation ul li.current-menu-item a {';
    $site_css .= ' color:' . $crispprop_menu_hover_color .'; ';
    $site_css .= '}';

    $crispprop_base_color = get_theme_mod('crispprop_base_color', '#ea3a3c');

    $site_css .= '.secondary-categories > a, .secondary-search button, .secondary-cart a, .product-block h3 span, .products li .onsale, .product .onsale, .subscribe-right form input[type="submit"], .products .add_to_cart_button, .all-cats-menu, .all-cats-menu li:hover li a:hover, .button, .woocommerce-tabs .tabs a, .related h2 span, .up-sells h2 span, .comment-form input[type="submit"] {';
    $site_css .= ' background-color:' . $crispprop_base_color .'; ';
    $site_css .= '}';

    $site_css .= '.product-block h3, .bx-wrapper .bx-controls-direction a, .all-cats-menu li a, .woocommerce-tabs .tabs, .related h3, .up-sells h3 {';
    $site_css .= ' border-color:' . $crispprop_base_color .'; ';
    $site_css .= '}';

    $site_css .= '.all-cats-menu li a:hover, .all-cats-menu li:hover a, .products li a, .bx-wrapper .bx-controls-direction a, .wpd-rating span.star.filled:before, .stars.selected span a.active:before, .stars.selected span a:not(.active):before, .product .summary .price, .woocommerce-review-link, .product-name a, product-remove a, .woocommerce-info a {';
    $site_css .= ' color:' . $crispprop_base_color .'; ';
    $site_css .= '}';

    $crispprop_footer_bg = get_theme_mod('crispprop_footer_bg', '#ddd4b8');
    $crispprop_footer_text = get_theme_mod('crispprop_footer_text', '#531c1b');

    $site_css .= '.site-footer {';
    $site_css .= ' background-color:' . $crispprop_footer_bg .'; ';
    $site_css .= ' color:' . $crispprop_footer_text .'; ';
    $site_css .= '}';

    $crispprop_footer_logo_max_width = get_theme_mod('crispprop_footer_logo_max_width', '150px');

    $site_css .= '.footer-widget-1 img {';
    $site_css .= ' max-width:' . $crispprop_footer_logo_max_width .'; ';
    $site_css .= '}';

    $site_css .= '.footer-widget h3, .footer-widget a {';
    $site_css .= ' color:' . $crispprop_footer_text .'; ';
    $site_css .= '}';

    $site_css .= get_theme_mod('crispprop_custom_css');

    wp_add_inline_style( 'crispprop-custom', $site_css );
    
}

add_action( 'wp_enqueue_scripts', 'crispprop_custom_css' );
?>