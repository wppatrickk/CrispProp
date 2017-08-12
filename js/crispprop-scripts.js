jQuery(document).ready(function() {
    jQuery("#mobile-slide a").click(function(e) {
    	e.preventDefault();
        jQuery('body').addClass('mobile-nav-opened');
    });

    jQuery(".mobile-nav-close").click(function(e) {
    	e.preventDefault();
        jQuery('body').removeClass('mobile-nav-opened');
    });

    jQuery(".mobile-overlay").click(function() {
        jQuery('body').removeClass('mobile-nav-opened');
    });

    jQuery("#mobile-citynav span").click(function() {
        if (jQuery('#mobile-citynav ul').is(":hidden")) {
            jQuery('#mobile-citynav ul').slideDown();
			jQuery(this).addClass('city-nav-opened');
        } else {
        	jQuery('#mobile-citynav ul').slideUp();
			jQuery(this).removeClass('city-nav-opened');
        }
    });

    jQuery('.main-navigation .mobile-nav ul li.menu-item-has-children > a').each(function() {
  		jQuery(this).append('<span />');
	});

	jQuery(".mobile-nav ul li a span").live( "click", function(e) {
		e.preventDefault();
		if(jQuery(this).parent().parent().hasClass('menu-item-has-children')) {
			if(!jQuery(this).parent().parent().hasClass('opened')) {
				jQuery(this).parent().parent().addClass('opened');
				jQuery(this).parent().parent().find("ul").first().slideDown();
			} else {
				jQuery(this).parent().parent().removeClass('opened');
				jQuery(this).parent().parent().find("ul").first().slideUp();
			}
		}
	});

	jQuery('.search-radio-buttons a').click(function(e) {
		e.preventDefault();
		jQuery('.search-radio-buttons a').removeClass('active');
		jQuery(this).addClass('active');
		var searchtype = jQuery(this).attr('href');
		console.log(searchtype);
		jQuery(searchtype).prop('checked', true);
	});

	jQuery(window).on('resize', function() {
		var winWidth = jQuery(window).width();
		if (winWidth > 899) {
			if (jQuery('body').hasClass('mobile-nav-opened')) {
				jQuery('body').removeClass('mobile-nav-opened');
			}
		}
	});
});