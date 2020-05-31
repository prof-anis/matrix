<?php

namespace Busybrain\Matrix\Validation\Validators;

use Busybrain\Matrix\Contracts\ValidatorInterface;

class AddValidator implements ValidatorInterface 
{
	public function check($matrices)
	{
		//expecting n matrices atleast 2 with equal rows and columns
		
		return true;
	}
}