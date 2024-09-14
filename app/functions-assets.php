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

use function Backdrop\Mix\asset;

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

	// Rather than enqueue the main style.css stylesheet, we are going to enqueue screen.css.
	wp_enqueue_style( 'prismatic-screen', asset( 'assets/css/screen.css' ), null, null );

	// Enqueue theme scripts
	wp_enqueue_script( 'prismatic-app', asset( 'assets/js/app.js' ), [ 'jquery' ], null, true );

	// Enqueue Navigation.
	wp_enqueue_script( 'prismatic-navigation', asset( 'assets/js/navigation.js' ), null, null, true );
	wp_localize_script( 'prismatic-navigation', 'prismaticScreenReaderText', [
		'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'prismatic' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'prismatic' ) . '</span>',
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