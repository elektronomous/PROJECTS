<?php

declare(strict_types=1);
/* Data Types & Type Casting */

// 4 scalar types

# 1) bool => the value could be either true of false
$myBool = true;
$myAnotherBool = false;

echo $myBool . // => 1
" " . $myAnotherBool . "<br />"; // => blank

# 2) int => the whole numeric value without decimal point
$myPrime = 2;
$myAge = 22;
$theHours = 10;
$celcius = -5; // so on

echo $myPrime // => 2 
. " " 
. $myAge // => 22
. " " 
. $theHours // => 10
. " " 
. $celcius // => -5 
. "<br />";

# 3) float => the whole numeric value with the decimal point
$theDistance = 10.5;
$speedoMeter = 55.23;
$theYCoordinate = -2.5;

echo $theDistance // => 10.5
. " " 
. $speedoMeter // => 55.23
. " " 
. $theYCoordinate // => -2.5 
. "<br />";

# 4) string => the whole numbers / characters that enclose with double quote ('') or double double quote("")
$myFirstName = "Faza";
$username = 'elektrone';
$admin = 'admin';

echo $myFirstName // => Faza
. " " 
. $username // => elektrone
. " " 
. $admin // => admin
. "<br />";


/* 
    now you wonder, what's the type of the variable you created ?
        => using gettype($variable) function
        => using var_dump($variable/_expression)
            => var_dump will tell you everything he knows about everything you passed to it
*/

echo gettype($myFirstName) . "<br />"; // => string
echo gettype($theHours) . "<br />"; // => integer
echo gettype($theYCoordinate) . "<br />"; // => double
echo gettype($myBool) . "<br />"; // => boolean

echo var_dump($myFirstName) . "<br />"; // => string(4) "Faza"
echo var_dump($theHours) . "<br />"; // => int(10)
echo var_dump($theYCoordinate) . "<br />"; // => float(-2.5)
echo var_dump($myBool) . "<br />"; // => bool(true)

// 4 compound types

# 5) array => list of variables(items) enclose with square brackets ([]) and these items could be any type of value
$myArray = [1, 2, 3, 4, 5, 1.1, 2.5, -1, -2.5, "Hello", "Faza's here"];

/* 
    when you 'echo $myArray' the compile will give an error
        => instead using echo, we use print_r($array);
        => print_r will display of the list items on the array
        
*/
echo "<pre>"; print_r($myArray); echo "<pre><br />";
/* =>   Array
        (
            [0] => 1
            [1] => 2
            [2] => 3
            [3] => 4
            [4] => 5
            [5] => 1.1
            [6] => 2.5
            [7] => -1
            [8] => -2.5
            [9] => Hello
            [10] => Faza's here
        )
*/

# 6) itterable
# 7) objects
# 8) ---

# type coercion or type juggling
function sum($x, $y) { // $x and $y is dynamically type => you can pass any value there
    return $x + $y;
}

echo sum(2,3) . "<br />"; // => 5
echo sum(2, '10') . "<br />"; // => 5
/* 
    in dynamically type, php will convert as long as the string can be converted to a value.
    if it can't converted, then PHP will throw an error.
*/

function sum1(int $x, int $y) { // $x and $y is int type, so you should pass both int value
    return $x + $y;
}

echo sum1(5,3) . "<br />"; // => 8
/* 
    php will throw an error:
        Argument #2 ($y) must be of type int, string given
    if you call the sum1 like this:
        echo sum1('5', 3);
    why ?
        => because when you declare types, you're disabling the type coercion or type juggling
           so php will not convert it to the int
    but, the dynamically type allowed, how does so ?
        => dynamically type means either you or php can change the value into any type, so type juggling
           or type coercion will still be allowed
*/

# type conversion
$someValue = '5';
var_dump($someValue); echo "<br />"; // => string(1) "5"
$someValue = (int) $someValue; 
var_dump($someValue); echo "<br />"; // => int(5)



?>