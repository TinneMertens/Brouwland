<?php 
//Hier wordt de PHP-file van de DAL geïmporteerd. (database connectie)

	session_start();
	include 'DAL.php';

if (isset($_POST['Submit1'])) {
	
//Gegevens over Keurder.

	$Firstname = $_POST["Firstname"];
	
	$Lastname = $_POST["Lastname"];
	
	$Address = $_POST["Address"];
	
	$Zip = $_POST["Zip"];
	
	$City = $_POST["City"];
	
	$Country = $_POST["Country"];
	
	$Country = mysqli_real_escape_string($conn, $Country);
	
	if ($Country == "BelgiÃ«" )
	{
		$Country = "België";	
	}
	
	$Phone = $_POST["Phone"];
	
	$Email = $_POST["Email"];

	$Email = mysqli_real_escape_string($conn, $Email);
	
	$Gender = $_POST["Gender"];


//Hier wordt de MySL-connectie geopend

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	
	}
	
	
//STORED PROCEDURE VOOR UPDATEN KEURDER

	$KeurderID = $_SESSION['KeurderID'];

	//$CountryDB =  "SELECT LandID FROM tbllanden WHERE Land = '$Country'";
	
	$FullCity = "SELECT Gemeente FROM tblpostcodes WHERE Postnummer = $City";
	$FullCitySQL = mysqli_query($conn, $FullCity);
	$FullCitySQLFetch = mysqli_fetch_assoc($FullCitySQL);
	
	$FullCountry = "SELECT Land FROM tbllanden WHERE LandID = $Country";
	$FullCountrySQL = mysqli_query($conn, $FullCountry);
	$FullCountrySQLFetch = mysqli_fetch_assoc($FullCountrySQL);
	
	$SQL = "CALL sp_UpdateKeurders (($KeurderID), '$Firstname', '$Lastname', '$Address', ($City), ($FullCity), ($Country), '$Phone', '$Gender', '$Email');";
	
	if(mysqli_query($conn, $SQL)){
		echo "Records (sp_insertKeurders) added successfully. \n";
	} else{
		echo "ERROR (sp_insertKeurders): Could not able to execute $SQL. " . mysqli_error($conn);
	}
	
//Mail

	$to = $Email;

	$subject = 'Wijziging Gegevens Brouwland Biercompetitie';
	
	$headers = "Content-type: text/html; charset=iso-8859-1\r\n";  
    $headers .= "MIME-Version: 1.0\r\n";
	$headers .= "From: Biercompetitie@Brouwland.be \r\n";
	$headers .= "Reply-To: no-reply \r\n";
	
	// the message
	$message = '
	<html>
	<body><div id="wrap"><div id="headMail"><img style="width: auto; height: 120px;" src="http://193.191.187.253:8052/Image/brouwland-header-mail.png"></div><div id="main">
	</div><BR>
	';
	
	$message .= "Beste " . $Firstname . " " . $Lastname . ",";
	$message .= '<br><br>';
	$message .= "U hebt zonet de gegevens van uw Brouwland Biercompetitie-account gewijzigd.";
	$message .= '<br>';
	$message .= "U bent nu geregistreerd met onderstaande informatie:";
	$message .= '
    <div id="wrap">
    	<div id="main">
		
            <div class="clear"></div>
            
			<div class="container_16">
				<div class="clear"></div>
			    <div class="grid_9 minimum-except">
			    <br>
				<table style="width:100%">
				  <tbody><tr>
					<td><strong><i><h3>Keurder-Gegevens</h3></i></strong></td>
				  </tr>
				  <tr>
					<td><strong>Voornaam:</strong></td>
					<td>';
	$message .= $Firstname;
	$message .= '
				</td>		
					<td><strong>Achternaam:</strong></td>
					<td>';
	$message .=	$Lastname;
	$message .=	 '
					</td>	
				  </tr>
				  <tr>
					<td><strong>Adres:</strong></td>
					<td>';
	$message .= $Address;
	$message .= '
				</td>		
					<td><strong>Gemeente/Stad:</strong></td>
					<td>';
	$message .=	$FullCitySQLFetch['Gemeente'] . ", " . $FullCountrySQLFetch['Land'];
	$message .=	 '
					</td>		
			</tr>
			<tr>
					<td><strong>GSM-Nummer:</strong></td>
					<td>';
	$message .=	$Phone;
	$message .=	 '
					</td>
					<td><strong>Email:</strong></td>
					<td>';
	$message .=	$Email;
	$message .= '
					</td>						
				  </tr>				  
				</tbody></table>
				</div></div><br><br>
	 		</div>
			</body></html>
	';
	
	$message .=	 "Met vriendelijke groeten,";
	$message .=	 '<br>';
	$message .=	 "Brouwland Biercompetitie";
	
	$message .= '</body></html>';



	// send email
	mail($to, $subject, $message, $headers);

	header("location:./AccountKeurder.php?ku=true&fn=$Firstname&ln=$Lastname");
	}



?>
