<?php

namespace Busybrain;

use Busybrain\Exceptions\BadMethodCallException;
use Busybrain\Traits\BasicTrait;
use Busybrain\Builder;
/**
 * 
 */
class Matrix
{
	use BasicTrait;
	

	public $matrix = [];

	public $scalar = [];

	

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

	

	public function __call($function,$arguments)
	{
		try{

			return Register::make($function,$arguments,$this);

			}
		catch(BadMethodCallException $e)
			{
				return $e;
				 
			}
	}
}
 


?>