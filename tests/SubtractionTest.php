<?php

use Busybrain\Matrix\Exceptions\ValidationException;
use Busybrain\Matrix\Matrix;
use PHPUnit\Framework\TestCase;

class SubtractionTest extends TestCase
{
    public function setUp(): void
    {
        $this->matrix = new Matrix();
    }

    /**
     * [testWillTranposeMatrix description].
     *
     * @dataProvider  subtractionDataProvider
     *
     * @return [type] [description]
     */
    public function testWillSubtractMatrix($matrix_1, $matrix_2, $result)
    {
        $this->assertSame($result, $this->matrix->set($matrix_1)->set($matrix_2)->subtract);
    }

    public function subtractionDataProvider()
    {
        return [

            [
                [
                    [1, 20, 3],
                    [1, 2, 31],
                ],
                [
                    [1, 2, 3],
                    [1, 2, 3],
                ], [
                    [0, 18, 0],
                    [0, 0, 28],
                ],
            ],

        ];
    }

    public function testWillThrowExceptionWhenWrongDimensionsAreUsed()
    {
        $this->expectException(ValidationException::class);
        $matrix_1 = [[1, 2], [1, 2]];
        $matrix_2 = [[1, 2, 3], [1, 2, 3]];
        $result = $this->matrix->set($matrix_1)->set($matrix_2)->subtract;
    }

    public function tearDown(): void
    {
        $this->matrix = [];
    }
}
