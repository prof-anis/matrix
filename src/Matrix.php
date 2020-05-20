<?php

namespace Busybrain\Matrix;

 include __DIR__."/helper.php";

 
use Busybrain\Matrix\Basics\Helpers;
use Busybrain\Matrix\Builder;
use Busybrain\Matrix\Register;
 
 


 
class Matrix
{
	 
	
	protected $register;

	public $matrix = [];

	public $scalar = [];

	function __construct()
	{
		$this->register = new Register;
		$this->helper = new Helpers;
	}

	public static function make(array $matrix)
	{
		$instance = new Matrix();

		$instance->set($matrix);

		return $instance;
	}


	

	public function setScalar(int $scalar) : object
	{
		$this->scalar[] = $scalar;
		return $this;
	}

	public function set(array $matrix) :object
	{
		$this->matrix[] = $matrix;

		return $this;

	}

	public static function identityMatrix($rows,$columns)
	{
		return Builder::identityMatrix($rows,$columns);
	}

	public function scalarToMatrix($scalar,$rows,$columns)
	{
		return Builder::scalarToMatrix($scalar,$rows,$columns);
	}

	public function isSingular(array $matrix)
	{
		$obj = new Matrix;

		return (int)$obj->set($matrix)->det() === 0;
	}

	public function get($row,$col)
	{
		return $this->first()[$row - 1][$col - 1];
	}

	public function getDimension()
	{
		return $this->dimensions($this->first());
	}

	public function select($row,$col)
	{
		return $this->first()[$row][$col];
	}

	public function __call($function,$argument)
	{
		//check the helper class first. the user might be trying to access matrix properties.all the matrix properties in the helpers class would be made public while the non-propeties i.e functions needed for other computation would be protected
		

		if (in_array($function, get_class_methods(Helpers::class))) {
		 	
		 	$arg = array_merge([$this->matrix[0]],$argument);

		 	return $this->helper->$function(...$arg);
		 } 
		

		
		 $response =  $this->register->makeApi($function,$this);
	 	
	 	if(!$this->register->canNotBeConvertedToMatrix($function))
	 	{
	 		return self::make($response);
	 	}
	 	return $response;
	}

	public function __get($property)
	{
		if ($this->register->canMake($property)) {
			
			return $this->register->makeApi($property,$this);
		}
	}

 
}
 


?>