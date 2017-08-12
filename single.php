<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package crispprop
 */

get_header(); ?>

	<div id="page-header">
		<div class="inner">
			<div class="page-header-wrap">
				<div class="page-header-left">
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				</div>

				<div class="page-header-right">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
					<span>/</span>
					<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Blog</a>
				</div>
			</div>
		</div>
	</div>

	<div class="inner">
		<div id="primary" class="content-area">
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="blog-image">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
						</div>
					<?php } ?>

					<?php the_content(); ?>						
				</div>
			<?php endwhile; ?>
		</div><!-- #primary -->

		<aside id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		</aside>

		<div class="clear"></div>
	</div>

<?php get_footer();
