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
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic\FeatureImage;

use Backdrop\Contracts\Bootable;
use Prismatic\Tools\Config;

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

        add_action( 'after_setup_theme', [ $this, 'register' ] );
    }

    public function register(): void {

		$images = Config::get( 'image-sizes' );

		foreach ( $images as $name => $size ) {
			
			if ( 'post-thumbnail' === $name ) {
				set_post_thumbnail_size( $size['width'], $size['height'], true );
			} else {
				add_image_size( $name, $size['width'], $size['height'], true );
			}
		}

    }
}