<?php
namespace App\Operations;
use App\Contracts\Operations;


class Multiplication implements Operations
{
	private $matrix;

	private $scalar;

	private $result;


	function __construct($matrix)
	{
		$this->matrix = $matrix->matrix;

		$this->scalar = $matrix->scalar;
	}


	public function handle() : bool
	{
		
	}

	public function result()
	{
		return $this->result;
	}
}


