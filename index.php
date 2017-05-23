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

// Globals

// Current logged in blogger, or new blogger. Set default profile image so there is something to display until user changes it.
    $blogger = new Blogger("","","","","","","/profile_images/defaultprofileimage.jpg") ;

// Connection object to mySQL DB.
    $bloggersDb = new blogs\Blogsdb();

// SQL Data returned from db containning all bloggers.
    $allBloggers = getAllBloggers();

// collection of objects from the Blogger class.
    $oBloggers = getAllBloggerAsObjects($allBloggers);

// Fatfree base object
    $f3->set('imagepath',null);



//TODO: needs to be replaced with a valid count number for each blogger.
    $f3->set('blogCount', 10);


//Route to default page for The Blog Site
$f3->route ('GET /',
    function($f3) use ($bloggersDb, $allBloggers)
    {

       // $myvar = "mayvartest";
       // $f3->set('fatfree',"fatfree on wamp");

        //$bloggers = new blogs\Blogsdb();
       // $_SESSION['$bloggersdb']  = $bloggers;

        // TODO: This need to be modified so that it only gets the top 10 bloggers.
        // In the real world getting all bloggers would be far too many.
        //$results = $bloggersDb->getAllBloggers();

        //$allBloggers = array();
//        foreach ($allBloggers as $blogger)
//        {
//            array_push($allBloggers, $blogger);
//           // array_push($allBloggers, $blogger['firstname']);
//            //echo $blogger['firstname'] . ", ";
//        }

//      $f3->set('xzy', $results);
//      $f3->set('fruits',array('apple','orange ',' banana','lemon','grapfruit', 'peach', 'pear', 'cocanut','tangerine'));
        $f3->set('bloggers', $allBloggers);
//        $f3->set('signedin', "true1");
        echo \Template::instance()->render('/views/default-home.php');

    });

//TODO: move to DB object
    function getAllBloggers(){

        $all = array();
        $bloggersDb = new blogs\Blogsdb();
        $results = $bloggersDb->getAllBloggers();
        foreach ($results as $blogger)
        {
            array_push($all, $blogger);
            // array_push($allBloggers, $blogger['firstname']);
            //echo $blogger['firstname'] . ", ";
        }
        return $all;
    }

//TODO: move to DB object
function getAllBloggerAsObjects($sqlBloggerData)
    {
        $all = array();
        foreach ($sqlBloggerData as $blogger)
        {
            $oBlogger = createBloggerObject($blogger);
            array_push($all, $oBlogger);
        }
        return $all;
    }


//TODO: Remove
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
    function() use ($f3,$blogger)
    {
        $f3->set('imagepath',$blogger->getImageLocation());
        $f3->set('signedin', "true");
        $f3->set('test22',$blogger->getImageLocation());
        echo \Template::instance()->render('/views/new-blogger-signup.php');
    });

/**
 * route to blogger signin page
 */
$f3->route ('GET /signin',
    function($f3)
    {
        $f3->set('signinError', "");
        $f3->set('signedin', "true");
        echo \Template::instance()->render('/views/blogger-signin.php');
    });


$f3->route ('GET /signout',
    function($f3)
    {
///        $_SESSION['signedin'] = "false";
        $f3->set('signedin', "false");
        echo \Template::instance()->render('/views/blogger-signin.php');
    });


/**
 * create route for create blog side menu item
 */
$f3->route ('GET /create',
    function($f3)
    {

        $f3->set('signedin', "true");
        echo \Template::instance()->render('/views/create-blog.php');
    });




/**
 * Handles login validation
 */
$f3->route ('POST /loginhandler',
    function($f3) use ($bloggersDb,$blogger)
    {
        $bloggerUserName ="";
        $password = "";
        $f3->set('signinError', "");

        if (isset($_POST['password']) && (isset($_POST['blogger']))){
            $bloggerUserName =  $_POST['blogger'];
            $password =  $_POST['password'];
        }
        else {
            echo \Template::instance()->render('/views/blogger-signin.php');
        }

        $blogger = createBloggerObject($bloggersDb->getBlogger($bloggerUserName));

//        echo '$blogger->getUserid(): ' . $blogger->getUserid() . "<BR>";
//        echo '$blogger->getPasswordHash(): ' . $blogger->getPasswordHash(). "<BR>";
//
//        echo '$bloggerUserName: ' . $bloggerUserName . "<BR>";
//        echo '$password: ' . $password . "<BR>";

        $loginValidated = false;
        if ($blogger->getUserid() == $bloggerUserName &&
            $blogger->getPasswordHash() == $password) {
            $loginValidated = true;
            $blogger->setIsLoggedIn(true);
        }
        else
        {
            $f3->set('signedin', "false");
            $f3->set('signinError', "Blogger Username or password are invalid");
            echo \Template::instance()->render('/views/blogger-signin.php');
        }

        $f3->set('signedin', $loginValidated);
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
  //      echo \Template::instance()->render('/views/new-blogger-signup.php');
       // echo $view->render('/views/signup.php');
//        header('Location: /328/blogs/signup');

        //print_r($imageFileName);
    });








function test()
    {
        print_r($_SESSION);
    }

    function createBloggerObject($sqlUserData){

        //echo '$sqlUserData["userid"]: ' . $sqlUserData["userid"] . "<BR>";

        $blogger = new Blogger($sqlUserData["userid"],
            $sqlUserData["firstname"],
            $sqlUserData["lastname"],
            $sqlUserData["gender"],
            $sqlUserData["bio"],
            $sqlUserData["passwordhash"],
            $sqlUserData["profileimage"]);
        return  $blogger;

    }





    $f3->run();







