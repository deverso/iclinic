<?php

namespace App\Exceptions;

class MetricUnavailableException extends IclinicDomainException
{

    public function __construct($message = "metrics service not available", $code = 503, string $innerCode = '04')
    {
        parent::__construct($message, $code, $innerCode);
    }
}
