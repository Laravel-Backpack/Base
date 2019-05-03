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


> ### Security updates and breaking changes
> Please **[subscribe to the Backpack Newsletter](http://backpackforlaravel.com/newsletter)** so you can find out about any security updates, breaking changes or major features. We send an email every 1-2 months.

![Example generated CRUD interface](https://backpackforlaravel.com/uploads/screenshots/base_login.png)

## Install on Laravel 5.8, 5.7, 5.6 or 5.5

1) Run in your terminal:

``` bash
composer require backpack/base
php artisan backpack:base:install
```

2) Make sure the reset password emails have the correct reset link by adding these to your ```User``` model:
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

3) [optional] Change values in config/backpack/base.php to make the admin panel your own. Change menu color, project name, developer name etc.

## Upgrading from Laravel 5.7 to Laravel 5.8 (or from Base 1.0 to Base 1.1)
- Upgrade to Laravel 5.8; you might need to change your ```backpack/crud``` dependency to ```3.6.*``` in your ```composer.json```;
- in your ```App\Models\BackpackUser``` instead of ```Tightenco\Parental\HasParent```, please use ```Backpack\Base\app\Models\Traits\InheritsRelationsFromParentModel```; [here's the diff](https://github.com/Laravel-Backpack/Base/pull/362/files#diff-f075b83ebb2b1ef3ba84dec14b395607);
- in your ```app/config/backpack/base.php``` please change your ```default_date_format``` and ```default_datetime_format``` to ```Do MMMM YYYY``` and ```Do MMMM YYYY, HH:mm``` respectively;
- if you've overwritten ```inc/head.blade.php``` or ```inc/scripts.blade.php```, please make sure you [use the newest version of Bootstrap](https://github.com/Laravel-Backpack/Base/pull/362/files#diff-96ac3ea4d0cb85053acf44e3772eb5f1); they've fixed a security vulnerability (XSS);


## Usage 

1. Register a new user at yourappname/admin/register
2. Your admin panel will be available at yourappname/admin or yourappname/login
3. [optional] If you're building an admin panel, you should close the registration. In config/backpack/base.php look for "registration_open" and change it to false.

![Example generated CRUD interface](https://backpackforlaravel.com/uploads/screenshots/base_dashboard.png)


## Overwriting Functionality

If you need to modify how this works in a project: 
- create a ```routes/backpack/base.php``` file; the package will see that, and load _your_ routes file, instead of the one in the package; 
- create controllers/models that extend the ones in the package, and use those in your new routes file;
- modify anything you'd like in the new controllers/models;

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@tabacitu.ro instead of using the issue tracker.

Please **[subscribe to the Backpack Newsletter](http://backpackforlaravel.com/newsletter)** so you can find out about any security updates, breaking changes or major features. We send an email every 1-2 months.

## Credits

- [Cristian Tabacitu][link-author]
- [All Contributors][link-contributors]

## License

Backpack is free for non-commercial use and 49 EUR/project for commercial use. Please see [License File](LICENSE.md) and [backpackforlaravel.com](https://backpackforlaravel.com/#pricing) for more information.

## Hire us

We've spend more than 50.000 hours creating, polishing and maintaining administration panels on Laravel. We've developed e-Commerce, e-Learning, ERPs, social networks, payment gateways and much more. We've worked on admin panels _so much_, that we've created one of the most popular software in its niche - just from making public what was repetitive in our projects.

If you are looking for a developer/team to help you build an admin panel on Laravel, look no further. You'll have a difficult time finding someone with more experience & enthusiasm for this. This is _what we do_. [Contact us](https://backpackforlaravel.com/need-freelancer-or-development-team). Let's see if we can work together.


[ico-version]: https://img.shields.io/packagist/v/backpack/base.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/backpack/base.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/backpack/base
[link-downloads]: https://packagist.org/packages/backpack/base
[link-author]: http://tabacitu.ro
[link-contributors]: ../../contributors
