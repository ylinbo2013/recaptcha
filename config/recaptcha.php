<?php

return [

    //The name used in name and id input form
    'token_name' => env('RECAPTCHA_NAME', 'recaptcha_token'),

    'api_site_key' => env('RECAPTCHA_SITE_KEY', ''),

    'api_secret_key' => env('RECAPTCHA_SECRET_KEY', ''),

    'enabled' => env('RECAPTCHA_ENABLED', 'true'),
];
