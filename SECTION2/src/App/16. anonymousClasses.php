<?php
require_once(__DIR__ . "/../vendor/autoload.php");

use App\_16anonymousClass\ThisImplementation;
use App\_16anonymousClass\ClassA;
/* 
    1~ anonymous class is class that doesn't have name
     ~ you create the anonymous class like this
*/
$obj = new class {

};

var_dump($obj); echo "<br />"; // => object(class@anonymous)#1 (0) { } 
/* 
     ~ anonymous class can accept arguments through the constructor
     ~ you pass to the constructor of anonymous like this:
*/
$obj = new class(1, 2, 3) {
    public function __construct(public int $x, public int $y, public int $z){

    }
};

var_dump($obj); echo "<br />";  // => object(class@anonymous)#2 (3) { ["x"]=> int(1) ["y"]=> int(2) ["z"]=> int(3) } 
/* 
     ~ anonymous class can use inheritance and extend other classes, implement interface, using Trait
     ~ it doesn't have name, but PHP hide from you. so if you wonder what the name of the anonymous class you've created,
       the engines of PHP will generated for you:    
*/
var_dump(get_class($obj)); echo "<br />"; // => string(89) "class@anonymous/opt/lampp/htdocs/PROJECTS/SECTION2/src/App/16. anonymousClasses.php:16$1" 
/* 
     ? how to pass the object to a function since this anonymous class has no name
     ~ implement the interface, and using the interface we type hint
    2# create implementation called thisImplementation on _16anonymousClass
    3~ implementing the interface into annoymous class
*/
$obj = new class(1,2,3) implements ThisImplementation{
    public function __construct(public int $x, public int $y, public int $z) {}
};

/* 
    ~ creating a function that accept anonymous class
*/
function accAnon(ThisImplementation $obj): void {
    var_dump($obj); echo "<br />";
}

accAnon($obj);      // => object(App\_16anonymousClass\ThisImplementation@anonymous)#3 (3) { ["x"]=> int(1) ["y"]=> int(2) ["z"]=> int(3) } 

/* 
     ~ you can also create anonymous class within regular class
    4# create regular class within the _16anonymousClass directory
    5~ test the bar() method which return anonymous object
*/

$classA = new ClassA(1,2);
var_dump($classA->bar()); echo "<br />";    // => object(class@anonymous)#4 (0) { } 
/* 
     ~ within the anonymous class, you cannot access the properties and methods of the main class(ClassA)
     ~ the $this keyword inside the anonymous class will refer to itself, not to the main class(ClassA)
     ~ but, you want to access the main class, you can
    6# extend the main class inside the bar method of the ClassA on _16anonymousClass directory
*/



?>