<?php
require_once('simpletest/autorun.php');
require_once('DALRegistratie.php');


class TestOfWriteRegistrationToDatabase extends UnitTestCase {
	
	//WRITE TEAM DATA TO DATABASE
	
	function testOfInsertTeamWithCorrectInput() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		//If the record is added successfully, the method 'InsertTeam' will return true.
		
		$test = InsertTeam('WinningTeam', 1, 'Brouwland', $conn);
		$this->assertTrue($test); //Normally it has to return 'true'.
	}
	
	function testOfInsertTeamWithFalseTeamName() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeam' will return true.
		In this case the method will return true because the database parses the integer to a string*/
		$test = InsertTeam(5, 1, 'Brouwland', $conn);
		$this->assertTrue($test); //Normally it has to return 'true'.
	}
	
		function testOfInsertTeamWithNotExistingType() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeam' will return true.
		In this case the method has to return false because the Competition type is non-existent */
		$test = InsertTeam('WinningTeam', 32, 'Brouwland', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
		
	function testOfInsertTeamWithIncorrectType() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeam' will return true.
		In this case the method has to return false because the Competition type is not valid */
		$test = InsertTeam('WinningTeam', 'Hobby', 'Brouwland', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamWithNegativeType() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeam' will return true.
		In this case the method has to return false because the Competition type is negative */
		$test = InsertTeam('WinningTeam', -5, 'Brouwland', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}	
	
	function testOfInsertTeamWithNotExistingIntakeAddress() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		//If the record is added successfully, the method 'InsertTeam' will return true.
		$test = InsertTeam('WinningTeam', 1, 'Nobody Knows', $conn);
		$this->assertTrue($test); //Normally it has to return 'true', since the parameter is just a string.
	}
	
	function testOfInsertTeamWithIncorrectIntakeAddress() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeam' will return true.
		In this case the method has to return true because the database parses the integer to a string */
		$test = InsertTeam('WinningTeam', 1, 40, $conn);
		$this->assertTrue($test); //Normally it has to return 'true'.
	}
	
	//WRITE TEAM MEMBER DATA TO DATABASE
	
	function testOfInsertTeamMemberWithCorrectInput() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		//If the record is added successfully, the method 'Deelnemers' will return true.

		$test = Deelnemers(290, 'Julien', 'Leloup', 'M', 'julien.leloup@student.ap.be' , $conn);
		$this->assertTrue($test); //Normally it has to return 'true'.
	}
	
	function testOfInsertTeamMemberWithIncorrectTeamID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'Deelnemers' will return true.
		In this case the method has to return false because the teamID is not valid */
		$test = Deelnemers('TeamID', 'Julien', 'Leloup', 'M', 'julien.leloup@student.ap.be' , $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamMemberWithNegativeTeamID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'Deelnemers' will return true.
		In this case the method has to return false because the teamID is negative */
		$test = Deelnemers(-5, 'Julien', 'Leloup', 'M', 'julien.leloup@student.ap.be' , $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamMemberWithNotExistentTeamID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'Deelnemers' will return true.
		In this case the method has to return false because the teamID is not existent */
		$test = Deelnemers(95578, 'Julien', 'Leloup', 'M', 'julien.leloup@student.ap.be' , $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamMemberWithNotExistentEmailAddress() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'Deelnemers' will return true.
		In this case the method has to return true because the e-mailAddress is just a string */
		$test = Deelnemers(290, 'Julien', 'Leloup', 'M', 'Deelnemer1' , $conn);
		$this->assertTrue($test); //Normally it has to return 'true'.
	}
	
	function testOfInsertTeamMemberWithIncorrectEmailAddress() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'Deelnemers' will return true.
		In this case the method has to return true because the database parses the integer to a string */
		$test = Deelnemers(290, 'Julien', 'Leloup', 'M', 75 , $conn);
		$this->assertTrue($test); //Normally it has to return 'true'.
	}
	
	//WRITE TEAM CAPTAIN DATA TO DATABASE
	
	function testOfInsertTeamKaptainWithCorrectInput() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.*/
		$test = InsertTeamKapitein(286, 290, 1, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithIncorrectID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false because the ID is not valid */
		$test = InsertTeamKapitein(-150, 290, 1, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithUnknownID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false because the contextantID doesn't exist in the table tblDeelnemers */
		$test = InsertTeamKapitein(5468, 290, 1, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithIncorrectTeamID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false because the ID is not valid */
		$test = InsertTeamKapitein(286, -120, 1, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithUnknownTeamID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false because the TeamID is not correct */
		$test = InsertTeamKapitein(286, 5795, 1, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithIncorrectTeamIDString() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false because the ID is not valid */
		$test = InsertTeamKapitein(286, "120", 1, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithIncorrectCountryID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false because the CountryID is not valid */
		$test = InsertTeamKapitein(286, 290, -1, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithUnknownCountryID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false because the CountryID is unknown */
		$test = InsertTeamKapitein(286, 290, 5, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithIncorrectAddress() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false because the Address is not valid (should be a string) */
		$test = InsertTeamKapitein(286, 290, 1, 765, 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithUnkownAddress() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return true because the Address is a string */
		$test = InsertTeamKapitein(286, 290, 1,'Alfons Butsstraat 23', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithIncorrectPostalNumber() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false because the PostalNumber is not valid */
		$test = InsertTeamKapitein(286, 290, 1, 'Meistraat 15', -18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithUnknownPostalNumber() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false because the PostalNumber is unknown		*/
		$test = InsertTeamKapitein(286, 290, 1, 'Meistraat 15', 5275468 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithIncorrectPostalNumberString() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false because the PostalNumber is not valid (String instead of Integer value)*/
		$test = InsertTeamKapitein(286, 290, 1, 'Meistraat 15', "18504" , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithIncorrectCity() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false because the City name field is not valid */
		$test = InsertTeamKapitein(286, 290, 1, 'Meistraat 15', 18504 , 24654, '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithUnknownCity() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false, because the name of the city doesn't match the postalNumber */
		$test = InsertTeamKapitein(286, 290, 1, 'Meistraat 15', 18504 , 'DeStadDieNietBestaat', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithIncorrectPhoneNumber() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false because the PhoneNumber field is not valid */
		$test = InsertTeamKapitein(286, 290, 1, 'Meistraat 15', 18504 , 'Antwerpen', 4854654, $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertTeamKaptainWithUnknownPhoneNumber() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertTeamKapitein' will return true.
		In this case the method has to return false because the PhoneNumber isn't the correct format */
		$test = InsertTeamKapitein(286, 290, 1, 'Meistraat 15', 18504 , 'Antwerpen', '5876123436', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	//WRITE SPARE TEAM CAPTAIN DATA TO DATABASE
	
	function testOfInsertSpareTeamKaptainWithCorrectInput() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.*/
		$test = InsertReserveTeamKapitein(286, 290, 1, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpareTeamKaptainWithIncorrectID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the ID is not valid */
		$test = InsertReserveTeamKapitein(-150, 290, 1, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpareTeamKaptainWithUnknownID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the contestant ID doesn't exist. In the future this might be correct*/
		$test = InsertReserveTeamKapitein(5468, 290, 1, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpearTeamKaptainWithIncorrectTeamID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the ID is not valid */
		$test = InsertReserveTeamKapitein(287, -120, 1, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpearTeamKaptainWithUnknownTeamID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the TeamID is not correct */
		$test = InsertReserveTeamKapitein(287, 5795, 1, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpearTeamKaptainWithIncorrectTeamIDString() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the ID is not valid */
		$test = InsertReserveTeamKapitein(287, "120", 1, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpearTeamKaptainWithIncorrectCountryID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the CountryID is not valid */
		$test = InsertReserveTeamKapitein(287, 290, -1, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpearTeamKaptainWithUnknownCountryID() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the CountryID is unknown */
		$test = InsertReserveTeamKapitein(287, 290, 5, 'Meistraat 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpearTeamKaptainWithIncorrectAddress() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the Address is not valid (should be a string) */
		$test = InsertReserveTeamKapitein(287, 290, 1, 765, 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpearTeamKaptainWithUnkownAddress() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return true because the Address is a string */
		$test = InsertReserveTeamKapitein(287, 290, 1, 'DezeStraatBestaatNiet 15', 18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpearTeamKaptainWithIncorrectPostalNumber() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the PostalNumber is not valid */
		$test = InsertReserveTeamKapitein(287, 290, 1, 'Meistraat 15', -18504 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpearTeamKaptainWithUnknownPostalNumber() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the PostalNumber is unknown		*/
		$test = InsertReserveTeamKapitein(287, 290, 1, 'Meistraat 15', 5275468 , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpearTeamKaptainWithIncorrectPostalNumberString() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the PostalNumber is not valid (String instead of Integer value)*/
		$test = InsertReserveTeamKapitein(287, 290, 1, 'Meistraat 15', "18504" , 'Antwerpen', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpearTeamKaptainWithIncorrectCity() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the City name field is not valid */
		$test = InsertReserveTeamKapitein(287, 290, 1, 'Meistraat 15', 18504 , 24654, '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpearTeamKaptainWithUnknownCity() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the city name in't the one linked to the PostalNumber */
		$test = InsertReserveTeamKapitein(287, 290, 1, 'Meistraat 15', 18504 , 'DeStadDieNietBestaat', '0470527638', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpearTeamKaptainWithIncorrectPhoneNumber() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the PhoneNumber field is not valid */
		$test = InsertReserveTeamKapitein(287, 290, 1, 'Meistraat 15', 18504 , 'Antwerpen', 4854654, $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
	
	function testOfInsertSpearTeamKaptainWithUnknownPhoneNumber() {
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		/*If the record is added successfully, the method 'InsertReserveTeamKapitein' will return true.
		In this case the method has to return false because the PhoneNumber ins't the right format */
		$test = InsertReserveTeamKapitein(287, 290, 1, 'Meistraat 15', 18504 , 'Antwerpen', '5876123436', $conn);
		$this->assertFalse($test); //Normally it has to return 'false'.
	}
}
?>