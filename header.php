<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="profile" href="http://gmpg.org/xfn/11" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav id="mobile-navigation" class="main-navigation" role="navigation">
	<div class="mobile-nav-wrap">
		<a href="#" class="mobile-nav-close"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
		<div class="mobile-nav">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home-mobile-nav">Home</a>
			<?php $pcities = get_terms( 'property_city' );
			if ( ! empty( $pcities ) && ! is_wp_error( $pcities ) ){
			    echo '<div id="mobile-citynav">
			    <span>Property by City</span>
			    <ul>';
			    foreach ( $pcities as $pcity ) {
			        echo '<li><a href="' . get_term_link($pcity) . '">' . $pcity->name . '</a></li>';
			    }
			    echo '</ul></div>';
			} ?>
			<?php wp_nav_menu( array( 'theme_location' => 'primary_menu', 'menu_id' => 'primary-menu' ) ); ?>
		</div>
	</div>
</nav><!-- #site-navigation -->

<div id="page" class="site">
	<div class="mobile-overlay"></div>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'crispprop' ); ?></a>

	<?php $top_bar_display = get_theme_mod('crispprop_top_bar_display', '');
	$crispprop_phone_number = get_theme_mod('crispprop_phone_number', '');
	$crispprop_email = get_theme_mod('crispprop_email', '');
	if (!$top_bar_display) { ?>
	<div id="top">
		<div class="inner">
			<div class="top-left">
				<span class="top-email">
					<a href="mailto:<?php echo $crispprop_email; ?>"><span><?php echo $crispprop_email; ?></span></a>
				</span>

				<span class="top-phone">
					<a href="tel:<?php echo $crispprop_phone_number; ?>"><span><?php echo $crispprop_phone_number; ?></span></a>
				</span>
			</div>

			<div class="top-right">
				<span class="top-social">
					<?php $crispprop_facebook = get_theme_mod('crispprop_facebook', '');
					$crispprop_twitter = get_theme_mod('crispprop_twitter', '');
					$crispprop_pinterest = get_theme_mod('crispprop_pinterest', '');
					$crispprop_gplus = get_theme_mod('crispprop_gplus', '');
					$crispprop_instagram = get_theme_mod('crispprop_instagram', '');
					$crispprop_youtube = get_theme_mod('crispprop_youtube', ''); ?>
					<?php if ($crispprop_facebook) { ?>
					<a href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<?php } ?>
					<?php if ($crispprop_twitter) { ?>
					<a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<?php } ?>
					<?php if ($crispprop_pinterest) { ?>
					<a href="#" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
					<?php } ?>
					<?php if ($crispprop_gplus) { ?>
					<a href="#" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
					<?php } ?>
					<?php if ($crispprop_instagram) { ?>
					<a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					<?php } ?>
					<?php if ($crispprop_youtube) { ?>
					<a href="#" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
					<?php } ?>
				</span>
			</div>

			<div class="clear"></div>
		</div>
	</div>
	<?php } ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="inner">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a>
			</div><!-- .site-branding -->

			<div class="site-right">
				<div id="mobile-slide">
					<a href="#"><span class="icon-bar"><span class="icon-bars"></span></span></a>
				</div>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary_menu', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div><!-- .site-branding -->

			<div class="clear"></div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
