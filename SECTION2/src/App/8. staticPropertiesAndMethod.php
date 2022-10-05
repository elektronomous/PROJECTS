<?php

require_once(__DIR__ . "/../App/_8staticProperties/Transaction.php");
use App\_8staticProperties\Transaction;
/* 8~ autoloading the helper namespace */
require_once(__DIR__ . "/../App/_helper/DB.php");
use App\_helper\DB;

/* 
    1# add Method and properties to App\_8staticProperties\Transaction

    2~ accessing the static properties on App\_8staticProperties\Transaction
*/
$transaction = new Transaction(25, 'Transaction 1');
var_dump($transaction::$count); echo "<br />"; // => int(0)
/* 
     ~ you dont need the object to access the static method and properties of the class,
       because they're not created or they're not associated per object but they're created
       and are associated on class basis. so they belong to class itself not to any particular
       object or an instance.
     ~ so, you can access the static properties as you can access the constant properties:
*/
var_dump(Transaction::$count); echo "<br />"; // => int(0)

/* 
    ~ you can think the static properties and static method as the global variables in a way
      their values are shared accross the objects because they're not tied to particular
      object or an instance
    ? what is the different static properties and the properties on the constructor protomotion
    ~ every time you create an objects, the value on the properties that's promoted by the constructor
      will different accoss the objects. for the static properties, it's the same accross the objects.
    ~ let me give you a light here:

    3# first put the counter on the constructor function

    4~ create 3 objects, so we can look the different
*/
$transaction2 = new Transaction(2, 'Transaction 2');
var_dump(Transaction::$count); echo "<br />"; // => int(2)

$transaction3 = new Transaction(3, 'Transaction 3');
var_dump(Transaction::$count); echo "<br />"; // => int(3)

$transaction4 = new Transaction(4, 'Transaction 4');
var_dump(Transaction::$count); echo "<br />"; // => int(4)

/* 
     ~ you see, after making 3 objects the static properties itself is increasing meaning
       that the static properties tied to class. not to the instances 
    
    5# now create a static method on the App\_8staticProperties\Transaction

    6~ access the static properties using static method
*/
echo $transaction::getCount() . "<br />"; 
/*   ~ this will be an error:
    !! Fatal error: Uncaught Error: Using $this when not in object context in 
       /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_8staticProperties/Transaction.php:38 
       Stack trace: #0 /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/8. staticPropertiesAndMethod.php(53): 
       App\_8staticProperties\Transaction::getCount() #1 {main} thrown 
       in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_8staticProperties/Transaction.php on line 38
    
    7# go to the App\_8staticProperties\Transaction, commenting out and make a clear explanation

    8~ create 3 instances from the singleton pattern class
*/ 
$db1 = DB::getInstance([]); // => Instance created
$db2 = DB::getInstance([]);
$db3 = DB::getInstance([]);
/* 
     ~ after you create those, you only get one instance from the class db1. after that the instance you trying to build
       on the $db2, and $db3 is same as the instance on the $db1
     9~ you could access the static method using -> but the recommended way is that you're using the scope resolution
        operator
      
*/
?>
