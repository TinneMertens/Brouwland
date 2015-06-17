<?php
require_once('simpletest/autorun.php');
require_once('DALRegistratie.php');


class TestOfWriteInsertCursusToDatabase extends UnitTestCase {

	//WRITE TEAM DATA TO DATABASE

	function testOfInsertCursusWithCorrectInput() {
	  include 'DAL.php';
	  $conn = mysqli_connect($servername, $username, $password,$dbname);
	  //If the record is added successfully, the method 'InsertCursus' will return true.

	  $test = InsertCursus(290, '10/02/2015', 001 , $conn);
		$this->assertTrue($test); //Normally it has to return 'true'.
	  }

	function testOfInsertCursusWithWithNotExistentTeamID() {
	  include 'DAL.php';
	  $conn = mysqli_connect($servername, $username, $password,$dbname);
	  /*If the record is added successfully, the method 'InsertCursus' will return true.
	  In this case the method has to return false because the TeamID is non-Existent */
	  $test = InsertCursus (95578, '10/02/2015', 001 , $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	  }

	function testOfInsertCursusWithWithIncorrectTeamID() {
	  include 'DAL.php';
	  $conn = mysqli_connect($servername, $username, $password,$dbname);
	  /*If the record is added successfully, the method 'InsertCursus' will return true.
	  In this case the method has to return false because the the TeamID is not valid */
	  $test = InsertCursus ('TeamID', '10/02/2015', 001 , $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	  }

	function testOfInsertCursusWithWithNegativeTeamID() {
	  include 'DAL.php';
	  $conn = mysqli_connect($servername, $username, $password,$dbname);
	  /*If the record is added successfully, the method 'InsertCursus' will return true.
	  In this case the method has to return false because the the TeamID is negative */
	  $test = InsertCursus (-25, '10/02/2015', 001 , $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	  }

	function testOfInsertCursusWithNotExistentTrainingsDatum() {
	  include 'DAL.php';
	  $conn = mysqli_connect($servername, $username, $password,$dbname);
	  /*If the record is added successfully, the method 'InsertCursus' will return true.
	  In this case the method has to return false because the TrainingsDatum is non-Existent */
	  $test = InsertCursus (120, '10/09/2015', 001 , $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	  }

	function testOfInsertCursusWithIncorrectTrainingsDatum() {
	  include 'DAL.php';
	  $conn = mysqli_connect($servername, $username, $password,$dbname);
	  /*If the record is added successfully, the method 'InsertCursus' will return true.
	  In this case the method has to return false because the TrainingsDatum is not valid */
	  $test = InsertCursus (120, 'TrainingsDatum', 001 , $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	  }

	function testOfInsertCursusWithNotExistentTrainingsNr() {
	  include 'DAL.php';
	  $conn = mysqli_connect($servername, $username, $password,$dbname);
	  /*If the record is added successfully, the method 'InsertCursus' will return true.
	  In this case the method has to return false because the TrainingsNr is not valid */
	  $test = InsertCursus (120, '10/02/2015', 8451 , $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	  }

	function testOfInsertCursusWithIncorrectTrainingsNr() {
	  include 'DAL.php';
	  $conn = mysqli_connect($servername, $username, $password,$dbname);
	  /*If the record is added successfully, the method 'InsertCursus' will return true.
	  In this case the method has to return false because the TrainingsNr is non-Existent */
	  $test = InsertCursus (120, '10/02/2015', '001' , $conn);
	  $this->assertFalse($test); //Normally it has to return 'false'.
	}

  }
  ?>
