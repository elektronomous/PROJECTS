<?php
/* 5~ create another class to increase the feature of the Toaster class */
namespace App\_10inheritance;

require_once(__DIR__ . "/../../vendor/autoload.php");
use App\_10inheritance\Toaster;


class ToasterPro /* 6~ extended the Toaster */ extends Toaster{
    /* 
        7~ commenting this out as the properties is same with the Toaster class
        public array $slices = []; // slices that to be toasted
        14~ commenting this code out & create the same properties uninitialized
                public int $size = 4; // overriding the $size on the Toaster class, to this $size on ToasterPro class
    */
    public int $size;

    /* 11~ override the priv_size on Toaster.php class */
    public int $priv_size = 4;
    /* 13~ override with increasing the prot_size access modifier on Toaster.php class */
    public int $prot_size = 4;

    /* 
        7~ commenting this out as the function is same with the Toaster class 
            public function addSlice(string $slice): void {
                if(count($this->slices) < $this->size) {
                    $this->slices[] = $slice;
                }
            }

            public function toast() {
                foreach($this->slices as $i => $slice) {
                    echo ($i + 1) . ':Toasting ' . $slice . PHP_EOL;
                }
            }
        14~ create a constructor function for this class
    */
    public function __construct() {
        /* 
            16~ call the parent constructor first, so then we can use the $slices property 
              ~ dont call the parent constructor after you override some properties. because
                it will replace back to the value that is a value before it gets inherited.
              ~ dont call the parent::_construct() if the parent class has no constructor
        */
        parent::__construct();
        $this->size = 4;
        /* 
            17# go to the line before toastBagel function and let's override 
                the addSlice method of the parent class  
        */
    }
    /* 
        15# this consturct will run automatically, now go back to the Inheritance.php to get some explanation
        17~ override the addSlice method of the parent class
        18~ adding parameter
        19# go to the Inheritance.php to get some explanation about name arguments
    */
    public function addSlice(string $slice /* string $sliceX */): void {
        parent::addSlice($slice);
        /* 
            ~ when you override a method, the method you create to override must have 
              signature(parameter type, return type) that's exactly same with the method you overrided.
              in other word, the child class method must compatible with the parent class method.
            ~ this rules apply only to those methods except for the constructor. you can override a construct
              method which method you create has a different parameter type.
            ~ make sure the parameter name is same, so when we use named argument. we don't get problem.
            18# adding a parameter name on this function with commenting out the parameter name and its type
            
        */
    }
    
    /*  ~ its additional feature */
    public function toastBagel() {
        foreach($this->slices as $i => $slice) {
            echo ($i + 1) . ':Toasting ' . $slice . ' with bagels option' . PHP_EOL;
        }
    }

    /* 
        ~ now if you look at the both of the class, you see the common functionality
          ~ the addSlice method on the Toaster = the addSlice method on the ToasterPro
          ~ the toast method on the Toaster = the toast method on the ToasterPro
        ~ now to wrap it up and dont make twice method and make use of the properties
          effectively, the inheritance comes in.
        6# make the ToasterPro as the child of the Toaster, since ToasterPro is the part
           of the Toaster with extended feature.
        7# comment the common functionality/properties out (we could just delete that part of the code,
           because this for learn, we choose to leave it). 
        8# go back to the inheritance.php, test this class.
    */

}

?>