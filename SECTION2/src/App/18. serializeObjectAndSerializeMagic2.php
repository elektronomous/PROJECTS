<?php

require_once(__DIR__ . "/../vendor/autoload.php");
use App\_18serializeObjectAndSerializeMagic\Invoice2;

/* 
    ~ Class also has serialization magic method which change how object is serialize/unserialize
    3# create a property inside the Invoice.php on _18serializeObjectAndSerializeMagic directory 
    4~ testing the magic method of the sleep 
*/
$invoice = new Invoice2(25.22, 'Invoice1','123412341234');
var_dump(serialize($invoice)); echo "<br />";
/* 
    => string(256) "O:48:"App\_18serializeObjectAndSerializeMagic\Invoice2":2:{
        s:52:"App\_18serializeObjectAndSerializeMagic\Invoice2id";
        s:13:"Invoice_64262";s:56:"App\_18serializeObjectAndSerializeMagic\Invoice2amount";
        d:25.219999999999998863131622783839702606201171875;
    }"
*/
$str = serialize($invoice);
echo $str . "<br />"; 
/* 
    => O:48:"App\_18serializeObjectAndSerializeMagic\Invoice2":2:{
        s:52:"App\_18serializeObjectAndSerializeMagic\Invoice2id";
        s:13:"Invoice_16300";
        s:56:"App\_18serializeObjectAndSerializeMagic\Invoice2amount";
        d:25.219999999999998863131622783839702606201171875;
    }

    ~ there are few limitation of using __sleep and __wakeup method so we use the
      __seriallize and __unserialize magic method. you can think of __serialize and
      __unserialize method as the combination __sleep and __wakeup and Serialize interface
    ~ __serialize gets called prior to the serialization
      ~ it returns an array 
      ~ the difference between the __sleep and __serialize magic method on __sleep you must return
        the names of the property on an array, while on __serialize you must return an array that
        represent the object and it can be an associative array of key value pairs and can contain
        additional information other than the current properties, so you have full control of which
        you want to serialize 
    5# create __serialize magic method on Invoice2.php on _18serializeObjectAndSerializeMagic2 directory
    6~ unserialize the object we serialized
*/
$invoice2 = unserialize($str);
/* 
    array(4) { 
        ["id"]=> string(13) "Invoice_47303" 
        ["amount"]=> float(25.219999999999998863131622783839702606201171875)
        ["creditCardNumber"]=> string(16) "MTIzNDEyMzQxMjM0" 
        ["foo"]=> string(3) "bar" 
    }
    
    ~ using the result above you can reconstruct your data
    7# reconstruct the object by modifying the __unserialize magic method on Invoice2.php _18serializeObjectAndSerializeMagic directory
    8~ var_dumping the $invoice2 to see our constructed object
*/
var_dump($invoice2);
/* 
    => object(App\_18serializeObjectAndSerializeMagic\Invoice2)#2 (3) {
            ["id":"App\_18serializeObjectAndSerializeMagic\Invoice2":private]=> string(13) "Invoice_24782"
            ["amount":"App\_18serializeObjectAndSerializeMagic\Invoice2":private]=> float(25.219999999999998863131622783839702606201171875)
            ["description"]=> uninitialized(string)
            ["creditCardNumber":"App\_18serializeObjectAndSerializeMagic\Invoice2":private]=> string(12) "123412341234"
        }
*/
 

?>