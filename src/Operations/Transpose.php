<?php

namespace Busybrain\Matrix\Operations;

use Busybrain\Matrix\Basics\Helpers;
use Busybrain\Matrix\Contracts\Operations;
use Busybrain\Matrix\Validation\Validator;

class Transpose extends Helpers implements Operations
{
    public function __construct($matrix, $scalar)
    {
        $this->matrix = $matrix;
        $this->scalar = $scalar;
    }

    public function handle(Validator $validate)
    {
        if ($validate->validateTranspose($this->first())) {
            return $this->result();
        }
    }

    public function result()
    {
        $matrix = $this->first();

        for ($i = 0; $i < $this->columnCount($matrix); $i++) {
            for ($j = 0; $j < $this->rowCount($matrix); $j++) {
                $elements[] = $this->pickRow($matrix, $j)[$i];
            }

            $transpose[] = $elements;
            $elements = [];
        }

        return $transpose;
    }
}
