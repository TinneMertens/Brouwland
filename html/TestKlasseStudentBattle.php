<?php
require_once('simpletest/autorun.php');
require_once('DALRegistratie.php');


class TestOfWriteInsertStudentenbattleToDatabase extends UnitTestCase {

	//WRITE TEAM DATA TO DATABASE

  function testOfInsertStudentenbattleWithCorrectInput() {
    include 'DAL.php';
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    //If the record is added successfully, the method 'InsertStudentenbattle' will return true.

    $test = InsertStudentenbattle(292, 1 , $conn);
      $this->assertTrue($test); //Normally it has to return 'true'.
    }

  function testOfInsertStudentenbattleWithNotExistentTeamID() {
    include 'DAL.php';
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    /*If the record is added successfully, the method 'InsertStudentenbattle' will return true.
    In this case the method has to return false because the the TeamID is non-Existent */
    $test = InsertStudentenbattle(95578, 1 , $conn);
      $this->assertFalse($test); //Normally it has to return 'false'.
    }

  function testOfInsertStudentenbattleWithIncorrectTeamID() {
    include 'DAL.php';
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    /*If the record is added successfully, the method 'InsertStudentenbattle' will return true.
    In this case the method has to return false because the the TeamID is not valid */
    $test = InsertStudentenbattle('TeamID', 1 , $conn);
      $this->assertFalse($test); //Normally it has to return 'false'.
    }

  function testOfInsertStudentenbattleWithNegativeTeamID() {
    include 'DAL.php';
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    /*If the record is added successfully, the method 'InsertStudentenbattle' will return true.
    In this case the method has to return false because the the TeamID is negative */
    $test = InsertStudentenbattle(-25, 1 , $conn);
      $this->assertFalse($test); //Normally it has to return 'false'.
    }

  function testOfInsertStudentenbattleWithIncorrectBattleNR() {
    include 'DAL.php';
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    /*If the record is added successfully, the method 'InsertStudentenbattle' will return true.
    In this case the method has to return false because the the BattleNR is not valid */
    $test = InsertStudentenbattle(290, 'BattleNR' , $conn);
      $this->assertFalse($test); //Normally it has to return 'false'.
      }

  function testOfInsertStudentenbattleWithNotExistentBattleNR() {
    include 'DAL.php';
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    /*If the record is added successfully, the method 'InsertStudentenbattle' will return true.
    In this case the method has to return false because the the BattleNR is non-Existent */
    $test = InsertStudentenbattle(290, 9865 , $conn);
      $this->assertFalse($test); //Normally it has to return 'false'.
      }

  }
  ?>
