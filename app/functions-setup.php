<?php
/**
 * Default theme setup.
 *
 * This is where all the add_theme_support(); will happen.
 *
 * @package   prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic;

use function Backdrop\Fonts\enqueue;
use function Backdrop\Theme\is_classicpress;

/**
 * Set up theme support.
 *
 * @return void
 *@since  1.0.0
 * @access public
 */

add_action( 'after_setup_theme', function() {

	// Set the theme content width.
	$GLOBALS['content_width'] = 640;

	// Load theme translations.
	load_theme_textdomain( 'prismatic', get_parent_theme_file_path( 'public/lang' ) );

	// Automatically add the `<title>` tag.
	add_theme_support( 'title-tag' );

	// Automatically add feed links to `<head>`.
	add_theme_support( 'automatic-feed-links' );

	// Adds featured image support.
	add_theme_support( 'post-thumbnails' );

	if ( ! is_classicpress() ) {

		// Outputs HTML5 markup for core features.
		add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );
	}
}, 5 );

/**
 * Register menus.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_nav_menus/
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'init', function() {

	register_nav_menus( [
		'primary'	=> esc_html__( 'Primary Navigation', 'prismatic' ),
		'social' => esc_html__( 'Social Navigation', 'prismatic' )
	] );

}, 5 );

/**
 * Register image sizes. Even if adding no custom image sizes or not adding
 * "thumbnails," it's still important to call `set_post_thumbnail_size()` so
 * that plugins that utilize the `post-thumbnail` size will have a properly-sized
 * thumbnail that matches the theme design.
 *
 * @link   https://developer.wordpress.org/reference/functions/set_post_thumbnail_size/
 * @link   https://developer.wordpress.org/reference/functions/add_image_size/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'init', function() {

	// Register custom image sizes.
	add_image_size( 'prismatic-small', 300, 300, true );

	add_image_size( 'prismatic-medium', 750, 422, true );

	add_image_size( 'prismatic-large', 1170, 614, true );

}, 5 );

/**
 * Register sidebars.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_sidebar/
 * @link   https://developer.wordpress.org/reference/functions/register_sidebars/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'widgets_init', function() {

	$args = [
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	];

	$sidebars = [
		[
			'id' => 'primary',
			'name' => esc_html__( 'Primary', 'prismatic' )
		],
		[
			'id' => 'secondary',
			'name' => esc_html__( 'Secondary', 'prismatic' )
		],
		[
			'id' => 'portfolio',
			'name' => esc_html__( 'Portfolio', 'prismatic' )
		],
		[
			'id' => 'custom',
			'name' => esc_html__( 'Custom', 'prismatic' )
		],
	];

	foreach ( $sidebars as $sidebar ) {
		register_sidebar( array_merge( $sidebar, $args ) );
	}
}, 5 );

add_action( 'after_setup_theme', function() {
	add_theme_support( 'custom-header',
		[
			'default-text-color' => 'ffffff',
			'default-image'      => get_parent_theme_file_uri( '/public/images/header-cross.png' ),
			'height'             => 1200,
			'max-width'          => 2000,
			'width'              => 2000,
			'flex-height'        => false,
			'flex-width'         => false,
		]
	);

	register_default_headers( [
		'header-image' => [
			'url'           => '%s/public/images/header-cross.png',
			'thumbnail_url' => '%s/public/images/header-cross.png',
			'description'   => esc_html__( 'Header Image', 'creativity' ),
		],
	] );
} );

add_action( 'after_setup_theme', function() {
	add_theme_support( 'custom-background', [
		'default-color' => 'ffffff',
		'default-image' => '',
	] );
} );
