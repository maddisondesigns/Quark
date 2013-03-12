<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package Quark
 * @since Quark 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php quark_posted_on(); ?>
	</header> <!-- /.entry-header -->
	<div class="entry-content clearfix">
		<blockquote>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'quark' ) ); ?>
			<cite><?php the_title(); ?></cite>
		</blockquote>
	</div> <!-- /.entry-content -->

	<footer class="entry-meta">
		<?php if ( is_singular() ) {
			// Only show the tags on the Single Post page
			quark_entry_meta();
		} ?>
		<?php edit_post_link( __( 'Edit', 'quark' ) . ' <i class="icon-angle-right"></i>', '<div class="edit-link">', '</div>' ); ?>
	</footer> <!-- /.entry-meta -->
</article> <!-- /#post -->
