<?php

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