<?php

// require | require_once | include | include_once

/* 
    the differences between include and require is that
    when you use include to include a file that doesn't exist
    the next line of your code still get executed. on require
    you can't, php will throw an error and stop the execution.

include 'file.php';
 
 Warning: include(file.php): Failed to open stream: 
 No such file or directory in /opt/lampp/htdocs/PROJECTS/SECTION1/require/require.php on line 12
*/

echo "Hello World <br />"; // this gets executed

/* 
 require 'file.php';

 Warning: require(file.php): Failed to open stream: 
 No such file or directory in /opt/lampp/htdocs/PROJECTS/SECTION1/require/require.php on line 19
*/

echo "using require: <br />";
require 'file.php';
echo "first file: " . ++$x . "<br />"; // => 11

require 'file.php';
echo "second file: " . $x . "<br />"; // => 10
echo "<br />";

/* 
    the code inside file.php is executed twice;
    so require_once/include_once comes in

*/

echo "using require_once: <br />";
require_once 'file.php';
echo "first file: " . ++$x . "<br />"; // => 11
require_once 'file.php';
echo "second file: " . $x . "<br />"; // => 11, the $x doesn't get affected

// you can assign a value to a variable using include/require
$retArray = require /* or include */ 'returnArray.php';
echo "<pre>";print_r($retArray);echo "<pre><br />";

/* 
=>  Array
    (
        [0] => 1
        [1] => 2
        [2] => 3
        [3] => 4
        [4] => 5
    )
*/


// another case using include/require is on the home.php

/* 
    sometimes you need the content of the file as string 

    but if you doing like this:
        $nav = include 'nav.php';
    it will evaluate the value of the include statements
    so:
        var_dump($nav); // => int(1)
    instead doing that, we use ob_start() and ob_get_clean();
*/

ob_start(); // output buffer start.. start waiting for output in the browser
include 'nav.php';
/* 
    Home
    About
    Contact
*/
$nav = ob_get_clean(); // stop the waiting, and get the nav contents
echo $nav . "<br />";
$nav = str_replace("About", "About Us", $nav);
echo $nav . "<br />";



?>
