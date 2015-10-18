<?php
/**
 * Template Name: Page Builder Full-Width Template
 *
 * Description: Displays a browser full-width page for use with page builders like Visual Composer, Beaver Builder and the Divi Builder.
 *
 * @package Quark
 * @since Quark 1.3.2
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'builderfullwidth' ); ?>
			<?php comments_template( '', true ); ?>
		<?php endwhile; // end of the loop. ?>

	<?php endif; // end have_posts() check ?>

<?php get_footer(); ?>
