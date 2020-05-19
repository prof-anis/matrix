<?php

namespace Busybrain\Matrix\Exceptions;

class ValidationException extends \Exception
{
	public function handle() : string
	{
		return $this->getMessage();
	}
}