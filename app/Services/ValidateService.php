<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Request;

class ValidateService
{
    public static function validateRequired(Request $request, array $fields)
    {
        foreach ($fields as $field) {
            $value = $request->input($field);
            if (!is_null($value) && $value !== '' && !str_contains($value, "'")) continue;

            throw new Exception("$field is required and must not contain special characters");
        }
    }
}
