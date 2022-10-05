<?php
$firstName = 'Muhammad Faza';
$lastName = "$firstName Akbar";
/*
    you can assign it like these :
    "${firstName} Akbar";   // more readable
    "{$firstName} Akbar";   // more readable

*/
echo $lastName . "<br />";      // => Muhammad Faza Akbar
/*
    what's the difference between double quotes and single quote ?
    double quotes you can insert the variable name,
    the single quote you can't
*/

// you can access the specific character on the string
echo $lastName[0] . "<br />"; // => M
echo $lastName[1] . "<br />"; // => u

// you can access the last character
echo $lastName[-1] . "<br />"; // the last one => r
echo $lastName[-2] . "<br />"; // the last two => a 

// you can change the specific character on the string
$lastName[9] = 'Z'; // change the 'F' letter with 'Z'
echo $lastName . "<br />"; // => Muhammad Zaza Akbar

// how about access far away from the actual length of the string
var_dump($lastName); // => how long the $lastName string?
echo "<br />"; // => string(19) "Muhammad Zaza Akbar" 
$lastName[20] = 'f';
$lastName[21] = 'a';
echo $lastName . "<br />"; // => Muhammad Zaza Akbar fa
// be aware to do operation like this. you can miss something that erase all strings

// i want to create a long string and multiline string
// PHP provided you by syntax Heredoc and Nowdoc
// Heredoc treat string as if double quotes
// Nowdoc treat string as if single quotes

/* 
    Heredoc syntax => 
    <<<IDENTIFIER_NAME => open string multiline
    IDENTIFIER_NAME; => close it

*/ 
$text = <<<LINE
line 1
line 2
line 3
LINE;

echo $text . "<br />"; // => line 1 line 2 line 3
// why don't the newline shows up ? nl2br method
echo nl2br($text); 
/*  =>  line 1
        line 2
        line 3
*/

echo "<br />";

$ln_1 = 1;
$ln_2 = 2;
$ln_3 = 3;

// because it treat like double qauotes, we can insert variable 
$text = <<<TEXT
line $ln_1
line $ln_2
line $ln_3
TEXT;

echo nl2br($text);
/*  =>  line 1
        line 2
        line 3
*/
echo "<br />";

/* 
    Nowdoc syntax => 
    <<<'IDENTIFIER_NAME' => open string multiline
    IDENTIFIER_NAME; => close it

*/ 

$text = <<<'TEXT'
line $ln_1
line $ln_2
line $ln_3
TEXT;

echo nl2br($text) . "<br />";
/* =>   line $ln_1
        line $ln_2
        line $ln_3
*/

// you can embed HTML using Heredoc or Nowdoc
$htmlElement = <<<'HTML'
<h1>Hello World</h1>
HTML;

echo $htmlElement . "<br />";

// sometimes the browser doesn't show the space that you
// created on the Heredoc or Nowdoc
$text = <<<TEXT
    Faza Akbar
TEXT;
echo $text . "<br />";  // => Faza Akbar // the result is without the space
var_dump($text);        // string(14) " Faza Akbar" 
?>
