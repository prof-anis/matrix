<?php

namespace Busybrain\Matrix\Validation;

use Busybrain\Matrix\Matrix;

trait ValidationAttributes
{

	/**
	 * validates matrix dimension matches the col and row supplied
	 * @param Matrix
	 * @return  bool 
	 */
	
	public function ValidateDim(Matrix $matrix,$row,$col = null) : bool
	{	
		 
		//$row and $col can be an integer or *, * means i dont care
 
		//check if col option was passed
		$row = ($row != '*') ? $matrix->rowCount() === (int)$row : $matrix->rowCount() > 0;

		$col = (!is_null($col)) ? (($col != '*') ? $matrix->columnCount() === (int)$col : $matrix->columnCount() > 0) : true;

		return $row && $col;

	}

	/**
	 * validates matrix is square matrix
	 * @param Matrix
	 * @return  bool 
	 */
	
	public function ValidateSquare(Matrix $matrix) : bool
	{
		return $matrix->rowCount() === $matrix->columnCount();
	}

	/**
	 * validates matrix is singular
	 * @param Matrix
	 * @return  bool 
	 */
	public function ValidateSingular(Matrix $matrix) : bool
	{
		return $matrix->det === 0;
	}
}