<?php
/**
 * Default scripts functions
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic;

use function Prismatic\Vite\asset;

/**
 * Enqueue Scripts and Styles
 *
 * @since  1.0.0
 * @access public
 * @return void
 *
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */

add_action( 'wp_enqueue_scripts', function() {

	// Assets are enqueued by their source path. `Prismatic\Vite\asset()` looks them up in Vite's
	// manifest.json, which maps them to the built files, whose names change with their contents.

	// Rather than enqueue the main style.css stylesheet, we are going to enqueue screen.css.
	wp_enqueue_style( 'prismatic-screen', asset( 'resources/scss/screen.scss' ), null, null );

	// Enqueue theme scripts
	wp_enqueue_script( 'prismatic-app', asset( 'resources/js/app.js' ), [ 'jquery' ], null, true );

	// Enqueue Navigation.
	wp_enqueue_script( 'prismatic-navigation', asset( 'resources/js/navigation.js' ), [ 'jquery' ], null, true );

	// Screen reader text for the menu toggles. `navigation.js` sets these as plain text.
	wp_localize_script( 'prismatic-navigation', 'prismaticScreenReaderText', [
		'expandMain'    => __( 'Open the main menu', 'prismatic' ),
		'collapseMain'  => __( 'Close the main menu', 'prismatic' ),
		'expandChild'   => __( 'expand child menu', 'prismatic' ),
		'collapseChild' => __( 'collapse child menu', 'prismatic' ),
	] );

	// Loads ClassicPress' comment-reply script where appropriate.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );

add_action('wp_enqueue_scripts', function() {

	$custom_image = get_header_image();

	$custom_css = "
			.site-intro {
				background: url({$custom_image});
				background-size: cover !important;
				box-sizing: border-box;
				padding: 8rem 0;
			}

			.site-intro .intro-header-title {
				color: #ffffff;
				font-size: 3rem;
				margin: 0;
				padding: 0;
				text-align: center;
			}

			.site-intro .intro-header-description {
				line-height: 1.8rem;
				color: #ffffff;
				margin: 0 auto;
				max-width: 768px;
				text-align: center;
			}
		";
	wp_add_inline_style( 'prismatic-screen', $custom_css );
}
);