<?php

namespace Busybrain\Exceptions;

use Busybrain\Contracts\Exceptions;
  
/**
 * 
 */

class BadMethodCallException extends \BadMethodCallException implements Exceptions
{
	public function handle() : string
	{
		return $this->getMessage();
	}


}


?>