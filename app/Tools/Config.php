<?php
/**
 * Config Class.
 *
 * A simple class for grabbing and returning a configuration file from `/config`.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic\Tools;

/**
 * Config class.
 *
 * @since  1.0.0
 * @access public
 */
class Config {

	/**
	 * Includes and returns a given PHP config file. The file must return
	 * an array.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string  $name
	 * @return array
	 */
	public static function get( string $name ) {

		$file = static::path( "{$name}.php" );

		return ( array ) apply_filters( "prismatic/config/{$name}/", file_exists( $file ) ? include( $file ) : [] );
	}

	/**
	 * Returns the config path or file path if set.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string  $file
	 * @return string
	 */
	public static function path( string $file = '' ) {

		$file = trim( $file, '/' );

		return get_parent_theme_file_path( $file ? "config/{$file}" : 'config' );
	}
}
