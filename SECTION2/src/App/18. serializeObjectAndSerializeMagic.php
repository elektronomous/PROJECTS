<?php

require_once(__DIR__ . "/../vendor/autoload.php");

use App\_18serializeObjectAndSerializeMagic\Invoice;

/* 
    1~ serialization is simply a process of converting a value to in a string form.
     ~ you can serialize any type of data(value) unless for the resource types, closures
       and some of the built-in PHP objects
     ~ lets serializing
*/
echo serialize(true) . "<br />";                    //  => b:1;
echo serialize(1) . "<br />";                       //  => i:1;
echo serialize(2.5) . "<br />";                     //  => d:2.5;
echo serialize('hello world') . "<br />";           //  => s:11:"hello world";
echo serialize([1,2,3]) . "<br />";                 //  => a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}
echo serialize(['a'=>1, 'b'=>2, 'c'=>3]) ."<br />"; //  => a:3:{s:1:"a";i:1;s:1:"b";i:2;s:1:"c";i:3;}
/* 
    ~ also you can unserialize them
*/
var_dump(unserialize(serialize(['a'=>1, 'b'=>2, 'c'=>3]))); echo "<br />";  // => array(3) { ["a"]=> int(1) ["b"]=> int(2) ["c"]=> int(3) } 
/* 
    ~ serialization can be userfull to pass PHP values around or save them for later use in the database
      or store them somewhere else 
    ~ when serializing object it will serialize its properties and its values as well as the class name, but the methods
      doesn't get serialized
    ~ whenever you serializing object and store it on a database for later use, make sure the class of the object is exist
      as well as the method that it needs once you unserialize that string
    ~ let's serialize an object 
*/

$invoice = new Invoice();
var_dump(serialize($invoice)); echo "<br />";
/* 
    => string(212) "O:47:"App\_18serializeObjectAndSerializeMagic\Invoice":3:{
            s:51:"App\_18serializeObjectAndSerializeMagic\Invoiceid";s:13:"Invoice_79811";  => when you set the property to private, 
                                                                                               then the class name will combine with the property name
            s:10:"*prot_id";s:13:"Invoice_79811";   => when you set the property to protected,
                                                       then the class name will replace by '*' (asterisk)
            s:6:"pub_id";s:13:"Invoice_79811";  => when you set the property to public,
                                                   then the class name will remove, and just property name
        }" 
    
    actual result => string(212) "O:47:"App\_18serializeObjectAndSerializeMagic\Invoice":3:{s:51:"App\_18serializeObjectAndSerializeMagic\Invoiceid";s:13:"Invoice_79811";s:10:"*prot_id";s:13:"Invoice_79811";s:6:"pub_id";s:13:"Invoice_79811";}"
    
    ~ suppose that you've stored the actual result, then you want to unserialize it
*/
var_dump(unserialize('O:47:"App\_18serializeObjectAndSerializeMagic\Invoice":1:{s:2:"id";s:13:"Invoice_62739";}'));
echo "<br />";
/* 
        => object(App\_18serializeObjectAndSerializeMagic\Invoice)#2 (1) { ["id":"App\_18serializeObjectAndSerializeMagic\Invoice":private]=> string(13) "Invoice_62739" } 

    ~ when you unserialize an object, it actually create a new object which point different memory area.
    ~ to prove it let's create two object
*/
$str = serialize($invoice);
$invoice2 = unserialize($str);

var_dump($invoice); echo "<br />";
var_dump($invoice2); echo "<br />";
var_dump($invoice2 === $invoice); echo "<br />";    // => bool(false)

/* 
    ~ as you can see the result is different
    ~ and accidentally we have another way to created an object, and the different using the clone keyword
      and using the serialize unserizlie function
      ~ clone keyword to make shallow copying object
      ~ serialize unserialize keyword to make deep copying/deep cloning
    ~ don't pass untrusted data to unserialize function this can be exploited and unintended code can be loaded and executed when
      the object is reinitialized during unserialization 
     

*/

?>