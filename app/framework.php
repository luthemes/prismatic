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
 * This code creates the one true instance of the Backdrop Core Application, which can be access
 * via the `Backdrop\app()`function or the `Backdrop\App` static class after the application has
 * been booted.
 */

$theme = Backdrop\booted() ? Backdrop\app() : new Backdrop\Core\Application();

/** ------------------------------------------------------------------------------------------
 * Register default service providers with the application.
 * -------------------------------------------------------------------------------------------
 *
 * Here are the default service providers that are essential for the theme to function before
 * booting the application. These service providers form the foundation for the theme.
 */
$theme->provider( Backdrop\Fonts\Provider::class );
$theme->provider( Backdrop\Languages\Provider::class );
$theme->provider( Backdrop\Mix\Provider::class );
$theme->provider( Backdrop\Pagination\Provider::class );
$theme->provider( Backdrop\Template\Hierarchy\Provider::class );
$theme->provider( Backdrop\Template\Manager\Provider::class );
$theme->provider( Backdrop\Theme\Provider::class );
$theme->provider( Backdrop\View\Provider::class );

/** ------------------------------------------------------------------------------------------
 * Register additional service providers for the theme.
 * -------------------------------------------------------------------------------------------
 *
 * These are the additional providers that are crucial for the theme to operate before booting
 * the application. These service providers offer supplementary features to the theme.
 */

$theme->provider( Prismatic\Provider::class );

array_map( function( $component ) use ( $theme ) {
    $theme->provider( "Prismatic\\{$component}\\Provider" );
}, [
    'Clean',
    'Customize',
    'Settings'
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
