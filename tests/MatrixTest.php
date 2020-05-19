<?php

 
 
use Busybrain\Matrix\Exceptions\BadMethodCallException;
use Busybrain\Matrix\Matrix;
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

	 
	public function testWillThrowExceptionWhenInvalidOperationIsCalled()
	{
		$this->expectException(BadMethodCallException::class);
		$this->matrix->invalidOperation();
	}

	public function  testMakeWorks()
	{
		$matrix = [[1,2,3]];

		$instance = Matrix::make($matrix);

		$this->assertInstanceOf(Matrix::class,$instance);

		$this->assertSame($matrix,$instance->matrix[0]);

		$this->assertCount(1,$instance->matrix);
	}

 

	public function tearDown():void
	{
		$this->matrix = [];
	}
	 
}