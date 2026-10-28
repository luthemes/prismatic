<?php
/**
 * Framework missing
 *
 * Loaded instead of the theme's bootstrap files when the Backdrop framework can't be found,
 * which usually means `composer install` hasn't been run in the theme folder. Rather than a
 * fatal error, administrators see a notice explaining how to fix it.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

/**
 * Returns the message shown when the framework is missing.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function prismatic_framework_missing_message() {

	return sprintf(
		// Translators: 1 is the Composer command, 2 is the theme folder.
		esc_html__( 'The Prismatic theme can\'t find the Backdrop framework. Run %1$s in the %2$s folder, or upload a copy of the theme that includes its vendor folder.', 'prismatic' ),
		'<code>composer install --no-dev</code>',
		'<code>' . esc_html( get_template_directory() ) . '</code>'
	);
}

add_action( 'admin_notices', function() {

	if ( current_user_can( 'switch_themes' ) ) {
		printf( '<div class="notice notice-error"><p>%s</p></div>', wp_kses( prismatic_framework_missing_message(), [ 'code' => [] ] ) );
	}
} );
