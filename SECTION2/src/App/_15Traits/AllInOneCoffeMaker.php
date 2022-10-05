<?php

namespace App\_15Traits;

/* 2~ create AllInOneCoffeMaker class */
class AllInOneCoffeMaker /* 5~  */ extends CoffeMaker {
    /* 
        5~ use Trait of both Cappucino and Latte
         ~ if you're following the PSR-12, you must put the use <TraitName> in seperated line.

    use CappucinoTrait , LatteTrait;         
    
        13~ using the pourGranule method on CappucinoTrait then on the LatteTrait 
    */
    use CappucinoTrait {
        CappucinoTrait::pourGranule insteadOf LatteTrait;
        /* 18~ expose the secret way on making the best Cappucino */
        CappucinoTrait::makeTheBestCappucino as public;
    }
    /* 15~ using the aliasing so both of the Trait method that's same, could be used */
    use LatteTrait {
        LatteTrait::pourGranule as pouringGranule;
    }
/* 
    6# try this method on Traits.php
    7~ and create the same method as that defined inside the CappucinoTrait
    14# test the pourGranule method on Traits.php
    16# test the pouringGranule method on Traits.php
    19# test the expose method on the Traits.php
*/
public function overrideByTheClassThatUseThis(): void {
    echo 'Override By the ' . static::class . '(UPDATED) <br />';
}

}
?>