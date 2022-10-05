<?php

require_once("./helpers/Customer.php");
require_once("./helpers/PaymentProfile.php");

/* 
    PHP8 feature:
    constructor promotion properties is a feature that allows you to get rid of the boilerplate
    code where you define property and assign them via the argument that are pass in your constructor.
    basically it allows you combine class properties constructor and its assginment into one
    shorter syntax :
    
    you only need to add the access modifier to the constructor function parameter, so php in background
    will process that promotion does by the constructor to be a properties of the class.
    you don't need explicitly:
        private float $amount;
        private string $description;

    and you don't need to assign using $this
        $this->amount = val1;
        $this->description = val2;
    anymore, because you're promoting the $amount and $description properties inside the constructor function
*/

class Transactions1 {

    // using constructor function to promote these properties
    public function __construct(private float $amount /* automatically be the properties of this class */, 
                                private string $description /* automatically be the properties of this class */
                               )
    {}

    public function addTax(float $tax): Transactions1 {
        $this->amount += $this->amount * $tax / 100;
        return $this;
    }

    public function applyDiscount(float $rate): Transactions1 {
        $this->amount -= $this->amount * $rate / 100;
        return $this;
    }

    public function getAmount(): float {
        return $this->amount;
    }
}

echo (new Transactions1(10, 'Transaction 1'))->applyDiscount(10)->getAmount() . "<br />"; // => 9



/*
    something you need to be aware of that is:
    + you cannot create type hint "callable" to the properties, however you only create inside the argument
      and that argument must not use the access modifier. if you do, then it means you're promoting the properties
      that's callable, and php dont want it.
    + you can't create two same properties that's one is the properties and the other is the promotion properties.
            
            private $amount;
            private $description; // error

            public function __construct(float $amount, private string $description // error){}

    + you can make the default value inside the class, and inside the promotion constructor
    
            private $amount = 1; // Ok
            public function __construct(float $amount, private string $description = 'default value'){} // Ok
    
    + you can make the default as null
    
            private $amount = 1;

            public function __construct(float $amount, private ?string $description = null) // Ok
    
    + you access the promotion properties using $this
            
            public function __construct(private float $amount = 5, private ?string $description = null) {
                echo $this->amount . "<br />"; // => 5
            }            
*/

class Transactions2 {
    public ?Customer $customer = null;


    // using the constructor promotoin properties
    public function __construct(private float $amount, private string $description)
    {
    }
}

$transaction2 = new Transactions2(100, "Transaction 2");
/* 
        echo $transaction2->customer->paymentProfile->id . "<br />"; 
    when you execute the code above we get:
        !!  Warning: Attempt to read property "paymentProfile" on null in 
            /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/4. constructorPromotionAndNullsafe.php 
            on line 94
        !!  Warning: Attempt to read property "id" on null in 
            /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/4. constructorPromotionAndNullsafe.php 
            on line 94
    because we read on null which is the customer itself, then the paymentProfile is null since the we read before
    on null.
*/

/*

# that why php provide null safe operator => to check if the object we access is exist

        $transaction2?->customer->profilePayment->id; // we don't need to make the $transactions2 null safe operator
                                                       // because we see that $transactions2 is exist
                                                       // now the problem when you see data type that you can't see &
                                                       // probably don't exist/don't set automatically.
*/

echo $transaction2->customer?->profilePayment->id; // it don't trow anything, because php have null safe operator=> (blank) 

// now customer doesn't null anymore
$transaction2->customer = new Customer();



/*
    when you access it like this again:

        echo $transaction2->customer?->paymentProfile->id; // PHP will give you a warning again
 
        !!  Warning: Attempt to read property "id" on null in 
            /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/4. constructorPromotionAndNullsafe.php 
            on line 124
    
    so the solutions
*/

echo $transaction2->customer?->paymentProfile?->id; // => (blank)

# can we use the null coalescing(??) instead ?

class Transactions3 {
    public ?Customer $customer = null;
    private ?Customer $customer2 = null;

    

    // using the constructor promotoin properties
    public function __construct(private float $amount, private string $description)
    {
    }

    public function getCustomer2(): ?Customer {
        return $this->customer2;
    }
}

$transaction3 = new Transactions3(100, 'Transaction 3');

// whenever the null, the coalescing operator will return expression
echo $transaction3->customer->paymentProfile->id ?? 'Null' . "<br />"; // => Null

// now how about this
/* 
        echo $transaction3->getCustomer2()->getPaymentProfile2()->id ?? 'Null' . "<br />"; // php will give you a fatal
    
    !!  Fatal error: Uncaught Error: Call to a member function getPaymentProfile2() on null in 
        /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/4. constructorPromotionAndNullsafe.php:161 
        Stack trace: #0 {main} thrown in 
        /opt/lampp/htdocs/PROJECTS/SECTION2/src/public/4. constructorPromotionAndNullsafe.php 
        on line 161
    
    why ? because the coalescing operator(??) doesn't work for the method call
    and that's why the null safe operator can safe you.
*/

echo $transaction3->getCustomer2()?->getPaymentProfile2()?->id ?? 'Null'; // => Null

/* 
    so how the null safe operator works ?
        $instancesOfClass->$_firstMethodOrProperty?->$_secondMethodOrProperty
    
    when the $_firstMethodOrProperty get its null safe operator, the null safe operator will
    examine if the $_firstMethodOrProperty was a null then the $_secondMethodOrProperty will get discarded
    and return the null (it's called short circuiting) without executing the rest of the expression. Otherwise
    we continue to access the $_secondMethodOrProperty or other $_nMethodOrProperty.  

    + when working with null safe operator, keep it mind that:
    null safe operator is read only => 

*/


?>