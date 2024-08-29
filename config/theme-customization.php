<?php
/**
 * Background SVG Patterns Config.
 *
 * Configuration for any background pattern options. Defaults are from the Hero
 * Patterns Web site.
 *
 * @link      https://www.heropatterns.com/
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */
use Prismatic\Tools\Mod;

return [

	'panels' => [
		'theme_global' => [
            'title' => __( 'Theme: Global', 'prismatic' ),
            'description' => __( 'Manage global settings for the theme.', 'prismatic' ),
            'priority' => 5,
		],
		'theme_header' => [
            'title' => __( 'Theme: Header', 'prismatic' ),
            'description' => __( 'Manage header settings for the theme.', 'prismatic' ),
            'priority' => 5,
		],
		'theme_content' => [
            'title' => __( 'Theme: Content', 'prismatic' ),
            'description' => __( 'Manage content settings for the theme.', 'prismatic' ),
            'priority' => 5,
		],
		'theme_footer' => [
            'title' => __( 'Theme: Footer', 'prismatic' ),
            'description' => __( 'Manage footer settings for the theme.', 'prismatic' ),
            'priority' => 5,
		],
	],

	'sections' => [
        'theme_global_background' => [
            'title' => __( 'Background', 'prismatic' ),
            'priority' => 5,
            'panel' => 'theme_global',
        ],
		'theme_global_layout' => [
            'title' => __( 'Layout', 'prismatic' ),
            'priority' => 5,
            'panel' => 'theme_global',
        ],

        'theme_header_background' => [
            'title' => __( 'Background', 'prismatic' ),
            'priority' => 5,
            'panel' => 'theme_header',
        ],

        'theme_content_background' => [
            'title' => __( 'Background', 'prismatic' ),
            'priority' => 5,
            'panel' => 'theme_content',
        ],

        'theme_footer_background' => [
            'title' => __( 'Background', 'prismatic' ),
            'priority' => 5,
            'panel' => 'theme_footer',
        ],
        'theme_footer_powered_by' => [
            
        ]
	],

    'settings' => [
        'theme_header_background_color' => [
            'default' => '#0b5e79',
            'sanitize_callback' => 'sanitize_hex_color',
        ],

        'theme_content_background_color' => [
            'default' => 'f0f0f0',
            'sanitize_callback' => 'sanitize_hex_color',
        ],

        'theme_footer_background_color' => [
            'default' => '#0b5e79',
            'sanitize_callback' => 'sanitize_hex_color',
        ],

		'theme_global_layout_options' => [
			'default' => Mod::fallback( 'layout' ),
			'sanitize_callback' => 'Backdrop\Customize\Helpers\Sanitize::layouts',
		],
    ],
	'controls' => [
        'theme_header_background_color' => [
            'type' => 'WP_Customize_Color_Control',
            'section' => 'theme_header_background',
            'label' => __( 'Background Color', 'prismatic' ),
        ],

        'theme_content_background_color' => [
            'type' => 'WP_Customize_Color_Control',
            'section' => 'theme_content_background',
        ],

        'theme_footer_background_color' => [
            'type' => 'WP_Customize_Color_Control',
            'section' => 'theme_footer_background',
            'label' => __( 'Color', 'prismatic' ),
        ],

		'theme_global_layout_options' => [
            'label' => __( 'Global Layout', 'prismatic' ),
			'description' => __( 'Select the layout used across the site.', 'prismatic' ),
            'section' => 'theme_global_layout',
			'settings' => 'theme_global_layout_options',
			'type' => 'select',
            'choices' => [
                'full' => __( 'Full', 'prismatic' ),
                'wide' => __( 'Wide', 'prismatic' ),
            ],
		],
	],
];
