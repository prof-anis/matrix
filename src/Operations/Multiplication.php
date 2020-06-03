<?php
namespace App\Operations;

use Busybrain\Matrix\Basics\Helpers;
use Busybrain\Matrix\Contracts\Operations;
use Busybrain\Matrix\Validation\Validator;
 
 


class Multiplication  extends Helpers implements Operations 
{
	 


	function __construct($matrix,$scalar)
	 {
	 	
	 	$this->matrix = $matrix;
	 	$this->scalar = $scalar;
	  

	 }


	public function handle(Validator $validator)  
	{
		return $this->result();
	}

	public function result()
	{
		//pick a row of the first,pick a col of the second then multiply
		
		$first = $this->matrix[0];
		$second = $this->matrix[1];

		for ($i=0; $i < rowCount($first) ; $i++) { 
			
			$row = pickRow($first,$i);

				for ($j=0; $j < columnCount($second); $j++) { 
					
					//makin it easier to multipy
					 
					$col = pickColumn($second,$j);
				   
					$result[$i][]= array_sum(array_multiply($row,$col)); 

					

				}

				

				
		}

		return $result;
	}

}


