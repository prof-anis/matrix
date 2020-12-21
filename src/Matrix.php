<?php

namespace Busybrain\Matrix;

use Busybrain\Matrix\Basics\Helpers;
use Busybrain\Matrix\Validation\Validator;

class Matrix
{
    /**
     * stores an instance of the register class.
     */
    protected $register;

    /**
     * stores the array arguments.
     *
     *  @var  array
     */
    public $matrix = [];
    /**
     * stores the scalar arguments.
     *
     * @var array
     */
    public $scalar = [];

    /**
     * @var Validator
     */
    protected $validator;

    /**
     * loads the regisetr and helper classes.
     */
    public function __construct()
    {
        $this->register = new Register();
        $this->helper = new Helpers();
        $this->validator = new Validator();
    }

    /**
     * [make description].
     *
     * @param array $matrix [description]
     *
     * @return [type] [description]
     */
    public static function make(array $matrix)
    {
        $instance = new Matrix();

        $instance->set($matrix);

        return $instance;
    }

    /**
     * [setScalar description].
     *
     * @param int $scalar [description]
     */
    public function setScalar(int $scalar): object
    {
        $this->scalar[] = $scalar;

        return $this;
    }

    /**
     * adds a matrix to the stack.
     *
     * @param array $matrix
     *
     * @return self
     */
    public function set(array $matrix): self
    {
        $this->matrix[] = $matrix;

        return $this;
    }

    /**
     * makes i dentity matrux from the rows and column given.
     *
     * @param int $rows    [description]
     * @param int $columns [description]
     *
     * @return array
     */
    public static function identityMatrix($rows, $columns): array
    {
        return Builder::identityMatrix($rows, $columns);
    }

    /**
     * converts a scalar value to a matrix.
     *
     * @param int $scalar
     * @param int $rows
     * @param int $columns
     *
     * @return array
     */
    public function scalarToMatrix($scalar, $rows, $columns): array
    {
        return Builder::scalarToMatrix($scalar, $rows, $columns);
    }

    /**
     * cheks if a matrix is a singular matrix.
     *
     * @param array $matrix
     *
     * @return bool
     */
    public function isSingular(array $matrix): bool
    {
        $matrix = self::make($matrix);

        return $matrix->validate(['singular']);
    }

    /**
     * returns a specific element in the matrix.
     *
     * @param int $row
     * @param int $col
     *
     * @return int
     */
    public function get($row, $col): int
    {
        return $this->first()[$row - 1][$col - 1];
    }

    /**
     * gets the dimension of a matrix.
     *
     * @return array
     */
    public function getDimension(): array
    {
        return $this->dimensions($this->first());
    }

    /**
     * returns a specific element in the matrix.
     *
     * @param int $row
     * @param int $col
     *
     * @return int
     */
    public function select($row, $col): int
    {
        return $this->first()[$row][$col];
    }

    /**
     * validates the matrix against some set of attributes.
     *
     * @param array $rules
     *
     * @return bool
     */
    public function validate(array $rules): bool
    {
        return $this->validator->validate(self::make($this->matrix[0]), $rules);
    }

    /**
     * validates the matrix against some set of attributes and
     * returns error message when failure occurs.
     *
     * @param array $rules
     *
     * @return array
     */
    public function validateWithMessage($rules): array
    {
        return $this->validator->validateWithMessage(self::make($this->matrix[0]), $rules);
    }

    public function __call($function, $argument)
    {
        //check the helper class first. the user might be trying to access matrix properties.all the matrix properties in the helpers class would be made public while the non-propeties i.e functions needed for other computation would be protected

        if (in_array($function, get_class_methods(Helpers::class))) {
            $arg = array_merge([$this->matrix[0]], $argument);

            return $this->helper->$function(...$arg);
        }

        $response = $this->register->makeApi($function, $this);

        if (!$this->register->canNotBeConvertedToMatrix($function)) {
            return self::make($response);
        }

        return $response;
    }

    public function __get($property)
    {
        if ($this->register->canMake($property)) {
            return $this->register->makeApi($property, $this);
        }
    }
}
