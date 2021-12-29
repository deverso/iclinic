<?php

namespace App\Exceptions;


class PatientNotFoundException extends IclinicDomainException
{

    public function __construct($message = "patient not found", $code = 404, string $innerCode = '03')
    {
        parent::__construct($message, $code, $innerCode);
    }
}
