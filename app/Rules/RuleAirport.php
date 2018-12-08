<?php

namespace App\Rules;

use App\Airport;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class RuleAirport implements Rule
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
        if ($attribute === 'iata') {
            $airport = Airport::where('user_id', '=', Auth::user()->id)->where('iata', '=', $value)->first();
            if (empty($airport)) {
                return true;
            }
        } else if ($attribute === 'icao') {
            $airport = Airport::where('user_id', '=', Auth::user()->id)->where('icao', '=', $value)->first();
            if (empty($airport)) {
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
