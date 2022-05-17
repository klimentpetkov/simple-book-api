<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class Author implements Rule
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
        $user = User::find($value);

        return $user ? $user->is_author == 1 : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Passed value has to be a valid Author ID.';
    }
}
