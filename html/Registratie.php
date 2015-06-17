<html lang="nl">
<head>
	<meta charset="utf-8">
    <meta property="og:title" content="Brouwland Biercompetitie">
    <meta property="og:description" content="Maak kans op 500 liter van je eigen bier! Surf snel naar www.mijnbier.be en schrijf je in!">
    <meta property="og:image" content="http://www.mijnbier.be/facebook/img/avatar2-nl.jpg">
    <meta property="og:url" content="http://www.mijnbier.be/inscription/default.cshtml?nav=3&amp;lang=nl">
    <meta property="og:locale" content="nl_NL">

	<link rel="stylesheet" type="text/css" href="CSS/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="CSS/grid.css" media="screen">
    <link rel="stylesheet" type="text/css" href="CSS/nav.css" media="screen">
    <link rel="stylesheet" type="text/css" href="CSS/normalize.css" media="screen">
    <link rel="stylesheet" type="text/css" href="CSS/print.css" media="print">
    <link rel='stylesheet' href='CSS/bootstrap.min.css'>

	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>

	<script src="http://bootstrapdocs.com/v2.0.2/docs/assets/js/bootstrap-collapse.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="js/jquery-2.1.1.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-2.1.1.min.js"><\/script>')</script>
    <script src="js/global.js" type="text/javascript"></script>
	<script src="js/jquery.smartmenus.js" type="text/javascript"></script>
	<script src="js/nav.js" type="text/javascript"></script>
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js" type="text/javascript"></script>
	<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

	<script src="/Check-Team-Address-Phone-Mail.php" type="text/javascript"></script>

	<!-- freeow -->
	<link rel="stylesheet" type="text/css" href="CSS/freeow/freeow.css" />
	<script type="text/javascript" src="js/jquery.freeow.js"></script>

	<script type="text/javascript">

		function validateString(string) {
			if (string === "" || string === null)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		function validateForm() {
			var teamname = document.forms["form1"]["Team"].value;
			var competitionType = document.forms["form1"]["CompetitionType"].value;

			var firstname = document.forms["form1"]["Firstname"].value;
			var lastname = document.forms["form1"]["Lastname"].value;
			var address = document.forms["form1"]["Address"].value;
			var zip = document.forms["form1"]["Zip"].value;
			var city = document.forms["form1"]["City"].value;
			var country = document.forms["form1"]["Country"].value;
			var phone = document.forms["form1"]["Phone"].value;
			var email = document.forms["form1"]["Email"].value;
			var gender = document.forms["form1"]["Gender"].value;
			
			console.log(firstname, lastname, address, zip, city, country, phone, email, gender);

			var firstname2 = document.forms["form1"]["Firstname2"].value;
			var lastname2 = document.forms["form1"]["Lastname2"].value;
			var address2 = document.forms["form1"]["Address2"].value;

			var zip2 = document.forms["form1"]["Zip2"].value;
			var city2 = document.forms["form1"]["City2"].value;
			var country2 = document.forms["form1"]["Country2"].value;
			var phone2 = document.forms["form1"]["Phone2"].value;
			var email2 = document.forms["form1"]["Email2"].value;
			var gender2 = document.forms["form1"]["Gender2"].value;

			var errorCount = 0;
			var text = "";

			if (validateString(teamname))
			{
				text += "- Teamnaam<br>";
				errorCount++;
			}

			if (validateString(competitionType))
			{
				text += "- Categorie<br>";
				errorCount++;
			}

			if (
			validateString(firstname) ||
			validateString(lastname) ||
			validateString(address) ||
			validateString(zip) ||
			validateString(city) ||
			validateString(country) ||
			validateString(phone) ||
			validateString(email) ||
			validateString(gender)
			)
			{
				text += "- Teamkapitein<br>";
				errorCount++;
			}

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
				text += "- Reservekapitein<br>";
				errorCount++;
			}

			var firstname3 = document.forms["form1"]["Firstname3"].value;

			if (validateString(firstname3) == false)
			{
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
					text += "- Teamlid 3<br>";
					errorCount++;
				}
			}

			var firstname4 = document.forms["form1"]["Firstname4"].value;

			if (validateString(firstname4) == false)
			{
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
					text += "- Teamlid 4<br>";
					errorCount++;
				}
			}

			var firstname5 = document.forms["form1"]["Firstname5"].value;

			if (validateString(firstname5) == false)
			{
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
					text += "- Teamlid 5<br>";
					errorCount++;
				}
			}

			var firstname6 = document.forms["form1"]["Firstname6"].value;

			if (validateString(firstname6) == false)
			{
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
					text += "- Teamlid 6<br>";
					errorCount++;
				}
			}

			var firstname7 = document.forms["form1"]["Firstname7"].value;

			if (validateString(firstname7) == false)
			{
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
					text += "- Teamlid 7<br>";
					errorCount++;
				}
			}

			var firstname8 = document.forms["form1"]["Firstname8"].value;

			if (validateString(firstname8) == false)
			{
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
					text += "- Teamlid 8<br>";
					errorCount++;
				}
			}

			if (document.forms["form1"]["Training"].checked)
			{
				var trainingDate = document.forms["form1"]["TrainingDate"].value;
				var trainingNr = document.forms["form1"]["TrainingNr"].value;

				if (
				validateString(trainingDate) ||
				validateString(trainingNr)
				)
				{
					text += "- Deelname Brouwcursus<br>";
					errorCount++;
				}
			}

			if (document.forms["form1"]["Battle"].checked)
			{
				var battleNr = document.forms["form1"]["BattleNr"].value;

				if (
				validateString(battleNr)
				)
				{
					text += "- Inschrijving Studentenbattle<br>";
					errorCount++;
				}
			}

			var intakeAddress = document.forms["form1"]["IntakeAddress"].value;

			if (validateString(intakeAddress))
			{
				text += "- Inleveradres<br>";
				errorCount++;
			}

			if ((document.forms["form1"]["Conditions"].checked) == false)
			{
				text += "- Goedkeuring Wedstrijdreglement<br>";
				errorCount++;
			}

			if (errorCount > 0)
			{
				$("#freeow").freeow("Opgepast", "U hebt niet alle vereiste velden ingevuld. Gelieve de volgende onderdelen van de registratie te vervolledigen alvorens u verder kan gaan:<br><br>" + text, {
					classes: ["osx", "notice"],
					autoHide: false
				});
				return false;
				alert("false");
			}
			else{
				return true;
				alert("true");
			}
		}
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
	<!-- Ophalen van postcodes voor check -->
	
	<?php	
		include 'DAL.php';
																		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
	?>
	
</head>

<body style="zoom: 1;">
    <div id="wrap">
		<div id='head'><img src='Image/bg-header.jpg'></div>
		<div id="main">
		<!-- ng-app is angularJS, dit wordt gebruikt om onderaan bij het wedstrijdregelement automatisch de naam van de teamkapitein en de datum in te vullen. -->
			<div ng-app="">
				<div class="container_16">
					<div class="grid_16">
						<header>
							<img src="Image/logo-brouwland-biercompetitie-nl.png" alt="Brouwland Biercompetitie">
							<!-- zorgt voor de topboxes in de header van de pagina (facebook, twitter, youtube en talen) -->
							<div id="topbox">
								<div class="item">
									<a href="http://www.facebook.com/mijnbier" target="_blank">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x fa-inverse"></i>
											<i class="fa fa-facebook-square fa-stack-1x btn-facebook"></i>
										</span>
									</a>
								</div>
								<div class="item">
									<a href="https://twitter.com/MijnEigenBier" target="_blank">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x fa-inverse"></i>
											<i class="fa fa-twitter fa-stack-1x btn-twitter"></i>
										</span>
									</a>
								</div>
								<div class="item">
									<a href="http://www.youtube.com/bierbrouwen" target="_blank">
										<span class="fa-stack fa-lg">
											<i class="fa fa-circle fa-stack-2x fa-inverse"></i>
											<i class="fa fa-youtube fa-stack-1x btn-youtube"></i>
										</span>
									</a>
								</div>
								<div class="item">
									<a href="../fr/" class="language">FR</a>
								</div>
							</div>
						</header>
						<div class="clear"></div>

						<!-- Zorgt voor de navigatie op de pagina (gote groene balk) -->
						<div id="navigatie">
							<nav>
								<a id="menu-button" class="collapsed"></a>
								<ul id="main-menu" class="sm sm-clean collapsed">
									<li>
										<a href="http://www.mijnbier.be/nl/" class="">Home Biercompetitie</a>
									</li>
									<li>
										<a href="./Registratie.php" class="" >Deelnemen</a>
									</li>
									<li>
										<a href="./Login.php" class="">Login</a>
									</li>
									<li>
										<a href="./Account.php" class="">Account</a>
									</li>
									<li>
										<a class="has-submenu" aria-haspopup="false">Hulp nodig?
											<span class="sub-arrow"></span>
										</a>
										<ul class="sm-nowrap" style="display: none; width: auto; min-width: 14em; max-width: 24em; top: auto; left: auto; margin-left: 0px; margin-top: 0px;">
											<li>
												<a href="Handleidingen/HandleidingDeelnemers.pdf" target="_blank">Handleiding</a>
											</li>
											<li>
												<a href="mailto:info@mijnbier.be">Contact</a>
											</li>
										</ul>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="container_16">
					<BR>
					<!-- weergeven van alert-messages (freeow) -->
					<div id="freeow" name="freeow" class="freeow freeow-top-right"></div>
					<!-- uitleg over de biercompetitie -->
					<div class="grid_16">
						<h1>Deelnemen</h1>
					</div>
					<div class="clear"></div>
					<div class="grid_9 minimum-except">
						<h2>Deelnemen aan de Brouwland Biercompetitie doe je zo:</h2>
						<ul class="fa-ul wide">
							<li>
								<i class="fa-li fa fa-arrow-right"></i>
								Stel een team samen van 2 tot 8 volwassenen.
							</li>
							<li>
								<i class="fa-li fa fa-arrow-right"></i>
								Verzin een leuke naam voor jouw ploeg.
							</li>
							<li>
								<i class="fa-li fa fa-arrow-right"></i>Vul onderstaand
								<a href="#formulier">inschrijvingsformulier</a> in!
								De inschrijving is pas definitief wanneer de kapitein het inschrijvingsgeld van &euro; 50 overschrijft v&oacute;&oacute;r 22/02/2015.
							</li>
							<li>
								<i class="fa-li fa fa-arrow-right"></i>
								In de categorie 'Beste Studentenbier der Lage Landen' dienen deelnemers ook een kopie van de identiteits- en studentenkaart (van alle teamleden) te bezorgen aan de organisatie. Dit kan via onderstaand
								<a href="#formulier">inschrijvingsformulier</a> of via e-mail naar
								<span class="emailCloak">
									<a href="mailto:marketing@brouwland.com">marketing@brouwland.com</a>.
								</span>
							</li>
							<li>
								<i class="fa-li fa fa-arrow-right"></i>
								Word als teamkapitein lid van onze Facebookpagina
								<a href="http://www.facebook.com/mijnbier" target="_blank">'Brouwland BierCompetitie'</a>.
							</li>
							<li>
								<i class="fa-li fa fa-arrow-right"></i>
								<a href="http://www.mijnbier.be/downloads/Wedstrijdreglement-BBC2015-nl.pdf" target="_blank">Algemeen wedstrijdreglement</a> (pdf).
							</li>
						</ul>
						<h2>Krijg als studententeam al je brouwmateriaal gratis!</h2>
						<p>Brouwland geeft aan tien studententeams al het nodige materiaal <strong>gratis</strong> weg (ter waarde van &plusmn;&nbsp;600&nbsp;euro). Wil je als studententeam kans maken op zo&prime;n brouwpakket? Meld je dan bij je inschrijving aan voor onze studentenbattle.</p>
						<p>Tijdens deze battle moeten alle ingeschreven studententeams een aantal biergerelateerde (praktische) proeven afleggen. Denk bijvoorbeeld aan het omhoog houden van een gevulde bierbak, het lopen met een plateau met volle glazen of bowlen met bierkratten. De tien teams die de hoogste scores halen bij de opgestelde proeven gaan met de brouwpakketten naar huis. Iedereen winnaar! De studententeams die niet in de prijzen vallen tijdens de studentenbattle krijgen een Brouwland waardebon.</p>
						<p><i>Meer weten? <a href="http://www.mijnbier.be/nl/competitie-studentenbattle">Klik hier</a>.</i></p>
					</div>
					<!-- einde uitleg over de biercompetite -->

					<div class="grid_1 hide">&nbsp;</div>
					<div class="grid_6 minimum-except">
						<p></p>
							<figure>
								<img src="Image/pic-biercompetitie2.jpg" alt="Brouwland Biercompetitie" class="img-default">
							</figure>
						<p></p>
					</div>
					<div class="clear"></div>

					<form name="form1" action="RegistratieCode.php" method="POST" onsubmit="return validateForm()">
						<input type="HIDDEN" name="subject" value="Brouwland Biercompetitie - Inschrijvingsformulier nl">
						<input type="HIDDEN" name="header" value="Volgende gegevens werden verstuurd via het contactformulier op de website van Brouwland Biercompetitie:">

						<!-- algmene teaminformatie -->
						<div class="grid_16 minimum">
							<hr>
							<h1>
								<a name="formulier"></a>
								Inschrijven
							</h1>
							<br>
							<h2>Teamnaam</h2>
							<div class="form-item1">Teamnaam<span class="red">*</span></div>
							<div class="form-item2">
								<input name="Team" id="Team" type="text" class="required inputveld" maxlength="100" aria-required="true" onchange= "getTeams(this.value, this.name);">
							</div>
							<div class="clear"></div>
							<br>
							<h2>Categorie</h2>
							<p>We nemen deel aan de Brouwland Biercompetitie in de categorie:<span class="red">*</span></p>
							<input type="radio" name="CompetitionType" value="1" class="required" aria-required="true" >
							<b>Beste Hobbybier der Lage Landen</b> &nbsp;&nbsp;&nbsp;
							<input type="radio" name="CompetitionType" value="2" class="required" aria-required="true" >
							<b>Beste Studentenbier der Lage Landen</b>
							<div class="clear"></div>
							<br>
							<h2>Studentenkaart en identiteitskaart (enkel voor studententeams)</h2>
							<input name="file" type="file">
							<div class="clear"></div>
							<br>
							<div class="clear"></div>
							<br>
							<h2>Teamleden</h2>
							<div class="clear"></div>
							<br>
						</div>
						<!-- einde algmene teaminformatie -->

						<!-- teamkapitein -->
						<div class="grid_8 minimum">
							<!-- collapse systeem -->
							<div class="col-md-8">
								<div class="panel panel-default">
									<div class="panel-heading clickable">
										<h2 class="panel-title">Teamkapitein</h2>
										<span class="pull-right">
											<i class="glyphicon glyphicon-chevron-down"></i>
										</span>
									</div>
									<div class="panel-body" style="display: none;">
										<br>
										<div class="form-item1">Voornaam<span class="red">*</span></div>
										<div class="form-item2">
											<input name="Firstname" type="text" class="required inputveld" maxlength="100" ng-model="firstname" aria-required="true" >
										</div>
										<div class="clear"></div>
										<div class="form-item1">Naam<span class="red">*</span></div>
										<div class="form-item2">
											<input name="Lastname" type="text" class="required inputveld" maxlength="100" ng-model="lastname"aria-required="true" >
										</div>
										<div class="clear"></div>
										<div class="form-item1">Straat en nr.<span class="red">*</span></div>
										<div class="form-item2">
											<input name="Address" type="text" class="required inputveld" maxlength="100" aria-required="true" onchange="getAddress(this.value, this.name);">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Land<span class="red">*</span></div>
										<div class="form-item2">
											<select name="Country" id="Country" type="text" class="required inputveld" maxlength="100" aria-required="true">
												<option value=''>
													<a>
														<i>Kies uw land</i>.
													</a>
												</option>
												<?php
													$sql = "SELECT * FROM tbllanden";
													$result = mysqli_query($conn, $sql);

													while ($row = mysqli_fetch_array($result)) {
														echo "<option value='" . $row['LandID'] . "'>" . utf8_encode($row['Land']) .  "</option>";
													}
												?>
											</select>
										</div>
										<div class="clear"></div>
										<div class="form-item1">Postcode<span class="red">*</span></div>
										<div class="form-item2">
											<input name="Zip" id="Zip" type="text" class="required inputveldje" maxlength="10" aria-required="true">
										</div>
										<div class="clear"></div>
										<script type="text/javascript">
											/*Zorgt ervoor dat wanneer je de postcode hebt ingevuld de ddl met de overeenkomende gemeente wordt geladen*/
											var CountryInput = document.getElementById('Country');
											var CityInput = document.getElementById('Zip');
											
											function useValue() {
												var CityValue = CityInput.value;
												var CountryValue = CountryInput.value;
												var name = "City";

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

										<div class="form-item1">Gemeente<span class="red">*</span></div>
										<div id="div1-wrapper">
											<div id="CityRefresh" class="form-item2">
												<select name="City" id="City" type="text" class="required inputveld" maxlength="100" aria-required="true" >
													<option value='CityInput'>
														<a>
															<i>Vul eerst uw postcode in</i>.
														</a>
													</option>
												</select>
											</div>
										</div>
										<div class="clear"></div>
										<div class="form-item1">GSM<span class="red">*</span></div>
										<div class="form-item2">
											<input name="Phone" type="text" class="required inputveld" maxlength="100" aria-required="true" onchange="getPhone(this.value, this.name);">
										</div>
										<div class="clear"></div>
										<div class="form-item1">E-mail<span class="red">*</span></div>
										<div class="form-item2">
											<input name="Email" type="text" class="required  inputveld" maxlength="100" aria-required="true" onchange="getEmail(this.value, this.name);">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Geslacht<span class="red">*</span></div>
										<div class="form-item1">
											<input name="Gender" type="radio" class="required" value="M" aria-required="true" > Man &nbsp;
											<input name="Gender" type="radio" class="required" value="V" aria-required="true" > Vrouw
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- einde teamkapitein -->

						<!-- 2de teamlid (reservekapitein) -->
						<div class="grid_8 minimum">
							<div class="col-md-8">
								<div class="panel panel-default">
									<div class="panel-heading clickable">
										<h2 class="panel-title">Teamlid 2 (reservekapitein)</h2>
										<span class="pull-right">
											<i class="glyphicon glyphicon-chevron-down"></i>
										</span>
									</div>
									<div class="panel-body" style="display: none;">
										<br>
										<div class="form-item1">Voornaam<span class="red">*</span></div>
										<div class="form-item2">
											<input name="Firstname2" type="text" class="required inputveld" maxlength="100" aria-required="true" >
										</div>
										<div class="clear"></div>
										<div class="form-item1">Naam<span class="red">*</span></div>
										<div class="form-item2">
											<input name="Lastname2" type="text" class="required inputveld" maxlength="100" aria-required="true">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Straat en nr.<span class="red">*</span></div>
										<div class="form-item2">
											<input name="Address2" type="text" class="required inputveld" maxlength="100" aria-required="true" onchange="getAddress(this.value, this.name);">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Land<span class="red">*</span></div>
										<div class="form-item2">
											<select name="Country2" id="Country2" type="text" class="required inputveld" maxlength="100" aria-required="true">
												<option value='CityInput'>
													<a>
														<i>Kies uw land</i>.
													</a>
												</option>
												<?php
													$sql = "SELECT * FROM tbllanden";
													$result = mysqli_query($conn, $sql);

													while ($row = mysqli_fetch_array($result)) {
														echo "<option value='" . $row['LandID'] . "'>" . utf8_encode($row['Land']) .  "</option>";
													}
												?>
											</select>
										</div>
										<div class="clear"></div>
										<div class="form-item1">Postcode<span class="red">*</span></div>
										<div class="form-item2">
											<input name="Zip2" id="Zip2" type="text" class="required inputveldje" maxlength="10" aria-required="true">
										</div>
										<div class="clear"></div>
										<script type="text/javascript">
											/*Zorgt ervoor dat wanneer je de postcode hebt ingevuld de ddl met de overeenkomende gemeentes worden geladen*/
											var CountryInput2 = document.getElementById('Country2');
											var CityInput2 = document.getElementById('Zip2');
											function useValueSec() {
												var CityValue2 = CityInput2.value;
												var CountryValue2 = CountryInput2.value;
												var name2 = "City2";

												$("#CityRefresh1").load("City.php?city=" + CityValue2 + "&country=" + CountryValue2 + "&name=" + name2);


												if (CountryValue2 == "")
												{
													$("#freeow").freeow("Opgepast", "Gelieve ook uw land hierboven aan te duiden.", {
													classes: ["osx", "notice"],
													autoHide: false
													});	
												}
											}

											CityInput2.onchange = useValueSec;
											CountryInput2.onchange = useValueSec;
										</script>

										<div class="form-item1">Gemeente<span class="red">*</span></div>
										<div id="div2-wrapper">
											<div id="CityRefresh1" class="form-item2">
												<select name="City2" id="City" type="text" class="required inputveld" maxlength="100" aria-required="true" >
													<option value='CityInput'>
														<a>
															<i>Vul eerst uw postcode in</i>.
														</a>
													</option>
												</select>
											</div>
										</div>
										<div class="clear"></div>
										<div class="form-item1">GSM <span class="red">*</span></div>
										<div class="form-item2">
											<input name="Phone2" type="text" class="required inputveld" maxlength="100" aria-required="true" onchange="getPhone(this.value, this.name);">
										</div>
										<div class="clear"></div>
										<div class="form-item1">E-mail <span class="red">*</span></div>
										<div class="form-item2">
											<input name="Email2" type="text" class="required email inputveld" maxlength="100" aria-required="true" onchange="getEmail(this.value, this.name);">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Geslacht <span class="red">*</span></div>
										<div class="form-item1">
											<input name="Gender2" type="radio" class="required" value="M" aria-required="true" > Man &nbsp;
											<input name="Gender2" type="radio" class="required" value="V" aria-required="true" > Vrouw
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- einde 2de teamlid (reservekapitein) -->
						<div class="clear"></div>

						<!-- 3de teamlid -->
						<div class="grid_8 minimum">
							<div class="col-md-8">
								<div class="panel panel-default">
									<div class="panel-heading clickable">
										<h2 class="panel-title">Teamlid 3</h2>
										<span class="pull-right">
											<i class="glyphicon glyphicon-chevron-down"></i>
										</span>
									</div>
									<div class="panel-body" style="display: none;">
										<br>
										<div class="form-item1">Voornaam</div>
										<div class="form-item2">
											<input name="Firstname3" type="text" class="inputveld" maxlength="100">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Naam</div>
										<div class="form-item2">
											<input name="Lastname3" type="text" class="inputveld" maxlength="100">
										</div>
										<div class="clear"></div>
										<div class="form-item1">E-mail </div>
										<div class="form-item2">
											<input name="Email3" type="text" class="email inputveld" maxlength="100" onchange="getEmail(this.value, this.name);">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Geslacht</div>
										<div class="form-item1">
											<input name="Gender3" type="radio" class="" value="M"> Man &nbsp;
											<input name="Gender3" type="radio" class="" value="V"> Vrouw
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- einde 3de teamlid -->

						<!-- 4de teamlid -->
						<div class="grid_8 minimum">
							<div class="col-md-8">
								<div class="panel panel-default">
									<div class="panel-heading clickable">
										<h2 class="panel-title">Teamlid 4</h2>
										<span class="pull-right">
											<i class="glyphicon glyphicon-chevron-down"></i>
										</span>
									</div>
									<div class="panel-body" style="display: none;">
										<br>
										<div class="form-item1">Voornaam</div>
										<div class="form-item2">
											<input name="Firstname4" type="text" class="inputveld" maxlength="100">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Naam</div>
										<div class="form-item2">
											<input name="Lastname4" type="text" class="inputveld" maxlength="100">
										</div>
										<div class="clear"></div>
										<div class="form-item1">E-mail </div>
										<div class="form-item2">
											<input name="Email4" type="text" class="email inputveld" maxlength="100" onchange="getEmail(this.value, this.name);">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Geslacht</div>
										<div class="form-item1">
											<input name="Gender4" type="radio" class="" value="M"> Man &nbsp;
											<input name="Gender4" type="radio" class="" value="V"> Vrouw
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- einde 4de teamlid -->

						<div class="clear"></div>

						<!-- 5de teamlid -->
						<div class="grid_8 minimum">
							<div class="col-md-8">
								<div class="panel panel-default">
									<div class="panel-heading clickable">
										<h2 class="panel-title">Teamlid 5</h2>
										<span class="pull-right">
											<i class="glyphicon glyphicon-chevron-down"></i>
										</span>
									</div>
									<div class="panel-body" style="display: none;">
										<br>
										<div class="form-item1">Voornaam</div>
										<div class="form-item2">
											<input name="Firstname5" type="text" class="inputveld" maxlength="100">
									</div>
										<div class="clear"></div>
										<div class="form-item1">Naam</div>
										<div class="form-item2">
											<input name="Lastname5" type="text" class="inputveld" maxlength="100">
										</div>
										<div class="clear"></div>
										<div class="form-item1">E-mail </div>
										<div class="form-item2">
											<input name="Email5" type="text" class="email inputveld" maxlength="100" onchange="getEmail(this.value, this.name);">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Geslacht</div>
										<div class="form-item1">
											<input name="Gender5" type="radio" class="" value="M"> Man &nbsp;
											<input name="Gender5" type="radio" class="" value="V"> Vrouw
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- einde 5de teamlid -->

						<!-- 6de teamlid -->
						<div class="grid_8 minimum">
							<div class="col-md-8">
								<div class="panel panel-default">
									<div class="panel-heading clickable">
										<h2 class="panel-title">Teamlid 6</h2>
										<span class="pull-right"><i class="glyphicon glyphicon-chevron-down"></i></span>
									</div>
									<div class="panel-body" style="display: none;">
										<br>
										<div class="form-item1">Voornaam</div>
										<div class="form-item2">
											<input name="Firstname6" type="text" class="inputveld" maxlength="100">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Naam</div>
										<div class="form-item2">
											<input name="Lastname6" type="text" class="inputveld" maxlength="100">
										</div>
										<div class="clear"></div>
										<div class="form-item1">E-mail </div>
										<div class="form-item2">
											<input name="Email6" type="text" class="email inputveld" maxlength="100" onchange="getEmail(this.value, this.name);">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Geslacht</div>
										<div class="form-item1">
											<input name="Gender6" type="radio" class="" value="M"> Man &nbsp;
											<input name="Gender6" type="radio" class="" value="V"> Vrouw
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- einde 6de teamlid -->
						<div class="clear"></div>

						<!-- 7de teamlid -->
						<div class="grid_8 minimum">
							<div class="col-md-8">
								<div class="panel panel-default">
									<div class="panel-heading clickable">
										<h2 class="panel-title">Teamlid 7</h2>
										<span class="pull-right">
											<i class="glyphicon glyphicon-chevron-down"></i>
										</span>
									</div>
									<div class="panel-body" style="display: none;">
										<br>
										<div class="form-item1">Voornaam</div>
										<div class="form-item2">
											<input name="Firstname7" type="text" class="inputveld" maxlength="100">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Naam</div>
										<div class="form-item2">
											<input name="Lastname7" type="text" class="inputveld" maxlength="100">
										</div>
										<div class="clear"></div>
										<div class="form-item1">E-mail </div>
										<div class="form-item2">
											<input name="Email7" type="text" class="email inputveld" maxlength="100" onchange="getEmail(this.value, this.name);">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Geslacht</div>
										<div class="form-item1">
											<input name="Gender7" type="radio" class="" value="M"> Man &nbsp;
											<input name="Gender7" type="radio" class="" value="V"> Vrouw
										  </div>
									</div>
								</div>
							</div>
						</div>
						<!-- einde 7de teamlid -->

						<!-- 8ste teamlid -->
						<div class="grid_8 minimum">
							<div class="col-md-8">
								<div class="panel panel-default">
									<div class="panel-heading clickable">
										<h2 class="panel-title">Teamlid 8</h2>
										<span class="pull-right"><i class="glyphicon glyphicon-chevron-down"></i></span>
									</div>
									<div class="panel-body" style="display: none;">
										<br>
										<div class="form-item1">Voornaam</div>
										<div class="form-item2"><input name="Firstname8" type="text" class="inputveld" maxlength="100"></div>
										<div class="clear"></div>
										<div class="form-item1">Naam</div>
										<div class="form-item2">
											<input name="Lastname8" type="text" class="inputveld" maxlength="100">
										</div>
										<div class="clear"></div>
										<div class="form-item1">E-mail </div>
										<div class="form-item2">
											<input name="Email8" type="text" class="email inputveld" maxlength="100" onchange="getEmail(this.value, this.name);">
										</div>
										<div class="clear"></div>
										<div class="form-item1">Geslacht</div>
										<div class="form-item1">
											<input name="Gender8" type="radio" class="" value="M"> Man &nbsp;
											<input name="Gender8" type="radio" class="" value="V"> Vrouw
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- einde 8ste teamlid -->

						<div class="clear"></div>
						<br>
						<div class="grid_12 minimum">
							<!-- cursus -->
							<h2>Deelname brouwcursus</h2>
							<p></p>
							<div class="check">
								<input id="Training" type="checkbox" name="Training" value="True">
							</div>
							We willen deelnemen aan de gratis cursus 'Bier brouwen' op
							<select name="TrainingDate" class="inputveld" >
								<option value="">--- Keuze datum ---</option>
								<option value="10/02/2015 - Beverlo">Dinsdag 10/02/2015 (Nederlands) &ndash; Beverlo, Belgi&euml; (Brouwland Academy)</option>
								<option value="11/02/2015 - Beverlo">Woensdag 11/02/2015 (Frans) &ndash; Beverlo, Belgi&euml; (Brouwland Academy)</option>
								<option value="12/02/2015 - Utrecht">Donderdag 12/02/2015 (Nederlands) &ndash; Utrecht, Nederland (Domstad)</option>
							</select>
							<br>
							en zullen aanwezig zijn met
							<select id="TrainingNr" name="TrainingNr" class="inputveldje">
								<option value="">---</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
							personen (telkens van 19.00 u tot 21.00 u).
							<p></p>
							<div class="clear"></div>

							<!-- studentenbattle -->
							<h2>Inschrijving studentenbattle (enkel voor studententeams)</h2>
							<p></p>
							<div class="check"><input id="Battle" type="checkbox" name="Battle" value="True"></div>
							We willen deelnemen aan de studentenbattle op zaterdag 21/02/2015 in Beverlo en zullen aanwezig zijn met
							<select id="BattleNr" name="BattleNr" class="inputveldje">
								<option value="">---</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
							personen.
							<p></p>
							<div class="clear"></div>

							<!-- inleveradres bierbak -->
							<h2>Inleveradres</h2>
							<p>Wij leveren onze bierbak in op volgend adres

								<select id="Inleveradres" name="IntakeAddress" class="inputveld">
									<option value="">--- Keuze adres ---</option>
									<optgroup label="BELGI&Euml;"></optgroup>
									<optgroup label="Antwerpen">
										<option value="NatuurlijkeMolen">De Natuurlijke Molen (Schilde)</option>
										<option value="Bijenhuis">Het Bijenhuis (Ranst)</option>
										<option value="WeltersVerelst">Welters-Verelst Tuincentrum (Kessel)</option>
									</optgroup>
									<optgroup label="Limburg">
										<option value="Brouwland">Brouwland (Beverlo)</option>
									</optgroup>
									<optgroup label="Oost-Vlaanderen">
										<option value="Hopduvel">De Hopduvel BVBA (Gent)</option>
										<option value="Quintelier">Quintelier tuin &amp; hobby BVBA (Sint-Gillis)</option>
										<option value="DewolfClairy">AVEVE Dewolf Clairy (Brakel)</option>
										<option value="VlaamsZaadhuis">Het Vlaams Zaadhuis (Waarschoot)</option>
									</optgroup>
									<optgroup label="Vlaams-Brabant">
										<option value="StreekproductenCentrum">Streekproducten Centrum BVBA (Halle)</option>
										<option value="BoerkeBuelens">Boerke Buelens NV (Steenokkerzeel)</option>
										<option value="ThiryAndre">Thiry Andre (Leuven)</option>
										<option value="Mottebal">De Mottebal (Aarschot)</option>
										<option value="CoqShop">Coq Shop (Brussel)</option>
									</optgroup>
									<optgroup label="West-Vlaanderen">
										<option value="Igodt">Igodt BVBA (Vlamertinge)</option>
										<option value="MaakSmaak">Maak &amp; Smaak (Gistel)</option>
									</optgroup>
									<optgroup label="Waals-Brabant">
										<option value="MoulinBierges">Le moulin de bierges (Bierges)</option>
										<option value="RousseauLazard">Rousseau Lazard SPRI (Aveve) (Jodoigne)</option>
										<option value="CoqShop">Coq Shop (Brussel)</option>
									</optgroup>
									<optgroup label="Henegouwen">
										<option value="VanDyckLevant">Van Dyck Levant et filles SPRI (Baileux)</option>
										<option value="Centragro">Centragro SCRI (Frameries)</option>
										<option value="Houblonniere">La Houblonniere (Comines)</option>
										<option value="MrBricolage">Mr. Bricolage (Lessines)</option>
									</optgroup>
									<optgroup label="Luik">
										<option value="JardinerieAmbleve">Jardinerie de l'Ambl&egrave;ve (Aywaille)</option>
										<option value="VaillantWathelet">Vaillant Wathelet (Luik)</option>
										<option value="AmonTchiniss">Amon Tchiniss (Malmedy - Baugnez)</option>
										<option value="VerreriesDumont">Verreries Dumont SC (Fl&eacute;malle)</option>
										<option value="Stassen">Stassen Vin et Cie SPRI (Aubel)</option>
										<option value="MaisonDemez">Maison Demez (Thimister-Clermont)</option>
									</optgroup>
									<optgroup label="Luxemburg">
										<option value="EtsLaurantJeanPaul">Ets Laurant Jean Paul (Aarlen)</option>
										<option value="Agrivance">Agrivance SPRI (Vance)</option>
										<option value="HorticultureRinchard">Horticulture Rinchard SA (Marche-en-Famenne)</option>
										<option value="Tomega">Tomega SA (Marche-en-Famenne)</option>
										<option value="PtitBenefice">Au P'tit Benefice (Marbehan)</option>
									</optgroup>
									<optgroup label="Namen">
										<option value="JardihobbySPRI">Jardihobby SPRI (Ciney)</option>
										<option value="AveveMettet">Aveve Mettet (Mettet)</option>
										<option value="LeGorli">Le Gorli (Namen)</option>
										<option value="BaudrezPhilippe">BAUDREZ Philippe (Samart)</option>
									</optgroup>
									<optgroup label="NEDERLAND"></optgroup>
									<optgroup label="Drenthe">
										<option value="SannePaulBenting">Sanne Paul Benting Slijterij Wijnhandel (Coevorden)</option>
										<option value="UnicumFermentum">Unicum Fermentum (Hoogeveen)</option>
									</optgroup>
									<optgroup label="Friesland">
										<option value="Jubbega">Van der Kooy Jubbega (Jubbega)</option>
									</optgroup>
									<optgroup label="Gelderland">
										<option value="Burgbieren">Burgbieren (Ermelo)</option>
										<option value="Wijkgaard">Wijnmakerij De Wijkgaard (Meteren)</option>
									</optgroup>
									<optgroup label="Limburg">
										<option value="Jeuriens">Wijnboetiek Jeuriens (Roermond)</option>
										<option value="Sevenum">Wijn-, likeur- en bierspullen Sevenum (Sevenum)</option>
										<option value="Wijnmaker">De Wijnmaker (Wijnandsrade)</option>
									</optgroup>
									<optgroup label="Noord-Brabant">
										<option value="Huijbregts">Drankenhandel Huijbregts (Bergen op Zoom)</option>
										<option value="Servattumus">Bierbrouwerij Sint Servattumus (Schijndel)</option>
									</optgroup>
									<optgroup label="Noord-Holland">
										<option value="BonteBelevenis">Landgoed De Bonte Belevenis (Den Hoorn)</option>
									</optgroup>
									<optgroup label="Overijssel">
										<option value="Vitisvino">Vitisvino - Van Rein (Bentelo)</option>
									</optgroup>
									<optgroup label="Utrecht">
										<option value="Slamat">Drogisterij Slamat (Utrecht)</option>
									</optgroup>
									<optgroup label="Zuid-Holland">
										<option value="Papillon">Papillon (Delft)</option>
										<option value="Jojoli">Jojoli (Barendrecht)</option>
									</optgroup>
									<optgroup></optgroup>
								</select>
							</p>
							<div class="clear"></div>

							<!-- wedstrijdreglement -->
							<h2>Wedstrijdreglement</h2>
							<p>
								<a href="http://www.mijnbier.be/pdf/Wedstrijdreglement-BBC2015-nl.pdf" download="">Download hier het wedstrijdreglement.</a>
							</p>
							<div class="form-item1">Naam <span class="red">*</span></div>
							<div class="form-item2">
								<input name="Captain" value="{{firstname + ' ' + lastname}}" type="text" class="inputveld required" maxlength="100" aria-required="true" readonly>
							</div>
							<div class="clear"></div>
							<div class="form-item1">Datum</div>
							<div class="form-item2">
								<input name="Date" type="text" class="inputveld" value=<?php echo date("d/m/Y")?> readonly="">
							</div>
							<div class="clear"></div>
							<br>
							<div class="check">
								<input type="checkbox" name="Conditions" value="1" class="required" aria-required="true">
							</div>
							Ik, de teamkapitein, verklaar hierbij dat wij als team het <a href="http://www.mijnbier.be/pdf/Wedstrijdreglement-BBC2015-nl.pdf" target="_blank">algemene wedstrijdreglement</a> van de 'Brouwland Biercompetitie' hebben gelezen en hiermee akkoord gaan.<span class="red">*</span>

							<div class="clear"></div>
							<div class="clear"></div>
							<br>
							<span class="red">*</span>
							<i>Verplichte velden</i>
							<p>
								<input type="submit" value="Verzenden" name="Submit1" class="form-btn">
							</p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	 <div class="clear"></div>

	<!-- footer van de pagina -->
    <div id="footer">
		<div class="footer-box">
			<div class="item first">
				<a href="http://www.brouwland.com" target="_blank">
				<img src="Image/logo-brouwland.png" alt="Brouwland"></a>
			</div>
			<div class="item questions">
				<i class="fa fa-comments fa-2x btn-nolink"></i>
				Nog vragen?
				<p>Neem contact op via
					<span class="emailCloak">
						<a href="mailto:info@mijnbier.be">info@mijnbier.be</a>
					</span>
				</p>
			</div>
			<div class="item last">
				<a href="../fr/" class="language">
					<span class="fa-stack fa-lg">FR</span>
				</a>
				<a href="http://www.facebook.com/mijnbier" target="_blank">
					<span class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x fa-inverse"></i>
						<i class="fa fa-facebook-square fa-stack-1x btn-facebook"></i>
					</span>
				</a>
				<a href="https://twitter.com/MijnEigenBier" target="_blank">
					<span class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x fa-inverse"></i>
						<i class="fa fa-twitter fa-stack-1x btn-twitter"></i>
					</span>
				</a>
				<a href="http://www.youtube.com/bierbrouwen" target="_blank">
					<span class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x fa-inverse"></i>
						<i class="fa fa-youtube fa-stack-1x btn-youtube"></i>
					</span>
				</a>
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
