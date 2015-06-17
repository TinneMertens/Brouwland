<?php

	function CheckValidityInputBottleID($Flesnummer, $connectie)
	{
		$sqlFlesjesID = mysqli_query($connectie, "SELECT * FROM tblflesjes WHERE FlesjesID = $Flesnummer");
		
		if(($sqlFlesjesID == false) || (mysqli_num_rows($sqlFlesjesID) == 0))
		{
			return true;
		}
	}
	
	function CheckValidityInputDataKeuring($StartDate, $EndDate, $StartHour, $Endhour)
	{
		if(($StartDate == "") || ($EndDate == "") || ($StartHour == "") || ($Endhour == ""))
		{
			return true;
		}
	}

	function InsertKeurder($Firstname, $Lastname, $Address, $Postnummer, $City, $Country, $Phone, $Gender, $Email, $Gebruikersnaam, $PassEncrypt, $connectie ){
		
		$SQL = "CALL sp_insertKeurders ('$Firstname', '$Lastname', '$Address', '$Postnummer', ($City), $Country, '$Phone', '$Gender', '$Email', '$Gebruikersnaam', '$PassEncrypt');";
	
		if(mysqli_query($connectie, $SQL)){
			echo "Records added successfully.";
			return true;
		} else{
			echo "ERROR: Could not able to execute $SQL " . mysqli_error($connectie);
			return false;
		}
	}
	
	function InsertFlesje($Flesnummer, $TeamID, $connectie ){

		$SQL = "CALL sp_insertFlesjes(($Flesnummer), $TeamID);";
			
	if(mysqli_query($connectie, $SQL)){
			echo "Records added successfully.";
			return true;
		} else{
			echo "ERROR: Could not able to execute $SQL " . mysqli_error($connectie);
			return false;
		}
	}
	
	function UpdateFles($Flesnummer, $ExtraInfo, $connectie){

		if(CheckValidityInputBottleID($Flesnummer, $connectie))
		{
			echo "ERROR: BottleID is not correct.\r\n";
			return false;
		}
		else
		{
			$SQL = "CALL sp_UpdateFlesjes(($Flesnummer), '$ExtraInfo');";
				
			if(mysqli_query($connectie, $SQL)){
				echo "Records added successfully.";
				return true;
			} else{
				echo "ERROR: Could not able to execute $SQL " . mysqli_error($connectie);
				return false;
			}
		}
	}
	
	function InsertFlesjeKeurder($Flesnummer, $Keurder, $connectie ){

		$SQL = "CALL sp_insertFlesjesKeurders (($Flesnummer), ($Keurder));";
			
		if(mysqli_query($connectie, $SQL)){
			echo "Records added successfully.";
			return true;
		} else{
			echo "ERROR: Could not able to execute $SQL " . mysqli_error($connectie);
			return false;
		}
	}
	
	function UpdateDataKeuring($StartDate, $EndDate, $StartHour, $Endhour, $connectie ){
		
		if(CheckValidityInputDataKeuring($StartDate, $EndDate, $StartHour, $Endhour))
		{
			echo "ERROR: StartDate, EndDate, StartHour and/or Endhour has to be filled in.\r\n";
			return false;
		}
		else
		{
			$SQL = "CALL sp_UpdateDataKeuringOpen('$StartDate', '$EndDate', '$StartHour', '$Endhour')";
				
			if(mysqli_query($connectie, $SQL)){
				echo "Records added successfully.";
				return true;
			} else{
				echo "ERROR: Could not able to execute $SQL " . mysqli_error($connectie);
				return false;
			}
		}
	}
?>