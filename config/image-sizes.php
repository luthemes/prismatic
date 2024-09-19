<?php
/**
 * Image Sizes Config.
 *
 * Defines the image sizes that the theme sets.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

 return [

	// Landscape sizes.
	'post-thumbnail' => [
		'label'            => __( 'Landscape: Thumbnail', 'prismatic' ),
		'width'            => 178,
		'height'           => 100,
		'is_featured_size' => false
	],
	'prismatic-landscape-medium' => [
		'label'  => __( 'Landscape: Medium', 'prismatic' ),
		'width'  => 640,
		'height' => 360
	],
	'prismatic-landscape-large' => [
		'label'  => __( 'Landscape: Large', 'prismatic' ),
		'width'  => 896,
		'height' => 504
	],
	'prismatic-landscape-portfolio' => [
		'label'  => __( 'Landscape: Portfolio', 'prismatic' ),
		'width'  => 1170,
		'height' => 614
	],
];