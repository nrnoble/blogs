<?php

require_once('login.php');
require_once('logout.php');


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


function getAllBloggerAsObjects($sqlBloggerData,$bloggersDb)
{
    $all = array();
    foreach ($sqlBloggerData as $blogger)
    {
        $oBlogger = createBloggerObject($blogger,$bloggersDb);
        array_push($all, $oBlogger);
    }
    return $all;
}

function createBloggerObject($sqlUserData, $bloggersDb){

    //echo '$sqlUserData["userid"]: ' . $sqlUserData["userid"] . "<BR>";

    $blogger = new Blogger($sqlUserData["userid"],
        $sqlUserData["firstname"],
        $sqlUserData["lastname"],
        $sqlUserData["gender"],
        $sqlUserData["email"],
        $sqlUserData["bio"],
        $sqlUserData["passwordhash"],
        $sqlUserData["profileimage"],
        $sqlUserData["id"],
        $bloggersDb);
    return  $blogger;

}

function debugAlert($message){
    echo "
        <script> alert ('$message')</script>
        
        ";
}