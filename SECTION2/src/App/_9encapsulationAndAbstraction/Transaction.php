<?php

namespace App\_9encapsulationAndAbstraction;

class Transaction{
    public float $public_amount;
    private float $private_amount;
    protected float $protected_amount;

    /* 
        2~ public means => method and property accessible outside of this class by anyone
                           interacting with the object
         ~ private means => method and property accessible can only be accessed within the class itself
         ~ protected means => similar to private but extends to the child or the subclasses 
        
        3# you can access the private property by using the php reflection api, access this class private
           property on encapsulationAndAbstraction.php
    */

    public function __construct(float $amount) {
        $this->public_amount = $amount;
        $this->private_amount = $amount;
    }

    public function process() {
        echo 'process $' . $this->public_amount . ' transaction';
    }

    public function getValue(): int {
        return $this->private_amount;
    }
    /* 
        6~ create a method where we can access the object private/protected properties and method
           
    */
    public function copyFrom(Transaction $transaction) {
        var_dump($transaction->private_amount); echo "<br />";
        var_dump($transaction->sendEmail());
        /* 
            ~ because the argument has the same type with the current object which is the calling object
              which is the $this variable, so we are in the same object and the types are match. you're able
              to access the private properties and method of that object
            7# you can call this method from the encapsulationAndAbstraction.php
        */
    }

    private function sendEmail() {
        return true;
    }
};

?>