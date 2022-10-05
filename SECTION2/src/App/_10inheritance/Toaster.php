<?php

/* 2~ create the Toaster class with its namespace */
namespace App\_10inheritance;


class Toaster {
    /*  
        14~ comment the code out & create the same properties with uninitialize value
                public array $slices = []; // slices that to be toasted
                public int $size = 2; // the maximum number of slices that toaster can toast at the same time 
    */
    public array $slices;
    public int $size;
    

    /* 10~ the private properties */
    public array $forPriv_slices = [];
    private int $priv_size = 2;

    /* 12~ the protected properties */
    protected array $forProt_slices = [];
    protected int $prot_size = 2;
    
    /* 
        3? why did you use int instead of const, since the toaser can toast 2 at the same time 
         ~ we're going to cover overridding constant and statics on seperate video 
        4# now include this class using autoload and use this this namespace
        14~ create a constructor for this class
    */
    public function __construct()
    {
        $this->size = 2;
        $this->slices = [];
    }

    public function addSlice(string $slice): void {
        /* 
            9? if you wonder what is $this variable referred to when the child(inheritated class)
             ~ if you remember that $this is always refers to the calling object.When the child is calling
               a method, which the method is a parent class method and the child has inheritated the parent class
               then $this keyword will refers to the child object
             ~ you can test it, by using this code:
                    var_dump($this); echo "<br />";
        */
        if(count($this->slices) < $this->size) {
            $this->slices[] = $slice;
        }
    }

    public function toast() {
        foreach($this->slices as $i => $slice) {
            echo ($i + 1) . ':Toasting ' . $slice . PHP_EOL;
        }
    }

    /* 
        10~ the private method 
        11# try to override the priv_size on ToasterPro.php and goto the Inheritance.php to test this method using 
            the child class so you can see how the private properties/method affect how child access the private access 
            modifier
    */
    public function addSlicePriv(string $slice) {
        if(count($this->forPriv_slices) < $this->priv_size)
            $this->forPriv_slices[] = $slice;
    }

    /* 21~ put final keyword so ToasterPro.php can't extended this method */
    final public function toastPriv(): void {
        foreach($this->forPriv_slices as $i => $slice) {
            echo ($i + 1) . ':Toasting ' . $slice . PHP_EOL;
        }
    }

    /* 
        12~ protected method
        13# try to override the prot_size on ToasterPro.php and goto the Inheritance.php to test this method using the
            child class so you see how the private properties/methods affect how child access the protected access modifier
            
    */
    public function addSliceProt(string $slice): void {
        if(count($this->forProt_slices) < $this->prot_size) 
            $this->forProt_slices[] = $slice;
    }

    /* 
        21~ put final keyword so ToasterPro.php can't extended this method
        22# go the Inheritance.php to get the next explanations
    */
    final public function toastProt(): void {
        foreach($this->forProt_slices as $i => $slice) 
            echo ($i+1) . ':Toasting ' . $slice . PHP_EOL;
    }
}

?>