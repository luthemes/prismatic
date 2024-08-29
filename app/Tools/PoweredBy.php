<?php
/**
 * Powered By Text Class.
 *
 * A simple class for randomly displaying a "powered by..." line of text in the
 * theme footer.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic\Tools;

/**
 * Powered by class.
 *
 * @since  1.0.0
 * @access public
 */
class PoweredBy {

	/**
	 * Returns an array of all the powered by quotes.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public static function all() {

		return apply_filters( 'amicable/poweredby/collection', [
			esc_html__( 'Powered by heart and soul.', 'amicable' ),
			esc_html__( 'Powered by crazy ideas and passion.', 'amicable' ),
			esc_html__( 'Powered by the thing that holds all things together in the universe.', 'amicable' ),
			esc_html__( 'Powered by love.', 'amicable' ),
			esc_html__( 'Powered by the vast and endless void.', 'amicable' ),
			esc_html__( 'Powered by the code of a maniac.', 'amicable' ),
			esc_html__( 'Powered by peace and understanding.', 'amicable' ),
			esc_html__( 'Powered by coffee.', 'amicable' ),
			esc_html__( 'Powered by sleepness nights.', 'amicable' ),
			esc_html__( 'Powered by the love of all things.', 'amicable' ),
			esc_html__( 'Powered by something greater than myself.', 'amicable' ),
			esc_html__( 'Powered by whispers from the future.', 'amicable' ),
			esc_html__( 'Powered by the fusion of technology and dreams.', 'amicable' ),
			esc_html__( 'Powered by the strength found in kindness.', 'amicable' ),
			esc_html__( 'Powered by the melodies of the unseen world.', 'amicable' ),
			esc_html__( 'Powered by the courage of the unheard voices.', 'amicable' ),
			esc_html__( 'Powered by the beauty of the human spirit.', 'amicable' ),
			esc_html__( 'Powered by the quest for eternal wisdom.', 'amicable' ),
			esc_html__( 'Powered by the energy of uncharted galaxies.', 'amicable' ),
			esc_html__( 'Powered by the magic hidden in plain sight.', 'amicable' ),
			esc_html__( 'Powered by the legacy of the ancients.', 'amicable' ),
			esc_html__( 'Powered by the dance between light and darkness.', 'amicable' ),
			esc_html__( 'Powered by the touch of the morning sun.', 'amicable' ),
			esc_html__( 'Powered by the secrets of the deep ocean.', 'amicable' ),
			esc_html__( 'Powered by the echoes of laughter and joy.', 'amicable' ),
			esc_html__( 'Powered by the relentless pursuit of truth.', 'amicable' ),
		] );
	}

	/**
	 * Displays a random powered by quote.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public static function display() {

		echo esc_html( static::render() );
	}

	/**
	 * Returns a random powered by quote.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public static function render() {

		$collection = static::all();

		return $collection[ array_rand( $collection, 1 ) ];
	}
}