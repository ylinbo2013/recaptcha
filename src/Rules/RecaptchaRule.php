<?php


namespace Combindma\Recaptcha\Rules;

use Combindma\Recaptcha\Recaptcha;
use Illuminate\Contracts\Validation\Rule;

class RecaptchaRule implements Rule
{
    public function passes($attribute, $value)
    {
        return (new Recaptcha())->validate($value)['success'];
    }

    public function message()
    {
        return __('recaptcha::messages.invalid');
    }
}
