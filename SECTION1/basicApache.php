<?php

# HTACCESS file => rewrite the url 
# httpd-vhosts => configuration that allow you to run multiple website in a single server called virtual hosting.


/* 
    you're using httpd-vhosts to change the url. consider you wanna change the url
    from localhost:8888/htdocs/php/section1/basicApache.php to the default url (localhost:8888), 
    here's the way to change it :
    
    WINDOWS
    1) change only the the line that marked '=>'
        ##<VirtualHost *:80>                                        => <VirtualHost>
        ##ServerAdmin webmaster@dummy-host.example.com
        ##DocumentRoot "C:/xampp/htdocs/dummy-host.example.com"     => "C:/xampp/htdocs/php/section1/basicApache.php"
        ##ServerName dummy-host.example.com
        ##ServerAlias www.dummy-host.example.com
        ##ErrorLog "logs/dummy-host.example.com-error.log"
        ##CustomLog "logs/dummy-host.example.com-access.log" common
        ##</VirtualHost>                                            => </VirtualHost>
    2) save and restart the apache
    3) the result will change the localhost:8888 files, that before you need to specify path of the url like this:
            http://localhost:8888/php/section1/basicApache.php 
       to 
            http://localhost:8888/
    4) because now the localhost:8888 point directly to "C:/xampp/htdocs/php/section1/basiApache.php" directory which is your code reside
    5) then the basicApache.php will execute automatically when you visit localhost:8888

    now then you wanna change the url name that something cool like masshackgeek.net
    instead of using localhost:

    1) change only the the line that marked '=>'
        ##<VirtualHost *:80>                                        => <VirtualHost>
        ##ServerAdmin webmaster@dummy-host.example.com
        ##DocumentRoot "C:/xampp/htdocs/dummy-host.example.com"     => "C:/xampp/htdocs/php/section1/basicApache.php"
        ##ServerName dummy-host.example.com                         => masshackgeek.net
        ##ServerAlias www.dummy-host.example.com
        ##ErrorLog "logs/dummy-host.example.com-error.log"
        ##CustomLog "logs/dummy-host.example.com-access.log" common
        ##</VirtualHost>                                            => </VirtualHost>
    2) access files name hosts on windowsOS (C:\Windows\system32\drivers\etc\hosts), write at the end of the line of the file:
        127.0.0.1   masshackgeek.net
    3) save it and restart the apache
    4) now instead of access localhost:8888 via the browser, you access your website using masshackgeek.net:8888

    LINUX
    
    1) change only the the line that marked '=>'
        ##<VirtualHost *:80>                                        => <VirtualHost *:8080>
        ##ServerAdmin webmaster@dummy-host.example.com
        ##DocumentRoot "C:/xampp/htdocs/dummy-host.example.com"     => "/opt/lampp/htdocs/php/section1/basicApache.php"
        ##ServerName dummy-host.example.com
        ##ServerAlias www.dummy-host.example.com
        ##ErrorLog "logs/dummy-host.example.com-error.log"
        ##CustomLog "logs/dummy-host.example.com-access.log" common
        ##</VirtualHost>                                            => </VirtualHost>
    2) save and restart the apache
    3) the result will change the localhost:8888 files, that before you need to specify path of the url like this:
            http://localhost:8888/php/section1/basicApache.php 
       to 
            http://localhost:8888/
    4) because now the localhost:8888 point directly to "/opt/lampp/htdocs/php/section1/basiApache.php" directory which is your code reside
    5) then the basicApache.php will execute automatically when you visit localhost:8888

    now then you wanna change the url name that something cool like masshackgeek.net
    instead of using localhost:

    1) change only the the line that marked '=>'
        ##<VirtualHost *:80>                                        => <VirtualHost masshackgeek.net:8080>
        ##ServerAdmin webmaster@dummy-host.example.com
        ##DocumentRoot "C:/xampp/htdocs/dummy-host.example.com"     => "/opt/lampp/htdocs/php/section1/basicApache.php"
        ##ServerName dummy-host.example.com                         => masshackgeek.net
        ##ServerAlias www.dummy-host.example.com
        ##ErrorLog "logs/dummy-host.example.com-error.log"
        ##CustomLog "logs/dummy-host.example.com-access.log" common
        ##</VirtualHost>                                            => </VirtualHost>
    2) modify the file(/etc/hosts), write at the end of the line of the file:
        127.0.0.1   masshackgeek.net
    3) save it and restart the apache
    4) now instead of access localhost:8888 via the browser, you access your website using masshackgeek.net:8888


    HTACCESS files => configuration file that allow you to change the configuration file per directory.
    simply means you are applying the configuration file on specified directory, then it applies to
    the subdirectory from the directory you've specified.

    you're be able to create .htaccess file on a certain folder by look at the httpd.conf 
    configuration file. look at the section which says:
        <Directory "/opt/lampp/htdocs">
    and its rules AllOverride to All, if its none you can't write .htaccess file to this folder

    but how about the directive
        <Directory /> 
        AllOverride none
        ...
        </Directory>
    we can't create .htaccess on this file right ?
    yeah but you got the other rules that say <Directory "/opt/lampp/htdocs"> that allows you
    create some in it.

    why even do we need the .htaccess file ? in case you're deploying website into website provider.
    usually the provider doesn't let you change your webs configuration file, instead you can add
    configuration file via the .htaccess file


    how to redirect user request that don't exist into our index.php for example ?
    1) create folder name public and create a filename called index.php
    2) copy this text into the .htaccess file without the text that marked '=>':
        <IfModule mod_rewrite.c>
            RewriteEngine on        => simply means that allow you to modify the url

            RewriteCond %{REQUEST_FILENAME} !-d => don't process physical directory through index.php, just serve it as it is.
            RewriteCond %{REQUEST_FILENAME} !-f => don't process physical file through index.php, just serve it as it is.

            RewriteRule ^ "../public/index.php"
        </IfModule>
    3) save it. then restart the apache

        
*/

echo "this is basic Apache configuration file. <br />";
?>