<?php

namespace App;
use App\Exceptions\BadMethodCallException;

/**
 * 
 */
class Register
{
	private const  defaultNameSpace = "App\Operations\\";


	public static $library =
	 [
	 	"add"=> "Addition",
	 	"subtract"=>"Subtraction"

	 ];


	 public static function make($function,$arguments,$matrix)
	 {
	 	if (in_array($function,array_keys(self::$library))) {
	 		
	 		$class_name = self::defaultNameSpace.self::$library[$function];

	 		 
	 	 	$arguments = array_merge([$matrix],$arguments);
	 		$class = new $class_name(...$arguments);
	 		$class->handle();

	 		return $class->result();

	 	}
	 	else{

	 		throw new BadMethodCallException("you tried calling a function $function which does not exists");
	 	}


	 	
	 }
}


?>