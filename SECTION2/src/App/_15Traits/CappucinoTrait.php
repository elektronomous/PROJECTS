<?php

namespace App\_15Traits;

/* 3~ create the Trait of Cappucino */
Trait CappucinoTrait {
    /* 
        21~ use the CappucinoTrait
        22# after use, you could test the method on LatteTrait on Traits.php
    */
    use LatteTrait;

    public function makeCappucino() {
        echo static::class . ' is making a cappucino <br />';
    }

    /* 7~ create a method on the CappucinoTrait first */
    public function overrideByTheClassThatUseThis(): void {
        echo 'Override by the ' . static::class . '<br />';
    }

    /* 
        8# test this method on Traits.php
        11~ and create the same method here
    */
    public function pourGranule() {
        echo 'pouring granule on Cappucino<br />';
    }
    /* 
        12# test this conflictResolution on Traits.php
        17~ secret way on making the best Cappucino
    */
    private function makeTheBestCappucino() {
        echo 'please, this is your BestCappucinoEverMade <br />';
    }
}

?>