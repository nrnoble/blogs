<?php
/**
 * Neal Noble
 * Course: IT 328 - Full-Stack Web Development
 * Assignment: Blogs
 * May 2017
 * Instructor: Tina Ostrander
 */


/**
 * The Member class represents a basic member of the dating site
 *
 * The Member class represents a basic member use to create a
 * user profile. It has the following properities
 *     First Name
 *     Last Name
 *     Gender
 *     Email
 *     Bio;
 *     imageLocation
 *     blogs;
 *     isLoggedIn
 *     blogcount
 *     userid
 *     passwordhash
 *
 * @author Neal Noble <nnoble2@mail.greenriver.edu>
 * @copyright 2017
 */
class Blogger
{
    private $firstName;
    private $lastName;
    private $gender;
    private $email;
    private $bio;
    private $userid;
    private $passwordHash;
    private $imageLocation = "http://nnoble.greenrivertech.net/328/blogs/profile_images/defaultimage.png";
    private $blogs;
    private $isLoggedIn;
    private $id;
    private $blogCount;
    private $bloggersDb;


    /**
     * @return collection of blogs entries as blogs entries as blogPosts objects objects
     */
    public function getBlogs()
    {
        return $this->blogs;
    }


    /**
     * @param  {blogPosts} sets collection of blogs entries as blogs entries as blogPosts objects objects
     */
    public function setBlogs($blogs)
    {
        $this->blogs = $blogs;
    }


    /**
     * blogger constructor.
     * @param $first name of user profile
     * @param $last name  of user profile
     * @param $yearsOld of user profile
     * @param $sexualIdentity of user profile
     * @param $telephone contact of user
     * @param $premium is true if Premium member. default is null
     */
    function __construct($userid,
                         $first,
                         $last,
                         $gender,
                         $email,
                         $bio,
                         $passwordHash,
                         $imageLocation,
                         $id,
                         $bloggersDb)
    {
        $this->userid = $userid;                        //1
        $this->firstName = $first;                      //2
        $this->lastName = $last;                        //3
        $this->gender = $gender;                        //4
        $this->email = $email;                          //5
        $this->bio = $bio;                              //6
        $this->passwordHash = $passwordHash;            //7
        $this->imageLocation = $imageLocation;          //8
        $this->id = $id;                                //9
        $this->bloggersDb = $bloggersDb;                   //10
    }


    /**
     * Get first name
     * @return String first name
     */
    public function getFirstName()
    {
        return $this->firstName;
    }


    /**
     * Set first name
     * @param String $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }


    /**
     * Get last name
     * @return String $lastname
     */
    public function getLastName()
    {
        return $this->lastName;
    }


    /**
     * Set last name
     * @param String $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }


    /**
     * Get full name
     * @return string FullName
     */
    public function getFullName()
    {
        return $this->firstName . " " . $this->lastName;
    }



    /**
     * Get Gender either as male or female
     * @return String Gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set Gender as male or female
     * @param String $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }


    /**
     * Get email address
     * @return String email
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * Set email address
     * @param String $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


    /**
     * Get location of profile image
     * @return string Image location
     */
    public function getImageLocation()
    {
        return $this->imageLocation;
    }


    /**
     * Set location of profile image
     * @param String $imageLocation
     */
    public function setImageLocation($imageLocation)
    {
        $this->imageLocation = $imageLocation;
    }


    /**
     * Get the biography
     * @return String $bio
     */
    public function getBio()
    {
        return $this->bio;
    }


    /**
     * Set the biography
     * @param String $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }


    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return mixed
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     * @param mixed $passwordHash
     */
    public function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;
    }

    /**
     * @return mixed
     */
    public function getisLoggedIn()
    {
        return $this->isLoggedIn;
    }

    /**
     * @param mixed $isLoggedIn
     */
    public function setIsLoggedIn($isLoggedIn)
    {
        $this->isLoggedIn = $isLoggedIn;
    }

    /**
     * @return int the total number of blog entries
     */
    public function getBlogCount()
    {
        return $this->blogCount;
    }


}