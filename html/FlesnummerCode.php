<?php

	include 'DAL.php';
	session_start();
	
	if (isset($_POST['btnNext'])) {
		if(isset($_POST['flesnummer'])){
			$flesnummer = $_POST['flesnummer'];
			
			//Hier wordt de MySL-connectie geopend
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			$selectFlesnr = "SELECT * FROM tblflesjes WHERE tblflesjes.FlesjesID=$flesnummer";
			$resultFlesnr = mysqli_query($conn, $selectFlesnr);
			$countFlesnr=mysqli_num_rows($resultFlesnr);
			
			if($countFlesnr == 1){
				$_SESSION['flesnummer'] = $flesnummer;
				header("location: Keuringsformulier-VisueleAspecten-Keuring.php");
			}
			else {
				echo "<SCRIPT>
					 window.location.href='./Keuringsformulier-Flesnummer.php?check=false';
				</SCRIPT>";
			}
			
		}
		
		
	}
?>
