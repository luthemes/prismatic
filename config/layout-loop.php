<?php
/**
 * Loop Layouts Config.
 *
 * Configuration for the theme's loop layouts.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

 return [
	'blog' => [
		'label'       => __( 'Blog', 'prismatic' ),
		'image_sizes' => [
			'prismatic-landscape-medium',
			'prismatic-landscape-large',
			'prismatic-landscape-extra-large',
			'prismatic-landscape-huge',
			'prismatic-square-medium'
		]
	],
	'grid' => [
		'label'            => __( 'Grid', 'prismatic' ),
		'supports_columns' => true,
		'supports_width'   => true,
		'requires_image'   => true,
		'image_sizes'      => [
			'prismatic-landscape-medium',
			'prismatic-portrait-small',
			'prismatic-portrait-medium',
			'prismatic-square-medium'
		]
	]
];
