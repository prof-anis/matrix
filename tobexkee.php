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
 


 $A = $matrix->set($mm)->setScalar(1)->add()->transpose()->setScalar(1)->add()->transpose()->det();
 dd($A);
?><?php

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

		$padi[] = $value;
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