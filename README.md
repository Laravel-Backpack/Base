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


## Install on Laravel 5.3

1) Run in your terminal:

``` bash
$ composer require backpack/base
```

2) Add the service providers in config/app.php:
``` php
Backpack\Base\BaseServiceProvider::class,
```

3) Then run a few commands in the terminal:
``` bash
$ php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider" #publishes configs, langs, views and AdminLTE files
$ php artisan vendor:publish --provider="Prologue\Alerts\AlertsServiceProvider" # publish config for notifications - prologue/alerts
$ php artisan migrate #generates users table (using Laravel's default migrations)
```

4) Make sure the reset password emails have the correct reset link by adding these to your ```User``` model:
- before class name ```use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;```
- as a method inside the User class:
``` php
  /**
   * Send the password reset notification.
   *
   * @param  string  $token
   * @return void
   */
  public function sendPasswordResetNotification($token)
  {
      $this->notify(new ResetPasswordNotification($token));
  }
```

5) [optional] Change values in config/backpack/base.php to make the admin panel your own. Change menu color, project name, developer name etc.

## Install on Laravel 5.2

1) Run in your terminal:

``` bash
$ composer require backpack/base 0.6.x
```

2) Add the service providers in config/app.php:
``` php
Backpack\Base\BaseServiceProvider::class,
```

3) Then run a few commands in the terminal:
``` bash
$ php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider" #publishes configs, langs, views and AdminLTE files
$ php artisan vendor:publish --provider="Prologue\Alerts\AlertsServiceProvider" # publish config for notifications - prologue/alerts
$ php artisan migrate #generates users table (using Laravel's default migrations)
```

4) If you want to be able to use the Reset Password functionality, you need to specify to Laravel to use the Backpack email for this. At the end of your \config\auth.php file, change:
``` php
'passwords' => [
        'users' => [
            'provider' => 'users',
            'email' => 'backpack::auth.emails.password', // <--- change is here
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],
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
