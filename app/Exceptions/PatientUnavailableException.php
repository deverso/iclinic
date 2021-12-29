<?php

namespace App\Exceptions;

class PatientUnavailableException extends IclinicDomainException
{

    public function __construct($message = "patients service not available", $code = 503, string $innerCode = '06')
    {
        parent::__construct($message, $code, $innerCode);
    }
}
