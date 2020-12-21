<?php

namespace Busybrain\Matrix;

class Builder
{
    public static function scalarToMatrix($scalar, $rows, $columns)
    {
        $matrix = [];

        for ($i = 0; $i < $rows; $i++) {
            $matrix[] = array_fill(0, $columns, $scalar);
        }

        return $matrix;
    }

    public static function identityMatrix($rows, $columns)
    {
        return Builder::scalarToMatrix(1, $rows, $columns);
    }
}
