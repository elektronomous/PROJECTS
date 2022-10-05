<?php

namespace App\_19OOPErrorHandling;

use \Exception;

class Invoice {
    public function __construct(public Customer $customer){}

    public function process(float $amount): void {
        /* 2~ create an exception if amount was negative */
        if($amount <= 0){
            /* 3~ commenting out the generic version 
                    throw new \Exception('Invalide Invoice amount');
                ~ and throw using the specific version
            */
            throw new \InvalidArgumentException("Invalid Invoice amount");

        }
        /* 
            ~ there is a base Exception class called Exception, which throw generic exception
            ~ if you look at the source code of Exception, you'll find both Exception class and
              Error class impelement Throwable interface.
            ~ we can be more specific about our exception. instead of using the generic version
              and we know that we will handle the argument here so we use the Built-in Exception
              called InvalidArgumentException
            3# commenting out the generic version first, then throw using the specific version
            4~ Now if you try to handle something that's all the Built-in function:
                ~ BadFunctionCallException
                ~ BadMethodCallException
                ~ DomainException
                ~ InvalidArgumentException
                ~ LengthException
                ~ LogicException
                ~ OutOfBoundsException
                ~ OutOfRangeException
                ~ RangeException
                ~ RuntimeException
                ~ UnderflowException
                ~ UnexcpectedValueException
               can't match your needs, you can throw Base class Exception for it. for example
               we can't process if the customer billing information was missing.
        */
        if(empty($this->customer->getBillingInfo())){
            /* 5~ commenting the generic versino first 
                    throw new \Exception('Missing billing information');
                ~ then create our custom Exception Class. if you see the message of the \Exception
                  we can override it on our custom Exception class to avoid message duplication
            */
            throw new MissingBillingInfoException();

            /* 
                ~ because the generic version doesn't tell us much about the invalid, another solution
                  for that is custom Exception classes and extend the functionality of either the base
                  Exception classes or one of the built-in Exception classes
                5# so, commenting the generic version first, then create your custom Exception Class
                 # we cannot throw the MissingBillingInfoException object, because its instances not
                   from the Base Exception Class, or Throwable interface. to make it Throwable, or could
                   throw an Exception, extend the class
                 # test this method inside the OOPErrorHandling.php 
            */
        }

        echo 'Processing $'. $amount . ' invoice - ';

        sleep(1);

        echo 'OK<br />';
    }
}

?>