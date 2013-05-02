<?php
/**
 * Quark functions and definitions
 *
 * @package Quark
 * @since Quark 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Quark 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 790; /* Default the embedded content width to 790px */


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Quark 1.0
 */
if ( ! function_exists( 'quark_setup' ) ) {
	function quark_setup() {
		global $content_width;

		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on Quark, use a find and replace
		 * to change 'quark' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'quark', trailingslashit( get_template_directory() ) . 'languages' );

		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );

		// Create an extra image size for the Post featured image
		add_image_size( 'post_feature_full_width', 792, 300, true );

		// This theme uses wp_nav_menu() in one location
		register_nav_menus( array(
				'primary' => __( 'Primary Menu', 'quark' )
			) );

		// This theme supports a variety of post formats
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );

		// Enable support for Custom Backgrounds
		add_theme_support( 'custom-background', array(
				// Background color default
				'default-color' => 'fff',
				// Background image default
				'default-image' => trailingslashit( get_template_directory_uri() ) . 'images/faint-squares.jpg'
			) );

		// Enable support for Custom Headers (or in our case, a custom logo)
		add_theme_support( 'custom-header', array(
				// Header image default
				'default-image' => trailingslashit( get_template_directory_uri() ) . 'images/logo.png',
				// Header text display default
				'header-text' => false,
				// Header text color default
				'default-text-color' => '000',
				// Flexible width
				'flex-width' => true,
				// Header image width (in pixels)
				'width' => 300,
				// Flexible height
				'flex-height' => true,
				// Header image height (in pixels)
				'height' => 80
			) );

		// Enable support for Theme Options.
		// Rather than reinvent the wheel, we're using the Options Framework by Devin Price, so huge props to him!
		// http://wptheming.com/options-framework-theme/
		if ( !function_exists( 'optionsframework_init' ) ) {
			define( 'OPTIONS_FRAMEWORK_DIRECTORY', trailingslashit( get_template_directory_uri() ) . 'inc/' );
			require_once trailingslashit( dirname( __FILE__ ) ) . 'inc/options-framework.php';
		}

	}
}
add_action( 'after_setup_theme', 'quark_setup' );


/**
 * Register widgetized areas
 *
 * @since Quark 1.0
 */
function quark_widgets_init() {
	register_sidebar( array(
			'name' => __( 'Main Sidebar', 'quark' ),
			'id' => 'sidebar-main',
			'description' => __( 'Appears in the sidebar on posts and pages except the optional Front Page template, which has its own widgets', 'quark' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => __( 'Blog Sidebar', 'quark' ),
			'id' => 'sidebar-blog',
			'description' => __( 'Appears in the sidebar on the blog and archive pages only', 'quark' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => __( 'Single Post Sidebar', 'quark' ),
			'id' => 'sidebar-single',
			'description' => __( 'Appears in the sidebar on single posts only', 'quark' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => __( 'Page Sidebar', 'quark' ),
			'id' => 'sidebar-page',
			'description' => __( 'Appears in the sidebar on pages only', 'quark' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => __( 'First Front Page Banner Widget', 'quark' ),
			'id' => 'frontpage-banner1',
			'description' => __( 'Appears in the banner area on the Front Page', 'quark' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>'
		) );

	register_sidebar( array(
			'name' => __( 'Second Front Page Banner Widget', 'quark' ),
			'id' => 'frontpage-banner2',
			'description' => __( 'Appears in the banner area on the Front Page', 'quark' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>'
		) );

	register_sidebar( array(
			'name' => __( 'First Front Page Widget Area', 'quark' ),
			'id' => 'sidebar-homepage1',
			'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'quark' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => __( 'Second Front Page Widget Area', 'quark' ),
			'id' => 'sidebar-homepage2',
			'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'quark' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => __( 'Third Front Page Widget Area', 'quark' ),
			'id' => 'sidebar-homepage3',
			'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'quark' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => __( 'Fourth Front Page Widget Area', 'quark' ),
			'id' => 'sidebar-homepage4',
			'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'quark' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => __( 'First Footer Widget Area', 'quark' ),
			'id' => 'sidebar-footer1',
			'description' => __( 'Appears in the footer sidebar', 'quark' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => __( 'Second Footer Widget Area', 'quark' ),
			'id' => 'sidebar-footer2',
			'description' => __( 'Appears in the footer sidebar', 'quark' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => __( 'Third Footer Widget Area', 'quark' ),
			'id' => 'sidebar-footer3',
			'description' => __( 'Appears in the footer sidebar', 'quark' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => __( 'Fourth Footer Widget Area', 'quark' ),
			'id' => 'sidebar-footer4',
			'description' => __( 'Appears in the footer sidebar', 'quark' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
}
add_action( 'widgets_init', 'quark_widgets_init' );


/**
 * Enqueue scripts and styles
 *
 * @since Quark 1.0
 */
function quark_scripts_styles() {

	/**
	 * Register and enqueue our stylesheets
	 */

	// Start off with a clean base by using normalise. If you prefer to use a reset stylesheet or something else, simply replace this
	wp_register_style( 'normalize', trailingslashit( get_template_directory_uri() ) . 'css/normalize.css' , array(), '2.1.0', 'all' );
	wp_enqueue_style( 'normalize' );

	// Register and enqueue our icon fonts
	// We're using the awesome Font Awesome icon font. http://gregoryloucas.github.com/Font-Awesome-More
	wp_register_style( 'fontawesome', trailingslashit( get_template_directory_uri() ) . 'css/font-awesome.min.css' , array(), '3.0.2', 'all' );
	wp_enqueue_style( 'fontawesome' );
	// We want the social icons as well
	wp_register_style( 'fontawesomesocial', trailingslashit( get_template_directory_uri() ) . 'css/font-awesome-social.css' , array(), '3.0.2', 'all' );
	wp_enqueue_style( 'fontawesomesocial' );
	// If you want to use the Corp. Extension & More icons as well, uncomment the following 4 lines. I haven't included them by default
	//wp_register_style( 'fontawesomecorp', trailingslashit( get_template_directory_uri() ) . 'css/font-awesome-corp.css' , array(), '3.0.2', 'all' );
	//wp_enqueue_style( 'fontawesomecorp' );
	//wp_register_style( 'fontawesomeext', trailingslashit( get_template_directory_uri() ) . 'css/font-awesome-ext.css' , array(), '3.0.2', 'all' );
	//wp_enqueue_style( 'fontawesomeext' );

	// Our styles for setting up the grid.
	// If you prefer to use a different grid system, simply replace this and perform a find/replace in the php for the relevant styles. I'm nice like that!
	wp_register_style( 'gridsystem', trailingslashit( get_template_directory_uri() ) . 'css/grid.css' , array(), '1.0.0', 'all' );
	wp_enqueue_style( 'gridsystem' );

	/*
	 * Load our Google Fonts.
	 * The use of PT Sans and Arvo by default is localized. For languages that use characters not supported by the fonts, the fonts can be disabled.
	 *
	 * To disable in a child theme, use wp_dequeue_style()
	 * function mytheme_dequeue_fonts() {
	 *     wp_dequeue_style( 'quark-ptsans' );
	 *     wp_dequeue_style( 'quark-arvo' );
	 * }
	 * add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );
	 */

	/* translators: If there are characters in your language that are not supported by PT Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'PT Sans font: on or off', 'quark' ) ) {
		$subsets = 'latin';

		/* translators: To add an additional PT Sans character subset specific to your language, translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'PT Sans font: add new subset (cyrillic)', 'quark' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'PT+Sans:400,400italic,700,700italic',
			'subset' => $subsets,
		);
		wp_enqueue_style( 'quark-ptsans', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
	}

	/* translators: If there are characters in your language that are not supported by Arvo, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Arvo font: on or off', 'quark' ) ) {
		$subsets = 'latin';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Arvo:400',
			'subset' => $subsets,
		);
		wp_enqueue_style( 'quark-arvo', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
	}

	// Enqueue the default WordPress stylesheet
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1.2.3', 'all' );


	/**
	 * Register and enqueue our scripts
	 */

	// Load Modernizr at the top of the document, which enables HTML5 elements and feature detects
	wp_register_script( 'modernizr', trailingslashit( get_template_directory_uri() ) . 'js/modernizr-2.6.2-min.js', array(), '2.6.2', false );
	wp_enqueue_script( 'modernizr' );

	// Adds JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Load jQuery Validation as well as the initialiser to provide client side comment form validation
	// Using the 1.11.0pre version as it fixes an error that causes the email validation to fire immediately when text is entered in the field
	// You can change the validation error messages below
	if ( is_singular() && comments_open() ) {
		wp_register_script( 'validate', trailingslashit( get_template_directory_uri() ) . 'js/jquery.validate.min.1.11.0pre.js', array( 'jquery' ), '1.11.0', true );
		wp_register_script( 'commentvalidate', trailingslashit( get_template_directory_uri() ) . 'js/comment-form-validation.js', array( 'jquery', 'validate' ), '1.11.0', true );

		wp_enqueue_script( 'commentvalidate' );
		wp_localize_script( 'commentvalidate', 'comments_object', array(
			'author'  => __( 'Please enter your name', 'quark' ),
			'email'  => __( 'Please enter a valid email address', 'quark' ),
			'comment' => __( 'Please add a comment', 'quark' ) )
		);
	}

	// Load Audio.js as well as the initialiser to provide an inline audio player for Audio Post Formats
	// Accepts valid .mp3 urls
	if ( is_singular() || is_home() ) {
		wp_register_script( 'audiojs', trailingslashit( get_template_directory_uri() ) . 'js/audiojs/audio.min.js', array(), '1.0', true );
		wp_register_script( 'initaudiojs', trailingslashit( get_template_directory_uri() ) . 'js/audiojs/init-audio.js', array( 'audiojs' ), '1.0', true );

		wp_enqueue_script( 'initaudiojs' );
	}

	// Load Google Analytics Tracking script only if the GA ID is specified in the Theme Options
	if ( of_get_option( 'ga_trackingid', '' ) ) {
		wp_register_script( 'analytics', trailingslashit( get_template_directory_uri() ) . 'js/google-analytics.js', array(), '1.0', true );

		wp_enqueue_script( 'analytics' );
		wp_localize_script( 'analytics', 'analytics_object', array( 'gatrackingid' => sanitize_text_field( of_get_option( 'ga_trackingid', '' ) ) ) );
	}

	// Include this script to envoke a button toggle for the main navigation menu on small screens
	//wp_register_script( 'small-menu', trailingslashit( get_template_directory_uri() ) . 'js/small-menu.js', array( 'jquery' ), '20130130', true );
	//wp_enqueue_script( 'small-menu' );

}
add_action( 'wp_enqueue_scripts', 'quark_scripts_styles' );


/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Quark 1.0
 */
function quark_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the blog name.
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'quark' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'quark_wp_title', 10, 2 );


/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Quark 1.0
 */
if ( ! function_exists( 'quark_content_nav' ) ) {
	function quark_content_nav( $nav_id ) {
		global $wp_query;
		$big = 999999999; // need an unlikely integer

		$nav_class = 'site-navigation paging-navigation';
		if ( is_single() ) {
			$nav_class = 'site-navigation post-navigation nav-single';
		}
		?>
		<nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'quark' ); ?></h3>

			<?php if ( is_single() ) { // navigation links for single posts ?>

				<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '<i class="icon-angle-left"></i>', 'Previous post link', 'quark' ) . '</span> %title' ); ?>
				<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '<i class="icon-angle-right"></i>', 'Next post link', 'quark' ) . '</span>' ); ?>

			<?php } 
			elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) { // navigation links for home, archive, and search pages ?>

				<?php echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var( 'paged' ) ),
					'total' => $wp_query->max_num_pages,
					'type' => 'list',
					'prev_text' => __( '<i class="icon-angle-left"></i>Previous' ),
					'next_text' => __( 'Next<i class="icon-angle-right"></i>' )
				) ); ?>

			<?php } ?>

		</nav><!-- #<?php echo $nav_id; ?> -->
		<?php
	}
}


/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own quark_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 * (Note the lack of a trailing </li>. WordPress will add it itself once it's done listing any children and whatnot)
 *
 * @since Quark 1.0
 */
if ( ! function_exists( 'quark_comment' ) ) {
	function quark_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) {
		case 'pingback' :
		case 'trackback' :
			// Display trackbacks differently than normal comments ?>
			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<article id="comment-<?php comment_ID(); ?>" class="pingback">
					<p><?php _e( 'Pingback:', 'quark' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'quark' ), '<span class="edit-link">', '</span>' ); ?></p>
				</article> <!-- #comment-##.pingback -->
			<?php
			break;
		default :
			// Proceed with normal comments.
			global $post; ?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<article id="comment-<?php comment_ID(); ?>" class="comment">
					<header class="comment-meta comment-author vcard">
						<?php
						echo get_avatar( $comment, 44 );
						printf( '<cite class="fn">%1$s %2$s</cite>',
							get_comment_author_link(),
							// If current post author is also comment author, make it known visually.
							( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'quark' ) . '</span>' : '' );
							printf( '<a href="%1$s" title="Posted %2$s"><time pubdate datetime="%3$s">%4$s</time></a>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							sprintf( __( '%1$s @ %2$s', 'quark' ), esc_html( get_comment_date() ), esc_attr( get_comment_time() ) ),
							get_comment_time( 'c' ),
							/* Translators: 1: date, 2: time */
							sprintf( __( '%1$s at %2$s', 'quark' ), get_comment_date(), get_comment_time() )
						);
						?>
					</header> <!-- .comment-meta -->

					<?php if ( '0' == $comment->comment_approved ) { ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'quark' ); ?></p>
					<?php } ?>

					<section class="comment-content comment">
						<?php comment_text(); ?>
						<?php edit_comment_link( __( 'Edit', 'quark' ), '<p class="edit-link">', '</p>' ); ?>
					</section> <!-- .comment-content -->

					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'quark' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div> <!-- .reply -->
				</article> <!-- #comment-## -->
			<?php
			break;
		} // end comment_type check
	}
}


/**
 * Update the Comments form so that the 'required' span is contained within the form label.
 *
 * @since Quark 1.0
 */
function quark_comment_form_default_fields( $fields ) {

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields[ 'author' ] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'quark' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';

	$fields[ 'email' ] =  '<p class="comment-form-email"><label for="email">' . __( 'Email', 'quark' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="email" email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';

	$fields[ 'url' ] =  '<p class="comment-form-url"><label for="url">' . __( 'Website', 'quark' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';

	return $fields;

}
add_action( 'comment_form_default_fields', 'quark_comment_form_default_fields' );


/**
 * Update the Comments form to add a 'required' span to the Comment textarea within the form label, because it's pointless 
 * submitting a comment that doesn't actually have any text in the comment field!
 *
 * @since Quark 1.0
 */
function quark_comment_form_field_comment( $field ) {

	$field = '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'quark' ) . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';

	return $field;

}
add_action( 'comment_form_field_comment', 'quark_comment_form_field_comment' );


/**
 * Prints HTML with meta information for current post: author and date
 *
 * @since Quark 1.0
 */
if ( ! function_exists( 'quark_posted_on' ) ) {
	function quark_posted_on() {
		$post_icon = '';
		switch ( get_post_format() ) {
			case 'aside':
				$post_icon = 'icon-file-alt';
				break;
			case 'audio':
				$post_icon = 'icon-volume-up';
				break;
			case 'chat':
				$post_icon = 'icon-comment';
				break;
			case 'gallery':
				$post_icon = 'icon-camera';
				break;
			case 'image':
				$post_icon = 'icon-picture';
				break;
			case 'link':
				$post_icon = 'icon-link';
				break;
			case 'quote':
				$post_icon = 'icon-quote-left';
				break;
			case 'status':
				$post_icon = 'icon-user';
				break;
			case 'video':
				$post_icon = 'icon-facetime-video';
				break;
			default:
				$post_icon = 'icon-calendar';
				break;
		}

		// Translators: 1: Icon 2: Permalink 3: Post date and time 4: Publish date in ISO format 5: Post date
		$date = sprintf( '<i class="%1$s"></i> <a href="%2$s" title="Posted %3$s" rel="bookmark"><time class="entry-date" datetime="%4$s" pubdate>%5$s</time></a>',
			$post_icon,
			esc_url( get_permalink() ),
			sprintf( __( '%1$s @ %2$s', 'quark' ), esc_html( get_the_date() ), esc_attr( get_the_time() ) ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		// Translators: 1: Date link 2: Author link 3: Categories 4: No. of Comments
		$author = sprintf( '<i class="icon-pencil"></i> <address class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></address>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'quark' ), get_the_author() ) ),
			get_the_author()
		);

		// Return the Categories as a list
		$categories_list = get_the_category_list( __( ' ', 'quark' ) );

		// Translators: 1: Permalink 2: Title 3: No. of Comments
		$comments = sprintf( '<span class="comments-link"><i class="icon-comment"></i> <a href="%1$s" title="%2$s">%3$s</a></span>',
			esc_url( get_comments_link() ),
			esc_attr( __( 'Comment on ' . the_title_attribute( 'echo=0' ) ) ),
			( get_comments_number() > 0 ? sprintf( _n( '%1$s Comment', '%1$s Comments', get_comments_number() ), get_comments_number() ) : __( 'No Comments', 'quark' ) )
		);

		// Translators: 1: Date 2: Author 3: Categories 4: Comments
		printf( __( '<div class="header-meta clearfix">%1$s%2$s<span class="post-categories">%3$s</span>%4$s</div>', 'quark' ),
			$date,
			$author,
			$categories_list,
			( is_search() ? '' : $comments )
		);
	}
}


/**
 * Prints HTML with meta information for current post: categories, tags, permalink
 *
 * @since Quark 1.0
 */
if ( ! function_exists( 'quark_entry_meta' ) ) {
	function quark_entry_meta() {
		// Return the Tags as a list
		$tag_list = "";
		if ( get_the_tag_list() ) {
			$tag_list = get_the_tag_list( '<span class="post-tags">', __( ' ', 'quark' ), '</span>' );
		}

		// Translators: 1 is tag
		if ( $tag_list ) {
			printf( __( '<i class="icon-tag"></i> %1$s', 'quark' ), $tag_list );
		}
	}
}


/**
 * Adjusts content_width value for full-width templates and attachments
 *
 * @since Quark 1.0
 */
function quark_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() ) {
		global $content_width;
		$content_width = 1200;
	}
}
add_action( 'template_redirect', 'quark_content_width' );


/**
 * Change the "read more..." link so it links to the top of the page rather than part way down
 *
 * @since Quark 1.0
 */
function quark_remove_more_jump_link( $link ) {
	$offset = strpos( $link, '#more-' );
	if ( $offset ) {
		$end = strpos( $link, '"', $offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}
add_filter( 'the_content_more_link', 'quark_remove_more_jump_link' );


/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Quark 1.0
 */
function quark_continue_reading_link() {
	return '&hellip;<p><a class="more-link" href="'. esc_url( get_permalink() ) . '" title="' . __( 'Continue reading', 'quark' ) . ' &lsquo;' . get_the_title() . '&rsquo;">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'quark' ) . '</a></p>';
}


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with the quark_continue_reading_link().
 *
 * @since Quark 1.0
 */
function quark_auto_excerpt_more( $more ) {
	return quark_continue_reading_link();
}
add_filter( 'excerpt_more', 'quark_auto_excerpt_more' );


/**
 * Extend the user contact methods to include Twitter, Facebook and Google+
 *
 * @since Quark 1.0
 */
function quark_new_contactmethods( $contactmethods ) {
	// Add Twitter
	$contactmethods['twitter'] = 'Twitter';

	//add Facebook
	$contactmethods['facebook'] = 'Facebook';

	//add Google Plus
	$contactmethods['googleplus'] = 'Google+';

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'quark_new_contactmethods', 10, 1 );


/**
 * Add a filter for wp_nav_menu to add an extra class for menu items that have children (ie. sub menus)
 * This allows us to perform some nicer styling on our menu items that have multiple levels (eg. dropdown menu arrows)
 *
 * @since Quark 1.0
 */
function quark_add_menu_parent_class( $items ) {

	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}

	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'menu-parent-item';
		}
	}

	return $items;
}
add_filter( 'wp_nav_menu_objects', 'quark_add_menu_parent_class' );


/**
 * Add Filter to allow Shortcodes to work in the Sidebar
 *
 * @since Quark 1.0
 */
add_filter( 'widget_text', 'do_shortcode' );


/**
 * Provide an extra layer of security by changing the login error message so it's not specific as to whether the Username or Password was incorrect
 *
 * @since Quark 1.0
 */
if ( ! function_exists( 'quark_failed_login' ) ) {
	function quark_failed_login() {
		return '<strong>ERROR:</strong> The login information you have entered is incorrect.';
	}
	add_filter( 'login_errors', 'quark_failed_login' );
}


/**
 * Return an unordered list of linked social media icons, based on the urls provided in the Theme Options
 *
 * @since Quark 1.0
 */
if ( ! function_exists( 'quark_get_social_media' ) ) {
	function quark_get_social_media() {
		$output = '';
		$icons = array(
			array( 'url' => of_get_option( 'social_twitter', '' ), 'icon' => 'icon-twitter', 'title' => __( 'Follow me on Twitter', 'quark' ) ),
			array( 'url' => of_get_option( 'social_facebook', '' ), 'icon' => 'icon-facebook', 'title' => __( 'Friend me on Facebook', 'quark' ) ),
			array( 'url' => of_get_option( 'social_googleplus', '' ), 'icon' => 'icon-google-plus', 'title' => __( 'Connect with me on Google+', 'quark' ) ),
			array( 'url' => of_get_option( 'social_linkedin', '' ), 'icon' => 'icon-linkedin-sign', 'title' => __( 'Connect with me on LinkedIn', 'quark' ) ),
			array( 'url' => of_get_option( 'social_github', '' ), 'icon' => 'icon-github-alt', 'title' => __( 'Fork me on GitHub', 'quark' ) ),
			array( 'url' => of_get_option( 'social_youtube', '' ), 'icon' => 'icon-youtube-sign', 'title' => __( 'Subscribe to me on YouTube', 'quark' ) ),
			array( 'url' => of_get_option( 'social_instagram', '' ), 'icon' => 'icon-instagram', 'title' => __( 'Follow me on Instagram', 'quark' ) ),
			array( 'url' => of_get_option( 'social_flickr', '' ), 'icon' => 'icon-flickr', 'title' => __( 'Connect with me on Flickr', 'quark' ) ),
			array( 'url' => of_get_option( 'social_pinterest', '' ), 'icon' => 'icon-pinterest-sign', 'title' => __( 'Follow me on Pinterest', 'quark' ) )
		);

		foreach ( $icons as $key ) {
			$value = $key['url'];
			if ( !empty( $value ) ) {
				$output .= sprintf( '<li><a href="%1$s" title="%2$s"><i class="%3$s"></i></a></li>',
					esc_url( $value ),
					$key['title'],
					$key['icon']
				);
			}
		}

		if ( !empty( $output ) ) {
			$output = '<ul>' . $output . '</ul>';
		}

		return $output;
	}
}


/**
 * Return a string containing the footer credits & link
 *
 * @since Quark 1.0
 */
if ( ! function_exists( 'quark_get_credits' ) ) {
	function quark_get_credits() {
		$output = '';
		$output = sprintf( '%1$s <a href="%2$s" title="%3$s">%4$s</a>',
			__( 'Proudly powered by', 'quark' ),
			esc_url( __( 'http://wordpress.org/', 'quark' ) ),
			esc_attr( __( 'Semantic Personal Publishing Platform', 'quark' ) ),
			__( 'WordPress', 'quark' )
		);

		return $output;
	}
}


/**
 * Outputs the selected Theme Options inline into the <head>
 *
 * @since Quark 1.0
 */
function quark_theme_options_styles() {
	$output = '';
	$imagepath =  trailingslashit( get_template_directory_uri() ) . 'images/';
	$background_defaults = array(
		'color' => '#222222',
		'image' => $imagepath . 'dark-noise.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' );

	$background = of_get_option( 'banner_background', $background_defaults );
	if ( $background ) {
		$output .= "#bannercontainer { ";
		$output .= "background: " . ( of_validate_hex( $background['color'] ) ? $background['color'] : '' ) . " url('" . esc_url( $background['image'] ) . "') " . $background['repeat'] . " " . $background['attachment'] . " " . $background['position'] . ";";
		$output .= " }";
	}

	$footerColour = of_get_option( 'footer_color', '#222222' );
	if ( of_validate_hex( $footerColour ) ) {
		$output .= "\n#footercontainer { ";
		$output .= "background-color: " . $footerColour . ";";
		$output .= " }";
	}

	if ( of_get_option( 'footer_position', 'center' ) ) {
		$output .= "\n.smallprint { ";
		$output .= "text-align: " . sanitize_text_field( of_get_option( 'footer_position', 'center' ) ) . ";";
		$output .= " }";
	}

	if ( $output != '' ) {
		$output = "\n<style>\n" . $output . "\n</style>\n";
		echo $output;
	}
}
add_action( 'wp_head', 'quark_theme_options_styles' );


/**
 * Recreate the default filters on the_content
 * This will make it much easier to output the Theme Options Editor content with proper/expected formatting.
 * We don't include an add_filter for 'prepend_attachment' as it causes an image to appear in the content, on attachment pages.
 * Also, since the Theme Options editor doesn't allow you to add images anyway, no big deal.
 *
 * @since Quark 1.0
 */
add_filter( 'meta_content', 'wptexturize' );
add_filter( 'meta_content', 'convert_smilies' );
add_filter( 'meta_content', 'convert_chars'  );
add_filter( 'meta_content', 'wpautop' );
add_filter( 'meta_content', 'shortcode_unautop'  );
