<?php

require_once(__DIR__ . "/../vendor/autoload.php");
use App\_9encapsulationAndAbstraction\Transaction;

/* 
    1? what is encapsulation ?
     ~ encapsulation bundles the data and methods that operate on that data
       within one unit like a class for example, 
     ~ it hides the internal representation or the state of the object which
       protects the integrity of that object
     ~ it ensures that your object manages its own state and nothing can change that 
       unless it's explicity allowed 
    2# goto the App\_9encapsulationAndAbstraction\Transcation to read some definitions

    3~ Accessing the private property using the php reflection api 
     ~ reflection api just adds the ability introspect your class 
            new ReflectionProperty($fullyQualifiedNameClass, $property_name);
*/

$transaction = new Transaction(100);
echo $transaction->getValue() . "<br />"; // => 100;

$reflectionProperty = new ReflectionProperty(Transaction::class, 'private_amount');
/*   ~ and you set the accessible to true  */
$reflectionProperty->setAccessible(true);
/*   
    ~ and you can access and modify the properties now 
    ~ change the 100 value to 250
*/
$reflectionProperty->setValue($transaction, 250);
/*  ~ get the value again, so we know that the properties has changed */
echo $reflectionProperty->getValue($transaction) . "<br />"; // => 250 
echo $transaction->public_amount . "<br />"; // proof that the private property on reflectionProperty is change => 100

var_dump($reflectionProperty); echo "<br />";
/* 
    => object(ReflectionProperty)#3 (2) { ["name"]=> string(14) "private_amount" ["class"]=> string(45) "App\_9encapsulationAndAbstraction\Transaction" }

    4? what is abstraction?
     ~ Abstraction means that internal implementations(method) details of an object are hidden from the user.
     ~ you expected result, and just dont care about how it works, for example: 
*/
$transaction->process(); // => process $100 transaction
/* 
     ~ sometime, we dont care about how the process works. we care about we process the transaction
       and we need only the result from the method
     ~ so what the difference between the encapsualtion and abstraction ?
       ~ encapsulation => hides the internal state or the information while the
       ~ abstraction => hides the actual implementations
    5~ object of the same type can actually access each others private and protected properties and method
     ~ for example:
       6# goto the App\_9encapsulationAndAbstraction\Transaction to see how the two object can access properties
          method of each other
    7~ calling the copyFrom method
*/
$transaction->copyFrom(new Transaction(19234));

?>