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

        $bloggers = new blogs\Blogsdb();
        $results = $bloggers->getAllMembers();

        $allBloggers = array();
        foreach ($results as $blogger)
        {
            array_push($allBloggers, $blogger);
           // array_push($allBloggers, $blogger['firstname']);
            //echo $blogger['firstname'] . ", ";
        }

//      $f3->set('xzy', $results);
//      $f3->set('fruits',array('apple','orange ',' banana','lemon','grapfruit', 'peach', 'pear', 'cocanut','tangerine'));
        $f3->set('bloggers', $allBloggers);

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







