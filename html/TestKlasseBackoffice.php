<?php
require_once('simpletest/autorun.php');
require_once('DALBackoffice.php');


class TestOfBackoffice extends UnitTestCase {
	
	//WRITE BEERINSPECTOR TO DATABASE
	
	function testOfInsertKeurderWithCorrectInput() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   //If the info of the Beerinspector is transferred to the database, the method 'InsertKeurder' will return true.
	   $test = InsertKeurder("Sander", "Peeters", "Kerkstraat 125", 18368, 18368, 1, "0472284473", "M", "sander-peeters@telenet.be", "sape", "testUnit", $conn);
       $this->assertTrue($test); //Normally it has to return 'true'.
    }
	
	function testOfInsertKeurderWithIntegerWhereStringIsExpected() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the info of the Beerinspector is transferred to the database, the method 'InsertKeurder' will return true.
	   In this case the method has to return true where one of the parameters of the method is an integers where
	   a string is expected, because it has to be possible for users to fill in an integer. 
	   We execute this test for only one parameter and for only one time, because all the parameters 
	   act same as consequence of that they are declared as 'varchar(255)' in the database. */
	   $test = InsertKeurder(1, "Peeters", "Kerkstraat 125", 18368, 18368, 1, "0472284473", "M", "sander-peeters@telenet.be", "sape", "testUnit", $conn);
       $this->assertTrue($test); //Normally it has to return 'true'.
    }
	
	function testOfInsertKeurderWithIncorrectPostnumber() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the info of the Beerinspector is transferred to the database, the method 'InsertKeurder' will return true.
	   In this case the method has to return false, because we fill in 'test' where an integer is expected.
	   Also is the postnumber a Foreign key and a wrong value would destroy the links in the database.  */
	   $test = InsertKeurder("Sander", "Peeters", "Kerkstraat 125", "test", 18368, 1, "0472284473", "M", "sander-peeters@telenet.be", "sape", "testUnit", $conn);
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfInsertFlesjeWithCorrectInput() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the new bottle is transferred to the database, the method 'InsertFlesje' will return true. 
	   The statements below are in comments because the bottle below is already added and than the test will return false. 
	   Once you run this file one time, the bottle below will be added and the method will return false the second time you run 
	   it with the same bottle number below. */
	   //$test = InsertFlesje(99, 173, $conn);
       //$this->assertTrue($test); //Normally it has to return 'true'.
    }
	
	function testOfInsertFlesjeWithBottleIDThatDoesAlreadyExist() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the new bottle is transferred to the database, the method 'InsertFlesje' will return true.
	   When we fill in a BottleID that does already exist, the method has to return false. */
	   $test = InsertFlesje(1, 173, $conn);
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfInsertFlesjeWithTeamIDThatDoesNotExist() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the new bottle is transferred to the database, the method 'InsertFlesje' will return true.
	   When we fill in a TeamID that does not exist, the method has to return false. 
	   The statements below are in comments because the bottle below is already added and than the test will return false. 
	   Once you run this file one time, the bottle below will be added and the method will return false the second time you run 
	   it with the same bottle number below. */
	   //$test = InsertFlesje(100, 12345678, $conn);
       //$this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfUpdateFlesWithCorrectInput() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the extra info about the bottle is transferred to the database, the method 'UpdateFles' will return true.*/
	   $test = UpdateFles(1, "- Extra info hier invullen", $conn);
       $this->assertTrue($test); //Normally it has to return 'true'.
    }
	
	function testOfUpdateFlesCheckIfValueInMethodIsSameAsValueInDatabase() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the extra info about the bottle is transferred to the database, the method 'UpdateFles' will return true.
	   In this case the method has to return true, because it has to be possible for users to fill in an integer as extra information. */
	   $bottleID = 1;
	   $bottleInfo = "- Unit Test";
	   $test = UpdateFles($bottleID, $bottleInfo, $conn);
       $this->assertTrue($test); //Normally it has to return 'true'.
	   
	   //The value of the method has to be the same as the value in the database.
	   $bottleInfoValueSQL = mysqli_query($conn, "SELECT ExtraInfo FROM tblflesjes WHERE FlesjesID = $bottleID");
	   $bottleInfoValue = mysqli_fetch_assoc($bottleInfoValueSQL);
	   $this->assertEqual($bottleInfo, $bottleInfoValue['ExtraInfo']); //Normally it has to return 'true'.
    }
	
	function testOfUpdateFlesWithIncorrectBottleID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the extra info about the bottle is transferred to the database, the method 'UpdateFles' will return true.
	   In this case the method has to return false, because 'fles1' is not a valid BottleID */
	   $test = UpdateFles("fles1", "- Extra info hier invullen", $conn);
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfUpdateFlesWithNotExistingBottleID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the extra info about the bottle is transferred to the database, the method 'UpdateFles' will return true.
	   In this case the method has to return false, because '12345' is not an existing BottleID */
	   $test = UpdateFles(12345, "- Extra info hier invullen", $conn);
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfInsertFlesjeKeurderWithCorrectInput() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the the bottle is added to the beerinspector in the database, the method 'InsertFlesjeKeurder' will return true.
	   The statements below are in comments because the bottle below is already added to the beerinspector and than the test will return false. 
	   Once you run this file one time, the bottle below will be added and the method will return false the second time you run 
	   it with the same bottle number below. */
	   //$test = InsertFlesjeKeurder(1, 25, $conn);
       //$this->assertTrue($test); //Normally it has to return 'true'.
    }
	
	function testOfInsertFlesjeKeurderWithNotExistingBeerinspectorID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the the bottle is added to the beerinspector in the database, the method 'InsertFlesjeKeurder' will return true.
	   In this case the method has to return false, because '2' is not an existing BeerinspectorID.*/
	   $test = InsertFlesjeKeurder(1, 2, $conn);
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfInsertFlesjeKeurderWithNotExistingBottleID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the the bottle is added to the beerinspector in the database, the method 'InsertFlesjeKeurder' will return true.
	   In this case the method has to return false, because '12345' is not an existing BottleID. */
	   $test = InsertFlesjeKeurder(12345, 1, $conn);
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfInsertFlesjeKeurderWithIncorrectBeerinspectorID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the the bottle is added to the beerinspector in the database, the method 'InsertFlesjeKeurder' will return true.
	   In this case the method has to return false, because 'keurder2' is not a valid BeerinspectorID.*/
	   $test = InsertFlesjeKeurder(1, "keurder2", $conn);
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfInsertFlesjeKeurderWithIncorrectBottleID() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the the bottle is added to the beerinspector in the database, the method 'InsertFlesjeKeurder' will return true.
	   In this case the method has to return false, because 'fles1' is not a valid BottleID. */
	   $test = InsertFlesjeKeurder("fles1", 1, $conn);
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
	function testOfUpdateDataKeuringWithCorrectInput() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the the data (when the first inspection is accessible) is added to the database, 
	   the method 'InsertFlesjeKeurder' will return true. */
	   $test = UpdateDataKeuring("01/01/2015", "31/12/2015", "00:00", "23:59", $conn);
       $this->assertTrue($test); //Normally it has to return 'true'.
    }
	
	function testOfUpdateDataKeuringWithEmptyInput() {
	   include 'DAL.php';
	   $conn = mysqli_connect($servername, $username, $password, $dbname);
	   /*If the the data (when the first inspection is accessible) is added to the database, 
	   the method 'InsertFlesjeKeurder' will return true. But when the parameters are empty, the first
	   inspection will not be accessible. */
	   $test = UpdateDataKeuring("", "", "", "", $conn);
       $this->assertFalse($test); //Normally it has to return 'false'.
    }
	
}

?>