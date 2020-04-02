<?php


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