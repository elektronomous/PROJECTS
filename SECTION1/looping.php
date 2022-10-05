<?php

// LOOPING => execute statements multiple times

# while
$i = 0;
while($i < 15) { // the expression inside while, that's $i < 15 will evaluate
                 // and as long as if it true then execute the statement inside
                 // the curly braces. if false, then out the loop

    echo $i++ . " "; // => 0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 
}
echo "<br />";

// oh you want to control the while loop
// php provided you by break and continue statements

// BREAK => will break the loop
$i = 0; // reset
while(true) {   // infinite looping
    while($i > 15)
        break 2; // breaking the two-level loop, so break the while(true) too.
                 // if you just use break, without 2, then it only break the
                 // first loop, not the while(loop). so it will infinite looping
    echo $i++ . " "; // => 0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 
}
echo "<br />";

// CONTINUE => skip the whole code below it, and get back to evaluates the expression of
//             the loop

$i = 0; // reset
while($i < 15) {
    while($i % 2 === 0){
        $i++;
        continue; // skip the code below it, then start evaluate from the beginning while($i < 15)
    }
    echo $i++ . " "; // => 1 3 5 7 9 11 13 15
}
echo "<br />";

// when embedding to HTML while-loop has alternative syntax => it applies to foreach and for-loop
$i = 0; // reset
while($i < 15):
    while($i % 2 === 0) {
        $i++;
        continue 2; // continue 2 means skip the first loop, and then evaluates the second expression loop
                    // that's why the difference result with above one
    }
    echo $i++ . " "; // => 1 3 5 7 9 11 13
endwhile;
echo "<br />";

# do-while => guarantess you that the loop must be run once in a loop because the expression
#             is after the statements

$i = 0; // reset
do {
    echo $i++ . " "; // run first => 0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 
}while($i < 15);     // then check the condition expression
echo "<Br />";


# for => looping with 3 expression. for(expr1; expr2; expr3)
# the first expression => will only evaluates once,
# the second expression => will always evaluates until the for-loop out of the loop
# the third expression => will evaluates after the expression-2 and the statements inside the curly braces
for($i = 0; $i < 15; $i++) {
    echo $i . " "; // => 0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 
}
echo "<br />";

/*
    how to infinite loop with for-loop ? for(;;)

*/

// now you know that the print function is an expression because it returns value right?
// how about i have multiple expression.. php allowed that, you just need to add (',')
for($i = 0; print $i . " ", $i<15; $i++); // => 0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 
echo "<br />";

// some tips
$myFirstName = "Faza";
for($i = 0; $i < strlen(($myFirstName)); print $i . " ", $i++); // => 0 1 2 3
echo "<br />";
// the operation that always evaluate in the middle, and the function it invoked
// every time the evaluation happen make this operations is so expensie
// so how to fix that
for($i = 0, $len = strlen($myFirstName); $i < $len; print $myFirstName[$i] . " ", $i++); // => Faza
echo "<br />";
// the strlen only evalute once right ? because it's first-expression

// you can also print on the 
// foreach => is to use to iterate(loop) over arrays / objct
$programmingLanguages = ['PHP', 'JavaScript', 'C++', 'go', 'rust'];

foreach($programmingLanguages as $language) { // assign to the $language the current element of $programmingLanguages
    echo $language . " "; // => PHP JavaScript C++ go rust 
}
echo "<br />";

// remember array has key with a value ? 
foreach($programmingLanguages as $key => $language){ // you can set the $key to another name you'd like
    echo $key . " => " . $language . "<br />";
    /* 
       =>   0 => PHP
            1 => JavaScript
            2 => C++
            3 => go
            4 => rust
    */
}

// the $language is still there when after we finish the loop
echo $language . "<br />"; // => rust
// this isn't recommended because you can deliberately use this keyword
// to use to another code, so unset it
unset($language);

// hey while looping, you got an idea that you wanna modify the array
foreach($programmingLanguages as $key => &$language) { // it's like assign the element by the reference
    $language = 'PHP'; // set all the language to PHP
}
echo "<pre>"; print_r($programmingLanguages); echo "<pre><br />";
/* 
=>  Array
    (
        [0] => PHP
        [1] => PHP
        [2] => PHP
        [3] => PHP
        [4] => PHP
    )
*/
// remember the $language is still there, it's so dangerous when you
// have a variable that's value is assign by reference.
unset($language);

// i create an array like this, how to loop using foreach 
$user = [
    'name' => 'Faza',
    'email' => 'elektro@mail.com',
    'skills' => ['hacking','web programming','system programming', 'kernel programming']
];

// if you just foreach like the one above, when foreach reach the skills key, it will
// give you an error cause you would print the skills that value is an array, and that's impossible
// because if you don't looping the array, you can't print the array. so, the solution is

# using json_encode
foreach($user as $key => $value) {
    echo $key . ": " . json_encode($value) . "<br />";
    /*     
        name: "Faza"
        email: "elektro@mail.com"
        skills: ["hacking","web programming","system programming","kernel programming"]
    */
}

# using implode => implode(spacer, $array);
foreach($user as $key => $value) {
    echo $key . ": " . (is_array($value) ? implode(', ',$value) : $value) . "<br />";
    /* 
    =>  name: Faza
        email: elektro@mail.com
        skills: hacking, web programming, system programming, kernel programming
    */
}

# using foreach twice
foreach($user as $key => $value) {
    echo $key . ": ";
    if(is_array($value)) foreach($value as $val) echo $val . ", ";
    else echo $value;
    echo "<br />";
    /* 
    =>  name: Faza
        email: elektro@mail.com
        skills: hacking, web programming, system programming, kernel programming,
    */
}
?>