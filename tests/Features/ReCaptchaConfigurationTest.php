<?php

namespace Combindma\Recaptcha\Tests\Features;

use Combindma\Recaptcha\Tests\TestCase;

class ReCaptchaConfigurationTest extends TestCase
{
    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('recaptcha.api_site_key', 'api_site_key');
        $app['config']->set('recaptcha.api_secret_key', 'api_secret_key');
        $app['config']->set('recaptcha.curl_timeout', 3);
    }

    public function testGetApiSiteKey()
    {
        $this->assertEquals("api_site_key", $this->recaptcha->getApiSiteKey());
    }

    public function testGetApiSecretKey()
    {
        $this->assertEquals("api_secret_key", $this->recaptcha->getApiSecretKey());
    }

    public function testCurlTimeoutIsSet()
    {
        $this->assertEquals(3, $this->recaptcha->getCurlTimeout());
    }

    public function testSetApiDomain()
    {
        $this->recaptcha->setApiDomain('api_domain');
        $this->assertEquals("api_domain", $this->recaptcha->getApiDomain());
    }
}
