<?php

 
use Busybrain\Matrix\Matrix;
use PHPUnit\Framework\TestCase;


class AditionTest extends TestCase
{


	public function setUp() : void
	{
		$this->matrix = new Matrix;
	}

	/**
	 * [testWillTranposeMatrix description]
	 * @dataProvider  additionDataProvider 
	 * @return [type] [description]
	 */
	public function  testWillAddMatrix($matrix_1,$matrix_2,$result)
	{
		$this->assertSame($result,$this->matrix->set($matrix_1)->set($matrix_2)->add);
	}

	public function additionDataProvider()
	{
		return [

			[
				[
					[1,2,3],
					[1,2,3]
				],
				[
					[1,2,3],
					[1,2,3]
				],[
					[2,4,6],
					[2,4,6]
				]
			]
			 
		 
		];
	}

		public function testAddOnlyMatrix()
	{
		$matrix_1 = [[1,2,3],[1,2,3]];
		$matrix_2 = [[1,2,3],[1,2,3]];

		$result = $this->matrix->set($matrix_1)->set($matrix_2)->add;

		$this->assertSame($result,[[2,4,6],[2,4,6]]);
		
	}

		public function testAddWithScalar()
	{
		$matrix_1 = [[1,2,3],[1,2,3]];
		 

		$result = $this->matrix->set($matrix_1)->setScalar(1)->add;

		$this->assertSame($result,[[2,3,4],[2,3,4]]);
		
	}

	public function tearDown() :void
	{
		$this->matrix=[];
	}
}
