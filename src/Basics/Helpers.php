<?php

namespace Busybrain\Matrix\Basics;

use Busybrain\Matrix\Exceptions\ValidationException;

class Helpers
{
    protected $scalar = [];

    protected $matrix = [];

    protected $result;

    protected function first()
    {
        return $this->matrix[0];
    }

    public function howManyMatrix()
    {
        return count($this->matrix);
    }

    public function rowSubtract(array $matrix): int
    {
        $first_element = $matrix[0];

        $diff = $first_element - $matrix[1];

        for ($i = 2; $i < count($matrix); $i++) {
            $diff = $diff - $matrix[$i];
        }

        return $diff;
    }

    public function rowCount($matrix): int
    {
        return count($matrix);
    }

    public function columnCount($matrix): int
    {
        return count($matrix[0]);
    }

    public function pickRow($matrix, $row): array
    {
        return $matrix[$row];
    }

    public function select($matrix, $row, $col)
    {
        if ($row < 1 || $col < 1) {
            throw new ValidationException('invalid argument passed to the select function');
        }

        return $this->pickRow($matrix, ($row - 1))[$col - 1];
    }

    public function pickColumn($matrix, $column): array
    {
        $new_matrix = [];

        foreach ($matrix as $key => $value) {
            $new_matrix[] = $value[$column];
        }

        return $new_matrix;
    }

    public function lu($mat)
    {
        $n = $this->dimensions($mat)[0];

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $lower[$i][$j] = 0;
                $upper[$i][$j] = 0;
            }
        }
        // Decomposing matrix
        // into Upper and Lower
        // triangular matrix
        for ($i = 0; $i < $n; $i++) {

            // Upper Triangular
            for ($k = $i; $k < $n; $k++) {

                // Summation of
                // L(i, j) * U(j, k)
                $sum = 0;
                for ($j = 0; $j < $i; $j++) {
                    $sum += ($lower[$i][$j] *
                             $upper[$j][$k]);
                }

                // Evaluating U(i, k)
                $upper[$i][$k] = $mat[$i][$k] - $sum;
            }

            // Lower Triangular
            for ($k = $i; $k < $n; $k++) {
                if ($i == $k) {
                    $lower[$i][$i] = 1;
                } // Diagonal as 1
                else {

                    // Summation of L(k, j) * U(j, i)
                    $sum = 0;
                    for ($j = 0; $j < $i; $j++) {
                        $sum += ($lower[$k][$j] *
                                 $upper[$j][$i]);
                    }

                    // Evaluating L(k, i)
                    $lower[$k][$i] = (int) (($mat[$k][$i] -
                                    $sum) / $upper[$i][$i]);
                }
            }
        }

        return [$lower, $upper];
    }

    public function rowDel($matrix, $row)
    {
        unset($matrix[$row]);

        $matrix = array_values($matrix);

        return $matrix;
    }

    public function colDel($matrix, $col)
    {
        $mat = transpose($matrix);

        $mat = $this->rowDel($mat, $col);

        return transpose($mat);
    }

    public function diagonal_product($matrix)
    {
        $row = 0;
        $col = 0;
        $element = 1;

        foreach ($matrix as $key => $value) {
            $element *= $this->pickRow($matrix, $row)[$col];
            $row++;
            $col++;
        }

        return $element;
    }

    public function dimensions($matrix)
    {
        return [$this->rowCount($matrix), $this->columnCount($matrix)];
    }
}
