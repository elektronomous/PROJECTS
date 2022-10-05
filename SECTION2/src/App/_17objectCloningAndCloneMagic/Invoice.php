<?php

namespace App\_17objectCloningAndCloneMagic;

class Invoice {
    private string $id;

    public function __construct() {
        $this->id = uniqueid('Invoice_');
    }

    public static function create(): static {
        return new static();
    }
    /* 2~ create __clone magic method */
    public function __clone()
    {
        $this->id = uniqid('Invoice_');
    }
    /* 
        3# test this method inside the objectCloningAndCloneMagic.php
    */
}

function uniqueid(string $invoice): string {
    return $invoice . rand(11111, 99999);
}
?>