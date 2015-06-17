<?php 

//Hier wordt de PHP-file van de DAL en Password-creatie geïmporteerd. (database connectie en genereren random paswoord)
	include './DAL.php';
	include './PassWordCreation.php';
	include './DALRegistratie.php';

if (isset($_POST['Submit1'])) {

//PHP-Code met Team Gegevens! 

	$Teamname = $_POST["Team"];

	$CompetitionType = $_POST["CompetitionType"];
	
	$StudentsFile = $_POST["file"];
	
	echo $Teamname;
	

//Gegevens over PloegKapitein. NAMING CONVENTION: TK = TeamKapitein

	$TKFirstname = $_POST["Firstname"];
	
	$TKLastname = $_POST["Lastname"];
	
	$TKAddress = $_POST["Address"];
	
	$TKZip = $_POST["Zip"];
	
	$TKPostnumber = $_POST["City"];
	
	$TKCountry = $_POST["Country"];
	
	$TKPhone = $_POST["Phone"];
	
	$TKEmail = $_POST["Email"];

	$TKEmail = mysqli_real_escape_string($conn, $TKEmail);
	
	$TKGender = $_POST["Gender"];
	

//Gegevens over het 2de Teamlid (OOK Reserve-Kapitein). NAMING CONVENTION: TM2 = TeamMember2
	
	$TM2Firstname = $_POST["Firstname2"];
	
	$TM2Lastname = $_POST["Lastname2"];
	
	$TM2Address = $_POST["Address2"];
	
	$TM2Zip = $_POST["Zip2"];
	
	$TM2Postnumber = $_POST["City2"];
	
	$TM2Country = $_POST["Country2"];
	
	$TM2Phone = $_POST["Phone2"];
	
	$TM2Email = $_POST["Email2"];
	
	$TM2Gender = $_POST["Gender2"]; 
	

// /* Gegevens over het 3de Teamlid. NOTE: nu halen we enkel de gegevens op. Later (lees: hieronder) kijken we of dit teamlid echt bestaat (aangezien teams ook uit 2 personen mogen bestaan)
// NAMING CONVENTION: TM3 = TeamMember3 */
	
	$TM3Firstname = $_POST["Firstname3"];
	
	$TM3Lastname = $_POST["Lastname3"];
	
	$TM3Email = $_POST["Email3"];
	
	$TM3Gender = $_POST["Gender3"]; 
	

// /* Gegevens over het 4de Teamlid. NOTE: nu halen we enkel de gegevens op. Later (lees: hieronder) kijken we of dit teamlid echt bestaat (aangezien teams ook uit 2 personen mogen bestaan)
 // NAMING CONVENTION: TM4 = TeamMember4 */
		
	$TM4Firstname = $_POST["Firstname4"];
	
	$TM4Lastname = $_POST["Lastname4"];
	
	$TM4Email = $_POST["Email4"];
	
	$TM4Gender = $_POST["Gender4"];
	
 
// /* Gegevens over het 5de Teamlid. NOTE: nu halen we enkel de gegevens op. Later (lees: hieronder) kijken we of dit teamlid echt bestaat (aangezien teams ook uit 2 personen mogen bestaan)
 // NAMING CONVENTION: TM5 = TeamMember5 */
	
	$TM5Firstname = $_POST["Firstname5"];
	
	$TM5Lastname = $_POST["Lastname5"];
	
	$TM5Email = $_POST["Email5"];
	
	$TM5Gender = $_POST["Gender5"]; 
	

// /* Gegevens over het 6de Teamlid. NOTE: nu halen we enkel de gegevens op. Later (lees: hieronder) kijken we of dit teamlid echt bestaat (aangezien teams ook uit 2 personen mogen bestaan)
 // NAMING CONVENTION: TM6 = TeamMember6 */
	
	$TM6Firstname = $_POST["Firstname6"];
	
	$TM6Lastname = $_POST["Lastname6"];
	
	$TM6Email = $_POST["Email6"];
	
	$TM6Gender = $_POST["Gender6"];
	

// /* Gegevens over het 7de Teamlid. NOTE: nu halen we enkel de gegevens op. Later (lees: hieronder) kijken we of dit teamlid echt bestaat (aangezien teams ook uit 2 personen mogen bestaan)
 // NAMING CONVENTION: TM7 = TeamMember7 */
	
	$TM7Firstname = $_POST["Firstname7"];
	
	$TM7Lastname = $_POST["Lastname7"];
	
	$TM7Email = $_POST["Email7"];
	
	$TM7Gender = $_POST["Gender7"];
	

// /* Gegevens over het 8de Teamlid. NOTE: nu halen we enkel de gegevens op. Later (lees: hieronder) kijken we of dit teamlid echt bestaat (aangezien teams ook uit 2 personen mogen bestaan)
 // NAMING CONVENTION: TM8 = TeamMember8 */
	
	$TM8Firstname = $_POST["Firstname8"];
	
	$TM8Lastname = $_POST["Lastname8"];
	
	$TM8Email = $_POST["Email8"];
	
	$TM8Gender = $_POST["Gender8"];
	

/* Gegevens over de Cursus waaraan deelgenomen kan worden.
NOTE: nu halen we enkel de gegevens op. Later (lees: hieronder) kijken we of hieraan deelgenomen wordt */
	
	$TrainingCheck = $_POST["Training"];
	
	$TrainingDate = $_POST["TrainingDate"];
	
	$TrainingNr = $_POST["TrainingNr"];
	

/* Gegevens over de StudentenBattle. Dit is enkel nodig voor studententeams en is niet noodzakelijk in te voeren. 
NOTE: nu halen we enkel de gegevens op. Later (lees: hieronder) kijken we of hieraan deelgenomen wordt */

	$BattleCheck = $_POST["Battle"];
	
	$BattleNr = $_POST["BattleNr"];


//Gegevens over waar (de locatie) de bierbak zal worden ingeleverd.

	$IntakeAddress = $_POST["IntakeAddress"];
	
//Wachtwoord wordt aangemaakt.
	$pass = createPassword(8);	
	$success = 0;

//Hier wordt de MySL-connectie geopend

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	//Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
//NAKIJKEN OF TEAMNAAM ALS BESTAAT

	$selectTeamNaam = "SELECT * FROM tblteams WHERE TeamNaam ='$Teamname'";
	
	$resultTeam=mysqli_query($conn, $selectTeamNaam);
	
	$countTeam=mysqli_num_rows($resultTeam);
	
	if($countTeam >=1)
	{
		echo "<SCRIPT>
				alert('De teamnaam die u koos, bestaat al. Gelieve een andere te kiezen.');
			     history.go(-1);
			 </SCRIPT>";
	}
	else 
	{
		
//STORED PROCEDURE VAN TEAMGEGEVENS
		$TeamSql = InsertTeam($Teamname, $CompetitionType, $IntakeAddress, $conn);
		
		if($TeamSql){
			$success += 1;
		}

		echo $success;
//Opvragen van de TeamID zodat deze gebruikt kan worden in de volgende Stored Procedures.

		$TeamIDSQL = "SELECT TeamID FROM tblteams WHERE tblteams.TeamNaam = '$Teamname'";
		
		if(mysqli_query($conn, $TeamIDSQL)){
			$success += 1;
			echo "Records (TeamIDSQL) added successfully. \n";
		} else{
			echo "ERROR (TeamIDSQL): Could not able to execute $TeamIDSQL. " . mysqli_error($conn);
		}
	
	
// STORED PROCEDURE VAN TEAMKAPITEIN
	
		Deelnemers($TeamIDSQL, $TKFirstname, $TKLastname, $TKGender, $TKEmail, $conn);
		
		$TKID = "SELECT DeelnemersID FROM tbldeelnemers WHERE Email = '$TKEmail'";
		
		if(mysqli_query($conn, $TKID)){
			$success += 1;
			echo "Records (TKID) added successfully. \n";
		} else{
			echo "ERROR (TKID): Could not able to execute $TKID. " . mysqli_error($conn);
		}	
		
		$TKFullCity = "SELECT Gemeente FROM tblpostcodes WHERE Postnummer = $TKPostnumber";
		$TKFullCitySQL = mysqli_query($conn, $TKFullCity);
		$TKFullCitySQLFetch = mysqli_fetch_assoc($TKFullCitySQL);
	
		$TKFullCountry = "SELECT Land FROM tbllanden WHERE LandID = $TKCountry";
		$TKFullCountrySQL = mysqli_query($conn, $TKFullCountry);
		$TKFullCountrySQLFetch = mysqli_fetch_assoc($TKFullCountrySQL);
		
		$TKCity = "SELECT Gemeente FROM tblpostcodes WHERE Postnummer = $TKPostnumber";
		
		InsertTeamKapitein($TKID, $TeamIDSQL, $TKCountry, $TKAddress, $TKPostnumber, $TKCity, $TKPhone, $conn);
	
// Stored Procedure van TeamMember2 (Reserve Teamkapitein)

		$deelnemer2 = Deelnemers($TeamIDSQL, $TM2Firstname, $TM2Lastname, $TM2Gender, $TM2Email, $conn);
		
		if($deelnemer2){
			$success++;
		}	

		$TM2ID = "SELECT DeelnemersID FROM tbldeelnemers WHERE Email = '$TM2Email' ";
	
		if(mysqli_query($conn, $TM2ID)){
			$success += 1;
			echo "Records (TM2ID) added successfully. \n";
		} else{
			echo "ERROR (TM2ID): Could not able to execute $TM2ID. " . mysqli_error($conn);
		}

		$TM2FullCity = "SELECT Gemeente FROM tblpostcodes WHERE Postnummer = $TM2Postnumber";
		$TM2FullCitySQL = mysqli_query($conn, $TM2FullCity);
		$TM2FullCitySQLFetch = mysqli_fetch_assoc($TM2FullCitySQL);
	
		$TM2FullCountry = "SELECT Land FROM tbllanden WHERE LandID = $TM2Country";
		$TM2FullCountrySQL = mysqli_query($conn, $TM2FullCountry);
		$TM2FullCountrySQLFetch = mysqli_fetch_assoc($TM2FullCountrySQL);
		
		$TM2City = "SELECT Gemeente FROM tblpostcodes WHERE Postnummer = $TM2Postnumber";
		
		$reserve = InsertReserveTeamKapitein($TM2ID, $TeamIDSQL, $TM2Country, $TM2Address, $TM2Postnumber, $TM2City, $TM2Phone, $conn);
		
		if($reserve){
			$success++;
		}

// Stored Procedure van TeamMember3 (indien van toepassing)

		if(!empty($TM3Firstname))
		{
			Deelnemers($TeamIDSQL, $TM3Firstname, $TM3Lastname, $TM3Gender, $TM3Email, $conn);
		}

	
// Stored Procedure van TeamMember4 (indien van toepassing)

		if(!empty($TM4Firstname))
		{
			Deelnemers($TeamIDSQL, $TM4Firstname, $TM4Lastname, $TM4Gender, $TM4Email, $conn);
		}


// Stored Procedure van TeamMember5 (indien van toepassing)

		if(!empty($TM5Firstname))
		{
			Deelnemers($TeamIDSQL, $TM5Firstname, $TM5Lastname, $TM5Gender, $TM5Email, $conn);
		}
	

// Stored Procedure van TeamMember6 (indien van toepassing)

		if(!empty($TM6Firstname))
		{
			Deelnemers($TeamIDSQL, $TM6Firstname, $TM6Lastname, $TM6Gender, $TM6Email, $conn);
		}


// Stored Procedure van TeamMember7 (indien van toepassing)

		if(!empty($TM7Firstname))
		{
			Deelnemers($TeamIDSQL, $TM7Firstname, $TM7Lastname, $TM7Gender, $TM7Email, $conn);
		}


// Stored Procedure van TeamMember8 (indien van toepassing)

		if(!empty($TM8Firstname))
		{
			Deelnemers($TeamIDSQL, $TM8Firstname, $TM8Lastname, $TM8Gender, $TM8Email, $conn);
		}

	
// Stored Procedure van de Cursus. Deze wordt enkel uitgevoerd indien de checkbox is aangeklikt.
	
		if($TrainingCheck === "True"){
			InsertCursus($TeamIDSQL, $TrainingDate, $TrainingNr, $conn);
		}

// Stored Procedure van de Studenten Battle. Deze wordt enkel uitgevoerd indien de checkbox is aangeklikt.
	
		if($BattleCheck === "True"){
			InsertStudentenbattle($TeamIDSQL, $BattleNr, $conn);
		}


// random paswoord genereren en Stored Procedure die het gegenereerde paswoord naar de database pushed.
	
		$PassEncrypt = md5($pass);
		$password = InsertWachtwoord($TeamIDSQL, $PassEncrypt, $conn);
		
		if($password){
			$success++;
		}	
// Mail

		$to = $TKEmail;

		$subject = 'Inschrijving Brouwland Biercompetitie';
		
		$headers = "Content-type: text/html; charset=iso-8859-1\r\n";  
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "From: Biercompetitie@Brouwland.be \r\n";
		$headers .= "Reply-To: no-reply \r\n";
		
		$ChosenType;
		if ($CompetitionType == 1)
		{
			$ChosenType = "Hobbybier";
		}
		else
		{
			$ChosenType = "Studentenbier";
		}
					
		if ($TKCountry == "BelgiÃ«" )
			$TKCountry = "België";	
		if ($TM2Country == "BelgiÃ«" )
			$TM2Country = "België";
		if ($TM3Country == "BelgiÃ«" )
			$TM3Country = "België";
		if ($TM4Country == "BelgiÃ«" )
			$TM4Country = "België";		
		if ($TM5Country == "BelgiÃ«" )
			$TM5Country = "België";
		if ($TM6Country == "BelgiÃ«" )
			$TM6Country = "België";
		if ($TM7Country == "BelgiÃ«" )
			$TM7Country = "België";
		if ($TM8Country == "BelgiÃ«" )
			$TM8Country = "België";		
					

		//the message
		$message = '
		<html>
		<body><div id="wrap"><div id="headMail"><img style="width: auto; height: 120px;" src="http://193.191.187.253:8052/Image/brouwland-header-mail.png"></div><div id="main">
		</div><BR>
		';
		
		$message .= "Beste " . $TKFirstname . " " . $TKLastname . ",";
		$message .= '<br><br>';
		$message .= "Allereerst willen wij u bedanken voor uw deelname aan de Brouwland Biercompetitie 2015.";
		$message .= '<br>';
		$message .= "U bent geregistreerd met onderstaande informatie:";
		$message .= '
		<div id="wrap">
			<div id="main">
			
				<div class="clear"></div>
				
				<div class="container_16">
					<div class="grid_16"><strong><i><h3>Teamgegevens</h3></i></strong></div>
					<div class="clear"></div>
					<div class="grid_9 minimum-except">
					
					<table style="width:65%">
					  <tbody><tr>
						<td><strong>Teamnaam:<strong></td>
						<td>';
		$message .= $Teamname;				
		$message .= '				
						</td>		
						<td><strong>Categorie:</strong></td><td>';
		$message .= $ChosenType;	
		$message .= '
					</td>
					  </tr>
					  <tr>
						<td><strong>Brouwcursus:</strong></td>
						<td>';
		$message .= $TrainingDate;
		$message .= '
					</td>		
						<td><strong>Aantal Pers.:</strong></td>
						<td>';
		$message .=	$TrainingNr;
		$message .= '
					</td>
					  </tr>
					  <tr>
						<td><strong>Inleveradres:</strong></td>
						<td>';
		$message .= $IntakeAddress;
		$message .= '
					</td>
					  </tr>
					  <tr>
						<td><br></td>
					  </tr>
					  <tr>
						<td><strong><i><h3>Teamkapitein</h3></i></strong></td>
					  </tr>
					  <tr>
						<td><strong>Voornaam:</strong></td>
						<td>';
		$message .= $TKFirstname;
		$message .= '
					</td>		
						<td><strong>Achternaam:</strong></td>
						<td>';
		$message .=	$TKLastname;
		$message .=	 '
						</td>	
					  </tr>
					  <tr>
						<td><strong>Adres:</strong></td>
						<td>';
		$message .= $TKAddress;
		$message .= '
					</td>		
						<td><strong>Gemeente/Stad:</strong></td>
						<td>';
		$message .=	$TKFullCitySQLFetch['Gemeente'] . ", " . $TKFullCountrySQLFetch['Land'];
		$message .=	 '
						</td>		
				</tr>
				<tr>
						<td><strong>GSM-Nummer:</strong></td>
						<td>';
		$message .=	$TKPhone;
		$message .=	 '
						</td>
						<td><strong>Email:</strong></td>
						<td>';
		$message .=	$TKEmail;
		$message .= '
					</td>
					  </tr>
					  <tr>
						<td><br></td>
					  </tr>
					  <tr>
						<td><strong><i><h3>Reservekapitein</h3></i></strong></td>
					  </tr>
					  <tr>
						<td><strong>Voornaam:</strong></td>
						<td>';
		$message .= $TM2Firstname;
		$message .= '
					</td>		
						<td><strong>Achternaam:</strong></td>
						<td>';
		$message .=	$TM2Lastname;
		$message .=	 '
						</td>	
					  </tr>
					  <tr>
						<td><strong>Adres:</strong></td>
						<td>';
		$message .= $TM2Address;
		$message .= '
					</td>		
						<td><strong>Gemeente/Stad:</strong></td>
						<td>';
		$message .=	$TM2FullCitySQLFetch['Gemeente'] . ", " . $TM2FullCountrySQLFetch['Land'];
		$message .=	 '
						</td>	
				</tr>
				<tr>
						<td><strong>GSM-Nummer:</strong></td>
						<td>';
		$message .=	$TM2Phone;
		$message .=	 '
						</td>
						<td><strong>Email:</strong></td>
						<td>';
		$message .=	$TM2Email;
		if(!empty($TM3Firstname))
		{
		$message .= '
					</td>
					  </tr>
					  <tr>
						<td><br></td>
					  </tr>
					  <tr>
						<td><strong><i><h3>Teamlid 3</h3></i></strong></td>
					  </tr>
					  <tr>
						<td><strong>Voornaam:</strong></td>
						<td>';
		$message .= $TM3Firstname;
		$message .= '
					</td>		
						<td><strong>Achternaam:</strong></td>
						<td>';
		$message .=	$TM3Lastname;
		$message .=	 '
						</td>	
					  </tr>	
						<td><strong>Email:</strong></td>
						<td>';
		$message .=	$TM3Email;
		}
		if(!empty($TM4Firstname))
		{
		$message .= '
					</td>
					  </tr>
					  <tr>
						<td><br></td>
					  </tr>
					  <tr>
						<td><strong><i><h3>Teamlid 4</h3></i></strong></td>
					  </tr>
					  <tr>
						<td><strong>Voornaam:</strong></td>
						<td>';
		$message .= $TM4Firstname;
		$message .= '
					</td>		
						<td><strong>Achternaam:</strong></td>
						<td>';
		$message .=	$TM4Lastname;
		$message .=	 '
						</td>	
					  </tr>	
						<td><strong>Email:</strong></td>
						<td>';
		$message .=	$TM4Email;
		}
		if(!empty($TM5Firstname))
		{
			$message .= '
					</td>
					  </tr>
					  <tr>
						<td><br></td>
					  </tr>
					  <tr>
						<td><strong><i><h3>Teamlid 5</h3></i></strong></td>
					  </tr>
					  <tr>
						<td><strong>Voornaam:</strong></td>
						<td>';
			$message .= $TM5Firstname;
			$message .= '
					</td>		
						<td><strong>Achternaam:</strong></td>
						<td>';
			$message .=	$TM5Lastname;
			$message .=	 '
						</td>	
					  </tr>	
						<td><strong>Email:</strong></td>
						<td>';
			$message .=	$TM5Email;
		}
		if(!empty($TM6Firstname))
		{
			$message .= '
					</td>
					  </tr>
					  <tr>
						<td><br></td>
					  </tr>
					  <tr>
						<td><strong><i><h3>Teamlid 6</h3></i></strong></td>
					  </tr>
					  <tr>
						<td><strong>Voornaam:</strong></td>
						<td>';
			$message .= $TM6Firstname;
			$message .= '
					</td>		
						<td><strong>Achternaam:</strong></td>
						<td>';
			$message .=	$TM6Lastname;
			$message .=	 '
						</td>	
					  </tr>	
						<td><strong>Email:</strong></td>
						<td>';
			$message .=	$TM6Email;
		}
		if(!empty($TM7Firstname))
		{
			$message .= '
					</td>
					  </tr>
					  <tr>
						<td><br></td>
					  </tr>
					  <tr>
						<td><strong><i><h3>Teamlid 7</h3></i></strong></td>
					  </tr>
					  <tr>
						<td><strong>Voornaam:</strong></td>
						<td>';
			$message .= $TM7Firstname;
			$message .= '
					</td>		
						<td><strong>Achternaam:</strong></td>
						<td>';
			$message .=	$TM7Lastname;
			$message .=	 '
						</td>	
					  </tr>	
						<td><strong>Email:</strong></td>
						<td>';
			$message .=	$TM7Email;
		}
		if(!empty($TM8Firstname))
		{
			$message .= '
					</td>
					  </tr>
					  <tr>
						<td><br></td>
					  </tr>
					  <tr>
						<td><strong><i><h3>Teamlid 8</h3></i></strong></td>
					  </tr>
					  <tr>
						<td><strong>Voornaam:</strong></td>
						<td>';
			$message .= $TM8Firstname;
			$message .= '
					</td>		
						<td><strong>Achternaam:</strong></td>
						<td>';
			$message .=	$TM8Lastname;
			$message .=	 '
						</td>	
					  </tr>	
						<td><strong>Email:</strong></td>
						<td>
			';
			$message .=	$TM8Email;
		}
		
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
					<td><strong>Teamnaam:</strong></td>
					<td>';
		$message .= $Teamname;
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
		
		$message .=	 "U kan inloggen op uw Brouwland-Account door gebruik te maken van uw teamnaam en het bovenstaande wachtwoord. Let op: uw wachtwoord is vertrouwelijk en dat moet het ook blijven.";
		$message .=	 '<br><br>';
		$message .=	 "Met vriendelijke groeten,";
		$message .=	 '<br>';
		$message .=	 "Brouwland Biercompetitie";
		
		$message .= '</body></html>';

		// send email
		mail($to, $subject, $message, $headers);

		header("location:./RegistratieComfirmation.php");

	}
}
 ?>
