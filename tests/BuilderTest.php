<?php


use Busybrain\Builder;
use PHPUnit\Framework\TestCase;


class BuilderTest extends TestCase
{
	public function setUp() : void
	{
		$this->builder = new Builder;
	}

	 /**
     * @test
     */
	public function createAIdentityMatrix()
	{
		$row = 2;
		$column = 2;
		$output = $this->builder->identityMatrix($row,$column);


		$this->assertSame([[1,1],[1,1]],$output);
	}
}