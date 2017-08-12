<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package crispprop
 */

get_header(); ?>

	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<div id="property-header">
				<div class="inner">
					<div class="property-header-left">
						<h1><?php the_title(); ?></h1>
						<p><?php echo get_post_meta($post->ID, 'property_address', true); ?></p>
					</div>

					<div class="property-header-right">
						<a href="#property-map">View Map</a>
						<a href="#property-booking">Book Now</a>
					</div>

					<div class="clear"></div>
				</div>
			</div>

			<div id="property-wrap">
				<div class="inner">
					<div class="property-single-left">
						<?php $ids = get_post_meta($post->ID, 'vdw_gallery_id', true);
						if ($ids) : ?>
							<div id="slider" class="flexslider">
								<ul class="slides">
									<?php foreach ($ids as $key => $value) :
										$image = wp_get_attachment_image_src($value, 'full'); ?>
										<li>
											<img src="<?php echo $image[0]; ?>" />
										</li>
									<?php endforeach; ?>
								</ul>
							</div>

							<div id="carousel" class="flexslider">
								<ul class="slides">
									<?php foreach ($ids as $key => $value) :
										$thumb = wp_get_attachment_image_src($value, 'medium'); ?>
										<li>
											<img src="<?php echo $thumb[0]; ?>" />
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>

					<div class="property-single-right">
						<div class="property-details">
							<div class="property-single-price">
								<?php $property_offer = get_post_meta($post->ID, 'property_type', true);
								if ($property_offer == 'rent') {
									$monthly_rent = get_post_meta($post->ID, 'monthly_rent', true); ?>
									<span class="monthly-price">$<?php echo number_format($monthly_rent); ?>
								<?php } elseif ($property_offer == 'sale') {
									$sale_price = get_post_meta($post->ID, 'sale_price', true); ?>
									<span>$<?php echo number_format($sale_price); ?>
								<?php } ?>
							</div>
							<div class="property-detail-wrap">
								<div class="property-detail-left">Property Type</div>
								<?php $types = wp_get_post_terms($post->ID, 'property_type');
								foreach ($types as $type) {
								 	$property_type = $type->name;
								 } ?>
								<div class="property-detail-right"><?php echo $property_type; ?></div>
								<div class="clear"></div>
							</div>

							<div class="property-detail-wrap">
								<div class="property-detail-left">City</div>
								<?php $cities = wp_get_post_terms($post->ID, 'property_city');
								foreach ($cities as $city) {
								 	$property_city = $city->name;
								 } ?>
								<div class="property-detail-right"><?php echo $property_city; ?></div>
								<div class="clear"></div>
							</div>

							<div class="property-detail-wrap">
								<div class="property-detail-left">Offer Type</div>
								<div class="property-detail-right">
									<?php if ($property_offer == 'rent') {
										echo 'Rental';
									} elseif ($property_offer == 'sale') {
										echo 'Sale';	
									} ?>
								</div>
								<div class="clear"></div>
							</div>

							<div class="property-detail-wrap">
								<div class="property-detail-left">Bedrooms</div>
								<div class="property-detail-right"><?php echo get_post_meta($post->ID, 'property_bed', true); ?></div>
								<div class="clear"></div>
							</div>

							<div class="property-detail-wrap">
								<div class="property-detail-left">Bathrooms</div>
								<div class="property-detail-right"><?php echo get_post_meta($post->ID, 'property_bath', true); ?></div>
								<div class="clear"></div>
							</div>

							<div class="property-detail-wrap">
								<div class="property-detail-left">Size</div>
								<div class="property-detail-right"><?php echo get_post_meta($post->ID, 'property_size', true); ?> sqm</div>
								<div class="clear"></div>
							</div>

							<div class="property-detail-wrap">
								<div class="property-detail-left">Airport</div>
								<div class="property-detail-right"><?php echo get_post_meta($post->ID, 'property_adist', true); ?> km</div>
								<div class="clear"></div>
							</div>

							<div class="property-detail-wrap">
								<div class="property-detail-left"><?php echo get_post_meta($post->ID, 'property_tname', true); ?></div>
								<div class="property-detail-right"><?php echo get_post_meta($post->ID, 'property_dist', true); ?> km</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>

					<div class="clear"></div>

					<div class="property-description property-content">
						<?php the_content(); ?>
					</div>

					<div class="property-content">
						<div class="property-features property-meta-content">
							<?php $property_features = get_post_meta($post->ID, 'property_features', true);
							$property_features = unserialize($property_features);
							if (!empty($property_features)) {
								echo '<h2>Features</h2>';
								echo '<ul>';
								foreach ($property_features as $feature) {
								 	echo '<li><span>' . $feature . '</span></li>';
								}
								echo '</ul>';
							} ?>
						</div>

						<div class="property-beds property-meta-content">
							<?php $beds_linens = get_post_meta($post->ID, 'property_bedsli', true);
							$beds_linens = unserialize($beds_linens);
							if (!empty($beds_linens)) {
								echo '<h2>Beds & Linen</h2>';
								echo '<ul>';
								foreach ($beds_linens as $beds_linen) {
							 		echo '<li><span>' . $beds_linen . '</span></li>';
								}
								echo '</ul>';
							} ?>
						</div>

						<div class="property-kitchen property-meta-content">
							<?php $property_kitchen = get_post_meta($post->ID, 'property_kitchen', true);
							$property_kitchen = unserialize($property_kitchen);
							if (!empty($property_kitchen)) {
								echo '<h2>Kitchen Equipment</h2>';
								echo '<ul>';
								foreach ($property_kitchen as $kitchen) {
							 		echo '<li><span>' . $kitchen . '</span></li>';
								}
								echo '</ul>';
							} ?>
						</div>

						<div class="property-extras property-meta-content">
							<?php $property_extras = get_post_meta($post->ID, 'property_extras', true);
							$property_extras = unserialize($property_extras);
							if (!empty($property_extras)) {
								echo '<h2>Extra Amenities</h2>';
								echo '<ul>';
								foreach ($property_extras as $extras) {
							 		echo '<li><span>' . $extras . '</span></li>';
								}
								echo '</ul>';
							} ?>
						</div>
					</div>

					<div id="property-map" class="property-map property-content">
						<?php $address = get_post_meta($post->ID, 'property_address', true);
						$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
						$geo = json_decode($geo, true);

						if ($geo['status'] == 'OK') {
							$latitude = $geo['results'][0]['geometry']['location']['lat'];
							$longitude = $geo['results'][0]['geometry']['location']['lng'];
						} ?>

						<div id="map"></div>
						<script src="//maps.googleapis.com/maps/api/js?v=3&key=AIzaSyDKDs2YOZC3MIALMMAttxaplWiu1IQlbbs"></script>
						<script type="text/javascript">
						function map_initialize() {
							var locations = [
								<?php echo '[' . $latitude . ', ' . $longitude . ']'; ?>
							];
							var map = new google.maps.Map(document.getElementById('map'), {
								zoom: 16,
								scrollwheel: false,
								center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
								mapTypeId: google.maps.MapTypeId.ROADMAP
							});
							
							var infowindow = new google.maps.InfoWindow();
							var marker, i;
							var markers = new Array();
							
							for (i = 0; i < locations.length; i++) {  
								marker = new google.maps.Marker({
								position: new google.maps.LatLng(locations[i][1], locations[i][2]),
								map: map
							});
							
							markers.push(marker);
							
							google.maps.event.addListener(marker, 'click', (function(marker, i) {
								return function() {
									infowindow.setContent(locations[i][0]);
									infowindow.open(map, marker);
								}})(marker, i));
							}
						}
						google.maps.event.addDomListener(window, 'load', map_initialize);
						</script>
					</div>

					<div id="property-booking" class="property-booking property-content">
						<h2>Booking Form</h2>

						<?php echo do_shortcode('[contact-form-7 id="157" title="Property Booking Form"]'); ?>
					</div>
				</div>
			</div>

		<?php endwhile; ?>

	</main><!-- #main -->

<?php
get_footer();
