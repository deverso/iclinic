<?php

namespace App\Exceptions;

class PrescriptionRequestException extends IclinicDomainException
{
    public function __construct($message = "malformed request", $code = 422, string $innerCode = '01')
    {
        parent::__construct($message, $code, $innerCode);
    }
}
