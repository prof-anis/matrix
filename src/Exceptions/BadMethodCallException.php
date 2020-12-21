<?php

namespace Busybrain\Matrix\Exceptions;

use Busybrain\Matrix\Contracts\Exceptions;

class BadMethodCallException extends \BadMethodCallException implements Exceptions
{
    public function handle(): string
    {
        return $this->getMessage();
    }
}
