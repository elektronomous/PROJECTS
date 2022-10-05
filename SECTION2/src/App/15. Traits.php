<?php

require_once(__DIR__ . "/../vendor/autoload.php");

use App\_15Traits\AllInOneCoffeMaker;
use App\_15Traits\CappucinoMaker;
use App\_15Traits\CoffeMaker;
use App\_15Traits\LatteMaker;

/* 

    1~ php is a single inheritance language and doesn't support multiple inheritance,
       which means you can only extend one class
     ~ using Traits or Interface, you can achieve the multiple inheritance.
     ~ let's see what the problem is with the multiple inheritance and why would care
       to have an alternative to multiple inheritance in PHP
       

                            __________________
                           |   Coffee Maker  |
                           |                 |
                           | - makeCoffe()   |
                           |_________________|
                          /                  \
                _________/________      ______\_______________
                |   Latte Maker  |      |   Cappucino Maker  |
                |                |      |                    |
                | - makeCoffe()  |      | - makeCoffe()      |
                | - makeLatte()  |      | - makeCappucino()  |
                |________________|      |____________________|
                        \              /
                         \            /
                        __\__________/______________
                        |   All in One Coffe Maker |
                        |                          |
                        | - makeCoffe()            |
                        | - makeLatte()            |
                        | - makeCappucino()        |
                        |__________________________|

     ~ say that we have class called Coffe Maker that could make a Coffe. and we have
       two specialty Coffe Makers that are Latte Maker and Cappucino Maker. these two
       Maker would make Coffe first, before it make the Latte or Cappucino right ? so
       the Latte Maker and Cappucino Maker inheriting the Coffe Maker method which is
       the makeCoffe() by using the arrows(/ and \). Now by the time past, we have ano
       ther All in One Coffe Maker, and it has the ability to make coffe, make latte,
       make cappucino. for that the All in One Coffe Maker inheriting the Latte Maker
       and the Cappucino Maker by using the arrows(\ and /). 
     ~ now we have problem here where PHP doesn't support the inheriting from multiple class.
       this the diamond problem | /\ |
                                | \/ |
     ~ suppose the Latte Maker and Cappucino Maker, override its make Coffe method, making
       their way to make coffee. the All in One method when make coffee is depend on the class
       that its inheriting from, so the All in One method doesn't override the make Coffe from
       the class its inherited. but both of the Maker has own their way to make coffee, and now
       this the problem the All in One Maker confuse in choosing the way to make coffee.
       
     ~ php has traits which lets you share common functionality from multiple classes
    2# create a coffe maker in directory _15Traits
     # create a latte maker extends the coffe maker in directory _15Traits
     # create a cappucino maker extends the coffe maker in directory _15Traits
     # create a All in One Coffe Maker class in directory _15Traits
     ~ testing the method after you creating the class and its method
*/

$coffeMaker = new CoffeMaker();
$coffeMaker->makeCoffe();                   // => App\_15Traits\CoffeMaker is making a coffe

$cappucinoMaker = new CappucinoMaker();
$cappucinoMaker->makeCoffe();               // => App\_15Traits\CappucinoMaker is making a coffe
$cappucinoMaker->makeCappucino();           // => App\_15Traits\CappucinoMaker is making a cappucino

$latteMaker = new LatteMaker();
$latteMaker->makeCoffe();                   // => App\_15Traits\LatteMaker is making a coffe
$latteMaker->makeLatte();                   // => App\_15Traits\LatteMaker is making a latte

/* 
     ? now how the AllInOneCoffeMaker make all kinds of coffe
     ~ using interface isn't bad idea right. so you could make a interface called MakesCoffe, and then declare
       makeCoffe method, and impelement the method into the a class which is in this case CoffeMaker. then on this class
       you're impelementing the makeCoffee method and AllInOneClass will extend this class.
       Using the same method, you could create the LattesMaker as the interface and CappucinosMaker interface and
       then AllInOneCoffeeMaker class will implement both of the interface at the same time.
     ? why don't you extend it
     ~ remember you only can extends one class
     ~ now this the problems comes in when after AllInOneCoffeeMaker impelement both of two interfaces, it may create the 
       same method (same way on makeLatte and makeCappucino) with another class that implement one of the interface which 
       is duplicated. if it's different method, you're good to go.
    
    ~ And now we have Traits which reduce code duplication and increase reusing some code.
    3# create Traits of each of the class we create earlier on the _15Traits, replace the Maker as Trait
     # comment out the method on the Class and Move the method to Traits
     # using the use keyword to import the traits 
     ~ after you create the traits, you'll notice that the result will be the same.
    
    4~ On Traits:
     ~ you can't instantiate Traits, instead you use the 'use' keyword to use another Trait within the Class/within the Traits
     ~ you can create a method and its properties.
    5# now you can extends AllInOneCoffeMaker to CoffeMaker and use the Trait of both Cappucino and Latte
    6~ create AllInOneCoffeMaker and testing its method
*/
$allInOneCoffeMaker = new AllInOneCoffeMaker();
$allInOneCoffeMaker->makeCoffe();                   // => App\_15Traits\AllInOneCoffeMaker is making a coffe
$allInOneCoffeMaker->makeLatte();                   // => App\_15Traits\AllInOneCoffeMaker is making a latte
$allInOneCoffeMaker->makeCappucino();               // => App\_15Traits\AllInOneCoffeMaker is making a cappucino
/* 
     ~ now maybe you wonder how the Traits works ?  
     ~ think Trait as copy and paste, trait simply takes the code that's written in the Trait and
       paste it in class that 'use' the Trait at compile time 
     ~ comes to the rule of Traits that's about precedence & method overriding:
       ~ when the class that use Trait define the same method with the Trait method, then the method that the class 
         defined will replace the method within the Trait that used by the class, not by the other class.
         # you can try this by create the same method as the CappucinoTrait method within the AllInOneCoffeeMaker
           and try to modify the method inside the AllInOneCoffeeMaker.
        7# create method on the CappucinoTrait first then create the same method on AllInOneCoffeeMaker. 
        8~ testing the method we created on CappucinoTrait.
*/  
$allInOneCoffeMaker->overrideByTheClassThatUseThis();   /*  the result      => Override By the App\_15Traits\AllInOneCoffeMaker(UPDATED)
                                                            expected result => Override By the App\_15Traits\AllInOneCoffeMaker

    ~ you can see the different of the output by comparing the code on CappucinoTrait
      and AllInOneCoffeeMaker method we've created
       ~ suppose some child class extends from the Base Class(parent Class) that's its method is same with the Trait used
         by the child class, the Trait is overriding the Base Class method, so when the child class is execute the method
         it will execute the method that's within the Trait, not on the Base Class.
      9# create the method on the base class first and create the same method within the Trait used by the child class
      10~ testing the method we created on LatteTrait.php
*/
$allInOneCoffeMaker->overrideByTheTrait();  /*  the result      => App\_15Traits\AllInOneCoffeMaker is making latte NOT Coffe here
                                                expected result => App\_15Traits\AllInOneCoffeMaker is making a coffee using Coffe Maker 

     ~ Trait has conflict resolution when one Trait has method's name that's same with the others Trait's method's name and
       both of the Trait, or more is used by some Classes.
       ~ so when object of the class called the method, PHP will give you an error that the object is confused what method
         that's gonna use because there's conflict resolution there.
       ~ say we have the same way on pouring the granule on both of the Cappucino and Latte.
      11# create a method that has the same name on both of the LatteTrait and CappucinoTrait
      12~ testing the same method we created on both of the LatteTrait and CappucinoTrait


$allInOneCoffeMaker->pourGranule();
        ~ php will give you a result like this:
            Fatal error: Trait method App\_15Traits\LatteTrait::pourGranule has not been applied as 
            App\_15Traits\AllInOneCoffeMaker::pourGranule, because of collision with 
            App\_15Traits\CappucinoTrait::pourGranule in 
            /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_15Traits/AllInOneCoffeMaker.php on line 6
        ~ this error because there's conflict resolution there
        ~ so the solution is using the insteadOf operator
        ~ insteadOf operator lets you specify which method to run/use when there's a conflict resolution like this
        ~ if you don't specify the method you're going to use, PHP will still give you an error like the above one.
        ~ say, we want to use the method conflict resolution on CappucinoTrait.
        13# use the pourGranule method's on CappucinoTrait than on the LatteTrait.
        14~ test the pourGranule method using AllIneOneCoffeMaker
*/
$allInOneCoffeMaker->pourGranule();  // => pouring granule on Cappucino
/* 
          ~ another solution is aliasing the method on LatteTrait, so the pourGranule method on both of the Trait
            could be use by Class that use the Trait.
          15# aliasing the pourGranule method on AllInOneCoffeMaker
          16~ testing the aliasing method
*/
$allInOneCoffeMaker->pouringGranule();  // => pouring granule on Latte
/*
          ~ also change the visiblity of the method could resolve this by problem. but doesn't recommended since it
            could change the visibility, expose the works of the abstraction.
          ~ say we have secret way on making the best Cappucino, and we put it on the CappucinoTrait.
          17# create the secret way on CappucinoTrait and go back to this file.
          18# after you create the secret way, now expose the method on AllInOneCoffeMaker.
          19~ testing the secret way on making the best cappucino
*/
$allInOneCoffeMaker->makeTheBestCappucino();  // => please, this is your BestCappucinoEverMade 
/* 
     ~ you could use Trait within the Trait, which give you power to compose Trait from other Trait.
     ~ you know that's your pourGranule conflicted, so you want to use the way of LatteTrait to pour Milk.
       NOTE:
        the only difference between latte and Cappucino is on way it has steamed-milk on it.  
     20# create method on LatteTrait on how to pour a milk    
     22~ now use the method you've created on LatteTrait
*/
$allInOneCoffeMaker->pourMilk();    // => pour 0.3 on steamed milk
/* 
     ~ when you just 'use CappucinoTrait', and the CappucinoTrait is 'use' the LatteTrait. then the functionality
       of the LatteTrait is exposed on Class that use the CappucinoTrait.
     ~ the property on LatteTrait after you created, you can't define the same name property on underlying
       class(class/Trait that use this Trait) but you can only define the exact same name, visibility, type
       and its value.
     ~ you can define abstract method on Trait, which make the Class/Trait that use that Trait must be implement
       the concrete definition
       ~ remember when a method is abstract, the class must be abstract.. Trait is special, so we don't make the 
         Trait abstract
     ~ you can also can specify the static properties and static method inside the Trait.
     23# create a static method and static properties  inside the LatteTrait on _15Trait directory
*/
App\_15Traits\LatteTrait::drawTheFoam();                // => design the foam to be heart
echo App\_15Traits\LatteTrait::$foamDesign . '<br />';  // => heart
/* 
     ~ when a Trait has a property each class that use the Trait will have the independence instance of 
       that property, unlike the inheritance where static property is Shared.
    24# create static public function on CoffeeMaker on _15Traits directory and go back to this file
      ~ when you change the static property on one class, the property on other class will change too
      ~ change static property on Coffee Maker and Change on LatteMaker
*/
App\_15Traits\CoffeMaker::$guarantee = 20;
App\_15Traits\LatteMaker::$guarantee = 10;

echo App\_15Traits\CoffeMaker::$guarantee . '<br />'; // => 10
/* 
      ~ how about static property inside the Trait, change static property of $foamDesign on AllInOneCoffeMaker
*/
App\_15Traits\AllInOneCoffeMaker::$foamDesign = 'start';
echo 'on AllInOneCoffeeMaker ' . App\_15Traits\AllInOneCoffeMaker::$foamDesign . '<br />';  // => on AllInOneCoffeeMaker start
echo 'on LatteTrait ' . App\_15Traits\LatteMaker::$foamDesign . '<br />';                   // => on LatteTrait heart
/* 
    ~ the magic class constant when using in a Trait will resolve to the class where the Trait is used
    ~ the final keyword on a method, that make sure you don't override the method when using in a Trait, the method
      still could be override.
*/
?>