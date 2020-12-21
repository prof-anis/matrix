<?php

use Busybrain\Matrix\Matrix;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function setUp(): void
    {
        $this->matrix = Matrix::make([[1, 2, 3], [4, 5, 6]]);
    }

    public function tearDown(): void
    {
        $this->matrix = [];
    }

    public function testDimRule()
    {
        $res = $this->matrix->validate(['dim:2,3']);

        $this->assertTrue($res);

        $res = $this->matrix->validate(['dim:3,2']);

        $this->assertFalse($res);
    }

    public function testSquareRule()
    {
        $res = $this->matrix->validate(['square']);

        $this->assertFalse($res);

        $matrix = Matrix::make([[1, 2, 3], [4, 5, 6], [7, 8, 8]]);

        $res = $matrix->validate(['square']);

        $this->assertTrue($res);
    }

    public function testSingularMatrix()
    {
        $matrix = new Matrix();

        $matrix = Matrix::make($matrix->identityMatrix(3, 3));

        $res = $matrix->validate(['singular']);

        $this->assertTrue($res);

        $res = $this->matrix->validate(['singular']);

        $this->assertFalse($res);
    }

    public function testValidateClosureCommand()
    {
        $res = $this->matrix->validate([function ($matrix, $fail) {
            return $matrix->rowCount() === 2;
        }]);

        $this->assertTrue($res);

        $res = $this->matrix->validate([function ($matrix, $fail) {
            return $matrix->rowCount() != 2;
        }]);

        $this->assertFalse($res);
    }
}
