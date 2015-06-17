<?php

	session_start();
	include 'DAL.php';
	include 'DALBackoffice.php';
	
	if (isset($_POST['Submit1'])) {
	
		// Get data voor variabelen
		$startDate = str_replace("/", "-", $_POST['startdate']);
		$endDate = str_replace("/", "-", $_POST['enddate']);
		$startHour = $_POST['starthour'];
		$endHour = $_POST['endhour'];
		
		//Hier wordt de MySL-connectie geopend
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		UpdateDataKeuring($startDate, $endDate, $startHour, $endHour, $conn);
		
		header('Location: ./Backoffice.php?okg=true');
		
	}
	
?>