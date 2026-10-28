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

use Prismatic\Tools\Config;
use Prismatic\Tools\Svg;

 add_filter( 'walker_nav_menu_start_el', function( $item_output, $item, $depth, $args ) {

	if ( 'social' === $args->theme_location ) {

		foreach ( Config::get( 'social-icons' ) as $url => $icon ) {

			if ( false !== strpos( $item->url, $url ) ) {
				$item_output = str_replace(
					$args->link_before,
					Svg::render( $icon ) . $args->link_before,
					$item_output
				);
			}
		}
	}

	return $item_output;

}, 10, 4 );
/**
 * Keeps the core post and menu item classes.
 *
 * The Backdrop framework replaces the core post classes (`post`, `page`, `type-post`,
 * `hentry`, `sticky`, ...) with its own (`entry`, `entry-type-post`, `is-sticky`, ...), and
 * the core menu item classes (`menu-item`, `current-menu-item`, `menu-item-has-children`, ...)
 * with `menu__item`, `menu__item--current` and `has-children`. The theme's styles and
 * `navigation.js` use the core classes, so the framework's filters are removed. They are added
 * when the application is created, so this runs on `after_setup_theme`.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

	remove_filter( 'post_class',         'Backdrop\post_class_filter',  ~PHP_INT_MAX );
	remove_filter( 'nav_menu_css_class', 'Backdrop\nav_menu_css_class', 5 );
} );
