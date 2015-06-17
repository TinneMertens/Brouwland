<?php 
//Hier wordt de PHP-file van de DAL en Password-creatie geïmporteerd. (database connectie en genereren random paswoord)
	
	include 'DAL.php';
	include 'DALBackoffice.php';
	include './PassWordCreation.php';

if (isset($_POST['Submit1'])) {
	
//Gegevens over Keurder.

	$Flesnummer = $_POST["flesnummer"];
	
	$TextExtraInfo = $_POST["txtinfo"];

//Hier wordt de MySL-connectie geopend

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
//CHECKEN OF INGEGEVEN FLESJESID BESTAAT.

	$SQLID = "SELECT * FROM tblflesjes WHERE FlesjesID = $Flesnummer;";
	
	$resultSQLID=mysqli_query($conn, $SQLID);

	$countSQLID=mysqli_num_rows($resultSQLID);
	
	if ($countSQLID == 0)
	{
		header("location:./BO-InfoToevoegen.php?check=false");
	}
	else
	{
		//STORED PROCEDURE VOOR INFO TOE TE VOEGEN AAN FLES MET INGEGEVEN ID

		UpdateFles($Flesnummer, $TextExtraInfo, $conn);
		header("location:./Backoffice.php?ibt=true");
		}
	}


?>
