<?php

/* 
    CLASS
    (1) we're bundling the relating function and variables into a class, from which then you create an object
    (2) variables of the class called property
    (3) function of the class called method
    (4) class is somethihng like blueprint, the object is something that you create from that blueprint
        # example: you can have multiple house from the house of the blueprint with slight different.
                   you can have different layout, pain color, or something else.
    (5) object is istances of the class. 
    
    DOCKER > XAMPP
    (1) making a local environment as production environtment
    (2) let you bundle your development environment in an isolate container that are portable
    (3) say that you work on 3 projects that code in different depedencies:
        # project(1) => source code, PHP 8, Nginx, MySQL 8, Redis 6.2;
        # project(2) => source code, PHP 7.4, Apache, MySQL 5.6
        # project(3) => source code, PHP 7.2, Apache, MySQL 5.6

        # docker containerize those depedencies so that can easily be shared, delete, or ported to another operating system
        # so the developer make a container like this:
            # container(1) => PHP 8, Nginx, MySQL 8, Redis 6.2;
            # container(2) => PHP 7.4, Apache, MySQL 5.6
            # container(3) => PHP 7.2, Apache, MySQL 5.6
                  /++++++++++++++++++/|               /++++++++++++++++++/|                 /++++++++++++++++++/| 
                 /   CONTAINER(1)   / |              /   CONTAINER(2)   / |                /   CONTAINER(3)   / |  
                /                  /  |             /                  /  |               /                  /  |  
                |+++++++++++++++++|   |             |+++++++++++++++++|   |               |+++++++++++++++++|   |
                | OS(UBUNTU)      |   |             | OS(UBUNTU)      |   |               | OS(UBUNTU)      |   |  
                | PHP 8           |   |             | PHP 7.4         |   |               | PHP 7.2         |   |
                | Nginx           |   |             | Apache          |   |               | Apache          |   |
                | MySQL 8         |   |             | MySQL 5.6       |   |               | MySQL 5.6       |   |
                | configuration   |  /              | configuration   |  /                | configuration   |  /
                | ....            | /               | ....            | /                 | ....            | /    
                |+++++++++++++++++|/                |+++++++++++++++++|/                  |+++++++++++++++++|/      
                
        # this is not ideal because the php, web server(Apache), or the database(MySQL 5.6) is set to 3 container
            # what's the solution ? make a container that run each of the service
            container(1) => source code, container(PHP), container(WEB_SERVER), container(DATABASE);
            container(PHP) => PHP 8, PHP 7.4, PHP 7.2
            container(WEB_SERVER) => Apache, Nginx;
            container(DATABASE) => MySQL    
    (4) container is just basically bundle of applications with all of the dependecies and necessary configurations
          /++++++++++++++++++/|               /++++++++++++++++++/|                 /++++++++++++++++++/| 
         /    CONTAINER     / |              /    CONTAINER     / |                /    CONTAINER     / |  
        /                  /  |             /                  /  |               /                  /  |  
        |+++++++++++++++++|   |             |+++++++++++++++++|   |               |+++++++++++++++++|   |
        | OS(UBUNTU)      |   |             | OS(UBUNTU)      |   |               | OS(UBUNTU)      |   |  
        | PHP             |   |             | MySQL           |   |               | Nginx           |   |
        | Configuration   |   |             | Configuration   |   |               | Configuration   |   |
        | Source Code     |   |             |                 |   |               |                 |   |
        | Curl            |  /              |                 |  /                |                 |  /
        | ....            | /               | ....            | /                 | ....            | /    
        |+++++++++++++++++|/                |+++++++++++++++++|/                  |+++++++++++++++++|/      
        
        # container begins as vanilla linux machine that doesn't have anything installed for the applications
        # to tell the docker how to run these dependencies(applications):
            # you're using dockerfile which is a text file that you can write instructions how the docker build docker image
            # docker image is read-only executable package that include everything need to run the applications
              (source_code, dependencies, environment, configuration, so on) 
            # docker image is same like container, the different is to run the apps inside the container you need the docker image,
              which docker image can run by itself without container
            # docker image is like base/template that you can use to build the container itself.
            # container is istances run-time of the container which you can modified.
      
      NGINX


*/

?>