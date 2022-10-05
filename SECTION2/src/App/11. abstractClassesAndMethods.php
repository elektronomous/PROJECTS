<?php


/* 
    1~ abstract class is like a template or a base class that the child
       or the concrete(non-abstract) class can extended from.
     ~ this is done by leveraging the power of inheritance
     ~ there a few rules when it comes to abstract classes and abstract method:
       ~ abstract class can't be instantiate, you can only extended which means you can't
         create a object directly from the abstract class.
       ~ abstract class have a abstract method that only contains the method signature or the definition
         without actual implementations
       ~ if you have an abstract method within the ordinary class, you must change the class to the abstract class
     ~ basically the abstract class knows the WHAT, but it doesn't know the HOW 
     ~ the HOW part is implemented within the child classes, so the child is responsible to implement this
       abstract method.
     ~ look at the example below:
                                                        ||||||||||||||
                                                        |    Field   |
                                                        ||||||||||||||
             _________________________________________________|__________________________________________________       
            |                                            |                          |                           |
       ||||||||||||||                              ||||||||||||||            ||||||||||||||              ||||||||||||||
       |    Text    |                              | Text Area  |            |  Boolean   |              |    .....   |
       ||||||||||||||                              ||||||||||||||            ||||||||||||||              ||||||||||||||
        _____|___________________________                |                   ______|_________
       |                |               |                |                  |               |
 ||||||||||||||  ||||||||||||||  ||||||||||||||     ||||||||||||||     ||||||||||||||  ||||||||||||||
 |    Email   |  |    Number  |  | Date/Time  |     |  WSIWYG    |     |  Checkbox  |  |  Radio     |
 ||||||||||||||  ||||||||||||||  ||||||||||||||     ||||||||||||||     ||||||||||||||  ||||||||||||||
                  _____|________
                 |             |
          ||||||||||||||  ||||||||||||||
          |  Checkbox  |  |  Radio     |
          ||||||||||||||  ||||||||||||||
     
    2# let's implement this in simple version, create _11abstractClassesAndMethods directory and create all of those
        field
    3~ testing all of the implementation Field and its child class   
*/
require_once(__DIR__ . "/../vendor/autoload.php");


$fields = [
    /* 
        6~ comment this abstract class instantiation: 
            new App\_11abstractClassesAndMethods\Field('baseField'), 
    */
    new App\_11abstractClassesAndMethods\Text('textField'),
    /* 
        11~ comment the Boolean out because we declare it as an abstract class
            new App\_11abstractClassesAndMethods\Boolean('booleanField'), 
    */
    new App\_11abstractClassesAndMethods\Radio('radioField'),
    new App\_11abstractClassesAndMethods\Checkbox('checkboxField')
];

foreach($fields as $field) 
    echo $field->render() . "<br />";

/* 
     ~ if you look at the first instantitate on the $fields array, you'll notice
       that our abstract class instantiate itself. this is a problem, because
       abstract class don't instantiate itself.
    4# go to the Field.php and add 'abstract' keyword, so in this file we cannot
       create an instantiate of the abstract class. after you created, go back to this file
    5~ once you create an abstract file, and if you don't remove the first instantiate on the
       $fields array, php will give you an error:
            !! Fatal error: Uncaught Error: Cannot instantiate abstract class 
            App\_11abstractClassesAndMethods\Field in 
            C:\xampp\htdocs\php\section2\src\App\11. abstractClassesAndMethods.php:44
            Stack trace: #0 {main} thrown in 
            C:\xampp\htdocs\php\section2\src\App\11. abstractClassesAndMethods.php
            on line 44
    6# comment the first instantiation of $fields
    7# go the field php
    10~ after you create the abstract class on Boolean.php, then you must modify the $fields array
        where Boolean is instantiating itself.
    11# comment the Boolean instantiating code on $fields array.
    12~ because we're inheritance from the abstract class, the child class must follow the regulation
        of inheritance and signature compatibility rule 
      ~ methods that overriding on the child class can add argument with the default values and this
        implement the abstract method as well.
      ~ if you see on the Field.php, the render method has no parameter type. but on overriding class on
        the child class, you can add parameter with the default values. say the child class is the Text.php:
              class Text extends Field{
                  public function render($x = 1): string {
                    return <<<HTML
                    <input type='text' name="{$this->name}">
                    HTML;
              }
      ~ if you put only the parameter, not with the default values. php will throw you an error because the it doesn't
        compatible with signature rule of the parent class.
    13~ you can only define the abstract methods as public or protected, you can't declare them as private. because 
        you can't override the private method, while the abstract method must be implement on the child class.
    14? when do we use abstract class and abstract methods
      ~ you use the abstract class and abstract methods when you want the child doing the implementation while
        the abstract class provide the base functionality.
      ~ now if you encounter some situtation where is there are huge of abstract methods you're going to create. then
        the alternative for this is using the interface 
*/


?>