## SIMPLE PHP LIBRARY FOR PLAYING WITH MATRICES

The focus of this project is simplicity, beautiful syntax and speed. It allows you work seemlessly with matrices in php. It comes with a handful of methods that you can use to write your own matrix logics 

##Getting started
You can create an instance of the class using the new keyword and immediately call the set mathod which sets a matrix value into the class ready for manipulation. Each matrix instance must be a multidimensional array.

```
<?php

use Busybrain\Matrix\Matrix;

$matrix = new Matrix;

$matrix->set([
	[1,2,3],
	[5,6,7]
	]);
```

you can as well use the static make method on the matrix class. this recieves a matrix instance as an argument and does exactly the same thing as the previous code retruning an instance of the class created

```
<?php

$matrix  = Matrix::make([
	[1,2,3],
	[5,6,7]
	]);
```
you can also set scalar values for operations that require scalar values using the set scalar method. The library allows chaining methods. 

```
<?php

$matrix->set([
	[1,2,3],
	[5,6,7]
	])->setScalar(2);
```

# identity matrix 
You can create an identity matrix by simply using the identity matrix method in the matrix class

```
<?php

$matrix->identity($row,$col);
```
#conver scalar to matrix
you can convert a scalar to an n by m matrix using the scalarToMatrix method

```
<?php
$matrix->scalarToMatrix($value,$row,$col);

```

#operations
the library currently support the following operations and is still being worked on for others 
1. Addition ----------------------- add
2. subtraction -------------------- subtract
3. Multiplication -----------------multiply
4. Determinant----------------------det
5. Transpose------------------------ transpose

You can use each one by first setting up the matrix with all the parameters needed then calling their endpoint on it. 

```
<?php

//addition

$matrix->set([
	[1,2,3],
	[5,6,7]
	])
		->set([
	[1,2,3],
	[5,6,7]
	])
		->add;

//subtraction

$matrix->set([
	[1,2,3],
	[5,6,7]
	])
		->set([
	[1,2,3],
	[5,6,7]
	])
		->subtract;

//multiplication
$matrix->set([
	[1,2,3],
	[5,6,7]
	])
		->set([
	[1,2,3],
	[5,6,7]
	])->multiply;

//tranpose

$matrix->set([
	[1,2,3],
	[5,6,7]
	])->transpose;

//determinant

$matrix->set([
	[1,2,3],
	[5,6,7]
	])->det;

```
Except for the detrminant where the result is a scalar, other operations gives an instance of the matrix class when the endpoint is called as a method instead of as a property. Hence we can chain multiple operations together. When you call the setScalar method on the addition or subtraction operation, the scalar would be converted to marix and included in the operation

```
<?php


$matrix->set([
	[1,2,3],
	[5,6,7]
		])->set([
		[1,2,3],
		[5,6,7]
		])->add()->transpose; //sums the matrix then transpose the result

$matrix->set([
	[1,2,3],
	[5,6,7]
	])
		->set([
	[1,2,3],
	[5,6,7]
	])
		->add()->transpose()->set([[1,2,3]])->add()->transpose()->det();
		//sums the matrix, takes the transpose of the result , add the new matrix to the result, takes the transpose and calculates the determinant.
```

#Other methods
There are a handful of methods that can give you details about a matrix . You can call them all on the matrix instance. 

```
<?php

$matrix->first() : array //returns the first matrix on the matrix instance 

$matrix->howManyMatrix():int  //returns the number of matrix set on the matrix instance 

$matrix->rowCount(array $matrix) : int //returns the number of rows present on the array

$matrix->columnCount(array $matrix) : int //returns the number of column present on the array

$matrix->pickRow(array $matrix,int $row):array //returns the selcted row

$matrix->pickColumn(array $matrix,$col) : array //returns the selected column

$matrix->lu(array $matrix,int $dimension) : array //returns a multidimensional array of the lower and upper triangular matrix

$matrix->getDetFor2by2(array $matrix) : int //returns the determinant of a 2by 2 matrix

$matrix->rowDel(array $matrix,$row) : array // returns a new matrix with the given row deleted

$matrix->colDel(array $matrix,$col) : array //returns a new matrix with the given column deleted

$matrix->getDetFor3by3(array $matrix) : array //returns the determinant of a 3by3 matrix

$matrix->dimensions(array $matrix) : array //returns an array of [row,column]

 

	  

	  
 



}


?>