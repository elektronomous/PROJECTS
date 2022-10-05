<?php

require './helpers/print_array.php';

# SOME ARRAYS FUNCTIONS
$arrayWithKey = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 4, 'g' => 10, 'h' => 5];

# ARRAY_CHUNKS => array_chunk($array, $splitIntoNlength, preserveKeys:true/false);
// array_chunk split the array into the length but keep the result in array
printArray(array_chunk($arrayWithKey, 2));
/* 
=>  Array
    (
        [0] => Array
            (
                [0] => 1
                [1] => 2
            )

        [1] => Array
            (
                [0] => 3
                [1] => 4
            )

        [2] => Array
            (
                [0] => 5
            )

    )
*/

// where is the key ? insert true for preservKeys parameter
printArray(array_chunk($arrayWithKey, 2, true));
/* 
=>  Array
    (
        [0] => Array
            (
                [a] => 1
                [b] => 2
            )

        [1] => Array
            (
                [c] => 3
                [d] => 4
            )

        [2] => Array
            (
                [e] => 5
            )

    ) 
*/

# ARRAY_COMBINE => array_combine($arrayThatWillBeTheKeys, $arrayThatWillBeTheValue);
// array_combine will create new array using combination keys, and value. throw error if both arrays
// length isn't same
$arrayThatWillBeTheKeys = ['a','b','c'];
$arrayThatWillBeTheValue = [1,2,3];

printArray(array_combine($arrayThatWillBeTheKeys, $arrayThatWillBeTheValue));
/* 
=>  Array
    (
        [a] => 1
        [b] => 2
        [c] => 3
    )
*/

# ARRAY_FILTER => ARRAY_FILTER($theArray, $callBackFunctionToIterateOvertheArray, mode)
/*  
    array_filter using the callback function to iterate over $theArray and create a new array
    based on the true statements returned by callback function, discard the false value.
    the mode is use to which argument to be pass to the callback, whether keys or value.
    
    + if you dont specify the callback function, then the array_filter will manually
    filter the false-value(0, [], '', null, 0.0, so on) in the array

*/
$filterEvenNumber = [1,2,3,4,5,6,7,8,9];
printArray(array_filter($filterEvenNumber, fn($number) => $number % 2 === 0));
/* 
=>  Array
    (
        [1] => 2
        [3] => 4
        [5] => 6
        [7] => 8
    )
*/

// i want the keys in order,

# ARRAY_VALUES => array_values($array) 
/* 
    in associative array, there is a key and a values. so to get the values
    you se ARRAY_VALUES function. literally using this function will reindex
    the key
*/
printArray(array_values(array_filter($filterEvenNumber, fn($number) => $number % 2 === 0)));
/* 
=>  Array
    (
        [0] => 2
        [1] => 4
        [2] => 6
        [3] => 8
    )
*/

# ARRAY_KEYS => array_keys($array, mixed $search_value, bool $strict = false)
/* 
    in associative array, there is a key and a values. so to get the KEYS
    you use ARRAY_KEYS function. also you can search the value that you passed 
    on to $search_value, to get the key that's value is $search_value.

*/

printArray(array_keys($arrayWithKey));
/* 
=>  Array
    (
        [0] => a
        [1] => b
        [2] => c
        [3] => d
        [4] => e
    )
*/

printArray(array_keys($arrayWithKey, 4)); // get the all keys that have value 4
/* 
=>  Array
    (
        [0] => d
        [1] => f
    )
*/

# ARRAY_MAP => array_map($callbackFunctionAppliesToEachElementOftheArray,$theArray, array ...$array);
/* 
    it's like the substitute for the foreach loop here with advance function.
    maybe you wanna extract new array from $theArray like doing operations, get the result.
    or you maybe wanna extract new array from combine the operations on two $array.

*/

printArray(array_map(fn($el) => $el * 2, $filterEvenNumber));
/* 
=>  Array
    (
        [0] => 2
        [1] => 4
        [2] => 6
        [3] => 8
        [4] => 10
        [5] => 12
        [6] => 14
        [7] => 16
        [8] => 18
    )
*/

$array1 = ['a' => 2, 'b' => 3, 'c' => 5];
$array2 = ['d' => 3, 'e' => 5, 'f' => 10];

printArray(array_map(fn($elOnArray1, $elOnArray2) => $elOnArray1 * $elOnArray2, $array1, $array2));

/* 
=>  Array
    (
        [0] => 6
        [1] => 15
        [2] => 50
    )
    when doing operations on both array, make sure that the arrays
    have the same length, because the operations is parralel. for example if we 
    discard the 'c' and its value 5 then the operation would be end up like:
        Array
        (
            [0] => 6
            [1] => 15
            [2] => 0        => because the f will multiplied by 0
        ) 
*/

# ARRAY_MERGE => array_merge(array ...$array);
// allow you merge array
$array1 = [1,2,3];
$array2 = [4,5,6];
$array3 = [7,8,9];

printArray(array_merge($array1, $array2, $array3));
/* 
=>  Array
    (
        [0] => 1
        [1] => 2
        [2] => 3
        [3] => 4
        [4] => 5
        [5] => 6
        [6] => 7
        [7] => 8
        [8] => 9
    )

    + for associative array, when you have multiple arrays and some of the key 
    is same within the other array then the value of the last array will replace 
    the other key's value which key is same. 
*/

$array1 = ['a' => 1, 'b' => 2, 'c' => 3];
$array2 = ['d' => 3, 'b' => 10];

printArray(array_merge($array1, $array2));
/* 
=>  Array
    (
        [a] => 1
        [b] => 10   => the key 'b' on $array1 value is got replaced by the key 'b' values on $array2 
        [c] => 3
        [d] => 3
    )
*/

# ARRAY_REDUCE => array_reduce($theArray, $callbackFunc, mixed $initialValueFor$Sum = null): mixed 
/* 
    array_reduce will reduce the array into a single value which the result
    from the callbackfunction
*/
$invoiceItems = [
    ['price' => 9.99, 'qty' => 3, 'desc' => 'Item1'],
    ['price' => 29.99, 'qty' => 1, 'desc' => 'Item2'],
    ['price' => 149, 'qty' => 1, 'desc' => 'Item3'],
    ['price' => 14.99, 'qty' => 2, 'desc' => 'Item4'],
    ['price' => 4.99, 'qty' => 4, 'desc' => 'Item5']
];

echo array_reduce($invoiceItems,
                  fn($sum, $items) => $sum + ($items['qty']*$items['price']),
                  0) . "<br />"; // => 258.9
echo array_reduce($invoiceItems,
                  fn($sum, $items) => $sum + ($items['qty']*$items['price']),
                  100) . "<br />"; // => 358.9

# ARRAY_SEARCH => ARRAY_SEARCH($valueYouSearchOnArray, $theArray, strict mode=false);
/* 
    array_search will return the index in which the value is found.
    if some value within the array are same, then the first match will return.
    you can use in_array() function as the alternative to array_search function.
*/
$array = [1,2,3,4,5,6,7,5,2,3];
echo array_search(5, $array); // => 4

/* 
    array_search will return false if the value you search isn't exist.
    but when you search value and it's found and the array_serach return
    the index 0 which when you compare with loose comparison like:
        if(foundIndex == false) 
    this evaluates to be true. be care full for this
*/

# IN_ARRAY => IN_ARRAY($theValueWithinArray, $theArray)
/* 
    in_array() function provided to alternative as the array_search()
    function. it return false if the value you search doesn't exist, otherwise true
*/

if(in_array(5, $array)) echo "there's 5 on the array <br />";

# ARRAY_DIFF => array_diff(array ...$array);
/* 
    array_diff() function will compare the first array value(not key remember!), 
    with the others array, search for the differences and return the first array itself
*/

$array1 = ['a' => 2, 'b' => 3, 'c' => 5];
$array2 = ['d' => 3, 'e' => 5, 'f' => 10];

printArray(array_diff($array1, $array2));
/* 
=>  Array
    (
        [a] => 2
    )
*/

# ARRAY_DIFF_ASSOC => array_diff_assoc(array ...$array);
/* 
    array_diff_assoc() function will compare the first array's key and value, 
    with the others array, search for the differences and return the first array itself
*/

printArray(array_diff_assoc($array1, $array2));
/* 
=>  Array
    (
        [a] => 2
        [b] => 3
        [c] => 5
    )
*/

$array1 = ['a' => 2, 'd' => 3, 'c' => 5];
$array2 = ['d' => 3, 'e' => 5, 'f' => 10];

printArray(array_diff_assoc($array1, $array2));
/* 
=>  Array
    (
        [a] => 2
        [c] => 5
    )

*/

# ARRAY_DIFF_KEY => array_diff_key(array ...$array);
/* 
    array_diff_asoc() function will compare the first array's key (not value remember!), 
    with the others array, search for the differences and return the first array itself
*/
$array1 = ['a' => 2, 'd' => 3, 'e' => 5];
$array2 = ['z' => 10, 'e' => 5, 'f' => 10];

printArray(array_diff_key($array1, $array2));
/*
=>  Array
    (
        [a] => 2
        [d] => 3
    ) 
*/

?>