<?php

declare(strict_types=1);

// the folder called "5. namespace" is actually the paymentGateway

namespace App\_5paymentGateway\Paddle;
// you can define namespace using one keyword like this:
//          namespace Paddle;

class Transaction {
    public function __construct()
    {
        var_dump(new CustomerProfile());
        echo "<br />";
        // var_dump(new DateTime()); // => fatal error
        var_dump(new \DateTime());
        echo "<br />";
        /* 
            object(DateTime)#2 (3) { ["date"]=> string(26) "2022-07-23 07:43:39.868480" ["timezone_type"]=> int(3) ["timezone"]=> string(13) "Europe/Berlin" } object(paymentGateway\Paddle\Transaction)#1 (0) { } 
        */

        var_dump(new \App\_5Notification\Email());
        echo "<br />";
        /* 
            object(Notification\Email)#2 (0) { } object(paymentGateway\Paddle\Transaction)#1 (0) { } 
        */
        var_dump(explode(',','Hello,World'));
        echo "<br />";
        /* 
            string(3) "foo" 
        */
        var_dump(\explode(",","Hello,World"));
        echo "<br />";
        /* 
            array(2) { [0]=> string(5) "Hello" [1]=> string(5) "World" } 
        */
    }
}

function explode(string $seperator, string $str): string {
    return 'foo';
}

?>