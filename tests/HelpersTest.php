<?php

use Busybrain\Matrix\Basics\Helpers;
use Busybrain\Matrix\Exceptions\ValidationException;
use PHPUnit\Framework\TestCase;


/**
 * 
 */
class HelpersTest extends TestCase
{
	
	public function setUp() :void
	{
		$this->matrix = [
				[1,2,3],
				[4,5,6],
				[7,8,9]
		];

		$this->instance = new Helpers;
	}


	public function testRowSubtract()
	{
		return $this->assertSame(-4,$this->instance->rowSubtract($this->matrix[0]));
	}

	public function testRowCount()
	{
		return $this->assertSame(3,$this->instance->rowCount($this->matrix));
	}

	public function testColumnCount()
	{
		return $this->assertSame(3,$this->instance->columnCount($this->matrix));
	}

	public function testPickRow()
	{
		$this->assertSame([1,2,3],$this->instance->pickRow($this->matrix,0));
		$this->assertSame([4,5,6],$this->instance->pickRow($this->matrix,1));
		$this->assertSame([7,8,9],$this->instance->pickRow($this->matrix,2));
	}

	public function testSelect()
	{
		for ($i=1; $i <= 3 ; $i++) { 
			for ($j=1; $j <=3 ; $j++) { 
						
				$this->assertSame($this->matrix[$i-1][$j-1],$this->instance->select($this->matrix,$i,$j));
			}
		}


	}

	public function testSelectThrowErrorWithWrongArgument()
	{
		$this->expectException(ValidationException::class);

		$this->instance->select($this->matrix,0,0);
	}

	 

	public function testDimensions()
	{
		$this->assertSame([3,3],$this->instance->dimensions($this->matrix));
	}

	public function testDiagonalProduct()
	{
		$this->assertSame(45,$this->instance->diagonal_product($this->matrix));
	}

	public function testPickColumn()
	{
		$this->assertSame([1,4,7],$this->instance->pickColumn($this->matrix,0));
	}

	public function testRowDel()
	{
		$this->assertSame([[4,5,6],[7,8,9]],$this->instance->rowDel($this->matrix,0));
	}

	public function testCol()
	{
		$this->assertSame([[2,3],[5,6],[8,9]],$this->instance->colDel($this->matrix,0));
	}



	public function tearDown() : void
	{

	}
}


 
 

	

	


	
	
