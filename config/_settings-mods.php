<?php
/**
 * Theme mods settings Config.
 *
 * Defines the default theme mods for the theme. Child themes can overwrite this
 * with a `config/settings-mod.php` file for changing the defaults.
 *
 * Configs are loaded early in the load process. If a default value requires PHP
 * code to execute, use a closure. It will be invoked at an appropriate time when
 * all functions/variables are set up and available for use.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

 return [

	# ----------------------------------------------------------------------
	# Global layout.
	# ----------------------------------------------------------------------
	#
	# Handles the global theme layout mods.

	// Set the default layout.
	'layout' => 'full',

	# ----------------------------------------------------------------------
	# Header.
	# ----------------------------------------------------------------------
	#
	# Handles various header mods.

	'theme_header_custom_logo' => false,


	# ----------------------------------------------------------------------
	# Footer.
	# ----------------------------------------------------------------------
	#
	# Handles various footer mods.

	// Whether to show a random powered by quote by default. If set to `false`,
	// the `footer_credit` value will be used.
	'theme_footer_powered_by' => false,

	// Default footer credit text.
	'theme_footer_custom_credit' => function() {
		if ( is_classicpress() ) {
            return sprintf( __( 'Powered by %s.', 'creativity' ), SilverQuantum\Site\render_cp_link() );
        } else {
            return sprintf( __( 'Powered by %s.', 'creativity' ), SilverQuantum\Site\render_wp_link() );
        }
	},
 ];
