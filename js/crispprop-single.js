jQuery(document).ready(function() {
  jQuery('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 240,
    itemMargin: 5,
    asNavFor: '#slider'
  });

  jQuery('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
  });

  jQuery(".property-header-right a").click(function(e) {
    var target = jQuery(this).attr('href');
    jQuery('html, body').animate({
      scrollTop: jQuery(target).offset().top-60
    });
  });
});