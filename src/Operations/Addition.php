<?php
 

namespace Busybrain\Matrix\Operations;

use Busybrain\Matrix\Basics\BasicTrait;
use Busybrain\Matrix\Basics\Helpers;
use Busybrain\Matrix\Builder;
use Busybrain\Matrix\Contracts\Operations;
use Busybrain\Matrix\Validation\Validator;
use Busybrain\Matrix\Validation\Validators\AddValidator;
 
class Addition extends Helpers implements Operations 
{
	
	function __construct($matrix,$scalar)
	{
	 	
	 	$this->matrix = $matrix;
	 	$this->scalar = $scalar;
	  

	 }



	private function add()
	{
		 
		 $counter=0;
		 $main_result[$counter] = [];
		 $row=[];

	

		for ($i=0; $i < $this->rowCount($this->first()) ; $i++) { 
			
			for($k = 0 ; $k < $this->columnCount($this->first());$k++){
			
				for ($j=0; $j < $this->howManyMatrix(); $j++) { 
				
				$row[] = $this->pickRow($this->matrix[$j],$i)[$k];	

				
			}

			 

			

			$result = array_sum($row);

			 
		 	if(count($main_result[$counter]) == $this->columnCount($this->first()))
		 	{
		 		$counter++;
		 	}

			$main_result[$counter][] = $result;
			

			$result=[];
			$row=[];
				
		}



	}
		
		 
 
		$this->result = $main_result;

		return $this->result();

	}

	public function result()
	{

		return $this->result;
	}


	public function handle(Validator $validator) 
	{
		if($validator->validateAdd($this->matrix)){
			if ($this->scalarExists()) {
				
				$this->addScalarToMatrix();
			}
			
			return $this->add();
		}
		 
 
	}
 


	private function scalarExists()
	{
		return (count($this->scalar) > 0);
	}

	private function addScalarToMatrix()
	{
		for($i=0;$i<count($this->scalar);$i++){
			
			$this->matrix[] = Builder::scalarToMatrix($this->scalar[$i],$this->rowCount($this->first()),$this->columnCount($this->first()));
		}

		
	}
}


?>