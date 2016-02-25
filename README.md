# base

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Laravel BackPack's central package, which includes:
- admin login interface, using AdminLTE;
- basic user management page (edit password, name, email); // TODO
- basic admin dashboard page (using AdminLTE);
- pretty error pages; // TODO
- admin-wide alerts system (notification bubbles); // TODO
- roles / permissions; // TODO

## Install

Via Composer

``` bash
$ composer require backpack/base
```

Then add the service provider to your config/app.php file:
``` php
Backpack\Base\BaseServiceProvider::class,
```

Then run a few commands in the terminal:
``` bash
$ rm -rf app/Http/Controllers/Auth #deletes laravel's demo auth controllers
$ php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider"
$ php artisan migrate #should generate users table
```

## Usage 

1. Register a new user at yourappname/register
2. Your admin panel will be available at yourappname/admin or yourappname/login
3. If you're building an admin panel, you should close the registration. In config/backpack/base.php look for "registration_open" and change it to false.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Todos

// TODO - enable developers to replace auth views by just placing a view with the right name in the vendor folder
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
[ico-travis]: https://img.shields.io/travis/backpack/base/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/backpack/base.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/backpack/base.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/backpack/base.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/backpack/base
[link-travis]: https://travis-ci.org/backpack/base
[link-scrutinizer]: https://scrutinizer-ci.com/g/backpack/base/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/backpack/base
[link-downloads]: https://packagist.org/packages/backpack/base
[link-author]: https://github.com/tabacitu
[link-contributors]: ../../contributors
