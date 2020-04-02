<?php

namespace Busybrain\Traits;


trait BasicTrait
{
		private function first()
	{
		return $this->matrix[0];
	}

	public function howManyMatrix()
	{
		return count($this->matrix);
	}

	public function rowSubtract(array $matrix) : int
	{
		$first_element = $matrix[0];

		$diff = $first_element - $matrix[1];

		for ($i=2; $i < count($matrix) ; $i++) { 
			
			$diff = $diff - $matrix[$i];
		}

	 

		return ($diff);
	}

		public function rowCount($matrix) :int
	{
		return count($matrix);
	}

	public function columnCount($matrix) : int
	{
		return count($matrix[0]);
	}

	public function pickRow($matrix,$row) : array
	{

		return $matrix[$row];
	}

	public function pickColumn($matrix,$column) : array
	{
		$new_matrix = [];

		foreach ($matrix as $key => $value) {
			
			if ($key == $column) {
				$new_matrix[] = $value;
			}
		}

		return $new_matrix;
	}

	public function array_same(array $array)
	{	
		$first_value = $array[0];

		for($i = 1; $i < count($array); $i++)
		{
			if ($array[$i] != $first_value) {
				
				return false;
			}

		}

		return true;
	}


}


?>