<?php

$user_input = "aeioupppaaoouu";

$user_point = 100;

$vowels = 'aeiou';

if (strlen($user_input) < 5 || strlen($user_input) > 31) {
	
	$user_point = 0;
	echo "game over. You had a total of " .$user_point;
	

}

else{

	 if (strpos($user_input,'p')  === false) {
	 	
	 		$user_point = 0;
	echo "game over. You had a total of " .$user_point;
	exit();

	 }
	 else{
	 		$testVariable = $user_input;
	 		$i = 1;
	 		while ($i <= strlen($user_input)) {
	 			
	 			switch ($testVariable) {
	 				case (strpos($testVariable,'a') !== false):
	 					$user_point = $user_point - 10;
	 					
	 					break;
	 				
	 				default:
	 					# code...
	 					break;
	 			}
	 		}
	 }
}



?>