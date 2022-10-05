<?php

namespace App\_12interfaceAndPolymorphism;


interface DebtCollector extends AnotherInterfaceAgain/*, AnotherInterface */{
    
/* 
    2~ create the interface to make sure that concrete classes that implement this
       interface provide the implementation for this method
     ? if you confuse why there's an agency implement the collect method here on the DebtCollector.
     ? isn't DebtCollector is the agency itself.
     ~ yes, the debt collector is the agency itself in general. it's like saying a wheel maker is
       a dunlop company, or pizza maker is the PIZZA HUT company.
       ~ so the DUNLOP has own implementation/the method on how to make the wheel
         or the BRIDGESTONE company has its own implementations/method.
       ~ PIZZA HUT has own implementation/the method on how to make a pizza
         or DOMINOS has its own implementation/method.
     ~ say now you're working with some agency, we call it CollectionAgency. this Collection Agency
       will implement on its own of how they gather the owed amount
    3# create a new file on this directory called CollectionAgency.php and implement collect method.



*/
    /* 9~ create a constant value */
    public const MY_CONSTANT = 10;
    /* 4~ create constructor to force the concrete class to implement this constructor */
    public function __construct();
    // ask the agency to implement of how does they collect the owed amount
    public function collect(float $owedAmount): float;
}

?>