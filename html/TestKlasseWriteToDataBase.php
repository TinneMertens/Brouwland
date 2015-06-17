<?php
require_once('simpletest/autorun.php');
require_once('DALVoorkeuring.php');

class TestOfWriteScoreToDatabase extends UnitTestCase {

	//WRITE SCORE TO DATABASE
	
	function testOfWriteScoreToDatabaseWithCorrectInput() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   //If the points are transferred to the database, the method 'WriteScoreToDatabase' will return true.
	   $test = WriteScoreToDatabase(1, 1, 146, 10, $conn );
       $this->assertTrue($test); //Normally it has to return 'true'.
    }
	
	function testOfWriteScoreToDatabaseWithIncorrectBeerinspectorID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the points are transferred to the database, the method 'WriteScoreToDatabase' will return true.
	   In this case the method has to return false because 'keurder1' is not a valid BeerinspectorID */
	   $test = WriteScoreToDatabase(1, "keurder1", 146, 10, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }

	function testOfWriteScoreToDatabaseWithNotExistingBeerinspectorID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the points are transferred to the database, the method 'WriteScoreToDatabase' will return true.
	   In this case the method has to return false because '9999' is not an existing BeerinspectorID */
	   $test = WriteScoreToDatabase(1, 9999, 146, 10, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfWriteScoreToDatabaseWithNegativeBeerinspectorID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the points are transferred to the database, the method 'WriteScoreToDatabase' will return true.
	   In this case the method has to return false because '-1' is not a valid or existing BeerinspectorID */
	   $test = WriteScoreToDatabase(1, -1, 146, 10, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfWriteScoreToDatabaseWithIncorrectQuestionCriteriaID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the points are transferred to the database, the method 'WriteScoreToDatabase' will return true.
	   In this case the method has to return false because 'categorie23' is not a valid QuestionCriteriaID */
	   $test = WriteScoreToDatabase(1, 1, "categorie23", 10, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfWriteScoreToDatabaseWithNotExistingQuestionCriteriaID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the points are transferred to the database, the method 'WriteScoreToDatabase' will return true.
	   In this case the method has to return false because '100000' is not an existing QuestionCriteriaID */
	   $test = WriteScoreToDatabase(1, 1, 100000, 10, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfWriteScoreToDatabaseWithNotExistingBottleID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the points are transferred to the database, the method 'WriteScoreToDatabase' will return true.
	   In this case the method has to return false because '123456' is not an existing BottleID */
	   $test = WriteScoreToDatabase(123456789, 1, 146, 10, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfWriteScoreToDatabaseWithIncorrectBottleID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the points are transferred to the database, the method 'WriteScoreToDatabase' will return true.
	   In this case the method has to return false because 'flesje123' is not a valid BottleID */
	   $test = WriteScoreToDatabase("flesje123", 1, 146, 10, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfWriteScoreToDatabaseWithNegativeBottleID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the points are transferred to the database, the method 'WriteScoreToDatabase' will return true.
	   In this case the method has to return false because '-4' is not a valid or existing BottleID */
	   $test = WriteScoreToDatabase(-4, 1, 146, 10, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfWriteScoreToDatabaseWithIncorrectScore() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the points are transferred to the database, the method 'WriteScoreToDatabase' will return true.
	   In this case the method has to return false because 'tien' is not a valid score (string)*/
	   $test = WriteScoreToDatabase(1, 1, 146, "tien", $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfWriteScoreToDatabaseWithNegativeScore() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the points are transferred to the database, the method 'WriteScoreToDatabase' will return true.
	   In this case the method has to return false because the Beerinspectors cannot give a negative score to a team.*/
	   $test = WriteScoreToDatabase(1, 1, 4, -10, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
}

class TestOfWriteInfoToDatabase extends UnitTestCase {
	
	//WRITE INFO TO DATABASE
	
	function testOfWriteInfoToDatabaseWithCorrectInput() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   //If the info is transferred to the database, the method 'WriteInfoToDatabase' will return true.
	   $test = WriteInfoToDatabase(1, 1, 11, 1, $conn );
       $this->assertTrue($test); //Normally it has to return 'true'.
    }
	
	function testOfWriteInfoToDatabaseWithIncorrectBeerinspectorID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the info is transferred to the database, the method 'WriteInfoToDatabase' will return true.
	   In this case the method has to return false because 'keurder1' is not a valid BeerinspectorID */
	   $test = WriteInfoToDatabase(1, "keurder1", 11, 1, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }

	function testOfWriteInfoToDatabaseWithNotExistingBeerinspectorID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the info is transferred to the database, the method 'WriteInfoToDatabase' will return true.
	   In this case the method has to return false because '9999' is not an existing BeerinspectorID */
	   $test = WriteInfoToDatabase(1, 9999, 11, 1, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfWriteInfoToDatabaseWithNegativeBeerinspectorID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the info is transferred to the database, the method 'WriteInfoToDatabase' will return true.
	   In this case the method has to return false because '-1' is not a valid or existing BeerinspectorID */
	   $test = WriteInfoToDatabase(1, -1, 11, 1, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfWriteInfoToDatabaseWithIncorrectQuestionCriteriaID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the info is transferred to the database, the method 'WriteInfoToDatabase' will return true.
	   In this case the method has to return false because 'categorie23' is not a valid QuestionCriteriaID */
	   $test = WriteInfoToDatabase(1, 1, "categorie23", 1, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfWriteInfoToDatabaseWithNotExistingQuestionCriteriaID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the info is transferred to the database, the method 'WriteInfoToDatabase' will return true.
	   In this case the method has to return false because '100000' is not an existing QuestionCriteriaID */
	   $test = WriteInfoToDatabase(1, 1, 100000, 1, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfWriteInfoToDatabaseWithNotExistingBottleID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the info is transferred to the database, the method 'WriteInfoToDatabase' will return true.
	   In this case the method has to return false because '123456' is not an existing BottleID */
	   $test = WriteInfoToDatabase(123456789, 1, 11, 1, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfWriteInfoToDatabaseWithIncorrectBottleID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the info is transferred to the database, the method 'WriteInfoToDatabase' will return true.
	   In this case the method has to return false because 'flesje123' is not a valid BottleID */
	   $test = WriteInfoToDatabase("flesje123", 1, 11, 1, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfWriteInfoToDatabaseWithNegativeBottleID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the info is transferred to the database, the method 'WriteInfoToDatabase' will return true.
	   In this case the method has to return false because '-4' is not a valid or existing BottleID */
	   $test = WriteInfoToDatabase(-4, 1, 11, 1, $conn );
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
}

?>