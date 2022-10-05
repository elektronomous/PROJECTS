<?php

namespace App\_15Traits;

/* 2~ create CappucinoMaker class  */
class CappucinoMaker extends CoffeMaker {
    use CappucinoTrait;
    /*
    3~ comment out this method:
    
    public function makeCappucino() {
        echo static::class . ' is making a cappucino <br />';
    }

    */
}

?>