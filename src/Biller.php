<?php
namespace Busybrain\Matrix;

use Busybrain\Matrix\Additionals;
/**
 * 
 */
class Biller
{
	
	 public function total()
	 {
	 	$total = func_get_args();
	 	
	 	$total =  array_sum($total) * $this->vat();

	 	return $total;
	 }

	 public function vat()
	 {
	 	return $this->vat;
	 }

	 public function setVat(Additionals $vat)
	 {
	 	return $this->vat = $vat->vat();
	 }

 
}