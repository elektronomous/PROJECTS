<?php

namespace App\_13magicMethods;

class Invoice1 {
    /* 
        2~ create array property 
         ~ since we don't create constructor, we set the value to [](default value)

    */
    protected array $data = [];
    /*  ~ create the method that we've specified earlier on Invoice.php */
    public function __get(string $name) {
        if(array_key_exists($name, $this->data))
            return $this->data[$name];
    }

    public function __set(string $name, $value) {
        $this->data[$name] = $value;
    }
    /* 
        3# go back to magicMethods2.php and testing this class
        4~ create the __isset and __unset method on this class
    */
    public function __isset(string $name): bool {
        return array_key_exists($name,$this->data);
    }

    public function __unset(string $name): void {
        unset($this->data[$name]); // remove element that has key $name from the array
    }
    /* 
        5# now test this methods on magicMethods2.php
        6~ create the magic method __call
    */
    public function __call(string $name /* this $name is the method that doesn't exist being called */
                           ,array $arguments /* this $arguments contain the argument you've passed when you call the
                                                unavailable method */)
    {
        /* 
            var_dump($name, $arguments); echo "<br />"; 
            10~ update this method to how handle when gets called
        */
        if(method_exists($this, $name)) {
            /* 
                $this->$name();     => you can simply call the private/protected method like this, because it has
                                       no arguments
                ? how about it does
                ~ you probably gonna say, like this:
            
                        $this->$name($arguments);

                11# test the method on magicMethods2.php so you can see the result
                  # go back to this file after you test it out
                ~ because you pass an array of arguments, the php give you an error like this

                        Fatal error: Uncaught TypeError: App\_13magicMethods\Invoice1::process(): Argument #1 
                        ($amount) must be of type float, array given, called in 
                        /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_13magicMethods/Invoice1.php on line 51 
                        and defined in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_13magicMethods/Invoice1.php:73 
                        Stack trace: #0 /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_13magicMethods/Invoice1.php(51): 
                        App\_13magicMethods\Invoice1->process(Array) #1 
                        /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/13. magicMethods2.php(86): 
                        App\_13magicMethods\Invoice1->__call('process', Array) #2 {main} 
                        thrown in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_13magicMethods/Invoice1.php on line 73
                ~ instead of passing array of argument, we're using the call_user_func_array
            */
            call_user_func_array([$this, $name], $arguments);
            /* 
                12# go back to magicMethods2.php to give the result
            */
        }
    }
    /* 
        7# continue using the receipt() function on magicMethods2.php and pass the argument to see
           different result
        8~ creating the magic method __callStatic 
    */
    public static function __callStatic(string $name /* this $name is the method that doesn't exist being called */
                                 , array $arguments /* this $arguments contain the arugment you've passed when you call
                                                       the unavailable method */) {
        var_dump('static', $name, $arguments); echo "<br />";
    }
    /* 
        9# now test this method on magicMethods2.php
        10~ create a method that exist called process
    */
    protected function process(float $amount, string $description) {
        var_dump('process', $amount, $description); echo "<br />";
    }
    /* 
        13~ create the __toString() magic method
          ~ since PHP8, class that define the magic method __toString implicityly implement the stringable
            interface
    */
    public function __toString(): string
    {
        return "Hello from __toString()";
        /* 
            if you try to return something other than 'string', it should be allowed if
            this php file don't declare the strict types
        */
    }
    /* 
        14# test this method on magicMethods2.php
        15~ create the __invoke magic method
    */
    public function __invoke()
    {
        var_dump('invoked'); echo "<br />";
    }
    /* 
        16# test this method on magicMethods2.php
    */


}


?>