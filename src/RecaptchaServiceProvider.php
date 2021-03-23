<?php

namespace Combindma\Recaptcha;

use Combindma\Recaptcha\Rules\RecaptchaRule;
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

    public function packageBooted()
    {
        parent::packageBooted();

        $this->app['validator']->extend('recaptcha', RecaptchaRule::class);
    }
}
