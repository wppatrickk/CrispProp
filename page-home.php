<?php
/**
 Template Name: Home Template
 *
 * @package crispprop
 */

get_header(); ?>

	<div id="slider-wrap">
		<div class="slider-overlay"></div>

		<div class="home-slider">
			<div class="flexslider">
				<ul class="slides">
					<?php $slider_images = get_theme_mod( 'shopfree_slider_images', '' );
    				if ( is_array( $slider_images ) && ! empty( $slider_images ) ) {
    					foreach ($slider_images as $slider_image) {
    						$image = wp_get_attachment_image_src( $slider_image, 'full' ); ?>
    						<li style="background-image: url('<?php echo $image[0]; ?>');"></li>
    					<?php }
    				} ?>
				</ul>
			</div>
		</div>

		<div class="inner">
			<div class="property-form">
				<div class="property-form-inner">
					<div class="property-form-content">
						<h1><?php echo get_theme_mod( 'crispprop_home_heading', '' ); ?></h1>
						<?php $home_intro = get_theme_mod( 'crispprop_home_intro', '' );
						echo wpautop($home_intro); ?>
					</div>

					<div class="property-form-wrap">
						<form action="<?php echo esc_url( home_url() ); ?>/search/">
							<fieldset>
								<?php $pcities = get_terms( 'property_city' );
								if ( ! empty( $pcities ) && ! is_wp_error( $pcities ) ){
								    echo '<select name="city" id="search-city">
								    <option value="" disabled selected>City</option>';
								    foreach ( $pcities as $pcity ) {
								        echo '<option value="' . $pcity->slug . '">' . $pcity->name . '</option>';
								    }
								    echo '</select>';
								} ?>
							</fieldset>

							<fieldset>
								<?php $types = get_terms( 'property_type' );
								if ( ! empty( $types ) && ! is_wp_error( $types ) ){
								    echo '<select name="type" id="search-type">
								    <option value="" disabled selected>Property Type</option>';
								    foreach ( $types as $type ) {
								        echo '<option value="' . $type->slug . '">' . $type->name . '</option>';
								    }
								    echo '</select>';
								} ?>
							</fieldset>

							<?php $args = array(
								'post_type' => 'property',
								'posts_per_page' => -1
							);
							
							$properties = new WP_Query($args);

							if($properties->have_posts()) : 
								while($properties->have_posts()) : $properties->the_post();
									$beds[] = get_post_meta($post->ID, 'property_bed', true);
									$baths[] = get_post_meta($post->ID, 'property_bath', true);
								endwhile;
							endif;
							wp_reset_query();

							$beds = array_unique($beds);
							sort($beds);
							$baths = array_unique($baths);
							sort($baths); ?>
							
							<fieldset>
								<select name="beds" id="search-bed">
								    <option value="" disabled selected>Bedroom</option>
								    <?php foreach ( $beds as $bed ) {
								        echo '<option value="' . $bed . '">' . $bed . '</option>';
								    } ?>
								</select>
							</fieldset>

							<fieldset>
								<select name="bath" id="search-bath">
								    <option value="" disabled selected>Bathroom</option>
								    <?php foreach ( $baths as $bath ) {
								        echo '<option value="' . $bath . '">' . $bath . '</option>';
								    } ?>
								</select>
							</fieldset>

							<fieldset>
								<div class="search-radio">
									<div class="search-radio-buttons">
										<a href="#search-rent" class="active">Rent</a><a href="#search-sale">Sale</a>
									</div>
									<div class="search-radio-input">
										<input type="radio" id="search-rent" name="ptype" value="rent" checked />
										<input type="radio" id="search-sale" name="ptype" value="sale" />
									</div>
								</div>
							</fieldset>

							<fieldset>
								<input type="submit" name="submit" id="search-submit" value="Search" />
							</fieldset>
						</form>

						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="home-featured" class="home-section">
		<div class="inner">
			<h3>Featured Properties</h3>
			<div class="property-wrap">
				<?php 
				$args = array(
					'post_type' => 'property',
					'meta_key' => 'property_featured',
					'meta_value' => 'on',
					'posts_per_page' => 6
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
					<?php endwhile;
				endif;
				wp_reset_query(); ?>
			</div>

			<a class="view-all" href="<?php echo esc_url( home_url( '/' ) ); ?>/properties/">View All Properties</a>
		</div>
	</div>

	<div id="home-seo" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
		<div class="overlay"></div>
		<div class="inner">
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		</div>
	</div>

	<div id="home-articles" class="home-section">
		<div class="inner">
			<h3>Articles & Tips</h3>
			<div class="home-blog">
				<?php 
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 3
				);
				
				$articles = new WP_Query($args);

				if($articles->have_posts()) : 
					while($articles->have_posts()) : $articles->the_post();	?>
						<div class="home-article">
							<div class="property-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
							<div class="property-detail">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php the_excerpt(); ?>
							</div>
						</div>
					<?php endwhile;
				endif;
				wp_reset_query(); ?>
			</div>

			<a class="view-all" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">View All Articles</a>
		</div>
	</div>

<?php get_footer();
