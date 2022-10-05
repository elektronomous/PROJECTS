<?php

declare(strict_types=1);
/*
    namespace => when you define a function, constant or class without the namespace definition 
    by default the they'll put in global space.

    +   say that you have two class Transactions in different Directory, different operations
        but both have the same name and you include them. 
    
*/

// use paymentGateway\Paddle\Transaction;

require_once(__DIR__ . "/_5paymentGateway/stripe/Transaction.php"); // put the Transaction class into global space
// var_dump(new Transaction()); echo "<br />"; // => object(Transaction)#1 (0) { } 

require_once(__DIR__ . "/_5paymentGateway/paddle/Transaction.php"); // put the Transaction class into global space
# now you have class that both operations are different, but have the same name

require_once(__DIR__ . "/_5paymentGateway/paddle/customerProfile.php");

require_once(__DIR__ . "/_5Notification/Email.php");


/* 
    var_dump(new Transaction()); // => php will give you an error

    !!  Fatal error: Cannot declare class Transaction, because the name is already in use in 
        /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/5. namespace/paddle/Transaction.php 
        on line 5

    now the solution is the namespace itself
    think the namespace => as the virtual directory structure for the classes

    now you can look at the transaction class files and how the namespaces are created


        var_dump(new Transaction()); echo "<br />"; 
    
        !!  Fatal error: Uncaught Error: Class "Transaction" not found in
            /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/5. namespace.php:33 Stack trace: #0 {main} thrown in 
            /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/5. namespace.php 
            on line 33

    php still give you an error, because php trying to var_dump the transaction that's in the global space.
    we've created a namespace so that the Transaction class is no longer in global space anymore.

    you can use a 'use' keyword to use which class with its namespace do you wanna use ? 
        use paymentGateway\Paddle\Transaction;
    php will import the which class do you wanna use 
    
    or you can create like this:
        
*/

var_dump(new App\_5paymentGateway\Paddle\Transaction()); echo "<br />"; /* => object(paymentGateway\Paddle\Transaction)#1 (0) { } 
                                                                     after instances the class with the same namespace
                                                                     => object(paymentGateway\Paddle\customerProfile)#2 (0) { } 
                                                                        object(paymentGateway\Paddle\Transaction)#1 (0) { }
                                                                  */

# it's a standard when you create a namespace like the name of the directory where you working on.

/*  
    INSTANTIATING FROM ANOTHER CLASS THAT'S ON THE SAME NAMESPACE:
    1) first we create the customerProfile.php on paddle directory with the same namespace with the Transaction class
    2) then  we create a constructor function on Transaction php to var_dump this new CustomerProfile object
        
            var_dump(new CustomerProfile());
    
    3) make sure to include the CustomerProfile class
    4) when you delete the namespace on the customerProfile.php on paddle directory, the var_dump(new CustomerProfile())
       inside the Transaction class constructor will give you an error
       
       !!   Fatal error: Uncaught Error: Class "paymentGateway\Paddle\CustomerProfile" not found in 
            /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/5. namespace/paddle/Transaction.php:12 Stack trace: 
            #0 /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/5. namespace.php(55): paymentGateway\Paddle\Transaction->__construct() 
            #1 {main} thrown in /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/5. namespace/paddle/Transaction.php 
            on line 12
    
    5) why is that ? because the CustomerProfile will put by the PHP to global space. php will load the CustomerProfile
       using the current namespace on the Transactions.php which is paymentGate\Paddle. but the CustomerProfile has
       removed the namespace. then it will not found by the PHP and throw a fatal error.

    6) because PHP try to load classes from the current namespace, when you try to access the built-in class PHP
       you need to add a backslash('\') to tell the PHP to load it from the global space or you need to import them.
       # for example there's php built-in class called DateTime(), you put on the Transaction class file
                var_dump(new DateTime());
         php will give you a fatal error:
         !!     Fatal error: Uncaught Error: Class "paymentGateway\Paddle\DateTime" not found in 
                /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/5. namespace/paddle/Transaction.php:13 Stack trace: #0
                /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/5. namespace.php(55): paymentGateway\Paddle\Transaction->__construct() #1 {main} thrown in 
                /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/5. namespace/paddle/Transaction.php on line 13
         + because PHP try to load the DateTime using the Transaction class's current namespace, php will give you an error
           like the above one, because there's no DateTime class file's found. 
         + the solutsion is add the backslash('\');
                var_dump(new \DateTime()); // => object(DateTime)#2 (3) { ["date"]=> string(26) "2022-07-23 07:43:39.868480" ["timezone_type"]=> int(3) ["timezone"]=> string(13) "Europe/Berlin" } object(paymentGateway\Paddle\Transaction)#1 (0) { } 
         + or you can use 'use' keyword:
                use DateTime;
           and on the constructor
                var_dump(new DateTime());
    
    INSTANTIATING FROM ANOTHER CLASS THAT'S ON DIFFERENT NAMESPACE:
    1) first we create a class Email.php on folder called 5. Notification this folder outside the PaymentGateway(5. namespace)
    2) then we create a constructor function on the Transaction php to var_dump this new Email object

            var_dump(new Notification\Email());

    3) make sure to include the Notification/php class
        inside the Transaction class constructor will give you an error:

        !!  Fatal error: Uncaught Error: Class "paymentGateway\Paddle\Notification\Email" not found in 
            /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/5. namespace/paddle/Transaction.php:20 Stack trace: 
            #0 /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/5. namespace.php(55): paymentGateway\Paddle\Transaction->__construct() 
            #1 {main} thrown in /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/5. namespace/paddle/Transaction.php on line 20
    4) why is that ? if you notice that path on Uncaught Error: Class "paymentGateway\Paddle\Notification\Email". PHP trying to
       locate the Email class on paymentGateway\Paddle\Notification\Email, while on the (1) step we create this class outside
       the paymentGateway. that's because we're var_dumping the
            Notification\Email();
       which is the qualified name, not a fully qualified name and the different both of them is that  fully qualified name
       prefixed by backslash("\") which indicate that 
            \Notification\Email();
       this is the full-namespace to that class.
    5) if we use the 
            Notification\Email();
       instead, then PHP expected us to included import statement that use the Notification namespace.
       if it does then
            Notification\Email()
       will work. but as you see on the steps we don't specified to import Notification namespace, so PHP will use the current
       namespace on the Transaction.php(paymentGateway\Paddle) to locate the Notification namespace.  


    NOTE THAT:
    say that you create a function that has the same name with PHP built-in function. 
    (looked at the paymentGateway\Paddle\Transaction.php for the function) in this case explode
    which returned an array by seperating string by a character that you specified
        explode(',','Hello,World'); 
    on the Transaction.php the function will return:
        string(3) "foo" 
    why is that ? PHP will look the local namespace first, then to global namespace. because explode function
    is on the local namespace, that explode function will executed first then PHP built-in function's explode.
    so the solution is adding backslash("\") to the built-in function that you want to use
        \explode(",", "Hello,World"); 
    
    
*/

/* 
    USING ALIAS ON THE NAMESPACE
    instead of doing 
        var_dump(new paymentGateway\Stripe\Transaction()); echo "<br />"
    that's a long name, you can aliasing the namespace with its class
        use paymentGateway\Stripe\Transaction as StripeTransaction;
    
    if you have have two class that has the same name, you can differentiate it with aliasing:
        use App\paymentGateway\Paddle\Transaction as PaddleTransaction;
        use App\paymentGateway\Stripe\Transaction;

        $paddleTransaction = new PaddleTransaction();
        $stripeTransaction = new Transaction();
    
    of if you have a class that a long name, or long namespace:
        use App\paymentGateway\Paddle\Transaction as PTransaction;
    
    if you have classes that's in the same namespace you can import them like this:
        use App\paymentGateway\Paddle;

    or import like this:
        use App\paymentGateway\Paddle\{Transaction, CustomerProfile};
    
    to import all of them, so then we use like this:
        new Paddle\Transaction();
        new Paddle\CustomerProfile();
    
    you can aliasing the namespace only
        use paymentGateway\Paddle as PA;

    then use it like this:
        new PA\Transaction();
        new PA\CustomerProfile();
    
    if there's a included file here that about to use the this namespace
    you must import all namespaces that the included files gonna use.

        include('views/layout.php')
    
    and this layout.php wanna use the namespace that's imported on this file.
    it must be imported as well. the included file can't use the imported namespace
    if it's not imported the namespace too.

*/
use App\_5paymentGateway\Stripe\Transaction as StripeTransaction;
var_dump(new StripeTransaction()); echo "<br />"; // => object(paymentGateway\Stripe\Transaction)#1 (0) { } 


?>