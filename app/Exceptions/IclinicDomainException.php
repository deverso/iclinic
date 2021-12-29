<?php

namespace App\Exceptions;

class IclinicDomainException extends \DomainException
{

    protected string $innerCode;

    public function __construct($message = 'prescription service not available', $code = 503, string $innerCode = '00')
    {
        $this->innerCode = $innerCode;
        parent::__construct($message, $code);
    }

    /**
     * @return string
     */
    public function getInnerCode(): string
    {
        return $this->innerCode;
    }

}
