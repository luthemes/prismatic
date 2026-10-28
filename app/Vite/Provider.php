<?php
/**
 * Vite assets provider
 *
 * Binds the parent theme's Vite manifest, which `Prismatic\Vite\asset()` reads.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic\Vite;

use Backdrop\Core\ServiceProvider;

/**
 * Vite service provider.
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

        // Bind the Vite manifest, which maps source paths to the hashed build files.
        $this->app->singleton( 'prismatic/vite/parent', function() {

            $file = get_template_directory() . '/' . 'public/assets/manifest.json';

            return file_exists( $file ) ? json_decode( file_get_contents( $file ), true ) : null;
        } );
    }
}