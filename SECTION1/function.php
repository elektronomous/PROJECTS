<?php

// FUNCTIONS => a block of code that can take an input, do some magic and return a value

function _fn() { // foo is the name function, which applies rules like variable names
    // a block of code goes here
    echo "Hello World";
}

// call the function so it executes its block code
_fn(); // => Hello World
echo "<br />";

// or you wanna a function that can return a value
function anotherFn() {
    return "Hello World";
}

// instead just calling now you need to process the returned value by the function
# displaying
echo anotherFn() . "<br />"; // displaying string => Hello World
# assign to a variable
$greeting = anotherFn(); // assign the return value to $greeting

// now you wanna specify the return type of the function, it's called return type hinting
function _function(): int { // this function will return type data int
    return 1;
}

echo _function() . "<br />"; // 1

// when you're not declaring the strict_types to 1, then
function _anotherFunction(): int {
    return '1'; 
}
// this return 1, which php will convert the value
// if you try to convert array, then it will give you an error

// or you wanna return nothing, just return
function _anotherFunctionAgain(): void {
    return;
}
// so the function created like this

// maybe you wonder how to return null, since there's no data type
// representing for the null.
function _otherFunction(): ?int {
    return null;
}
// you just need to type ? in front of the type data
// that you wanna return

// php provided you with optional return type
function _returnIntOrFloat(): int|float { // you can return int or float type
    return 5.0; // or you can return 5
}

function _returnIntFloatOrArray(): int|float|array {
    return [2.3]; // or you can return 5 or 5.3
}

// php 8 has advance feature called mixed, that return any type of data
function _returnAnything(): mixed {
    return 'string'; // return [], float, int value
}
// but you're recommended to not use this mixed keyword, cause its lack
// of consistency.

?>