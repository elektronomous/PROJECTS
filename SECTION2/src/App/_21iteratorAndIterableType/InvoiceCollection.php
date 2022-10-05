<?php

namespace App\_21iteratorAndIterableType;

use Traversable;

/* 4~ create InvoiceCollection class */
class InvoiceCollection /* 6~ */ implements \Iterator {
    
    public function __construct(public array $invoices)
    {   
    }
    /* 
        6~ create the implementation of the Iterator interface
         ~ Iterator interface has 5 methods to be implemented 
    */

    public function current() { /* 1~ 
            ~ return the current element or in this case return
              the current invoice from the invoices list
            ~ the current function is simply returns the value of the array element that's currently being pointed to by the internal pointer. 
              it doesn't move the pointer in any way
        */
        echo __METHOD__ . '<br />';
        return current($this->invoices);
        
    }

    public function next(): void { /* 2~ 
            ~ this next function will bring the internal pointer to the next element
        */
        echo __METHOD__ . '<br />';
        next($this->invoices);
    
    }
    
    public function key() { /* 3~ 
            ~ return the key of the current element that pointed by the internal
              pointer. it doesn't move the internal pointer in any way
        */
        return key($this->invoices);

    }

    public function valid(): bool { /* 4~ 
            ~ return the boolean value which indicate that the current element is 
              valid or not.
            ~ if this function return false, then the for loop will stop
        */
        echo __METHOD__ . '<br />';
        return current($this->invoices) !== false;

    }

    public function rewind(): void { /* 5~ 
            ~ this function will get called first when the foreach loop started.
            ~ the reset function inside this will reset the position of the internal pointer
              to the first element of the array
        */
        echo __METHOD__ . '<br />';
        reset($this->invoices);
    
    }
    
}
/* 
    5# now try to looping through the object of InvoiceCollection class
    7# after you create the implementation of the Iterater interface, you can try
       to loop over the object of this class.
*/

?>