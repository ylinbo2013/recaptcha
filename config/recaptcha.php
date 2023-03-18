<?php

/**
 * To configure correctly please visit https://developers.google.com/recaptcha/docs/start
 */
return [

    //The name of the input used to send Google reCAPTCHA token to verify
    'token_name' => env('RECAPTCHA_NAME', 'recaptcha_token'),

    /**
     * The site key
     * get site key @ www.google.com/recaptcha/admin
     */
    'api_site_key' => env('RECAPTCHA_SITE_KEY', ''),

    /**
     * The secret key
     * get secret key @ www.google.com/recaptcha/admin
     */
    'api_secret_key' => env('RECAPTCHA_SECRET_KEY', ''),

    /**
     * The curl timout in seconds to validate a recaptcha token
     */
    'curl_timeout' => 10,

    /**
     * Set API domain. You can use "www.recaptcha.net" in case "www.google.com" is not accessible.
     * (no check will be made on the entered value)
     *
     * @see   https://developers.google.com/recaptcha/docs/faq#can-i-use-recaptcha-globally
     * @since v4.3.0
     * Default 'www.google.com' (ReCaptchaBuilder::DEFAULT_RECAPTCHA_API_DOMAIN)
     */
    'api_domain' => 'www.google.com',

    //you can disable the ReCaptcha when you test your application
    'enabled' => env('RECAPTCHA_ENABLED', true),
];
