<?php

namespace App\_15Traits;

/* 2~ create LatteMaker class */
class LatteMaker extends CoffeMaker {
    use LatteTrait;
    /*   
    3~ comment out this method:
    
    public function makeLatte() {
        echo static::class . ' is making a latte <br />';
    } 
    */
}
?>