<?php

namespace Busybrain;
use Busybrain\Exceptions\BadMethodCallException;

/**
 * 
 */
class Register
{
	private const  defaultNameSpace = "Busybrain\Operations\\";


	public static $library =
	 [
	 	"add"=> "Addition",
	 	"subtract"=>"Subtraction"

	 ];


	 public static function make($function,$arguments,$matrix)
	 {
	 	if (in_array($function,array_keys(self::$library))) {
	 		
	 		$class_name = self::defaultNameSpace.self::$library[$function];

	 		$validator =  self::resolveValidator($class_name);

	 		$validator = new $validator($matrix->matrix);

	 	 	$arguments = array_merge([$matrix],$arguments);

	 		$class = new $class_name(...$arguments);
	 		
	 		$class->handle($validator);

	 		return $class->result();

	 	}
	 	else{

	 		throw new BadMethodCallException("you tried calling a function $function which does not exists");
	 	}


	 	
	 }

	 private static function  resolveValidator($class_name)
	 {
	 	$reflection = new \ReflectionClass($class_name);

	 	return ($reflection->getMethod("handle")->getParameters()[0]->getType()->getName());


	 } 
}


?>