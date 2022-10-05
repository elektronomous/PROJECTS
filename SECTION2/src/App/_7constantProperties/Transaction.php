<?php

namespace App\_7constantProperties;

require_once(__DIR__ . "/../_helper/Status.php");

use App\_helper\Status;

class Transaction{
    
    /* 
        1~ let's define the constant properties for this class
         ~ by default, when you create a properties without its access modifier
           then it's a public properties
        17~
            public const STATUS_PAID = 'paid';
            public const STATUS_PENDING = 'pending';
            public const STATUS_DECLINED = 'declined';
    */

    /* 
        2# access those constant on the constantProperties.php
        
        3~ let's define the constant properties with private access modifier
        
        4# now try to access 3~ on the constantProperties.php and explain what happen then
        
        17~
            private const PRIV_STATUS_PAID = 'private paid';

    */

    /* 
        9~ create a property status for the setStatus method to set.
            
    */
    private string $status;

    /* 
        14~ creating constant associative array
        17~ 
            public const ALL_STATUS = [
                self::STATUS_PAID => 'Paid',
                self::STATUS_PENDING => 'Pending',
                self::STATUS_DECLINED => 'Declined'
            ];
    */
  

    public function __construct(){
        /* 
            6~ you only can access the private method inside the class
             ~ to access it, there are 3 ways:
                ~ 1. using the 2~3
                ~ 2. using the self keyword
                    ~ self refers to the current class, its similar to
                ~ 3. the $this variable
                    ~ which refers to the calling object
            ~ but self also refers to the class where it's called
            17~  
                var_dump(Transaction::PRIV_STATUS_PAID); echo " => class name<br />"; // => string(12) "private paid"
                var_dump(self::PRIV_STATUS_PAID); echo " => self keyword<br />";
                var_dump($this::PRIV_STATUS_PAID); echo " => \$this keyword<br />";
        */


        /* 
            9~ we set the default value for the $status
            12~ after we set on the 9~, we're commenting out the property
                $this->status = 'pending';
            
            11~ instead of hard code the status using 'pending', we can use the constant properties
            
            12# comment the 9~ out 
            13# set the verification on the setStatus so the method doesn't work when somebody type random string:
                'asafsadfs'
            
            17~         
                $this->setStatus(self::STATUS_PENDING);
        */
        $this->setStatus(Status::PENDING);


    }

    /*
        9~ let's create a method called setStatus and it will accept a string and it will set the property
           status 
    
    */

    public function setStatus(string $status): self /* you could also use the Transaction class name */
    {
        /* 
            13~ because the verification need to validate all the status, you don't do this:
                if($status === self::STATUS_PAID)
                    $this->status = $status;
             ~ instead
            14# you create an constant associative array which the validation will go throug the array
        */
        if(!isset(Status::ALL_STATUS[$status])) {
            throw new \InvalidArgumentException("Invalid Status");
        } else
            $this->status = Status::ALL_STATUS[$status];
        /* 
            15# goto the constantProperties.php and pass $status as the invalid status
        */
        return $this;
    }

    /* 
        10# now use this method on the constantProperties.php
    */
};


?>