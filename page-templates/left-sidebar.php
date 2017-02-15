<?php
/**
 * Template Name: Left Sidebar Page Template
 * Template Post Type: page, post
 *
 * Description: Displays a page with a left hand sidebar. This template works for both Pages & Posts in WordPress 4.7+
 *
 * @package Quark
 * @since Quark 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content row" role="main">

		<?php get_sidebar(); ?>
		<div class="col grid_8_of_12">

			<?php if ( have_posts() ) : ?>

				<?php // Start the Loop ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
					if( is_page() ) {
						get_template_part( 'content', 'page' ); // Include the Post-Format-specific template for the content
					} else {
						get_template_part( 'content', get_post_format() ); // Include the Post-Format-specific template for the content
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) {
							comments_template( '', true );
						}
					}
					?>
				<?php endwhile; ?>

				<?php quark_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results' ); // Include the template that displays a message that posts cannot be found ?>

			<?php endif; // end have_posts() check ?>

		</div> <!-- /.col.grid_8_of_12 -->

	</div> <!-- /#primary.site-content.row -->

<?php get_footer(); ?>
