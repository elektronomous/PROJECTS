<?php

// MATCH => only work on PHP 8

$paymentStatus = 1;

switch($paymentStatus) {
    case 1:
        echo 'Paid';
        break;
    case 2:
    case 3:
        echo 'Payment Declined';
        break;
    case 0:
        echo 'Pending Payment';
        break;
    default:
        echo 'Unknown payment status';
};
echo "</br >";

match($paymentStatus) {
    // single condition value expression => the return value
    1 => print('paid'), // => actual result
    2 => print('Payment Declined'), // expected result when $paymentStatus = 2
    0 => print('Pending Payment') // expected result when $paymentStatus = 0
};
echo "<br />";

// because match expression return value you can assign it to the variable
$paymentStatusDisplay = match($paymentStatus) {
    1 => 'paid',
    2 => 'payment declined',
    0 => 'pending payment'
};
echo $paymentStatusDisplay . "<br />"; // => paid

/* 
    unlike switch, you must defined default at the match expression.
    if not it will throw an error

*/
$paymentStatusDisplay = match($paymentStatus) {
    1 => 'Paid',
    2,3 => 'Payment Declined', // its like case 2: case 3: on switch
    0 => 'Pending Payment',
    default => 'Unknown Payment Status'
};

echo $paymentStatusDisplay . "<br />"; // => paid

/* 
    you can change the return value with a function
    because function is an expression too.
    the statement will not work on the match expression,
    unlike the switch, you can create as much statement
    that are end with break statements

    swtich using == to its conditional statement
    match using === to its conditional statement

    try to change the $paymentStatus = false then
    only the switch will echo its statement, the match
    will not work for that cause its using === strict comparison
    
*/

// or you have to evaluates the $paymentStatus
$paymentStatus = true;
$paymentStatusDisplay = match($paymentStatus) {
    (10 % 2) === 0 => 'Paid',
    ($paymentStatus === 0) => 'Payment Declined',
    default => 'Unknown Payment Status',
};

echo $paymentStatusDisplay . "<br />"; // => paid, because 10 % 2 => true
?>