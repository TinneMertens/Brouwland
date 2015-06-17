<?php 
//Hier wordt de PHP-file van de DAL en Password-creatie geïmporteerd. (database connectie en genereren random paswoord)
	
	include 'DAL.php';
	include 'DALBackoffice.php';
	include './PassWordCreation.php';

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

//Wachtwoord wordt aangemaakt.

	$pass = createPassword(8);	


//Hier wordt de MySL-connectie geopend

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

//random paswoord genereren en Stored Procedure die het gegenereerde paswoord naar de database pushed.
	
	$PassEncrypt = md5($pass);
	
//STORED PROCEDURE VOOR AANMAKEN KEURDER

	//$CountryDB =  "SELECT LandID FROM tbllanden WHERE Land = '$Country'";
	
	$Postnummer = $City;
	$City = "SELECT Gemeente FROM tblpostcodes WHERE Postnummer = $Postnummer";
	
	$FullCity = "SELECT Gemeente FROM tblpostcodes WHERE Postnummer = $Postnummer";
	$FullCitySQL = mysqli_query($conn, $FullCity);
	$FullCitySQLFetch = mysqli_fetch_assoc($FullCitySQL);
	
	$FullCountry = "SELECT Land FROM tbllanden WHERE LandID = $Country";
	$FullCountrySQL = mysqli_query($conn, $FullCountry);
	$FullCountrySQLFetch = mysqli_fetch_assoc($FullCountrySQL);
	
	InsertKeurder($Firstname, $Lastname, $Address, ($Postnummer), $City, $Country, $Phone, $Gender, $Email, $Email, $PassEncrypt, $conn);
	
//Mail

	$to = $Email;

	$subject = 'Keurder Brouwland Biercompetitie';
	
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
	$message .= "Wij zijn blij u mee te delen dat u als keurder bent toegevoegd aan de Brouwland Biercompetitie.";
	$message .= '<br>';
	$message .= "U bent geregistreerd met onderstaande informatie:";
	$message .= '
    <div id="wrap">
    	<div id="main">
		
            <div class="clear"></div>
            
			<div class="container_16">
				<div class="clear"></div>
			    <div class="grid_9 minimum-except">
			    <br>
				<table style="width:65%">
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
				  <tr>
					<td><br></td>
				  </tr>
				  <tr>
					<td><strong><i><h3>Login-Gegevens</h3></i></strong></td>
				  </tr>
				  <tr>
					<td><strong>Gebruikernaam:</strong></td>
					<td>';
	$message .= $Email;
	$message .= '
				</td>		
					<td><strong>Wachtwoord:</strong></td>
					<td>';
	$message .=	$pass;
	
	$message .=	 '
					</td>						
				  </tr>				  
				</tbody></table>
				</div></div><br><br>
	 		</div>
			</body></html>
	';
	
	$message .=	 "U kan inloggen om toegang te krijgen tot de keuring, op de afgesproken data, door gebruik te maken van uw gebruikersnaam en het bovenstaande wachtwoord. Let op: uw wachtwoord is vertrouwelijk en dat moet het ook blijven.";
	$message .=	 '<br><br>';
	$message .=	 "Met vriendelijke groeten,";
	$message .=	 '<br>';
	$message .=	 "Brouwland Biercompetitie";
	
	$message .= '</body></html>';



	// send email
	mail($to, $subject, $message, $headers);

	header("location:./Backoffice.php?kt=true&fn=$Firstname&ln=$Lastname");
}



?>
