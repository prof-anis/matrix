<?php

use App\Matrix;
use PHPUnit\Framework\TestCase;

/**
 * 
 */
class MatrixTest extends TestCase
{
	/*
	** test add function
	*/

	 

	function testRowCount()
	{
		$matrix = new Matrix;

		$data =  [[2,3,4],[10,9,7]];

		$response = $matrix->rowCount($data);

		$this->assertSame($response,2);
	}

		function testColumnCount()
	{
		$matrix = new Matrix;

		$data =  [[2,3,4],[10,9,7]];

		$response = $matrix->columnCount($data);

		$this->assertSame($response,3);
	}

	function testHowManyMatrix()
	{

		$matrix = new Matrix;

		$matrix_1 = [[2,3,4],[10,9,7]];
		$matrix_2 = [[2,3,4],[10,9,7]];
		$matrix_3 = [[2,3,4],[10,9,7]];

		$how_many =  $matrix->set($matrix_1)->set($matrix_2)->set($matrix_3)->howManyMatrix();

		$this->assertSame($how_many,3);
	}

	
	 
}