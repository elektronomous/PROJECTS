<?php

namespace App\_12interfaceAndPolymorphism;

/* 
    10~ create DebtCollectionService that accepts a class that implement DebtCollector interface as argument
      ~ this class will expose the service provided by each of the class that implement
        the DebtCollector interface.    
*/

class DebtCollectionService {
    public function collectDebt(/* 13~ CollectionAgency */ DebtCollector $collector) {

        /* 14~ using var_dump to check instanceof $collector */
        var_dump($collector instanceof RockyAgency);        // => true, when you pass the instance of the RockyAgency
        var_dump($collector instanceof CollectionAgency);   // => true, when you pass the instance of the CollectionAgency
        echo "<br />";

        $owedAmount = mt_rand(100, 1000); 
        // now how each of the $collector collects on its way of this $owedAmount
        $collectedAmount = $collector->collect($owedAmount);

        echo 'Collected $' . $collectedAmount . ' out of $' . $owedAmount . "<br />";
        /* 
            11# now test this method by creating an instance on interfaceAndPolymorphism.php
        */
        
    }
}

?>