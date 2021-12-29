<?php

namespace App\Exceptions;


class PhysicianNotFoundException extends IclinicDomainException
{

    public function __construct($message = "physician not found", $code = 404, string $innerCode = '02')
    {
        parent::__construct($message, $code, $innerCode);
    }
}
