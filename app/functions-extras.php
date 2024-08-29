<?php
/**
 * Default extras template
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic;

use function Backdrop\Fonts\enqueue;
use Prismatic\Template\ErrorPage;

/**
 * Changes the theme template path to the `public/views` folder.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
add_filter( 'backdrop/template/path', function(): string {

	return 'public/views';
} );

/**
 * Enqueue Google Fonts in WordPress.
 *
 * This function hooks into the 'wp_enqueue_scripts' action to enqueue the specified
 * Google Fonts: 'fira-sans', 'merriweather', and 'tangerine'.
 */
add_action( 'wp_enqueue_scripts', function() {

	/**
	 * Enqueue a list of Google Fonts.
	 *
	 * @param array $files An array of Google Fonts to be enqueued.
	 */
	array_map( function( $file ) {
		enqueue( $file );
	}, [
		'fira-sans',
		'merriweather',
		'tangerine'
	] );
} );


add_filter( 'body_class', function( $classes ) {

	$global_layout = get_theme_mod( 'theme_global_layout_options', 'full' );


	if ( $global_layout == 'full' ) {
		$classes[] = 'layout-full';
	} elseif ( $global_layout == 'wide' ) {
		$classes[] = 'layout-wide';
	}

	return $classes;
} );

/**
 * Adds error data for the 404 content template. Passes in the `ErrorPage` object
 * as the `$error` variable.
 *
 * @since  1.0.0
 * @access public
 * @param  Backdrop\Tools\Collection  $data
 * @return Backdrop\Tools\Collection
 */
add_filter( 'backdrop/view/content/data', function( $data ) {

	if ( is_404() ) {
		$data->add( 'error', new ErrorPage() );
	}

	return $data;

} );