/**
 * Laravel Mix configuration file.
 *
 * Laravel Mix is a layer constructed over ClassicPress, which simplifes the
 * process of creating a Webpack configuration file by elminiating much of its
 * complexity. This file is used to configure how assets are managed during the
 * build process.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://luthemes.com/portfolio/prismatic
 */

// Import All Required Packages
const mix = require( 'laravel-mix' );

/*
* Sets the development path to assets. By default, this is the `/resources`
* folder in the theme.
*/
const devPath  = 'resources';

/*
* Sets the path to the generated assets. By default, this is the `/public` folder in the theme.
*/
mix.setPublicPath( 'public' );

/*
* Set Laravel Mix options.
*
* @link https://laravel.com/docs/6.x/mix#url-processing
*/
mix.options( {
    processCssUrls : false,
} );

/*
* Versioning and cache busting. Append a unique hash for production assets. If
* you only want versioned assets in production, do a conditional check for
* `mix.inProduction()`.
*
* @link https://laravel.com/docs/5.6/mix#versioning-and-cache-busting
*/
mix.version();

/*
* Compile JavaScript.
*
* @link https://laravel.com/docs/6.x/mix#working-with-stylesheets
*/
mix.js( `${devPath}/js/app.js`, 'assets/js' )
.js( `${devPath}/js/navigation.js`, 'assets/js' )
.js( `${devPath}/js/customize-controls.js`, 'assets/js' )
.js( `${devPath}/js/customize-previews.js`, 'assets/js' );


/*
* Compile CSS. Mix supports Sass, Less, Stylus, and plain CSS, and has functions
* for each of them.
*
* @link https://laravel.com/docs/6.x/mix#working-with-stylesheets
* @link https://laravel.com/docs/6.x/mix#sass
*/

// Compile SASS/CSS.
mix.sass( `${devPath}/scss/screen.scss`, 'assets/css' )
.sass( `${devPath}/scss/customize-controls.scss`, 'assets/css' )
.sass( `${devPath}/scss/customize-previews.scss`, 'assets/css' );
