jQuery(document).ready(function() {
    jQuery('.property-type input').change(function() {
        if (this.value == 'rent') {
            jQuery('.rent-period').show();
            jQuery('.sale-price').hide();
			jQuery('.monthly-rent').show();
        } else if (this.value == 'sale') {
            jQuery('.sale-price').show();
            jQuery('.rent-period').hide();
            jQuery('.weekly-rent').hide();
            jQuery('.monthly-rent').hide();
        }
    });

    var property_type = jQuery('.property-type input:checked').val();
    console.log(property_type);
    if (property_type == 'rent') {
        jQuery('.rent-period').show();
        jQuery('.sale-price').hide();
        jQuery('.monthly-rent').show();
    } else if (property_type == 'sale') {
        jQuery('.sale-price').show();
        jQuery('.rent-period').hide();
        jQuery('.weekly-rent').hide();
        jQuery('.monthly-rent').hide();
    }
});