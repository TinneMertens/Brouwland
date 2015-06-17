<html lang="nl">
<head>
		<meta charset="utf-8">
        <meta property="og:title" content="Brouwland Biercompetitie">
        <meta property="og:description" content="Maak kans op 500 liter van je eigen bier! Surf snel naar www.mijnbier.be en schrijf je in!">
        <meta property="og:image" content="http://www.mijnbier.be/facebook/img/avatar2-nl.jpg">
        <meta property="og:url" content="http://www.mijnbier.be/inscription/default.cshtml?nav=3&amp;lang=nl">
        <meta property="og:locale" content="nl_NL">

		<link rel="stylesheet" type="text/css" href="./CSS/style.css" media="screen">
		<link rel="stylesheet" type="text/css" href="./CSS/grid.css" media="screen">
        <link rel="stylesheet" type="text/css" href="./CSS/nav.css" media="screen">
        <link rel="stylesheet" type="text/css" href="./CSS/normalize.css" media="screen">
        <link rel="stylesheet" type="text/css" href="./CSS/print.css" media="print"> 
        <link rel='stylesheet' href='./CSS/bootstrap.min.css'>
        

		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
		
		<script src="http://bootstrapdocs.com/v2.0.2/docs/assets/js/bootstrap-collapse.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="js/jquery-2.1.1.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-2.1.1.min.js"><\/script>')</script>
        <script src="js/global.js" type="text/javascript"></script>		
		<script src="js/jquery.smartmenus.js" type="text/javascript"></script>
		<script src="js/nav.js" type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.js" type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js" type="text/javascript"></script>
		
		<!-- freeow -->
		<link rel="stylesheet" type="text/css" href="CSS/freeow/freeow.css" />		
		<script type="text/javascript" src="js/jquery.freeow.js"></script>	
		
		<script>
		function getQueryVariable(variable)
		{
			var query = window.location.search.substring(1);
			var vars = query.split("&");
			for (var i=0;i<vars.length;i++) {
					var pair = vars[i].split("=");
					if(pair[0] == variable)
					{
						return pair[1];
					}
			}
			   return(false);
		}
		
		$(document).ready(function () {
			var checkInput = decodeURIComponent(getQueryVariable("ku"));
			var firstname = decodeURIComponent(getQueryVariable("fn"));
			var lastname = decodeURIComponent(getQueryVariable("ln"));
			var fullname = firstname + ' ' + lastname;
			
			if (checkInput === "true" ) {
				$("#freeow").freeow("Gegevens gewijzigd", "De gegevens van '" + fullname + "' zijn succesvol gewijzigd.", {
					classes: ["osx", "pushpin"],
					autoHide: false
				});
			}
		});
		</script>
		
		<!-- Zorgt voor collapse-functie -->
		<script type="text/javascript">
			$(document).on('click', '.panel div.clickable', function (e) {
				var $this = $(this);
				if (!$this.hasClass('panel-collapsed')) {
					$this.parents('.panel').find('.panel-body').slideUp();
					$this.addClass('panel-collapsed');
					$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
				} else {
					$this.parents('.panel').find('.panel-body').slideDown();
					$this.removeClass('panel-collapsed');
					$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
				}
			});
			$(document).ready(function () {
				$('.panel-heading span.clickable').click();
				$('.panel div.clickable').click();
			});
		</script>	

		<script>
		function validateString(string) {
			if (string === "" || string === null)
			{
				return true;
			}
		}
		
		function validateForm() {
			var errorCount = 0;
			var text = "";
			
			//AANTAL TEAMLEDEN
			var count = document.forms["form1"]["AantalLeden"].value;
			
			//TEAMKAPITEIN
			var firstname1 = document.forms["form1"]["Firstname1"].value;
			var lastname1 = document.forms["form1"]["Lastname1"].value;
			var address1 = document.forms["form1"]["Address1"].value;
			var zip1 = document.forms["form1"]["Zip1"].value;
			var city1 = document.forms["form1"]["City"].value;
			var country1 = document.forms["form1"]["Country"].value;
			var phone1 = document.forms["form1"]["Phone1"].value;
			var email1 = document.forms["form1"]["Email1"].value;
			var gender1 = document.forms["form1"]["Gender1"].value;
			
			console.log(firstname1, lastname1, address1, zip1, city1, country1, phone1, email1, gender1);
			
			if (
			validateString(firstname1) || 
			validateString(lastname1) || 
			validateString(address1) || 
			validateString(zip1) || 
			validateString(city1) || 
			validateString(country1) || 
			validateString(phone1) || 
			validateString(email1) || 
			validateString(gender1)
			)
			{
				errorCount += 1;
				text += "- Teamkapitein (teamlid 1).<br>";
			}
			
			//RESERVEKAPITEIN
			var firstname2 = document.forms["form1"]["Firstname2"].value;
			var lastname2 = document.forms["form1"]["Lastname2"].value;
			var address2 = document.forms["form1"]["Address2"].value;
			var zip2 = document.forms["form1"]["Zip2"].value;
			var city2 = document.forms["form1"]["City2"].value;
			var country2 = document.forms["form1"]["Country2"].value;
			var phone2 = document.forms["form1"]["Phone2"].value;
			var email2 = document.forms["form1"]["Email2"].value;
			var gender2 = document.forms["form1"]["Gender2"].value;
			
			if (
			validateString(firstname2) || 
			validateString(lastname2) || 
			validateString(address2) || 
			validateString(zip2) || 
			validateString(city2) || 
			validateString(country2) || 
			validateString(phone2) || 
			validateString(email2) || 
			validateString(gender2)
			)
			{
				errorCount += 1;
				text += "- Reservekapitein (teamlid 2).<br>";
			}
			
			//TEAMLID 3
			if (count >= 3)
			{
				var firstname3 = document.forms["form1"]["Firstname3"].value;
				var lastname3 = document.forms["form1"]["Lastname3"].value;
				var email3 = document.forms["form1"]["Email3"].value;
				var gender3 = document.forms["form1"]["Gender3"].value;
				
				if (
				validateString(firstname3) || 
				validateString(lastname3) || 
				validateString(email3) || 
				validateString(gender3)
				)
				{
					errorCount += 1;
					text += "- Teamlid 3.<br>";
				}
			}
			
			//TEAMLID 4
			if (count >= 4)
			{
				var firstname4 = document.forms["form1"]["Firstname4"].value;
				var lastname4 = document.forms["form1"]["Lastname4"].value;
				var email4 = document.forms["form1"]["Email4"].value;
				var gender4 = document.forms["form1"]["Gender4"].value;
				
				if (
				validateString(firstname4) || 
				validateString(lastname4) || 
				validateString(email4) || 
				validateString(gender4)
				)
				{
					errorCount += 1;
					text += "- Teamlid 4.<br>";
				}
			}
			
			//TEAMLID 5
			if (count >= 5)
			{
				var firstname5 = document.forms["form1"]["Firstname5"].value;
				var lastname5 = document.forms["form1"]["Lastname5"].value;
				var email5 = document.forms["form1"]["Email5"].value;
				var gender5 = document.forms["form1"]["Gender5"].value;
				
				if (
				validateString(firstname5) || 
				validateString(lastname5) || 
				validateString(email5) || 
				validateString(gender5)
				)
				{
					errorCount += 1;
					text += "- Teamlid 5.<br>";
				}
			}
			
			//TEAMLID 6
			if (count >= 6)
			{
				var firstname6 = document.forms["form1"]["Firstname6"].value;
				var lastname6 = document.forms["form1"]["Lastname6"].value;
				var email6 = document.forms["form1"]["Email6"].value;
				var gender6 = document.forms["form1"]["Gender6"].value;
				
				if (
				validateString(firstname6) || 
				validateString(lastname6) || 
				validateString(email6) || 
				validateString(gender6)
				)
				{
					errorCount += 1;
					text += "- Teamlid 6.<br>";
				}
			}
			
			//TEAMLID 7
			if (count >= 7)
			{			
				var firstname7 = document.forms["form1"]["Firstname7"].value;
				var lastname7 = document.forms["form1"]["Lastname7"].value;
				var email7 = document.forms["form1"]["Email7"].value;
				var gender7 = document.forms["form1"]["Gender7"].value;
				
				if (
				validateString(firstname7) || 
				validateString(lastname7) || 
				validateString(email7) || 
				validateString(gender7)
				)
				{
					errorCount += 1;
					text += "- Teamlid 7.<br>";
				}
			}
			
			//TEAMLID 8
			if (count >= 8)
			{			
				var firstname8 = document.forms["form1"]["Firstname8"].value;
				var lastname8 = document.forms["form1"]["Lastname8"].value;
				var email8 = document.forms["form1"]["Email8"].value;
				var gender8 = document.forms["form1"]["Gender8"].value;
				
				if (
				validateString(firstname8) || 
				validateString(lastname8) || 
				validateString(email8) || 
				validateString(gender8)
				)
				{
					errorCount += 1;
					text += "- Teamlid 8.<br>";
				}
			}
			
			if (errorCount > 0)
			{
				$("#freeow").freeow("Opgepast", "Gelieve alle velden van de volgende teamleden te vervolledigen:<br><br>" + text, {
					classes: ["osx", "notice"],
					autoHide: false
				});	
				return false;
			}
			else{
				return true;
			}
		}
		
		$(document).ready(function () {
			var checkInput = decodeURIComponent(getQueryVariable("tu"));
			
			if (checkInput === "true" ) {
				$("#freeow").freeow("Gegevens gewijzigd", "De gegevens van uw team zijn succesvol gewijzigd.", {
					classes: ["osx", "pushpin"],
					autoHide: false
				});
			}
		});
		</script>
		
		<?php
		
		//Session starten
		session_start();
		
		//Connectie met database maken
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		//TeamID opvragen
		$TeamID = $_SESSION['TeamID'];
		
		//Gegevens Team opvragen met behulp van TeamID
		$TeamGegevens = "SELECT * FROM tblteams WHERE tblteams.TeamID  = ($TeamID)";
		$TeamResult = mysqli_query($conn, $TeamGegevens);
		$TeamRow = mysqli_fetch_array($TeamResult);
		//Categorie team opvragen
		$CategorieID = $TeamRow['Categorie'];
		$TeamCategorie = "SELECT Omschrijving FROM tblcategorieen WHERE tblcategorieen.CategorieID  = ($CategorieID)";
		$TeamCategorieResult = mysqli_query($conn, $TeamCategorie);
		$TeamCategorieRow = mysqli_fetch_array($TeamCategorieResult);
		//Cursus team opvragen
		$TeamCursus = "SELECT * FROM tblcursussen WHERE tblcursussen.TeamID  = ($TeamID)";
		$TeamCursusResult = mysqli_query($conn, $TeamCursus);
		$TeamCursusRow = mysqli_fetch_array($TeamCursusResult);
		
		//TEAMKAPITEIN
		//Gegevens teamkapitein opvragen
		$KapiteinGegevens = "SELECT * FROM tblkapiteingegevens WHERE tblkapiteingegevens.TeamID  = ($TeamID)";
		$KapiteinResult = mysqli_query($conn, $KapiteinGegevens);
		$KapiteinRow = mysqli_fetch_array($KapiteinResult);
		
		//Overige gegevens teamkapitein opvragen
		$KapiteinID = $KapiteinRow['DeelnemersID'];
		$KapiteinGegevens2 = "SELECT * FROM tbldeelnemers WHERE tbldeelnemers.DeelnemersID  = ($KapiteinID)";
		$KapiteinResult2 = mysqli_query($conn, $KapiteinGegevens2);
		$KapiteinRow2 = mysqli_fetch_array($KapiteinResult2);
		
		//Postnummer van teamkapitein opvragen
		$PostnummerSQL = $KapiteinRow['Postnummer'];
		$ZipSQL = "SELECT Postcode FROM tblpostcodes WHERE tblpostcodes.Postnummer  = ($PostnummerSQL)";
		$KapiteinZip = mysqli_query($conn, $ZipSQL);
		$KapiteinZipRow = mysqli_fetch_array($KapiteinZip);
		
		//Land van teamkapitein opvragen
		$LandSQL = $KapiteinRow['Land'];
		$CountrySQL = "SELECT * FROM tbllanden WHERE tbllanden.LandID  = ($LandSQL)";
		$KapiteinCountry = mysqli_query($conn, $CountrySQL);
		$KapiteinCountryRow = mysqli_fetch_array($KapiteinCountry);
		
		//RESERVEKAPITEIN
		//Gegevens reservekapitein opvragen
		$ReserveKapiteinGegevens = "SELECT * FROM tblreservekapiteingegevens WHERE tblreservekapiteingegevens.TeamID  = ($TeamID)";
		$ReserveKapiteinResult = mysqli_query($conn, $ReserveKapiteinGegevens);
		$ReserveKapiteinRow = mysqli_fetch_array($ReserveKapiteinResult);
		
		//Overige gegevens reserveteamkapitein opvragen
		$ReserveKapiteinID = $ReserveKapiteinRow['DeelnemersID'];
		$ReserveKapiteinGegevens2 = "SELECT * FROM tbldeelnemers WHERE tbldeelnemers.DeelnemersID  = ($ReserveKapiteinID)";
		$ReserveKapiteinResult2 = mysqli_query($conn, $ReserveKapiteinGegevens2);
		$ReserveKapiteinRow2 = mysqli_fetch_array($ReserveKapiteinResult2);
		
		//Postnummer van reserveteamkapitein opvragen
		$PostnummerSQL2 = $ReserveKapiteinRow['Postnummer'];
		$ZipSQL2 = "SELECT Postcode FROM tblpostcodes WHERE tblpostcodes.Postnummer  = ($PostnummerSQL2)";
		$ReserveKapiteinZip = mysqli_query($conn, $ZipSQL2);
		$ReserveKapiteinZipRow = mysqli_fetch_array($ReserveKapiteinZip);
		
		//Land van teamreservekapitein opvragen
		$LandSQL2 = $KapiteinRow['Land'];
		$CountrySQL2 = "SELECT * FROM tbllanden WHERE tbllanden.LandID  = ($LandSQL)";
		$ReserveKapiteinCountry = mysqli_query($conn, $CountrySQL2);
		$ReserveKapiteinCountryRow = mysqli_fetch_array($ReserveKapiteinCountry);
		
		//TEAM
		//Aantal teamleden opvragen
		$countTeamleden = "SELECT * FROM tbldeelnemers WHERE tbldeelnemers.TeamID  = ($TeamID)";
		$countTeamledenSQL = mysqli_query($conn, $countTeamleden);
		$NumberTeamleden=mysqli_num_rows($countTeamledenSQL) - 2;
		

		?>

</head>

<!-- Header -->
<!-- Hier wordt de bg-header (zie style.css -> head) op de pagina geplaatst. -->

<div id='head'><img src='Image/bg-header.jpg'></div>

<!-- Header -->


<body style="zoom: 1;">
    <div id="wrap">
    	<div id="main">
		
          <div class="container_16">
		  <div id="freeow" class="freeow freeow-top-right"></div>
            <div class="grid_16">
                <header>
                <img src="Image/logo-brouwland-biercompetitie-nl.png" alt="Brouwland Biercompetitie">
                
				<!-- <div class="bottles"><img src="Image/pic-bottles.png" class="img-default" alt="Brouwland Biercompetitie"></div> -->
				
				<div id="topbox">
				    <div class="item"><a href="http://www.facebook.com/mijnbier" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x fa-inverse"></i><i class="fa fa-facebook-square fa-stack-1x btn-facebook"></i></span></a></div>
				    <div class="item"><a href="https://twitter.com/MijnEigenBier" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x fa-inverse"></i><i class="fa fa-twitter fa-stack-1x btn-twitter"></i></span></a></div>
				    <div class="item"><a href="http://www.youtube.com/bierbrouwen" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x fa-inverse"></i><i class="fa fa-youtube fa-stack-1x btn-youtube"></i></span></a></div>
				    <div class="item"><a href="../fr/" class="language">FR</a></div>
				</div>
				</header>

				<div class="clear"></div>
					<div id="navigatie"><nav>
					<a id="menu-button" class="collapsed"></a>
					<ul id="main-menu" class="sm sm-clean collapsed">
					  <li><a href="http://www.mijnbier.be/nl/" class="">Home Biercompetitie</a></li>
					  <li><a href="./Login.php" class="">Login</a></li>
					  <li><a href="./Account.php" class="current">Account</a></li>

					  <li><a class="has-submenu" aria-haspopup="false">Hulp nodig?<span class="sub-arrow"></i></span></a>
						<ul class="sm-nowrap" style="display: none; width: auto; min-width: 14em; max-width: 24em; top: auto; left: auto; margin-left: 0px; margin-top: 0px;">
						  <li>
						  	<a href="Handleidingen/HandleidingDeelnemers.pdf" target="_blank">Handleiding</a>
						  </li>
						  <li>
						  	<a href="mailto:info@mijnbier.be">Contact</a>
						  </li>
						</ul>
					  </li>
					  
						<div style="float: right; size: 11px;">
					  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
						</div>
					  
					</ul>
					</nav>
					</div>
            </div></div>
            <div class="clear"></div>

<!--             Hier wordt de container geopend waarin tekst, foto's, enzo in geplaatst kunnen worden. -->
         
	<?php 
	session_start();
	/*Als de session Teamid leeg is kan je niet op de pagina geraken.
	Dit controleert of er een Team is aangemeld.*/
		
	if(empty($_SESSION['TeamID']))
	{
	?>	
		
	<form>
        <div class="container_16">
            <br>
            <div class="grid_16"><h1>Account Gegevens</h1></div>
				<div class="grid_9 minimum-except">
					<br>
					<kt>Gelieve eerst aan te melden alvorens u uw gegevens kan wijzigen.</kt>
						<div class="clear">
					</div>
					<BR><BR><BR><BR><BR><BR><BR><BR><BR>
					<a href="./Login.php"><i><strong>Klik hier om in te loggen.</strong></i></a>
                </div>
            </div>
		<div class="clear">
	</div>
    <BR><BR>	

	<?php	
		
	}
	else
	{
			
	?>
			<form name="form1" action="TeamUpdatenCode.php" method="POST" onsubmit="return validateForm()">
			
			<div class="container_16">
            <br>
            <div class="grid_16"><h1>Account Gegevens</h1></div>
            
			<div class="grid_9 minimum-except">
			<br>
			<kt>Hieronder kan u de gegevens die gekoppeld zijn aan uw team raadplegen.</kt>
			<br><br><br>
			
			<!-- Teamgegevens -->
			<h2>Gegevens Team</h2>
			<br>
			<div class="form-item1" style="width:105px">
              Teamnaam:
            </div>
            <div class="form-item2">
                <strong><?php echo utf8_encode($TeamRow['TeamNaam']); ?></strong>
            </div> 
			
			<div class="form-item1" style="width:105px">
              Categorie:
            </div>
            <div class="form-item1">
                <strong><?php echo utf8_encode($TeamCategorieRow['Omschrijving']); ?></strong>
            </div> 
			
			<div class="clear"></div>
			
			<div class="form-item1" style="width:105px">
              Brouwcursus:
            </div>
            <div class="form-item2">
                <strong><?php echo $TeamCursusRow['Cursusdatum']; ?></strong>
            </div> 
			
			<div class="form-item1" style="width:105px">
              Inleveradres:
            </div>
            <div class="form-item1">
                <strong><?php echo utf8_encode($TeamRow['InleverAdress']); ?></strong>
            </div> 
			<br><br><br><br>
			</div>
			
			<div class="clear"></div>
			
			<div class="grid_9 minimum-except">
			<h2>Gegevens Leden</h2>
			<br><br>
			</div>
			
			<!-- Kapitein -->
			   
			<!-- collapse systeem -->
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading clickable">
						<h2 class="panel-title">1) <?php echo utf8_encode($KapiteinRow2['Voornaam']); ?> <?php echo utf8_encode($KapiteinRow2['Familienaam']); ?></h2>
						<span class="pull-right">
							<i class="glyphicon glyphicon-chevron-down"></i>
						</span>
					</div>
					<div class="panel-body" style="display: none;">			
			<div class="form-item1" style="width:105px">
              Voornaam
            </div>
            <div class="form-item2">
                <input name="Firstname1" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KapiteinRow2['Voornaam']); ?>">
            </div> 
			
			<div class="form-item1" style="width:105px">
              Familienaam
            </div>
            <div class="form-item2">
                <input name="Lastname1" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KapiteinRow2['Familienaam']); ?>">
            </div> 
            
			
			<div class="form-item1" style="width:105px">
              Adres
            </div>
            <div class="form-item2">
                <input name="Address1" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KapiteinRow['Adres']); ?>">
            </div> 
	
			<div class="form-item1" style="width:105px">
              Land
            </div>
			<div class="form-item1">
				<select name="Country1" id="Country1" type="text" class="required inputveld" maxlength="100" aria-required="true">
					<option value="<?php $KapiteinCountryNow = utf8_encode($KapiteinCountryRow['LandID']);  echo $KapiteinCountryNow; ?>">
						<?php echo utf8_encode($KapiteinCountryRow['Land']) ?>
					</option>
					
					<?php
						$sql = "SELECT * FROM tbllanden";
						$result = mysqli_query($conn, $sql);

						while ($row = mysqli_fetch_array($result)) {
							if ($row['LandID'] != $KapiteinCountryNow)
							{
								echo "<option value='" . $row['LandID'] . "'>" . utf8_encode($row['Land']) .  "</option>";
							}
						}
					?>
				</select>
			</div>
			
			<div class="clear"></div>
			
			<div class="form-item1" style="width:105px">
              Postcode
            </div>
            <div class="form-item2">
                <input name="Zip1" id="Zip1" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KapiteinZipRow['Postcode']); ?>">
            </div> 
			
        	<script type="text/javascript">
				/*Zorgt ervoor dat wanneer je de postcode hebt ingevuld de ddl met de overeenkomende gemeente wordt geladen*/
				var CountryInput = document.getElementById('Country1');
				var CityInput = document.getElementById('Zip1');
											
				function useValue() {
					var CityValue = CityInput.value;
					var CountryValue = CountryInput.value;
					var name = "City1";

					$("#CityRefresh").load("City.php?city=" + CityValue + "&country=" + CountryValue + "&name=" + name);
												
					if (CountryValue == "")
					{
						$("#freeow").freeow("Opgepast", "Gelieve ook uw land hierboven aan te duiden.", {
							classes: ["osx", "notice"],
							autoHide: false
						});	
						}
					}

					CityInput.onchange = useValue;
					CountryInput.onchange = useValue;
        		
        	</script>			
			
			<div class="form-item1" style="width:105px">
              Stad/Gemeente
            </div>
            <div id="div1-wrapper">
                <div id="CityRefresh" class="form-item1">
					<select name="City1" id="City1" type="text" class="required inputveld" maxlength="100" aria-required="true">
						<option value="<?php echo utf8_encode($KapiteinRow['Postnummer']); ?>"><a><i><?php echo utf8_encode($KapiteinRow['Stad']); ?></i></a></option>
					</select>
				</div>
            </div> 
            
            <div class="clear"></div>
			
			<div class="form-item1" style="width:105px">
              GSM
            </div>
            <div class="form-item2">
                <input name="Phone1" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KapiteinRow['GSM']); ?>">
            </div> 
			
			<div class="form-item1" style="width:105px">
              Email
            </div>
            <div class="form-item2">
                <input name="Email1" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KapiteinRow2['Email']); ?>">
            </div> 
            
			
			<div class="form-item1" style="width:105px">
              Geslacht
            </div>
            <div class="form-item2">
                <select name="Gender1" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KapiteinRow2['Geslacht']); ?>">
                	<option value="<?php echo utf8_encode($KapiteinRow2['Geslacht']); ?>"><?php echo utf8_encode($KapiteinRow2['Geslacht']); ?></option>
					<?php 
						if ($KapiteinRow2['Geslacht'] == "M")
						{
							$OtherGender1 = "V";
						}
						else
						{
							$OtherGender1 = "M";
						}
					?>
                	<option value="<?php echo $OtherGender1; ?>"><?php echo $OtherGender1; ?></option>
                </select>
            </div> 
			
			<div style="display: none;"><input name="DeelnemersID1" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KapiteinRow2['DeelnemersID']); ?>"></div>
		
				<div class="clear"></div>
				</div>
				</div> 
				</div>
				<br><br>
				<div class="clear"></div>
				
				
		<!-- ReserveKapitein -->

			<!-- collapse systeem -->
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading clickable">
						<h2 class="panel-title">2) <?php echo utf8_encode($ReserveKapiteinRow2['Voornaam']); ?> <?php echo utf8_encode($ReserveKapiteinRow2['Familienaam']); ?></h2>
						<span class="pull-right">
							<i class="glyphicon glyphicon-chevron-down"></i>
						</span>
					</div>
					<div class="panel-body" style="display: none;">			
			<div class="form-item1" style="width:105px">
              Voornaam
            </div>
            <div class="form-item2">
                <input name="Firstname2" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($ReserveKapiteinRow2['Voornaam']); ?>">
            </div> 
			
			<div class="form-item1" style="width:105px">
              Familienaam
            </div>
            <div class="form-item2">
                <input name="Lastname2" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($ReserveKapiteinRow2['Familienaam']); ?>">
            </div> 
            
			
			<div class="form-item1" style="width:105px">
              Adres
            </div>
            <div class="form-item2">
                <input name="Address2" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($ReserveKapiteinRow['Adres']); ?>">
            </div> 
	
			<div class="form-item1" style="width:105px">
              Land
            </div>
			<div class="form-item1">
				<select name="Country2" id="Country2" type="text" class="required inputveld" maxlength="100" aria-required="true">
					<option value="<?php $ReserveKapiteinCountryNow = utf8_encode($ReserveKapiteinCountryRow['LandID']);  echo $ReserveKapiteinCountryNow; ?>">
						<?php echo utf8_encode($ReserveKapiteinCountryRow['Land']) ?>
					</option>
					
					<?php
						$sql2 = "SELECT * FROM tbllanden";
						$result2 = mysqli_query($conn, $sql2);

						while ($row2 = mysqli_fetch_array($result2)) {
							if ($row2['LandID'] != $ReserveKapiteinCountryNow)
							{
								echo "<option value='" . $row2['LandID'] . "'>" . utf8_encode($row2['Land']) .  "</option>";
							}
						}
					?>
				</select>
			</div>
			
			<div class="clear"></div>
			
			<div class="form-item1" style="width:105px">
              Postcode
            </div>
            <div class="form-item2">
                <input name="Zip2" id="Zip2" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($ReserveKapiteinZipRow['Postcode']); ?>">
            </div> 
			
        	<script type="text/javascript">
				/*Zorgt ervoor dat wanneer je de postcode hebt ingevuld de ddl met de overeenkomende gemeente wordt geladen*/
				var CountryInput2 = document.getElementById('Country2');
				var CityInput2 = document.getElementById('Zip2');
											
				function useValue2() {
					var CityValue2 = CityInput2.value;
					var CountryValue2 = CountryInput2.value;
					var name2 = "City2";

					$("#CityRefresh2").load("City.php?city=" + CityValue2 + "&country=" + CountryValue2 + "&name=" + name2);
												
					if (CountryValue2 == "")
					{
						$("#freeow").freeow("Opgepast", "Gelieve ook uw land hierboven aan te duiden.", {
							classes: ["osx", "notice"],
							autoHide: false
						});	
						}
					}

					CityInput2.onchange = useValue2;
					CountryInput2.onchange = useValue2;
        		
        	</script>			
			
			<div class="form-item1" style="width:105px">
              Stad/Gemeente
            </div>
            <div id="div1-wrapper">
                <div id="CityRefresh2" class="form-item1">
					<select name="City2" id="City2" type="text" class="required inputveld" maxlength="100" aria-required="true">
						<option value="<?php echo utf8_encode($ReserveKapiteinRow['Postnummer']); ?>"><a><i><?php echo utf8_encode($ReserveKapiteinRow['Stad']); ?></i></a></option>
					</select>
				</div>
            </div> 
            
            <div class="clear"></div>
			
			
			<div class="form-item1" style="width:105px">
              GSM
            </div>
            <div class="form-item2">
                <input name="Phone2" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($ReserveKapiteinRow['GSM']); ?>">
            </div> 
			
			<div class="form-item1" style="width:105px">
              Email
            </div>
            <div class="form-item2">
                <input name="Email2" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($ReserveKapiteinRow2['Email']); ?>">
            </div> 
            
			
			<div class="form-item1" style="width:105px">
              Geslacht
            </div>
            <div class="form-item2">
                <select name="Gender2" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($ReserveKapiteinRow2['Geslacht']); ?>">
                	<option value="<?php echo utf8_encode($ReserveKapiteinRow2['Geslacht']); ?>"><?php echo utf8_encode($ReserveKapiteinRow2['Geslacht']); ?></option>
					<?php 
						if ($ReserveKapiteinRow2['Geslacht'] == "M")
						{
							$OtherGender2 = "V";
						}
						else
						{
							$OtherGender2 = "M";
						}
					?>
                	<option value="<?php echo $OtherGender2; ?>"><?php echo $OtherGender2; ?></option>
                </select>
            </div> 
			
			<div style="display: none;"><input name="DeelnemersID2" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($ReserveKapiteinRow2['DeelnemersID']); ?>"></div>
		
			<div class="clear"></div>
				</div>
				</div> 
				</div>
				
				
				<br><br>
				<div class="clear"></div>
			
	<?php	
		$count = 2;
		
		while ($row = mysqli_fetch_array($countTeamledenSQL)) 
		{
			
			if (($KapiteinRow['DeelnemersID'] != $row['DeelnemersID']) && ($ReserveKapiteinRow['DeelnemersID'] != $row['DeelnemersID']))
			{
				$count += 1;
			
	?>
	  
	<!-- collapse systeem -->
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading clickable">
					<h2 class="panel-title"><?php echo $count; ?>) <?php echo utf8_encode($row['Voornaam']); ?> <?php echo utf8_encode($row['Familienaam']); ?></h2>
					<span class="pull-right">
						<i class="glyphicon glyphicon-chevron-down"></i>
					</span>
				</div>
				<div class="panel-body" style="display: none;">			
			<div class="form-item1" style="width:105px">
              Voornaam
            </div>
            <div class="form-item2">
                <input name="Firstname<?php echo $count; ?>" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($row['Voornaam']); ?>">
            </div> 
			

			
			<div class="form-item1" style="width:105px">
              Familienaam
            </div>
            <div class="form-item2">
                <input name="Lastname<?php echo $count; ?>" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($row['Familienaam']); ?>">
            </div> 
            
			
			<div class="form-item1" style="width:105px">
              Email
            </div>
            <div class="form-item2">
                <input name="Email<?php echo $count; ?>" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($row['Email']); ?>">
            </div> 
			
			
			<div class="form-item1" style="width:105px">
              Geslacht
            </div>
            <div class="form-item2">
                <select name="Gender<?php echo $count; ?>" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($row['Geslacht']); ?>">
                	<option value="<?php echo utf8_encode($row['Geslacht']); ?>"><?php echo utf8_encode($row['Geslacht']); ?></option>
					<?php 
						if ($row['Geslacht'] == "M")
						{
							$OtherGender = "V";
						}
						else
						{
							$OtherGender = "M";
						}
					?>
                	<option value="<?php echo $OtherGender; ?>"><?php echo $OtherGender; ?></option>
                </select>
            </div> 
			<div style="display: none;"><input name="DeelnemersID<?php echo $count; ?>" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($row['DeelnemersID']); ?>"></div>
			<div class="clear"></div>
			</div>
			</div> 
			</div>
			<br><br>
			<div class="clear"></div>
			
	<?php
			}
		}
	?>
	
	<div class="grid_9 minimum-except">
		<br><br><br>
        <input type="submit" name="Submit1" class="form-btn" value="Gegevens wijzigen "/>
		<div style="display: none;"><input name="AantalLeden" id="AantalLeden" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo $count; ?>"></div>
		<br><br><br>
	</div>
	</form>
	
	<?php
	}
	?>
	
			
	</div>
     <div id="footer">     <div class="footer-box">
     	<div class="item first"><a href="http://www.brouwland.com" target="_blank"><img src="Image/logo-brouwland.png" alt="Brouwland"></a></div>
        <div class="item questions"><i class="fa fa-comments fa-2x btn-nolink"></i> Nog vragen?<p>Neem contact op via <span class="emailCloak"><a href="mailto:info@mijnbier.be">info@mijnbier.be</a></span></p></div>
        <div class="item last">
          <a href="../fr/" class="language"><span class="fa-stack fa-lg">FR</span></a>
          <a href="http://www.facebook.com/mijnbier" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x fa-inverse"></i><i class="fa fa-facebook-square fa-stack-1x btn-facebook"></i></span></a>
		  <a href="https://twitter.com/MijnEigenBier" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x fa-inverse"></i><i class="fa fa-twitter fa-stack-1x btn-twitter"></i></span></a>
          <a href="http://www.youtube.com/bierbrouwen" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x fa-inverse"></i><i class="fa fa-youtube fa-stack-1x btn-youtube"></i></span></a>
        </div>
        
     </div>
</div>

	 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29763405-1']);
  _gaq.push(['_setDomainName', 'www.mijnbier.be']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</form>
</body>
</html>
