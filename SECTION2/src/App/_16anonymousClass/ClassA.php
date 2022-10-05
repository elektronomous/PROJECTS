<?php

namespace App\_16anonymousClass;

/* 4~ create regular class */
class ClassA {
    public function __construct(public int $x, public int $y) {}

    public function foo(): string {
        return 'foo';
    }

    public function bar(): object {
        /* 6~ extend so the anonymous class has access to main class */
        return new class extends ClassA {
            public function __construct() {
                parent::__construct(1,2);
                /* 
                    ~ now when you run
                */
                echo $this->foo() . '<br />';       // => foo
                /* 
                    ~ this will call the foo method inside the main class
                */
            }

        };
    }
}
/* 
    5# test the bar() method inside the anonymousClass.php
*/


?>