<?php

declare(strict_types=1);
/* 
        function _fn(int|float, int|float);
    =>  the parameter expected int or float when argument passed a value

        function _fn(int|float $x, int $y); // => error
        function _fn(int $y, int|float $x); // => ok
    =>  when you have one type after optional paramter(int|float) that doesn't work
        but instead you must have one type parameter before the optional paramter,




*/
function foo(int|float $x, int|float $y) {
    return $x * $y;
}

/* 
        function _fn(int|float $x, int|float $y = 10) 
    when the parameter has value assign to it, that's the default value.
    so you can skip value when passing to it
        _fn(10);
    or you might have another value to replace the default value
        _fn(10, 20); // $y = 20;
*/
function foo1(int|float $x, int|float $y = 10) {
    return $x * $y;
}

/* 
    you can pass argument by reference, so you can modify
    the value you passed to function
*/
function foo2(int|float $x, int|float $y): int|float {
    if($x % 2 === 0)
        $x /= 2;
    
    return $x * $y;
}

$a = 6.0;
$b = 7;

echo foo2($a, $b) . "<br />"; // => 21
var_dump($a, $b); // => float(6) int(7)
echo "<br />";

// now we're going to modify the value of $a and $b
// inside the function so the argument must be passed by reference
function foo3(int|float &$x, int|float $y): int|float {
    if($x % 2 === 0)
        $x /= 2;
    
    return $x * $y;
}

$a = 6.0;
$b = 7;

echo foo3($a, $b) . "<br />"; // => 21
var_dump($a, $b); // => float(3) int(7)
echo "<br />";
// now we've changed the variable inside the foo3() function

// PERIODIC FUNCTION => you can pass argument as many as you like
function sum(...$numbers): int|float { // splat operator(...) => it accept any value, store to the array
    /* 
    $sum = 0;

    foreach($numbers as $number)
        $sum += $number;
    
    // for safety
    unset($number); 
    
    or 

    */

    return array_sum($numbers);
}

echo sum(1,2,3,4,5,6) . "<br />"; // => 21
echo sum(2,3) . "<br />"; // => 5
echo sum(3,5,3) . "<br />"; // => 11

/* 
    you can also define the type of the parameter of the splat operator
        function _fn(int|float ...$number);

    you can declare variables before the splash operator and it doesn't work
    if you declare after.

        function _fn($x, $y, $z, ...$number); // => ok
        function _fn(int $x, int|float $y, ...$number); // => ok
        function _fn(...$number, $x, $y); // => error
        

*/

function sum1(int|float $x, int|float $y, ...$number): int|float {
    return $x + $y + array_sum($number);
}



echo sum1(1,2,3,4,5,6) . "<br />"; // => 21
$myNumbers = [1,2,3,4,5,6];
/* 
    echo sum1($myNumbers);  Fatal error: Uncaught TypeError: sum1(): Argument #1 ($x) 
                            must be of type int|float, array given, called in C:\xampp\htdocs\php\section1\parameter.php
                            on line 112 and defined in C:\xampp\htdocs\php\section1\parameter.php:104 Stack trace: #0 
                            C:\xampp\htdocs\php\section1\parameter.php(112): sum1(Array) #1 
                            {main} thrown in C:\xampp\htdocs\php\section1\parameter.php on line 104
    what should i do ?
*/
echo sum1(...$myNumbers) . "<br />"; // => 21
echo sum1(2,3) . "<br />"; // => 5
echo sum1(3,5,3) . "<br />"; // => 11
echo sum1(3,5,'55') . "<br />"; // => 63
/* 
        echo sum1(3,5,'55'); // => 63
    why this statements work ? because you're not specify the type of the $number
    you should do this:
        function _fn(int|float $x, int|float $y, int|float ...$number);

*/

// NAMED ARGUMENTS => you can pass the argument in any order, without worrying the position of the parameter
function sum2(int|float $x, int|float $y): int|float {
    if($x > $y) return $x / $y;

    return $x;
}

// say that you're passing argument in reverse order on purpose
echo sum2(5,10). "<br />"; // => 5, expeted result is 2 right ?
// so how to overcome this on purpose problem ?
echo sum2(y: 5, x: 10) . "<br />"; // => 2
echo sum2(10, y: 5) . "<br />"; // => 2

// or you have an array with the key
$arraySum2 = ['x' => 10, 'y' => 2];
echo sum2(...$arraySum2) . "<br />"; // => 5
$arraySum2 = [10, 'y' => 2];
echo sum2(...$arraySum2) . "<br />"; // => 5
/* 

    $arraySum2 = [10, 'x' => 2];
    echo sum2(...$arraySum2) . "<br />"; // => 
        Fatal error: Uncaught Error: Named parameter $x overwrites previous argument
        in C:\xampp\htdocs\php\section1\parameter.php:151 Stack trace: #0 {main} thrown 
        in C:\xampp\htdocs\php\section1\parameter.php on line 151

*/


/* 
        setcookie("foo","bar",0,'','',false,true);
    setcookie(string $name, $value='',$expires_or_options='', $path='', $domain='', $secure=false, $httponly=false ) 
    say that you wanna fill the $name, $value, and $httponly, you don't have to pass the argument like the above one.
    instead 
        setcooking(name: "foo", value: "bar", httponly: false); // ok
    because the setcookie has default value for its parameter, it's not problem to skipp the other parameter
*/




?>