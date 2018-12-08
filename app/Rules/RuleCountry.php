<?php

namespace App\Rules;

use App\Country;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class RuleCountry implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($attribute === 'alpha2') {
            $country = Country::where('user_id', '=', Auth::user()->id)->where('alpha2', '=', $value)->first();
            if (empty($country)) {
                return true;
            }
        } else if ($attribute === 'alpha3') {
            $country = Country::where('user_id', '=', Auth::user()->id)->where('alpha3', '=', $value)->first();
            if (empty($country)) {
                return true;
            }
        } else if ($attribute === 'alphaNumeric') {
            $country = Country::where('user_id', '=', Auth::user()->id)->where('alphaNumeric', '=', $value)->first();
            if (empty($country)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The code field is already in use.';
    }
}
