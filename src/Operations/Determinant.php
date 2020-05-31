<?php

namespace Busybrain\Matrix\Operations;

use Busybrain\Matrix\Basics\BasicTrait;
use Busybrain\Matrix\Basics\Helpers;
use Busybrain\Matrix\Matrix;
use Busybrain\Matrix\Validator;

 

 


class Determinant extends Helpers
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
	 	 $matrix = $this->first();

	 	 return $this->resolveDet($matrix);
	 	 

	 }

	 
 
	 public function resolveDet($matrix)
	 {	
	 	
	 	 $dimensions = $this->dimensions($matrix)[0];
         $determinant = 0;

        switch ($dimensions) {
            case 1:
                $determinant = $matrix->get(1, 1);
                break;
            case 2:
                $determinant = $this->select($matrix,1, 1) * $this->select($matrix,2, 2) -
                    $this->select($matrix,1, 2) * $this->select($matrix,2, 1);
                break;
            default:

                for ($i = 1; $i <= $dimensions; ++$i) {
                    $det = select($matrix,1, $i) * $this->getDeterminantSegment($matrix, 0, $i - 1);

                    if (($i % 2) == 0) {
                        $determinant -= $det;
                    } else {
                        $determinant += $det;
                    }
                }
                break;
        }

        return $determinant;
	 }

	 private  function getDeterminantSegment($matrix, $row, $column)
    {
        $tmpMatrix = $this->rowDel($this->colDel($matrix,$column),$row);

      
        return $this->resolveDet($tmpMatrix);
    }

	
	 
 
  

 
 

}