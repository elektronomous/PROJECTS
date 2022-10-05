<?php

/* 
    1~ inheritance allows you to have a class that is derived from another class which also
       is referred to as parent child classes
     ~ parent class => is the base class that you derive from
     ~ the child will inherent the public and protected method constant and properties which
       then can be overridden
     ~ to make you clear, consider a toaster simulator that can toast bread.
    2# create a Toaster class then put it on the new folder named _10inheritance
       with its namespace
    4~ load the Toaster class and using its namespace
*/
require_once(__DIR__ . "/../vendor/autoload.php");
use App\_10inheritance\Toaster;
/* 8~ test the ToasterPro class */
use App\_10inheritance\ToasterPro;

$toaster = new Toaster();

$toaster->addSlice('bread');
$toaster->toast();          // => 1:Toasting bread
echo "<br />";

$toaster->addSlice('bread');
$toaster->toast();          // => 1:Toasting bread 2:Toasting bread
echo "<br />";

$toaster->addSlice('bread');
$toaster->toast();          // => 1:Toasting bread 2:Toasting bread
echo "<br />";
/* 
     ~ on the third execution, we don't get 3:Toasting bread because the toaster we have
       has the maximum to toast only 2 at the same time (3?)
     ~ Now say that the want the Toaster to increase its ability to toast breads that
       is more than 2, say 4.
    5# create another class that's increase the Toaster class ability and name it as
       the ToasterPro and put it on _10inheritance
    8~ testing the ToasterPro class 
*/
$toasterPro = new ToasterPro();

$toasterPro->addSlice('bread');
$toasterPro->toast();       // => 1:Toasting bread 
echo "<br />";
$toasterPro->addSlice('bread');
$toasterPro->toast();       // => 1:Toasting bread 2:Toasting bread 
echo "<br />";
$toasterPro->addSlice('bread');
$toasterPro->toast();       // => 1:Toasting bread 2:Toasting bread 3:Toasting bread 
echo "<br />";
$toasterPro->addSlice('bread');
$toasterPro->toast();       // => 1:Toasting bread 2:Toasting bread 3:Toasting bread 4:Toasting bread 
echo "<br />";
/* 
     ~ now if you addSlice to this $toasterPro, it only accept 4 as the maximum the ToasterPro
       could toast
*/
$toasterPro->addSlice('bread');
$toasterPro->toast();     // reach the max, don't add any bread => 1:Toasting bread 2:Toasting bread 3:Toasting bread 4:Toasting bread 
echo "<br />";
/* 
    9# go to the Toaster.php to get some explanation about $this variables
    10# go to the Toaster.php and create private properties and method same like the public one
    11~ now you can test method for toasting using toastPriv
*/
$toasterPro->addSlicePriv('breadPriv');
$toasterPro->addSlicePriv('breadPriv');
$toasterPro->addSlicePriv('breadPriv');
$toasterPro->addSlicePriv('breadPriv');
$toasterPro->toastPriv(); // => 1:Toasting breadPriv 2:Toasting breadPriv
echo "<br />";
/* 
     ~ as you see, you got the result for two toasting breadPriv, even though we specified
       4 in our child class right.
     ? how this could be 2 result, instead of 4
     ~ this because you cannot override the private member of Toaster, private properties belong and
       exist only in parent class, in Toaster class. TesterPro is trying to override the
       $priv_size property which is private property on Toaster, so you only can add 2 slice not 4. then
       when the toastPriv() method is call by the object of TesterPro, it display only two slice of breadPriv.
     ~ we can only access the public and protected properties/method of classes when inheriting from them.
     ~ another rule is that you cannot decrease the visibility of public property
       ~ the visibility has a rule:
         ~ public > protected
       ~ so when the Toaster.php has public properties/methods, you can't override them to protected or private.
       ~ but when you have protected properties/methods on parent class, you can increase them to public/protected and modify the values
       ~ you can INCREASE THE VISIBILITY, you can't still override the PROTECTED parent class.
    12# create protected properties and methods on Toaster.php that has functionality with the public one. 
    13~ now you can test method for toasting using toastProt
*/
$toasterPro->prot_size = 10; // ~ even you can modify them outside the class because you changed to public, not with the protected
$toasterPro->addSliceProt('breadPriv');
$toasterPro->addSliceProt('breadPriv');
$toasterPro->addSliceProt('breadPriv');
$toasterPro->addSliceProt('breadPriv');
$toasterPro->addSliceProt('breadPriv');
$toasterPro->addSliceProt('breadPriv');
$toasterPro->addSliceProt('breadPriv');
$toasterPro->addSliceProt('breadPriv');
$toasterPro->addSliceProt('breadPriv');
$toasterPro->toastProt();   // => 1:Toasting breadPriv 2:Toasting breadPriv 3:Toasting breadPriv 4:Toasting breadPriv 5:Toasting breadPriv 6:Toasting breadPriv 7:Toasting breadPriv 8:Toasting breadPriv 9:Toasting breadPriv

/* 
    14# now uninitialize the properties on Toaster.php and ToasterPro.php with commenting the code out and create a constructor
        which auto initialize the properties
    15~ when you create an object from ToasterPro.php after create a constructor you will get an error:
          !! Fatal error: Uncaught Error: Typed property App\_10inheritance\Toaster::$slices must not be accessed before 
          initialization in C:\xampp\htdocs\php\section2\src\App\_10inheritance\Toaster.php:46 Stack trace: #0 
          C:\xampp\htdocs\php\section2\src\App\10. Inheritance.php(43): App\_10inheritance\Toaster->addSlice('bread') 
          #1 {main} thrown in C:\xampp\htdocs\php\section2\src\App\_10inheritance\Toaster.php on line 46
      ~ this because you're overriding the method of the constructor of parent class within the ToasterPro.php and the 
        ToasterPro construct function replace the initialization of the $slices property on the Toaster.php. so when we call the 
        toast() method on ToasterPro which iterate through it, then the php will warn use by those error we see earlier.
      ? what is the solution
      ~ call the parent class constructor first
    16# call the parent class constructor inside the constructor of ToasterPro.php
    
    19~ when the name argument feature is allow, you'll get an error because:
            $toasterPro->addSlice(slice:'bread');
        the php will no longer know about the 'slice' because on ToasterPro.php, we replace
        the name 'slice' as 'sliceX'. so, make sure the parameter both of the class (parent & child)
        is same.
    20~ when you don't your class or your method to extended/inheritated you put 'final' keyword
        before the access modifier of the method, and before the class keyword.
    21# put the 'final' keyword on the toastPrive() and toastProt() method on the Toaster.php
    22~ php doesn't support multiple inheritance which means that you cannot extend more than one class.
        however it support multilevel inheritance which can be used to achieve hierarchical inheritance.
        ~ for example:
          ~ if we have another premium toaster ToasterPro, that has some additional features
            and it has extended features. we could create another toaster, we can call it ToasterProPro.
            This ToasterProPro will inherit public and protected methods properties and constant both of the
            ToasterPro and Toaster classes.
          Toaster -> ToasterPro -> ToasterProPro
*/

// TYPE HINTING CLASS TYPES
/* 
    23# create a simple function where you can pass a ToasterPro/Toaster object
        then toast a bread
    23~ create a simple function
*/
function foo(ToasterPro $toasterPro) {
  $toasterPro->toast();
  echo "<br />";
}

foo($toasterPro);
/* 
     ~ when we passed the $toaster to foo function, the php will give use an error:
       !! Fatal error: Uncaught TypeError: foo(): Argument #1 ($toasterPro) must be of type 
          App\_10inheritance\ToasterPro, App\_10inheritance\Toaster given, called in 
          /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/10. Inheritance.php 
          on line 148 and defined in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/10. Inheritance.php:142 
          Stack trace: #0 /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/10. Inheritance.php(148): 
          foo(Object(App\_10inheritance\Toaster)) #1 {main} thrown in 
          /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/10. Inheritance.php on line 142
     ~ the solution is using the "is a" relationship:
       ~ ToasterPro is a Toaster because it extended from Toaster
       ~ Toaster isn't a ToasterPro because it's a parent class
       so, from there we could simply know that we create a function that's parameter type is the
       parent class, so we could pass it's child classes.
*/
function foo1(Toaster $toaster) {
  $toaster->toast();
}

foo1($toasterPro); // => 1:Toasting bread 2:Toasting bread 3:Toasting bread 4:Toasting bread 
echo "<br />";
foo1($toaster); // => 1:Toasting bread 2:Toasting bread 
echo "<br />";




?>