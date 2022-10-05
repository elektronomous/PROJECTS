<?php


declare(strict_types=1);

require_once(__DIR__ . "/../../vendor/autoload.php");
require_once(__DIR__ . "/../../App/Helper/print_r.php");

use App\_22phpSuperGlobal\Router;
use App\_22phpSuperGlobal\Classes\Home;
use App\_22phpSuperGlobal\Classes\Invoice;

/* 5~ */
session_start();

/* 
    1~ super globals are built-in variables that are always available within all scopes throughout
       your php code.
     ~ it use when you work with post a form, post an image, set a session, set a cookies and so on.
     ~ the super global consist of :
       $_SERVER, $_GET, $_POST, $_FILES, $_COOKIE, $_SESSION, $_REQUEST, and $_ENV
     ~ $_SERVER contains about the server and execution environment 

varDump($_SERVER);

    =>  array(70) {
        ["UNIQUE_ID"]=>
        string(27) "YxxECGFhh5u960zW5RoowAAAAAE"
        ["HTTPS"]=>
        string(2) "on"
        ["SSL_TLS_SNI"]=>
        string(9) "localhost"
        ["SSL_SERVER_S_DN_C"]=>
        string(2) "DE"
        ["SSL_SERVER_S_DN_ST"]=>
        string(6) "Berlin"
        ["SSL_SERVER_S_DN_L"]=>
        string(6) "Berlin"
        ["SSL_SERVER_S_DN_O"]=>
        string(14) "Apache Friends"
        ["SSL_SERVER_S_DN_CN"]=>
        string(9) "localhost"
        ["SSL_SERVER_I_DN_C"]=>
        string(2) "DE"
        ["SSL_SERVER_I_DN_ST"]=>
        string(6) "Berlin"
        ["SSL_SERVER_I_DN_L"]=>
        string(6) "Berlin"
        ["SSL_SERVER_I_DN_O"]=>
        string(14) "Apache Friends"
        ["SSL_SERVER_I_DN_CN"]=>
        string(9) "localhost"
        ["SSL_VERSION_INTERFACE"]=>
        string(14) "mod_ssl/2.4.53"
        ["SSL_VERSION_LIBRARY"]=>
        string(14) "OpenSSL/1.1.1o"
        ["SSL_PROTOCOL"]=>
        string(7) "TLSv1.3"
        ["SSL_SECURE_RENEG"]=>
        string(5) "false"
        ["SSL_COMPRESS_METHOD"]=>
        string(4) "NULL"
        ["SSL_CIPHER"]=>
        string(22) "TLS_AES_128_GCM_SHA256"
        ["SSL_CIPHER_EXPORT"]=>
        string(5) "false"
        ["SSL_CIPHER_USEKEYSIZE"]=>
        string(3) "128"
        ["SSL_CIPHER_ALGKEYSIZE"]=>
        string(3) "128"
        ["SSL_CLIENT_VERIFY"]=>
        string(4) "NONE"
        ["SSL_SERVER_M_VERSION"]=>
        string(1) "3"
        ["SSL_SERVER_M_SERIAL"]=>
        string(2) "00"
        ["SSL_SERVER_V_START"]=>
        string(24) "Oct  1 09:10:30 2004 GMT"
        ["SSL_SERVER_V_END"]=>
        string(24) "Sep 30 09:10:30 2010 GMT"
        ["SSL_SERVER_S_DN"]=>
        string(53) "CN=localhost,O=Apache Friends,L=Berlin,ST=Berlin,C=DE"
        ["SSL_SERVER_I_DN"]=>
        string(53) "CN=localhost,O=Apache Friends,L=Berlin,ST=Berlin,C=DE"
        ["SSL_SERVER_A_KEY"]=>
        string(13) "rsaEncryption"
        ["SSL_SERVER_A_SIG"]=>
        string(20) "md5WithRSAEncryption"
        ["SSL_SESSION_ID"]=>
        string(64) "ffe7d6d02fab2d219eed05897008090c7a7798970382babcff62ed409ca953dd"
        ["SSL_SESSION_RESUMED"]=>
        string(7) "Resumed"
        ["HTTP_HOST"]=>
        string(9) "localhost"
        ["HTTP_USER_AGENT"]=>
        string(66) "Mozilla/5.0 (Windows NT 10.0; rv:91.0) Gecko/20100101 Firefox/91.0"
        ["HTTP_ACCEPT"]=>
        string(74) "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*//*;q=0.8"
        ["HTTP_ACCEPT_LANGUAGE"]=>
        string(14) "en-US,en;q=0.5"
        ["HTTP_ACCEPT_ENCODING"]=>
        string(17) "gzip, deflate, br"
        ["HTTP_DNT"]=>
        string(1) "1"
        ["HTTP_CONNECTION"]=>
        string(10) "keep-alive"
        ["HTTP_REFERER"]=>
        string(44) "https://localhost/PROJECTS/SECTION2/src/App/"
        ["HTTP_UPGRADE_INSECURE_REQUESTS"]=>
        string(1) "1"
        ["HTTP_SEC_FETCH_DEST"]=>
        string(8) "document"
        ["HTTP_SEC_FETCH_MODE"]=>
        string(8) "navigate"
        ["HTTP_SEC_FETCH_SITE"]=>
        string(11) "same-origin"
        ["HTTP_SEC_FETCH_USER"]=>
        string(2) "?1"
        ["PATH"]=>
        string(60) "/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin"
        ["LD_LIBRARY_PATH"]=>
        string(29) "/opt/lampp/lib:/opt/lampp/lib"
        ["SERVER_SIGNATURE"]=>
        string(0) ""
        ["SERVER_SOFTWARE"]=>
        string(74) "Apache/2.4.53 (Unix) OpenSSL/1.1.1o PHP/8.1.6 mod_perl/2.0.12 Perl/v5.34.1"
        ["SERVER_NAME"]=>
        string(9) "localhost"
        ["SERVER_ADDR"]=>
        string(9) "127.0.0.1"
        ["SERVER_PORT"]=>
        string(3) "443"
        ["REMOTE_ADDR"]=>
        string(9) "127.0.0.1"
        ["DOCUMENT_ROOT"]=>
        string(17) "/opt/lampp/htdocs"
        ["REQUEST_SCHEME"]=>
        string(5) "https"
        ["CONTEXT_PREFIX"]=>
        string(0) ""
        ["CONTEXT_DOCUMENT_ROOT"]=>
        string(17) "/opt/lampp/htdocs"
        ["SERVER_ADMIN"]=>
        string(15) "you@example.com"
        ["SCRIPT_FILENAME"]=>
        string(66) "/opt/lampp/htdocs/PROJECTS/SECTION2/src/App/22. phpSuperGlobal.php"
        ["REMOTE_PORT"]=>
        string(5) "49832"
        ["GATEWAY_INTERFACE"]=>
        string(7) "CGI/1.1"
        ["SERVER_PROTOCOL"]=>
        string(8) "HTTP/1.1"
        ["REQUEST_METHOD"]=>
        string(3) "GET"
        ["QUERY_STRING"]=>
        string(0) ""
        ["REQUEST_URI"]=>
        string(51) "/PROJECTS/SECTION2/src/App/22.%20phpSuperGlobal.php"
        ["SCRIPT_NAME"]=>
        string(49) "/PROJECTS/SECTION2/src/App/22. phpSuperGlobal.php"
        ["PHP_SELF"]=>
        string(49) "/PROJECTS/SECTION2/src/App/22. phpSuperGlobal.php"
        ["REQUEST_TIME_FLOAT"]=>
        float(1662796808.8390700817108154296875)
        ["REQUEST_TIME"]=>
        int(1662796808)
    }


    ? so when to use this $_SERVER  
    ~ some of the basic usage is the basic routing, all of your connection routed to the
      name of the file right as you can see at ['SCRIPT_FILENAME'] property of the $_SERVER.
      now you want to request another URL, via the usage of basic routing, we could
      route the requested URL.
    2# create a class called Router.php on _22phpSuperGlobal directory and 
     # create a class URLNotFoundException class to get the Exception when something
       is worng
    3~ test the method  
*/

$mainIndex = "/PROJECTS/SECTION2/src/App/_22phpSuperGlobal/index.php";
$router = new Router();


/* 
     ~ register the URL, so when the user visit it, you can decide what action will you do 



$router->register($mainIndex . '/invoice', function() {
  echo 'Invoice';
});

$router->register($mainIndex . '/Customer', function() {
  echo 'Customer';
});



    ~ as you can see, you expose your logic. instead of expose them, we can pass an array
      which contains class name, and its method. so that method will handle the requested
      URL
    4# create another class with its method to handle the index.php url,
       invoices url, and create url inside the Classes directory
     # update the method inside the Router.php
*/

$router->register($mainIndex, [App\_22phpSuperGlobal\Classes\Home::class, 'index'])
      ->register($mainIndex . '/invoice', [Invoice::class, 'index'])
      ->register($mainIndex . '/invoice/create', [Invoice::class, 'create'])
      ->register($mainIndex . '/invoice/create/hello', [Invoice::class, 'create']);


echo $router->resolve($_SERVER['REQUEST_URI']) . '<br />';
/* 
    ~ sessions and cookies are generally used to store information that persist across 
      request.
    ~ PHP request is stateles but sessions and cookies can be used in addition to other things
      like databases caches files and so on to retain the states
    ~ the difference between sessions and cookies are cookies stored on user computer(cliend side)
      while sessions are stored on server.
    ~ also by default session is destroyed as soon as the browser is closed while cookie will remain
      as the set expiration date or until the cookie is deleted.
    ~ in order to use session, you need to start the session. when you start the session, make sure the
      the function is on the beginning or before any output function.
    5# starting the session

session_start();

    ~ when you start the session on the above code, you maybe not encounter an issue first.
      but when you make the output_buffering 0 in php.ini. you'll get the error:

       Warning: session_start(): Session cannot be started after headers have already been sent 
       in /opt/lampp/htdocs/PROJECTS/SECTION2/src/App/_22phpSuperGlobal/index.php on line 225

    ? what is output_buffering
    ~ when you echoing / print_r and so on that you make an output to the browser, the output result will be buffered
      first by PHP, and its default it will buffered for 4096 bytes(4Kb). when the execution code is end or the buffered
      full by data that's 4096 bytes, then PHP will give you the result.
    ~ when php encounters any content or receives the first output whether it's through print statement/echo statement 
      or it just HTML elements or event it just an empty space that's not enclosed within the PHP, the php will attempt
      to send a headers.
      ? what is headers
      ~ go to your browser, hit F12 and you see there's new window shows up. look at the network tab, click on it.
        after you see the headers, click on it too and you'll see there's two headers there first header request
        which is you when you run your php code, the header response which the server response after you send
        your php code to it.
      now, look at the error above when you using the session_start(). session_start() trying to modify your headers,
      but the header it modify is header response, not your header which header request. that's why that php will give
      you and error. that's why we put the session_start() on top of all of this code
    ~ when the session started, php will create an unique session id called PHPSESSID, you can look at the storage tab
      after you hit the F12 -> Cookies
            PHPSESSID:"oo03iemrfspr23g7jn4agmfhgi"
    ~ this cookie will passed on every further request so that the proper session data that's associated with the session id
      can be looked up
      ~ hit the F12 and go to the network tab, click on the index.php and there's a cookie tab. you will see the same cookie
        on storage tab will appear on the cookie tab of your request on the network tab

    ? what is cookies
    ~ cookie is a file that's stored on the user computer
    ~ once cookie is created then each request back to the server will include cookie so the server can
      access them.
    ~ cookie can be used for session management, can be used for tracking, targeted ads and so on.
    6# create a when visiting the homepage on Home.php
    ~ you can also access the cookies
*/
varDump($_COOKIE); /*
  =>  array(2) {
        ["PHPSESSID"]=>
        string(26) "oo03iemrfspr23g7jn4agmfhgi"
        ["Username"]=>
        string(19) "Muhammad Faza Akbar" // => this will expire for 10 seconds
      }
*/


?>
