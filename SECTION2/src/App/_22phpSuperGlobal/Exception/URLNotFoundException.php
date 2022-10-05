<?php

namespace App\_22phpSuperGlobal\Exception;

use Exception;

class URLNotFoundException extends \Exception {
    protected $message = '404 URL Not Found';
}