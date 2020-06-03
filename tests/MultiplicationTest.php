<?php

use PHPUnit\Framework\TestCase;


class MultiplicationTest extends TestCase
{
	public function setUp() : void
	{
		$this->matrix = new Matrix;
	}


	public function tearDown() :void
	{
		$this->matrix=[];
	}

	
}