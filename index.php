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


    ini_set('session.use_strict_mode', 1);
    $sid = md5('wuxiancheng.cn');
    session_id($sid);
// var_dump(session_id() === $sid);// always false
//Start the session
session_start();


//Create an instance of the Base class
    $f3 = Base::instance();
    $f3->set('DEBUG', 2);
    $f3->set('CACHE','memcache=localhost');


// This require_once must come after $f3 has been created
    require_once('controllers/central.php');


// Globals



$f3->set('SESSION.debug', true);
$signedin = $f3->get('SESSION.signedin');

$f3->set('signedin','SESSION.signedin');




// debugAlert ($f3->get('SESSION.test'));
// debugAlert ("mySessiontest" . $_SESSION['mytest']);

// Connection object to mySQL DB.
    $bloggersDb = new blogs\Blogsdb();

// Current logged in blogger, or new blogger. Set default profile image so there is something to display until user changes it.
    $blogger = new Blogger("","","","","","","", "/profile_images/defaultprofileimage.jpg","",$bloggersDb) ;


// SQL Data returned from db containning all bloggers.
    $allBloggers = getAllBloggers();

// collection of objects from the Blogger class.
    $oBloggers = getAllBloggerAsObjects($allBloggers, $bloggersDb);


//TODO: needs to be replaced with a valid count number for each blogger.
    $f3->set('blogCount', 10);


//Route to default page for The Blog Site
$f3->route ('POST|GET  /',
    function($f3) use ($bloggersDb, $allBloggers)
    {

        $f3->set('bloggers', $allBloggers);
        echo \Template::instance()->render('/views/default-home.php');

    });

/**
 * route to about page
 */
$f3->route ('POST|GET  /about',
    function() use ($f3)
    {
        echo \Template::instance()->render('/views/about-us.php');
    });


/**
 * route to new blogger signup page
 */
$f3->route ('POST|GET  /signup',
    function() use ($f3,$blogger)
    {
        $f3->set('imagepath',$blogger->getImageLocation());
        echo \Template::instance()->render('/views/new-blogger-signup.php');
    });

$f3->route ('POST|GET  /add',
    function() use ($f3,$blogger,$bloggersDb)
    {
        //TODO: need to verify that a blogger does not exist before adding a new blogger
        $result = $bloggersDb->doesBloggerExist($_POST['userid']);

        debugAlert($result);

        $f3->set('imagepath',$blogger->getImageLocation());
        echo \Template::instance()->render('/views/new-blogger-signup.php');
    });


$f3->route ('POST|GET  /debug',
    function() use ($f3,$blogger,$bloggersDb)
    {

//      debugAlert($f3->get(SESSION.debug));
        $_SESSION['mytest'] = "mySessionTest";
//        debugAlert ("mySessiontest1: " . $_SESSION['mytest']);
        $f3->set('SESSION.test',123);
      //  $f3->set('SESSION.signedin', true);
      //  $f3->set('SESSION.signedin', true);


        $f3->set('imagepath',$blogger->getImageLocation());
        echo \Template::instance()->render('/views/debug.php');
        print_r($_SESSION);
    });

/**
 * route to blogger signin page
 */
$f3->route ('POST|GET  /signin',
    function($f3)
    {
        $f3->set('signinError', "");
        echo \Template::instance()->render('/views/blogger-signin.php');
    });


/**
 * Route that handles the signout
 */
$f3->route ('POST|GET  /signout',
    function() use ($f3,$blogger)
    {
//        $blogger->setisLoggedIn(false);
//        $f3->set(SESSSION.signin, false);
//        $f3->set(signin, false);

        logout($f3,$blogger);
        echo \Template::instance()->render('/views/blogger-signin.php');
    });


/**
 * create route for create blog side menu item
 */
$f3->route ('POST|GET  /create',
    function($f3)
    {
        echo \Template::instance()->render('/views/create-blog.php');
    });




/**
 * Handles login validation
 */
$f3->route ('GET|POST /loginhandler',
    function($f3) use ($bloggersDb,$blogger)
    {
        $loginValidated =  validateUser($f3,$blogger,$bloggersDb);
        $blogger->setisLoggedIn($loginValidated);
        $f3->set('signedin', $blogger->getisLoggedIn());
        $f3->set('SESSION.signedin', $loginValidated);
//        $f3->set('SESSION.signedin', true);
        $f3->set(SESSION.blogger, $blogger);
       // echo "Session.signin: " . $f3->get(Session.signin);
        echo \Template::instance()->render('/views/blogger-signin.php');
    });


/**
 * upload profile image.
 * verify size
 * verify type
 * verify duplicate
 */
$f3->route ('POST|GET /upload',
    function()
        use ($f3,$blogger) {
        $f3->set('imagepath',$blogger->getImageLocation());
        echo 'uploading';
        // Reference. upload script from https://www.w3schools.com/php/php_file_upload.asp
        // $profile = $_SESSION['Profile-data'];
        // print_r($_SESSION);
        // $target_dir = $_SERVER['DOCUMENT_ROOT'] ."/328/signup/images/";

        $target_dir = "./profile_images/";

        $imageFileName = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        //     $f3->set(imagePath,$imageFileName);

        $uploadOk = 1;
        $imageFileType = pathinfo($imageFileName,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {

            if ($_FILES["fileToUpload"]["tmp_name"] == "")
            {
                $uploadOk = 0;
            }
            else {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            }
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;

            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($imageFileName)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            $_SESSION['imagePath'] = $imageFileName;
            $_SESSION['updateProfile']=$imageFileName;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            // target_file
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imageFileName)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $_SESSION['imagePath'] = $imageFileName;
                $_SESSION['updateProfile']=$imageFileName;
                $blogger->setImageLocation($imageFileName);
            }
            else {
                //        echo "Sorry, there was an error uploading your file.";
            }
        }
        $blogger->setImageLocation($imageFileName);
        $f3->set('imagepath',$imageFileName);
      //  echo 'test: ' . $imageFileName . "<br>";
        //echo '$_SESSION[\'imagePath\']: ' . $_SESSION['imagePath'] . "<br>";
       // echo "<img src='/328/blogs" . $_SESSION['imagePath'] . "'>";
        // $_POST['imagePath'] = $imageFileName;
        $view = new View;
        $f3->set("files",$_FILES);
        echo \Template::instance()->render('/views/new-blogger-signup.php');
       // echo \Template::instance()->render('/views/default-home.php');
  //      echo \Template::instance()->render('/views/new-blogger-signup.php');


        //print_r($imageFileName);
    });


    $f3->run();


