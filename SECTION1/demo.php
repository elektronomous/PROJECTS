<?php

/* what is the difference between print & echo ? 
    print will return 1 and echo doesn't do anything
    so :
        print("hello") => return 1;
        echo "hello" => doesn't return anything

        echo is faster than print, so will make echo for
        the whold program
*/

print("Hello World <br />"); // return 1;
echo("Hello World <br />");

// VARIABLE
$name = "Anggun Fuji Lestari"; // string type
$name2 = "Muhammad Faza Akbar"; // string type
$number = 10;                   // integer type
$floatNumber = 20.555;          // floating point number

// you can print the variable then
echo $name . "<br />"; // the dot is to concatenate the string
echo $name2, " ", $name . "<br />"; // the comma is to concatenate 
                                    // the string you could also combine it with the dot
echo "hello $name<br />";

// you concatenate the string when you using print function
print("Hello {$name2} <br />"); // you can insert like that, but you must use the " double quote, not '


// CONSTANTS
define("STATUS_PAID", "PAID");

// check if variable is constant
echo defined("STATUS_PAID") . "<br />"; // print => 1
echo defined("STATUS_VOID") . "<br />"; // print nothing, because it isn't defined

$PAID = "PAID";

// or you can concatenate the string of the CONSTANT name
define("STTS_" . $PAID, $PAID);

// you don't do this : echo $STATUS_PAID constant doesn't need the $ sign
echo STATUS_PAID . "<br />";
// echo STTS_PAID; => the interpreter will warn use, but it can still be printed

// another way to define CONSTANT is using const keyword
const status_paid = "PAID";

/* what is the difference between using define and const ?
    the const define at the compile time, while the constant
    with the "define" keyword define at the runtime
*/

// SOME PRE-DEFINED CONSTANTS
echo "this is dir: " . __DIR__ . "<br />";      // show the directory that you're currently working on
echo "this is file: " . __FILE__ . "<br />";    // show the file that you're currently working on
echo "this is the line: " . __LINE__ . "<br />"; // show this line => 58

// Variable Variables => php takes the value of the variable and formed it to be variable
$foo = "bar"; // assigned this value to $foo
$$foo = "baz"; // make "bar" as the variable => $bar = "baz";

echo $foo, " ", $bar . "<br />"; // => bar baz
echo $foo, " ", $$foo . "<br />"; // => bar baz 
echo "$foo $$foo <br />"; // => bar $foo
echo "$foo ${$foo} <br />"; // => bar baz
echo "$foo {$$foo} <br />"; // => bar baz

// PHP DATA TYPES & TYPES CASTING

# 1 Scalar Types
    # bool - true / false
    $completed = true;

    # int - 1,2,3,0, -1, -5 , -100 (so on, with no decimal point)
    $score = 75;

    # float - 1.5, 0.02, 0.003, -15.23 (so on)
    $price = 0.99;

    # string - "Faza", "Anggun", "Hello World"
    $greeting = "Hello Faza";

echo $completed . "<br />"; // printing 1 when true, printing blank when false
echo $score . "<br />";
echo $price . "<br />";
echo $greeting . "<br />";

// if you wanna know the type of the variable
echo gettype($completed) . "<br />"; // => boolean
echo gettype($score) . "<br />"; // => integer
echo gettype($price) . "<br />"; // => double which same like float
echo gettype($greeting) . "<br />"; // => string
// or you wanna know the type and its value
var_dump($completed); // => bool(true)
var_dump($score); // => int(75)
var_dump($price); // => float(0.9899999999999999911182158029987476766109466552734375)
var_dump($greeting); // => string(10) "Hello Faza" 
echo "<br />";

# 2 Compound Types
    # array
    $companies = [1, 2, 3, 4.5, -9.12, 'A', 'b', true];
    echo $companies . "<br />"; // => Array
    // you want to read the information of the variable that's compound type
    print_r($companies);
    echo "<br />";

    # object
    # callable
    # iterable

# casting a value
$x = "5";
var_dump($x);   // => string(1) "5
var_dump(+$x); // you can convert the string to this => int(5)
echo "<br />";

$x = (int) "5"; // casting here..
var_dump($x); // => int(5)
echo "<br />";





?>