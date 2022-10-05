<?php

/* 
    2~ create the invoice class 
*/
namespace App\_13magicMethods;

class Invoice{
    /* 
        10~ creating the $amount properties
        12~ comment the public $amount out:
                    public float $amount = 1;
            then create the
    */
    private float $amount;
    
    /* 14~ create the constructor for this class */
    public function __construct(float $amount) {
        $this->amount = $amount;
    }
    
    /*
        5~ creating the __get magic method
         ~ this function will gets called automatically when the object access property that doesn't exist
    */
    public function __get(string $name /* this $name is the property that doesn't exist 
                                          being access as the argument  */)
    {
        /* 
            14~ comment out the var_dump
                var_dump($name); echo "<br />";
              ~ then update this method, this function kind of give you error handling, instead of
                triggering warnings and errors, you're returning the default null value
              ~ and this will give you read-only access if you don't define the setter method, because
                setter(__set) method will replace the  value of the $amount, which is private property.
              ~ you can comment the __set method out, but purpose of learning, we ignore it. 
        */
        if(property_exists($this, $name)){
            return $this->$name;
        }

        return null;
    }

    /* 
        8~ creating the __set magic method
         ~ this function will gets called automatically when you set property of this object that doesn't exist
    */
     public function __set(string $name, /* this $name is the property that doens't exist being set */  
                          $value /* this $value is the value you to the property that doesn't exist */): void
    {
        var_dump($name, $value); echo "<br />";
    }
}

?>