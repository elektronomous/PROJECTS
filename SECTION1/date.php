<?php

// DATE & TIME =>
# TIME 
echo time() . "<br />"; // print seconds since 1 January 1970 => 1657663422

// how to convert days to seconds
$fiveDaytoSec = 5 * 24 * 60 * 60;
$currentTime = time(); 

echo $currentTime + $fiveDaytoSec . "<br />"; // this seconds is five days after this day => 1658095549

$yesterdayToSec = 24 * 60 * 60; // convert 1day before this day to seconds
echo $currentTime - $yesterdayToSec . "<br />"; // this is the yesterday => 1657577258

# DATE => return date, using format date string
/* 
    + DAY +

    d => Day of the month, 2 digits with leading zeros 		        | 01 to 31
    D => A textual representation of a day, three letters 		    | Mon through Sun
    j => Day of the month, without leading zeros			        | 1 to 31
    l => A full textual representation of the day of the week	    | Sunday through Saturday
    N => ISO-8601 Numeric representation of the day of the week	    | 1(for Monday) through 7(for Sunday)
    S => English ordinal suffix for the day of the month, 2 chars	| st, nd, rd, or th. works well with 'j'
    w => numeric representation of the day of the week		        | 0(for Sunday) through 6(for Saturday)
    z => the day of the year(starting from 6)			            | 0 through 365

    + WEEK +
    w => ISO-8601 week number of year, weeks starting on Monday	    | Example: 42(the 42nd week in the year)

    + MONTH +
    F => A full textual representation of a month			        | January through December
    m => Numeric representation of a month, with leading zeros	    | 01 through 12
    M => A short textual representation of a month, three letters	| Jan through Dec
    n => Numeric representation of a month, without leading zeros	| 1 through 12
    t => Number of days in the given month				            | 28 through 31

    + YEAR +
    L => Whether it's a leap year					        | 1 if its leap, 0 otherwise
    o => ISO-8601 week-numbering year, same value as y		| examples 1999 or 2003
    y => A two digit representation of a year			    | 99 or 03
    Y => A full numeric representation of a year, 4 digits	| examples 1999 or 2003

    + TIME +
    a => Lowercase Ante meridiem and Post Meridiem		| am or pm
    A => Uppercase Anta meridiem and Post Meridiem		| AM or PM
    g => 12-hour format an hour without leading zeros	| 1 through 12
    G => 24-hour format an hour without leading zeros	| 0 through 23
    h => 12-hour format an hour with leading zeros		| 01 through 12
    H => 24-hour format an hour with leading zeros	    | 00 through 23
    i => Minutes with leading zeros					    | 00 to 59
    s => Seconds with leading zeros					    | 00 through 59



*/

echo date('d/m/Y g:ia') . "<br />"; // => 13/07/2022 12:29am

// you wanna know the detail time, 5 days from this day
echo date('d/m/Y g:ia', $currentTime + $fiveDaytoSec) . "<br />"; // => 18/07/2022 12:30am
// or you wanna the detail of yesterday
echo date('d/m/Y g:ia', $currentTime - $yesterdayToSec) . "<br />"; // => 12/07/2022 12:30am

// before change, you want to know what timezone you use
echo date_default_timezone_get() . "<br />"; // => Europe/Berlin

// now i want the UTC time zome
/* 
    date_default_timezone_set('UTC');

    echo date('d/m/Y g:ia') . "<br />"; // => 12/07/2022 10:33pm

// you wanna know the detail time, 5 days from this day
    echo date('d/m/Y g:ia', $currentTime + $fiveDaytoSec) . "<br />"; // => 17/07/2022 10:33pm
// or you wanna the detail of yesterday
    echo date('d/m/Y g:ia', $currentTime - $yesterdayToSec) . "<br />"; // => 11/07/2022 10:33pm

*/

// i dont want to calculate like the currentTime and fiveDaytoSec
// just make time using mktime function
echo mktime(0,0,0,0,10,null) . "<br />"; // 10 days after this 31/11/2021 12:00am => 1639090800
// i can convert this to date too.
echo date('d/m/Y g:ia', mktime(0,0,0,0,10,null)) . "<br />"; // => 10/12/2021 12:00am
// or you have a date, and you wanna change it to seconds
echo strtotime('2022-05-22 07:00:00') . "<br />"; // => 1653195600
// the magic is here
echo strtotime('yesterday') . "<br />"; // => 1657576800
echo strtotime('first day of february') . "<br />"; // => 1643670000
echo strtotime('last day of february') . "<br />"; // => 1646002800
echo strtotime('last day of february 2020') . "<br />"; // => 1582930800
echo strtotime('second friday of february') . "<br />"; // => 1644534000

// you want the detail and convert them to array, using date_parse
$date = date_parse(date('d/m/Y g:ia', strtotime('first day of january')));
echo "<pre>"; print_r($date); echo "<pre><br />";
/* 
=>  Array
    (
        [year] => 2022
        [month] => 1
        [day] => 1
        [hour] => 0
        [minute] => 0
        [second] => 0
        [fraction] => 0
        [warning_count] => 0
        [warnings] => Array
            (
            )

        [error_count] => 0
        [errors] => Array
            (
            )

        [is_localtime] => 
    )
*/

?>