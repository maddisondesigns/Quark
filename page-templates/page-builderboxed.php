<?php
/**
 * Template Name: Page Builder Boxed Template
 *
 * Description: Displays a boxed full-width page for use with page builders like Visual Composer, Beaver Builder and the Divi Builder.
 *
 * @package Quark
 * @since Quark 1.3.2
 */

get_header(); ?>

	<div id="primary" class="site-content row" role="main">
		<div class="col grid_12_of_12">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'builderboxed' ); ?>
					<?php comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>

			<?php endif; // end have_posts() check ?>

		</div> <!-- /.col.grid_12_of_12 -->
	</div><!-- /#primary.site-content.row -->

<?php get_footer(); ?>
