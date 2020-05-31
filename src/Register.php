<?php

namespace Busybrain\Matrix;
 
use Busybrain\Matrix\Contracts\ValidatorInterface;
use Busybrain\Matrix\Exceptions\BadMethodCallException;
use Busybrain\Matrix\Validator;
use Busybrain\Matrix\Validators\TransposeValidator;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * 
 */
class Register extends Container
{
	 

	protected const library =
	 [
	 	"add"=> Operations\Addition::class,
	 	"subtract"=>Operations\Subtraction::class,
	 	"det"=>Operations\Determinant::class,
	 	"transpose"=>Operations\Transpose::class,
	 	"multiply"=>Operations\Multiplication::class

	 ];



	 function __construct()
	 {
	 	 
	 	$this->registerBindings();
	 	$this->bindByContext();
	 	 
	 }

	 public  function makeApi($function,$matrix)
	 {

	 	

	 	$class =  $this->operation($function,$matrix);
	 	
	 	return $this->call([$class,'handle']);
 	}

	 public function operation($function,$args)
	 { 
	 	try{
	 	return $this->makeWith($function,["matrix"=>$args->matrix,"scalar"=>$args->scalar]);
	 		}
	 	catch(BindingResolutionException $e)
	 	{
	 		throw(new BadMethodCallException("you tried calling a function $function which is not a recognized matrix function"));
	 	}
	 }

	 protected function registerBindings()
	 {
	 	foreach (self::library as $api => $concrete) {
	 		$this->bind($api,$concrete);
	 	}

	 	return $this;
	 }

	 protected function bindByContext()
	 {
	 	foreach (self::library as $api => $instance) {
	 		
	 		$validator =  "\Busybrain\Matrix\Validation\Validators\\".ucfirst($api)."Validator";
	 	 
	 	$this->when($instance)
	 			->needs(Validator::class)
	 			->give(new $validator);
	 	}
	 }

	 public function canMake($property)
	 {
	 	return in_array($property, array_keys(self::library));
	 }

	 public function canNotBeConvertedToMatrix($api)
	 {
	 	return in_array($api, ["det"]);
	 }
}


?>