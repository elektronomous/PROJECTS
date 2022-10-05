<?php

// arrays => variable that you can store multiple type of values
// defining an arrays be like:

$programmingLanguages = ['PHP', 'Java', 'Python'];

/* 
    or you can define it by:
        $programmingLanguages = array('PHP','Java','Python');

    => remember when access specified the character of the string,
        that's the way we access the array too.
*/
echo $programmingLanguages[0] . "<br />"; // => PHP
echo $programmingLanguages[-1] . "<br />"; // =>  blank / some time it will give a warning

/* 
    unlike the string, you can't access array from the back using -1.
    you can't also access the index that doesn't exist

*/
echo $programmingLanguages[3] . "<br />"; // => blank / null / some time it will give a warning

// i dont want get warning ? array has check the index method if the index is exist
var_dump(isset($programmingLanguages[3])); // => bool(false), because the index isn't exist
echo "<br />";

// you can change the contents of the array
$programmingLanguages[1] = "Haskell"; // change "Java" to "Haskel";

// more readable to see the contents of the array is using <pre> tag
echo "<pre>"; print_r($programmingLanguages); echo "</pre><br />";
/* 

Array
(
    [0] => PHP
    [1] => Haskell
    [2] => Python
)

*/

// to get the length of the array
echo count($programmingLanguages) . "<br />"; // => 3

// oh we forgot to add "C++" as the programming languages too, so..
$programmingLanguages[] = "C++"; // push the "C++" string to the array

echo "<pre>"; print_r($programmingLanguages); echo "</pre><br />";
/* 

Array
(
    [0] => PHP
    [1] => Haskell
    [2] => Python
    [3] => C++
)

*/
echo count($programmingLanguages) . "<br />"; // => 4

// hmm i want to insert multiple programming languages to the array. so..
array_push($programmingLanguages, "C", "Java", "HTML", "Javascript");
/* 
    how the array_push works ? you passed the variable as references, so it can
    be modify by the function(array_push) and then insert the parameter that you
    passed after the variable

*/

echo "<pre>"; print_r($programmingLanguages); echo "</pre><br />";
/* 

Array
(
    [0] => PHP
    [1] => Haskell
    [2] => Python
    [3] => C++
    [4] => C
    [5] => Java
    [6] => HTML
    [7] => Javascript
)

*/
echo count($programmingLanguages) . "<br />"; // => 8

// when we want to access the array, we use a number to index the array right ? 
// how about using another value, like a string
// PHP allowed you define your own keys
$programmingLanguages = [
    "php" => "8.0", // you can point to another type values
    "python" => "3.9"
];

echo "<pre>"; print_r($programmingLanguages); echo "</pre><br />";
/* 

Array
(
    [php] => 8.0
    [python] => 3.9
)

*/

// you can insert another keys too..
$programmingLanguages["go"] = "1.15";

echo "<pre>"; print_r($programmingLanguages); echo "</pre><br />";
/* 

Array
(
    [php] => 8.0
    [python] => 3.9
    [go] => 1.15
)

*/

// you can't access the array that its key's not specified
echo $programmingLanguages["C++"] . "<br />"; // => blank / warning / error;

// advance multiple arrays values
$programmingLanguages = [
    "php" => [
        "creator" => "Rasmus Lerdorf",
        "extension" => ".php",
        "website" => "www.php.net",
        "isOpenSource" => true,
        "versions" => [
            [
                "version" => 8,
                "releaseDate" => "Nov 26, 2020"
            ],

            [
                "version" => 7.4,
                "releaseDate" => "Nov 28, 2019"
            ]
        ]

    ],
    "python" => [
        "creator" => "Guido Van Rossum",
        "extensions" => ".py",
        "webiste" => "www.python.org",
        "isOpenSource" => true,
        "versions" => [
            [
                "version" => 3.9,
                "releaseDate" => "Oct 5, 2020"
            ],
            [
                "version" => 3.8,
                "releaseDate" => "Oct 14, 2019"
            ]
        ]
    ]
    ];

echo "<pre>"; print_r($programmingLanguages); echo "</pre><br />";

/* 
Array
(
    [php] => Array
        (
            [creator] => Rasmus Lerdorf
            [extension] => .php
            [website] => www.php.net
            [isOpenSource] => 1
            [versions] => Array
                (
                    [0] => Array
                        (
                            [version] => 8
                            [releaseDate] => Nov 26, 2020
                        )

                    [1] => Array
                        (
                            [version] => 7.4
                            [releaseDate] => Nov 28, 2019
                        )

                )

        )

    [python] => Array
        (
            [creator] => Guido Van Rossum
            [extensions] => .py
            [webiste] => www.python.org
            [isOpenSource] => 1
            [versions] => Array
                (
                    [0] => Array
                        (
                            [version] => 3.9
                            [releaseDate] => Oct 5, 2020
                        )

                    [1] => Array
                        (
                            [version] => 3.8
                            [releaseDate] => Oct 14, 2019
                        )

                )

        )

*/

// i want to access multidimensional array
echo $programmingLanguages['php']['website'] . "<br />"; // => www.php.net
// deeper access
echo $programmingLanguages['php']['versions'][0]['version'] . "<br />"; // => 8

/* 
    all keys must be string and integer, if you put the float on it, it will get
    converted to integer

    when you have the same key, it overwrite the created one.
    so for example

    when you have null as the key, you access the array with empty string("") 
    or using the null itself

*/
$array = [0 => "foo", 1 => "bar", "1" => "baz", null => "this null"];
echo "<pre>"; print_r($array); echo "</pre><br />";
/* 
Array
(
    [0] => foo
    [1] => baz
    [] => this null
)
*/

// when you insert key like the below array
// then the next key will be automatically specified
// by the result of the increasing the key that you inserted

$array = [1,2, 50 => "c", "d", "e"];
echo "<pre>"; print_r($array); echo "</pre><br />";

/* 
Array
(
    [0] => 1
    [1] => 2
    [50] => c
    [51] => d
    [52] => e
)
*/

// now removing array's elements
// using array_pop() will remove the last elements of the array
array_pop($array);
echo "<pre>"; print_r($array); echo "</pre><br />";

/* 
Array
(
    [0] => 1
    [1] => 2
    [50] => c
    [51] => d
)
*/

// using array_shift() will remove the first element of the array
array_shift($array);
echo "<pre>"; print_r($array); echo "</pre><br />";
/* 
Array
(
    [0] => 2
    [1] => c
    [2] => d
)

    notice when you use array_shift to remove the elements,
    the elements automatically reindex itself.
*/

// using the unset() 
unset($array[0]); // if you don't put the index, it destroy the entire array
/* 
    unset($array[0], $array[1]) => you can pass multiple value that you want to remove.
    the unset doesn't reindex the array's element when you use it to remove elements on an array,
    instead it retains the last index of the element when you sometime remove all the elements of
    the array.

        unset($array[0], $array[1], $array[2]); // remove all the elements of the array
        echo "<pre>"; print_r($array); echo "</pre><br />"; // => [] empty array
        $array[] = "1";
        echo "<pre>"; print_r($array); echo "</pre><br />"; // => Array([3] => 1);
    
*/
echo "<pre>"; print_r($array); echo "</pre><br />";
/* 
Array
(
    [1] => c
    [2] => d
)
*/

// casting to arrays
$x = 5;
var_dump((array)$x); // => array(1) { [0]=> int(5) } 
echo "<br />";

$x = "Hello";
var_dump((array)$x); // => array(1) { [0]=> string(5) "Hello" }
echo "<br />";

$x = null;
var_dump((array)$x); // => array(0) { } empty array
echo "<br />";

// if you wonder if the some key is exist inside an array
// you use the array_key_exist($key, $theArray) method that will return boolean value
$array = ['a' => 1, 'b' => null];

var_dump(array_key_exists('a',$array)); // => bool(true) 
echo "<br />";
var_dump(array_key_exists('b', $array)); // => bool(true)
echo "<br />";

// when you use isset(), it makes sure that the key also has a value
// if null then it returns false value.
var_dump(isset($array['a'])); // => bool(true)
echo "<br />"; 
var_dump(isset($array['b'])); // => bool(false)
echo "<br />";

?>