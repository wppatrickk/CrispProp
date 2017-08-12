<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package crispprop
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="inner">
			<ul>
				<li class="footer-widget-1 footer-widget">
					<img src="<?php echo get_theme_mod('crispprop_footer_logo', ''); ?>" alt="" />
					<?php echo get_theme_mod('crispprop_footer_intro', ''); ?>
				</li>
				<li class="footer-widget-2 footer-widget">
					<?php dynamic_sidebar('footer-1'); ?>
				</li>

				<li class="footer-widget-3 footer-widget">
					<?php dynamic_sidebar('footer-2'); ?>
				</li>

				<li class="footer-widget-4 footer-widget">
					<div class="footer-address">
						<p><?php echo get_theme_mod('crispprop_contact_address', ''); ?></p>
					</div>

					<div class="footer-phone">
						<p><?php echo get_theme_mod('crispprop_phone_number', ''); ?></p>
					</div>

					<div class="footer-email">
						<p><a href="mailto:<?php echo get_theme_mod('crispprop_email', ''); ?>"><?php echo get_theme_mod('crispprop_email', ''); ?></a></p>
					</div>
				</li>
			</ul>
		</div>
	</footer><!-- #colophon -->

	<div id="site-bottom">
		<div class="inner">
			<div class="footer-left">
				<p>&copy; <?php echo date('Y'); ?> Property. All Rights Reserved.</p>
			</div>

			<div class="footer-right">
				<p>Website by <a href="#">WP Designs</a></p>
			</div>

			<div class="clear"></div>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
