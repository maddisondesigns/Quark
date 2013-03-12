<?php
/**
 * The template for displaying an archive page for Categories.
 *
 * @package Quark
 * @since Quark 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content row clearfix" role="main">

		<div class="col grid_8_of_12">

			<?php if ( have_posts() ) : ?>

				<?php
				// Queue the first post, that way we know what author we're dealing with (if that is the case).
				// We reset this later so we can run the loop properly with a call to rewind_posts().
				the_post();
				?>

				<header class="archive-header">
					<h1 class="archive-title"><?php printf( __( 'Author Archives: %s', 'quark' ), '<span>' . get_the_author() . '</span>' ); ?></h1>
				</header><!-- .archive-header -->

				<?php // If a user has filled out their description, show a bio on their entries.
				if ( get_the_author_meta( 'description' ) ) { ?>

					<div class="author-info clearfix">
						<div class="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'quark_author_bio_avatar_size', 68 ) ); ?>
						</div> <!-- /#author-avatar -->
						<div class="author-description">
							<h2><?php printf( __( 'About %s', 'quark' ), get_the_author() ); ?></h2>
							<p><?php the_author_meta( 'description' ); ?></p>
							<p class="social-meta">
								<?php if ( get_the_author_meta( 'url' ) ) { ?>
									<a href="<?php the_author_meta( 'url' ) ?>" title="Website"><i class="icon-link"></i></a>
								<?php } ?>
								<?php if ( get_the_author_meta( 'twitter' ) ) { ?>
									<a href="<?php the_author_meta( 'twitter' ) ?>" title="Twitter"><i class="icon-twitter"></i></a>
								<?php } ?>
								<?php if ( get_the_author_meta( 'facebook' ) ) { ?>
									<a href="<?php the_author_meta( 'facebook' ) ?>" title="Facebook"><i class="icon-facebook-sign"></i></a>
								<?php } ?>
								<?php if ( get_the_author_meta( 'googleplus' ) ) { ?>
									<a href="<?php the_author_meta( 'googleplus' ) ?>" title="Google+"><i class="icon-google-plus"></i></a>
								<?php } ?>
							</p>

						</div> <!-- /.author-description -->
					</div> <!-- /.author-info -->

				<?php } ?>

				<?php
				// Since we called the_post() above, we need to rewind the loop back to the beginning that way we can run the loop properly, in full.
				rewind_posts();
				?>

				<?php // Start the Loop ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>

				<?php quark_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results' ); // Include the template that displays a message that posts cannot be found ?>

			<?php endif; // end have_posts() check ?>

		</div> <!-- /.col.grid_8_of_12 -->
		<?php get_sidebar(); ?>

	</div> <!-- /#primary.site-content.row -->

<?php get_footer(); ?>
