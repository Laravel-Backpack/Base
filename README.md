# base

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Laravel BackPack's central package, which includes:
- a customized version of Laravel's authentication interface, using AdminLTE; // TODO
- basic user management page (edit password, name, email);
- basic admin dashboard page (using AdminLTE); // TODO
- pretty error pages; // TODO
- admin-wide alerts system (notification bubbles); // TODO
- roles / permissions; // TODO

## Install

Via Composer

``` bash
$ composer require backpack/base
```

If the post-package-install hook hasn't worked, also run:
``` bash
$ rm -rf app/Http/Controllers/Auth
$ php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider"
$ php artisan migrate
```

## Usage 

1. In your browser, go to yourappname/admin
2. Register an admin user
3. If you're using this for an admin panel, you should close the registration. In config/backpack/base.php look for "registration_open" and change it to false.

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
