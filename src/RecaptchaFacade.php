<?php

namespace Combindma\Recaptcha;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Combindma\Recaptcha\Recaptcha
 */
class RecaptchaFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'recaptcha';
    }
}
