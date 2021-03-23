<?php


namespace Combindma\Recaptcha\Rules;


use Illuminate\Contracts\Validation\Rule;

class RecaptchaRule implements Rule
{
    public function passes($attribute, $value)
    {
        return recaptcha()->validate($value)['success'];
    }

    public function message()
    {
        return __('recaptcha::messages.invalid');
    }
}
