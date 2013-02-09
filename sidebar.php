<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Quark
 * @since Quark 1.0
 */
?>
	<div class="col span_4_of_12">

		<div id="secondary" class="widget-area" role="complementary">
			<?php
			do_action( 'before_sidebar' );

			if ( is_active_sidebar( 'sidebar-main' ) ) {
				dynamic_sidebar( 'sidebar-main' );
			}

			if ( is_active_sidebar( 'sidebar-blog' ) ) {
				dynamic_sidebar( 'sidebar-blog' );
			}
			?>

		</div><!-- /#secondary.widget-area -->

	</div> <!-- /.col.span_4_of_12 -->
