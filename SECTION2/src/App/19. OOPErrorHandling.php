<?php

require_once(__DIR__ . "/../vendor/autoload.php");

use App\_19OOPErrorHandling\Invoice;
use App\_19OOPErrorHandling\Customer;
use App\_19OOPErrorHandling\MissingBillingInfoException;
/* 
    1~ exception is simply an object of some Exception class that describes
       an error, it distrupts the normal flow of the code execution.
     ~ exception can be thrown manually using the 'throw' keyword.
     ~ you can only thrown exceptions if the instance of the thrown object is 
       either is an Exception class or instance of the Throwable interface 
     ~ say that your Invoice class can't process if the amount was negative, 
       or if the Customer is missing billing information(empty).
    2# create Built-in Exception inside the Invoice.php on _19OOPErrorHandling directory
*/
$invoice = new Invoice(new Customer(/* 6~ 'Customer1' */''));
/* 
    5~ test the InvalidArgumentException by passing negative numbers

        $invoice->process(-25);

     ~ the result we get:

        Fatal error: Uncaught InvalidArgumentException: Invalid Invoice amount in 
        /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_19OOPErrorHandling/Invoice.php:17 
        Stack trace: #0 /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/19. OOPErrorHandling.php(21): 
        App\_19OOPErrorHandling\Invoice->process(-25.0) #1 {main} thrown in 
        /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_19OOPErrorHandling/Invoice.php on line 17

     ~ the code and the error must be commented out, because the code can't executed normally.
     ~ test the our custom Exception 
    6# commenting out the Customer1 string

        $invoice->process(25);
     
     ~ the result we get:

        Fatal error: Uncaught App\_19OOPErrorHandling\MissingBillingInfoException: Missing billing information in
        /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_19OOPErrorHandling/Invoice.php:49 
        Stack trace: #0 /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/19. OOPErrorHandling.php(35): 
        App\_19OOPErrorHandling\Invoice->process(25.0) #1 {main} thrown in 
        /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_19OOPErrorHandling/Invoice.php on line 49
     
     ~ as you see the result is so long and it stop the execution right, that's why we commenting out the
       exception. to make the code continue executing, we use the try catch block on method where there is
       exception within it.
     ~ the try will run the code, and the catch will catch an exception
     ~ the try must have at least one catch block/finally block
     ~ finally always called whether the catch block is caugh exception or not
     ~ the catch block make your code continuely running, unless inside the catch you're throw an exception again.
*/
try {
    $invoice->process(25);
} catch(MissingBillingInfoException $e) {
    /* ~ using the object of MissingBillingInformation object here to getMessage so on */
    echo $e->getMessage() . ' ' . $e->getFile() . ':' . $e->getLine() . '<br />';
    /* 
        => Missing billing information /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_19OOPErrorHandling/Invoice.php:50
    */
}

try {
    $invoice->process(-25);
} catch(\InvalidArgumentException $e) {
    echo $e->getMessage() . ' ' . $e->getFile() . ':' . $e->getLine() . '<br />';
    /* 
        => Invalid Invoice amount /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_19OOPErrorHandling/Invoice.php:17
    */
}
/* 
     ~ when the exception is thrown and there's no catch block the exception will bubble up the call stack to original
       calling function until it finds the matching catch block. if no catch block is found then it will look for the
       global exception handler and if that's not set then it will simply stop exectuion with the fatal error
     ~ you can combine the catch like this
*/
try {
    $invoice->process(-25);
} catch(MissingBillingInfoException $e) {
    /* ~ using the object of MissingBillingInformation object here to getMessage so on */
    echo $e->getMessage() . ' ' . $e->getFile() . ':' . $e->getLine() . '<br />';
} catch(\InvalidArgumentException $e) {
    echo $e->getMessage() . ' ' . $e->getFile() . ':' . $e->getLine() . '<br />';
}
/* 
    ~ the first result here was 
        => Invalid Invoice amount /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_19OOPErrorHandling/Invoice.php:17
    ~ that's because the method of process first throw the InvalidArgumentException
    ~ make the process to be valid argument by passing positive float number, then you get the MissingBillingInfoException
    ~ we created two catch blocks but only one of them will catch exception. even if we have more than two catch blocks,
      only one of them will catch.
    ~ if you throw exception inside the catch block, the other catch will not catch the exception. it will bubble up to call stack,
      so you should using try catch inside the catch that you throw an exception there.
    ~ also you can try the shorter one  
*/
try {
    $invoice->process(-25);
} catch(MissingBillingInfoException|\InvalidArgumentException $e) {
    /* ~ using the object of MissingBillingInformation object here to getMessage so on */
    echo $e->getMessage() . ' ' . $e->getFile() . ':' . $e->getLine() . '<br />';
}
/* 
        => Invalid Invoice amount /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_19OOPErrorHandling/Invoice.php:17

    ~ but because you know that InvalidArgumentException and MIssingBillingInfoException is inherited from the 
      Exception base class you just simply create the try catch block like this
    ~ you also want to excecute some code regardless of the try catch an exception or not, we added a finaly
      which run whether the exception is catch or not.
*/
try {
    $invoice->process(25);
} catch(\Exception $e) {
    /* ~ using the object of MissingBillingInformation object here to getMessage so on */
    echo $e->getMessage() . ' ' . $e->getFile() . ':' . $e->getLine() . '<br />';
} finally {
    echo 'Finally block is reach <br />';
}
/* 
        => Missing billing information /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_19OOPErrorHandling/Invoice.php:50
        => Finally block is reach
    ~ if you have return statement whithin the try catch block then it will return the value after the finally
      block gets executed.
    ~ if you have return statement in both the catch block and finally block, then both of return statement gets
      executed but the value returned is from the finally block 
*/


function process() {
    $invoice = new Invoice(new Customer('Customer1'));
    try {
        $invoice->process(25);
        return true;
    } catch(\Exception $e) {
        echo $e->getMessage() . ' ' . $e->getFile() . ':' . $e->getLine() . '<br />';
    } finally {
        echo 'Finally block is reach <br />';
    }
}

var_dump(process()); echo "<br />";   // the try return value is => bool(true) 

function process1() {
    $invoice = new Invoice(new Customer(''));
    try {
        $invoice->process(25);
        return true;
    } catch(\Exception $e) {
        echo $e->getMessage() . ' ' . $e->getFile() . ':' . $e->getLine() . '<br />';
        return false;
    } finally {
        echo 'Finally block is reach <br />';
    }
}

var_dump(process1()); echo "<br />"; // the catch return value is => bool(false) 

function foo(): string {
    echo 'hello foo';
    return '';
}

function process3() {
    $invoice = new Invoice(new Customer(''));
    try {
        $invoice->process(25);
        return true;
    } catch(\Exception $e) {
        echo $e->getMessage() . ' ' . $e->getFile() . ':' . $e->getLine() . '<br />';
        return foo();       // hello foo
    } finally {
        echo 'Finally block is reach <br />';
        return -1;
    }
}

var_dump(process3()); echo "<br />"; // the finally return value is => int(-1) 
/* 
    ~ foo() prove that all the return try catch block statement will executed
    ~ GLOBAL EXCEPTION HANDLER -> you can register global exception handler by using 
      set_exception_handler() which take a function name as a callback or a closure as
      an argument 
      ~ the callback takes a Throwable interface object as an argument.
      ? why Throwable ? not Exceptions, because both regular Exception and Error Exception implement thtat interface
    ~ we have two types of Exceptions which a regular exception that can be user defined or built in PHP exception
      and we have Error Exception 
*/
set_exception_handler(function(\Throwable $e){
    var_dump($e->getMessage());
});


echo array_rand([],1); 
/* 
        => string(50) "array_rand(): Argument #1 ($array) cannot be empty
    ~ the result above is catch by the set_exception_handler
*/

?>