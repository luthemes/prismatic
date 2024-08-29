<?php
/**
 * Footer Class.
 *
 * A simple class for outputting the appropriate footer credit text.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic\Template;
use Prismatic\Tools\PoweredBy;
use Prismatic\Tools\Mod;

/**
 * Powered by class.
 *
 * @since  1.0.0
 * @access public
 */
class Footer {

	/**
	 * Displays a random powered by quote.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public static function displayCredit() {
		echo static::renderCredit(); // phpcs:ignore
	}

	/**
	 * Returns a random powered by quote.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public static function renderCredit( array $args = [] ) {

		$args = wp_parse_args( $args, [
			'before' => '<p class="app-footer__credit">',
			'after'  => '</p>'
		] );

		$text = Mod::get( 'theme_footer_powered_by' ) ? PoweredBy::render() : Mod::get( 'theme_footer_custom_credit' );

		echo Mod::get( 'theme_footer_powered_by');

		return sprintf(
			'%s%s%s',
			$args['before'],
			wp_kses( $text, static::allowedTags() ),
			$args['after']
		);
	}

	/**
	 * Returns an array of allowed tags in footer text.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public static function allowedTags() {

		return [
			'a'       => [ 'href' => true, 'title' => true, 'class' => true ],
			'abbr'    => [ 'title' => true ],
			'acronym' => [ 'title' => true ],
			'bold'    => [ 'class' => true ],
			'code'    => [ 'class' => true ],
			'em'      => [ 'class' => true ],
			'i'       => [ 'class' => true ],
			'span'    => [ 'class' => true ],
			'strong'  => [ 'class' => true ],
			'br'	  => [ 'class' => true ]
		];
	}

	/**
	 * Returns an array of active footer sidebar IDs.
	 *
	 * @since  2.1.0
	 * @access public
	 * @return array
	 */
	public static function activeSidebars() {
		$active_sidebars = [];

		foreach ( range( 1, 4 ) as $id ) {

			if ( is_active_sidebar( "footer-{$id}" ) ) {
				$active_sidebars[] = "footer-{$id}";
			}
		}

		return $active_sidebars;
	}
}
