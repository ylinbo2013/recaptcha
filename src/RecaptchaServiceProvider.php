<?php

namespace Combindma\Recaptcha;

use Illuminate\Support\Facades\Validator;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class RecaptchaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('recaptcha')
            ->hasConfigFile()
            ->hasTranslations();
    }

    public function bootingPackage()
    {
        $this->addValidationRule();
    }

    public function registeringPackage()
    {
        $this->app->singleton('recaptcha', function () {
            return new Recaptcha();
        });
    }

    /**
     * Extends Validator to include a recaptcha type
     */
    public function addValidationRule()
    {
        Validator::extendImplicit('recaptcha', function ($attribute, $value) {
            return app('recaptcha')->validate($value)['success'];
        }, __('recaptcha::messages.invalid'));
    }
}
