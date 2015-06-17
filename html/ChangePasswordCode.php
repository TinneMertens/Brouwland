<?php 
//Hier wordt de PHP-file van de DAL en Password-creatie geïmporteerd. (database connectie en genereren random paswoord)
	
	include 'DAL.php';

if (isset($_POST['Submit1'])) {


//Teamnaam, oud wachtwoord en nieuw wachtwoord ophalen.

	$Username = $_POST["gebruikersnaam"];
	
	$OldPassword = $_POST["huidigWachtwoord"];
	
	$OldPasswordEncrypt = md5($OldPassword);
	
	$NewPassword = $_POST["nieuwWachtwoord"];
	
	$NewPasswordEncrypt = md5($NewPassword);


//Hier wordt de MySL-connectie geopend

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	
	}

	//Opvragen van de TeamID zodat deze gebruikt kan worden in de volgende Stored Procedure.

	$TeamIDSQL = "SELECT TeamID FROM tblteams WHERE tblteams.TeamNaam = '$Username'";
	
	$TeamCheckSQL = mysqli_query($conn, $TeamIDSQL);
	
	if($TeamCheckSQL){
			echo "Records (TeamCheckSQL) added successfully. \n";
	} else{
			echo "ERROR (TeamCheckSQL): Could not able to execute $TeamCheckSQL. " . mysqli_error($conn);
	}
	
	$TeamCheck = mysqli_num_rows($TeamCheckSQL);
	
	echo $TeamCheck;
	
	
	//Opvragen van de KeurderID zodat deze gebruikt kan worden in de volgende Stored Procedure.

	$KeurderIDSQL = "SELECT KeurdersID FROM tblkeurders WHERE tblkeurders.Gebruikersnaam = '$Username'";
	
	$KeurderCheckSQL = mysqli_query($conn, $KeurderIDSQL);
	
	if($KeurderCheckSQL){
			echo "Records (KeurderCheckSQL) added successfully. \n";
	} else{
			echo "ERROR (KeurderCheckSQL): Could not able to execute $KeurderCheckSQL. " . mysqli_error($conn);
	}	
	
	$KeurderCheck = mysqli_num_rows($KeurderCheckSQL);
	
	echo $KeurderCheck;
	
	//Opvragen van de BrouwlandID zodat deze gebruikt kan worden in de volgende Stored Procedure.

	$BrouwlandIDSQL = "SELECT BrouwlandID FROM tblbrouwland WHERE tblbrouwland.Gebruikersnaam = '$Username'";
	
	$BrouwlandCheckSQL = mysqli_query($conn, $BrouwlandIDSQL);
	
	if($BrouwlandCheckSQL){
			echo "Records (BrouwlandCheckSQL) added successfully. \n";
	} else{
			echo "ERROR (BrouwlandCheckSQL): Could not able to execute $BrouwlandCheckSQL. " . mysqli_error($conn);
	}		
	
	$BrouwlandCheck = mysqli_num_rows($BrouwlandCheckSQL);
	
	echo $BrouwlandCheck;
	
	//Wachtwoord Team veranderen
	if (($TeamCheck) == 1)
	{
		//Opvragen van het ID van de teamkapitein.
		
		$TKID = "SELECT DeelnemersID FROM tblkapiteingegevens WHERE tblkapiteingegevens.TeamID = ($TeamIDSQL)";
		
		if(mysqli_query($conn, $TKID)){
			echo "Records (TKID) added successfully. \n";
		} else{
			echo "ERROR (TKID): Could not able to execute $TKID. " . mysqli_error($conn);
		}

		//Opvragen van het emailadres van de teamkapitein.
		
		$Email = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Email FROM tbldeelnemers WHERE tbldeelnemers.DeelnemersID = ($TKID)"));
		
		$EmailString = $TKEmail["Email"];
		
		//STORED PROCEDURE VOOR AANMAAK NIEUW WACHTWOORD
		
		$sql = "CALL sp_UpdatePasswordTeam(($TeamIDSQL), '$OldPasswordEncrypt', '$NewPasswordEncrypt')";
		
		if(mysqli_query($conn, $sql)){
			echo "Records (sp_UpdatePasswordTeam) added successfully. \n";
		} else{
			echo "ERROR (sp_UpdatePasswordTeam): Could not able to execute $sql. " . mysqli_error($conn);
		}
	}
	
	//Wachtwoord Keurder veranderen.
	if (($KeurderCheck) == 1)
	{
		//Opvragen van het emailadres van de keurder.
		
		$Email = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Email FROM tblkeurders WHERE tblkeurders.KeurdersID = ($KeurderIDSQL)"));
		
		$EmailString = $Email["Email"];
		
		//STORED PROCEDURE VOOR AANMAAK NIEUW WACHTWOORD
		
		$sql = "CALL sp_UpdatePasswordKeurder(($KeurderIDSQL), '$OldPasswordEncrypt', '$NewPasswordEncrypt')";
		
		if(mysqli_query($conn, $sql)){
			echo "Records (sp_UpdatePasswordKeurder) added successfully. \n";
		} else{
			echo "ERROR (sp_UpdatePasswordKeurder): Could not able to execute $sql. " . mysqli_error($conn);
		}
	}
	
	//Wachtwoord Personeel Brouwland veranderen.
	if (($BrouwlandCheck) == 1)
	{
		//Opvragen van het emailadres van personeelslid.
		
		$Email = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Email FROM tblbrouwland WHERE tblbrouwland.BrouwlandID = ($BrouwlandIDSQL)"));
		
		$EmailString = $Email["Email"];
		
		//STORED PROCEDURE VOOR AANMAAK NIEUW WACHTWOORD
		
		$sql = "CALL sp_UpdatePasswordBrouwland(($BrouwlandIDSQL), '$OldPasswordEncrypt', '$NewPasswordEncrypt')";
		
		if(mysqli_query($conn, $sql)){
			echo "Records (sp_UpdatePasswordBrouwland) added successfully. \n";
		} else{
			echo "ERROR (sp_UpdatePasswordBrouwland): Could not able to execute $sql. " . mysqli_error($conn);
		}
	}	
	
	
//Mail

	$to = $EmailString;

	$subject = 'Wijziging Wachtwoord';
	
	$headers = "Content-type: text/html; charset=iso-8859-1\r\n";  
    $headers .= "MIME-Version: 1.0\r\n";
	$headers .= "From: Biercompetitie@Brouwland.be \r\n";
	$headers .= "Reply-To: no-reply \r\n";	

	// the message
	$message = '
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/style.css" media="screen">
		<link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/grid.css" media="screen">
        <link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/nav.css" media="screen">
        <link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/normalize.css" media="screen">
        <link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/switchToggle.css" media="screen">
        <link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/print.css" media="print"> 
        <link rel="stylesheet" href="http://193.191.187.253:8052/CSS/bootstrap.min.css">
	</head>
	<body><div id="wrap"><div id="headMail"><img style="width: 115%; height: 120px;" src="http://193.191.187.253:8052/Image/brouwland-header-mail.png"></div><div id="main">
	</div><BR>
	';
	
	$message .= "Beste,";
	$message .= '<br><br>';
	$message .= "Het wachtwoord van uw account voor de Brouwland Biercompetitie 2015 werd zonet gewijzigd.";
	$message .= '<br>';
	$message .= "U kan uw nieuwe inloggegevens hieronder terugvinden:";
	$message .= '
    <div id="wrap">
    	<div id="main">
		
            <div class="clear"></div>
            
			<div class="container_16">
				<div class="clear"></div>
			    <div class="grid_9 minimum-except">
			    
				<table style="width:65%">
				  <tbody><tr>
					<td><strong><i><h3>Login-Gegevens</h3></i></strong></td>
				  </tr>
				  <tr>
					<td><strong>Gebruikersnaam:</strong></td>
					<td>';
	$message .= $Username;
	$message .= '
				</td>		
					<td><strong>Wachtwoord:</strong></td>
					<td>';
	$message .=	$NewPassword;
	
	$message .=	 '
					</td>						
				  </tr>				  
				</tbody></table>
				</div></div><br><br>
	 		</div>
			</body></html>
	';
	
	$message .=	 "U kan inloggen op uw Brouwland-Account door gebruik te maken van uw gebruikersnaam en het bovenstaande wachtwoord. Let op: uw wachtwoord is vertrouwelijk en dat moet het ook blijven.";
	$message .=	 '<br><br>';
	$message .=	 "Met vriendelijke groeten,";
	$message .=	 '<br>';
	$message .=	 "Brouwland Biercompetitie";
	
	$message .= '</body></html>';



	// send email
	mail($to, $subject, $message, $headers);

	header("location:./Login.php?cp=true");

}

?>
