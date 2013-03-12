<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Quark
 * @since Quark 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( !is_front_page() ) { ?>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
		<?php } ?>
		<div class="entry-content clearfix">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'quark' ), 'after' => '</div>' ) ); ?>
		</div><!-- /.entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'quark' ) . ' <i class="icon-angle-right"></i>', '<div class="edit-link">', '</div>' ); ?>
		</footer><!-- /.entry-meta -->
	</article><!-- /#post -->
