<?php

require_once(__DIR__ . "/../vendor/autoload.php");
require_once(__DIR__ . "/../App/Helper/print_r.php");
/* 
    1~ you can iterate through an array like this
*/

use App\_21iteratorAndIterableType\Invoice;
use App\_21iteratorAndIterableType\InvoiceCollection;
use App\_21iteratorAndIterableType\InvoiceCollection1;

foreach(['a','b','c','d'] as $key => $value) {
    echo $key . " " . $value . "<br />";
    /* 
        =>  0 a
            1 b
            2 c
            3 d
    */
}
/* 
     ~ you can also iterate through an object using foreach
     ~ foreach will iterate over the visible or accessible properties
       of the object
    2# create Invoice class on _21iteratorAndIterableType
    3~ test the Invoice class
*/
foreach(new Invoice(25) as $key => $value) {
    echo $key . ' -> ' . $value . '<br />';
    /* 
        =>  id -> 16427
            amount -> 25
    */
}
/* 
    ~ as you can see the result after we iterate through the object
      we dont get the private/protected result
*/
$datePeriod = new DatePeriod(new DateTime('05/06/2021'), new DateInterval('P1D'), new DateTime('05/10/2021'));

foreach($datePeriod as $date) {
    echo $date->format('m/d/Y') . '<br />';
    /* 
        =>  05/06/2021
            05/07/2021
            05/08/2021
            05/09/2021
    */
}
/* 
    ? why does the object could be iterated
    ~ the class implement Traversable interface, which allows the foreach loop
      to traverse the object.
    ~ Traversable interface implements Iterator and IteratorAggregate interface.
      both of them we use to define how the the object that implement the Traversable 
      interface could be iterated.
    4# create a InvoiceCollection class which you'll iterate over on _21iteratorAndIterableType directory
    5~ try to looping through the InvoiceCollection object
 
    
foreach(new InvoiceCollection([new Invoice(25), new Invoice(28), new Invoice(35)]) as $invoice) {
    echo $invoice->id . "<br />";
}

     ~ we comment the above code, because we get the error:
    
     Warning: Attempt to read property "id" on array in 
     C:\xampp\htdocs\php\section2\src\App\21. iteratorAndIterableType.php on line 66

     ~ when you iterate over the object, it iterates through the visible properties which is in this 
       case an array. when you try to echo $invoice->id, you read id property of the array since array
       doesn't have property id, PHP will give you an error
    6# that's why we implement Iterator interface inside the InvoiceCollection class so we can
       iterate over the array property of the object, not the all visible properties of the object.
    7~ now try to loop over the object of the InvoiceCollection
       
*/
foreach(new InvoiceCollection([new Invoice(25), new Invoice(28), new Invoice(35)]) as $invoice) {
    echo $invoice->id . "<br />";
}
/* 
    =>  App\_21iteratorAndIterableType\InvoiceCollection::rewind
        App\_21iteratorAndIterableType\InvoiceCollection::valid
        App\_21iteratorAndIterableType\InvoiceCollection::current
        95594
        App\_21iteratorAndIterableType\InvoiceCollection::next
        App\_21iteratorAndIterableType\InvoiceCollection::valid
        App\_21iteratorAndIterableType\InvoiceCollection::current
        61179
        App\_21iteratorAndIterableType\InvoiceCollection::next
        App\_21iteratorAndIterableType\InvoiceCollection::valid
        App\_21iteratorAndIterableType\InvoiceCollection::current
        59537
        App\_21iteratorAndIterableType\InvoiceCollection::next
        App\_21iteratorAndIterableType\InvoiceCollection::valid
    
    ~ if you see the result, then those result exposed how the object works when iterated over.
        ~ first the object called the rewind, so it reset the internal pointer position to the beginning
          of the element
        ~ then it using the valid method to check if the first position is valid
        ~ if it's valid, then exit the loop. Otherwise, using the current method to get the current element
          that's check using the valid method.
        ~ now execute the body of the loop which echoing out the id of the object
        ~ because we have more than one elements, the next method will move the internal pointer to next element
          and replace the rewind method, and do the same work.
    ~ you can also using the arrayIterator, but this is for the simple array like you just iterate over it.
    8# create InvoiceCollection1.php first on _21iteratorAndIterableType directory
    9~ test the method
*/
foreach(new InvoiceCollection1([new Invoice(22), new Invoice(33), new Invoice(100)]) as $invoice) {
    echo 'InvoiceCollection1 has ' . $invoice->id . '<br />';
    /* 
        =>  \InvoiceCollection1 has 60392
            InvoiceCollection1 has 93080
            InvoiceCollection1 has 47684
    */
}


?>