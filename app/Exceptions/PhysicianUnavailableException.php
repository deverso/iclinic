<?php

namespace App\Exceptions;

class PhysicianUnavailableException extends IclinicDomainException
{
    public function __construct($message = "physicians service not available", $code = 503, string $innerCode = '05')
    {
        parent::__construct($message, $code, $innerCode);
    }
}
