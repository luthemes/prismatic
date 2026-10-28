<?php
/**
 * Boot the Framework
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

/** ------------------------------------------------------------------------------------------
 * Create a new application.
 * -------------------------------------------------------------------------------------------
 *
 * This code creates the one true instance of the Backdrop Application, which can be accessed
 * via the `Backdrop\app()` function as soon as it is created, and via the `Backdrop\App` static
 * class after the application has been booted. If an application has already been booted, it
 * is reused instead of creating a new one.
 */

// `Backdrop\booted()` was added on the framework's `develop` branch. If an older copy of the
// framework is loaded first (for example, one bundled with a plugin), fall back to creating a
// new application.
$theme = function_exists( 'Backdrop\booted' ) && Backdrop\booted()
	? Backdrop\app()
	: new Backdrop\Core\Application();

/** ------------------------------------------------------------------------------------------
 * Register default service providers with the application.
 * -------------------------------------------------------------------------------------------
 *
 * Here are the default service providers that are essential for the theme to function before
 * booting the application. These service providers form the foundation for the theme.
 */
$theme->provider( Backdrop\Fonts\Provider::class );
$theme->provider( Backdrop\Mix\Provider::class );

/** ------------------------------------------------------------------------------------------
 * Register additional service providers for the theme.
 * -------------------------------------------------------------------------------------------
 *
 * These are the additional providers that are crucial for the theme to operate before booting
 * the application. These service providers offer supplementary features to the theme.
 *
 * The `Customize` provider binds and boots the framework's `Backdrop\Customize\Component` with
 * the theme's components, so `Backdrop\Customize\Provider` is not registered above.
 */

$theme->provider( Prismatic\Provider::class );

array_map( function( $component ) use ( $theme ) {
	$theme->provider( "Prismatic\\{$component}\\Provider" );
}, [
	'Clean',
	'Customize',
	'FeatureImage',
	'Settings',
] );

/** ------------------------------------------------------------------------------------------
 * Perform any actions.
 * -------------------------------------------------------------------------------------------
 *
 * This code creates an action hook that any child themes can utilize to integrate their own
 * bindings into the process before the app is booted. The action callback receives the
 * application instance as a parameter.
 */

do_action( 'prismatic/bootstrap', $theme );

/** ------------------------------------------------------------------------------------------
 * Boot the application.
 * -------------------------------------------------------------------------------------------
 *
 * The code invokes the `boot()` method of the application, which initiates the launch of the
 * application. Congratulations on a job well done!
 */

$theme->boot();
