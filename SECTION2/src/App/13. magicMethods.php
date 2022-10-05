<?php

require_once(__DIR__ . "/../vendor/autoload.php");

/* 
    1~ magic methods are special methods which override PHP's default action behaviour when certain
       event / action is performed.
     ~ there are 17 magic methods and they're begin with double underscore("__")
     ~ you dont recommended to create function begin with ("__") unless you want to override php's
       magic methods 
    2# create a directory and put a new class name Invoice.php and go back this file 
    3~ begin with __get and __set magic methods:
       ~ __get gets called whenever you try to access a non-existing or inaccessible property on an object
       ~ __set gets called whenever you try to assign a value to an undefined/inaccessible property 
    4# create Invoice.php object and access its property that doesn't exist
*/

use App\_13magicMethods\Invoice;

$invoice = new Invoice(/* 14~ pass the value to the constructor */ 10);
/* 14~ echo the private method */
echo $invoice->amount . "<br />";   // => 15
/* 14~ if you notice right here, you could access the private method via __get magic method right,
     ~ but you can't modify it. you only access it. 
     ? can i modify the value
     ~ yes you can, with the __set magic method, you can set any properties that has any access modifier.
       You change the code inside the __set magic method like we update on __get method, but the different
       you're set the a value into __set method.
            property_exists($this, $name)
              $this->$name = $value;
     
     ~ we make the class for encapsulation right ? and now you know that this is not recommended since __set
       will break the private property values
     ~ continue to 13. magicMethods2.php

*/

$invoice->amount;           /* =>  Warning: Undefined property: App\_13magicMethods\Invoice::$amount
                                   in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/13. magicMethods.php on
                                   line 21

     ~ we can automatically create a magic method __get to handle this the warning
    5# create a __get magic method on Invoice.php
    6~ after you create the magic method the result will be:
                               =>  string(6) "amount"
     
     ~ the same applies when assigning the value to a property that doesn't exist/is inaccessible
    7# set the value for amount(property that doesn't exist) to Invoice object.
*/
$invoice->amount = 15;
echo $invoice->amount . "<br />"; /*    => 15
     ~ php dynamically creating the properties when you set a value to property that doesn't exist
       that's why when you echo out the result will the value that you've assigned.
     ~ but you can customize the PHP dynamiccaly behaviour when you set property that doesn't exist
       using the __set magic methods.
    8# set __set magic method on Invoice.php
    9~ after you create the __set magic method on Invoice.php, the result when you set the value will
          $invoice->amount = 15;            // => string(6) "amount" int(15)
          echo $invoice->amount . "<br />"; // =>  string(6) "amount"

     ? now what happens when we have $amount properties inside the Invoice.php
    10# create $amount property inside the Invoice.php
    11~ when you run the code after you create the property, none of the __set and __get method will automatically
        be called because the property of $amount is exist
    12# now, comment out the public access modifier of $amount, then make the $amount to be private/protected
    13~ when you access/set a value of for $amount, it will called the __set and __get method again
      ~ one of the use of __get method is that provide the read-only access to private and protected properties
    14# update the function of the __get method and comment out the var_dump();
      # create __constructor on Invoice.php and update the code where you instance an object from Invoice.php
      # create echo out the $invoice->amount after the line where you've create the $invoice object
*/

?> 