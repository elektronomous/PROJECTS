<?php

/* 
    require_once("./5. namespace/stripe/Transaction.php"); // put the Transaction class into global space
    require_once("./5. namespace/paddle/Transaction.php"); // put the Transaction class into global space
    require_once("./5. namespace/paddle/customerProfile.php");
    require_once("./5. Notification/Email.php");

    when you require_once, the more files you have the more you include/require the files. this is ugly,
    + autoloading got you bro..
    + php have a function called  spl_autoload_register(callable $_fn), where $_fn receive fully classname
      arguments
      + spl_autoload_register automatically load the class, interface, threat that's not already included 
      + when you register autoloader function, they're going to queue the callback functions which is later
        those functions can run by the PHP whenever it encounter an error because the class or anyfiles
        that you need isn't included.

*/

# (1) registering the callback fucntionto autoload the class
// spl_autoload_register(function($fullClassName) {
    
    // we can get the filepath name from the fully qualified namespace by parse the naemspace
    // echo __DIR__ . "<br />"; // => /opt/lampp/htdocs/PROJECTS/SECTION2/src/App
    // $path = __DIR__ . "/../" . str_replace("\\", "/", $fullClassName) . ".php";
    
    /*  because PSR (PHP Standard Recommendation says that autoloader must not throw an exceptions, raise errors, and return a value)
        you need to make sure that's the file is exist
    */
    // if(file_exists($path))
        // require_once($path);

    // var_dump($fullClassName);
    // echo __LINE__ . "<br />";
// });
/* 
    when require_once set your files, this spl_autoload_register doesn't autoloading your class 
    because php know how to load your class using the require_once statements.

    when you:
        echo "<br />";
    outside the spl_autoload_register
    this statement doesn't make new line for your var_dump inside the autoload_register function
    because the callback function is executed later when PHP encounter an ERROR, while this statement
    will executed immediately by PHP.

*/

/* 
# (2) registering the callback function 
        spl_autoload_register(function($_) {
            var_dump("This _callbackFunc is executed second on register");
            echo "<br />";
        }); 

*/


/*  
    the callback functions inside the spl_autoload_register function will executed in how
    order the callback function get registered. but you can register a callback function
    and executed first by the PHP using the argument
        prepend: true; 
    and (2) callback function will be the third


# (3) register the callback function, make php executed first

        spl_autoload_register(function($_){
            var_dump("This _callbackFunc is executed first on register");
            echo "<br />";
        }, prepend: true); 

*/

// use App\_5paymentGateway\Paddle\Transaction;

// $paddleTransaction = new Transaction();

// var_dump($paddleTransaction);
/* 
    when you var_dump $paddleTransaction, where require_once is set your class file, you get:
        object(App\paymentGateway\Paddle\Transaction)#2 (0) { } 
    
    when you commenting out the require_once statements this var_dump will give you :
    !!  Fatal error: Uncaught Error: Class "App\paymentGateway\Paddle\Transaction" not found 
        in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/6. autoloadingAndComposer.php:19 
        Stack trace: #0 {main} thrown in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/6. autoloadingAndComposer.php 
        on line 19
    
    + php doesn't know how to load the class, because require_once is commenting out.
    + before php throwing any errors it loops on any registers autoloader function and runs them
      one by one immediately before showing the error itself.
    
    and your var_dump inside the spl_autoload_register automatically load the class file for you
    that's not already included or undefined. The var_dump inside it will give you:
        string(37) "App\paymentGateway\Paddle\Transaction" 
    
    after we parsing we get the var_dump:
        /opt/lampp/htdocs/PROJECTS/SECTION2/src/App
        string(43) "App\_5paymentGateway\Paddle\CustomerProfile" 30
        object(App\_5paymentGateway\Paddle\CustomerProfile)#3 (0) { }
        object(DateTime)#3 (3) { ["date"]=> string(26) "2022-07-26 01:31:00.279899" ["timezone_type"]=> int(3) ["timezone"]=> string(13) "Europe/Berlin" }
        /opt/lampp/htdocs/PROJECTS/SECTION2/src/App
        string(24) "App\_5Notification\Email" 30
        object(App\_5Notification\Email)#3 (0) { }
        string(3) "foo"
        array(2) { [0]=> string(5) "Hello" [1]=> string(5) "World" }
        object(App\_5paymentGateway\Paddle\Transaction)#2 (0) { } 
    
    
*/

# using COMPOSER
/* 
    composer is the tool for dependency management in PHP
    it allows you install various libraries and packages into your projects.
    it can be help when autoloading 

    after you installing the composer, run on cmd/terminal:
    #   composer require (vendorName/packageName)
    #   example:
        # composer require ramsey/uuid
    
    or you can initialize yourself the configuration file by:
    #   composer init
    and the composer will ask you bunch of question & you fill those out
    
    when the composer is initalized or after you type the require command
    composer will create two files which is the one of them is "composer.lock".
    this file is lock your dependency to a fix state which contains all the depency
    with the exact version. so it lock your project to those version of dependency.
    
    when you type
    #   composer update
    or
    #   composer remove
    the updated file composer.json will (after you modified some version) update the
    depency on the composer.lock too.

    on the vendor directory, you will find the directory on which the depency reside.
    on the vendor directory, go to ramsey(vendorName) and find the "composer.json" file.
    inside the file you'll find:

    "require" => lists dependecies for your productions
    and "require-dev" => lists dependecies for your development.

    the first file on the vendor directory is the autoload.php itself that does
    the autoloading of all the dependecies
        
*/

echo "<br />";

// using composer to load the ramsey/uuid packages
require_once(__DIR__ . "/../vendor/autoload.php");

// $id = new \Ramsey\Uuid\UuidFactory();               // => 65cf1532-ceea-4194-8d20-de1b47ea8067 

// echo $id->uuid4() . "<br />";

/*  now if you uncomment the code below
        use App\_5paymentGateway\Paddle\Transaction;
        $paddleTransaction = new Transaction();
        var_dump($paddleTransaction);
    you will get :
        !!  Fatal error: Uncaught Error: Class "App\_5paymentGateway\Paddle\Transaction" not found 
        in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/6. autoloadingAndComposer.php:172 Stack 
        trace: #0 {main} thrown in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/6. autoloadingAndComposer.php
        on line 172
    autoload only knows how to laod the dependencies from the vendor directory, not on our App directory.
    tell the autoload to autoload our class on the App directory:
        # goto composer.json
        # and add this to below the } (close bracket) on your composer.json file without the remaining text on #:
            ,
            "autoload": {
                "psr-4": {               # we load the class with PHP Standard Recommendation-4 rules
                    "App\\": "App/"      # specify the namespace folder
                }
            }
        # now you can save and then on the vendor directory via the command line, type this command:
            composer dump-autoload
        # now if you wanna know that the namespace App directory is on the vendor, open the vendor directory
          goto the autoload_psr4.php files. at the end of the lines, you'll see that the namespace you've specified
          on the composer.json will include on autoload_psr4.php
        # after that you use the namespace of your own automatically
*/
use App\_5paymentGateway\Paddle\Transaction;
$paddleTransaction = new Transaction();
var_dump($paddleTransaction);

// we don't need the spl_autoload_register function anymore

/* 
    on production you need to load the dependencies as fast as possible right ?
    so when you finish modify the composer.json file that you've included all the namespace
    of your own, you type on the command line:
        composer dump-autoload -o
    to get the optimization so the composer will autoload as fast as possible.
*/

?>