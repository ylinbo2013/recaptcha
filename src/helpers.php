<?php

if (! function_exists('htmlScriptTagJsApi')) {
    function htmlScriptTagJsApi(?array $config = []): string
    {
        return (new \Combindma\Recaptcha\Recaptcha())->htmlScriptTagJsApi($config);
    }
}

if (! function_exists('recaptchaInput')) {
    function recaptchaInput(): string
    {
        return (new \Combindma\Recaptcha\Recaptcha())->recaptchaInput();
    }
}
