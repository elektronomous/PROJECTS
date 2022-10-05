<?php

namespace App\_15Traits;

/* 3~ create the Trait of Latte */
Trait LatteTrait {
    protected string $milkType = 'steamed milk';

    /* 23~ create static property */
    static public string $foamDesign = 'heart';
    
    public function makeLatte() {
        echo static::class . ' is making a latte <br />';
    }

    /* 9~ and create the same method on Trait used by the child class */
    public function overrideByTheTrait() {
        echo static::class . ' is making latte NOT Coffe here <br />';
    }
    /* 
        10# test this method on the Traits.php
        11~ create a method here first
    */
    public function pourGranule() {
        echo 'pouring granule on Latte<br />';
    }
    /* 
        20~ create a method on how to pour a milk
    */
    public function pourMilk(float|int $dose=0.3) {
        echo 'pour ' . $dose .' on '. $this->milkType . '<br />';
    }
    /* 
          ~ you can also define the properties/methods on the Class that use this Trait, so
            $this keyword on this Trait would point to that trait.  
        21# after you create this method, use the this Trait on CappucinoTrait.
        23~ create static method inside this Trait
    */
    static public function drawTheFoam() {
        echo 'design the foam to be ' . static::$foamDesign . '<br />';
    }
    /* 
        24# test the static method inside the Traits.php
    */

}