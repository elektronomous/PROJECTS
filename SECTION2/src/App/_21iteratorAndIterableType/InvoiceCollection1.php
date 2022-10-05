<?php

namespace App\_21iteratorAndIterableType;


/* 8~ create InvoiceCollection class */
class InvoiceCollection1 /* 8~ */ implements \IteratorAggregate {
    
    public function __construct(public array $invoices)
    {   
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->invoices);
    }
}
/* 
    9# now test this method inside the iteratorAndIterableType.php
*/
?>