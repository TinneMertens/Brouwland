<?php 
//Hier wordt de PHP-file van de DAL geïmporteerd. (database connectie)

	session_start();
	include 'DAL.php';
	include 'DALBackoffice.php';
	
if (isset($_POST['b1'])) {
	
//Flesjesnummers ophalen.

	$AantalFlessen = $_POST["AantalFlessen"];
	
	$Keurder = $_POST["Keurder"];	


//Hier wordt de MySL-connectie geopend

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	
	}
	
	
//STORED PROCEDURE VOOR FLESJES TOE TE VOEGEN AAN KEURDERS
	
	$count = 0;
	
	while ($AantalFlessen >= $count)
	{
		$count += 1;
		
		$Flesjesnaam = "FlesjesID" . $count;
		
		$FlesjesID = $_POST[$Flesjesnaam];

		if(!empty($FlesjesID))
		{
			InsertFlesjeKeurder($FlesjesID, $Keurder, $conn);
		}
	}


	header("location:./BO-BierenToekennen.php?bt=true");
}



?>
