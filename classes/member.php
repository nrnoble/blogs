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
 *
 * @author Neal Noble <nnoble2@mail.greenriver.edu>
 * @copyright 2017
 */
class Member
{
    private $firstName;
    private $lastName;
    private $gender;
    private $email;
    private $bio;
    private $userid;
    private $passwordHash;
    private $imageLocation = "http://nnoble.greenrivertech.net/328/blogs/profile_images/defaultimage.png";


    /**
     * Member constructor.
     * @param $first name of user profile
     * @param $last name  of user profile
     * @param $yearsOld of user profile
     * @param $sexualIdentity of user profile
     * @param $telephone contact of user
     * @param $premium is true if Premium member. default is null
     */
    function __construct($userid, $first, $last, $gender, $bio, $passwordHash, $imageLocation)
    {
//        Utilities::debug( "calling Member constructer: " . $first . ", " . $last .  ", " . $yearsOld . ", " . $sexualIdentity . ", " . $telephone . ", " . $premium);
        $this->firstName = $first;
        $this->lastName = $last;
        $this->age = $yearsOld;
        $this->gender = $sexualIdentity;
        $this->phone = $telephone;
        $this->premiumMember = $premium;
        $this->imageLocation = "http://nnoble.greenrivertech.net/328/signup/images/placeholder.png";
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
     * Get age
     * @return int age
     */
    public function getAge()
    {
        return $this->age;
    }


    /**
     * Set age
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
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
     * Get contact phone number
     * @return String phone number
     */
    public function getPhone()
    {
        return $this->phone;
    }


    /**
     * Set contact phone number
     * @param String $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
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
     * Get State location
     * @return String state
     */
    public function getState()
    {
        return $this->state;
    }


    /**
     * Sets state location
     * @param String $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }


    /**
     * get seeking gender
     * @return string gender
     */
    public function getSeekingGender()
    {
        return $this->seekingGender;
    }


    /**
     * Sets seeking gender
     * @param String $seekingGender
     */
    public function setSeekingGender($seekingGender)
    {
        $this->seekingGender = $seekingGender;
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
     * Get PremiumMember Status
     * @return Boolean $PremiumMember
     */
    public function getPremiumMember()
    {
        //echo  "getting getPremiumMember(): " . $this->premiumMember . "<BR>";
        return $this->premiumMember;
    }


    /**
     * Set the status of premium membership.
     * @param boolean $premiumMember
     */
    public function setPremiumMember($premiumMember)
    {
        //echo  "setting getPremiumMember(): " . $premiumMember . "<BR>";
        $this->premiumMember = $premiumMember;
    }
    

}