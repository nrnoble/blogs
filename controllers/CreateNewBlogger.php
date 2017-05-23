<?php
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