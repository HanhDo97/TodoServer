<?php

namespace App\Exceptions;

use Exception;

class TokenException extends Exception
{
    public static function wrongCredential(): TokenException
    {
        return new self('The provided credentials are incorrect.');
    }
}
