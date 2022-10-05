<?php

// variable that is not defined yet / unset is variable
// that keep NULL value
var_dump($var); // => NULL;
echo "<br />";
var_dump(is_null($var)); // => bool(true);
echo "<br />";



$x = NULL;

echo "the result of NULL value: " . $x . "<br />";
/* 
    blank => why blank ? when you echoing variable it will convert the variable
    to string and when the null convert to string it will empty string

    to check if the variable has null value using method is_null($var);
*/
// prove that it's an emptry string
var_dump((string)$x); // => string(0) ""
echo "<br />";
/* 
    (int) null => 0;
    (string) nul => "";
    (boolean) null => false;
    (array) null = [];
*/

// set the variable
$x = 123;
var_dump($x); // => int(123)
echo "<br />";

// unset the value of the variable $x
unset($x);      // destroy the variable
var_dump($x); // => NULL
/* 
    everytime you unset a value, it will give a NULL value and it's undefined

*/
echo "<br />";
?>