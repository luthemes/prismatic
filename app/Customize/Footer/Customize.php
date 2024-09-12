<?php

namespace Prismatic\Customize\Footer;
use Prismatic\Customize\Customizable;
use WP_Customize_Manager;
use WP_Customize_Color_Control;
use Prismatic\Tools\Collection;
use Prismatic\Tools\Mod;
use Prismatic\Template\Footer;

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

		$manager->add_section( 'theme_footer_background', [
			'title' => esc_html__( 'Colors', 'prismatic' ),
			'panel' => 'theme_footer',
		] );

		$manager->add_section( 'theme_footer_credit', [
			'title' => esc_html__( 'Credit', 'prismatic' ),
			'panel' => 'theme_footer',
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

		$manager->add_setting( 'theme_footer_background_color', [
			'default' => '#0b5e79',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage'
		] );

		// Register footer settings.
		$manager->add_setting( 'theme_footer_powered_by', [
			'default'           => Mod::fallback( 'theme_footer_powered_by' ),
			'sanitize_callback' => 'wp_validate_boolean',
		] );
		
		$manager->add_setting( 'theme_footer_custom_credit', [
			// Translators: %s is the theme link.
			'default'           => Mod::fallback( 'theme_footer_custom_credit' ),
			'sanitize_callback' => function( $value ) {
				return wp_kses( $value, Footer::allowedTags() );
			}
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

		$manager->add_control( new WP_Customize_Color_Control( $manager, 'theme_footer_background_color', [
			'label' => esc_html__( 'Background Color', 'prismatic' ),
			'section' => 'theme_footer_background',
			'settings' => 'theme_footer_background_color'
		] ) );

		// Powered by control.
		$manager->add_control( 'theme_footer_powered_by', [
			'section'  => 'theme_footer_credit',
			'type'     => 'checkbox',
			'label'    => __( 'Show random "powered by" credit text.', 'prismatic' )
		] );

    		// Footer credit control.
		$manager->add_control( 'theme_footer_custom_credit', [
			'section'         => 'theme_footer_credit',
			'type'            => 'textarea',
			'label'           => __( 'Custom Footer Text', 'prismatic' ),
			'active_callback' => function( $control ) {
				return ! $control->manager->get_setting( 'theme_footer_powered_by' )->value();
			}
		] );
	}

	/**
	 * Registers customizer partials.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerPartials( WP_Customize_Manager $manager ) {

	}

	/**
	* Registers JSON for the customize controls script via `wp_localize_script()`.
	*
	* @since  1.0.0
	* @access public
	* @param  Collection  $json
	* @return void
	*/
	public function controlsJson( Collection $json ) {

	}

	/**
	* Registers JSON for the customize preview script via `wp_localize_script()`.
	*
	* @since  1.0.0
	* @access public
	* @param  Collection  $json
	* @return void
	*/
	public function previewJson( Collection $json ) {

	}
}