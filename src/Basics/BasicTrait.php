<?php

namespace Busybrain\Matrix\Basics;


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

	public function  select($matrix,$row,$col){

		if ($row < 1 || $col < 1) {
			
			throw new \Exception("invalid argument passed to the select function");
		}

		return $this->pickRow($matrix,($row -1))[$col - 1];

	}

	public function pickColumn($matrix,$column) : array
	{
		$new_matrix = [];
 
		foreach ($matrix as $key => $value) {
			
			 
				$new_matrix[] = $value[$column];
			 
		}

		return $new_matrix;
	}


	function lu($mat, $n) 
	{ 
	    $lower; 
	    $upper; 

	    for($i = 0; $i < $n; $i++) 
	    for($j = 0; $j < $n; $j++) 
	    { 
	        $lower[$i][$j]= 0; 
	        $upper[$i][$j]= 0; 
	    } 
	    // Decomposing matrix  
	    // into Upper and Lower 
	    // triangular matrix 
	    for ($i = 0; $i < $n; $i++)  
	    { 
	  
	        // Upper Triangular 
	        for ($k = $i; $k < $n; $k++)  
	        { 
	  
	            // Summation of  
	            // L(i, j) * U(j, k) 
	            $sum = 0; 
	            for ($j = 0; $j < $i; $j++) 
	                $sum += ($lower[$i][$j] *  
	                         $upper[$j][$k]); 
	  
	            // Evaluating U(i, k) 
	            $upper[$i][$k] = $mat[$i][$k] - $sum; 
	        } 
	  
	        // Lower Triangular 
	        for ($k = $i; $k < $n; $k++)  
	        { 
	            if ($i == $k) 
	                $lower[$i][$i] = 1; // Diagonal as 1 
	            else
	            { 
	  
	                // Summation of L(k, j) * U(j, i) 
	                $sum = 0; 
	                for ($j = 0; $j < $i; $j++) 
	                    $sum += ($lower[$k][$j] *  
	                             $upper[$j][$i]); 
	  
	                // Evaluating L(k, i) 
	                $lower[$k][$i] = (int)(($mat[$k][$i] -  
	                                $sum) / $upper[$i][$i]); 
	            } 
	        } 
	    } 
	   
	 
	    return [$lower,$upper]; 
	} 

	 public function getDetFor2by2($matrix)
	 {
	 	return $this->select($matrix,1,1) * $this->select($matrix,2,2) - $this->select($matrix,1,2) * $this->select($matrix,2,1);

	 }

	 public function rowDel($matrix,$row)
	 {
	 	 
	 	 unset($matrix[$row]);

	 	 $matrix = array_values($matrix);

	 	 return $matrix;
	 }

	 public function colDel($matrix,$col)
	 {
	  

	 	$mat = transpose($matrix);

	 	$mat = $this->rowDel($mat,$col);
	 	  
	 	return transpose($mat);
	 }

	 public function getDetFor3by3($matrix)
	 {

	 	//extract the first row 
	 	$first_row = $this->pickRow($matrix,0);

 

	 	$row = 0; //first row

	 	for ($i=0; $i < count($first_row); $i++) { 
	 		
	 		//get the minor which should be a two by two 
	 		$minor = $this->rowDel($this->colDel($matrix,$i),$row);
	 		//resolve the multiplication
	  
	 		$det_part[] = $first_row[$i] * $this->getDetFor2by2($minor);
	 		
	 	}

	 

	 	//fixing in the negatives
	 	
	 	foreach ($det_part as $key => $value) {

	 		if ($key%2 != 0) {
	 			
	 			$det_part[$key] = -1*$value;
	 		}
	 	}

	 	return array_sum($det_part);
	 }

	 public function getDet($matrix)
	 {
	 	$dimension = $this->dimensions($matrix)[0];

	 	[$l,$u] = $this->lu($matrix,$dimension);

	 	

	 	return ($this->diagonal_product($u));

	 }

	 public function diagonal_product($matrix)
	 {
	 	$row = 0;
	 	$col = 0;
	 	$element=1;

	 	foreach ($matrix as $key => $value) {
	 		
	 		$element *= $this->pickRow($matrix,$row)[$col];
	 		$row++;
	 		$col++;
	 	}

	 	return $element;
	 }

	 public function dimensions($matrix)
	 {
	 	return [$this->rowCount($matrix),$this->columnCount($matrix)];
	 }



}


?>