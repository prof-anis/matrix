<?php

function dd($value)
{
	var_dump($value);
	exit();
}
include '../vendor/autoload.php';
use App\Matrix;

$test = new Matrix;

$test->set([[1,2,3],[1,2,3]])->set([1,2],[1,2],[1,2]);

