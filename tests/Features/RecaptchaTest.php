<?php

namespace Combindma\Recaptcha\Tests\Features;

use Combindma\Recaptcha\Tests\TestCase;

class RecaptchaTest extends TestCase
{
    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('recaptcha.api_site_key', 'api_site_key');
        $app['config']->set('recaptcha.api_secret_key', 'api_secret_key');
        $app['config']->set('recaptcha.token_name', 'token');
    }

    public function testAction()
    {
        $r = $this->recaptcha->htmlScriptTagJsApi(['action' => 'someAction']);
        $this->assertMatchesRegularExpression('/someAction/', $r);
    }

    public function testRecaptchaInputWhenEnabled()
    {
        $r = $this->recaptcha->recaptchaInput();
        $this->assertEquals('<input type="hidden" name="token" id="token">', $r);
    }
}
