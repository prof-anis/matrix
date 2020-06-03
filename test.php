<?php

<<<<<<< HEAD
function dd($val)
{
	print_r($val);
	echo "\n";

	exit(0);
}


$time_start  = microtime(true);

$file = file_get_contents(__DIR__."/tobexkee.php");

$content = explode("\n",$file);

foreach ($content as $key => $value) {
	if ($value != "") {

		$padi[] = $value;   kkk
	}
}
 

 //is trnapose on this line ?
 print_r($padi);
function remove(array $array)
{
	foreach ($array as $key => $value) {
		if ($value != "") {
			$new[] = $value;
		}
	}

	return $new;
}


 foreach ($padi as $key => $line) {
 	 

 	if (strpos($line,"transpose") != false) {
 			
 		 
 		$trace = explode("transpose",$line);

 		$trace = remove($trace);

 		$target = $trace[1];
 		$start=strpos($target,"$");
 		$stop=strpos($target,")") != false ? strpos($target,")")  : strpos($target,";");
 		$char = substr($target,$start,($stop -1));
 		
 		$target=str_replace($char,$char."->transpose()",$target);



 	 

 		$compile = [$trace[0],$target];
 		//dd($compile);
 		$line = implode(" ",$compile);

 	 

 		 

 	 
 			
 	}

 	$new_padi[]=$line;
 }




 $total_time = microtime(true) - $time_start;

//$new_padi = implode(" ",$new_padi);

//dd([$new_padi,$total_time]);

$new_padi = implode("\n",$new_padi);

 
file_put_contents(__DIR__."/tobexkee.php",$new_padi);
 

$output = shell_exec('php tobexkee.php');

dd($output);
=======

require __DIR__."/vendor/autoload.php";

use Busybrain\Matrix;

//create a new instance of the class. 

$matrix = new Matrix;

//your input matrices are multidimensional arrays. 

$first_input = [
				[1,2,3],
				[4,5,6]
			   ];

$second_input = [
				[6,7,3],
				[9,5,6]
			   ];
//to add n matrices , just call the set method n times

var_dump($matrix->set($first_input)->set($second_input)->add());

//it will return a multideimensional array 

//to subtract n matrices , just call the set method and end it with the subtract method

var_dump($matrix->set($first_input)->set($second_input)->subtract());

/*
you can as well create an identity matrix using the identityMatrix method. It takes two arguments, first is the number of rows and the second is the number of columns 
*/
var_dump($matrix->identityMatrix(2,3));

/*you can also create a n by m matrix from a scalar . The first argument is the value in the matrix while the others are the rows and column respectively*/

var_dump($matrix->scalarToMatrix(4,2,3));

/*you can convert a scalar to matrix and add or subtract without first using matrix::scalarToMatrix() method.You can use the setScalar directly. It creates a matrix from the scalar that has the same rows and columns as the other matrices in operation*/ 

var_dump($matrix->set($first_input)->setScalar(5)->add());

/* you can pick a specific column or row from a given matrix*/

var_dump($matrix->pickColumn($first_input,$column_to_pick));

var_dump($matrix->pickRow($first_input,$row_to_pick));

/* you can count the number of rows and column a matrix has */

echo $matrix->rowCount($first_matrix);

echo $matrix->columnCount($first_matrix);
>>>>>>> 8fd2bfc1b4430a63689cd01f22f677234fe0c709
