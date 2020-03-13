<?php

include "../vendor/autoload.php";

use App\Matrix;

$matrix = new Matrix;

$matrix_1 = [[2,3,4],[10,9,7]];
$matrix_2 = [[2,3,4],[10,9,7]];
$matrix_3 = [[2,3,4],[10,9,7]];

return $matrix
		->set($matrix_1)
		->set($matrix_2)
		//->set($matrix_3)
		->add();