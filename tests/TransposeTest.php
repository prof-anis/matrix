<?php
 
use Busybrain\Matrix\Matrix;
use PHPUnit\Framework\TestCase;


class TranposeTest extends TestCase
{
	public function setUp() : void
	{
		$this->matrix = new Matrix;
	}

	/**
	 * [testWillTranposeMatrix description]
	 * @dataProvider  transposeDataProvider 
	 * @return [type] [description]
	 */
	public function  testWillTranposeMatrix($matrix,$result)
	{
		$this->assertSame($result,$this->matrix->set($matrix)->transpose);
	}

	public function transposeDataProvider()
	{
		return [

			[
				[[1,2,3]],[[1],[2],[3]]
			],
			[
				[[1],[2],[3]],[[1,2,3]]
			]
		 
		];
	}

	public function tearDown() :void
	{
		$this->matrix=[];
	}
}