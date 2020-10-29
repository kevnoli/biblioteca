<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Cpf implements Rule
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
        if(strlen($value !== 11)){
            return false;
        }

        if(preg_match('/^(.)\1{10}$/u', $value)){
            return false;
        }

        $d1 = 0;
        for($i = 0, $s = 10; $i < 9; $i++){
            $d1 += $value[$i] * $s;
            $s--;
        }
        $d1 = $d1 * 10 % 11;

        $d2 = 0;
        for($i = 0, $s = 11; $i < 10; $i++){
            $d2 += $value[$i] * $s;
            $s--;
        }
        $d2 = $d2 * 10 % 11;

        if($d1 != $value[9] || $d2 != $value[10]){
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Cpf inválido.';
    }
}
