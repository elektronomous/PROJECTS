<?php

// BOOLEANS => representing the truth values, it could be false or true.

/* boolean is mostly use as the constrol structures programming
    and looping control. the example is using for-loop, while-loop, foreach loop
    and if-else
*/

$isCompleted = true; // or you can assigned TRUE

if($isCompleted) { // if the variable true 
    // then take control the program to here
    echo "SUCCESS " . $isCompleted . "<br />";
} else {
    // or take control the program to here
    echo "FAILED " . $isCompleted . "<br />";
}

// how php evalute false value
// integers => 0 / -0 will always consider to be => false
// floats => 0.0 / -0.0 will always consider to be => false
// string => "" will always consider to be => false
// string => "0" will always consider to be => false
// array => [] will always consider to be => false
// special value => null will always consider to be => false


/* 
    so why php printing blank when printing false value,
    and printing 1 when the value is true ?
    => try to casting the false value to string, then it will
        be blank, and casting the true value to string will result
        1   

*/

$isCompleted = (string) true;
echo $isCompleted . "<br />"; // => 1
$isCompleted = (string) false;
echo $isCompleted . "<br />"; // => blank

$isCompleted = true;
var_dump(is_bool($isCompleted)); 
echo "<br />";
echo $isCompleted . "<br />";                                                                                                                         


?>