<?php

require_once(__DIR__ . "/../vendor/autoload.php");

use App\_14lateStaticBinding\ClassA;
use App\_14lateStaticBinding\ClassB;

/* 
    1~ to understand the late static binding you need to know the problem
       what problem it solves
     ~ The inheritance tree in PHP quickly gets dirty if you're using mix of static and non-static methods
       into your classes and the inheritance is deeply nested.
     ~ there are two type of bindings 
       ~ early binding => which happens at compile time
       ~ late binding => which happens at runtime 
    2# create class called classA and classB on _14lateStaticBinding, which class B
       is the child class of classA
    3~ testing method of both class
    4~ commenting this out


$classA = new ClassA();
$classB = new ClassB();

echo $classA->getName() . "<br />";     // => A
echo $classB->getName() . "<br />";     // => B
 
     ~ this is late binding where class is resolved at runtime using the runtime information
     ~ the method calls will depend on the type of the object that we're calling that method on
       ~ on classB we're calling getName() on classB, but because we're inheriting from classA, classB
         call that method on classA and the $this variable on method of ClassA will refers to the 
         calling object which is the classB.
       ~ so this class and method resolving and binding happens at runtime because it needs that additional
         runtime information to figure out on which class to call the method and on which class to access
         the certain properties and constants and so on.
    4# first, comment the 3~ out and lets make the class to have static methods and properties of classA
       and classB
    5~ testing the method on both class after creating the static context
*/

echo App\_14lateStaticBinding\ClassA::getName() . "<br />"; // => A
echo App\_14lateStaticBinding\ClassB::getName() . "<br />"; /* => A

     ~ when you see the result, you expect A and B right ? now this the problem the late static binding solves.
     ~ this is called early binding, you see the self keyword on classA, each time it runs
       ~ it will reference the same class
       ~ it resolves the class at compile time to which the method belong to or where the method was defined
     ~ unlike the $this keyword self doesn't follow the same inheritance rules  
     ~ one way to solve this is to overwrite the method in the child class and print self name there
    6# overwrite the getName method of ClassA on ClassB
    7~ after you testing the overwrite version of getName on ClassB you'll get the result:
                                                                => B
     ~ if you notice, this is not ideal because 6~ function defeats the purpose of
       inheritance, we don't want to keep overwriting the methods this way. we want
       the base class and base functionality that can be inherited into the child classes
    8# comment the 6~ out and go back to this file to see another solution
    9~ in old school php before the proper solution was added, a function called get_called_class()
       was used to figure out which was the call in class and then they would forward the calls to that class 
    10# var_dump the get_called_class() to see on which the method was being called on ClassA.php
     ~ after using var_dump you will get the result:
                                                                => string(31) "App\_14lateStaticBinding\ClassA" A
                                                                => string(31) "App\_14lateStaticBinding\ClassB" A
     ~ but after php5.3, the better solution was introduced called late static binding where the class is resolved 
       using late binding at runtime instead of early binding at compile time.
     ~ php using already exist keyword that's static, that is use with scope resolution operator(::) to access 
       static properties and constants and call static methods using late static binding.
    11# replace self with static on method ClassA.php
     ~ after you replace the self you'll get the result
                                                                => string(31) "App\_14lateStaticBinding\ClassA" A
                                                                => string(31) "App\_14lateStaticBinding\ClassB" B
     ~ late static binding basically uses runtime information to determine how to call the method or how to access
       the property or the constant
     ~ late static binding works when the method is called php stores the original class name of the last non-forwarding
       call and then when it encounters static keyword it resolves to the original class that it had stored before 
       ~ non-forwarding call is when you directly specify the class name and it's usually before the scope resolution operator
         example:
            ClassA::getName(); 
            ClassB::getName(); 
       ~ when you use self and parents to access properties/calling methods those are called forwarding calls because it might forward
         the call to the parent class 
     ~ you can also using the static keyword on non-static context, the difference between using the static keyword on static properties/methods
       and on an object(non-static) is that, php stores the original class name of the last non-forwarding on static context and php stores the 
       class on which the method that use static keyword was called.
    12# create the same method and properties with no static on ClassA.php and ClassB.php to use static keyword
*/
$classA = new App\_14lateStaticBinding\ClassA();
$classB = new App\_14lateStaticBinding\ClassB();

echo $classA->getClassName() . "<br />";        // => A
echo $classB->getClassName() . "<br />";        // => B

/* 
    13? why can't you just simply use the static keyword and why do you need the static
      ~ you can't acccess the non-static properties using static keyword(static::$non_static_property);
      ~ the difference between static keyword and the $this variable in non-static context is that:
        ~ if you call a method using $this variable, it could call a private method from the same scope while
          using static it could be different method 
        ~ you could use static keyword to use late static binding to access overwritten constants 
    ~ this also can be usefull when you're creating a new instance using the static keyword and returning that for
      example to implementing something like factory pattern
    14# create a method that return the new instance of the class that calling the method on ClassA
    15~ try the method that've been created 
*/
var_dump(App\_14lateStaticBinding\ClassA::make()); echo "<br />";   // => object(App\_14lateStaticBinding\ClassA)#4 (0) { } 
var_dump(App\_14lateStaticBinding\ClassB::make()); echo "<br />";   // => object(App\_14lateStaticBinding\ClassB)#4 (0) { } 


?>
