<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package Quark
 * @since Quark 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
			<div class="featured-post">
				<?php _e( 'Featured post', 'quark' ); ?>
			</div>
		<?php } ?>
		<header class="entry-header">
			<?php if ( is_single() ) { ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php }
			else { ?>
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'quark' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
			<?php } // is_single() ?>
			<?php quark_posted_on(); ?>
			<?php if ( has_post_thumbnail() && !is_search() ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'quark' ), the_title_attribute( 'echo=0' ) ) ); ?>">
					<?php the_post_thumbnail( 'post_feature_full_width' ); ?>
				</a>
			<?php } ?>
		</header> <!-- /.entry-header -->

		<?php if ( is_search() ) { // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div> <!-- /.entry-summary -->
		<?php }
		else { ?>
			<div class="entry-content clearfix">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'quark' ) ); ?>
				<?php wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'quark' ),
					'after' => '</div>',
					'link_before' => '<span class="page-numbers">',
					'link_after' => '</span>'
				) ); ?>
			</div> <!-- /.entry-content -->
		<?php } ?>

		<footer class="entry-meta">
			<?php if ( is_singular() ) {
				// Only show the tags on the Single Post page
				quark_entry_meta();
			} ?>
			<?php edit_post_link( __( 'Edit', 'quark' ) . ' <i class="icon-angle-right"></i>', '<div class="edit-link">', '</div>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) { // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
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
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'quark' ), get_the_author() ); ?>
							</a>
						</div> <!-- /.author-link	-->
					</div> <!-- /.author-description -->
				</div> <!-- /.author-info -->
			<?php } ?>
		</footer> <!-- /.entry-meta -->
	</article> <!-- /#post -->
