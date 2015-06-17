<?php
include 'DAL.php';
include 'DALVoorkeuring.php';
session_start();

	if(isset($_POST['b1'])){
		

		//Hier wordt de MySL-connectie geopend
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		//FlesjesID
		$FlesjesID = $_SESSION["flesnummer"];

		
		//KeurdersID
		$KeurderID = $_SESSION['KeurderID'];

		
	//Doordrinkbaarheid
		if(isset($_POST['doordrinkbaarheid'])){
			$doordrinkbaarheidID = $_POST['doordrinkbaarheid'];
			
			switch($doordrinkbaarheidID){
				case "28":
					$doordrinkbaarheidPunten = 5;
					break;
				case "29":
					$doordrinkbaarheidPunten = 3;
					break;
				case "27":
					$doordrinkbaarheidPunten = 1;
					break;
				case "30":
					$doordrinkbaarheidPunten = 0;
					break;
			}
		}
		
		WriteScoreToDatabase($FlesjesID, $KeurderID, $doordrinkbaarheidID, $doordrinkbaarheidPunten, $conn);
		
	//balans
		if(isset($_POST['balans'])){
			$balansID = $_POST['balans'];
			
			switch($balansID){
				case "32":
					$balansPunten = 5;
					break;
				case "33":
					$balansPunten = 3;
					break;
				case "31":
					$balansPunten = 1;
					break;
				case "34":
					$balansPunten = 0;
					break;
			}	
		}
		
		WriteScoreToDatabase($FlesjesID, $KeurderID, $balansID, $balansPunten, $conn);
		
	//Basissmaak
		$smaakPunten = $_POST["txtPuntenBasissmaak"];
		
		WriteScoreToDatabase($FlesjesID, $KeurderID, "35", $smaakPunten, $conn);
		
		//Bitter
		WriteToDatabase("8", $FlesjesID, $KeurderID, $conn);
		
		//Zoet
		WriteToDatabase("9", $FlesjesID, $KeurderID, $conn);
		
		//Zuur
		WriteToDatabase("10", $FlesjesID, $KeurderID, $conn);
		
		//Zout
		WriteToDatabase("11", $FlesjesID, $KeurderID, $conn);

	//Mondgevoeld
		$mondgevoelPunten = $_POST['txtMondgevoel'];
		
		WriteScoreToDatabase($FlesjesID, $KeurderID, "52", $mondgevoelPunten, $conn);
		
		//Koolzuur
		WriteToDatabase("13", $FlesjesID, $KeurderID, $conn);
		
		//Droog
		WriteToDatabase("14", $FlesjesID, $KeurderID, $conn);
		
		//Metaalachtig
		WriteToDatabase("15", $FlesjesID, $KeurderID, $conn);
		
		//Plakkering/mondklevend
		WriteToDatabase("16", $FlesjesID, $KeurderID, $conn);
		
		//Samentrekkend/Wrang
		WriteToDatabase("17", $FlesjesID, $KeurderID, $conn);
		
		//Vetting
		WriteToDatabase("18", $FlesjesID, $KeurderID, $conn);
		
	//Nasmaak
		$nasmaakPunten = $_POST['txtNasmaak'];
		
		WriteScoreToDatabase($FlesjesID, $KeurderID, "77", $nasmaakPunten, $conn);
				
		//Alcohol
		WriteToDatabase("20", $FlesjesID, $KeurderID, $conn);
		
		//Bitter/Hoppig
		WriteToDatabase("21", $FlesjesID, $KeurderID, $conn);
		
		//Branderig
		WriteToDatabase("22", $FlesjesID, $KeurderID, $conn);
		
		//Caramelachtig
		WriteToDatabase("23", $FlesjesID, $KeurderID, $conn);
		
		//Dropachtig
		WriteToDatabase("24", $FlesjesID, $KeurderID, $conn);
		
		//Fruitig
		WriteToDatabase("25", $FlesjesID, $KeurderID, $conn);
		
		//Gebrand
		WriteToDatabase("26", $FlesjesID, $KeurderID, $conn);
		
		//Gistachtig
		WriteToDatabase("27", $FlesjesID, $KeurderID, $conn);
		
		//Kruidig
		WriteToDatabase("28", $FlesjesID, $KeurderID, $conn);
		
		//Medicinaal
		WriteToDatabase("29", $FlesjesID, $KeurderID, $conn);
		
		//Metaalachtig
		WriteToDatabase("30", $FlesjesID, $KeurderID, $conn);
		
		//Zoetig/Moutig 
		WriteToDatabase("31", $FlesjesID, $KeurderID, $conn);
		
		//Zout
		WriteToDatabase("32", $FlesjesID, $KeurderID, $conn);
		
		//Zuur
		WriteToDatabase("33", $FlesjesID, $KeurderID, $conn);
		
	//Creativiteit
		if(isset($_POST['creativiteit'])){
			$creativiteitID = $_POST['creativiteit'];
			
			switch($creativiteitID){
				case "135":
					$creativiteitPunten = 5;
					break;
				case "136":
					$creativiteitPunten = 3;
					break;
				case "134":
					$creativiteitPunten = 1;
					break;
				case "137":
					$creativiteitPunten = 0;
					break;
			}
		}
		
		WriteScoreToDatabase($FlesjesID, $KeurderID, $creativiteitID, $creativiteitPunten, $conn);
		
	//Complexiteit
		if(isset($_POST['complexiteit'])){
			$complexiteitID = $_POST['complexiteit'];
			
			switch($complexiteitID){
				case "139":
					$complexiteitPunten = 5;
					break;
				case "140":
					$complexiteitPunten = 3;
					break;
				case "138":
					$complexiteitPunten = 1;
					break;
				case "141":
					$complexiteitPunten = 0;
					break;
			}
		}
		
		WriteScoreToDatabase($FlesjesID, $KeurderID, $complexiteitID, $complexiteitPunten, $conn);
		
	//Type
		if(isset($_POST['voldoetAanType'])){
			$typeID = $_POST['voldoetAanType'];
			
			switch($typeID){
				case "143":
					$typePunten = 5;
					break;
				case "144":
					$typePunten = 3;
					break;
				case "142":
					$typePunten = 1;
					break;
				case "145":
					$typePunten = 0;
					break;
			}
		}
		
		WriteScoreToDatabase($FlesjesID, $KeurderID, $typeID, $typePunten, $conn);

		header("location: ./Keuringsformulier-AlgemeenTotaal.php");
	}
?>
