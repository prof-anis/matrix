<?php

namespace Busybrain\Matrix\Validation;

use Busybrain\Matrix\Exceptions\ValidationException;
use Busybrain\Matrix\Matrix;

trait OperationValidator
{
    /**
     * validates the add operation.
     *
     * @param array $matrices
     *
     * @throws ValidationExcpetion
     *
     * @return bool
     */
    public function validateAdd(array $matrices): bool
    {
        //matrices should have equal dimensions
        $dim = Matrix::make($matrices[0])->dimensions();

        foreach ($matrices as $key => $matrix) {
            if (Matrix::make($matrix)->dimensions() !== $dim) {
                throw new ValidationException('all matrices must have the same dimension when adding');
            }
        }

        return true;
    }

    /**
     * validates the subtraction operation.
     *
     * @param array $matrices
     *
     * @throws ValidationExcpetion
     *
     * @return bool
     */
    public function validateSubtract(array $matrices): bool
    {
        //matrices should have equal dimensions
        $dim = Matrix::make($matrices[0])->dimensions();

        foreach ($matrices as $key => $matrix) {
            if (Matrix::make($matrix)->dimensions() !== $dim) {
                throw new ValidationException('all matrices must have the same dimension when subtracting');
            }
        }

        return true;
    }

    /**
     * validates the determinant operation.
     *
     * @throws ValidationException
     *
     * @return bool
     */
    public function validateDet(array $matrix): bool
    {
        $matrix = Matrix::make($matrix);

        if ($matrix->validate(['square'])) {
            return true;
        }

        throw new ValidationException('the matrix provided is not a square mattrix');
    }

    /**
     * validate the transpose operation.
     *
     * @param array $matrix
     *
     * @return bool
     */
    public function validateTranspose(array $matrix): bool
    {
        return true;
    }

    /**
     * validates the multiply operation.
     *
     * @param array $matrix_1
     * @param array $matrix_2
     *
     * @throws ValidationException
     *
     * @return bool
     */
    public function validateMultiply(array $matrix_1, array $matrix_2): bool
    {
        $matrix_1 = Matrix::make($matrix_1);
        $matrix_2 = Matrix::make($matrix_2);

        if ($matrix_1->rowCount() !== $matrix_2->columnCount() || $matrix_1->columnCount() !== $matrix_2->rowCount()) {
            throw new ValidationException('the row of the first matrix does not mach the column of the second matrix');
        }

        return true;
    }
}
