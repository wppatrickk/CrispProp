<?php
function crispprop_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Property Sidebar', 'crispprop' ),
		'id'            => 'property-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'crispprop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'crispprop' ),
		'id'            => 'blog-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'crispprop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu 1', 'crispprop' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'crispprop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu 2', 'crispprop' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'crispprop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}

add_action( 'widgets_init', 'crispprop_widgets_init' );
?>