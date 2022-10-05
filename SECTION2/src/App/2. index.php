<?php

declare(strict_types=1);
/* 
    phpinfo();
    echo "<pre>"; print_r($_SERVER); echo "<pre><br />";
*/

require_once("./3. classAndObject.php");

// $transactions = new Transactions(); => before the __construct function is created
$transactions = new Transactions(10, 'Transaction 1');

var_dump($transactions); /*  => object(Transactions)#1 (0) { }
                             => Data type is object, and instances of Transactions
                             after create the __construct function
                             => object(Transactions)#1 (2) { ["amount"]=> float(10) ["description"]=> string(13) "Transaction 1" 
                             after create the properties to private
                             => object(Transactions)#1 (2) { ["amount":"Transactions":private]=> float(10) ["description":"Transactions":private]=> string(13) "Transaction 1" }   
                         */
echo "<br />";

// after we assign properties on the Transactions class
var_dump($transactions); /*   => object(Transactions)#1 (2) { ["amount"]=> NULL ["description"]=> NULL }
                              => Data type is object, instances of the Transactions, and it has two properties "amount" and "description" 
                              after create the __construct function
                             => object(Transactions)#1 (2) { ["amount"]=> float(10) ["description"]=> string(13) "Transaction 1"
                              after create the properties to private
                             => object(Transactions)#1 (2) { ["amount":"Transactions":private]=> float(10) ["description":"Transactions":private]=> string(13) "Transaction 1" }        
                         */

echo "<br />";
# access the properties / method
/* var_dump($transactions->description); /*  => NULL 
                                          after create the __construct function
                                          => string(13) "Transaction 1" 
                                      */
// after make the description to be private, the reason why ? check the class file

echo "<br />";

/* 
    try to change the properties access modifier to private and access from the outside of the class ?
        Fatal error: Uncaught Error: Cannot access private property Transactions::$description
        in /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/index.php:21 Stack trace: #0 {main} 
        thrown in /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/index.php on line 21
    

*/

# after you give type hinting to description on the transaction class (string $description)
var_dump($transactions); /* => object(Transactions)#1 (0) { ["amount"]=> uninitialized(float) ["description"]=> uninitialized(string) }  
                            after create the __construct function
                            => object(Transactions)#1 (2) { ["amount"]=> float(10) ["description"]=> string(13) "Transaction 1" }
                            after create the properties to private
                             => object(Transactions)#1 (2) { ["amount":"Transactions":private]=> float(10) ["description":"Transactions":private]=> string(13) "Transaction 1" } 
                         */

/* 
    after you give type hinting to description on the transaction class (string $description)
    you can't access the properties before initializations(uninitialized(string) when you var_dump the class), or php will give you:
         Fatal error: Uncaught Error: Typed property Transactions::$description 
         must not be accessed before initialization in /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/index.php:21 Stack trace: #0 {main} 
         thrown in /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/index.php on line 21
    
    i can't access the amount too, right ? is there a mechanism where we assign the value to class properties as it make the value
    as the default value for the properties of the class ?
    + constructor functions => special function or magic method that will be automatically called, whenever new instances of the class is created

*/

# you can change the value of the properties
echo "<br />";
// $transactions->amount = 15; 
/* var_dump($transactions->amount); /* => int(15)
                                    after create __construct function
                                    => float(15)
                                 */
// after make the amount to be private, the reason why ? check the class file

# add tax into the amoount
echo "<br />";
// $transactions->amount = 253; 
$transactions->addTax(8);
// echo $transactions->amount . "<br />"; // => 273.24
// after make the amount to be private, the reason why ? check the class file
echo $transactions->getAmount() . "<br />";

# get discount 10%
$transactions->applyDiscount(10);
// echo $transactions->amount . "<br />"; // => 245.916
// after make the amount to be private, the reason why ? check the class file
echo $transactions->getAmount() . "<br />";

/* 
        $transactions->addTax(8);
        $transactions->applyDiscount(10);
    instead of call this method like this, you can use method chaining :
        $transactions->addTax(8)->applyDiscount(10)->getAmount();
    how to use this ?
    first, you need to make method to return $this value, so if you can see
    after calling method, the method will return $this which is the $transactions itself
    then continue to calling another method.

    NOTE: don't try to make a function that's job to retrieve properties values to return $this,
          it doesn't make sense. so that why the getAmount() is on end of the chaining method

    after you modify the function return values. now you be able to using chaining method
*/
echo $transactions->addTax(8)->applyDiscount(5)->getAmount() . "<br />"; // => 9.97272
// maybe you wanna temporarily class
echo (new Transactions(100,'Temporarily Transactions'))
    ->addTax(10)
    ->applyDiscount(20)
    ->getAmount()
     . "<br />"; // => 88

// it first destruct the temporarely class => Destruct Temporarily Transactions

/* 
    after you create objects, you need to destroy them.
    PHP provided function that destroy the object you created called __destruct.
    __desctruct is the magic method that destroy the object which called automatically
    when the program is ended/returned. 
*/

// it then destruct the transactions1 class => Destruct Transactions 1

// or you can use 'unset' keyword to destruct the object
unset($transactions); // => it will call the __destruct method on $transactions class
/*  
    or you can assign $transactions class to null
        $transactions = null;
*/

/* 
    when to create the desruct function ?
    you create the destruct function when you need to cleaning a resource, release a lock function,
    close open resource from the database connections.

*/

# stdClass => create a generic objects
// let say we have json string to we decode
$str = '{"a":1,"b":2,"c":3}';

# json_decode => decode the string to json like-object
# json_decode($theString, $makeItToAssocArray=false);

echo "<pre>"; print_r(json_decode($str,true)); echo "<pre><br />";
/*  when you assign to true the $makeItToAssocArray
    =>  Array
        (
            [a] => 1
            [b] => 2
            [c] => 3
        )
    
    when you just assign the string 
*/

var_dump(json_decode($str)); echo "<br />";
/* 
    =>  object(stdClass)#1 (3) {
            ["a"]=>
            int(1)
            ["b"]=>
            int(2)
            ["c"]=>
            int(3)
            }
    we get the objects that instances of stdClass, which properties is "a","b","c" and its each of its value
    we can access the properties
*/

$stdClassObj = json_decode($str);
var_dump($stdClassObj->a); echo "<br />"; // => int(1)

# you can make custome object using the stdClass class
$customObject = new stdClass();

# you can only set the public properties, like this
$customObject->a = 10;
$customObject->b = 20;
$customObject->anotherVariable = 20;

var_dump($customObject->anotherVariable); echo "<br />"; // => int(20)
var_dump($customObject); echo "<br />";
/* 
    =>  object(stdClass)#2 (3) {
            ["a"]=>
            int(10)
            ["b"]=>
            int(20)
            ["anotherVariable"]=>
            int(20)
            }
*/

# how about casting something to objects
# array

$arr = [1,2,3,4]; /*
index=> 0,1,2,3
*/

$arrToObj = (object)$arr;
var_dump($arrToObj); echo "<br />";
/* 
    =>  object(stdClass)#3 (4) {
            ["0"]=>
            int(1)
            ["1"]=>
            int(2)
            ["2"]=>
            int(3)
            ["3"]=>
            int(4)
            }
*/

// now you can access them like this
echo $arrToObj->{0} . "<br />"; // => 1
echo $arrToObj->{1} . "<br />"; // => 2
// you don't access the properties that's a number like
//      $arrToObj->0; // error
//      $arrToObj->{3} // ok

# integer
$myInt = 1;
$intToObj = (object)$myInt;

var_dump($intToObj); echo "<br />";
/* 
    =>  object(stdClass)#4 (1) {
            ["scalar"]=>
            int(1)
            }
    every data type unless the null and the array, the properties it has when converted to an object
    has name "scalar"
*/

// and you access them like this:
echo $intToObj->scalar . "<br />"; // => 1

# null
$myNull = null;
$nullToObj = (object)$myNull;
var_dump($nullToObj); echo "<br />"; 
/* 
    =>  object(stdClass)#5 (0) {}
*/

# string
$myStr = "";
$strToObj = (object)$myStr;
var_dump($strToObj); echo "<br />";
/* 
    =>  object(stdClass)#6 (1) {
            ["scalar"]=>
            string(0) ""
            }
*/
?>