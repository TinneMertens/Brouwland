<?php
	include 'DAL.php';
	// include 'InsertDDL.php';
	include 'DALVoorkeuring.php';
	session_start();

	if(isset($_POST['b1'])){

		//FlesjesID
		$FlesjesID = $_SESSION["flesnummer"];
		
		
		//KeurdersID
		$KeurderID = $_SESSION['KeurderID'];
		
		//Hier wordt de MySL-connectie geopend
		$conn = mysqli_connect($servername, $username, $password, $dbname);
			
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		
		//WAARNEEMBAAR - NEUTRAAL
		
		WriteToDatabaseGeur("39G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("39S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("40G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("40S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("41G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("41S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("42G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("42S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("43G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("43S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("44G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("44S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("45G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("45S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("46G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("46S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("47G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("47S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("48G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("48S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("49G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("49S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("50G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("50S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("51G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("51S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("52G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("52S", $FlesjesID, $KeurderID, $conn);		
		
		WriteToDatabaseGeur("53G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("53S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("54G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("54S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("49G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("49S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("50G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("50S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("51G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("51S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("52G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("52S", $FlesjesID, $KeurderID, $conn);		
		
		WriteToDatabaseSmaak("53S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("54G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("54S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("70G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("70S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("71G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("71S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("72G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("72S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("73G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("73S", $FlesjesID, $KeurderID, $conn);
		
		
		//AFWIJKINGEN - FOUTEN - SPECIAAL
		
		WriteToDatabaseGeur("55G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("55S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("56G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("56S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("57G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("57S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("58G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("58S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("59G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("59S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("60G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("60S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("61G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("61S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("62G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("62S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("63G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("63S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("64G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("64S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("65G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("65S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("66G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("66S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("67G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("67S", $FlesjesID, $KeurderID, $conn);		

		WriteToDatabaseGeur("68G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("68S", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseGeur("69G", $FlesjesID, $KeurderID, $conn);
		
		WriteToDatabaseSmaak("69S", $FlesjesID, $KeurderID, $conn);
		
		
		//Wegschrijven van extra informatie 
		$aantalExtra = $_POST['ExtraInfo'];
		
		for ($x = 0; $x < $aantalExtra; $x++) {
			$Omschrijving = $_POST[$x.'ExtraSmaakGeur'];
			$Smaak = $_POST[$x.'S'];
			$Geur = $_POST[$x.'G'];
			
			WriteExtraInfo($FlesjesID, $KeurderID, $Omschrijving, $Geur, $Smaak, $conn);
		}
		
		
		//Punten Textboxes Wegschrijven

		$puntenGeur = $_POST['txtPunten1'];
		$VraagCriteriaIDGeur = 146;
		$puntenSmaak = $_POST['txtPunten2'];
		$VraagCriteriaIDSmaak = 147;
		
		if($puntenSmaak > 15 || $puntenSmaak < 0){	
			echo "<SCRIPT>
					window.alert('Gelieve een getal tussen 0 en 15 in te geven bij het onderdeel smaak.');
					window.history.back();
				</SCRIPT>";
		}
		else{
			WriteScoreToDatabase($FlesjesID, $KeurderID, $VraagCriteriaIDSmaak, $puntenSmaak, $conn);
		}
		
		if($puntenGeur > 25 || $puntenGeur < 0){
			echo "<SCRIPT>
					window.alert('Gelieve een getal tussen 0 en 25 in te geven bij het onderdeel geur.');
					window.history.back();
				</SCRIPT>";
		}
		else
		{
			WriteScoreToDatabase($FlesjesID, $KeurderID, $VraagCriteriaIDGeur, $puntenGeur, $conn);
		}
		
		// echo $puntenGeur;
		// echo $puntenSmaak;
		
		if($puntenGeur == "" || $puntenSmaak == ""){
			echo "<SCRIPT>
					window.alert('Gelieve bij elk onderdeel een score in te geven.');
					window.history.back();
				</SCRIPT>";
		}
		
		if($puntenGeur >= 0 && $puntenGeur <= 25 && $puntenSmaak >= 0 && $puntenSmaak <= 15){
			header('Location: http://193.191.187.253:8052/Keuringsformulier-AlgemeneKeuring.php');
		}
	}
	
?>
