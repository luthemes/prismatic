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

use Backdrop\Contracts\Bootable;
use Prismatic\Tools\Config;
use Prismatic\Tools\Mod;
use Backdrop\App;

use WP_Customize_Manager;
use WP_Customize_Color_Control;
use WP_Customize_Control;

/**
 * Handles setting up everything we need for the customizer.
 *
 * @link   https://developer.wordpress.org/themes/customize-api
 * @since  1.0.0
 * @access public
 */
class Component implements Bootable {

	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot(): void {

		// Register panels, sections, settings, controls, and partials.
		array_map( function( $callback ) {
			add_action( 'customize_register', [ $this, $callback ] );
		}, [
			'registerPanels',
			'registerSections',
			'registerSettings',
			'registerControls',
		] );

		add_action('wp_enqueue_scripts', [$this, 'enqueueCustomizerStyles']);
		add_action('wp_enqueue_scripts', [$this, 'enqueueBackgroundStyles']);
	}

	/**
	 * Callback for registering panels.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#panels
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
	public function registerPanels( WP_Customize_Manager $manager ) {
		$config = Config::get( 'theme-customization' );

		if ( isset( $config['panels'] ) ) {
			foreach ( $config['panels' ] as $id => $panel ) {
				$manager->add_panel( $id, [
					'title' => $panel['title'],
					'description' => $panel['description'],
					'priority' => $panel['priority']
				] );
			}
		}
	}

	/**
	 * Callback for registering sections.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#sections
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
	public function registerSections( WP_Customize_Manager $manager ) {
		$manager->remove_section( 'custom_css' );
		$manager->get_section( 'title_tagline' )->panel = 'theme_header';
		$manager->get_section( 'title_tagline' )->title = esc_html__( 'Branding', 'backdrop' );
		$manager->get_section( 'static_front_page' )->panel = 'theme_content';
		$manager->get_section( 'static_front_page' )->title = __( 'Settings', 'prismatic' );

		$manager->remove_section('background_image');

		$manager->get_setting( 'background_color' )->default = '#ffffff';
		$manager->get_control( 'background_color' )->section = 'theme_global_background';
		$manager->get_control( 'background_color' )->description = __( 'Background color used for body of the site.', 'prismatic' );
		$manager->get_control( 'background_image' )->section = 'theme_global_background';
		$manager->get_control( 'background_image' )->priority = 25;

		// Add setting for background type (none, image, pattern)
		$manager->add_setting('mytheme_bg_type', array(
			'default' => 'none',
			'sanitize_callback' => 'sanitize_text_field',
		));

		// Add control for background type
		$manager->add_control('mytheme_bg_type_control', array(
			'label' => __('Background Type', 'your-textdomain'),
			'section' => 'theme_global_background',
			'settings' => 'mytheme_bg_type',
			'priority' => 20,
			'type' => 'select',
			'choices' => array(
				'none' => __('None', 'your-textdomain'),
				'image' => __('Image', 'your-textdomain'),
				'pattern' => __('Pattern', 'your-textdomain'),
			),
		));

		$patterns = Config::get( 'background-patterns' );

		$pattern_choices = array('none' => __('None', 'your-textdomain'));
		foreach ($patterns as $key => $pattern) {
			$pattern_choices[$key] = $pattern['label'];
		}

        // Add setting for background pattern
        $manager->add_setting('mytheme_bg_pattern', array(
            'default' => 'none',
            'sanitize_callback' => 'sanitize_text_field',
        ));

		// Add control for background pattern
		$manager->add_control(new WP_Customize_Control($manager, 'mytheme_bg_pattern_control', array(
			'label' => __('Background Pattern', 'your-textdomain'),
			'section' => 'theme_global_background',
			'settings' => 'mytheme_bg_pattern',
			'type' => 'radio',
			'choices' => $pattern_choices,
			'active_callback' => function() use ($manager) {
				return $manager->get_setting('mytheme_bg_type')->value() == 'pattern';
			},
			'priority' => 40, // Set priority to ensure it appears after the image control
		)));



		// Modify the existing background image control to be hidden when not selecting image type
		$manager->get_control('background_image')->active_callback = function() use ($manager) {
			return $manager->get_setting('mytheme_bg_type')->value() == 'image';
		};

		$manager->get_section( 'header_image' )->panel = 'theme_header';
		$manager->get_control( 'header_textcolor' )->section = 'theme_header_background';



		// -------------------------------------------------------------
		// Global sections.
		// -------------------------------------------------------------
		$config = Config::get( 'theme-customization' );

		if ( isset( $config['sections'] ) ) {
			foreach ( $config['sections'] as $id => $section ) {
				$manager->add_section( $id, [
					'title' => $section['title'],
					'priority' => $section['priority'],
					'panel' => $section['panel'],
				]);
			}
		}

	}

	/**
	 * Callback for registering settings.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#settings
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function registerSettings( WP_Customize_Manager $manager ) {
		$config = Config::get( 'theme-customization' );

		if ( isset( $config['settings'] ) ) {
			foreach ( $config['settings'] as $id => $settings )  {
				$manager->add_setting( $id, [
					'default' => $settings['default'],
					'sanitize_callback' => $settings['sanitize_callback']
				]);
			}
		}
	}

	/**
	 * Callback for registering controls.
	 *
	 * @link   https://developer.wordpress.org/themes/customize-api/customizer-objects/#controls
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
	 * @return void
	 */
	public function registerControls( WP_Customize_Manager $manager ) {
		$config = Config::get( 'theme-customization' );

		if ( isset($config['controls'] ) ) {
			foreach ( $config['controls'] as $control_id => $control ) {
				$control_type = $control['type'];
				unset($control['type']);
				$control_options = array_merge( ['settings' => $control_id], $control );

				if ( $control_type === 'select' ) {
					$manager->add_control( $control_id, array_merge( $control_options, [
						'type' => 'select',
					] ) );
				} elseif ( class_exists($control_type ) ) {
					$manager->add_control( new $control_type( $manager, $control_id, $control_options ) );
				} else {
					$manager->add_control( $control_id, $control_options );
				}
			}
		}
	}

	public function enqueueCustomizerStyles() {
		$background = get_theme_mod( 'theme_header_background_color', '#0b5e79' );
		$custom = "
			.site-header {
				background: ${background};
			}
		";

		wp_add_inline_style( 'prismatic-screen', $custom );

	}

	public function enqueueBackgroundStyles() {
		$bg_type = get_theme_mod('mytheme_bg_type', 'none');
		$bg_pattern = get_theme_mod('mytheme_bg_pattern', 'none');
		$bg_image = get_background_image();
		$patterns = Config::get('background-patterns');

		$custom_css = '';

		if ($bg_type === 'image' && $bg_image) {
			$custom_css = 'body.custom-background { background-image: url("' . esc_url($bg_image) . '"); background-size: cover; }';
		} elseif ($bg_type === 'pattern' && isset($patterns[$bg_pattern])) {
			$pattern_svg = $patterns[$bg_pattern]['svg'];
			$pattern_svg_base64 = base64_encode($pattern_svg);
			$custom_css = 'body.custom-background {
				background-color: rgba(255, 255, 255, 0.9); /* Lighter background color with opacity */
				background-image: url("data:image/svg+xml;base64,' . $pattern_svg_base64 . '");
				background-repeat: repeat;
				background-blend-mode: lighten; /* Blend the pattern with the lighter background color */
			}';
		} elseif ($bg_type === 'none') {
			$custom_css = 'body.custom-background { background-image: none; }';
		}

		if (!empty($custom_css)) {
			wp_add_inline_style('prismatic-screen', $custom_css);
		}
	}
}
