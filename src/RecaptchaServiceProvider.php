<?php

namespace Combindma\Recaptcha;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class RecaptchaServiceProvider extends ServiceProvider
{
    protected $config = __DIR__.'/../config/recaptcha.php';

    public function boot()
    {
        $this->addValidationRule();
        $this->publishes([
            $this->config => config_path('recaptcha.php'),
        ], 'config');

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'recaptcha');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            $this->config,
            'recaptcha'
        );

        $this->registerReCaptchaBuilder();
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

    /**
     * Register the HTML builder instance.
     *
     * @return void
     */
    protected function registerReCaptchaBuilder()
    {
        $this->app->singleton('recaptcha', function () {
            return new Recaptcha();
        });
    }
}
