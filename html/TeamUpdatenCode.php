<?php 
//Hier wordt de PHP-file van de DAL geïmporteerd. (database connectie)

	session_start();
	include 'DAL.php';

if (isset($_POST['Submit1'])) {
	
//Gegevens over PloegKapitein. NAMING CONVENTION: TK = TeamKapitein

	$TKFirstname = $_POST["Firstname1"];
	
	$TKLastname = $_POST["Lastname1"];
	
	$TKAddress = $_POST["Address1"];
	
	$TKZip = $_POST["Zip1"];
	
	$TKCity = $_POST["City1"];
	
	$TKCountry = $_POST["Country1"];
	
	$TKCountry = mysqli_real_escape_string($conn, $TKCountry);
	
	$TKPhone = $_POST["Phone1"];
	
	$TKEmail = $_POST["Email1"];

	$TKEmail = mysqli_real_escape_string($conn, $TKEmail);
	
	$TKGender = $_POST["Gender1"];
	
	$TKDeelnemersID = $_POST["DeelnemersID1"];
		
// Gegevens over het 2de Teamlid (OOK Reserve-Kapitein). NAMING CONVENTION: TM2 = TeamMember2
	
	$TM2Firstname = $_POST["Firstname2"];
	
	$TM2Lastname = $_POST["Lastname2"];
	
	$TM2Address = $_POST["Address2"];
	
	$TM2Zip = $_POST["Zip2"];
	
	$TM2City = $_POST["City2"];
	
	$TM2Country = $_POST["Country2"];
	
	$TM2Phone = $_POST["Phone2"];
	
	$TM2Email = $_POST["Email2"];
	
	$TM2Gender = $_POST["Gender2"]; 
	
	$TM2DeelnemersID = $_POST["DeelnemersID2"];

/* Gegevens over het 3de Teamlid. NOTE: nu halen we enkel de gegevens op. Later (lees: hieronder) kijken we of dit teamlid echt bestaat (aangezien teams ook uit 2 personen mogen bestaan)
NAMING CONVENTION: TM3 = TeamMember3 */
	
	$TM3Firstname = $_POST["Firstname3"];
	
	$TM3Lastname = $_POST["Lastname3"];
	
	$TM3Email = $_POST["Email3"];
	
	$TM3Gender = $_POST["Gender3"]; 
	
	$TM3DeelnemersID = $_POST["DeelnemersID3"];
	

/* Gegevens over het 4de Teamlid. NOTE: nu halen we enkel de gegevens op. Later (lees: hieronder) kijken we of dit teamlid echt bestaat (aangezien teams ook uit 2 personen mogen bestaan)
 NAMING CONVENTION: TM4 = TeamMember4 */
		
	$TM4Firstname = $_POST["Firstname4"];
	
	$TM4Lastname = $_POST["Lastname4"];
	
	$TM4Email = $_POST["Email4"];
	
	$TM4Gender = $_POST["Gender4"];
	
	$TM4DeelnemersID = $_POST["DeelnemersID4"];
 
/* Gegevens over het 5de Teamlid. NOTE: nu halen we enkel de gegevens op. Later (lees: hieronder) kijken we of dit teamlid echt bestaat (aangezien teams ook uit 2 personen mogen bestaan)
 NAMING CONVENTION: TM5 = TeamMember5 */
	
	$TM5Firstname = $_POST["Firstname5"];
	
	$TM5Lastname = $_POST["Lastname5"];
	
	$TM5Email = $_POST["Email5"];
	
	$TM5Gender = $_POST["Gender5"]; 
	
	$TM5DeelnemersID = $_POST["DeelnemersID5"];

/* Gegevens over het 6de Teamlid. NOTE: nu halen we enkel de gegevens op. Later (lees: hieronder) kijken we of dit teamlid echt bestaat (aangezien teams ook uit 2 personen mogen bestaan)
 NAMING CONVENTION: TM6 = TeamMember6 */
	
	$TM6Firstname = $_POST["Firstname6"];
	
	$TM6Lastname = $_POST["Lastname6"];
	
	$TM6Email = $_POST["Email6"];
	
	$TM6Gender = $_POST["Gender6"];
	
	$TM6DeelnemersID = $_POST["DeelnemersID6"];

/* Gegevens over het 7de Teamlid. NOTE: nu halen we enkel de gegevens op. Later (lees: hieronder) kijken we of dit teamlid echt bestaat (aangezien teams ook uit 2 personen mogen bestaan)
 NAMING CONVENTION: TM7 = TeamMember7 */
	
	$TM7Firstname = $_POST["Firstname7"];
	
	$TM7Lastname = $_POST["Lastname7"];
	
	$TM7Email = $_POST["Email7"];
	
	$TM7Gender = $_POST["Gender7"];
	
	$TM7DeelnemersID = $_POST["DeelnemersID7"];

/* Gegevens over het 8de Teamlid. NOTE: nu halen we enkel de gegevens op. Later (lees: hieronder) kijken we of dit teamlid echt bestaat (aangezien teams ook uit 2 personen mogen bestaan)
 NAMING CONVENTION: TM8 = TeamMember8 */
	
	$TM8Firstname = $_POST["Firstname8"];
	
	$TM8Lastname = $_POST["Lastname8"];
	
	$TM8Email = $_POST["Email8"];
	
	$TM8Gender = $_POST["Gender8"];
	
	$TM8DeelnemersID = $_POST["DeelnemersID8"];
	
//Aantal leden van team opvragen

	$AantalLeden = $_POST["AantalLeden"];
	
	
	
	/*if ($Country == "BelgiÃ«" )
	{
		$Country = "België";	
	}*/


//Hier wordt de MySL-connectie geopend

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	
	}
	
	
//Opvragen van de TeamID zodat deze gebruikt kan worden in de volgende Stored Procedures.

	$TeamID = $_SESSION['TeamID'];

	
//STORED PROCEDURE VOOR UPDATE VAN TEAMKAPITEIN
	
	$sql = "CALL SP_UpdateDeelnemer2(($TKDeelnemersID), '$TKFirstname','$TKLastname', '$TKGender', '$TKEmail')";

	if(mysqli_query($conn, $sql)){
		$success += 1;
		echo "Records (sp_UpdateDeelnemers) added successfully. \n";
	} else{
		echo "ERROR (sp_UpdateDeelnemers): Could not able to execute $sql. " . mysqli_error($conn);
	}
	
	
	$TKFullCity = "SELECT Gemeente FROM tblpostcodes WHERE Postnummer = $TKCity";

	$TKSQL = "CALL sp_UpdateKapiteingegevens(($TKDeelnemersID), ($TeamID), ($TKCountry), '$TKAddress', ($TKCity), ($TKFullCity), '$TKPhone')";
	
	if(mysqli_query($conn, $TKSQL)){
		echo "Records (sp_UpdateKapiteingegevens) added successfully. \n";
	} else{
		echo "ERROR (sp_UpdateKapiteingegevens): Could not able to execute $TKSQL. " . mysqli_error($conn);
	}
	

//Stored Procedure van TeamMember2 (Reserve Teamkapitein)

	$sql2 = "CALL SP_UpdateDeelnemer2(($TM2DeelnemersID), '$TM2Firstname', '$TM2Lastname', '$TM2Gender' ,'$TM2Email')";
	
	if(mysqli_query($conn, $sql2)){
		$success += 1;
		echo "Records (SP_Deelnemers) added successfully. \n";
	} else{
		echo "ERROR (SP_Deelnemers): Could not able to execute $sql2. " . mysqli_error($conn);
	}
	

	$TM2FullCity = "SELECT Gemeente FROM tblpostcodes WHERE Postnummer = $TM2City";
	
	$TM2SQL = "CALL sp_UpdateReserveKapiteingegevens(($TM2DeelnemersID), ($TeamID), ($TM2Country), '$TM2Address', ($TM2City), ($TM2FullCity), '$TM2Phone')";
	
	if(mysqli_query($conn, $TM2SQL)){
		$success += 1;
		echo "Records (sp_UpdateReserveKapiteingegevens) added successfully. \n";
	} else{
		echo "ERROR (sp_UpdateReserveKapiteingegevens): Could not able to execute $TM2SQL. " . mysqli_error($conn);
	}


//Stored Procedure van TeamMember3 (indien van toepassing)

	if($AantalLeden >= 3)
	{
		$sql3 = "CALL SP_UpdateDeelnemer2(($TM3DeelnemersID), '$TM3Firstname', '$TM3Lastname', '$TM3Gender', '$TM3Email')";
		
		if(mysqli_query($conn, $sql3)){
			echo "Records added successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql3. " . mysqli_error($conn);
		}
	}

	
//Stored Procedure van TeamMember4 (indien van toepassing)


	if($AantalLeden >= 4)
	{
		$sql4 = "CALL SP_UpdateDeelnemer2(($TM4DeelnemersID), '$TM4Firstname', '$TM4Lastname', '$TM4Gender', '$TM4Email')";
		
		if(mysqli_query($conn, $sql4)){
			echo "Records added successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql4. " . mysqli_error($conn);
		}
	}


//Stored Procedure van TeamMember5 (indien van toepassing)


	if($AantalLeden >= 5)
	{
		$sql5 = "CALL SP_UpdateDeelnemer2(($TM5DeelnemersID), '$TM5Firstname', '$TM5Lastname', '$TM5Gender', '$TM5Email')";
		
		if(mysqli_query($conn, $sql5)){
			echo "Records added successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql5. " . mysqli_error($conn);
		}
	}
	

//Stored Procedure van TeamMember6 (indien van toepassing)


	if($AantalLeden >= 6)
	{
		$sql6 = "CALL SP_UpdateDeelnemer2(($TM6DeelnemersID), '$TM6Firstname', '$TM6Lastname', '$TM6Gender', '$TM6Email')";
		
		if(mysqli_query($conn, $sql6)){
			echo "Records added successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql6. " . mysqli_error($conn);
		}
	}


//Stored Procedure van TeamMember7 (indien van toepassing)


	if($AantalLeden >= 7)
	{
		$sql7 = "CALL SP_UpdateDeelnemer2(($TM7DeelnemersID), '$TM7Firstname', '$TM7Lastname', '$TM7Gender', '$TM7Email')";
		
		if(mysqli_query($conn, $sql7)){
			echo "Records added successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql7. " . mysqli_error($conn);
		}
		
	}


//Stored Procedure van TeamMember8 (indien van toepassing)


	if($AantalLeden >= 8)
	{
		$sql8 = "CALL SP_UpdateDeelnemer2(($TM8DeelnemersID), '$TM8Firstname', '$TM8Lastname', '$TM8Gender', '$TM8Email')";
		
		if(mysqli_query($conn, $sql8)){
			echo "Records added successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql8. " . mysqli_error($conn);
		}
	}
	
	header("location:./AccountTeam.php?tu=true");
	
	
	}



?>
