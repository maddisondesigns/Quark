<?php
/**
 * Template Name: Posts Archive Template
 *
 * Description: Displays an archive of posts, ordered by date. 
 *
 * @package Quark
 * @since Quark 1.0
 */

get_header(); ?>

		<div id="primary" class="site-content">

			<div id="content" class="row clearfix" role="main">
				<div class="col span_8_of_12">

					<?php if ( have_posts() ) : ?>
					
						<?php // Start the Loop ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', 'postarchives' ); ?>
						<?php endwhile; ?>

					<?php else : ?>
					
						<?php get_template_part( 'no-results' ); // Include the template that displays a message that posts cannot be found ?>

					<?php endif; // end have_posts() check ?>

				</div> <!-- /.col.span_8_of_12 -->
				<?php get_sidebar(); ?>
			</div> <!-- /#content.row -->
	
		</div> <!-- /#primary.site-content -->

<?php get_footer(); ?>