<?php

require_once(__DIR__ . "/../vendor/autoload.php");

use App\_17objectCloningAndCloneMagic\Invoice;
/* 
    1~ we create object like this
*/
$invoice = new Invoice();

/* 
     ~ also we can create object from other object
*/
$invoice2 = new $invoice();

/* 
    ~ and the last is create using the static method
*/

var_dump($invoice); echo "<br />";
var_dump($invoice2); echo "<br />";
var_dump(App\_17objectCloningAndCloneMagic\Invoice::create()); echo "<br />";

/* 
     ~ say on the you line of code you want to copy of the object, so you do this
*/
$invoice2 = $invoice;
/* 
     ~ and you work on the copy of your object, $invoice2.
     ~ but as PHP, when you assign object to other object it doesn't copy the object,
       instead making the object point to the same memory/container with the object it's assigned.
       so $invoice2 is point to the same memory/container with the $invoice, and then whatever you
       done on the $invoice2 will affect the $invoice
     ~ when two objects is compare using the === (strict comparison), it return true only if both
       objects is point to same memory/container.
     ~ when two objects is compare using the == (loose comparison), it return true if the value of
       all properties inside both objects is same.
     ~ so we can prove by using strict comparison that $invoice2 and $invoice are the same    
*/
var_dump($invoice); echo "<br />";  // => this object will be the same with
var_dump($invoice2); echo "<br />"; // => this object, because we assigned using (=) operator.

var_dump($invoice2 === $invoice); echo "<br />";    // => bool(true)
/* 
     ~ you see, the result is true, then you could be incidentally modified the object that's you dont
       want to modify.
     ~ so the solution for this, is using the 'clone' keyword to create a clone/a copy of the object 
*/
$invoice2 = clone $invoice;
/* 
     ~ after you create the copy, you can var_dump them to make sure that they're not point to
       the same memory which indicating us that both of the object are different.
*/
var_dump($invoice); echo "<br />";  // => this object is different with
var_dump($invoice2); echo "<br />"; // => this object, because we clone the object.
/* 
     ~ if you look at the ids of both object, is same but doesn't mean both are the same. when you compare both
       using (==) loose comparison, it will give you true, because it just compare the property not memory.
     ~ but when you compare them using strict comparison(===), you'll get like this:
*/
var_dump($invoice2 === $invoice); echo "<br />";    // both of objects are different so => bool(false)
/* 
     ~ but maybe some of you'll confuse when the object is same in terms of its id. so to create another ID
       PHP has magic method called __clone which gets called whenever object is cloned
     ~ when you cloning an object, the constructor of the cloned object won't get called.
    2# create magic __clone method on Invoice.php on _17objectCloningAndCloneMagic
    3~ without testing, the object you clone on line 49 will give you the answer
*/




?>