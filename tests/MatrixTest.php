<?php

use App\Matrix;
use PHPUnit\Framework\TestCase;

/**
 * 
 */
class MatrixTest extends TestCase
{
	public function setUp() : void
	{
		$this->matrix = new Matrix;
	}


	public function testSetScalarReturnsInstanceOfClass()
	{
		$this->assertInstanceOf(Matrix::class,$this->matrix->setScalar(9));
	}

	public function testSetReturnsInstanceOfClass()
	{
		$this->assertInstanceOf(Matrix::class,$this->matrix->set([[1,1,1],[1,1,1]]));
	}

	public function testIdentityMatrix()
	{
		$identityMatrix = [[1,1,1],[1,1,1]];

		$this->assertSame($identityMatrix,$this->matrix->identityMatrix(2,3));
	}

	public function testScalarToMatrix()
	{
		$matrix = [[2,2,2],[2,2,2]];

		$this->assertSame($matrix,$this->matrix->scalarToMatrix(2,2,3));
	}

	public function testAddOnlyMatrix()
	{
		$matrix_1 = [[1,2,3],[1,2,3]];
		$matrix_2 = [[1,2,3],[1,2,3]];

		$result = $this->matrix->set($matrix_1)->set($matrix_2)->add();

		$this->assertSame($result,[[2,4,6],[2,4,6]]);
		
	}

	public function tearDown():void
	{
		$this->matrix = [];
	}
	 
}