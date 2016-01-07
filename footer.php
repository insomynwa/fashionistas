<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package aThemes
 */
?>
		</div>
	<!-- #main --></div>

	<?php
		/* A sidebar in the footer? Yep. You can can customize
		 * your footer with up to four columns of widgets.
		 */
		get_sidebar( 'footer' );
	?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="clearfix container">
			<div class="site-info">
				&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
			</div><!-- .site-info -->

			<div class="site-credit">
				<!-- <a href="http://athemes.com/theme/fashionista">Fashionista</a> by aThemes -->
			</div><!-- .site-credit -->
		</div>
	<!-- #colophon --></footer>
	
	<script src="<?php echo bloginfo("template_url"); ?>/js/wickedpicker.js"></script>
	<!--<script type="text/javascript" src="<?php //echo bloginfo("template_url"); ?>/js/moment.js">
	</script>
	<script type="text/javascript" src="<?php //echo bloginfo("template_url"); ?>/css/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php //echo bloginfo("template_url"); ?>/js/bootstrap-datetimepicker.min.js"></script>-->

<?php wp_footer(); ?>

</body>
</html>