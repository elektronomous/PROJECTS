<?php
namespace App\_8staticProperties;
require_once(__DIR__ . "/../../vendor/autoload.php");
use App\_helper\DB;

class Transaction{
    /* 
        1~ adding a method and properties to this class
         ~ you can define your properties and methods to be static using the static
           keyword
         ~ you could also put the static keyword before the access modifier
                static public int $count = 0;
           but the standard form is:
                
    */
    public static int $count = 0;
    /* 
        ~ you could access the static properties as you access the constants using
          the scope resolution operator(::)
        
        2# access the static properties on the staticPropertiesAndMethod.php
    */

    public function __construct(
        public float $amount,
        public string $description)
    {
        /* 3~ defining the counter on this function */
        self::$count++;
        /* 4# create 3 objects, so you can look the different of this count */

    }
    /* 5~ create a static method that get the $count value */
    public static function getCount(): int {
        /* 
            ~ because the static properties doesn't belong to the objects, or instances
            but tied to the "CLASS", the variable $this is not available within the static
            method. now if you do some thing like this:
            7~ commenting out the code 
                    echo $this->amount;
             ~ the error you got on the staticPropertiesAndMethod is because you're using $this
               variable which doesn't exist on the static method. the $this variable is refers to the
               calling object. because the static properties is tied to the class not to the object, it will
               give you an error.
             ~ also if you use scope resolution operator(::) on the non-static properties/static method, 
               you will get the error
             ? what is the use case for this static properties and method
             ~ it's use for caching a value, or a tracking something with counter, so it can implementing a
               technique called memoization which can be speed up expensive operations by caching the results
               for later access. 
               ~ it also could be implement singleton pattern which is maintains a single instance
                 of a given class throughout your app execution.
               ~ create some kind of utility method that don't really need instance of the class
               ~ 
            
            8# lets create a simple example of singleton pattern, create that on the helper directory.
             # now create the single instance on the staticPropertiesAndMethod.php
        */
        /*  6# and try to access them on any objects that you created */
        return self::$count;
    }

    public function process() {
        echo "Processing Transaction..";
    }

}

?>