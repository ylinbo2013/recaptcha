<?php

it('can test if config file are set', function () {
    $this->recaptcha->setApiDomain('api_domain');
    expect($this->recaptcha->getApiSiteKey())->toBe('api_site_key')
        ->and($this->recaptcha->getApiSecretKey())->toBe('api_secret_key')
        ->and($this->recaptcha->getCurlTimeout())->toBe(3)
        ->and($this->recaptcha->getApiDomain())->toBe('api_domain');
});
