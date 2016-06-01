# Changelog

All Notable changes to `Backpack\Base` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## NEXT - YYYY-MM-DD

### Added
- Nothing

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing


## [0.5.14] - 2016-06-01

### Fixed
- fixes #18 - purple buttons in adminlte only when using purple skins


## [0.5.13] - 2016-05-31

### Added
- Added active state on left-side menu items;


## [0.5.12] - 2016-05-27

### Fixed
- Publishing a config file did not allow developers to change configs.


## [0.5.11] - 2016-05-26

### Fixed
- #14 - Using closures in routes breaks route caching
- Updated jQuery to 2.2.0 as AdminLTE did;
- Loading jQuery from CDN first, then local, to prevent AdminLTE updates triggering bugs;


## [0.5.10] - 2016-03-17

### Fixed
- Added page titles for reset password pages.
- Fixed one scrutinizer issue.


## [0.5.9] - 2016-03-17

### Fixed
- Added page titles for login and register pages.


## [0.5.8] - 2016-03-16

### Fixed
- Fixed a few scrutinizer issues.


## [0.5.7] - 2016-03-16

### Fixed
- Added pretty error pages.


## [0.5.6] - 2016-03-16

### Fixed
- Added custom title, set from the controller.


## [0.5.5] - 2016-03-12

### Fixed
- Lang files are pushed in the correct folder now. For realsies.

## [0.5.4] - 2016-03-12

### Fixed
- Lang files are pushed in the correct folder now.
- Removed some redundant comments in layout.blade.php


## [0.5.3] - 2016-03-11

### Fixed
- Added CSRF request to all Ajax calls, for them to work properly in Laravel.


## [0.5.2] - 2016-03-10

### Fixed
- Changed header layout - it's now a single section, 'header', instead of separate sections for page title and breadcrumbs.



## [0.5.1] - 2016-03-10

### Added
- Notification bubbles using prologue/alerts on the backend and PNotify in the front-end.


## [0.4.1] - 2016-03-05

### Fixed
- Auth views did not use the correct layout blade file.


## [0.4.0] - 2016-03-04

### Added
- All base views are now published at installation, and can be easily overwritten.
- Separate views for vertical menu (menu.blade.php) and horizontal menu (sidebar.blade.php), which can be easily customized.

### Fixed
- Changed the view folder structure - moved the layout view on the root view directory.


## [0.3.0] - 2016-03-04

### Fixed
- Changed folder structure to resemble Laravel's folder structure: Http folder is now inside an /app/ folder.


## [0.2.8] - 2016-03-01

### Fixed
- Reset password links didn't work because the views weren't using the /admin/ prefix.


## [0.2.7] - 2016-02-25

### Fixed
- Renamed the sections in admin layout to be friendlier to use and more extensible.
- All routes now use the /admin/ prefix, even the admin authentication. This separates BackPack completely from the main application and allows it to have a different auth for users, if needed.
- Better comments in configs and routes.
- Extra style to overwrite AdminLTE's bulkiness and make it more slick.

## [0.2.6] - 2016-02-24

### Added
- AdminLTE usage in all auth views. BackPack is pretty now.

### Removed
- Install scripts from composer.json since they weren't working anyway.

## [0.2.5] - 2016-02-24

### Added
- AdminLTE Requirement and publishing.

## [0.2.4] - 2016-02-24

### Fixed
- Correct installation instructions in Readme file.

## [0.2.3] - 2016-02-24

### Fixed
- BaseServiceProvider also registers the Base.

## [0.2.2] - 2016-02-23

### Fixed
- Valid composer.json file to satisfy Packagist.

## [0.2.1] - 2016-02-23

### Fixed
- Valid composer.json file to satisfy Packagist.

## [0.2.0] - 2016-02-23

### Added
- Moved all controllers, views, config file, lang file for Laravel authentication into the package. Loading the package will allow the user to make use of Backpack authentication, instead of Laravel's default.
