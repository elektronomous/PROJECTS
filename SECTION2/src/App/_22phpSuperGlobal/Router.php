<?php

declare(strict_types=1);
namespace App\_22phpSuperGlobal;

require_once(__DIR__ . "/../../vendor/autoload.php");

use App\_22phpSuperGlobal\Exception\URLNotFoundException;


/* 2~ create Router class which direct the request URL */
class Router {

    private array $routes;
                                            /* 4~ */
    public function register(string $url, callable|array $action): self{
        /* 
            ~ this method will register the url do you want to visit, and the action
              it takes when you visit the URL
            ~ and return itslef, you can register any URL
        */
        $this->routes[$url] = $action;

        return $this;

    }

    public function resolve(string $url) {
        /* 
            ~ this method will resolve the URL that user visit
            ~ now this $_SERVER super global will use here
        */
        $route = explode('?',$url)[0];      // we don't need the query string
        $action = $this->routes[$route] ?? null;    // get the action as the user visit the URL

        if(! $action) {
            throw new URLNotFoundException();
        }

        /* 4~ */
        if(is_callable($action))
            return call_user_func($action);
        

        if(is_array($action)) {
            [$class, $method] = $action;
            
            if(class_exists($class)) {
                $class = new $class();

                if(method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }    

    }
}
/* 
    3# you can test the method of this class
*/


?>