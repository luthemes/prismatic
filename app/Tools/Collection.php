<?php
/**
 * Collection Class.
 *
 * An extension of the Hybrid Core `Collection` class that implements the
 * `JsonSerializable` interface.  Note that this class will be removed in the
 * future if/when this gets added to the framework.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic\Tools;

use JsonSerializable;
use Backdrop\Tools\Collection as CollectionBase;

/**
 * Collection class.
 *
 * @since  1.0.0
 * @access public
 */
class Collection extends CollectionBase implements JsonSerializable {

	/**
	 * Returns a JSON-ready array of data.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function jsonSerialize() {

		return array_map( function( $value ) {

			if ( $value instanceof JsonSerializable ) {
				return $value->jsonSerialize();
			}

			return $value;

		}, $this->all() );
	}
}
