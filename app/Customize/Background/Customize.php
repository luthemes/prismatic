<?php

namespace Prismatic\Customize\Background;
use Prismatic\Customize\Customizable;
use WP_Customize_Manager;
use WP_Customize_Control;
use Prismatic\Tools\Collection;
use Prismatic\Tools\Mod;
use Prismatic\Tools\Config;

use Prismatic\Customize\Controls\BackgroundSvg;

class Customize extends Customizable {

	/**
	 * Registers customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSections( WP_Customize_Manager $manager ) {

        $manager->remove_section( 'background_image' );

        $manager->add_section( 'theme_global_background', [
            'title' => __( 'Background', 'prismatic' ),
            'priority' => 5,
            'panel' => 'theme_global'
        ] );
	}

	/**
	 * Registers customizer settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSettings( WP_Customize_Manager $manager ) {

        $manager->get_setting( 'background_color' )->default = '#ffffff';

		// Add setting for background type (none, image, pattern)
		$manager->add_setting('theme_global_background_type', [
            'default' => 'none',
			'sanitize_callback' => 'sanitize_text_field',
        ] );

        // Add setting for background pattern
        $manager->add_setting('theme_global_background_pattern', [
            'default' => 'none',
            'sanitize_callback' => 'sanitize_text_field',
        ] );
	}

	/**
	 * Registers customizer controls.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerControls( WP_Customize_Manager $manager ) {

		$manager->get_control( 'background_color' )->section = 'theme_global_background';
		$manager->get_control( 'background_color' )->description = __( 'Background color used for body of the site.', 'prismatic' );
		$manager->get_control( 'background_image' )->section = 'theme_global_background';
		$manager->get_control( 'background_image' )->priority = 25;

		// Add control for background type
		$manager->add_control('theme_global_background_type', array(
			'label' => __('Background Type', 'prismatic'),
			'section' => 'theme_global_background',
			'settings' => 'theme_global_background_type',
			'priority' => 20,
			'type' => 'select',
			'choices' => array(
				'none' => __('None', 'prismatic'),
				'image' => __('Image', 'prismatic'),
				'pattern' => __('Pattern', 'prismatic'),
			),
		));

		$patterns = Config::get( 'background-patterns' );

		$pattern_choices = array('none' => __('None', 'prismatic'));
		foreach ( $patterns as $key => $pattern ) {
			// Since $pattern['svg'] contains the actual SVG markup, ensure that it's echoed correctly
			$pattern_choices[$key] = sprintf( '<span class="background-pattern-svg">%s</span>', $pattern['svg'] );
		}

		$manager->add_control(new BackgroundSvg($manager, 'theme_global_background_pattern', array(
			'label' => __('Background Pattern', 'prismatic'),
			'section' => 'theme_global_background',
			'settings' => 'theme_global_background_pattern',
			'choices' => $pattern_choices,
			'active_callback' => function() use ($manager) {
				return $manager->get_setting('theme_global_background_type')->value() == 'pattern';
			},
			'priority' => 40, // Set priority to ensure it appears after the image control
		)));
		

		// Modify the existing background image control to be hidden when not selecting image type
		$manager->get_control('background_image')->active_callback = function() use ($manager) {
			return $manager->get_setting('theme_global_background_type')->value() == 'image';
		};

    }
}