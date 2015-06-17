<?php

	function InsertTeam($Teamnaam, $Competitietype, $Intakeadres, $connectie ){

		$SQL = "CALL SP_InsertTeams('$Teamnaam', $Competitietype, '$Intakeadres')";
			
		if(mysqli_query($connectie, $SQL)){
			echo "Records added successfully.";
			return true;
		} else{
			echo "ERROR: Could not able to execute $SQL " . mysqli_error($connectie);
			return false;
		}
	}
	
	function Deelnemers($TeamID, $Firstname, $Lastname, $Gender, $Email, $connectie ){

		$SQL = "CALL SP_Deelnemers(($TeamID), '$Firstname', '$Lastname', '$Gender', '$Email')";
	
		if(mysqli_query($connectie, $SQL)){
			echo "Records added successfully.";
			return true;
		} else{
			echo "ERROR: Could not able to execute $SQL " . mysqli_error($connectie);
			return false;
		}
	}
	
	function InsertTeamKapitein($ID, $TeamID, $Country, $Adres, $Postnummer, $Gemeente, $Telefoon, $connectie ){

		$SQL = "CALL SP_InsertTeamKapitein(($ID), ($TeamID), ($Country), '$Adres', ($Postnummer), ($Gemeente), '$Telefoon');";
	
		if(mysqli_query($connectie, $SQL)){
			echo "Records added successfully.";
			return true;
		} else{
			echo "ERROR: Could not able to execute $SQL " . mysqli_error($connectie);
			return false;
		}
	}
	
	function InsertReserveTeamKapitein($ID, $TeamID, $Country, $Adres, $Postnummer, $Gemeente, $Telefoon, $connectie ){

		$SQL = "CALL SP_InsertReserveTeamKapitein(($ID), ($TeamID), ($Country), '$Adres', ($Postnummer), ($Gemeente), '$Telefoon')";
	
		if(mysqli_query($connectie, $SQL)){
			echo "Records added successfully.";
			return true;
		} else{
			echo "ERROR: Could not able to execute $SQL " . mysqli_error($connectie);
			return false;
		}
	}
	
	function InsertCursus($ID, $Traningsdatum, $Trainingsnr, $connectie ){

		$SQL = "CALL SP_InsertCursus(($ID), '$Traningsdatum', $Trainingsnr);";
	
		if(mysqli_query($connectie, $SQL)){
			echo "Records added successfully.";
			return true;
		} else{
			echo "ERROR: Could not able to execute $SQL " . mysqli_error($connectie);
			return false;
		}
	}
	
	function InsertStudentenbattle($ID, $BattleNR, $connectie ){

		$SQL = "CALL SP_StudentBattle(($ID), $BattleNR)";
	
		if(mysqli_query($connectie, $SQL)){
			echo "Records added successfully.";
			return true;
		} else{
			echo "ERROR: Could not able to execute $SQL " . mysqli_error($connectie);
			return false;
		}
	}	
	
	function InsertWachtwoord($ID, $Wachtwoord, $connectie ){

		$SQL = "CALL SP_InsertPassword(($ID), '$Wachtwoord')";
	
		if(mysqli_query($connectie, $SQL)){
			echo "Records added successfully.";
			return true;
		} else{
			echo "ERROR: Could not able to execute $SQL " . mysqli_error($connectie);
			return false;
		}
	}
	
?>