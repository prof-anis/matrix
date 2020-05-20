<?php

use Busybrain\Matrix\Matrix;
 

 function transpose($matrix)
 {
 	$mat = new Matrix;

 	return $mat->set($matrix)->transpose;
 }

 function array_multiply(array $array_1,array $array_2)
 {
 	foreach ($array_1 as $key => $value) {
 		
 		$new_array[] = $array_1[$key] * $array_2[$key];
 	}

 	return $new_array;
 }
 

	 function howManyMatrix()
	{
		return count($this->matrix);
	}

	 function rowSubtract(array $matrix) : int
	{
		$first_element = $matrix[0];

		$diff = $first_element - $matrix[1];

		for ($i=2; $i < count($matrix) ; $i++) { 
			
			$diff = $diff - $matrix[$i];
		}

	 

		return ($diff);
	}

		 function rowCount($matrix) :int
	{
		return count($matrix);
	}

	 function columnCount($matrix) : int
	{ 
		return count($matrix[0]);
	}

	 function pickRow($matrix,$row) : array
	{


		return $matrix[$row];
	}

	 function  select($matrix,$row,$col){

		if ($row < 1 || $col < 1) {
			
			throw new \Exception("invalid argument passed to the select function");
		}

		return pickRow($matrix,($row -1))[$col - 1];

	}

	 function pickColumn($matrix,$column) : array
	{
		$new_matrix = [];

		foreach ($matrix as $key => $value) {
			
			$new_matrix[] = $value[$column];
		}

		return $new_matrix;
	}


	function dimensions($matrix)
	 {
	 	return [rowCount($matrix),columnCount($matrix)];
	 }
