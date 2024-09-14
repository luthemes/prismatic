<?php

namespace Prismatic\Customize\Home;
use Prismatic\Customize\Customizable;
use WP_Customize_Manager;
use WP_Customize_Color_Control;
use Prismatic\Tools\Collection;
use Prismatic\Tools\Mod;

class Customize extends Customizable {

	/**
	 * Registers customizer panels.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerPanels( WP_Customize_Manager $manager ) {

        $manager->add_panel( 'theme_home', [
            'title' => esc_html__( 'Theme: Home' ),
            'priority' => 99
        ] );
    }

	/**
	 * Registers customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager  $manager
	 * @return void
	 */
	public function registerSections( WP_Customize_Manager $manager ) {

        $args = [
            'theme_home_header' => [
                'title' => esc_html__( 'Introduction', 'workfolio' ),
                'panel' => 'theme_home'
            ],
            'theme_home_portfolio' => [
                'title' => esc_html__( 'Portfolio', 'workfolio' ),
                'panel' => 'theme_home'
            ],
            'theme_home_blog' => [
                'title' => esc_html__( 'Blog', 'workfolio' ),
                'panel' => 'theme_home'
            ],
        ];
        
        foreach ( $args as $item => $display ) {
            $manager->add_section( $item, $display );
        }
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

        $displays = [
            'theme_home_header_display' => [
                'default' => false,
                'sanitize_callback' => 'Backdrop\Customize\Helpers\Sanitize::checkbox',
            ],
            'theme_home_portfolio_display' => [
                'default' => false,
                'sanitize_callback' => 'Backdrop\Customize\Helpers\Sanitize::checkbox',
            ],
            'theme_home_blog_display' => [
                'default' => false,
                'sanitize_callback' => 'Backdrop\Customize\Helpers\Sanitize::checkbox',
            ],
            'theme_home_header_title' => [
                'default' => esc_html__( 'Our Mission Goes Here', 'workfolio' ),
                'sanitize_callback' => 'sanitize_text_field'
            ],
            'theme_home_header_description' => [
                'default' => esc_html__( 'Your description goes here!', 'workfolio' ),
                'sanitize_callback' => 'sanitize_textarea_field'
            ],
            'theme_home_portfolio_title' => [
                'default' => esc_html__( 'Portfolio', 'workfolio' ),
                'sanitize_callback' => 'sanitize_text_field'
            ],
            'theme_home_portfolio_description' => [
                'default' => esc_html__( 'Latest Work', 'workfolio' ),
                'sanitize_callback' => 'sanitize_textarea_field'
            ],
            'theme_home_blog_title' => [
                'default' => esc_html__( 'Blog', 'workfolio' ),
                'sanitize_callback' => 'sanitize_text_field'
            ],
            'theme_home_blog_description' => [
                'default' => esc_html__( 'Latest Blog', 'workfolio' ),
                'sanitize_callback' => 'sanitize_textarea_field'
            ]
        ];

        foreach ( $displays as $item => $display ) {
            $manager->add_setting( $item, $display );
        }
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

        $displays = [

            // Theme: Home - Header
            'theme_home_header_display' => [
                'label' => esc_html__( 'Enable Introduction', 'workfolio' ),
                'type' => 'checkbox',
                'section' => 'theme_home_header',
                'settings' => 'theme_home_header_display'
            ],
            'theme_home_header_title' => [
                'label' => esc_html__('Title', 'workfolio'),
                'section' => 'theme_home_header',
                'priority' => 10,
                'settings' => 'theme_home_header_title',
            ],
            'theme_home_header_description' => [
                'label' => esc_html__('Description', 'workfolio'),
                'section' => 'theme_home_header',
                'type' => 'textarea',
                'priority' => 10,
                'settings' => 'theme_home_header_description',
            ],

            // Theme: Home - Portfolio
            'theme_home_portfolio_display' => [
                'label' => esc_html__( 'Enable Portfolio', 'workfolio' ),
                'type' => 'checkbox',
                'section' => 'theme_home_portfolio',
                'settings' => 'theme_home_portfolio_display'
            ],
            'theme_home_portfolio_title' => [
                'label' => esc_html__('Title', 'workfolio'),
                'section' => 'theme_home_portfolio',
                'priority' => 10,
                'settings' => 'theme_home_portfolio_title',
            ],
            'theme_home_portfolio_description' => [
                'label' => esc_html__('Description', 'workfolio'),
                'section' => 'theme_home_portfolio',
                'type' => 'textarea',
                'priority' => 10,
                'settings' => 'theme_home_portfolio_description',
            ],

            // Theme: Home - Blog
            'theme_home_blog_display' => [
                'label' => esc_html__( 'Enable Blog', 'workfolio' ),
                'type' => 'checkbox',
                'section' => 'theme_home_blog',
                'settings' => 'theme_home_blog_display'
            ],
            'theme_home_blog_title' => [
                'label' => esc_html__('Title', 'workfolio'),
                'section' => 'theme_home_blog',
                'priority' => 10,
                'settings' => 'theme_home_portfolio_title',
            ],
            'theme_home_blog_description' => [
                'label' => esc_html__('Description', 'workfolio'),
                'section' => 'theme_home_blog',
                'type' => 'textarea',
                'priority' => 10,
                'settings' => 'theme_home_blog_description',
            ],
        ];

        foreach ( $displays as $item => $display ) {
            $manager->add_control( $item, $display );
        }
    }
}