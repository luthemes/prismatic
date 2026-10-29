<?php
/**
 * Customize component.
 *
 * Integrates the theme's settings into the customizer.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic\Customize;

use Backdrop\Customize\Component as BaseComponent;
use Prismatic\Tools\Config;

use function Prismatic\Vite\asset;

/**
 * Handles setting up everything we need for the customizer.
 *
 * The framework's `Backdrop\Customize\Component` registers the `Theme: Global`, `Theme: Header`,
 * `Theme: Content` and `Theme: Footer` panels, moves the core sections into them, registers the
 * `radio-image` control type and calls each customizable component. This class adds the theme's
 * customizer scripts and styles and the inline styles for the customizer settings.
 *
 * @link   https://developer.wordpress.org/themes/customize-api
 * @since  1.0.0
 * @access public
 */
class Component extends BaseComponent {

	/**
	 * Adds our customizer-related actions to the appropriate hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot(): void {

		parent::boot();

		// Enqueue scripts and styles.
		add_action( 'customize_controls_enqueue_scripts', [ $this, 'controlsEnqueue' ] );
		add_action( 'customize_preview_init',             [ $this, 'previewEnqueue' ] );

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueueCustomizerStyles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueueBackgroundStyles' ] );
	}

	/**
	 * Register or enqueue scripts/styles for the controls that are output
	 * in the controls frame.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function controlsEnqueue() {

		wp_enqueue_style( 'prismatic-customize-controls', asset( 'resources/scss/customize-controls.scss' ), [], null );
		wp_enqueue_script( 'prismatic-customize-controls', asset( 'resources/js/customize-controls.js' ), [ 'customize-controls' ], null, true );
	}

	/**
	 * Register or enqueue scripts/styles for the live preview frame.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function previewEnqueue() {

		// Enqueue preview style.
		wp_enqueue_style( 'prismatic-customize-preview', asset( 'resources/scss/customize-previews.scss' ), [], null );

		// Enqueue preview script.
		wp_enqueue_script( 'prismatic-customize-preview', asset( 'resources/js/customize-previews.js' ), [ 'jquery', 'customize-preview' ], null, true );

		// The background patterns, for previewing the background settings.
		wp_localize_script( 'prismatic-customize-preview', 'prismaticCustomizePreview', [
			'backgroundSelector' => self::BACKGROUND_SELECTOR,
			'backgroundPatterns' => static::backgroundPatterns(),
		] );
	}

	public function enqueueCustomizerStyles() {
		$text_color = get_header_textcolor();
		$footer_background = get_theme_mod('theme_footer_background_color', '#0b5e79'); // Default value if not set
		$header_background = get_theme_mod( 'theme_header_background_color', '#0b5e79' );
	
		// Header text styles - only add if not default text color
		$header_styles = '';
		if (get_theme_support('custom-header', 'default-text-color') !== $text_color) {
			$value = display_header_text() ? sprintf('color: #%s;', esc_html($text_color)) : 'display: none;';
			$header_styles = "
				.site-header .branding-navigation .site-branding .site-title a,
				.site-header .branding-navigation .site-branding .site-description {
					$value
				}
			";
		}

		$header_background = "
			.site-header {
				background: {$header_background};
			}
		";
	
		// Footer background - always add
		$footer_styles = "
			.site-footer {
				background: {$footer_background};
			}
		";
	
		// Combine both styles
		$custom_css = $header_styles . $header_background . $footer_styles;
	
		// Add inline styles
		wp_add_inline_style('prismatic-screen', $custom_css);
	}
	
	

	/**
	 * Selector for the theme's background CSS. It's more specific than core's
	 * `body.custom-background`, so the chosen Background Type wins over the CSS core
	 * prints for a saved background image, which comes later in the page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	const BACKGROUND_SELECTOR = 'html body.custom-background';

	/**
	 * Returns the data URI for each background pattern, keyed by pattern.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public static function backgroundPatterns() {

		return array_map( function( $pattern ) {
			return 'data:image/svg+xml;base64,' . base64_encode( $pattern['svg'] ); // phpcs:ignore
		}, Config::get( 'background-patterns' ) );
	}

	/**
	 * Returns the background CSS for a Background Type. `customize-previews.js` builds
	 * the same CSS in the live preview, so keep the two in step.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string $type    Background type: none, image or pattern.
	 * @param  string $pattern Background pattern.
	 * @param  string $image   Background image URL.
	 * @return string
	 */
	public static function backgroundCss( $type, $pattern, $image ) {

		$patterns = static::backgroundPatterns();

		if ( 'image' === $type && $image ) {
			return sprintf( '%s { background-image: url("%s"); background-size: cover; }', self::BACKGROUND_SELECTOR, esc_url( $image ) );
		}

		if ( 'pattern' === $type && isset( $patterns[ $pattern ] ) ) {
			// A lighter, partly see-through background color blended with the pattern.
			return sprintf(
				'%s { background-color: rgba(255, 255, 255, 0.9); background-image: url("%s"); background-repeat: repeat; background-blend-mode: lighten; }',
				self::BACKGROUND_SELECTOR,
				$patterns[ $pattern ]
			);
		}

		if ( 'none' === $type ) {
			return sprintf( '%s { background-image: none; }', self::BACKGROUND_SELECTOR );
		}

		return '';
	}

	/**
	 * Prints the background CSS in its own `prismatic-background-inline-css` style
	 * block, which the live preview replaces as the background settings change.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueueBackgroundStyles() {

		wp_register_style( 'prismatic-background', false, [ 'prismatic-screen' ], null );
		wp_enqueue_style( 'prismatic-background' );

		wp_add_inline_style( 'prismatic-background', static::backgroundCss(
			get_theme_mod( 'theme_global_background_type', 'none' ),
			get_theme_mod( 'theme_global_background_pattern', 'none' ),
			get_background_image()
		) );
	}
}
