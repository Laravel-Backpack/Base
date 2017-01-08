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


## [0.7.14] - 2017-01-08

### Fixed
- Collapsed sidebar alignment issue; Fixes #77;



## [0.7.13] - 2017-01-08

### Fixed
- Developers can now change the "users" table name without changing anything else (other than the table used on the User model); fixes #70;


## [0.7.12] - 2017-01-08

### Added
- Dutch translation, thanks to [Stan Daniëls](https://github.com/standaniels);

### Fixed
- Auth routes can now be easily overwritten, wether the admin prefix was specified or not, thanks to [Pavol Tanuška](https://github.com/pavoltanuska);
- Sidebar user placeholder image now works for non-utf-8-character names too, thanks to [ozeranskiy](https://github.com/ozeranskiy);


## [0.7.11] - 2016-12-21

### Fixed
- only load the generators if the classes exist;


## [0.7.10] - 2016-12-21

### Added
- laracasts/generators require-dev dependency;


## [0.7.9] - 2016-12-21

### Added
- backpack/generators require-dev dependency;


## [0.7.8] - 2016-12-13

### Added
- Greek translation file, thanks to [Stamatis Katsaounis](https://github.com/skatsaounis);
- German translation file, thanks to [Thomas aka tricki](https://github.com/tricki);


## [0.7.7] - 2016-12-02

### Fixed
- new version of font awesome;



## [0.7.6] - 2016-11-06

### Fixed
- replaced all mentions of the default 'admin' prefix with the config value; fixes #45;


## [0.7.5] - 2016-11-01

### Added
- by default, admin registration is open only if the environment is local, so that developers don't accidentally allow admin registration in production;


## [0.7.4] - 2016-11-01

### Fixed
- added ladda buttons css and js in the public folder, so that BackupManager would have it;



## [0.7.3] - 2016-10-15

### Fixed
- ResetPasswordNotification was not being sent;


## [0.7.2] - 2016-09-25

### Fixed
- Views now follow the route_prefix set in config;


## [0.7.1] - 2016-09-12

### Fixed
- Removed some plugins CSS from the layout.blade.php file, since they aren't used on all pages;


## [0.7.0] - 2016-08-30

### Added
- Laravel 5.3 support; please note that in order for PasswordResetNotifications to have correct links, the User models needs to me modified a bit.



## [0.6.16] - 2016-08-30

### Removed
- Backpack/Base DOES NOT automatically include backpack/generators and laracasts/generators on --dev; composer does not permit installing require-dev dependencies of dependencies;


## [0.6.15] - 2016-08-30

### Added
- Backpack/Base automatically includes backpack/generators and laracasts/generators on --dev.


## [0.6.14] - 2016-08-29

### Fixed
- Made the admin routes serializable, thanks to [Sabatino Masala](https://github.com/SabatinoMasala)


## [0.6.13] - 2016-08-12

### Added
- Spanish translation, thanks to [Rafael Ernesto Ferro González](https://github.com/rafix);


## [0.6.12] - 2016-08-06

### Fixed
- better naming and order for the latest config options;


## [0.6.11] - 2016-08-06

### Added
- config option to disable the auth routes setup;
- config option to change the User model;

## [0.6.10] - 2016-08-06

### Fixed
- renaming the route prefix also taken into account in the admin middleware;


## [0.6.9] - 2016-08-05

### Added
- added config option to rename the route prefix;
- added config option to disable the base routes setup;


## [0.6.8] - 2016-08-03

### Added
- French translation, thanks to [Aurelle Meless](https://github.com/aurellemeless);
- Small dashboard url fix, thanks to [Viktor Ivanov](https://github.com/viktorivanov); 


## [0.6.7] - 2016-06-28

### Added
- jenssegers/date library to handle localized dates by default;
- registered dependencies in order to simplify installation steps;


## [0.6.6] - 2016-06-28

### Fixed
- PasswordController namespace.


## [0.6.5] - 2016-06-24

### Added
- Romanian translation, thanks to Aurel Dragut.


## [0.6.4] - 2016-06-21

### Fixed
- Fix registration button not showing.


## [0.6.3] - 2016-06-13

### Fixed
- Hide registration menu button if registration closed.



## [0.6.2] - 2016-06-13

### Fixed
- Dashboard menu item always stayed active, thanks to Francis Derequito for reporting.


## [0.6.1] - 2016-06-03

### Added
- Italian translation, thanks to Federico Liva.


## [0.6.0] - 2016-06-02

### Added
- BREAKING CHANGE: added new Admin middleware used instead of Auth middleware, for redirects to work properly; All other packages will need to use this middleware from now on;
- How to use Password Reset functionality in README.md

### Fixed
- Error views used AdminLTE and had menus, but were also used as the main application error pages. This could become a security issue if the admin isn't careful to shut down registration.
- /login is no longer redirected to /admin/login
- Backpack/Base no longer uses any routes outside the /admin/ prefix in order not to conflict with any catch-all routes (as developers will probably use with PageManager).

### Removed
- routes.php file - routes are now defined in the BaseServiceProvider, so the package can be easily dropped on top of a Laravel application folder;


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
