<?php

namespace Combindma\Recaptcha\Tests\Features;

use Combindma\Recaptcha\Tests\TestCase;

class RecaptchaDisabledTest extends TestCase
{
    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('recaptcha.api_site_key', 'api_site_key');
        $app['config']->set('recaptcha.api_secret_key', 'api_secret_key');
        $app['config']->set('recaptcha.token_name', 'token');
        $app['config']->set('recaptcha.enabled', false);
    }

    public function testAction()
    {
        $r = $this->recaptcha->htmlScriptTagJsApi(['action' => 'someAction']);
        $this->assertEquals('', $r);
    }

    public function testRecaptchaInput()
    {
        $r = $this->recaptcha->recaptchaInput();
        $this->assertEquals('<input type="hidden" name="token" id="token" value="token">', $r);
    }

    public function testValidate()
    {
        $r = $this->recaptcha->validate('token');
        $this->assertEquals(['score' => 0.9, 'success' => true], $r);
    }
}
