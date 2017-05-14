<?php
/**
 * Neal Noble
 * Course: IT 328 - Full-Stack Web Development
 * Assignment: Blogs
 * May 2017
 * Instructor: Tina Ostrander
 */

namespace DatingSite;
use PDO;
use PDOException;


// CREATE TABLE nnoble_grcc.bloggers
// (
//    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
//    firstname CHAR(20),
//    lastname CHAR(20),
//    profileimage CHAR(255),
//    bio TEXT,
//    userid CHAR(32) NOT NULL,
//    passwordhash CHAR(255)
// );
// CREATE UNIQUE INDEX bloggers_id_uindex ON nnoble_grcc.bloggers (id);






class MembersDB
{
    private $_dbConnection;

    function __construct()
    {
        require_once("/home/nnoble/config.php");


        try {
            //Establish database connection
            $this->_dbConnection = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

            //Keep the connection open for reuse to improve performance
            $this->_dbConnection->setAttribute( PDO::ATTR_PERSISTENT, true);

            //Throw an exception whenever a database error occurs
            $this->_dbConnection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $e) {
            die( "Error!: " . $e->getMessage());
        }
    }


    /**
     * Add a new member to the dating site DB
     *
     * @param $firstName the first name of the member
     * @param $lastName the last name of the member
     * @param $age the age of the member
     * @param $gender the gender of the member
     * @param $phone the phone of the member
     * @param $premium true if the member is a premium members
     * @param $email the email of the member
     * @param $state the state of the member
     * @param $seeking the gender the member is seeking
     * @param $bio the members biography
     * @param $outdoor list of outdoor interests
     * @param $indoor list of indoor interests
     * @return true if the insert was successful, otherwise false
     */

    function addMember($fname ,$lname, $age, $gender, $phone, $premium, $email, $state, $seeking,  $bio,  $indoor,  $outdoor, $image)
    {
        $insert = 'INSERT INTO members  (fName,   lName,  age,  gender,  phone,  premium,  email,  state,  seeking,  bio,  indoor,  outdoor, image)
                                 VALUES (:fName, :lName, :age, :gender, :phone, :premium, :email, :state, :seeking, :bio, :indoor, :outdoor, :image)';

        //               $insert = "INSERT INTO members  (fname,  lname,  age,  gender, phone, premium, email, state,  seeking,  bio,  indoor,  outdoor, image)
        //                            VALUES ('$fname','$lname',$age,'$gender', '$phone', premium, '$email', '$state', '$seeking',  '$bio',  '$indoor',  '$outdoor', '$image' )";

        $statement = $this->_dbConnection->prepare($insert);
        $statement->bindValue(':fName',   $fname, PDO::PARAM_STR);
        $statement->bindValue(':lName',   $lname, PDO::PARAM_STR);
        $statement->bindValue(':age',     $age, PDO::PARAM_INT);
        $statement->bindValue(':gender',  $gender, PDO::PARAM_STR);
        $statement->bindValue(':phone',   $phone, PDO::PARAM_STR);
        $statement->bindValue(':premium', $premium, PDO::PARAM_INT);
        $statement->bindValue(':email',   $email, PDO::PARAM_STR);
        $statement->bindValue(':state',   $state, PDO::PARAM_STR);
        $statement->bindValue(':seeking', $seeking, PDO::PARAM_STR);
        $statement->bindValue(':bio',     $bio, PDO::PARAM_STR);
        $statement->bindValue(':indoor',  $indoor, PDO::PARAM_STR);
        $statement->bindValue(':outdoor', $outdoor, PDO::PARAM_STR);
        $statement->bindValue(':image',   $image, PDO::PARAM_STR);

        $statement->execute();

        //Return ID of inserted row
        return $this->_dbConnection->lastInsertId();
    }

    //READ
    /**
     * Returns all members in the database collection.
     *
     * @access public
     *
     * @return an associative array of members indexed by id
     */
    public function getAllMembers(){
        $select = 'SELECT member_id, fname, lname, age, phone, email, state, gender, seeking, premium, indoor, outdoor FROM members';
        //$select = 'SELECT *  FROM members';
        $statement = $this->_dbConnection->prepare($select);
        //$results = $statement->fetchall(PDO::FETCH_ASSOC);
        $results = $this->_dbConnection->query($select);
        return $results;

        $resultsArray = array();

        //map each members id to a row of data for that pet
        while ($row = $results->fetchAll(PDO::FETCH_COLUMN, 0)) {
            $resultsArray[$row['id']] = $row;
            //echo $row;

        }

        return $resultsArray;
    }


    public function getTableRows()
    {
        $select = 'SELECT member_id, fname, lname, age, phone, email, state, gender, seeking, premium, indoor, outdoor FROM members';
        $statement = $this->_dbConnection->prepare($select);
        $results = $this->_dbConnection->query($select);
        $rows = array();
        $rowdata = "";

        foreach ($results as $row){

            $rowdata = $rowdata . "<tr data-toggle='tooltip' title='Click on row to display user profile' onclick = getID(this) class='tablerow' id='"  . $row['member_id'] .  "'>";
            $rowdata = $rowdata . "<td>" . $row['member_id'] . "</td>";
            $rowdata = $rowdata . "<td>" . $row['fname'] . " " .$row['lname'] . "</td>";
//            $rowdata = $rowdata . "<td>" . $row['lname'] . "</td>";
            $rowdata = $rowdata . "<td>" . $row['age'] . "</td>";
            $rowdata = $rowdata . "<td>" . $row['phone'] ."</td>";
            $rowdata = $rowdata . "<td>" . $row['email'] .  "</td>";
            $rowdata = $rowdata . "<td>" . $row['state'] .  "</td>";
            $rowdata = $rowdata . "<td>" . $row['gender'] .  "</td>";
            $rowdata = $rowdata . "<td>" . $row['seeking'] .  "</td>";

            $premiumRow = "";
            if ($row['premium'] == 1)
            {
                $premiumRow = "<input type='checkbox' name='premiumbox' class='custom-control-input' checked value='true' disabled='disabled'>";
            }
            else
            {
                $premiumRow = "<input type='checkbox' name='premiumbox' class='custom-control-input'  disabled='disabled'>";
            }


//            $rowdata = $rowdata . "<td>" . $row['premium'] . "</td>";
            $rowdata = $rowdata . "<td>" . $premiumRow . "</td>";

            $rowdata = $rowdata . "<td>" . $row['indoor'] ." " . $row['outdoor'] . "</td>";

//            $intestests =  "<td>" . $row['indoor'] . $row['outdoor'] . "</td>";
//            $intestests1 =  trim($intestests);
//            $intestests2 = "test" . $intestests1 . "test";
//            $t = str_replace(" " , ".", $intestests2);
//
//           print_r($t);
//           // $results2 = str_replace("." , ", ", $results);
            // print_r($results2);

            //     print_r($results2);

            //$rowdata = $rowdata . "<td>" . $row['outdoor'] .  "</td>";

            $rowdata = $rowdata . "</tr>\n";

            //array_push($rows,$rowdata);
            //$rowdata ="";

        }

        return $rowdata;
    }


    /**
     * Returns a member that has the given id.
     *
     * @access public
     * @param int $id the id of the members
     *
     * @return an associative array of pet attributes, or false if
     * the member was not found
     */
    public function memberById($member_id)
    {
        $select = 'SELECT * FROM members WHERE member_id=' . $member_id;
        $statement = $this->_dbConnection->prepare($select);
        $tableRows = $this->_dbConnection->query($select);

        //  echo "userid= ". $tableRows[0]['member_id'] ."<br>";

        foreach ($tableRows as $row)
        {
            $member = null;
            if ($row['premium'] == 1)
            {
                $member = new \DatingSite\PremiumMember($row['fname'],
                    $row['lname'],
                    $row['age'],
                    $row['gender'],
                    $row['phone'],
                    1);

                $member->setEmail($row['email']);
                $member->setState($row['state']);
                $member->setBio($row['bio']);
                $member->setSeekingGender($row['seeking']);
                $member->setInDoorInterests($row['indoor']);
                $member->setOutDoorInterests($row['outdoor']);
                $member->setImageLocation($row['image']);
            }
            else
            {
                $member = new \DatingSite\Member($row['firstName'],
                    $row['lastName'],
                    $row['age'],
                    $row['gender'],
                    $row['phone'],
                    0);

                $member->setEmail($row['email']);
                $member->setState($row['state']);
                $member->setBio($row['bio']);
                $member->setSeekingGender($row['seeking']);
            }

            $_SESSION['member_id'] =  $row['member_id'];
            $_SESSION['fname'] =  $row['fname'];
            $_SESSION['fname'] =  $row['fname'];
            $_SESSION['age'] =  $row['age'];
            $_SESSION['phone'] =  $row['phone'];
            $_SESSION['gender'] =  $row['gender'];
            $_SESSION['email'] =  $row['email'];
            $_SESSION['state'] =  $row['state'];
            $_SESSION['bio'] =  $row['bio'];
            $_SESSION['seeking'] =  $row['seeking'];
            $_SESSION['indoor'] =  $row['indoor'];
            $_SESSION['outdoor'] =  $row['outdoor'];
            $_SESSION['premium'] =  $row['premium'];

            $_SESSION['member_id'] =  $row['member_id'];
            $_SESSION['fname'] =  $row['fname'];
            $_SESSION['fname'] =  $row['fname'];
            $_SESSION['age'] =  $row['age'];
            $_SESSION['phone'] =  $row['phone'];
            $_SESSION['gender'] =  $row['gender'];
            $_SESSION['email'] =  $row['email'];
            $_SESSION['state'] =  $row['state'];
            $_SESSION['bio'] =  $row['bio'];
            $_SESSION['seeking'] =  $row['seeking'];
            $_SESSION['indoor'] =  $row['indoor'];
            $_SESSION['outdoor'] =  $row['outdoor'];
            $_SESSION['premium'] =  $row['premium'];
        }
        $rows = array();

//        $rowdata = "";
//        $statement = $this->_dbConnection->prepare($select);
//        $statement->bindValue(':member_id', $member_id, PDO::PARAM_INT);
//        $statement->execute();
//        $statement->fetch(PDO::FETCH_ASSOC);
        //print_r($results);

        return $member;
    }



    /**
     * Deletes the member associated with the input id.
     *
     * @access public
     * @param int $id the id of the member
     *
     * @return true if the delete was successful, otherwise false
     */
    function deleteMembers($id)
    {
        $delete = 'DELETE FROM members WHERE id=:id';

        $statement = $this->_dbConnection->prepare($delete);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        return $statement->execute();
    }

    /**
     * updates the image path
     *
     * @param String $imageLocation on server where the images is stored
     * @param int $id member id
     */
    function updateImageLocations($imageLocation, $id)
    {

        $update = 'UPDATE members SET image=:imageLocation
                                   WHERE member_id=:id';

        $statement = $this->_dbConnection->prepare($update);
        $statement->bindValue(':imageLocation', $imageLocation, PDO::PARAM_STR);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        // echo "<br>Running image location update<br>";
        $statement->execute();
    }

}