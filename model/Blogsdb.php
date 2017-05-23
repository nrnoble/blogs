<?php
/**
 * Neal Noble
 * Course: IT 328 - Full-Stack Web Development
 * Assignment: Blogs
 * May 2017
 * Instructor: Tina Ostrander
 */
namespace blogs;
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




class Blogsdb
{
    private $_dbConnection;

    function __construct()
    {
        //require_once("/home/nnoble/config.php");
        require_once("config.php");

        try {
            //Establish database connection
            $this->_dbConnection = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

            //Keep the connection open for reuse to improve performance
            $this->_dbConnection->setAttribute( PDO::ATTR_PERSISTENT, true);

            //Throw an exception whenever a database error occurs
            $this->_dbConnection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $e) {
            echo "sql connection error";
            die( "Error!: " . $e->getMessage());
        }
    }


    /**
     * Add a new blogger to the db.
     * @param {string} $firstName the first name of the blogger
     * @param {string} $lastName the last name of the blogger
     * @param {string} $gender the gender of the blogger
     * @param {string} $email the email of the blogger
     * @param {string} $bio the blogger's biography
     * @return {boolean} true if the insert was successful, otherwise false
     */

    function addBlogger($firstname , $lastname, $gender, $email, $bio, $indoor, $outdoor, $image)
    {
        $insert = 'INSERT INTO bloggers  (firstname,   $lastname,  $gender,  $email,  $bio,  $image, $userid, $passwordhash)
                                 VALUES (:firstname,   :lastname,  :gender,  :email,  :bio,  :image, :userid, :passwordhash)';


        $statement = $this->_dbConnection->prepare($insert);
        $statement->bindValue(':lastname',   lastname, PDO::PARAM_STR);
        $statement->bindValue(':lastname',   lastname, PDO::PARAM_STR);

        $statement->bindValue(':gender',  $gender, PDO::PARAM_STR);

        $statement->bindValue(':email',   $email, PDO::PARAM_STR);

        $statement->bindValue(':bio',     $bio, PDO::PARAM_STR);
        $statement->bindValue(':image',   $image, PDO::PARAM_STR);
        $statement->bindValue(':userid',   $userid, PDO::PARAM_STR);
        $statement->bindValue(':passwordhash',   $passwordhash, PDO::PARAM_STR);

        $statement->execute();

        //Return ID of inserted row
        return $this->_dbConnection->lastInsertId();
    }

    //READ
    /**
     * Returns all bloggers in the database collection.
     *
     * @access public
     *
     * @return string associative array of blogger indexed by id
     */
    public function getAllBloggers(){
        $select = 'SELECT * FROM nnoble_grcc.bloggers';
        //$select = 'SELECT firstname, lastname,  FROM bloggers';
        $statement = $this->_dbConnection->prepare($select);
        //$results = $statement->fetchall(PDO::FETCH_ASSOC);
        //$results = $statement->fetchall(PDO::FETCH_ASSOC);
        $results = $this->_dbConnection->query($select);
        return $results;

        $resultsArray = array();

        //map each blogger id to a row of data for that pet
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
     * Returns a blogger that has the given id.
     *
     * @access public
     * @param int $id the id of the blogger
     *
     * @return an associative array of blogger attributes, or false if
     * the blogger was not found
     */
    public function getBlogger($bloggerUserName)
    {
        $select = 'SELECT * FROM bloggers WHERE userid=' . "'$bloggerUserName'";
        $statement = $this->_dbConnection->prepare($select);
        $statement->execute();
        $results = $statement->fetch();
        return $results;
    }



    /**
     * Deletes the blogger associated with the input id.
     *
     * @access public
     * @param int $id the id of the blogger
     *
     * @return true if the delete was successful, otherwise false
     */
    function deleteBlogger($id)
    {
        $delete = 'DELETE FROM members WHERE id=:id';

        $statement = $this->_dbConnection->prepare($delete);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        return $statement->execute();
    }

    /**
     * updates the image path
     *
     * @param String $imageLocation on server where the profile_images is stored
     * @param int $id blogger id
     */
    function updateImageLocations($imageLocation, $id)
    {

        $update = 'UPDATE bloggers SET profileimage=:imageLocation
                                   WHERE userid=:id';

        $statement = $this->_dbConnection->prepare($update);
        $statement->bindValue(':profileimage', $imageLocation, PDO::PARAM_STR);
        $statement->bindValue(':userid', $id, PDO::PARAM_INT);
        // echo "<br>Running image location update<br>";
        $statement->execute();
    }

}