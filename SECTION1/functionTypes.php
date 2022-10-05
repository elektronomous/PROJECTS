<?php

// variable, anonymous & arrow functions

# variable functions
function sum(...$numbers): int|float {
    return array_sum($numbers);
}

// you call the function using the variable
$toSum = 'sum';
// echo $toSum(10,20) . "<br />"; // this is not recommended, you need to check it first => 30

// check if the function can be call
if(is_callable($toSum)){
    echo $toSum(10, 20) . "<br />"; // => 30
} else
    echo $toSum . "can't be called <br />";

/* 
    what happens here ? $toSum will be evalute, and the next to it is parentheses, so
    php will consider it to be a function.
*/

// variable function not work for the built-in function
// like isset, unset, print, echo and so on..

# anonymous functions => functions that has no name, but you can assign this function to a variable
$sum = function (int|float ...$numbers): int|float { 
    return array_sum($numbers);
};
// anonymous function must end with semicolon(;)

echo $sum(20,30) . "<br />"; // => 50;

// you can pass this function as argument, or return it
// function has local scope, meaning that it can't access the global variable
// in anonymous function, you could access the global variable using a 'use' keyword.
$x = 300;
$sum = function (int|float ...$numbers) use ($x) : int|float {
    echo $x . "<br />"; // => 300
    return array_sum($numbers);
};

echo $sum(40,50) . "<br />"; // => 90

// or you wanna modify the global variable, it same like pass argument by reference
$sum = function(int|float ...$numbers) use (&$x) : int|float {
    $x = 955; // modify the $x global variable => 955
    return array_sum($numbers);
};

echo $sum(30,40,50) . "<br />"; // => 120
echo '$x variable: ' . $x . "<br />"; // => $x variable: 955

# callback functions => example that need callback function is that, array_map
// there are 4 ways to declare callback function

# first using anonymous function
$myArray = Array(1,2,3,4);

$myArray2 = array_map(function($element){
    return $element * 2;
}, $myArray);

echo "<pre>"; print_r($myArray2); echo "<pre><br />";
/* 
=>  Array
    (
        [0] => 2
        [1] => 4
        [2] => 6
        [3] => 8
    )
*/

# second anonymous function that are assigned to a variable
$mulElements = function($el) {
    return $el * 3;
};

$myArray3 = array_map($mulElements, $myArray);

echo "<pre>"; print_r($myArray3); echo "<pre><br />";
/* 
=>  Array
    (
        [0] => 3
        [1] => 6
        [2] => 9
        [3] => 12
    )
*/

# using function names
function mulByFour($el) {
    return $el * 4;
}

$myArray4 = array_map('mulByFour', $myArray);
echo "<pre>"; print_r($myArray4); echo "<pre><br />";
/* 
=>  Array
    (
        [0] => 4
        [1] => 8
        [2] => 12
        [3] => 16
    )
*/

// now maybe you wonder how function pass as the arguments
// function that accept a function as the parameter has type callable
/* 
    callable is instance of closure, which the different is closure must
    be anonymous function, and callable can be a normal function
*/

function _sumUsingCallback(callable $callback, int|float ...$numbers): int|float {
    return $callback(array_sum($numbers));
}

$sum = function($element) {
    return $element * 2;
};

echo _sumUsingCallback($sum, 1,2,3,4) . "<br />"; // => 20

# or pass directly the anonymous function
echo _sumUsingCallback(function($element) {
    return $element * 3;
}, 1,2,3,4) . "<br />"; // => 30


# arrow functions => function anonymous with cleaner syntax
/* 
    the format is like this:
         fn($parameter) => statements.
    the statements is single statements, and that statements must be return a value.
    
    +   without using 'use' keyword to access the global scope, arrow function could access the variable
        outside of its scope.
    +   the global scope variable will bound by value, not by reference so that arrow function couldn't 
        modify the global scope variable.

*/
echo "<pre>"; print_r(array_map(fn($el) => $el * $el, $myArray)); echo "<pre><br />";






?>