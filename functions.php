<?php
/**
 * Theme functions file.
 *
 * This file is used to bootstrap the theme.
 *
 * @package   Prismatic
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2024 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/prismatic
 */

/** ------------------------------------------------------------------------------------------
 * Bootstrap the theme.
 * -------------------------------------------------------------------------------------------
 * Load the bootstrap files. Note that autoload should happen first so that any classes or
 * functions are available that we might need.
 */

 require_once get_parent_theme_file_path( 'app/bootstrap-autoload.php' );
 require_once get_parent_theme_file_path( 'app/framework.php' );