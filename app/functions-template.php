<?php
/**
 * Template tags.
 *
 * This file holds template tags for the theme. Template tags are PHP functions
 * meant for use within theme templates.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic;

/**
 * Returns the metadata separator.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $sep  String to separate metadata.
 * @return string
 */
function sep( $sep = '' ) {

	return apply_filters( 'prismatic/sep', sprintf(
		' <span class="sep">%s</span> ',
		$sep ?: esc_html_x( '&middot;', 'meta separator', 'prismatic' )
	) );
}
/**
 * Displays the post reading time.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $args  Arguments for `render_reading_time()`.
 * @return void
 */
function display_reading_time( array $args = [] ) {

	echo render_reading_time( $args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Returns the post reading time HTML, at 200 words a minute. This lived in the
 * `backdrop-dev/theme` package, which the framework's `develop` branch replaces.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $args  {
 *     @type string $text   Text with a `%s` placeholder for the minutes.
 *     @type string $class  Class for the wrapping `<span>`.
 *     @type string $before HTML before the reading time.
 *     @type string $after  HTML after the reading time.
 * }
 * @return string
 */
function render_reading_time( array $args = [] ) {

	$args = wp_parse_args( $args, [
		// Translators: %s is the number of minutes.
		'text'   => __( '%s min read', 'prismatic' ),
		'class'  => 'entry-reading-time',
		'before' => '',
		'after'  => '',
	] );

	$words   = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', get_the_ID() ) ) );
	$minutes = (int) ceil( $words / 200 );

	$html = sprintf(
		'<span class="%s">%s</span>',
		esc_attr( $args['class'] ),
		esc_html( sprintf( $args['text'], number_format_i18n( $minutes ) ) )
	);

	return apply_filters( 'prismatic/reading_time', $args['before'] . $html . $args['after'] );
}
