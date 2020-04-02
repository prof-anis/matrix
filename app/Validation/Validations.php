<?php

namespace Busybrain\Validation;
use Busybrain\Traits\BasicTrait;

/**
 * 
 */
class Validations 
{
	use BasicTrait;


	public  function validateSameNumberOfRows($matrices)
	{
		 

		foreach ($matrices as $key => $matrix) {

			$pass[] = $this->rowCount($matrix);

		}

		 

		return $this->array_same($pass);
	}

	public  function validateSameNumberOfCols($matrices)
	{
		$pass = [];

		foreach ($matrices as $key => $matrix) {

			$pass[] = $this->columnCount($matrix);

		}
		

		return $this->array_same($pass);
	}

	public  function rowCountEqualColCount($matrix_1,$matrix_2)
	{
		return $this->rowCount($matrix_1) == $this->columnCount($matrix_2);
	}
 
}