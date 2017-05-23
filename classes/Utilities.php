<?php
/**
 * Neal Noble
 * Course: IT 328 - Full-Stack Web Development
 * Assignment: The sign-up form
 * April 2017
 * Instructor: Tina Ostrander
 */





class Utilities
{
    public static function getAdminLinkHeader(){
        return "<span><a href='/328/signup/'>My Dating site</a></span><span class='alignright'><a href='/328/signup/admin'>Administration</a></span>";
    }

    /**
     * Turn on debug commenting
     */
    public static function debugOn(){
        $_SESSION['debug'] = true;
    }


    /**
     *  Turn off debug commenting
     */
    public static function debugOff()
    {
        unset($_SESSION['debug']);
    }


    /**
     * Print debug comment to active webpage during debugging
     * @param $comment debug comment
     */
    public static function debug($comment){
        if (isset($_SESSION['debug'])) {
            echo $comment . "<BR>";
        }
    }
}