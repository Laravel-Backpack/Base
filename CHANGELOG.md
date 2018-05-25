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

-------

## [0.9.6] - 2018-06-04

### Added
- Arabic language, thanks to @allam2002;

### Fixed
- #288 and #284 - moved check license method to boot instead of register;


## [0.9.5] - 2018-05-02

### Fixed
- helpers are now loaded in the register function, to avoid undefined function errors in subsequent Backpack packages, where they're loaded before Base;


## [0.9.4] - 2018-05-02

### Fixed
- ```backpack_avatar_url()``` helper had a wrong function name existence declaration; merges #280;
- ```backpack_avatar_url()``` helper now uses a custom function if it exists, otherwise an accessor; merges #281;

## [0.9.3] - 2018-04-17

### Fixed
- ```login.php``` view now uses ```$username``` instead of helper, to allow developers to overwrite this in their LoginController; fixes #276;


## [0.9.2] - 2018-03-29

### Fixed
- ```custom.php``` route now uses the ```web``` middleware by default; merges #268; fixes #271;


## [0.9.1] - 2018-03-22

### Fixed
- config file was using a translation item, which is not possible;


## [0.9.0] - 2018-03-22

### Added
- flexbox css helper class;
- support for HTML messages inside Alert bubbles, when triggered from PHP;
- added publish lang command;
- added command to publish only the minimum amount of files needed for Backpack to work;
- ```sidebar_content.blade.php``` file, so that we can add sidebar items using a command
- ```php artisan backpack:base:add-sidebar-content``` command;
- ```php artisan backpack:base:add-custom-route``` command;
- ability for developer to use a custom auth guard;
- ability for developer to rename the ```admin``` middleware;
- ```before_styles```, ```after_styles```, ```before_scripts```, ```after_scripts``` stacks, to which developers can ```@push```;

### Fixed
- the installation command now only publishes the minimum amount of files, by default;
- AdminLTE now uses the latest version;

-------

## [0.8.9] - 2018-02-08

## Fixed
- NL translation;
- ES translation;
- Security issue #240 - user insert new fields and change restricted info about him;


## [0.8.8] - 2018-02-08

## Added
- Laravel 5.6 support;


## [0.8.7] - 2018-01-18

## Added
- progress bar to installer;
- debug option to installer;
- configurable timeout option to installer;

## Fixed
- hide secondary pace loader to avoid CRUD list page three-separate-loaders syndrome;


## [0.8.6] - 2018-01-10

## Fixed
- ajax datatable loading screen;


## [0.8.5] - 2018-01-03

## Added
- user image to My Account side menu;
- link on general sidebar user image;
- link on general sidebar user name;

## Fixed
- Greek translation;
- French translation;


## [0.8.4] - 2017-12-12

## Fixed
- Chinese translation;
- Upon installation, vendor path is calculated instead of relying on base_path() - merged #223, fixes #222;

## Added
- BACKPACK_REGISTRATION_OPEN environment variable;

## [0.8.3] - 2017-12-02

## Fixed
-  ensure the installer publishes files correctly on all OSs - refs #216;
-  Using guard() method to access the current guard in MyAccountController - merged #215;
-  updated LV translation;
-  added zh-hant translation;
-  updated German translation;
-  updated Italian translation;
-  user avatar uses customized guard;


## [0.8.2] - 2017-11-07

## Fixed
- command-line installer namespace;


## [0.8.1] - 2017-11-06

## Added
- command-line installer: ```php artisan backpack:base:install```;


## [0.8.0] - 2017-11-06

## Added
- backpack_url() helper that returns the URL prefixed by the configured string;
- by default, gravatar instead of placehold image;
- design facelift (introducing overlays that make the admin panel customizable and designs shareable; first overlay is called "Bold");
- backpack_avatar_url() helper;
- views and logic for logged in user to change his account info;
- views and logic for logged in user to change his password;

## Fixed
- using Mix instead of Elixir, since we only support L5.5 now;
- select2 clear button;
- prefixed auth route names;

## Removed
- Laravel 5.4 and 5.3 support;
- PHP 5.x support (Laravel constraint);


## [0.7.25] - 2017-08-30

## Added
- Package Autodiscovery support - no longer needed to register service provider in Laravel 5.5;


## [0.7.24] - 2017-08-30

## Added
- Laravel 5.5 support;


## [0.7.23] - 2017-08-22

## Fixed
- active tab not working in some use cases;

## Added
- license code in the base config file;


## [0.7.22] - 2017-08-11

## Added
- Danish (da_DK) language files, thanks to [Frederik Rabøl](https://github.com/Xayer);


## [0.7.21] - 2017-07-18

## Added
- language pointer files for pagemanager;


## [0.7.20] - 2017-07-06

## Added
- overwritable routes file;
- Portugese translation (thanks to [Toni Almeida](https://github.com/promatik));
- Remember collapsed/open sidebar state, when loading the page (thanks to [MarcosBL](https://github.com/MarcosBL));

### Fixed
- Support query string when setting active menu item;


## [0.7.19] - 2017-04-25

### Added
- Latvian translation files (thanks to [Erik Bonder](https://github.com/erik-ropez));
- Russian translation files (thanks to [Aleksei Budaev](https://a-budaev.ru/));


## [0.7.18] - 2017-04-21

### Fixed
- language files for all Backpack packages are now loaded by Backpack\Base, using pointer files; this fixes the language fallback system;
- Backpack\Base language files no longer need publishing;


## [0.7.17] - 2017-04-21

### Added
- Indonesian translation, thanks to [Nakamura Agatha](https://github.com/nakamuraagatha);
- deep links to tabs, thanks to [MarcosBL](https://github.com/MarcosBL);


## [0.7.16] - 2017-02-11

### Added
- Bulgarian translation, thanks to [Petyo Tsonev](https://github.com/petyots);
- Greek translation fixes;


## [0.7.15] - 2017-02-03

### Added
- Laravel 5.4 compatibility;



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
