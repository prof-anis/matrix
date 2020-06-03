<?php

namespace Busybrain\Matrix\Validation;

use Closure;

class ValidationParser
{
	public static function parse($rule)
	{
		//rule can be string, closure or validation class
		//first i handle validation for regular strings
		if (is_string($rule)) {
			return self::resolveParameters($rule);
		}
		if ($rule instanceof Closure) {
			return [$rule,[]];
		}
	}

	public static function resolveParameters($rule)
	{	
	

		if (strpos($rule, ':') !== false) {
			
			 [$command,$argument] = explode(':', $rule);
			 $arguments = self::resolveArg($argument);
			 return [$command,$arguments];

		  
		}
		else{
			return [$rule,[]];
		}
		 
		 
	}

	public static function resolveArg($arg)
	{
		$arguments = [];
		if (strpos($arg,',')) {
			$arguments = explode(',',$arg);
		}
		return $arguments;
	}
}