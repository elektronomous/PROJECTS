<?php

namespace App\_14lateStaticBinding;


/* 2~  ClassB is the child of ClassA */
class ClassB extends ClassA {
    protected /* 4~ making this property static */ static string $name = 'B';
    protected static string $className = 'B';

    /*  6~ overwrite the method getName of ClassA 
        8~ comment this method
        
    public static function getName(): string {
        var_dump(self::class);
        return self::$name;
    }
    
        7# after you overwrite, test this method 
    */
}

?>