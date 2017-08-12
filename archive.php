<?php
/**
 * The template for displaying archive pages.
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
					<h1><?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?></h1>
					<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
				</div>

				<div class="page-header-right">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
					<span>/</span>
					<?php the_archive_title(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="inner">
		<div id="primary" class="content-area archive-pages">

			<?php if ( have_posts() ) : ?>

				<div class="property-wrap">

					<?php while ( have_posts() ) : the_post(); ?>

						<div class="property-listing">
							<?php $property_type = get_post_meta($post->ID, 'property_type', true); ?>

							<div class="property-image">
								<span class="property-type <?php echo $property_type; ?>"><?php echo $property_type; ?></span>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('property_thumb'); ?></a>
								<span class="property-price">
									<?php if ($property_type == 'rent') {
										$monthly_rent = get_post_meta($post->ID, 'monthly_rent', true); ?>
										<span class="monthly-price">$<?php echo number_format($monthly_rent); ?>
									<?php } elseif ($property_type == 'sale') {
										$sale_price = get_post_meta($post->ID, 'sale_price', true); ?>
										<span>$<?php echo number_format($sale_price); ?>
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

					<?php endwhile; ?>

				</div>

				<?php the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</div>
	
		<?php get_sidebar(); ?>

		<div class="clear"></div>

	</div>

<?php get_footer();
