<?php
/**
 * Customize service provider.
 *
 * Bootstraps the customize component.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic\Customize;

use Backdrop\Tools\Collection;
use Backdrop\Core\ServiceProvider;
use Prismatic\Customize\Background;
use Prismatic\Customize\Footer;
use Prismatic\Customize\Layout;
/**
 * Customize service provider.
 *
 * @since  1.0.0
 * @access public
 */
class Provider extends ServiceProvider {

	/**
	 * Binds customize component to the container.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register(): void {

		$this->app->singleton( Component::class, function() {
			return new Component( [
				Background\Customize::class,
				Footer\Customize::class,
				Header\Customize::class,
				Layout\Customize::class,
				
			] );
		} );
	}

	/**
	 * Bootstrap the customize component.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot(): void {

		$this->app->resolve( Component::class )->boot();
	}
}
