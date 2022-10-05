<?php

declare(strict_types=1);
// the class name must be follows the variables naming rules
// recommended: using only one class on a file
// this file should name like the class file, that's how you can signed that this file for the class Transactions
class Transactions 
{
    // Access modifier: how the method/properties can be access by the code outside of this class
    // PUBLIC => means the code run outside this class can use this method/properties
    // PRIVATE => means the method/properties only can be access by the inside code of this class.

    // remember type hinting
    // public float $amount;         // DEFAULT VALUE => NULL
    // public string $description;    // DEFAULT VALUE => NULL
    /* 
        it kind doesn't make sense to make the amount/description accessible by public.
        because it can introduce a bug. you only modify/read the properties value via method.
        so we make it private & make a method to read the properties value
    
    */
    private float $amount;
    private string $description;

    // this function will be called everytime the instances of this class is created
    public function __construct(float $amount, string $description)
    {
        // when you access the properties inside the class you're using "$this" keyword:
        $this->amount = $amount;
        $this->description = $description;
        
        /* 
            $this => refers to the calling object or refers to instance from which the method was called
            
            say i have instances from this class called $transactions. when i call this method from the $transactions
                $transactions->__construct(10,'hello');
            the $this keyword inside the __constructors will refers to the $transactions, so when i assign something
                $this->amount = $amount;
                $this->description = $description
            it's like assigning the $transactions properties
                $transactions->amount = $amount;
                $transactions->description = $description;  
        */

    }

    public function addTax(float $rate): Transactions /* you use self right */ {
        $this->amount += $this->amount * $rate / 100;
        return $this;
   
    }

    public function applyDiscount(float $rate): Transactions {
        $this->amount -= $this->amount * $rate / 100;
        return $this;
    }

    // read $amount value 
    public function getAmount(): float {
        return $this->amount;
    }

    public function __destruct()
    {
        echo 'Destruct ' . $this->description . "<br />";
    }

}

?>
