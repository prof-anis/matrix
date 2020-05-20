<?php

namespace Busybrain\Matrix;

 include __DIR__."/helper.php";

 
use Busybrain\Matrix\Basics\BasicTrait;
use Busybrain\Matrix\Builder;
use Busybrain\Matrix\Register;
 
 


 
class Matrix
{
	use BasicTrait;
	
	protected $register;

	public $matrix = [];

	public $scalar = [];

	function __construct()
	{
		$this->register = new Register;
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

	public function __call($function,$argument)
	{
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