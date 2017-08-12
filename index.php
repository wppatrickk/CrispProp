<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package crispprop
 */

get_header(); ?>
	
	<div id="page-header">
		<div class="inner">
			<div class="page-header-wrap">
				<div class="page-header-left">
					<h1><?php single_post_title(); ?></h1>
					<?php the_content(); ?>
				</div>

				<div class="page-header-right">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
					<span>/</span>
					Blog
				</div>
			</div>
		</div>
	</div>
	
	<div class="inner">
		<div id="primary" class="content-area">
			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="blog-left">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
							</div>

							<div class="blog-right">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p><?php $content = get_the_content();
								echo wp_trim_words($content, 30); ?></p>
								<div class="read-more">
									<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
								</div>
							</div>

							<div class="clear"></div>
						<?php } else { ?>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php $content = get_the_content();
							echo wp_trim_words($content, 50); ?></p>
							<div class="read-more">
								<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
							</div>
						<?php } ?>
					</div>
				<?php endwhile;

				the_posts_navigation();

			endif; ?>
		</div><!-- #primary -->

		<aside id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		</aside>

		<div class="clear"></div>
	</div>

<?php get_footer();
