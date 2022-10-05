<?php

// INTEGER => is a numeric value without any decimal point

// integer is decimal value => or base 10
$x = 10;

// and it present with the decimal value too
echo $x . "<br />";

// you can also define $x as another base
// but will display as integer when you print it

// HEXADECIMAL
$x = 0xb; // prepend with 0x
echo $x . "<br />"; // => 11

// OCTAL
$x = 055; // prepend with 0
echo $x . "<br />"; // => 45

// binary
$x = 0b11; // prepend with 0b
echo $x . "<br />"; // => 3

// so how big the integer ?

// the maximum
echo PHP_INT_MAX . "<br />"; // 64bit => 9223372036854775807
var_dump(PHP_INT_MAX); // => int(9223372036854775807)
echo "<br />";
// the type also changes, from INT to FLOAT


// what happens when the max integer is increase by 1
echo PHP_INT_MAX + 1 . "<br />"; // => 9.2233720368548E+18
var_dump(PHP_INT_MAX + 1); // float(9223372036854775808) 
echo "<br />";
// the type also changes, from INT to FLOAT

// the minimum
echo PHP_INT_MIN . "<br />"; // 64bit => -9223372036854775808
// what happes when the min integer is decrease by 1
echo PHP_INT_MIN - 1 . "<br />"; // => -9.2233720368548E+18
// the type also changes, from INT to FLOAT

// casting to int value
$x = (int) "87"; // => 87
$x = (int) "234l;okasdf"; // => 234
$x = (int) "afsddasfdfas2asfd"; // => 0
$x = (int) null; // => 0;
$x = (int) 5.98; // => 5 get rid of the decimal point
$x = (int) "2_000_000"; // => 2


// now php easiest us to create long number with _
$x = 2_000_000;
echo $x . "<br />"; // => 2000000

?>