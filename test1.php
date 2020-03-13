<?php


$card_arrangement_1 = [[1 ,2, 3, 4],
					 [5, 6, 7, 8],
					 [9, 10, 11, 12],
					 [13, 14, 15, 16]
					];
$card_arrangement_2 = [[1, 2, 5, 4],
						[3, 11, 6, 15],
						[9, 10, 7, 12,],
						[13, 14, 8, 16]
						];

$first_row_selected = 2;

$second_row_selected = 3;

function get($card_arrangement_1,$card_arrangement_2,$first_row_selected,$second_row_selected){

	$counter = 0;
	
	$first_row = $card_arrangement_1[$first_row_selected-1];

	$second_row = $card_arrangement_2[$second_row_selected-1];

	  


	for ($i=0; $i < count($first_row) ; $i++) { 
		
		if (in_array($first_row[$i], $second_row)) {
			
			$counter++;
			$result = $first_row[$i];
		}

	}

	if ($counter > 1) {
		
		return "bad magician";
	}
	if ($counter == 0) {
		
		return "volunteer cheated!";
	}

	return $result;
}

echo get($card_arrangement_1,$card_arrangement_2,$first_row_selected,$second_row_selected);





?>