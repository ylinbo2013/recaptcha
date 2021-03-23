<?php

namespace Combindma\Recaptcha\Tests;

use Combindma\Recaptcha\Recaptcha;
use Combindma\Recaptcha\RecaptchaServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected $recaptcha;

    public function setUp(): void
    {
        parent::setUp();
        $this->recaptcha = new Recaptcha();
    }

    protected function getPackageProviders($app)
    {
        return [
            RecaptchaServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Recaptcha' => Recaptcha::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
    }
}
