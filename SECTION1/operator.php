<?php

// Arithmetic operators(+ - * / % **)
$x = 10;
$y = 2;

// adition
var_dump($x + $y); // => int(12)
echo "<br />";

// substraction
var_dump($x - $y); // => int(8)
echo "<br />";

// multiplication
var_dump($x * $y); // => int(20)
echo "<br />";

// division
var_dump($x / $y); // => int(5)
echo "<br />";
// dont try to divide the variable by zero

/*  var_dump($x / 0); 
    Fatal error: Uncaught DivisionByZeroError: Division by zero in C:\xampp\htdocs\php\section1\operator1.php:23 
    Stack trace: #0 {main} thrown in C:\xampp\htdocs\php\section1\operator1.php on line 23

    so, how to handle this error ?
        var_dump(fdiv($x, 0));
*/ 

// modulo
var_dump($x % $y); // => int(0)
echo "<br />";
// all of the outcomes module 2 operands will be integer
/* 
    $x = 10.25;
    $y = 2.25;

    var_dump($x % $y); // int(0);

    so how to handle this ? 
    you could use the fmod() function
        var_dump(fmod($x, $y)); // float(1.00008);

    $x = 10;
    $y = -3;

    var_dump($x % $y); // int(1)
    
    where is the negative sign ? 
    the negative sign is come from the number that you're dividing
    so in this case 10 is positive. 
*/

// power
var_dump($x ** $y); // => int(100)
echo "<br />";

// you can use the + / - to convert string number to integer/float
$x = "10";
var_dump(+$x); // => int(10)
echo "<br />";

var_dump(-$x); // => int(-10);
echo "<br />";


// Assignment operators(= += -= *= /= %= **=)
$x = 5; // assign 5 => $x
$x = ($y = 10) + 5;

var_dump($x, $y); // => int(15) int(10)
echo "<br />";

// String operators(. .=)

// Comparison operators (== === != <> !== < > <= >= <=> ?? ?:)
$x = 5;
$y = 20;
var_dump($x <=> $y); // => int(-1)
echo "<br />";

$x = 20;
$y = 20;
var_dump($x <=> $y); // => int(0)
echo "<br />";

$x = 30;
$y = 20;
var_dump($x <=> $y); // => int(1)
echo "<br />";

$x = 5;
$y = 20;
var_dump($x <> $y); // => bool(true)
echo "<br />";


$x = 20;
$y = 20;
var_dump($x <> $y); // => bool(false)
echo "<br />";


$x = 30;
$y = 20;
var_dump($x <> $y); // => bool(true)
echo "<br />";



// Error Control operators(@)
/* 

    $f = @file("foo.txt"); // foo.txt doesn't exist
    => when you add the @ sign in front of the files
        you basically remove the error warning
        
    Warning: file(foo.txt): Failed to open stream: 
    No such file or directory in C:\xampp\htdocs\php\section1\operator1.php on line 114
    
*/
 
// Increment/Decrement operators (++, --)

// Logical operators(&& || ! and or xor)

// Bitwise operators(& | ^ ~ << >>)

// Array operators( + == === != <> !==)
$x = ['a', 'b', 'c'];
$y = ['d', 'e', 'f'];

$z = $x + $y;
/* 
    compute the unions of two arrays 
    unions => take the variable $y and append it to the variable $x
    if they don't exist at the same index. index isn't unique though.
    so it will be compute the unions.

    how about the keys? keys are unique if event both arrays have same position
    but had the different keys, then it will be appended

    echo "<pre>"; print_r($z); echo "</pre>";   
        Array
        (
            [0] => a
            [1] => b
            [2] => c
        ) 
*/
$y = ['d', 'e', 'f', 'g', 'h'];
$z = $x + $y;

echo "<pre>"; print_r($z); echo "</pre><br />";   
/* 
    Array
    (
        [0] => a
        [1] => b
        [2] => c
        [3] => g
        [4] => h
    )
*/

$x = ['a' => 1, 'b' => 2];
$y = ['y' => 3, 'z' => 4];

$z = $x + $y;
echo "<pre>"; print_r($z); echo "</pre><br />";
/* 
    Array
    (
        [a] => 1
        [b] => 2
        [y] => 3
        [z] => 4
    )
    
    what if both arrays have the same key ?
    the key that defined first will be overwrite the
    other same key.

*/







// Execution operators (``)

// Type operator (instanceof)

// Nullsafe operator - PHP8(?)


?>