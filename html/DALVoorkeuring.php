<?php
	
	// function CheckValidityInputScore($FlesjesID, $KeurderID, $VraagCriteriaID, $score, $connectie)
	// {
		// $sqlFlesjesID = mysqli_query($connectie, "SELECT * FROM tblflesjes WHERE FlesjesID = $FlesjesID");
		// $sqlKeurdersID = mysqli_query($connectie, "SELECT * FROM tblkeurders WHERE KeurdersID = $KeurderID");
		// $sqlVraagCriteriaID = mysqli_query($connectie, "SELECT * FROM tblvraagcriteria WHERE ID = $VraagCriteriaID");
		
		// if
		// (
			// ($sqlFlesjesID == false) || 
			// ($sqlKeurdersID == false) || 
			// ($sqlVraagCriteriaID == false) || 
			// (mysqli_num_rows($sqlFlesjesID) == 0) || 
			// (mysqli_num_rows($sqlKeurdersID) == 0) ||
			// (mysqli_num_rows($sqlVraagCriteriaID) == 0) ||
			// ($score <= 0)
		// )
		// {
			// return true;
		// }
	// }
	
	// function CheckValidityInput($FlesjesID, $KeurderID, $VraagCriteriaID, $connectie)
	// {
		// $sqlFlesjesID = mysqli_query($connectie, "SELECT * FROM tblflesjes WHERE FlesjesID = $FlesjesID");
		// $sqlKeurdersID = mysqli_query($connectie, "SELECT * FROM tblkeurders WHERE KeurdersID = $KeurderID");
		// $sqlVraagCriteriaID = mysqli_query($connectie, "SELECT * FROM tblvraagcriteria WHERE ID = $VraagCriteriaID");
		
		// if
		// (
			// ($sqlFlesjesID == false) || 
			// ($sqlKeurdersID == false) || 
			// ($sqlVraagCriteriaID == false) || 
			// (mysqli_num_rows($sqlFlesjesID) == 0) || 
			// (mysqli_num_rows($sqlKeurdersID) == 0) ||
			// (mysqli_num_rows($sqlVraagCriteriaID) == 0)
		// )
		// {
			// return true;
		// }
	// }

	function WriteScoreToDatabase($FlesjesID, $KeurderID, $VraagCriteriaID, $score, $connectie)
	{
		// if
		// (
			// CheckValidityInputScore($FlesjesID, $KeurderID, $VraagCriteriaID, $score, $connectie)
		// )
		// {
			// echo "ERROR: BeerinspectorID, BottleID, QuestionCriteriaID and/or score is not correct.\r\n";
			// return false;
		// } 
		// else
		// {
			$sqlSP = "CALL SP_InsertResultaten(($FlesjesID), ($KeurderID), ($VraagCriteriaID), ($score), 0);";
			
			if(mysqli_query($connectie, $sqlSP))
			{
				echo "Records added successfully.\r\n";
				return true;
			} 
			else
			{
				echo "ERROR: Could not able to execute $sqlSP. " . mysqli_error($connectie);
				return false;
			}
		// }
	}

	function WriteInfoToDatabase($FlesjesID, $KeurderID, $VraagCriteriaID, $info, $connectie)
	{
		// if
		// (
			// CheckValidityInput($FlesjesID, $KeurderID, $VraagCriteriaID, $connectie)
		// )
		// {
			// echo "ERROR: BeerinspectorID, BottleID, QuestionCriteriaID is not correct.\r\n";
			// return false;
		// } 
		// else
		// {
			$sqlSP = "CALL SP_InsertResultaten(($FlesjesID), ($KeurderID), ($VraagCriteriaID), 0, ($info));";

			if(mysqli_query($connectie, $sqlSP)){
				echo "Records added successfully.";
				return true;
			} else{
				echo "ERROR: Could not able to execute $sqlSP. " . mysqli_error($connectie);
				return false;
			}
		// }
	}

	function WriteToDatabase($vraagID, $FlesjesID, $KeurderID, $connectie ){
		$id = $_POST[$vraagID];

		$sqlVraagCriteria = "SELECT ID FROM tblvraagcriteria WHERE vraagID = $vraagID AND criteriaID = ($id)";

		if(mysqli_query($connectie, $sqlVraagCriteria)){
			//echo "Records added sucessfully";
		}
		else{
			//echo "ERROR";
		}

		$sqlSP = "CALL SP_InsertResultaten(($FlesjesID), ($KeurderID), ($sqlVraagCriteria),0, 1);";

		if(mysqli_query($connectie, $sqlSP)){
			// echo "Records added successfully (ZuurSP).";
		} else{
			// echo "ERROR: Could not able to execute $sqlSP. " . mysqli_error($connectie);
		}
	}

	function WriteToDatabaseGeur($vraagID, $FlesjesID, $KeurderID, $connectie ){
		//De ID van het geselecteerde criteria opvragen
		$id = $_POST[$vraagID];
		$geurID = substr($vraagID, 0, 2);
		
		$sqlVraagCriteria = "SELECT ID FROM tblvraagcriteria WHERE vraagID = $geurID AND criteriaID = ($id)";

		if(mysqli_query($connectie, $sqlVraagCriteria)){
			// echo "Records added sucessfully";
		}
		else{
			// echo "ERROR: Could not able to execute $sqlVraagCriteria. " . mysqli_error($connectie);
		}

		$sqlSP = "CALL SP_InsertResultaten(($FlesjesID), ($KeurderID), ($sqlVraagCriteria),0, 'Geur');";

		if(mysqli_query($connectie, $sqlSP)){
			// echo "Records added successfully (ZuurSP).";
			return true;
		} else{
			// echo "ERROR: Could not able to execute $sqlSP. " . mysqli_error($connectie);
			return false;
		}
	}

	function WriteToDatabaseSmaak($vraagID, $FlesjesID, $KeurderID, $connectie ){
		//De ID van het geselecteerde criteria opvragen
		$id = $_POST[$vraagID];
		$smaakID = substr($vraagID, 0, 2);

		$sqlVraagCriteria = "SELECT ID FROM tblvraagcriteria WHERE vraagID = $smaakID AND criteriaID = ($id)";

		if(mysqli_query($connectie, $sqlVraagCriteria)){
			// echo "Records added sucessfully";
		}
		else{
			// echo "ERROR: Could not able to execute $sqlVraagCriteria. " . mysqli_error($connectie);;
		}

		$sqlSP = "CALL SP_InsertResultaten(($FlesjesID), ($KeurderID), ($sqlVraagCriteria),0, 'Smaak');";

		if(mysqli_query($connectie, $sqlSP)){
			// echo "Records added successfully (ZuurSP).";
		} else{
			// echo "ERROR: Could not able to execute $sqlSP. " . mysqli_error($connectie);
		}
	}
?>