<?php

namespace App\_11abstractClassesAndMethods;

/* 2~ create the base class field */

abstract /* 4~ adding abstract */class Field /* 15~ implement the Renderable */ implements Renderable{
    public function __construct(protected string $name) 
    {}

    /* 
        7~ if you notice that this method here isn't implemenating anything
         ? so what happens to this method, what the purpose doing nothing            
         ~ this class is an abstract, this method should abstract too.
         ~ abstract method if you remember in the first explanation that has only
           the definition or the signature but not the actual implementation.
         ~ the actual implementation goes to the child class.
        8# comment the below out and create the abstract method               
                public function render(): string {
                    return '';
                }
    
        
        15~ comment this out
             abstract public function render(): string; 
     
        ~ now because we have a method abstract, the child class must be do implementation
          the render() method.
        9# goto the child class Checkbox.php, Radio.php, Text.php to implement this render method
           and goto the Boolean.php to get some explanation
        

    */
}

/* 
    3# go to the abstractClassesAndMethods.php and testing all of this classes.
*/
?>