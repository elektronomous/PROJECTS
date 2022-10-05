<?php

// RETURN => return statements can be used to return the control program execution
//           back to environment it was called from. when using return in a function
//           the program execution on that function will stop, and the code will continue
//           run on the enviroment it wass called from.
function sum(int $x, int $y) {
    return $x + $y; // stop this function execution and return the $x + $y 
    echo "Hello";   // this code will not get executed
}


$z = sum(10,20);    // call the function and get the sum of 10 and 20
                    // after return, the code from here to below thsi code
                    // will get executed
echo $z . "<br />"; // => 30


?>