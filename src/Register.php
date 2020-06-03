<?php

namespace Busybrain\Matrix;
 
use Busybrain\Matrix\Contracts\Operations;
use Busybrain\Matrix\Contracts\ValidatorInterface;
use Busybrain\Matrix\Exceptions\BadMethodCallException;
use Busybrain\Matrix\Validator;
use Busybrain\Matrix\Validators\TransposeValidator;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;


class Register extends Container
{
	 
	/**
	 * matches the api to the class that would handle it
	 * @var array
	 */
	protected const library =
	 [
	 	"add"=> \Busybrain\Matrix\Operations\Addition::class,
	 	"subtract"=>\Busybrain\Matrix\Operations\Subtraction::class,
	 	"det"=>\Busybrain\Matrix\Operations\Determinant::class,
	 	"transpose"=>\Busybrain\Matrix\Operations\Transpose::class,
	 	"multiply"=>\Busybrain\Matrix\Operations\Multiplication::class

	 ];



	 function __construct()
	 {
	 	 
	 	$this->registerBindings();
	 
	 	 
	 }

 

	 /**
	  * resolves the handle method on the operation class
	  * @param  String $function  
	  * @param  String $matrix
	  * @throws ValidationException    
	  * @return Array|int             
	  */
	 public  function makeApi($function,$matrix)
	 {

	 	

	 	$class =  $this->operation($function,$matrix);
	 	
	 	return $this->call([$class,'handle']);
 	}

 	/**
 	 * resolve the operation class
 	 * @param  String $function 
 	 * @param   $args     
 	 * @throws BadMethodCallException 
 	 * @return Operations           
 	 */
	 public function operation($function, $args) : Operations
	 { 
	 	try{
	 	return $this->makeWith($function,["matrix"=>$args->matrix,"scalar"=>$args->scalar]);
	 		}
	 	catch(BindingResolutionException $e)
	 	{	
	 		
	 		throw(new BadMethodCallException("you tried calling a function $function which is not a recognized matrix function"));
	 	}
	 }

	 /**
	  * binds the operation to the operation class
	  * @return self
	  */
	 protected function registerBindings() : self 
	 {
	 	foreach (self::library as $api => $concrete) {
	 		$this->bind($api,$concrete);
	 	}

	 	return $this;
	 }

	

	 /**
	  * search the predefined function for an operation
	  * @param  String $property 
	  * @return bool
	  */
	 public function canMake($property):bool
	 {
	 	return in_array($property, array_keys(self::library));
	 }

	 /**
	  * checks of the api result can be converted to a matrix instance
	  * @param  String $api 
	  * @return bool
	  */
	 public function canNotBeConvertedToMatrix($api) : bool
	 {
	 	return in_array($api, ["det"]);
	 }
}


?>