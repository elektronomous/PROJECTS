<?php
require_once(__DIR__ . "/../App/Helper/print_r.php");


/* 1~ you can get current time and days using DateTime class, like this */
$dateTime = new DateTime();
varDump($dateTime);
/* 
                    =>  object(DateTime)#1 (3) {
                            ["date"]=>
                            string(26) "2022-09-02 05:58:43.072433"
                            ["timezone_type"]=>
                            int(3)
                            ["timezone"]=>
                            string(13) "Europe/Berlin"
                        }

    ~ or you can initialize the object with string like this 
*/
$dateTime = new DateTime("Yesterday noon");
varDump($dateTime);
/* 
                    =>  object(DateTime)#2 (3) {
                            ["date"]=>
                            string(26) "2022-09-01 12:00:00.000000"
                            ["timezone_type"]=>
                            int(3)
                            ["timezone"]=>
                            string(13) "Europe/Berlin"
                        }
    ~ or you can initialize with date like this                
*/
$dateTime = new DateTime('10/05/2022');
varDump($dateTime);
/* 
                    =>  object(DateTime)#1 (3) {
                            ["date"]=>
                            string(26) "2022-10-05 00:00:00.000000"
                            ["timezone_type"]=>
                            int(3)
                            ["timezone"]=>
                            string(13) "Europe/Berlin"
                        }
    ~ or you can initialize both time and date like this
*/
$dateTime = new DateTime('10/05/2022 10:50:00 PM');
varDump($dateTime);
/* 
                    =>  object(DateTime)#2 (3) {
                            ["date"]=>
                            string(26) "2022-10-05 22:50:00.000000"
                            ["timezone_type"]=>
                            int(3)
                            ["timezone"]=>
                            string(13) "Europe/Berlin"
                        }
    ~  or you can initialize both time and your TIMEZONE
*/
$dateTime = new DateTime('Now', new DateTimeZone('Asia/Makassar'));
varDump($dateTime);
/*                  => object(DateTime)#1 (3) {
                            ["date"]=>
                            string(26) "2022-09-05 10:41:26.072155"
                            ["timezone_type"]=>
                            int(3)
                            ["timezone"]=>
                            string(13) "Asia/Makassar"
                        }
                        
    ~ suddenly, you forgot that you live in Turkey now
    ~ then you want to change the Time Zone

*/
$dateTime->setTimeZone(new DateTimeZone('Europe/Istanbul'));
varDump($dateTime);
/* 
                    => object(DateTime)#1 (3) {
                            ["date"]=>
                            string(26) "2022-09-05 05:41:26.072155"
                            ["timezone_type"]=>
                            int(3)
                            ["timezone"]=>
                            string(15) "Europe/Istanbul"
                        }

    ~ oh you wanna read the month first instead of days, because
      on europe you do that often
*/
echo $dateTime->format('m/d/Y g:i A') . "<br />";   // => 09/05/2022 5:46 AM
/* 
    ~ and now you forgot your current UTC again
*/
echo $dateTime->getTimeZone()->getName() . "<br />";    // You're in => Europe/Istanbul
/* 
    ~ you want to change the Date manually because you feel that the web's date is wrong
*/
$dateTime->setDate(2022,5,10);
/* 
    ~ ups, you say that the time is wrong too
*/
$dateTime->setTime(7,00,00,00);
varDump($dateTime);
/* 
                            =>  object(DateTime)#1 (3) {
                                    ["date"]=>
                                    string(26) "2022-05-10 07:00:00.000000"
                                    ["timezone_type"]=>
                                    int(3)
                                    ["timezone"]=>
                                    string(15) "Europe/Istanbul"
                                }
    ~ DateTime::createFromFormat is a method that allows you to create DateTime Object from a
      specific format.
    ~ this is usefull when you decide which format do you want to use.
      ~ Europe has date format like this : day/month/year
        and  US has date format like this : month/day/year
    ~ now consider that you have

$date = '15/05/2021 3:30PM';

    ~ it will give you an error because DateTime accept the argument in US format
      not EUROPE, but when you print that out, it will give you EUROPE format
    ~ so when you pass the $date, php will give you and error

        ! Fatal error: Uncaught Exception: Failed to parse time string (15/15/2021 3:30PM) at position 0 (1): Unexpected character in 
          C:\xampp\htdocs\php\section2\src\App\21. DateTimeObject.php:126 Stack trace: #0 C:\xampp\htdocs\php\section2\src\App\21. DateTimeObject.php(126): 
          DateTime->__construct('15/15/2021 3:30...') #1 {main} thrown in C:\xampp\htdocs\php\section2\src\App\21. DateTimeObject.php on line 126
    
    ~ when you using slash('/') as the seperator, the DateTime considered the Argument will be an American format,
      but when you use dash('-') or dot('.') as the seperator, then the DateTime considered the argument will be on
      Europe Format
*/
$date = '12/15/2021 3:30PM';        // US format
$dateTime = new DateTime($date);
varDump($dateTime);
/* 
                            =>  object(DateTime)#2 (3) {
                                    ["date"]=>
                                    string(26) "2021-12-15 15:30:00.000000"
                                    ["timezone_type"]=>
                                    int(3)
                                    ["timezone"]=>
                                    string(13) "Europe/Berlin"
                                }
    ~ now using the Europe format
*/
$date = '25-12-2022';
$dateTime = new DateTime($date);
varDump($dateTime);
/*  
                            =>  object(DateTime)#1 (3) {
                                    ["date"]=>
                                    string(26) "2022-12-25 00:00:00.000000"
                                    ["timezone_type"]=>
                                    int(3)
                                    ["timezone"]=>
                                    string(13) "Europe/Berlin"
                                }
    ~ now consider that you have a data that coming from a FILE, or API you dont
      want to build a function to just replacing slash or dash from it.
    ~ you can using the createFromFormat function to decide which format do you want
      the file that you accept to be followed by.
    ~ using the EUROPE format
*/
$date = '25/12/2022';       // this is must be EUROPE format using the slash('/'), it will give you an error if you using dash('-')
$dateTime = \DateTime::createFromFormat('d/m/Y', $date);
varDump($dateTime);
/* 
                            =>  object(DateTime)#2 (3) {
                                    ["date"]=>
                                    string(26) "2022-12-25 11:09:21.000000"
                                    ["timezone_type"]=>
                                    int(3)
                                    ["timezone"]=>
                                    string(13) "Europe/Berlin"
                                }
    ~ when you using createFromFormat, the time will be the current time of the default TIMEZONE
      if you dont set the time.
    ~ you can set it manually to wherever TIMEZONE you want, or to whenever the time
*/
$dateTime = \DateTime::createFromFormat('d/m/Y',$date)->setTime(0,0);
varDump($dateTime);
/* 
                            =>  object(DateTime)#1 (3) {
                                    ["date"]=>
                                    string(26) "2022-12-25 00:00:00.000000"
                                    ["timezone_type"]=>
                                    int(3)
                                    ["timezone"]=>
                                    string(13) "Europe/Berlin"
                                }
    ~ the methods offered by the DateTime object have corresponding
      procedural function that can be use instead
      ~ date_create() == new DateTime()
      ~ date_create_from_format() == DateTime::createFromFormat()
      ~ date_timezone_set == setTimeZone
      ~ date_timezone_get == getTimeZone
      ~ so on..
    ~ you can compare of two object of DateTime
*/
$dateTime1 = new DateTime('05/25/2021 9:15 AM');
$dateTime2 = new DateTime('05/25/2021 9:15 AM');

varDump($dateTime1 < $dateTime2);   //  => bool(false)
varDump($dateTime1 > $dateTime2);   //  => bool(false)
varDump($dateTime1 == $dateTime2);  //  => bool(true)
varDump($dateTime1 <=> $dateTime2); //  => int(0)


$dateTime2 = new DateTime('05/25/2021 9:14 AM');

varDump($dateTime1 < $dateTime2);   //  => bool(false)
varDump($dateTime1 > $dateTime2);   //  => bool(true)
varDump($dateTime1 == $dateTime2);  //  => bool(false)
varDump($dateTime1 <=> $dateTime2); //  => int(1)

/* 
    ~ now you want how many days are the differences from both of them
*/
$dateTime2 = new DateTime('03/15/2021 9:15 AM');
varDump($dateTime1->diff($dateTime2));
/* 
                                =>  object(DateInterval)#4 (16) {
                                      ["y"]=>
                                      int(0)
                                      ["m"]=>
                                      int(2)
                                      ["d"]=>
                                      int(10)
                                      ["h"]=>
                                      int(0)
                                      ["i"]=>
                                      int(0)
                                      ["s"]=>
                                      int(0)
                                      ["f"]=>
                                      float(0)
                                      ["weekday"]=>
                                      int(0)
                                      ["weekday_behavior"]=>
                                      int(0)
                                      ["first_last_day_of"]=>
                                      int(0)
                                      ["invert"]=>
                                      int(1)
                                      ["days"]=>
                                      int(71)
                                      ["special_type"]=>
                                      int(0)
                                      ["special_amount"]=>
                                      int(0)
                                      ["have_weekday_relative"]=>
                                      int(0)
                                      ["have_special_relative"]=>
                                      int(0)
                                    }
    ? how the method of diff works and what is invert property inside it
    ~ diff works by substract the argument with the object whose called it.
      ~ so $dateTime2 - $dateTime1 result in a negative manner because $dateTime1
        is greater than $dateTime2. that's why the Invert property set to 1
    ~ to get the result you can 
*/
echo $dateTime2->diff($dateTime1)->days . "<br />"; // => 71
echo $dateTime2->diff($dateTime1)->format('%Y in years, %m in months, %d in days'); // => 00 in years, 2 in months, 10 in days
echo "<br />";
echo $dateTime2->diff($dateTime1)->format('%a');  // => 71
/* 
    ~ you can create an Object of DateInterval to do calculation on a DateTime
    ~ to create Object of DateInterval you need pass duration which is the format:
      ~ starts with 'P' letter for period then use another designator
*/
$dateInterval = new DateInterval('P2D');  // 2 Days
varDump($dateInterval);
/* 
                                =>  object(DateInterval)#4 (16) {
                                      ["y"]=>
                                      int(0)
                                      ["m"]=>
                                      int(0)
                                      ["d"]=>
                                      int(2)
                                      ["h"]=>
                                      int(0)
                                      ["i"]=>
                                      int(0)
                                      ["s"]=>
                                      int(0)
                                      ["f"]=>
                                      float(0)
                                      ["weekday"]=>
                                      int(0)
                                      ["weekday_behavior"]=>
                                      int(0)
                                      ["first_last_day_of"]=>
                                      int(0)
                                      ["invert"]=>
                                      int(0)
                                      ["days"]=>
                                      bool(false)
                                      ["special_type"]=>
                                      int(0)
                                      ["special_amount"]=>
                                      int(0)
                                      ["have_weekday_relative"]=>
                                      int(0)
                                      ["have_special_relative"]=>
                                      int(0)
                                    }
*/
$dateInterval = new DateInterval('P2M2D'); // 2 months 2 days
/* 
    ~ now using this interval to add DateTime object
*/
$dateTime2->add($dateInterval);
echo $dateTime2->format('d/m/Y') . "<br />";  // => 17/05/2021

$dateTime1->sub($dateInterval);
echo $dateTime1->format('d/m/Y') . "<br />";  // => 23/03/2021
/* 
    ~ do you remember the invert property inside the DateInterval
    ? what happen when we flip the invert of DateInterval Object
*/
$dateInterval->invert = 1;

$dateTime2->add($dateInterval);
echo $dateTime2->format('d/m/Y') . "<br />";  // => 15/03/2021
$dateTime1->sub($dateInterval);
echo $dateTime1->format('d/m/Y') . "<br />";  // => 25/05/2021
/* 
    ~ you see the result right ? so be aware of the invert property
    ~ PHP has DateTimeImmutable which is a class that you create a change on it
      it will return the new Object of itself.
    ~ when you assign an object, you just point to the object that you've assigned.
      you don't get the new Object right. so
*/
$from = new DateTime();
$to = $from;            /* you point to the object $from
    ~ that's why
*/
echo $to->format('m/d/Y') . ' ' . $from->format('m/d/Y') . "<br />"; // is => 09/06/2022 09/06/2022 (same)

$from = new DateTimeImmutable();
$to = $from->add(new DateInterval('P2D'));  // you change the DateTimeImmutable object here, which return an object

echo $to->format('m/d/Y') . ' ' . $from->format('m/d/Y') . "<br />"; // is => 09/08/2022 09/06/2022 (different)

/* 
    ~ sometimes you want to iterate through all over the dates
*/
$period = new DatePeriod(new DateTime('05/1/2021'), new DateInterval('P1D'), new DateTime('05/31/2021'));

foreach($period as $date) {
  echo $date->format('m/d/Y') . "<br />";
  /* =>
    05/01/2021
    05/02/2021
    05/03/2021
    05/04/2021
    05/05/2021
    05/06/2021
    05/07/2021
    05/08/2021
    05/09/2021
    05/10/2021
    05/11/2021
    05/12/2021
    05/13/2021
    05/14/2021
    05/15/2021
    05/16/2021
    05/17/2021
    05/18/2021
    05/19/2021
    05/20/2021
    05/21/2021
    05/22/2021
    05/23/2021
    05/24/2021
    05/25/2021
    05/26/2021
    05/27/2021
    05/28/2021
    05/29/2021
    05/30/2021
  */
}



?>