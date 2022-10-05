<?php

# ERROR HANDLING => how to handle when a code face to an error
/* 
    php error consists of syntax error, fatal error, warning, notices
    parser and so on.

    
    how to reporting error? 
    =>
        error_reporting(0); // turn off the error reporting on the PHP
        error_reporting(E_ALL); // report all kind of errors

    PHP have bunch of predefined constant for indicating the level of the error such
    as E_ALL, E_WARNING, E_USER_ERROR, E_USER_WARNING and so on.
    
    now maybe you wanna the turn off the warning error messages, you turn off
    the bit by bit mask:
    =>
        error_reporting(E_ALL & ~E_WARNING);
    
    how to trigger error ?
    =>
        triger_error('Example Error', E_USER_ERROR);
    
    trigger_error() only use with predefined constant that E_USER_something.
    it doesn't work when you pass constant that has no E_USER.

    now when php will display the error ?
    =>
        display_error(0); // turn off errors
        display_error(1); // turn on the errors
    
    + you should always this display_error() turn off so that the user of your
    web doesn't see sensitive informatin which cause make it doing something dangerous.
    + instead you make a error logging to be review for you. 

    now you want to manualy log error ?
    =>
        error_log(error_message); //
        
    how to handle error message? php allow you to make custom handler
        function errorHandler(int $type, 
                            string $msg, 
                            ?string $fill=null,
                            ?int $line =null){
            echo $type . ':' . $msg . ' in ' . $file . ' on line ' . $line;

            // when you debugging something that you wanna continue the run
            // of the program using return, otherwise exit
            return;
            
        }

        set_error_handler('errorHandler', E_ALL);

        restore_error_handler(); // reset the handler

*/



?>