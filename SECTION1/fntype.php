<?php

// global variable
$x = 10;

/* variable function */
function sum(int|float ...$number): int|float {
    return array_sum($number);
}

$toSum = 'sum';

// echo $toSum(1,2,3,4,5);  => 15

// if you dubt the function you assign to $toSum, you can:
if(is_callable($toSum)){
    echo $toSum(1,2,3,4,5) . "<br />"; // => 15
} else
    echo "Not callable</br >";

// quick note => the all php built-in function(like unset, array_sum, print, echo so on) cannot assign directly
//               to a variable, instead you can using wrapper function(a function that wrapp the built-in function)

/* anonymous function */
function (int|float ...$numbers): int|float {
    return array_sum($numbers);
};  // you must end with ; for anonymous function

// also you could assign it to the variable
$toSum = function (int|float ...$numbers): int|float {
    return array_sum($numbers);
};

// then you call it like this:
echo $toSum(1,2,3,4,5) . "<br />"; // => 15

// now how to get access to outer scope with anonymous function
$toSum = function (int|float ...$numbers) use ($x): int|float {
    echo "this is global variabe: " . $x . "<br />"; // => 10;

    /*  you can't modify the real value, because you just copy it..
        now how to modify the value internally ? you pass the reference to use() like this:
            use(&$x);

        now you can modify the global variable
    */
    return array_sum($numbers);
};

echo $toSum(1,2,3,4,5) . "<br />";

// the usefull of anonymous function is when using callback function
// callback function is function that you can pass a function into it
// example

$array = [1,2,3,4,5];

// array map is one of the example callback function
// the 1st way you define anonymous function directly into the argument
$array2 = array_map(function($element) {
    return $element * 2;
}, $array);

echo "<pre>";
print_r($array);
print_r($array2);
echo "</pre>";

/* =>
    Array
    (
        [0] => 1
        [1] => 2
        [2] => 3
        [3] => 4
        [4] => 5
    )
    Array
    (
        [0] => 2
        [1] => 4
        [2] => 6
        [3] => 8
        [4] => 10
    ) 
*/

// the 2nd way you store the function into variable
$arrayFn = function($element) {
    return $element * 2;
};
$array2 = array_map($arrayFn, $array);


echo "<pre>";
print_r($array);
print_r($array2);
echo "</pre>";


/* =>
    Array
    (
        [0] => 1
        [1] => 2
        [2] => 3
        [3] => 4
        [4] => 5
    )
    Array
    (
        [0] => 2
        [1] => 4
        [2] => 6
        [3] => 8
        [4] => 10
    ) 
*/

// the 3rd way to assign a function
function arrayFn($element) {
    return $element * 2;
}

$array2 = array_map('arrayFn', $array);
echo "<pre>";
print_r($array);
print_r($array2);
echo "</pre>";


/* =>
    Array
    (
        [0] => 1
        [1] => 2
        [2] => 3
        [3] => 4
        [4] => 5
    )
    Array
    (
        [0] => 2
        [1] => 4
        [2] => 6
        [3] => 8
        [4] => 10
    ) 
*/

// how to make a function that its parameter accept a function
$sum = function(callable $fn, int|float ...$numbers): int|float {
    return $fn(array_sum($numbers));
};

function foo(int|float $element): int|float {
    return $element * 2;
}

echo $sum('foo', 1,2,3,4) . "<br />"; // => 20

/* arrow function */

// you can use array function as directly passed to the parameter
// so the format of the arrow function is
//      fn($var) => ....
// use 'fn' as the arrow function name, not other than that.
// the arrow function has one expression, that's why you can't create
// or adding the next code
$array2 = array_map(fn($element) => $element * $element, $array);

echo "<pre>";
print_r($array2);
echo "</pre><br />";

?>