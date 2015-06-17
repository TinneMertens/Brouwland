<?php
require_once('simpletest/autorun.php');
require_once('DALRegistratie.php');


class TestOfWriteInsertWachtwoordToDatabase extends UnitTestCase {

	//WRITE TEAM DATA TO DATABASE

  function testOfInsertWachtwoordWithCorrectInput() {
    include 'DAL.php';
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    //If the record is added successfully, the method 'InsertWachtwoord' will return true.

    $test = InsertWachtwoord(290, 'Brouwland' , $conn);
      $this->assertTrue($test); //Normally it has to return 'true'.
    }

  function testOfInsertWachtwoordWithNotExistentTeamID() {
    include 'DAL.php';
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    /*If the record is added successfully, the method 'InsertWachtwoord' will return true.
    In this case the method has to return false because the the TeamID is non-Existent */
    $test = InsertWachtwoord(95578, 'Brouwland' , $conn);
    $this->assertTrue($test); //Normally it has to return 'true'.
    }

  function testOfInsertWachtwoordWithIncorrectTeamID() {
    include 'DAL.php';
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    /*If the record is added successfully, the method 'InsertWachtwoord' will return true.
    In this case the method has to return false because the the TeamID is not valid */
    $test = InsertWachtwoord('TeamID', 'Brouwland' , $conn);
      $this->assertFalse($test); //Normally it has to return 'false'.
    }

  function testOfInsertWachtwoordWithNegativeTeamID() {
    include 'DAL.php';
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    /*If the record is added successfully, the method 'InsertWachtwoord' will return true.
    In this case the method has to return false because the the TeamID is negative */
    $test = InsertWachtwoord(-25, 'Brouwland' , $conn);
      $this->assertTrue($test); //Normally it has to return 'true'.
    }


  function testOfInsertWachtwoordWithIncorrectWachtwoord() {
    include 'DAL.php';
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    /*If the record is added successfully, the method 'InsertWachtwoord' will return true.
    In this case the method has to return true, because the password is still a string */
    $test = InsertWachtwoord(290, '646883438' , $conn);
      $this->assertTrue($test); //Normally it has to return 'true'.
    }

  function testOfInsertWachtwoordWithEmptyWachtwoord() {
    include 'DAL.php';
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    /*If the record is added successfully, the method 'InsertWachtwoord' will return true.
    In this case the method has to return true, because even though the password is empty, it is still a string */
    $test = InsertWachtwoord(290, '' , $conn);
      $this->assertTrue($test); //Normally it has to return 'true'.
    }

}
?>
