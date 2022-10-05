<?php

declare(strict_types=1);
namespace App\_22phpSuperGlobal\Classes;

class Home {
    public function index(): string {
        /* 6~ */
        setcookie(
            'Username',             /* the name of the cookie */
            'Muhammad Faza Akbar',  /* the value of the cookie */ 
            time() + 10,            /* expiration date = 10 seconds */
            '/',                    /* the cookie will available when you visit the homepage */
            '',                     /* make the cookie on your domain, ex: mysite.com, mysite.com/carrer.html */
            true,                   /* send this cookie using https(secure connection) */
            false                   /* when true, it only could be access using http protocol. */
        );
        return 'New Home';
    }
}

?>