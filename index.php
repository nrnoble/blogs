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
//$_SESSION["f3"] = $f3;
//Set debug level
$f3->set('DEBUG', 2);


//Route to default page for The Blog Site
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

        $f3->set('signedin', "true1");
        echo \Template::instance()->render('/views/default-home.php');








    });


$f3->route ('GET /foo',
    function($f3)
    {
        //$MembersDB = new \DatingSite\MembersDB();
        //  $bloggers = new Blogsdb();



        echo \Template::instance()->render('/views/default-home.php');
    });


/**
 * route to about page
 */
$f3->route ('GET /about',
    function($f3)
    {
        $f3->set('signedin', "true");
        echo \Template::instance()->render('/views/about-us.php');
    });

/**
 * route to new blogger signup page
 */
$f3->route ('GET /signup',
    function($f3)
    {
        $f3->set('signedin', "true");
        echo \Template::instance()->render('/views/new-blogger-signup.php');
    });

/**
 * route to blogger signin page
 */
$f3->route ('GET /signin',
    function($f3)
    {
        $f3->set('signedin', "true");
        echo \Template::instance()->render('/views/blogger-signin.php');
    });



    function test()
    {
        print_r($_SESSION);
    }



    $f3->run();







