<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace( "/\W/", "_", strtolower( $themename ) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'quark'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// If using image radio buttons, define a directory path
	$imagepath =  trailingslashit( get_template_directory_uri() ) . 'images/';

	// Background Defaults
	$background_defaults = array(
		'color' => '#222222',
		'image' => $imagepath . 'dark-noise.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' );

	// Editor settings
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	// Footer Position settings
	$footer_position_settings = array(
		'left' => __( 'Left aligned', 'quark' ),
		'center' => __( 'Center aligned', 'quark' ),
		'right' => __( 'Right aligned', 'quark' )
	);

	$options = array();

	$options[] = array(
		'name' => __( 'Basic Settings', 'quark' ),
		'type' => 'heading' );

	$options[] = array(
		'name' => __( 'Background', 'quark' ),
		'desc' => sprintf( __( 'If you&rsquo;d like to replace or remove the default background image, use the <a href="%1$s" title="Custom background">Appearance &gt; Background</a> menu option.', 'quark' ), admin_url( 'themes.php?page=custom-background' ) ),
		'type' => 'info' );

	$options[] = array(
		'name' => __( 'Logo', 'quark' ),
		'desc' => sprintf( __( 'If you&rsquo;d like to replace or remove the default logo, use the <a href="%1$s" title="Custom header">Appearance &gt; Header</a> menu option.', 'quark' ), admin_url( 'themes.php?page=custom-header' ) ),
		'type' => 'info' );

	$options[] = array(
		'name' => __( 'Social Media Settings', 'quark' ),
		'desc' => __( 'Enter the URLs for your Social Media platforms', 'quark' ),
		'type' => 'info' );

	$options[] = array(
		'name' => __( 'Twitter', 'quark' ),
		'desc' => __( 'Enter your Twitter URL.', 'quark' ),
		'id' => 'social_twitter',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Facebook', 'quark' ),
		'desc' => __( 'Enter your Facebook URL.', 'quark' ),
		'id' => 'social_facebook',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Google+', 'quark' ),
		'desc' => __( 'Enter your Google+ URL.', 'quark' ),
		'id' => 'social_googleplus',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'LinkedIn', 'quark' ),
		'desc' => __( 'Enter your LinkedIn URL.', 'quark' ),
		'id' => 'social_linkedin',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'GitHub', 'quark' ),
		'desc' => __( 'Enter your GitHub URL.', 'quark' ),
		'id' => 'social_github',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'YouTube', 'quark' ),
		'desc' => __( 'Enter your YouTube URL.', 'quark' ),
		'id' => 'social_youtube',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Instagram', 'quark' ),
		'desc' => __( 'Enter your Instagram URL.', 'quark' ),
		'id' => 'social_instagram',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Flickr', 'quark' ),
		'desc' => __( 'Enter your Flickr URL.', 'quark' ),
		'id' => 'social_flickr',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Pinterest', 'quark' ),
		'desc' => __( 'Enter your Pinterest URL.', 'quark' ),
		'id' => 'social_pinterest',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Advanced settings', 'quark' ),
		'type' => 'heading' );

	$options[] = array(
		'name' =>  __( 'Banner Background', 'quark' ),
		'desc' => __( 'Select an image and background color for the homepage banner.', 'quark' ),
		'id' => 'banner_background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __( 'Footer Background Color', 'quark' ),
		'desc' => __( 'Select the background color for the footer.', 'quark' ),
		'id' => 'footer_color',
		'std' => '#222222',
		'type' => 'color' );

	$options[] = array(
		'name' => __( 'Footer Content', 'quark' ),
		'desc' => __( 'Enter the text you&lsquo;d like to display in the footer. This content will be displayed just below the footer widgets. It&lsquo;s ideal for displaying your copyright message or credits.', 'quark' ),
		'id' => 'footer_content',
		'std' => quark_get_credits(),
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __( 'Footer Content Position', 'quark' ),
		'desc' => __( 'Select what position you would like the footer content aligned to.', 'quark' ),
		'id' => 'footer_position',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini',
		'options' => $footer_position_settings );

	$options[] = array(
		'name' => __( 'Google Analytics', 'quark' ),
		'desc' => __( 'Enter your Google Analytics Tracking ID. The Tracking ID will be in the form of UA-1234567-1.', 'quark' ),
		'id' => 'ga_trackingid',
		'std' => '',
		'class' => 'mini',
		'type' => 'text' );

	return $options;
}
