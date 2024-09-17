<?php
/**
 * App service provider.
 *
 * Service providers are essentially the bootstrapping code for your theme.
 * They allow you to add bindings to the container on registration and boot them
 * once everything has been registered.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic\FeatureImage;

use Backdrop\Core\ServiceProvider;
use Prismatic\Tools\Config;

/**
 * App service provider.
 *
 * @since  1.0.0
 * @access public
 */
class Provider extends ServiceProvider {


	/**
	 * Callback executed when the `Backdrop\Core\Application` class registers
	 * providers. Use this method to bind items to the container.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register(): void {

        $this->app->singleton( Component::class );
	}

	/**
	 * Bootstrap the query component.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot(): void {
		$this->app->resolve( Component::class )->boot();
	}
}