<?php
/**
 * The template for displaying posts in the Audio post format
 * Uses the audio.js script by Anthony Kolber - http://kolber.github.com/audiojs/
 *
 * @package Quark
 * @since Quark 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
	</header> <!-- /.entry-header -->
	<div class="entry-content clearfix">
		<?php $pattern = '%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu';
		if ( (bool)preg_match( $pattern, get_the_content() ) == true && substr( strtolower( get_the_content() ), -4, 4 ) == ".mp3" ) {
			// If the content is a well formed URL && and an .mp3 then presume it's an audio source ?>
			<audio src="<?php echo get_the_content(); ?>" preload="auto" />
		<?php }
		else {
			// If it's not a well formed URL then simply output the content as it could be an embed code or an iframe (eg. soundcloud embed link)
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'quark' ) );
		} ?>
	</div> <!-- /.entry-content -->

	<footer class="entry-meta">
		<?php if ( is_singular() ) {
			// Only show the tags on the Single Post page
			quark_entry_meta();
		} ?>
		<?php edit_post_link( __( 'Edit', 'quark' ) . ' <i class="icon-angle-right"></i>', '<div class="edit-link">', '</div>' ); ?>
	</footer> <!-- /.entry-meta -->
</article> <!-- /#post -->
