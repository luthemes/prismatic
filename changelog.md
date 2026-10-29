# Change Log

## 0.2.1 - 10.28.2026
### Changed
- Updated to the `develop` branch of `backdrop-dev/framework`, which replaces the separate `customize`, `languages`, `pagination`, `template-hierarchy`, `template-manager`, `theme` and `view` packages, and use the framework's Customize component.
- The header colors have their own **Theme: Header → Colors** section, since the framework removes the core Colors section.
- Replaced Laravel Mix with Vite, like Amicable. Laravel Mix and its webpack toolchain pull in packages with known vulnerabilities; the build now needs only `vite` and `sass`. Built assets have content-hashed names, which the theme's own `Prismatic\Vite\asset()` reads from Vite's manifest, so `backdrop-dev/mix` is no longer required.
- The release workflow no longer needs the `PRIVATE_KEY` or `TOKEN` secrets; it uses GitHub's built-in token, checks that the release tag matches the `style.css` version, and stops if `npm audit` finds a high or critical vulnerability.
- Declares `Domain Path: /public/lang` in `style.css`.

### Removed
- Composer dev dependencies (`wptrt/wpthemereview` is abandoned and blocked `composer install`) and `composer.lock`, which pinned the old split packages.
- `webpack.mix.js`, `webpack.mix.export.js` and the Laravel Mix `package-lock.json`.

### Fixed
- Customizer controls that don't apply are hidden when the customizer opens. Background Pattern showed while Background Type was None, so choosing a pattern did nothing; Background Image showed while it was Pattern; and Custom Footer Text showed while the "powered by" credit was on.
- The customizer preview no longer prints an invalid background color (`##ffffff`).
- The customizer controls script loads; it was enqueued from the CSS folder, which caused a JavaScript error in the customizer.
- The Home panel's Blog title control changed the Portfolio title.
- The menu toggles' screen reader text was empty.
- Featured images no longer ask for Creativity's image sizes, and small screens load a 768px image.
- Show an admin notice instead of a fatal error when the Backdrop framework isn't installed.
- Removed calls to framework functions that no longer exist (`Backdrop\Theme\Entry\*`, `Backdrop\Theme\Site\*`, `Backdrop\Theme\Comment\*`, `Backdrop\Template\Hierarchy\hierarchy`, `Backdrop\Customize\Helpers\Sanitize`), and kept the post and menu item classes the styles use.
- The settings page no longer requests a missing `admin.css`.

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