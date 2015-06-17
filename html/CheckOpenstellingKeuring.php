<?php

	session_start();
	include 'DAL.php';
	
	//Hier wordt de MySL-connectie geopend

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	
	}

	// Get data for variables
	$DataSQL =  "SELECT * FROM tbldatakeuringopen";
	$DataSQLResult = mysqli_query($conn, $DataSQL);
	$DataRow = mysqli_fetch_array($DataSQLResult);
	
	$startDateDays = substr($DataRow['BeginDatum'], 0, 2);
	$startDateMonths = substr($DataRow['BeginDatum'], 3, 2);
	$startDateYear = substr($DataRow['BeginDatum'], 6, 4);
	$startDateHours = substr($DataRow['BeginUur'], 0, 2);
	$startDateMinutes = substr($DataRow['BeginUur'], 3, 2);
	
	$endDateDays = substr($DataRow['EindDatum'], 0, 2);
	$endDateMonths = substr($DataRow['EindDatum'], 3, 2);
	$endDateYear = substr($DataRow['EindDatum'], 6, 4);
	$endDateHours = substr($DataRow['EindUur'], 0, 2);
	$endDateMinutes = substr($DataRow['EindUur'], 3, 2);
	
	$now = time();
	$minDate = mktime($startDateHours, $startDateMinutes, 0, $startDateMonths, $startDateDays, $startDateYear);
	$maxDate = mktime($endDateHours, $endDateMinutes, 0, $endDateMonths, $endDateDays, $endDateYear);
	
	// Create boolean 
	$keuringAllowed = true;
	
	if ($minDate <= $now && $now <= $maxDate)
	{
		$keuringAllowed = true;
	}
	else
	{
		$keuringAllowed = false;
	}

	if ($keuringAllowed == false) {
		header("Location: http://193.191.187.253:8052/Keuringsformulier-NietToegankelijk.php");
	} 

?>