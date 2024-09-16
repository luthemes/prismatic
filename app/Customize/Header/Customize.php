<?php

namespace Prismatic\Customize\Header;
use Prismatic\Customize\Customizable;
use WP_Customize_Manager;
use WP_Customize_Color_Control;
use Prismatic\Tools\Collection;
use Prismatic\Tools\Mod;
use Prismatic\Template\Footer;

class Customize extends Customizable {

	/**
	 * Registers customizer panels.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerPanels( WP_Customize_Manager $manager ) {}

	/**
	 * Registers customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSections( WP_Customize_Manager $manager ) {
        $manager->get_section( 'colors' )->panel = 'theme_header';
        $manager->get_section( 'header_image' )->panel = 'theme_header';

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
        $manager->get_setting( 'header_textcolor' )->transport = 'postMessage';
		$manager->get_setting( 'header_textcolor' )->priority = 5;

		$manager->add_setting( 'theme_header_background_color', [
			'default' => '#0b5e79',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage',
			'priority' => 10,
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

		$manager->add_control( new WP_Customize_Color_Control( $manager, 'theme_header_background_color', [
			'label' => esc_html__( 'Background Color', 'prismatic' ),
			'section' => 'colors',
			'settings' => 'theme_header_background_color'
		] ) );
    }

	/**
	 * Registers customizer partials.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerPartials( WP_Customize_Manager $manager ) {}

	/**
	* Registers JSON for the customize controls script via `wp_localize_script()`.
	* Objects added to the collection should implement the `JsonSerializable`
	* interface.
	*
	* @since  1.0.0
	* @access public
	* @param  Collection  $json
	* @return void
	*/
	public function controlsJson( Collection $json ) {}

	/**
	* Registers JSON for the customize preview script via `wp_localize_script()`.
	* Objects added to the collection should implement the `JsonSerializable`
	* interface.
	*
	* @since  1.0.0
	* @access public
	* @param  Collection  $json
	* @return void
	*/
	public function previewJson( Collection $json ) {}
}
