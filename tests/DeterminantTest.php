<?php

 
use Busybrain\Matrix\Matrix;
use PHPUnit\Framework\TestCase;



class DeterminantTest extends TestCase
{
	public function setUp() : void
	{
		$this->matrix = new Matrix;
	}

	/**
	 * [testWillTranposeMatrix description]
	 * @dataProvider  determinantDataProvider 
	 * @return [type] [description]
	 */
	public function  testWillFindMatrixDeterminant($matrix,$result)
	{
		$this->assertSame($result,$this->matrix->set($matrix)->det());
	}

	public function determinantDataProvider()
	{
		return [

			[
				[
					[1,2],
					[3,4]
				],
				-2
			],
			[
				[
					[1,2,3],
					[4,5,6],
					[7,8,9]
				],
				0
			]

			
		 
		];
	}

	public function tearDown() :void
	{
		$this->matrix=[];
	}

}

 