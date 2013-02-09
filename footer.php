<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=maincontentcontainer div and all content after.
 * There are also four footer widgets displayed. They will be displayed in anywhere 
 * from one to four columns, depending on how many widgets are active.
 *
 * @package Quark
 * @since Quark 1.0
 */
?>

	</div> <!-- /#maincontentcontainer -->

	<div id="footercontainer">

		<footer class="site-footer row clearfix" role="contentinfo">

			<?php
			// Count how many footer sidebars are active so we can work out how many containers we need
			$footerSidebars = 0;
			for( $x=1; $x<=4; $x++ ) {
				if ( is_active_sidebar( 'sidebar-footer' . $x ) ) {
					$footerSidebars++;
				}
			}
			
			// If there's one or more one active sidebars, create a row and add them
			if( $footerSidebars > 0 ) { ?>
				<?php
				// Work out the container class name based on the number of active footer sidebars
				$containerClass = "span_" . 12 / $footerSidebars . "_of_12";

				// Display the active footer sidebars
				for( $x=1; $x<=4; $x++ ) {
					if ( is_active_sidebar( 'sidebar-footer'. $x ) ) { ?>
						<div class="col <?php echo( $containerClass ) ?>">
							<div class="widget-area" role="complementary">
								<?php dynamic_sidebar( 'sidebar-footer'. $x ); ?>
							</div>
						</div> <!-- /.col.<?php echo( $containerClass ) ?> -->
					<?php }
				} ?>

			<?php } ?>

		</footer> <!-- /.site-footer.row -->

		<?php if( of_get_option( 'footer_content', quark_get_credits() ) ) {
			echo '<div class="row smallprint clearfix">';
			echo apply_filters( 'meta_content', of_get_option( 'footer_content', quark_get_credits() ) );
			echo '</div> <!-- /.smallprint -->';

		} ?>

	</div> <!-- /.footercontainer -->

</div> <!-- /.#wrapper.hfeed.site -->

<?php if( of_get_option( 'ga_trackingid', '' ) ) { ?>
	<!-- Add in the Google Analytics Tracking ID from the Theme Options -->
	<script>
		window._gaq = [['_setAccount','<?php echo of_get_option( 'ga_trackingid', '' ); ?>'],['_trackPageview'],['_trackPageLoadTime']];
		Modernizr.load({
			load: ( 'https:' == location.protocol ? '//ssl' : '//www' ) + '.google-analytics.com/ga.js'
		});
	</script>
<?php } ?>

<?php wp_footer(); ?>
</body>

</html>