<?php

namespace App\Exceptions;

use App\Contracts\Exceptions;
  
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