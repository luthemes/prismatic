<?php
/**
 * Customize sanitize callbacks.
 *
 * Sanitize callbacks used by the theme's customizer settings. These lived in
 * the `backdrop-dev/customize` package, which is no longer needed now that the
 * framework ships its own `Backdrop\Customize` component.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic\Customize;

use WP_Customize_Setting;

/**
 * Sanitize class.
 *
 * @since  1.0.0
 * @access public
 */
class Sanitize {

	/**
	 * Sanitizes a layout choice against the choices of the setting's control.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @param  string               $input   Layout choice.
	 * @param  WP_Customize_Setting $setting Setting being sanitized.
	 * @return string
	 */
	public static function layouts( $input, $setting ) {

		$control = $setting->manager->get_control( $setting->id );
		$choices = $control ? (array) $control->choices : [];

		return array_key_exists( (string) $input, $choices ) ? (string) $input : $setting->default;
	}

	/**
	 * Sanitizes a checkbox value.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @param  mixed $value Checkbox value.
	 * @return bool
	 */
	public static function checkbox( $value ) {

		return wp_validate_boolean( $value );
	}
}
