<?php


/*  
    declare - ticks => detect how many statements that tickable, statements that cause
                     tick(cpu executing based on tick)
                        
*/
/*
function onTick() {
    echo 'Tick<br />';
}

// register the function that handle the tick
register_tick_function('onTick');

// how many tick to triggered the registered function ?
declare(ticks=1); // each 1 tick, triggered the onTick function
// declare(ticks=3); // each 3 tick, triggered the onTick function

$i = 0; // this cause a tick => Tick
$length = 10; // this cause a tick => Tick

while($i < $length) { // this cause a tick too => Tick
    echo $i++ . "<br />";
} // this cause a tick too => Tick

 =>
    Tick
    Tick
    Tick
    0
    Tick
    1
    Tick
    2
    Tick
    3
    Tick
    4
    Tick
    5
    Tick
    6
    Tick
    7
    Tick
    8
    Tick
    9
    Tick
    Tick
*/

// declare - encoding

// declare - strict_types => to enable the type strict checking
declare(strict_types=1); // applying this to all below the code

/* 
    if you include this file to another file, the declare in this
    file won't apply to the file that included it.

    if another file has declare(strict_types=1) and you try to include this file that doesn't declare
    anything, and when you try to pass something like sum('5', 20), php
    will convert that string into a number. you need to declare(strict_type=1) on both of them
*/

function sum(int $x, int $y) {
    return $x + $y;
}

echo sum(10,20) . "<br />"; // OK => 30
// echo sum('afasd', 20) . "<br />"; // error => blank

?>