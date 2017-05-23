<?php

require_once('login.php');
require_once('logout.php');


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
