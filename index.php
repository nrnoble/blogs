<?php
/**
 * Neal Noble
 * Course: IT 328 - Full-Stack Web Development
 * Assignment: Blogs
 * May 2017
 * Instructor: Tina Ostrander
 */
//namespace blogs;
//Require autoload
require_once('vendor/autoload.php');

//Start the session
session_start();


//Create an instance of the Base class
$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 2);



$f3->route ('GET /',
    function($f3)
    {
        $myvar = "mayvartest";
        $f3->set('fatfree',"fatfree on wamp");
   //     $view = new View;
      //  echo $view->render('/views/home.php');
        echo \Template::instance()->render('/views/home.php');
    });


$f3->route ('GET /foo',
    function($f3)
    {
        //$MembersDB = new \DatingSite\MembersDB();
      //  $bloggers = new Blogsdb();



        echo \Template::instance()->render('/views/home.php');
    });


function test()
{
    print_r($_SESSION);
}



$f3->run();

echo "test";






