<?php

require_once(__DIR__ . "/../vendor/autoload.php");

use App\_13magicMethods\Invoice1;

/* 
    1~ instead of using bunch of properties, you could create a short a properties which is an array
    2# create property array on Invoice1.php and method like the Invoice.php
    3~ testing the Invoice1.php methods
*/
$invoice1 = new Invoice1();

$invoice1->amount = 10;
echo $invoice1->amount . "<br />"; // => 10;

/* 
     ~ the next magic methods: __isset and __unset
     ~ isset gets called when you use isset() or empty() functions on undefined or inaccessible properties and
       this function need to return boolean value
     ~ unset gets called when you use onset() function on undefined or inaccessible properties
    4# create the __isset and __unset method on Invoice1.php
    5~ testing the magic method of __isset and __unset
*/
var_dump(isset($invoice1->result)); echo "<br />"; // because that property doesn't exist => bool(false) 
var_dump(isset($invoice1->amount)); echo "<br />"; // because the property has been initialize => bool(true)

unset($invoice1->amount); 
var_dump(isset($invoice1->amount)); echo "<br />"; // after unset the property => bool(false)
/* 
    ~ the magic method we create so far(__set, __get, __isset, and __unset) won't get called in the context
      of statics, so if you try to that doesn't exist in static way like this:

            App\_13magicMethods\Invoice1::$amount;
    
      php will give you:

            Fatal error: Uncaught Error: Access to undeclared static property 
            App\_13magicMethods\Invoice1::$amount in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/13. magicMethods2.php:33
            Stack trace: #0 {main} thrown in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/13. magicMethods2.php on line 33
    
    ~ the next magic method: __call and __callStatic
    ~ __callStatic gets called whenenver  you call a method statically that doesn't exist
    ~ __call gets called whenever you call a method that doesn't exist
    ~ so if you try to call a method that doesn't exist on an object, something like this:
*/
$invoice1->receipt();
/* 
    ~ you'll get:
            Fatal error: Uncaught Error: Call to undefined method App\_13magicMethods\Invoice1::receipt() 
            in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/13. magicMethods2.php:44 Stack trace: #0 {main} 
            thrown in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/13. magicMethods2.php on line 44
    6# now create the __call magic method on Invoice1.php
    7~ after creating the __call method the code result

                        // => string(7) "receipt" array(0) { } 

     ~ now passing the argument using the method that doesn't exist
*/
$invoice1->receipt(1,2,3,45); // => string(7) "receipt" array(4) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(45) } 
/* 
     ~ this __call magic method doesn't get call whenever a static method calls is made
       so if you try something like this:
*/
App\_13magicMethods\Invoice1::receipt();
/* 
     ~ php will give you :
        
            Fatal error: Uncaught Error: Call to undefined method App\_13magicMethods\Invoice1::receipt()
            in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/13. magicMethods2.php:64 Stack trace: #0 {main}
            thrown in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/13. magicMethods2.php on line 6
     
    8# create magic method __callStatic on Invoice1.php 
    9~ after you creating the __callStatic the code rsult:
                                          // => string(6) "static" string(7) "receipt" array(0) { } 
    ? now how about the function you call is exist
    ~ the __call wouldn't get triggered or if you make a call statically and the method you call statically is exist
      too, the __callStatic wouldn't get triggered too.
    ? how about the function is exist but it's protected/private
    ~ the __call/__callStatic will get triggered

    10# now create a private/protected method that exist on Invoice1.php
      # and update the way __call/__callStatic call
    11~ test the method by calling the process method
*/
$invoice1->process(15, 'Processing Invoice');
/* 
    12~ the result for calling the private/protected method:
                                              => string(7) "process" float(15) string(18) "Processing Invoice" 
      
      ~ the next magic method: __toString()
      ~ __toString() gets called whenever try to interact with the object as string maybe that you try to
        echo the object out / convert the object to a string
    13# create the __toString() on Invoice1.php
    14~ testing the __toString() magic methods
*/
echo $invoice1 . "<br />"; // => Hello from __toString()
var_dump($invoice1 instanceof Stringable); echo "<br />";   // => bool(true)
/* 
      ~ next magic method: __invoke()
      ~ __invoke gets called when you try to call the object directly
              $invoice1();
      ~ php will give you an error if you don't define __invoke magic method 
     15# create __invoke magic method on Invoice1.php
     ~ testing the invoke magic method by call the object directly
*/
if(is_callable($invoice1)) {
  $invoice1(); // => string(7) "invoked" 
}

?>