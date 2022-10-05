<?php

namespace App\_14lateStaticBinding;

/* 2~ ClassA is the parent class */
class ClassA{
    protected /* 4~ making the properties static */ static string $name = 'A';
    /* 12~ create method and properties */
    protected static string  $className = 'A';

    public function getClassName(): string {
        return static::$className;
    }
    /* 
        13# testing 12~ method
        14~ creating the method that return the new of the class that calling this method
    */
    public static function make(): static {
        return new static();
        /* 
            ~ instead of using self() or this ClassA() that resolve to the class that where this method
              belong, we're using static so it resolve to class who called this method.
            15# try this method 
        */
    }

    
    public /* 4~ making this method static */ static function getName(): string {

        /* 10~ var_dump'ing the get_called_class */
        var_dump(\get_called_class());

        return /* 4~ because method is a static, you can't use $this-> anymore, instead */
               /* 11~ replacing the self keyword, and using */static::$name;
    }
}
/* 
    3# test both of method from ClassA and ClassB on lateStaticBinding.php
    5# testing the method after you change it to static context
*/