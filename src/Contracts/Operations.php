<?php

namespace Busybrain\Matrix\Contracts;

use Busybrain\Matrix\Contracts\ValidatorInterface;
use Busybrain\Matrix\Validator;

 

interface Operations
{
	public function handle(Validator $validator) ;
}


?>