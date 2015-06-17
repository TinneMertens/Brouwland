<?php
include 'DAL.php';
session_start();

	echo 'voor de if';
	
	if(isset($_POST["delete"])){
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		else{
			echo 'not connected';
		}
		
		//FlesjesID
		$FlesjesID = $_SESSION["flesnummer"];
		echo $FlesjesID;
		
		//KeurdersID
		$KeurderID = $_SESSION['KeurderID'];
		echo $KeurderID;
		
		// $delete = "CALL SP_DeleteResultaten(($FlesjesID), ($KeurderID))";
		// if(mysqli_query($conn, $delete)){
			// echo 'deleted succesfully';
		// }
		// else{
			// echo "ERROR (type): Could not able to execute SP_InsertResultaten. " . mysqli_error($conn);
		// }
		
		header("location:http://193.191.187.253:8052/Keuringsformulier-Bevestiging.php");
	}
?>