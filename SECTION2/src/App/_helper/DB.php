<?php

/* 8~ creating the class DB
    ~ you create an object by passing a config of array
*/
namespace App\_helper;

class DB {
    private static ?DB $instance = null;

    private function __construct(public array $config)
    {
        echo "Instance created<br />";
    }

    public static function getInstance(array $config): DB {
        if(self::$instance === null)
            self::$instance = new DB($config);
        
        return self::$instance;
    }

}

?>