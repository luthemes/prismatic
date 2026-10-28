<?php
/**
 * Vite asset functions.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

namespace Prismatic\Vite;
use Backdrop\App;

/**
 * Helper to read Vite manifest and resolve final asset path.
 *
 * @param array|null $manifest Decoded manifest.json or null.
 * @param string     $path     Entry key or output path (logical).
 * @param string     $baseUrl  Base public URL (e.g. parent theme, child theme, plugin)
 * @return string    Absolute URL to built asset.
 */
function resolve_vite_asset( ?array $manifest, string $path, string $baseUrl ): string {
	// Normalize input (manifest entries always use forward slashes)
	$key  = ltrim( $path, '/' );        // e.g. "resources/scss/screen.scss"
	$base = basename( $key );           // e.g. "screen.css"

	// 1. Exact manifest key match: "resources/scss/screen.scss"
	if ( isset( $manifest[ $key ]['file'] ) ) {
		$file = $manifest[ $key ]['file']; // e.g. css/screen-xxxxx.css

	// 2. Match by basename: "screen.css" -> find "css/screen-xxxxx.css"
	} elseif( is_array( $manifest ) ) {
		$file = null;
		foreach ( $manifest as $entry ) {
			if ( ! empty( $entry['file'] ) && str_ends_with( $entry['file'], $base ) ) {
				$file = $entry['file'];
				break;
			}
		}

		// 2b. If not in manifest at all (e.g. dev mode), fall back to logical path
		if ( ! $file ) {
			$file = preg_replace( '#^assets/#', '', $key ); // handle assets/css/...
		}
	} else {
		// 3. No manifest at all (likely before build)
		$file = preg_replace( '#^assets/#', '', $key );
	}

	return trailingslashit( $baseUrl ) . 'public/assets/' . ltrim( $file, '/' );
}

/**
 * Parent theme asset loader (Vite).
 */
function asset( string $path ): string {
	$manifest = App::resolve( 'prismatic/vite/parent' );

	$baseUrl  = get_template_directory_uri();
	return resolve_vite_asset( $manifest, $path, $baseUrl );
}