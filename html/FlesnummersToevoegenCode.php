<?php 
//Hier wordt de PHP-file van de DAL geïmporteerd. (database connectie)

	session_start();
	include 'DAL.php';
	include 'DALBackoffice.php';
	echo "toegevoegd";

if (isset($_POST['Submit1'])) {
	
//Flesjesnummers ophalen.

	$AantalNieuweFlessen = $_POST["countFlesnummer"];

//Hier wordt de MySL-connectie geopend

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
//STORED PROCEDURE VOOR FLESJES TOE TE VOEGEN MET EEN TEAMID
	
	$count = 0;
	
	while ($AantalNieuweFlessen >= $count)
	{
		$count += 1;
		
		$TeamIDName = "TeamID" . $count;
		
		$TeamID = $_POST[$TeamIDName];
		
		$FlesnummerName = "Flesnummer" . $count;
		
		$Flesnummer = $_POST[$FlesnummerName];

		InsertFlesje($Flesnummer, $TeamID, $conn);
	}

	header("location:./BO-FlesnummersToevoegen.php?ft=true");
}
?>
