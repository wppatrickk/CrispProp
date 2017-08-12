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
 
 Template Name: Contact Template 

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
	
		<div class="inner">
			<div class="contact-wrap">
				<div class="contact-left">
					<?php echo do_shortcode('[contact-form-7 title="Contact Us Form"]'); ?>
				</div>

				<div class="contact-right">
						<div class="cwrap phone">
							<span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
							<span class="small">Phone</span>
							<span class="detail"><?php echo get_theme_mod('crispprop_phone_number', ''); ?></span>
						</div>

						<div class="cwrap fax">
							<span class="icon"><i class="fa fa-fax" aria-hidden="true"></i></span>
							<span class="small">Fax</span>
							<span class="detail"><?php echo get_theme_mod('crispprop_contact_fax', ''); ?></span>
						</div>

						<div class="cwrap email">
							<span class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
							<span class="small">Email</span>
							<span class="detail"><a href="<?php echo get_theme_mod('crispprop_email', ''); ?>"><?php echo get_theme_mod('crispprop_email', ''); ?></a></span>
						</div>

						<div class="cwrap address">
							<span class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
							<span class="small">Address</span>
							<span class="detail"><?php echo get_theme_mod('crispprop_contact_address', ''); ?></span>
						</div>
					</div>

				<div class="clear"></div>
			</div>

			<?php $crispprop_contact_map = get_theme_mod('crispprop_contact_map', '');
			if (!$crispprop_contact_map) { ?>
			<div class="contact-map">
				<div id="map"></div>
				<?php $address = get_theme_mod('crispprop_contact_address', '');
				$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
				$geo = json_decode($geo, true);

				if ($geo['status'] == 'OK') {
					$latitude = $geo['results'][0]['geometry']['location']['lat'];
					$longitude = $geo['results'][0]['geometry']['location']['lng'];
				} ?>
				<script type="text/javascript">
				var map;
				function initMap() {
					var setLatLng = {lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?>};

					var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 16,
						center: setLatLng,
						scrollwheel: false,
					});

					var marker = new google.maps.Marker({
						position: setLatLng,
						map: map,
						icon: icon
					});
				}
				</script>
				<script src="//maps.googleapis.com/maps/api/js?v=3&key=AIzaSyDKDs2YOZC3MIALMMAttxaplWiu1IQlbbs&callback=initMap"></script>
			</div>
			<?php } ?>
		</div>
	<?php endwhile; ?>

<?php get_footer();
