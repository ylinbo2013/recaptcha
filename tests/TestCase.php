<?php

namespace Combindma\Recaptcha\Tests;

use Combindma\Recaptcha\Recaptcha;
use Combindma\Recaptcha\RecaptchaServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public Recaptcha $recaptcha;

    protected function getPackageProviders($app): array
    {
        return [
            RecaptchaServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'Recaptcha' => Recaptcha::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('recaptcha.api_site_key', 'api_site_key');
        $app['config']->set('recaptcha.api_secret_key', 'api_secret_key');
        $app['config']->set('recaptcha.token_name', 'token');
        $app['config']->set('recaptcha.curl_timeout', 3);
        $app['config']->set('recaptcha.enabled', false);
        $this->recaptcha = new Recaptcha();
    }
}
