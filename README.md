# Simple and painless Google reCAPTCHA package for Laravel framework

[![Latest Version on Packagist](https://img.shields.io/packagist/v/combindma/recaptcha.svg?style=flat-square)](https://packagist.org/packages/combindma/recaptcha)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/combindma/recaptcha/run-tests?label=tests)](https://github.com/combindma/recaptcha/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/combindma/recaptcha/Check%20&%20fix%20styling?label=code%20style)](https://github.com/combindma/recaptcha/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/combindma/recaptcha.svg?style=flat-square)](https://packagist.org/packages/combindma/recaptcha)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require combindma/recaptcha
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Combindma\Recaptcha\RecaptchaServiceProvider" --tag="recaptcha-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Combindma\Recaptcha\RecaptchaServiceProvider" --tag="recaptcha-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$recaptcha = new Combindma\Recaptcha();
echo $recaptcha->echoPhrase('Hello, Combindma!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Combind](https://github.com/Combind)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
