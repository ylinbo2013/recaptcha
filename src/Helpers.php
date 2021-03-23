<?php


if (!function_exists('recaptcha')) {

    function recaptcha(): \Combindma\Recaptcha\Recaptcha
    {
        return app('recaptcha');
    }
}

if (!function_exists('htmlScriptTagJsApi')) {

    function htmlScriptTagJsApi(?array $config = []): string
    {
        return recaptcha()->htmlScriptTagJsApi($config);
    }
}

if (!function_exists('recaptchaInput')) {

    function recaptchaInput(): string
    {
        return recaptcha()->recaptchaInput();
    }
}
