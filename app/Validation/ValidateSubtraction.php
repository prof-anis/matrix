<?php

namespace Busybrain\Validation;

use Busybrain\Validation\Validations;
use Busybrain\Contracts\Validators;

class ValidateSubtraction extends Validations implements Validators
{ 

	public  function checker($matrices) 
	{
	 
		if($this->validateSameNumberOfRows($matrices) && $this->validateSameNumberOfCols($matrices)){
			 
			 return true;
		}

		throw new \Exception("matrices dimensions are not equal");
		 
	}
}


