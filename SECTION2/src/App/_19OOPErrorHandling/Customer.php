<?php

namespace App\_19OOPErrorHandling;

class Customer {

    public function __construct(public string $description) {}

    public function getBillingInfo(): string {
        return $this->description;
    }
}

?>