<?php
# STATIC VARIABLE => variable that retains its value, and reset when the program is exit
/* 
    compare this two below function so you see the difference and understand how static 
    does its job


function _getValue() {
    $value = someExpensiveFunction();

    return $value;
}

function someExpensiveFunction() {
    sleep(2);

    return 10;
}

echo _getValue() . "<br />";    // => 10;
echo _getValue() . "<br />";    // => 10;
echo _getValue() . "<br />";    // => 10;

    when you run this function, the function will take 6 seconds 
    before it loads all the php result. now run this below functions
    that its variable using static keyword that marked as the static
    variable .
*/


function _getValue() {
    static $value = null;

    if($value === null) {
        $value = someExpensiveFunction();
    }

    return $value;
}

function someExpensiveFunction() {
    sleep(2);

    return 10;
}

echo _getValue() . "<br />";
echo _getValue() . "<br />";
echo _getValue() . "<br />";

/* 
    when you run _getValue() you just need wait only for 2 seconds.
    but how ? when you run the first _getValue, the $value is assign
    to be 10, because you're calling the someExpensiveFunction. then
    when you run _getvalue the 2nd time, the $value retains its value to 10,
    so then why the 2nd time function called will only return the $value
    instead of calling the someExpensiveFunction again. and that happenned
    on the 3rd call to _getValue
*/



?>
