<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Filter implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected $forbidden;
    public function __construct($forbidden = [])
    {
        $this->forbidden = $forbidden;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (in_array(strtolower($value), $this->forbidden)) {
            $fail("The name  not allowed to be $value.");
        }
    }
}
