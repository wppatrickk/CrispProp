<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package crispprop
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function crispprop_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'crispprop_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function crispprop_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'crispprop_pingback_header' );

function crispprop_excerpt_length( $length ) {
    return 20;
}

add_filter( 'excerpt_length', 'crispprop_excerpt_length', 999 );

function crispprop_excerpt_more( $more ) {
    return sprintf( '<a class="view-details" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'crispprop' )
    );
}

add_filter( 'excerpt_more', 'crispprop_excerpt_more' );

function crispprop_remove_slug( $post_link, $post, $leavename ) {

    if ( 'property' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}

add_filter( 'post_type_link', 'crispprop_remove_slug', 10, 3 );

function crispprop_parse_request( $query ) {

    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'property', 'page' ) );
    }
}

add_action( 'pre_get_posts', 'crispprop_parse_request' );

function username_validate_ajax() {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    
    if ( username_exists($username) ) {
        echo 'exists';
    } else {
        if (validate_username($username)) {
        	if ( email_exists( $email ) ) {
        		echo 'emailexists';
        	} else {
        		$userdata = array(
				    'user_login' => $username,
				    'user_email' => $email,
				    'user_pass' => $pass1
				);

				wp_insert_user($userdata);

				$info = array();
			    $info['user_login'] = $username;
			    $info['user_password'] = $pass1;

			    wp_signon( $info, false );

			    echo 'success';
        	}
        } else {
        	echo 'invalid';
        }
    }

    die();
}

add_action('wp_ajax_user_validate', 'username_validate_ajax');
add_action('wp_ajax_nopriv_user_validate', 'username_validate_ajax');
