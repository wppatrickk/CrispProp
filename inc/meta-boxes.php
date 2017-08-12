<?php
/*
 * @author    WP Designs
 * @copyright Copyright (c) 2016, WP Designs, https://wp-designs.com
 * @license   http://en.wikipedia.org/wiki/MIT_License The MIT License
*/

add_action( 'add_meta_boxes', 'crispprop_metabox' );

function crispprop_metabox() {
    add_meta_box( 'crispprop-settings', __( "Property Details", 'crispprop' ), 'crispprop_settings', 'property', 'normal', 'high' );
}

add_action( 'add_meta_boxes', 'crispprop_featured' );

function crispprop_featured() {
    add_meta_box( 'crispprop-featured', __( "Featured", 'crispprop' ), 'crispprop_featured_cb', 'property', 'side', 'high' );
}

function crispprop_featured_cb($post) {
	wp_nonce_field( 'crispprop_nonce_set', 'crispprop_nonce' );
	$property_featured = get_post_meta($post->ID, 'property_featured', true); ?>

	<div class="crispprop-featured">
		<input type="checkbox" name="property_featured" value="featured" <?php if ($property_featured == 'on') { echo 'checked'; } ?> />Featured on Home Page</label>
	</div>
<?php }

function crispprop_settings($post) {
	wp_nonce_field( 'crispprop_nonce_set', 'crispprop_nonce' );
	$property_address = get_post_meta($post->ID, 'property_address', true); 
	$property_type = get_post_meta($post->ID, 'property_type', true);
	$monthly_rent = get_post_meta($post->ID, 'monthly_rent', true);
	$sale_price = get_post_meta($post->ID, 'sale_price', true);
	$property_size = get_post_meta($post->ID, 'property_size', true);
	$property_bed = get_post_meta($post->ID, 'property_bed', true);
	$property_bath = get_post_meta($post->ID, 'property_bath', true);
	$property_tname = get_post_meta($post->ID, 'property_tname', true);
	$property_dist = get_post_meta($post->ID, 'property_dist', true);
	$property_adist = get_post_meta($post->ID, 'property_adist', true);
	$property_deposit = get_post_meta($post->ID, 'property_deposit', true);
	$property_features = get_post_meta($post->ID, 'property_features', true);
	$property_features = unserialize($property_features);
	$property_bedsli = get_post_meta($post->ID, 'property_bedsli', true);
	$property_bedsli = unserialize($property_bedsli);
	$property_kitchen = get_post_meta($post->ID, 'property_kitchen', true);
	$property_kitchen = unserialize($property_kitchen);
	$property_extras = get_post_meta($post->ID, 'property_extras', true); 
	$property_extras = unserialize($property_extras); ?>

	<div id="crispprop-settings">
		<div class="crispprop-grid-wrap">
			<fieldset>
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Address', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="property_address"><?php esc_attr_e( 'Address', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<input type="text" name="property_address" value="<?php echo $property_address; ?>" />
				</span>
			</fieldset>

			<fieldset class="property-type">
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Property Type', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="property_type"><?php esc_attr_e( 'Property Type', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<span class="crispprop-radio">
						<label><input type="radio" name="property_type" value="rent" <?php if ($property_type == 'rent') { echo 'checked'; } ?> />Rent</label>
					</span>
					<span class="crispprop-radio">
						<label><input type="radio" name="property_type" value="sale" <?php if ($property_type == 'sale') { echo 'checked'; } ?> />Sale</label>
					</span>
				</span>
			</fieldset>

			<fieldset class="monthly-rent">
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Monthly Rent', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="monthly_rent"><?php esc_attr_e( 'Monthly Rent', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<input type="number" name="monthly_rent" value="<?php echo $monthly_rent; ?>" />
				</span>
			</fieldset>

			<fieldset class="sale-price">
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Sale Price', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="sale_price"><?php esc_attr_e( 'Sale Price', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<input type="number" name="sale_price" value="<?php echo $sale_price; ?>" />
				</span>
			</fieldset>

			<fieldset>
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Size', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="property_size"><?php esc_attr_e( 'Size (In Sq. meters)', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<input type="number" name="property_size" value="<?php echo $property_size; ?>" />
				</span>
			</fieldset>

			<fieldset>
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Bedrooms', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="property_bed"><?php esc_attr_e( 'Bedrooms', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<input type="number" name="property_bed" value="<?php echo $property_bed; ?>" />
				</span>
			</fieldset>

			<fieldset>
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Bathrooms', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="property_bath"><?php esc_attr_e( 'Bathrooms', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<input type="number" name="property_bath" value="<?php echo $property_bath; ?>" />
				</span>
			</fieldset>

			<fieldset>
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Terminal Name', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="property_tname"><?php esc_attr_e( 'Terminal Name', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<input type="text" name="property_tname" value="<?php echo $property_tname; ?>" />
				</span>
			</fieldset>

			<fieldset>
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Distance from Terminal', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="property_dist"><?php esc_attr_e( 'Distance from Terminal', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<input type="number" name="property_dist" value="<?php echo $property_dist; ?>" />
				</span>
			</fieldset>

			<fieldset>
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Distance from Airport', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="property_adist"><?php esc_attr_e( 'Distance from Airport', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<input type="number" name="property_adist" value="<?php echo $property_adist; ?>" />
				</span>
			</fieldset>

			<fieldset>
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Security Deposit', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="property_deposit"><?php esc_attr_e( 'Security Deposit', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<input type="number" name="property_deposit" value="<?php echo $property_deposit; ?>" />
				</span>
			</fieldset>

			<fieldset>
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Features', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="property_features"><?php esc_attr_e( 'Features', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Wooden Floors" <?php echo (in_array('Wooden Floors', $property_features)) ? 'checked="checked"' : ''; ?> />Wooden Floors</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Balcony" <?php echo (in_array('Balcony', $property_features)) ? 'checked="checked"' : ''; ?> />Balcony</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Patio" <?php echo (in_array('Patio', $property_features)) ? 'checked="checked"' : ''; ?> />Patio</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Deck" <?php echo (in_array('Deck', $property_features)) ? 'checked="checked"' : ''; ?> />Deck</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Garden" <?php echo (in_array('Garden', $property_features)) ? 'checked="checked"' : ''; ?> />Garden</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Air Conditioner" <?php echo (in_array('Air Conditioner', $property_features)) ? 'checked="checked"' : ''; ?> />Air Conditioner</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Central Heating" <?php echo (in_array('Central Heating', $property_features)) ? 'checked="checked"' : ''; ?> />Central Heating</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Electrical Heating" <?php echo (in_array('Electrical Heating', $property_features)) ? 'checked="checked"' : ''; ?> />Electrical Heating</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Internet (Wi-Fi)" <?php echo (in_array('Internet (Wi-Fi)', $property_features)) ? 'checked="checked"' : ''; ?> />Internet (Wi-Fi)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Internet (LAN)" <?php echo (in_array('Internet (LAN)', $property_features)) ? 'checked="checked"' : ''; ?> />Internet (LAN)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="No Smoking" <?php echo (in_array('No Smoking', $property_features)) ? 'checked="checked"' : ''; ?> />No Smoking</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="No Pets" <?php echo (in_array('No Pets', $property_features)) ? 'checked="checked"' : ''; ?> />No Pets</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Pets Allowed" <?php echo (in_array('Pets Allowed', $property_features)) ? 'checked="checked"' : ''; ?> />Pets Allowed</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Rooftop Deck" <?php echo (in_array('Rooftop Deck', $property_features)) ? 'checked="checked"' : ''; ?> />Rooftop Deck</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Elevator" <?php echo (in_array('Elevator', $property_features)) ? 'checked="checked"' : ''; ?> />Elevator</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="TV" <?php echo (in_array('TV', $property_features)) ? 'checked="checked"' : ''; ?> />TV</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Cable" <?php echo (in_array('Cable', $property_features)) ? 'checked="checked"' : ''; ?> />Cable</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Satellite" <?php echo (in_array('Satellite', $property_features)) ? 'checked="checked"' : ''; ?> />Satellite</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Stereo" <?php echo (in_array('Stereo', $property_features)) ? 'checked="checked"' : ''; ?> />Stereo</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="DVD Player" <?php echo (in_array('DVD Player', $property_features)) ? 'checked="checked"' : ''; ?> />DVD Player</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_features[]" value="Terrace" <?php echo (in_array('Terrace', $property_features)) ? 'checked="checked"' : ''; ?> />Terrace</label>
					</span>
				</span>
			</fieldset>

			<fieldset>
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Beds and Linen', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="property_bedsli"><?php esc_attr_e( 'Beds and Linen', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_bedsli[]" value="King Bed(s)" <?php echo (in_array('King Bed(s)', $property_bedsli)) ? 'checked="checked"' : ''; ?> />King Bed(s)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_bedsli[]" value="Queen Bed(s)" <?php echo (in_array('Queen Bed(s)', $property_bedsli)) ? 'checked="checked"' : ''; ?> />Queen Bed(s)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_bedsli[]" value="Full Bed(s)" <?php echo (in_array('Full Bed(s)', $property_bedsli)) ? 'checked="checked"' : ''; ?> />Full Bed(s)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_bedsli[]" value="Double Bed(s)" <?php echo (in_array('Double Bed(s)', $property_bedsli)) ? 'checked="checked"' : ''; ?> />Double Bed(s)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_bedsli[]" value="Twin Bed(s)" <?php echo (in_array('Twin Bed(s)', $property_bedsli)) ? 'checked="checked"' : ''; ?> />Twin Bed(s)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_bedsli[]" value="Single Sofa Bed(s)" <?php echo (in_array('Single Sofa Bed(s)', $property_bedsli)) ? 'checked="checked"' : ''; ?> />Single Sofa Bed(s)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_bedsli[]" value="Double Sofa Bed(s)" <?php echo (in_array('Double Sofa Bed(s)', $property_bedsli)) ? 'checked="checked"' : ''; ?> />Double Sofa Bed(s)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_bedsli[]" value="Air Mattress(s)" <?php echo (in_array('Air Mattress(s)', $property_bedsli)) ? 'checked="checked"' : ''; ?> />Air Mattress(s)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_bedsli[]" value="Queen Size Air Mattress(s)" <?php echo (in_array('Queen Size Air Mattress(s)', $property_bedsli)) ? 'checked="checked"' : ''; ?> />Queen Size Air Mattress(s)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_bedsli[]" value="Single Air Mattress(s)" <?php echo (in_array('Single Air Mattress(s)', $property_bedsli)) ? 'checked="checked"' : ''; ?> />Single Air Mattress(s)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_bedsli[]" value="Bed Linen Provided" <?php echo (in_array('Bed Linen Provided', $property_bedsli)) ? 'checked="checked"' : ''; ?> />Bed Linen Provided</label>
					</span>
				</span>
			</fieldset>

			<fieldset>
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Kitchen', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="property_kitchen"><?php esc_attr_e( 'Kitchen', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Refrigerator" <?php echo (in_array('Refrigerator', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Refrigerator</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Freezer" <?php echo (in_array('Freezer', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Freezer</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Stove" <?php echo (in_array('Stove', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Stove</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Oven" <?php echo (in_array('Oven', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Oven</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Microwave" <?php echo (in_array('Microwave', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Microwave</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Coffee Maker" <?php echo (in_array('Coffee Maker', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Coffee Maker</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Toaster" <?php echo (in_array('Toaster', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Toaster</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Pots and Pans" <?php echo (in_array('Pots and Pans', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Pots and Pans</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Kettle" <?php echo (in_array('Kettle', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Kettle</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Dishwasher" <?php echo (in_array('Dishwasher', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Dishwasher</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Glassware" <?php echo (in_array('Glassware', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Glassware</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Silverware" <?php echo (in_array('Silverware', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Silverware</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Dishes" <?php echo (in_array('Dishes', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Dishes</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Blender" <?php echo (in_array('Blender', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Blender</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Kitchen Supplies and Utensils" <?php echo (in_array('Kitchen Supplies and Utensils', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Kitchen Supplies and Utensils</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_kitchen[]" value="Induction Cooker" <?php echo (in_array('Induction Cooker', $property_kitchen)) ? 'checked="checked"' : ''; ?> />Induction Cooker</label>
					</span>
				</span>
			</fieldset>

			<fieldset>
				<legend class="screen-reader-text"><span><?php esc_attr_e( 'Extras', 'crispprop' ); ?></span></legend>
				<span class="crispprop-label">
					<label for="property_extras"><?php esc_attr_e( 'Extras', 'crispprop' ); ?></label>
				</span>

				<span class="crispprop-option">
					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Pool (Shared)" <?php echo (in_array('Pool (Shared)', $property_extras)) ? 'checked="checked"' : ''; ?> />Pool (Shared)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Pool (Private)" <?php echo (in_array('Pool (Private)', $property_extras)) ? 'checked="checked"' : ''; ?> />Pool (Private)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Hot Tub" <?php echo (in_array('Hot Tub', $property_extras)) ? 'checked="checked"' : ''; ?> />Hot Tub</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Jacuzzi" <?php echo (in_array('Jacuzzi', $property_extras)) ? 'checked="checked"' : ''; ?> />Jacuzzi</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Gym" <?php echo (in_array('Gym', $property_extras)) ? 'checked="checked"' : ''; ?> />Gym</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Barbeque/Grill" <?php echo (in_array('Barbeque/Grill', $property_extras)) ? 'checked="checked"' : ''; ?> />Barbeque/Grill</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Hair Dryer" <?php echo (in_array('Hair Dryer', $property_extras)) ? 'checked="checked"' : ''; ?> />Hair Dryer</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Iron" <?php echo (in_array('Iron', $property_extras)) ? 'checked="checked"' : ''; ?> />Iron</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Towels" <?php echo (in_array('Towels', $property_extras)) ? 'checked="checked"' : ''; ?> />Towels</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Fireplace" <?php echo (in_array('Fireplace', $property_extras)) ? 'checked="checked"' : ''; ?> />Fireplace</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Washer and Dryer (Coin Operated)" <?php echo (in_array('Washer and Dryer (Coin Operated)', $property_extras)) ? 'checked="checked"' : ''; ?> />Washer and Dryer (Coin Operated)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Washer and Dryer (Shared)" <?php echo (in_array('Washer and Dryer (Shared)', $property_extras)) ? 'checked="checked"' : ''; ?> />Washer and Dryer (Shared)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Washer and Dryer (Private)" <?php echo (in_array('Washer and Dryer (Private)', $property_extras)) ? 'checked="checked"' : ''; ?> />Washer and Dryer (Private)</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Garage" <?php echo (in_array('Garage', $property_extras)) ? 'checked="checked"' : ''; ?> />Garage</label>
					</span>

					<span class="crispprop-checkbox">
						<input type="checkbox" name="property_extras[]" value="Internet TV" <?php echo (in_array('Internet TV', $property_extras)) ? 'checked="checked"' : ''; ?> />Internet TV</label>
					</span>
				</span>
			</fieldset>

			<input type="submit" id="crispprop-update" value="Update" />
		</div>
	</div>
<?php }

add_action('save_post', 'crispprop_save_post');

function crispprop_save_post($post_id){
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    if( !isset( $_POST['crispprop_nonce'] ) || !wp_verify_nonce( $_POST['crispprop_nonce'], 'crispprop_nonce_set' ) ) return;
     
    if( !current_user_can( 'edit_post', $post_id ) ) return;

	if(isset($_POST['post_type']) && ($_POST['post_type'] == "property")) {
        $property_featured = isset( $_POST['property_featured'] ) && $_POST['property_featured'] ? 'on' : 'off';
		update_post_meta( $post_id, 'property_featured', $property_featured );

        if( $_POST['property_address'] ) {
			update_post_meta( $post_id, 'property_address', esc_attr( $_POST['property_address'] ) );
		}

		if( $_POST['property_type'] ) {
			update_post_meta( $post_id, 'property_type', esc_attr( $_POST['property_type'] ) );
		}

		if( $_POST['monthly_rent'] ) {
			update_post_meta( $post_id, 'monthly_rent', esc_attr( $_POST['monthly_rent'] ) );
		}

		if( $_POST['sale_price'] ) {
			update_post_meta( $post_id, 'sale_price', esc_attr( $_POST['sale_price'] ) );
		}

		if( $_POST['property_size'] ) {
			update_post_meta( $post_id, 'property_size', esc_attr( $_POST['property_size'] ) );
		}

		if( $_POST['property_bed'] ) {
			update_post_meta( $post_id, 'property_bed', esc_attr( $_POST['property_bed'] ) );
		}

		if( $_POST['property_bath'] ) {
			update_post_meta( $post_id, 'property_bath', esc_attr( $_POST['property_bath'] ) );
		}

		if( $_POST['property_tname'] ) {
			update_post_meta( $post_id, 'property_tname', esc_attr( $_POST['property_tname'] ) );
		}

		if( $_POST['property_dist'] ) {
			update_post_meta( $post_id, 'property_dist', esc_attr( $_POST['property_dist'] ) );
		}

		if( $_POST['property_adist'] ) {
			update_post_meta( $post_id, 'property_adist', esc_attr( $_POST['property_adist'] ) );
		}

		if( $_POST['property_deposit'] ) {
			update_post_meta( $post_id, 'property_deposit', esc_attr( $_POST['property_deposit'] ) );
		}

		$property_features = serialize($_POST['property_features']);
		update_post_meta( $post_id, 'property_features', $property_features );
		
		$property_bedsli = serialize($_POST['property_bedsli']);
		update_post_meta( $post_id, 'property_bedsli', $property_bedsli );
		
		$property_kitchen = serialize($_POST['property_kitchen']);
		update_post_meta( $post_id, 'property_kitchen', $property_kitchen );
		
		$property_extras = serialize($_POST['property_extras']);
		update_post_meta( $post_id, 'property_extras', $property_extras );
	}
}
?>