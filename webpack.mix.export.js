/**
 * Theme Export Script
 *
 * This code exports the theme, optimized for production, including only the
 * necessary files and folders or zipping. If you need to make any modifications,
 * you can edit the `files` or `folders` variables.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007k@gmail.com>
 * @copyright 2024. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

// Import required packages.
const mix     = require( 'laravel-mix' );
const fs      = require( 'fs-extra' );

// Folder name to export the files to.
let exportPath = 'prismatic';

// Theme root-level files to include.
let files = [
	'functions.php',
	'index.php',
	'readme.txt',
	'screenshot.png',
	'style.css'
];

// Folders to include.
let folders = [
	'app',
	'public',
	'vendor'
];

// Delete the previous export to start clean.
fs.removeSync( exportPath );

// Loop through the root files and copy them over.
files.forEach( file => {

	if ( fs.existsSync( file ) ) {
		mix.copy( file, `${exportPath}/${file}` );
	}
} );

// Loop through the folders and copy them over.
folders.forEach( folder => {

	if ( fs.existsSync( folder ) ) {
		mix.copyDirectory( folder, `${exportPath}/${folder}` );
	}
} );

// Delete the `vendor/bin` and `vendor/composer/installers` folder, which can
// get left over, even in production. Mix will also create an additional
// `mix-manifest.json` file in the root, which we don't need.
mix.then( () => {

	let files = [
		'mix-manifest.json',
	];

	files.forEach( file => {
		fs.removeSync( file );
	} );
} );
