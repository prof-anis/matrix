<?php

use Busybrain\Matrix\Additionals;
use Busybrain\Matrix\Biller;
use PHPUnit\Framework\TestCase;

class BillerTest extends TestCase
{
	 
	public function testTotal(){

		$biller = new Biller;
		
		$stub = $this->getMockBuilder(Additionals::class)->getMock();
		$stub->expects($this->once())->method('vat')
			->willReturn(5);

		$biller->setVat($stub);


		$this->assertSame(25,$biller->total(2,3));
	}

	public function providerData()
	{
		return [
			[1,2,3,4],6
		];
	}
}