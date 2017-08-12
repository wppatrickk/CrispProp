<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package crispprop
 */
?>

<aside id="secondary" class="widget-area" role="complementary">
	<div id="properties-by-search" class="widget">
		<h3>Search Property</h3>

		<div class="property-form-wrap">
			<?php 
			if ($_GET) {
				$city = $_GET['city'];
				$type = $_GET['type'];
				$beds = $_GET['beds'];
				$bath = $_GET['bath'];
				$ptype = $_GET['ptype'];
			} ?>
			<form action="<?php echo esc_url( home_url() ); ?>/search/">
				<fieldset>
					<?php $pcities = get_terms( 'property_city' );
					if ( ! empty( $pcities ) && ! is_wp_error( $pcities ) ){ ?>
					    <select name="type" id="search-type">
					    <option value="" disabled <?php if ($_GET) { if (!$city) { echo 'selected'; } } ?>>City</option>';
					    <?php foreach ( $pcities as $pcity ) { ?>
					        <option value="<?php echo $pcity->slug; ?>" <?php if ($_GET) { if ($pcity->slug == $city) { echo 'selected'; } } ?>><?php echo $pcity->name; ?></option>';
					    <?php } ?>
					    </select>
					<?php } ?>
				</fieldset>

				<fieldset>
					<?php $prtypes = get_terms( 'property_type' );
					if ( ! empty( $prtypes ) && ! is_wp_error( $prtypes ) ){ ?>
					    <select name="type" id="search-type">
					    <option value="" disabled <?php if ($_GET) { if (!$type) { echo 'selected'; } } ?>>Property Type</option>';
					    <?php foreach ( $prtypes as $prtype ) { ?>
					        <option value="<?php echo $prtype->slug; ?>" <?php if ($_GET) { if ($prtype->slug == $type) { echo 'selected'; } } ?>><?php echo $prtype->name; ?></option>';
					    <?php } ?>
					    </select>
					<?php } ?>
				</fieldset>

				<?php $args = array(
					'post_type' => 'property',
					'posts_per_page' => -1
				);
				
				$properties = new WP_Query($args);

				if($properties->have_posts()) : 
					while($properties->have_posts()) : $properties->the_post();
						$pbeds[] = get_post_meta($post->ID, 'property_bed', true);
						$pbaths[] = get_post_meta($post->ID, 'property_bath', true);
					endwhile;
				endif;
				wp_reset_query();

				$pbeds = array_unique($pbeds);
				sort($pbeds);
				$pbaths = array_unique($pbaths);
				sort($pbaths); ?>
				
				<fieldset>
					<select name="beds" id="search-bed">
					    <option value="" disabled <?php if ($_GET) { if (!$beds) { echo 'selected'; } } ?>>Bedroom</option>
					    <?php foreach ( $pbeds as $pbed ) { ?>
					        <option value="<?php echo $pbed; ?>" <?php if ($_GET) { if ($pbed == $beds) { echo 'selected'; } } ?>><?php echo $pbed; ?></option>
					    <?php } ?>
					</select>
				</fieldset>

				<fieldset>
					<select name="bath" id="search-bath">
					    <option value="" disabled <?php if ($_GET) { if (!$bath) { echo 'selected'; } } ?>>Bathroom</option>
					    <?php foreach ( $pbaths as $pbath ) { ?>
					        <option value="<?php echo $pbath; ?>" <?php if ($_GET) { if ($pbath == $bath) { echo 'selected'; } } ?>><?php echo $pbath; ?></option>
					    <?php } ?>
					</select>
				</fieldset>

				<fieldset>
					<div class="search-radio">
						<div class="search-radio-buttons">
							<a href="#search-rent" <?php if ($_GET) { if ($ptype == 'rent') { echo 'class="active"'; } } else { echo 'class="active"'; } ?>>Rent</a><a href="#search-sale" <?php if ($_GET) { if ($ptype == 'sale') { echo 'class="active"'; } } ?>>Sale</a>
						</div>
						<div class="search-radio-input">
							<input type="radio" id="search-rent" name="search-ptype" value="rent" <?php if ($_GET) { if ($ptype == 'rent') { echo 'checked'; } } else { echo 'checked'; } ?> />
							<input type="radio" id="search-sale" name="search-ptype" value="sale" <?php if ($_GET) { if ($ptype == 'sale') { echo 'checked'; } } ?> />
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

	<div id="properties-by-city" class="widget city-filter">
		<h3>Properties by City</h3>

		<?php $cities = get_terms( 'property_city' );
		if ( ! empty( $cities ) && ! is_wp_error( $cities )) {
		    echo '<ul>';
		    foreach ( $cities as $city ) {
		        echo '<li><a href="' . get_term_link($city) . '">' . $city->name . '</a></li>';
		    }
		    echo '</ul>';
		} ?>
	</div>

	<div id="properties-by-type" class="widget type-filter">
		<h3>Properties by Type</h3>

		<?php $types = get_terms( 'property_type' );
		if ( ! empty( $types ) && ! is_wp_error( $types ) ){
		    echo '<ul>';
		    foreach ( $types as $type ) {
		        echo '<li><a href="' . get_term_link($type) . '">' . $type->name . '</a></li>';
		    }
		    echo '</ul>';
		} ?>
	</div>

	<?php dynamic_sidebar( 'property-sidebar' ); ?>
</aside><!-- #secondary -->
