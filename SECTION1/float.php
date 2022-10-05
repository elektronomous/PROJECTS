<?php

// FLOAT => type of numeric data that has decimal point

$x = 13.5;
echo $x . "<br />"; // => 13.5

$x = 13.5e2; // => multiply by 10 power of 2 = 1350
echo $x . "<br />";

$x = 13.5e-2; // multiply by 10 power of -2 = 0.135
echo $x . "<br />"; // => 0.135

var_dump($x); // float(0.1350000000000000088817841970012523233890533447265625)
echo "<br />";
// get rid of the decimal point & exponential)
var_dump(floor($x)); // float(0);
echo "<br />";

// you must be suprised with this
$x = floor((0.1 + 0.7) * 10);
echo (0.1 + 0.7) * 10 . "<br />"; // expected result =>  8

echo $x . "<br />"; // the actual result =>  7;
/* 
    what in the world that number outcomes to be 7 ? 
    some of the numbers when you do operation on it like addition,
    substraction or so on give the result not exactly like we want,
    because computer can't precisely calculate those number.
    the actual outcomes is 7.999999999999, when you use
    the floor method then it rids those numbers from the
    decimal point.

    more reding => https://floating-point-gui.de/basic/

*/
// try to analyze this operation
var_dump(0.1 + 0.7); echo "<br />"; // => float(0.79999999999999993338661852249060757458209991455078125)
echo floor(7.99) . "<br />";  // => 7
// but when you using a ceil
echo ceil(7.99) . "<br />"; // => 8 and this is you expected


// or this
$x = ceil((0.1 + 0.2) * 10); // expected result => 3;
echo $x . "<br />"; // the actual result => 4;

// how about this ?
$x = ceil((0.1 + 0.4) * 10); // expected result => 5;
echo $x . "<br />"; // the actual result => 5
// those number are of some the numbers that get precisely calculated by the computers

/* so by that, you don't compare the float number directly */
$y = 0.23;
$z = 1 - 0.77;

// loose equality operator
if($y == $z) 
    echo "same"; // expected result
else 
    echo "doesn't same"; // the actual result
echo "<br />";

// how about the strict operator
if($y === $z)
    echo "same"; // expected result
else
    echo "doesn't same"; // the actual result
echo "<br />";

$x = 13_000.10;
echo $x . "<br />"; // => 13000.1

echo NAN . "<br />"; // Not A Number
echo INF . "<br />"; // infinity
echo PHP_FLOAT_MAX * 2 . "<br />"; // => infinity
/* 
    dont compare directly the operation that result infinity with the INF.
    instead using is_infinite() or is_finite() and is_nan() for the result of NAN;
*/

// how about casting? it does the same like integer
$x = "15.5aaa"; 
echo (float)$x . "<br />"; // => 15.5
$x = 15;
echo (float)$x . "<br />"; // => 15
// you can check the var_dump to verified this
echo (float)"asdfafsdafds"; // => 0

?>