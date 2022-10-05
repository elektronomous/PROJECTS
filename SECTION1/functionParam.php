<?php

// FUNCTION PARAMETERS => function accepting any data via parameter
//                        you're defining the parameter, inside the parentheses of the function definition
function _multiply($x, $y) { // this function has accept any data that accepted via $x and $y
    return $x * $y;
}

echo _multiply(10,20) . "<br />"; // 10 and 20 is arguments, so you pass argument to the function => 200

// as the function could use type hint when return value, the parameter
// also has type hint
function _mul(int $x, int $y) { // accept int data via $x and $y
    return $x * $y;
}

// remember when you're not declare the declare(strict_types=1)
// then the argument you passed to function, if it's not a int type
// then php will convert the value first, then passed to parameters
echo _mul('10',20) . "<br />"; // => 200

// you can also optional when using type hint
function _multi(int|float $x, int|float $y) { // you accepting int or float data type via $x and $y
    return $x * $y;
}
/*  
    make sure that optional type hint that you applies to the parameter, are after the 
    only one type parameter, so if you do this:
        _fn(int|float $x, int $y); // php will give you an error

*/

// when using optional type hint(unary type hint), you're recommended to declare(strict_types=1)
// because it sometimes got tricky, and create a subtle bug when passing arguments

/*  
    when you forget to pass argument:
        _multi(20);
    Fatal error: Uncaught ArgumentCountError: Too few arguments to function _multi(), 
    1 passed in C:\xampp\htdocs\php\section1\functionParam.php on line 40 and exactly 2 expected in 
    C:\xampp\htdocs\php\section1\functionParam.php:23 Stack trace: #0 C:\xampp\htdocs\php\section1\functionParam.php(40): 
    _multi(20) #1 {main} thrown in C:\xampp\htdocs\php\section1\functionParam.php on line 23

    solution => you could set the default value to parameter, and if you set default value to parameter
    the next parameter will must be have default value too.
        function _fn(int $x = 20, int $y){ // this will not work, the $y variable must have default value too
        }
        
*/

function _multiple(int|float $x, int|float $y = 10): int|float {
    return $x * $y;
}

// maybe you forget no, and php will not throwing you an error
echo _multiple(30) . "<br />"; // => 300 

// the argument you pass on the above code is passed argument by value,
// so the function only copy the value. now may be you want to modify the 
// value you passed to a function. that's pass argument by reference, so 
// the function has fully access to the reference variable, then modify them.
function _multipleEvenVal(int|float &$x, int|float $y): int|float {
    if($x % 2 === 0)
        $x /= 2; // modify the reference to $x variable
    return $x * $y;
}

$a = 10;
$b = 2;

echo $a . " " . $b . "<br />"; // => 10 2
echo _multipleEvenVal($a,$b) . "<br />"; // => 10
echo "after modified on the function _multipleEvenVal(): <br />";
echo $a . " " . $b . "<br />"; // => 5 2

// now you feel that you want to pass so many arguments, you dont' want
// to pass 2,3,4,5 and you want it easy as passing one arguments
// PHP have periodic parameter, called splat operator (...$var)
function _sumAnyValue(...$numbers): int|float { // this function accept any data type and make the $numbers as the built-in array
    /* 
        $sum = 0;
        foreach($numbers as $number)
            $sum += $number;
        
        return $sum; 
    */
    return array_sum($numbers);
}

// now you can pass any value you want
echo _sumAnyValue(10,20,30) . "<br />"; // => 60
echo _sumAnyValue(10,20) . "<br />"; // => 30
// may be you have an array
$myArray = array(40,50,70);
echo _sumAnyValue(10,20, ...$myArray /* using splat operator to unpack array */) . "<br />"; // => 190
echo _sumAnyValue(10,20,30,90,290,123,4321,2342,41234) . "<br />"; // => 48460

// you can only define splat operator after fixed number parameter
//  function _fn(int|float $x, int|float $y, ...$var); // OK
//  function _fn(...$var, int|float $x); // PHP THROW ERROR

function _sumAnyVal(int $x, int|float $y, ...$numbers): int|float{
    return $x + $y + array_sum($numbers);
}
echo _sumAnyVal(10,20,30) . "<br />"; // => 60
echo _sumAnyVal(10,20) . "<br />"; // => 30
echo _sumAnyVal(10,20,40,50,70) . "<br />"; // => 190
echo _sumAnyVal(10,20,30,90,290,123,4321,2342,41234) . "<br />"; // => 48460

// in splate operator like this, when you pass argument that is one of
// them is string like this.
echo _sumAnyValue(10,'10','30') . "<br />"; // => 50
// event declare(strict_types=1) have been declare, it allows php to conver the value
// so the solution is using type hint on the periodict parameter
// declare(strict_types=1);
function _sumIntOrFloatVal(int|float ...$numbers): float|int {
    return array_sum($numbers);
} 
echo _sumIntOrFloatVal(10,'10','30') . "<br />"; // => 50
// comment the declare(strict_typs=1) you will get the error 

# named arguments => you can pass arguments in unorder list, but you need to include
// the parameter's name
echo _multiple(y: 20, x:30) . "<br />"; // => 600
// you can't 
//  _multitple(x:20, x:30); // PHP WILL THROWING ERROR

// this named arguments is adventagous when we encounter a function that has
// bunch of parameter but has default value.
/*  setcookie(string $name, $value = "", $expires_or_options = 0, $path = "", $domain = "", $secure = false, $httponly = false)
    @param string $name — The n 
*/

/*  
    say that you wanna pas to $name, $value, and the $httponly, you don't have to pass any value between $value, $httponly:
        setcookie('foo','bar',0,'','',false,true);
    you just need to pass a value with named arguments
 */
setcookie(name:'foo',value:'bar',httponly:true); // you can see the result by pressing F12 => application => storage => cookies

// now you have associative array, when you unpacking that array using splat operator.
// php will threat them as named argument when you pass them as an argument.
// so the key will be the named argument, and the value will be the value for the argument that will be accepted by the parameter
$myAssociativeArray = ['x'=> 20, 'y' => 30]; 
$anotherAssociativeArray = [100, 'y' => 30]; 
// you can't use an array that:
//  $arr = ['y' => 30, 20]
// you replace the y position here
// or
//  $arr = [10,'x' => 20]
// you replace the x position with the second arugment here
echo _multiple(...$myAssociativeArray) . "<br />"; // => 600
echo _multiple(...$anotherAssociativeArray) . "<br />"; // => 3000 
?>