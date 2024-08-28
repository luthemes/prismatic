<?php
/**
 * Clean WP component.
 *
 * Handles cleaning up some ascpects of WP that are not needed on the front end.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/Prismatic
 */

namespace Prismatic\Clean;

use Backdrop\Contracts\Bootable;
use Prismatic\Settings\Options;

/**
 * Clean WP component class.
 *
 * @since  1.0.0
 * @access public
 */
class Component implements Bootable {

	/**
	 * Bootstraps the class' actions/filters.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot(): void {

		if ( Options::get( 'disable_emoji' ) ) {
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		}

		if ( Options::get( 'disable_toolbar' ) ) {
			add_filter( 'show_admin_bar', '__return_false' );
		}

		// WP adds this on `wp_head` with a priority of `10`, which runs
		// after scripts have been enqueued, so it goes to the footer.
		if ( Options::get( 'disable_wp_embed' ) ) {
			add_action( 'wp_footer', [ $this, 'dequeueEmbed' ] );
		}
	}

	/**
	 * Dequeues the embed JavaScript.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function dequeueEmbed() {
		wp_dequeue_script( 'wp-embed' );
	}
}
