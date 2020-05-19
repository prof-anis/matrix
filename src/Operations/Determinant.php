<?php

namespace Busybrain\Matrix\Operations;

use Busybrain\Matrix\Basics\BasicTrait;
use Busybrain\Matrix\Validator;

 

 


class Determinant
 {
 	use BasicTrait;


	private $scalar = [];

	private $matrix = [];


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

	 	return $this->getDet($matrix);

	 }

	
	 
 
  

 
 

}