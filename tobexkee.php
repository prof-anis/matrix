<?php
include "vendor/autoload.php";
use Busybrain\Matrix\Matrix;
function dd($val)
{
	print_r($val);
	echo "\n";
	exit;
}

function d($val)
{
	print_r($val);
}
$matrix = new Matrix;
 
 $rr = [[11,2,3,4,52],[65,71,4,9,10],[11,132,13,17,15],[16,170,18,194,20],[21,22,293,24,25]];
 $tt = [[6,3],[9,2]];

 $ert = [[1,2,3],[2,2,1],[7,4,3]];

 $mm = [[1,1,1],[1,1,1],[1,1,1]];
 $op = [[1,2,3],[3,4,3],[5,6,7]];
 


 $A = $matrix->set($op)->det();
 dd($A);