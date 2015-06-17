<?php
include 'DAL.php';
include 'DALVoorkeuring.php';
session_start();

	if(isset($_POST['b1'])) {
		
		//Hier wordt de MySL-connectie geopend
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		//FlesjesID
		$FlesjesID = $_SESSION["flesnummer"];

		//KeurdersID
		$KeurderID = $_SESSION["KeurderID"];
		
		//Presentatie gedeelte
		$PuntenPresentatie;
		
		
		if(isset($_POST['presentatie1']) || isset($_POST['presentatie2']) || isset($_POST['presentatie3']) || isset($_POST['presentatie4'])){
			$PuntenPresentatie = 3;
		}
		
		if(isset($_POST['presentatie1'])){
			$PuntenPresentatie = 3;
			
			DALVoorkeuring.WriteInfoToDatabase($FlesjesID, $KeurderID, "1", "1", $conn);
			echo "test test";
		}
			
		if (isset($_POST['presentatie2'])){
			$PuntenPresentatie -= 1;
			
			WriteInfoToDatabase($FlesjesID, $KeurderID, "2", "1", $conn);
		}
			
		if (isset($_POST['presentatie3'])) {
			$PuntenPresentatie -= 1;
			
			WriteInfoToDatabase($FlesjesID, $KeurderID, "3", "1", $conn);
		}
			
		if (isset($_POST['presentatie4'])){
			$PuntenPresentatie -= 1;
			
			WriteInfoToDatabase($FlesjesID, $KeurderID, "4", "1", $conn);
		}
			
		$VraagCriteriaIDPresentatie = 273;
		echo "bijna";
		WriteScoreToDatabase($FlesjesID, $KeurderID, "273", $PuntenPresentatie, $conn);
		echo "weggeschreven!";
		
		//Koolzuur gedeelte
		if(isset($_POST["koolzuur"])){
			$KoolzuurID = $_POST["koolzuur"];
			
			
			switch($KoolzuurID){
				case "6":
					$KoolzuurPunten = 0;
					break;
				case "7":
					$KoolzuurPunten = 1;
					break;
				case "5":
					$KoolzuurPunten = 2;
					break;
				case "8":
					$KoolzuurPunten = 1;
					break;
				case "9":
					$KoolzuurPunten = 0;
					break;
			}
		}
		
		WriteScoreToDatabase($FlesjesID, $KeurderID, $KoolzuurID, $KoolzuurPunten, $conn);
		
		//Helderheid gedeelte
		if(isset($_POST["helderheid"])){
			$HelderheidID = $_POST["helderheid"];
			
			switch($HelderheidID){
				case "17":
					$HelderheidPunten = 0;
					break;
				case "10":
					$HelderheidPunten = 2;
					break;
			}
		}
		
		WriteScoreToDatabase($FlesjesID, $KeurderID, $HelderheidID, $HelderheidPunten, $conn);

		//Schuimkraag gedeelte
		if(isset($_POST["Schuimkraag"])){
			$SchuimkraagID = $_POST["Schuimkraag"];
			
			switch($SchuimkraagID){
				case "18":
					$schuimkraagPunten = 3;
					break;
				case "19":
					$schuimkraagPunten = 2;
					break;
				case "20":
					$schuimkraagPunten = 1;
					break;
				case "21":
					$schuimkraagPunten = 0;
					break;
				case "22":
					$schuimkraagPunten = 0;
					break;
			}
		}
		
		WriteScoreToDatabase($FlesjesID, $KeurderID, $SchuimkraagID, $schuimkraagPunten, $conn);

		/*if($PuntenPresentatie == ""|| $KoolzuurID == "" || $HelderheidID =="" || $SchuimkraagID == ""){
			echo "<SCRIPT>
						alert('Gelieve alle onderdelen van de keuring in te vullen.');
						history.go(-1);
					</SCRIPT>";
		}
		*/
		
		
		//Helderheid extra informatie
		if(isset($_POST['ExtraHelderheid1'])){
			$Briljant = $_POST['ExtraHelderheid1'];
			
	// 		$BriljantQuery = "CALL SP_GetVraagcriteriaID('Hederheid', 'Briljant')";
	// 		$BriljantResult = mysqli_query($conn, $BriljantQuery);
	// 		$BriljantID = mysqli_fetch_all($BriljantResult);
			
			WriteInfoToDatabase($FlesjesID, $KeurderID, "11", "1", $conn);
		}
		
		if(isset($_POST['ExtraHelderheid2'])){
			$Helder = $_POST['ExtraHelderheid2'];
			
			WriteInfoToDatabase($FlesjesID, $KeurderID, "12", "1", $conn);
		}
		
		if(isset($_POST['ExtraHelderheid3'])){
			$Tweeschijn = $_POST['ExtraHelderheid3'];
			
			WriteInfoToDatabase($FlesjesID, $KeurderID, "13", "1", $conn);
		}
		
		if(isset($_POST['ExtraHelderheid4'])){
			$Mistig = $_POST['ExtraHelderheid4'];
			
			WriteInfoToDatabase($FlesjesID, $KeurderID, "14", "1", $conn);
		}
		
		if(isset($_POST['ExtraHelderheid5'])){
			$Melkachtig = $_POST['ExtraHelderheid5'];
			
			WriteInfoToDatabase($FlesjesID, $KeurderID, "15", "1", $conn);
		}
		
		if(isset($_POST['ExtraHelderheid6'])){
			$Troebel = $_POST['ExtraHelderheid6'];
			
			WriteInfoToDatabase($FlesjesID, $KeurderID, "16", "1", $conn);
		}
		
		//Schuimkraag extra informatie
		if(isset($_POST['SchuimkraagExtra1'])){
			$OngelijkSchuim = $_POST['SchuimkraagExtra1'];
			
			WriteInfoToDatabase($FlesjesID, $KeurderID, "23", "1", $conn);
		}
		
		if(isset($_POST['SchuimkraagExtra2'])){
			$Mousse = $_POST['SchuimkraagExtra2'];
			
			WriteInfoToDatabase($FlesjesID, $KeurderID, "24", "1", $conn);
		}
		
		if(isset($_POST['SchuimkraagExtra3'])){
			$Romig = $_POST['SchuimkraagExtra3'];
			
			WriteInfoToDatabase($FlesjesID, $KeurderID, "25", "1", $conn);
		}
		
		if(isset($_POST['SchuimkraagExtra4'])){
			$Glasplakkend = $_POST['SchuimkraagExtra4'];
			
			WriteInfoToDatabase($FlesjesID, $KeurderID, "26", "1", $conn);
		}
		
		header("location:./Keuringsformulier-GeurSmaakAssociaties-Keuring.php");

	}
?>
