<?php
if ( ! function_exists( 'crispprop_setup' ) ) :

function crispprop_theme_setup() {
	load_theme_textdomain( 'crispprop', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'crispprop' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	$GLOBALS['content_width'] = apply_filters( 'crispprop_content_width', 1000 );
}

add_action( 'after_setup_theme', 'crispprop_theme_setup' );
	
endif;

function crispprop_post_type() {
	$labels = array(
		'name'               => _x( 'Properties', 'crispprop' ),
		'singular_name'      => _x( 'Property', 'crispprop' ),
		'add_new'            => _x( 'Add New', 'crispprop' ),
		'add_new_item'       => __( 'Add New Property', 'crispprop' ),
		'edit_item'          => __( 'Edit Property', 'crispprop' ),
		'new_item'           => __( 'New Property', 'crispprop' ),
		'all_items'          => __( 'All Properties', 'crispprop' ),
		'view_item'          => __( 'View Property', 'crispprop' ),
		'search_items'       => __( 'Search Properties', 'crispprop' ),
		'not_found'          => __( 'No Properties found', 'crispprop' ),
		'not_found_in_trash' => __( 'No Properties found in the Trash', 'crispprop' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Properties'
	);
	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'   => true,
	);

	register_post_type( 'property', $args );
}

add_action( 'init', 'crispprop_post_type' );

function crispprop_property_type() {
	register_taxonomy('property_type', 'property', array(
		'hierarchical' => true,
		'labels' => array(
			'name' => _x( 'Types', 'crispprop' ),
			'singular_name' => _x( 'Type', 'crispprop' ),
			'search_items' =>  __( 'Search Types', 'crispprop' ),
			'all_items' => __( 'All Types', 'crispprop' ),
			'parent_item' => __( 'Parent Type', 'crispprop' ),
			'parent_item_colon' => __( 'Parent Type:', 'crispprop' ),
			'edit_item' => __( 'Edit Type', 'crispprop' ),
			'update_item' => __( 'Update Type', 'crispprop' ),
			'add_new_item' => __( 'Add New Type', 'crispprop' ),
			'new_item_name' => __( 'New Type Name', 'crispprop' ),
			'menu_name' => __( 'Types', 'crispprop' ),
		),
	));
}

add_action( 'init', 'crispprop_property_type', 0 );

function crispprop_property_cities() {
	register_taxonomy('property_city', 'property', array(
		'hierarchical' => true,
		'labels' => array(
			'name' => _x( 'Cities', 'crispprop' ),
			'singular_name' => _x( 'City', 'crispprop' ),
			'search_items' =>  __( 'Search Cities', 'crispprop' ),
			'all_items' => __( 'All Cities', 'crispprop' ),
			'parent_item' => __( 'Parent City', 'crispprop' ),
			'parent_item_colon' => __( 'Parent City:', 'crispprop' ),
			'edit_item' => __( 'Edit City', 'crispprop' ),
			'update_item' => __( 'Update City', 'crispprop' ),
			'add_new_item' => __( 'Add New City', 'crispprop' ),
			'new_item_name' => __( 'New City Name', 'crispprop' ),
			'menu_name' => __( 'Cities', 'crispprop' ),
		),
	));
}

add_action( 'init', 'crispprop_property_cities', 0 );

add_action( 'after_switch_theme', function() {
    crispprop_post_type();
    flush_rewrite_rules();
});

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/theme-sidebars.php';

require get_template_directory() . '/inc/gallery.php';

require get_template_directory() . '/inc/meta-boxes.php';

require get_template_directory() . '/inc/theme-scripts.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/extras.php';

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'crispprop_required_plugins' );
 
function crispprop_required_plugins() {
    $plugins = array(
	    array(
	        'name' => 'Customize Image Gallery Control',
	        'slug' => 'wp-customize-image-gallery-control',
	        'source' => 'https://github.com/xwp/wp-customize-image-gallery-control/archive/master.zip',
	        'required' => true,
	        'force_activation' => false,
	    ),
	    array(
			'name' => 'Contact Form 7',
			'slug' => 'contact-form-7',
			'required'  => true,
		),
	);
 
    tgmpa( $plugins );
}