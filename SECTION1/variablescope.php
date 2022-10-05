<?php

# VARIABLE SCOPE => the boundary where the variable could be access
/* 
    there are 2 variable scope:
        1) GLOBAL SCOPE
        2) LOCAL SCOPE
*/

# GLOBAL SCOPE => avaible globally on this script, even after this file included or require
$x = 5; // GLOBAL SCOPE

echo "locally: {$x} <br />"; // => 5
include 'usingScopeVar.php'; // include this will modify the global $x variable
echo "modified on the included file: {$x} <br />"; // => 10

/* 
    when create a function, the variable inside the function is local scope
    meaning that the function will only lookup or prosess the variable inside
    its function scope. that's why you can't access the outside variable.
    but, you can use global keyword before the name of the variable that's outside
    of a function:
        global $x; // access the outside variable
        
    when using global, you're reference the $x variable so when you modify the variable
    the effect of change is on the reference variable.

    also PHP save the global variable on $GLOBALS array, that the key is that the variable
    name (remember when using variable variable) and the values is the value of the key
        $GLOBALS['x']; // access the global variable that you created
    
    this global array called super global
*/

function printX() {
    global $x; // => access to modified x

    echo $GLOBALS['x'] . "<br />"; // => 10 
    echo $x . "<br />"; // => 10
}

printX();


?>