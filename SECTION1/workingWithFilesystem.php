<?php

require_once('helpers/print_array.php');

# SCAN_DIR => scan_dir(__DIR__); 
/* 
    scan_dir allow you to display the directory which where your code reside. using __DIR__
    predefined constant, its current directory where you reside.

*/

echo __DIR__ . "<br />"; // => /opt/lampp/htdocs/PROJECTS/SECTION1

/* 
    Not recommended to show this directory when you deploying this site
*/

printArray(scandir(__DIR__));
/* 
=>  Array
    (
        [0] => .
        [1] => ..
        [2] => array.php
        [3] => basicApache.php
        [4] => boolean.php
        [5] => datatype.php
        [6] => date.php
        [7] => declare.php
        [8] => demo.php
        [9] => errorHandling.php
        [10] => expression.php
        [11] => float.php
        [12] => fntype.php
        [13] => functionParam.php
        [14] => function.php
        [15] => functionTypes.php
        [16] => helpers
        [17] => index.html
        [18] => integer.php
        [19] => looping.php
        [20] => matchexpr.php
        [21] => null.php
        [22] => operator.php
        [23] => parameter.php
        [24] => public
        [25] => require
        [26] => return.php
        [27] => staticVar.php
        [28] => string.php
        [29] => usingScopeVar.php
        [30] => variablescope.php
        [31] => workingWithArray.php
        [32] => workingWithFilesystem.php
    )

    this file is reside on __DIR__
*/

$curDir = scandir(__DIR__);

# it's so many file there, but there's a directory too right ? you dont wanna check them
if(is_file($curDir[2]))                         // if "array.php" is a file ?
    echo $curDir[2] . " is a file <br />";      // => array.php is a file 
if(is_dir($curDir[2]))                          // if "array.php" is a directory ?
    echo $curDir[2] . " is a directory <br />";
else
    echo $curDir[2] . " is a file <br />";      // => array.php is a file 


// now you wanna create a directory, or even delete it 
# MKDIR => mkdir($directoryName, recursively), recursively means you are about to make directory inside a directory
// mkdir('newDir',0777); // => Warning:  mkdir(): Permission denied in /opt/lampp/htdocs/PROJECTS/SECTION1/workingWithFilesystem.php on line 73

/* 
    permission denied means you can't make a directory to specified directory.
    linux has permission to create directory using sudo in terminal command.
    but we don't do that since this for practical purpose.

    to make a directory using this permission is to change this file permission
    type this on command line:
        sudo chmod 666 workingWithFilesystem.php
*/
# RMDIR => rmdir($directoryName);

# consider you're a viewing on a bunch of list that make you confused, then you wanna search some file
# FILE_EXISTS => file_exists($fileOrDirName);
/* 
if(file_exists('foo.txt')) {

    # FILESIZE => filesize($fileOrDirName), show you the file's size
    echo filesize('foo.txt') . "<br >"; // the file size before we put contents on it => 0

    // make sure the foo.txt has permission to read/write
    // on linux you just need to type:
    //      sudo chmod 666 foo.txt
    // on the command line

    file_put_contents('foo.txt', 'this foo.txt after write to it');
    // you need to clear the cache first, so you can see the change to the file
    clearstatcache(); 

    echo filesize('foo.txt'); // after write into the file =>

} else
    echo 'File not found<br />';
*/

# FOPEN => fopen($filename, $readOrWriteMode)
# fopen give you a control over a resource(file or directory)
/* 
    this way isn't recommended:
        $file = fopen('foo.txt', 'r'); // r for reading the file
    always chech if the file exist


*/
$file = '';
if(file_exists('foo.txt')) {
    $file = fopen('foo.txt', 'r');
    echo "inside foo.. <br />";

    var_dump($file);
    echo "<br />";

    // read the file, then display to the browser
    while(($line = fgets($file)))
        echo $line . "<br />"; // => this foo.txt after write to it
    
    // read the file, return it as array
    while(($line = fgetcsv($file, strlen($line), ' ')))
        echo $line;
    
    // after opening a file, you need to close
    fclose($file);
}else
    echo "File not found<br />";

# FILE_GET_CONTENTS => file_get_contents($filename);
// another way to reading the file, the alternative for the fopen($filename, 'r')
$contents = file_get_contents('foo.txt');

echo $contents . "<br />"; // => this foo.txt after write to it

// also you can specify get the string for specified position
$contents = file_get_contents('foo.txt', offset: 5, length: 3);

echo $contents . "<br />"; // => foo

# FILE_PUT_CONTENTS => file_put_contents($filename, $theContentYouWannaWrite)
/*  
 if the file doesn't exist, the file_put_contents will create it and write into it.
 the file will override by the file_put_contents()
    file_put_contents('foo.txt', "foo.txt after using file_put_contents on this " . __FILE__);
 
 if you wanna append some text into the foo.txt
    file_put_contents('foo.txt', 'appending this text', FILE_APPEND);   
*/

# UNLINK => unlink($filename)
// delete the file
//      unlink('foo.txt'); // will delete the foo.txt file
# COPY => copy($sourceFile, $destFile);
// copy the $sourceFile, into new $destFile. if $destFile exist, then override it.
//      copy('foo.txt', 'bar.txt');
# PATH_INFO => path_info($filename)
// show information about the path of the file with its extensions
echo "<br />";
var_dump(pathinfo(__DIR__));
/* 
=>  array(3) {
    ["dirname"]=>
    string(26) "/opt/lampp/htdocs/PROJECTS"
    ["basename"]=>
    string(8) "SECTION1"
    ["filename"]=>
    string(8) "SECTION1"
    }
*/

echo "<br />";
var_dump(pathinfo('foo.txt'));
/* 
=>  array(4) {
    ["dirname"]=>
    string(1) "."
    ["basename"]=>
    string(7) "foo.txt"
    ["extension"]=>
    string(3) "txt"
    ["filename"]=>
    string(3) "foo"
    }
*/
?>