<?php

require_once(__DIR__ . "/../vendor/autoload.php");

use App\_7constantProperties\Transaction;


/* 
    1~ constants are mutable, meaning that you cannot change the value once it's defined
    1# goto the directory _7constantProperties

*/

/* 
    2~ access the constant properties of the class Transaction.php with the class name
       followed by the '::'(scope resolution)
     
     ~ class contant properties are allocated once per class and not per instance, which means
       we dont need the instance of the class to access the class constants
    17~
        echo Transaction::STATUS_PAID . " 1<br />"; // => paid 1
*/


/* 
    ? can i access the constant through the object
    ~ access the constant properties of the class Transaction.php with the object name followed
      by the '::'
    
    17~    
        $transaction = new Transaction();
        echo $transaction::STATUS_PAID . " 2<br />"; // => paid 2

*/
$transaction = new Transaction();

/* 
    3# try to change the public access modifier with private so you can see what happens
       when you access the constant outside of the class

    4~ access the private constant properties on the Transaction class:
     ~ we get an error
       !! Fatal error: Uncaught Error: Cannot access private constant 
          App\_7constantProperties\Transaction::PRIV_STATUS_PAID in 
          /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/7. constantProperties.php:41 
          Stack trace: #0 {main} thrown in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/7. constantProperties.php 
          on line 41

   5# comment the error out

*/

/* 
    5~ comment the error out:
        echo $transaction::PRIV_STATUS_PAID . "<br />";

    6# now access the private constant properties inside the class

    7~ class has a magic constant called "class" which resolves at compile time and return the fully
       qualified name
     ~ there are many cases where you could use the constant data

    8# go the cases
*/
echo $transaction::class . "<br />"; // => App\_7constantProperties\Transaction
echo Transaction::class . "<br />"; // => App\_7constantProperties\Transaction

/* 
    8~ say that you have data or information that doesn't change and keep referencing all over the code.
       It's better to move it into a class constant so that way if it ever changes you only change it in one
       place
     ~ or you defined a constant as sort of enumerations.

    9# goto the directory _7constantProperties and look at the method create there 

    10~ using the method created earlier on the #9
*/
$transaction->setStatus('paid');
/* 
    10~ you're hard coding the paid, which the means of the 'paid' itself is so huge. Accidentally, you could make
        a typo, say that you type 'payd' and the method still works. and this is a bug.
      ~ the solution is using the constant

    11# goto the directory _7constantProperties and get the solutions

    15~ using setStatus method to get the invalid status:
      ~ we get an error
    16# comment the error out and its error code :

    16~ the code:
            $transaction->setStatus("asdafsdasdf");
      ~ the error:
        !! Fatal error: Uncaught InvalidArgumentException: Invalid Status in 
        /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_7constantProperties/Transaction.php:86
         Stack trace: #0 /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/7. constantProperties.php(76):
         App\_7constantProperties\Transaction->setStatus('asdafsdasdf') #1 {main} 
         thrown in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_7constantProperties/Transaction.php on line 86
    
    17# make a expressive / readable class function by comment 1~, 3~, 6~, ~11, 14~ first on the class Transaction.php,
        and commenting out the 1~ on this files. then move those properties to the newly class on the _helper directory.
        also change how it access those properties using the new class
*/
var_dump($transaction); /* =>   object(App\_7constantProperties\Transaction)#3 (1) 
                                { ["status":"App\_7constantProperties\Transaction":private]=> string(4) "Paid" } 
                        */
?>