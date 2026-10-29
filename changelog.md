# Change Log

## 0.2.1 - 10.28.2026
### Breaking
These affect child themes and custom code; the theme's own settings carry over.
- Requires WordPress 5.9 or later (ClassicPress 2.0 or later) and PHP 7.4 or later.
- The framework functions the theme used to call were removed or renamed. Child themes calling them need to update:
  - `Backdrop\Theme\Entry\*` → `Backdrop\Post\*`, `Backdrop\Theme\Site\*` → `Backdrop\Site\*` (`display_site_title()` and `display_site_description()` are now `display_title()` and `display_description()`), `Backdrop\Theme\Comment\*` → `Backdrop\Comment\*`.
  - `Backdrop\Theme\is_classicpress()` and `is_plugin_or_class_active()` → `Backdrop\is_classicpress()` and `Backdrop\is_plugin_or_class_active()`.
  - `Backdrop\Template\Hierarchy\hierarchy()` → `Backdrop\Template\hierarchy()`.
  - `Backdrop\Customize\Helpers\Sanitize` → `Prismatic\Customize\Sanitize`.
  - `Backdrop\Theme\Entry\display_reading_time()` → `Prismatic\display_reading_time()`, and its `backdrop/display/reading_time` filter is now `prismatic/reading_time`.
  - `Backdrop\Mix\asset()` and `childAsset()` → `Prismatic\Vite\asset()` for the parent theme's assets. `backdrop-dev/mix` is no longer included, so child themes that used `childAsset()` need their own asset loading.
- Assets are built with Vite (`npm run build`, Node 20.19 or 22.12 and later) and have content-hashed file names. Enqueue them by source path through `Prismatic\Vite\asset()`, for example `asset( 'resources/scss/screen.scss' )`. The script and style handles are unchanged.
- The background CSS is now printed in its own `prismatic-background` style block instead of after `prismatic-screen`.

### Added
- A translation template, `public/lang/prismatic.pot`, and translator comments for the strings with placeholders.
- Credits for Hero Patterns (CC BY 4.0), which the background patterns come from.

### Changed
- Updated to the `develop` branch of `backdrop-dev/framework`, which replaces the separate `customize`, `languages`, `pagination`, `template-hierarchy`, `template-manager`, `theme` and `view` packages, and use the framework's Customize component. `backdrop-dev/framework` and `backdrop-dev/fonts` are pinned to the commits this release was tested with.
- Replaced Laravel Mix with Vite. Laravel Mix and its webpack toolchain pull in packages with known vulnerabilities; the build now needs only `vite` (7.3.7 or later) and `sass`, with Rollup and Immutable kept at patched versions. `package-lock.json` pins the build tools.
- Background Type and Background Pattern preview instantly with postMessage, instead of reloading the customizer preview.
- The header colors have their own **Theme: Header → Colors** section, since the framework removes the core Colors section.
- The release workflow no longer needs the `PRIVATE_KEY` or `TOKEN` secrets; it uses GitHub's built-in token, installs exactly what `package-lock.json` pins, checks that the release tag matches the `style.css` version, and stops if `npm audit` finds a high or critical vulnerability. The coding standards check runs on pull requests too, and pins a version that accepts the ClassicPress rules.
- Declares `Domain Path: /public/lang` in `style.css`.

### Removed
- Composer dev dependencies (`wptrt/wpthemereview` is abandoned and blocked `composer install`) and `composer.lock`, which pinned the old split packages.
- `webpack.mix.js`, `webpack.mix.export.js` and the Laravel Mix `package-lock.json`.
- `phpcs.xml.dist`, which referenced the removed coding standards; CI uses the ClassicPress rules.

### Fixed
- A chosen background pattern (or None) is no longer overridden by a background image saved earlier.
- Customizer controls that don't apply are hidden when the customizer opens. Background Pattern showed while Background Type was None, so choosing a pattern did nothing; Background Image showed while it was Pattern; and Custom Footer Text showed while the "powered by" credit was on.
- The customizer preview no longer prints an invalid background color (`##ffffff`).
- The customizer controls script loads; it was enqueued from the CSS folder, which caused a JavaScript error in the customizer.
- The Home panel's Blog title control changed the Portfolio title.
- The menu toggles' screen reader text was empty.
- Featured images no longer ask for Creativity's image sizes, and small screens load a 768px image.
- Show an admin notice instead of a fatal error when the Backdrop framework isn't installed.
- Kept the post and menu item classes the styles use, which the framework replaces.
- The settings page no longer requests a missing `admin.css`.
- `style.css` said WordPress 4.9 was enough; the theme needs 5.9.
- The child theme instructions in `readme.md` used the wrong `Template`, and `composer.json` described the theme as Creativity.

## 0.2.0 - 04.03.2025
### Misc
* Update Dependencies

## 0.1.9 - 10.25.2024
### Bug
- Fixed Pagination deprecation. 

## 0.1.8 - 10.03.2024

#### Added
- Added Social Navigation support

## 0.1.7 - 09.24.2024

### Added
- Added archive-backdrop-portfolio.php
- Styled archive portfolio page

## 0.1.6 - 09.24.2024
### Ehancement
- update post type from portfolio to backdrop-portfolio

## 0.1.5 - 09.19.2024

## Ehancement
- Check if Backdrop Custom Portfolio exist then add Home Customizer
- Check if Backdrop Custom Portfolio exist then add Home template

## 0.1.4 - 09.19.2024

### Ehancement
- Make archive seem more readable
- Use grid system for archive

## 0.1.3 - 09.18.2024

### Added
- Added Reading Time support

## 0.1.2 - 09.16.2024

### Enhancement
- Add Header Background
- Minor changes to mobile side

### Bug
- Fixed Footer Background

## 0.1.1 - 09.14.2024

### Added
- Portfolio support
- Custom template for Showcase
- Recommend Backdrop Custom Portfolio Plugin

## 0.1.0 - 09.12.2024

### Added
- Add Background Colors for Header and Footer.
- Add Custom Header with the ability to change text color. 

## 0.0.9 - 09.11.2024

### Added
- Add Custom Templates for custom, left sidebar, and right sidebar

## 0.0.8 - 09.10.2024

### Enhancement
- Improved Background Patterns more better in Customizer

## 0.0.7 - 09.10.2024

### Enhancement
- Improved Background Patterns in Customizer

## 0.0.6 - 09.10.2024

### Enhancement
- Style Search Widget
- Updated Links

## 0.0.5 - 08.29.2024

### Added
- Added Theme: Content Layouts

## 0.0.4 - 08.29.2024

### Enhancement
- Reorganized Background Image with Patterns
- Styled Pagination for pagination.

### Added
- Added Settings Page
- Added Custom ErrorPage
- Added Footer Credit and Show Random quotes

## 0.0.3 - 08.28.2024

### Enhancement
- Added seperation for metadata and comments

## 0.0.2 - 08.06.2024

### Enhancement
- Minor css changes

## 0.0.1 - 07.29.2024
- Theme launch, Everything's new!