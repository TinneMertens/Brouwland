<?php

function WriteScoreToDatabase($FlesjesID, $KeurderID, $VraagCriteriaID, $score, $connectie ){

	$sqlSP = "CALL SP_InsertResultaten(($FlesjesID), ($KeurderID), ($VraagCriteriaID), ($score), 0);";

	if(mysqli_query($connectie, $sqlSP)){
		//echo "Records added successfully.";
		return true;
	} else{
		//echo "ERROR: Could not able to execute $sqlSP. " . mysqli_error($connectie);
		return false;
	}
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

// ?>