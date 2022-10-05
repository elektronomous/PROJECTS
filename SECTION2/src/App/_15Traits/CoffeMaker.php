<?php

namespace App\_15Traits;

/* 2~ create CoffeMaker class */

class CoffeMaker {

    /* 24~ static public property */
    static public int $guarantee = 2; 
        
    public function makeCoffe() {
        echo static::class . ' is making a coffe <br />';
    } 

    /* 9~ create a method on base class First */
    public function overrideByTheTrait() {
        echo static::class . ' is making a coffee using Coffe Maker <br />';
    }
   
}

?>