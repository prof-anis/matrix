<?php

namespace App;
/**
 * 
 */
class Matrix
{
	
	public function multiply() : array
	{

	}

	public function set(array $matrix) :object
	{
		$this->matrix[] = $matrix;

		return $this;

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

	public function add()
	{
		 
		$no_of_matrix = 2;

		//get the first element of each matrix into an array 
	for($k = 0 ; $k < $this->columnCount($this->first());$k++){

		for ($i=0; $i < $this->howManyMatrix() ; $i++) { 
			
			for ($j=0; $j < $this->rowCount($this->matrix[$i]); $j++) { 
				
				$row[] = $this->pickRow($this->matrix[$j],$i)[$k];	

				
			}

			

			$result = array_sum($row);



			$main_result[] = $result;
					$result=[];
		$row=[];
			
		}



	}
		

		dd($main_result);

	}

	private function singleTransverse($matrix)
	{
		//transverse 1 by 1 array

		foreach ($matrix as $key => $value) {
		 	

		 } 
	}

	private function first()
	{
		return $this->matrix[0];
	}

	public function howManyMatrix()
	{
		return count($this->matrix);
	}
}

function dd($value)
{
	var_dump($value);
	exit();
}



?>