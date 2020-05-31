<?php

namespace Busybrain\Matrix\Validation\Validators;

use Busybrain\Matrix\Contracts\ValidatorInterface;

class TransposeValidator implements ValidatorInterface 
{
	public function check()
	{
		return true;
	}
}