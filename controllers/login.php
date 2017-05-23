<?php

function validateUser($f3,$blogger,$bloggersDb)
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

    return $loginValidated;

}

function loginStatus()
{
    return true;
}