<?php

namespace App\_12interfaceAndPolymorphism;

/*  
    3~ create the CollectionAgency that will implement the collect method
       on DebtCollector
     
*/
class CollectionAgency implements DebtCollector, AnotherInterface /* 5~ implement the another interface */{
    /* ~ a few rules of interface:
         ~ all the method declared within the interface must be implemented
           within the concrete class(CollectionAgency.php) => the collect method we declared on
           DebtCollector.php must be implemented on CollectionAgency or concrete class that implement
           the collect method. this because it's just an interface.

         ~ all the method declared within the interface must be public. we can't
           override the private/protected properties/method right ? 
         
         ~ signatures compatibility rules of method declared within the interface must
           apply to implemented method => the collect method has one parameter, you must
           override/implement that method to be the exactly the same within the concrete class.
        
        ~ using the first rules, we can force the CollectionAgency to have a constructor.
        
        4# create a constructor on DebtColler.php and go back to this file to implement the constructor
           method
    */
    /* 4~ implement the constructor function */
    public function __construct() {
    }
    /* 
        ~ when inheritant we can only extend a single class, but using 'implements' keyword
          we can implement multiple interface
        5# create another interface called AnotherInterface.php on this directory,
           go back to this file after you created the interface and implement the AnotherInterface
        6~ if we have a method on the AnotherInterface, that method must be implemented to this file.
           because we're implementing from AnotherInterface.
         ~ when we extend on class, we're only extend from single class right ? now on the interface
           we can extend multiple interface
        7# create anoter interface called AnotherInterfaceAgain.php on this directory, go back to this
           file after you created the interface and extend the DebtCollector interface using the AnotherInterfaceAgain
        8~ after you extends that interface, you don't need to implement that interface. because if there are a method
           that need to be implemented, then this file must implement that method.
         ~ you can only create constant value inside the interface, not ordinary value.
        9# create on the DebtCollector.php a constant VALUE and go back to this after you create one.
           you access the constant value the same way as the constant value on a class, the differences is that
           you can't override the constant value on interface.
         # go back to interfaceAndPolymorphism.php and test the collect method 
    */

    /* 3~ implement the collect method */
    public function collect(float $owedAmount): float {
      $guaranteed = $owedAmount * 0.5;

      // return random number which $guaranted as min value, and $owedAmount as the max value
      return mt_rand($guaranteed, $owedAmount);
    }
    
}


?>