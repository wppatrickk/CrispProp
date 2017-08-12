<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package crispprop

Template Name: Properties Template 

 */

get_header(); ?>
	
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="page-header">
			<div class="inner">
				<div class="page-header-wrap">
					<div class="page-header-left">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>

					<div class="page-header-right">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
						<span>/</span>
						<?php the_title(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

	<div class="inner">
		<div id="primary" class="content-area archive-pages">
			
			<div id="home-featured" class="home-section">
				<div id="all" class="crispprop-loader"></div>
				<div class="property-ajax">
					<div class="property-wrap">
						<?php
						$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
						$args = array(
							'post_type' => 'property',
							'posts_per_page' => 10,
							'paged' => $paged,
						);
						
						$properties = new WP_Query($args);

						if($properties->have_posts()) : 
							while($properties->have_posts()) : $properties->the_post();	?>
								<div class="property-listing">
									<?php $property_type = get_post_meta($post->ID, 'property_type', true); ?>

									<div class="property-image">
										<span class="property-type <?php echo $property_type; ?>"><?php echo $property_type; ?></span>
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('property_thumb'); ?></a>
										<span class="property-price">
											<?php if ($property_type == 'rent') {
												$monthly_rent = get_post_meta($post->ID, 'monthly_rent', true); ?>
												<span class="monthly-price">$<?php echo number_format($monthly_rent); ?></span>
											<?php } elseif ($property_type == 'sale') {
												$sale_price = get_post_meta($post->ID, 'sale_price', true); ?>
												<span>$<?php echo number_format($sale_price); ?></span>
											<?php } ?>
										</span>
									</div>

									<div class="property-detail">
										<h2><?php the_title(); ?></h2>

										<div class="property-address">
											<p><?php echo get_post_meta($post->ID, 'property_address', true); ?></p>
										</div>

										<div class="property-meta">
											<ul>
												<li><span class="property-size"><?php echo get_post_meta($post->ID, 'property_size', true); ?>sqm</span></li>
												<li><span class="property-bed"><?php echo get_post_meta($post->ID, 'property_bed', true); ?> Beds</span></li>
												<li><span class="property-bath"><?php echo get_post_meta($post->ID, 'property_bath', true); ?> Baths</span></li>
											</ul>
										</div>

										<div class="property-transport">
											<div class="property-train">
												<?php $terminal = get_post_meta($post->ID, 'property_tname', true);
												$distance = get_post_meta($post->ID, 'property_dist', true); ?>
												<p><?php echo $terminal; ?> - <?php echo $distance; ?>km</p>
											</div>

											<div class="property-airport">
												<?php $property_adist = get_post_meta($post->ID, 'property_adist', true); ?>
												<p>Airport - <?php echo $property_adist; ?>km</p>
											</div>

											<div class="clear"></div>
										</div>

										<a class="view-details" href="<?php the_permalink(); ?>">View Details</a>
									</div>
								</div>
							<?php endwhile;
						endif; ?>
					</div>
					
					<div class="crispprop-navigation">
						<?php $big = 999999999;

						echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $properties->max_num_pages
						)); ?>
					</div>
					<?php wp_reset_query(); ?>
				</div>
			</div>

		</div><!-- #primary -->

		<?php get_sidebar(); ?>

		<div class="clear"></div>
	</div>

<?php get_footer();
