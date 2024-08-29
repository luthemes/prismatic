<?php
/**
 * Abstract customizable class.
 *
 * Base class for creating customizable components, which can be extended to
 * register customizer panels, sections, settings, controls, and partials.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic\Customize;
use Prismatic\Tools\Collection;
use WP_Customize_Manager;

/**
 * Customizable class.
 *
 * @since  1.0.0
 * @access public
 */
abstract class Customizable {

	/**
	 * Sets up initial object properties.  If the data array passed in
	 * contains a key that matches a property of the sub-class, its value
	 * gets assigned to that property.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array  $data
	 * @return void
	 */
	public function __construct( array $data = [] ) {

		foreach ( array_keys( get_object_vars( $this ) ) as $key ) {
			if ( isset( $data[ $key ] ) ) {
				$this->$key = $data[ $key ];
			}
		}
	}

	/**
	 * Registers customizer panels.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerPanels( WP_Customize_Manager $manager ) {}

	/**
	 * Registers customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSections( WP_Customize_Manager $manager ) {}

	/**
	 * Registers customizer settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSettings( WP_Customize_Manager $manager ) {}

	/**
	 * Registers customizer controls.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerControls( WP_Customize_Manager $manager ) {}

	/**
	 * Registers customizer partials.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerPartials( WP_Customize_Manager $manager ) {}

	/**
	* Registers JSON for the customize controls script via `wp_localize_script()`.
	* Objects added to the collection should implement the `JsonSerializable`
	* interface.
	*
	* @since  1.0.0
	* @access public
	* @param  Collection  $json
	* @return void
	*/
	public function controlsJson( Collection $json ) {}

	/**
	* Registers JSON for the customize preview script via `wp_localize_script()`.
	* Objects added to the collection should implement the `JsonSerializable`
	* interface.
	*
	* @since  1.0.0
	* @access public
	* @param  Collection  $json
	* @return void
	*/
	public function previewJson( Collection $json ) {}
}