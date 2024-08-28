<?php
/**
 * Views Collection.
 *
 * Houses the collection of views in a single array-object.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/Prismatic
 */

namespace Prismatic\Settings\Admin\Views;

use Backdrop\Tools\Collection;

/**
 * Views class.
 *
 * @since  1.0.0
 * @access public
 */
class Views extends Collection {

	/**
	 * Adds a new view to the collection.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string  $name
	 * @param  array   $value
	 * @return void
	 */
	public function add( $name, $value ) {

		$view = is_string( $value ) ? new $value() : $value;

		parent::add( $name, $view );
	}
}