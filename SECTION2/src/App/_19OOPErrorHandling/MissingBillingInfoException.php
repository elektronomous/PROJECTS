<?php

namespace App\_19OOPErrorHandling;
/* 
    5~ create custom  Exception class
*/
class MissingBillingInfoException /* 5~ and extend the class */ extends \Exception {
    /* 
        ~ using the constructor of the base class
        ~ and override the $message property of the Exception 
    */
    protected $message = 'Missing billing information';
}