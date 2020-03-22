<?php
namespace App\Operations;

use App\Contracts\Operations;
use App\Traits\BasicTrait;
use App\Builder;
/**
 * 
 */
class Addition implements Operations
{
	use BasicTrait;


	private $scalar = [];

	private $matrix = [];


	 function __construct($matrix)
	 {
	 	$this->matrix = $matrix->matrix;
	 	$this->scalar = $matrix->scalar;

	 	

	 }


	private function add()
	{
		 
		 $counter=0;
		 $main_result[$counter] = [];
		  

	

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

		return true;

	}

	public function result()
	{

		return $this->result;
	}

	public function handle():bool
	{
		if ($this->scalarExists()) {
			
			$this->addScalarToMatrix();
		}

		return $this->add();
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