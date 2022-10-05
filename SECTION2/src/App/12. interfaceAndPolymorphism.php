<?php

require_once(__DIR__ . "/../vendor/autoload.php");
use App\_12interfaceAndPolymorphism\CollectionAgency;
use App\_12interfaceAndPolymorphism\DebtCollectionService;
use App\_12interfaceAndPolymorphism\RockyAgency;

/* 
    1~ interface is like a contract that defines all the necessary actions/methods
       that an object must have
     ~ say that someone owes you a money and you want to collect all that debt(utang).
       your first step is try and collect that debt(utang) yourself, but you're unsucc-
       essful you will probably hire the collection agency or some kind of company who
       collect that debt(utang) for you for some kind of a comission or fee. 
                        
                        Collection Agency 
                        _______________
                        |_|__|__|__|__|
                        |_|__|__|__|__|
                        |_|__|__|__|__|
                        ||||||_|_||||||
                        |||||||||||||||
                       /              \
                      |               |
                     /                \
                    |                 |
                   /                  \
            You/Creditor          Debtor(Pengutang)
               (^.^)                 (^.^)
                /|\                   /|\
                /\                    /\ 

    ~ you dont care how the agency do its job, you just care that you get your money
      or some portion of the money. there can be multiple debt collector(collection agency)
      that each has own method or ways of collecting the debt(utang).
    ~ the interface in this case is the agency itself. you provide instructions 
      to the interface what needs to be done but you don't provide the implementation of 
      how it's done.
    ~ creating interface is similar with creating class. Instead using class, we use 'interface' keyword
    
    2# create interface for this agency, called "DebtCollector.php" and put it to the new directory called _12interfaceAndPolymorphism
    9~ test the collect method
*/
$collector = new CollectionAgency();
echo $collector->collect(100) . "<br />"; // random value => 56
/* 
    ? what problem that we're trying to solve here
      what problem does the interface solve here
    ~ because we aren't encounter any issue, we're going to introduce some problem
      to the code so you can see the importance and usefullness of interfaces and 
      how and what problem it trying to solve.
    10# create a new classes called DebtCollectionService on _12interfaceAndPolymorphism.
    11~ creating the instance of DebtCollectionService and pass the CollectionAgency object
        and using the service provided by the object we passed.   
*/
$service = new DebtCollectionService();
$service->collectDebt($collector);      // => Collected $515 out of $696
/* 
    ? what is the problem we trying to solve here
    ~ if you go back to the DebtCollectionService, its method only accept one argument type that's
      too specific which is CollectionAgency(one of the agencies that exist there) and maybe you/somebody want
      hire another agency, like a rockyAgency for a example that implement the same interface but with
      different method on how to collect the debt. you can't pass the object of the rockyAgency and using its
      method(you can't hire the rockyAgency). 
    12# create the RockyAgency class that implement DebtCollector interface on _12interfaceAndPolymorphism folder
        and go back to this file
       
      ~ now if you pass the instance of RockyAgency class to the DebtCollectionService method
        it'll not work and php will warn you that you've passed the wrong data type
      ~ now this is the problem we're trying to resolve here.
      ~ when we creating the interface, we don't rely on one implementation, instead many of implementations because
        there are tons of agencies that we could use to easiest our job in collecting the debt.
      ~ people says program/code to an interface, instead of implementation.
      ~ the solution is:
    13# change the parameter type of the method on DebtCollectionService to the interface of DebtCollector and go back
        to this file.
      ~ now the CollectDebt method only cares about the implementation that's given by interface of DebtCollector, not 
        the specific of the CollectionAgency.
      ~ this is called Polymorphism, implementing polymorphism using interface => means many forms, an object can be 
        polymorphic if it can pass multiple instances of checks which could indicate that it can take many forms
      ~ the paramter $collector of the CollectDebt method on DebtCollectionService is polymorphic. because when passing 
        the argument, it can take many forms.
    14# using var_dump to know what form the the $collector receive and go back to this file
*/
$collectorRocky = new RockyAgency();
echo $collectorRocky->collect(250) . "<br />";
$service = new DebtCollectionService($collectorRocky);
$service->collectDebt($collectorRocky);                  // => Collected $230.1 out of $354
/* 
    ? if you look at the abstract class, is it same
    ~ yes, the abstract class enforce the concrete class to implement the abstract method
    ? so what's the difference
    ~ abstract class can contain method implementations | interface can only contain method declaration
    ~ abstract class can contain properties | interface can only contain methods and constant
    ~ abstract class can have private & protected methods | interface only have public methods
    ~ abstract class can only extend a single class | interface can implement multiple interface 
    
    ? can we combine the abstract class and interface, like creating interface within the abstract class
    ~ yes, you might have interface that defines a contract or set of methods that need to be implemented
      and then you define an abstract class that implements that interface and you're still enforcing
      the contract to your concrete class while providing base functionality
    15# to make those clear, create Rendererable interface that declares the render method.
      # implement those interface to /_11abstractClassesAndMethods.php and comment the render method
        on the Field.php
    ? when we using interface and abstract class
      ~ interface have their use case and their place, you can think of this way
      ? can your class have multiple different implementation
        ~ if yes, then the interface would be the way to go 
      ? 
*/
?>