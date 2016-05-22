# Backpack\Base

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status](https://img.shields.io/travis/Laravel-Backpack/base/master.svg?style=flat-square)](https://travis-ci.org/Laravel-Backpack/base)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/laravel-backpack/base.svg?style=flat-square)](https://scrutinizer-ci.com/g/laravel-backpack/crud/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/laravel-backpack/base.svg?style=flat-square)](https://scrutinizer-ci.com/g/laravel-backpack/crud)
[![Style CI](https://styleci.io/repos/52384487/shield)](https://styleci.io/repos/52384487)
[![Total Downloads][ico-downloads]][link-downloads]

Laravel BackPack's central package, which includes:
- admin login interface, using AdminLTE;
- basic menu;
- pretty error pages;
- alerts system (notification bubbles);


**[Subscribe to the newsletter](http://eepurl.com/bUEGjf) to be announced of any major updates or breaking changes.** 

![Example generated CRUD interface](https://dl.dropboxusercontent.com/u/2431352/backpack_base_login.png)


## Install

1) Run in your terminal:

``` bash
$ composer require backpack/base
```

2) Add the service providers in config/app.php:
``` php
Backpack\Base\BaseServiceProvider::class,
'Prologue\Alerts\AlertsServiceProvider',
```

3) Add the alias to the list of aliases in config/app.php:
```php
'Alert' => 'Prologue\Alerts\Facades\Alert',
```

4) Then run a few commands in the terminal:
``` bash
$ rm -rf app/Http/Controllers/Auth #deletes laravel's demo auth controllers
$ php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider" #publishes configs, langs, views and AdminLTE files
$ php artisan vendor:publish --provider="Prologue\Alerts\AlertsServiceProvider" # publish config for notifications - prologue/alerts
$ php artisan migrate #generates users table (using Laravel's default migrations)
```

5) [optional] Change values in config/backpack/base.php to make the admin panel your own. Change menu color, project name, developer name etc.

## Usage 

1. Register a new user at yourappname/admin/register
2. Your admin panel will be available at yourappname/admin or yourappname/login
3. [optional] If you're building an admin panel, you should close the registration. In config/backpack/base.php look for "registration_open" and change it to false.

![Example generated CRUD interface](https://dl.dropboxusercontent.com/u/2431352/backpack_base_dashboard.png)

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Todos

// TODO - instruct developer on how to modify/extend the AuthController and PasswordController and/or provide example

## Testing

// TODO

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@tabacitu.ro instead of using the issue tracker.

## Credits

- [Cristian Tabacitu][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/backpack/base.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/backpack/base.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/backpack/base
[link-downloads]: https://packagist.org/packages/backpack/base
[link-author]: http://tabacitu.ro
[link-contributors]: ../../contributors
