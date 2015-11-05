<?php
/**
 * Template Name: Page Builder Blank Template
 *
 * Description: Displays a browser full-width blank page for use with page builders like Visual Composer, Beaver Builder and the Divi Builder. This template also removes the header and footer section of the page
 *
 * @package Quark
 * @since Quark 1.3.3
 */

get_header( 'blank' ); ?>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'builderfullwidth' ); ?>
			<?php comments_template( '', true ); ?>
		<?php endwhile; // end of the loop. ?>

	<?php endif; // end have_posts() check ?>

<?php get_footer( 'blank' ); ?>
