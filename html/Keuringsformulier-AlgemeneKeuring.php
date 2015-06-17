<?php 		
	session_start();
	include 'DAL.php';

	/*Als de session keurderid leeg is kan je niet in de voorkeuring geraken.
	Dit controleert of er een keurder is aangemeld, zo ja kan je keuren, zo nee word je geleid naar de login pagina. */
		
	if(empty($_SESSION['KeurderID']))
	{
		header('Location: http://193.191.187.253:8052/Login.php?session=false');
		exit;
	}

	include 'CheckOpenstellingKeuring.php';
?>

<html lang="nl">
<head>
	<meta charset="utf-8">
    <meta property="og:title" content="Brouwland Biercompetitie">
    <meta property="og:description" content="Maak kans op 500 liter van je eigen bier! Surf snel naar www.mijnbier.be en schrijf je in!">
    <meta property="og:image" content="http://www.mijnbier.be/facebook/img/avatar2-nl.jpg">
    <meta property="og:url" content="http://www.mijnbier.be/inscription/default.cshtml?nav=3&amp;lang=nl">
    <meta property="og:locale" content="nl_NL">

	<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.scrollTo-min.js"></script>
	<link rel="stylesheet" type="text/css" href="CSS/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="CSS/grid.css" media="screen">
    <link rel="stylesheet" type="text/css" href="CSS/nav.css" media="screen">
    <link rel="stylesheet" type="text/css" href="CSS/normalize.css" media="screen">
    <link rel="stylesheet" type="text/css" href="CSS/print.css" media="print"> 
    <link rel='stylesheet' href='CSS/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="CSS/Tile.css" media="screen">
        

	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
		
	<script src="VisueleAspecten-Keuring-PHP.php"></script>
	<script src="http://bootstrapdocs.com/v2.0.2/docs/assets/js/bootstrap-collapse.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="js/global.js" type="text/javascript"></script>	
    <script src="VisueleAspecten-Keuring-PHP.php"></script>	
	<script src="js/jquery.smartmenus.js" type="text/javascript"></script>
	<script src="js/nav.js" type="text/javascript"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.js" type="text/javascript"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js" type="text/javascript"></script>
    <script src="./Alert.php"></script>
		
	<!-- freeow -->
	<link rel="stylesheet" type="text/css" href="CSS/freeow/freeow.css" />		
	<script type="text/javascript" src="js/jquery.freeow.js"></script>
		
	<script type="text/javascript">

		$(document).ready(function(){
	
			//Click event to scroll to 'doordrinkbaarheid'
			$('.scrollToDoordrinkbaarheid').click(function(){
				$('html,body').animate({scrollTop:$('#doordrinkbaarheid').position().top}, 'slow');
				return false;
			});

			//Click event to scroll to 'balans'
			$('.scrollToBalans').click(function(){
				$('html,body').animate({scrollTop:$('#balans').position().top}, 'slow');
				return false;
			});		

			//Click event to scroll to 'basissmaak'
			$('.scrollToBasissmaak').click(function(){
				$('html, body').animate({scrollTop:$('#basissmaak').position().top}, 'slow');
				return false;
			});	

			//Click event to scroll to 'mondgevoel'
			$('.scrollToMondgevoel').click(function(){
				$('html, body').animate({scrollTop:$('#mondgevoel').position().top}, 'slow');
				return false;
			});	

			//Click event to scroll to 'nasmaak'
			$('.scrollToNasmaak').click(function(){
				$('html, body').animate({scrollTop:$('#nasmaak').position().top}, 'slow');
				return false;
			});	

			//Click event to scroll to 'creativiteit'
			$('.scrollToCreativiteit').click(function(){
				$('html, body').animate({scrollTop:$('#creativiteit').position().top}, 'slow');
				return false;
			});		

			//Click event to scroll to 'complexiteit'
			$('.scrollToComplexiteit').click(function(){
				$('html, body').animate({scrollTop:$('#complexiteit').position().top}, 'slow');
				return false;
			});	

			//Click event to scroll to 'voldoet aan type'
			$('.scrollToType').click(function(){
				$('html, body').animate({scrollTop:$('#voldoetAanType').position().top}, 'slow');
				return false;
			});										
		});

		//Variabelen aanmaken om subtotaal van dit keuringsonderdeel weer te geven.
		var doordrinkbaarheidInput = "";
		var balansInput = "";
		var basissmaakInput = "";
		var mondgevoelInput = "";
		var nasmaakInput = "";
		var creativiteitInput = "";
		var complexiteitInput = "";
		var typeInput = "";
		var subtotal = 0;

		//Functie dat de waarde van de tegels gaat ophalen bij de verschillende sub-keuringsonderdelen.
		function getRadioValue(id) {
				
			//doordrinkbaarheid
			switch(id){
				case "doordrinkbaarheid1":
					doordrinkbaarheidInput = 5;
					break;
				case "doordrinkbaarheid2":
					doordrinkbaarheidInput = 3;
					break;
				case "doordrinkbaarheid3":
					doordrinkbaarheidInput = 1;
					break;
				case "doordrinkbaarheid4":
					doordrinkbaarheidInput = 0;
					break;
			}

			//balans
			switch(id){
				case "balans1":
					balansInput = 5;
					break;
				case "balans2":
					balansInput = 3;
					break;
				case "balans3":
					balansInput = 1;
					break;
				case "balans4":
					balansInput = 0;
					break;
			}
				
			//creativiteit
			switch(id){
				case "creativiteit1":
					creativiteitInput = 5;
					break;
				case "creativiteit2":
					creativiteitInput = 3;
					break;
				case "creativiteit3":
					creativiteitInput = 1;
					break;
				case "creativiteit4":
					creativiteitInput = 0;
					break;
			}
			
			//complexiteit
			switch(id){
				case "complexiteit1":
					complexiteitInput = 5;
					break;
				case "complexiteit2":
					complexiteitInput = 3;
					break;
				case "complexiteit3":
					complexiteitInput = 1;
					break;
				case "complexiteit4":
					complexiteitInput = 0;
					break;
			}
			
			//type
			switch(id){
				case "type1":
					typeInput = 5;
					break;
				case "type2":
					typeInput = 3;
					break;
				case "type3":
					typeInput = 1;
					break;
				case "type4":
					typeInput = 0;
					break;
			}					
		}

		//Functie dat het uiteindelijke subtotaal van dit keuringsonderdeel gaat berekenen.
		function calculateSubtotal() {
			subtotal = parseInt(1*doordrinkbaarheidInput) + parseInt(1*balansInput) + parseInt(1*basissmaakInput) + parseInt(1*mondgevoelInput) + parseInt(1*nasmaakInput) + parseInt(1*creativiteitInput) + parseInt(1*complexiteitInput) + parseInt(1*typeInput);
		}

		//controleert dat er bij het onderdeel basismaak een getal is ingevuld tussen 0 en 5 en ook dat er geen letters of bewerkingen zijn ingevuld
		function getSmaak1(val){
			if(val < 0 || val > 5){
				$("#freeow").freeow("Opgepast", "Gelieve een getal in te geven tussen 0 en 5", {
					classes: ["osx", "notice"],
					autoHide: false
				});	
				document.getElementById("txtPuntenBasissmaak").value = "";
			}
			else{
				if(isNaN(val)){
					$("#freeow").freeow("Opgepast", "Gelieve een getal in te geven tussen 0 en 5", {
						classes: ["osx", "notice"],
						autoHide: false
					});	
					document.getElementById("txtPuntenBasissmaak").value = "";
				}
				else {
					basissmaakInput = val;
				}
			}
		}

		//controleert dat er bij het onderdeel mondgevoel een getal is ingevuld tussen 0 en 5 en ook dat er geen letters of bewerkingen zijn ingevuld
		function getSmaak2(val){
			if(val < 0 || val > 5){
 				$("#freeow").freeow("Opgepast", "Gelieve een getal in te geven tussen 0 en 5", {
					classes: ["osx", "notice"],
					autoHide: false
				});	
				document.getElementById("txtPuntenMondgevoel").value = "";
			}
			else{
				if(isNaN(val)){
					$("#freeow").freeow("Opgepast", "Gelieve een getal in te geven tussen 0 en 5", {
						classes: ["osx", "notice"],
						autoHide: false
					});	
					document.getElementById("txtPuntenMondgevoel").value = "";
				}
				else {
					mondgevoelInput = val;
				}
			}
		}

		//controleert dat er bij het onderdeel nasmaak een getal is ingevuld tussen 0 en 5 en ook dat er geen letters of bewerkingen zijn ingevuld
		function getSmaak3(val){
			if(val < 0 || val > 15){
 				$("#freeow").freeow("Opgepast", "Gelieve een getal in te geven tussen 0 en 15", {
					classes: ["osx", "notice"],
					autoHide: false
				});	
				document.getElementById("txtPuntenNasmaak").value = "";
			}
			else{
				if(isNaN(val)){
					$("#freeow").freeow("Opgepast", "Gelieve een getal in te geven tussen 0 en 15", {
						classes: ["osx", "notice"],
						autoHide: false
					});	
					document.getElementById("txtPuntenNasmaak").value = "";
				}
				else {
					nasmaakInput = val;
				}
			}
		}
			
		//controleert dat de verschillende onderdelen van de keuring zijn beoordeelt (punten aan zijn toegekend)
		function validateForm() {
			var text = "";
			var errorCount = 0;
			
			if (doordrinkbaarheidInput === null || doordrinkbaarheidInput === "") {
				errorCount += 1;
				text += "- Doordrinkbaarheid<br>";
			}
			if (balansInput === null || balansInput === "") {
				errorCount += 1;
				text += "- Balans<br>";
			}
			if (basissmaakInput === null || basissmaakInput === "") {
				errorCount += 1;
				text += "- Basissmaak<br>";
			}
			if (mondgevoelInput === null || mondgevoelInput === "") {
				errorCount += 1;
				text += "- Mondgevoel<br>";
			}
			if (nasmaakInput === null || nasmaakInput === "") {
				errorCount += 1;
				text += "- Nasmaak<br>";
			}
			if (creativiteitInput === null || creativiteitInput === "") {
				errorCount += 1;
				text += "- Creativiteit<br>";
			}
			if (complexiteitInput === null || complexiteitInput === "") {
				errorCount += 1;
				text += "- Complexiteit<br>";
			}
			if (typeInput === null || typeInput === "") {
				errorCount += 1;
				text += "- Type<br>";
			}
			
			//error message tonen
			if (errorCount > 0) {
				$("#freeow").freeow("Opgepast", "Gelieve nog punten toe te kennen voor de volgende keuringsonderdelen alvorens u verder gaat:<br><br>" + text, {
					classes: ["osx", "notice"],
					autoHide: false
				});	
				return false;
			}
			else{
				return true;
			}
		}
		
		//zorgt ervoor dat de functionaliteit van het back pijltje van de browser niet meer werkt
		window.history.forward();
	    function disableBack() 
		{
		 	window.history.forward();
		}
	</script> 
</head>

<!-- Header -->
<!-- Hier wordt de bg-header (zie style.css -> head) op de pagina geplaatst. -->

<div id='head'>
	<img src='Image/bg-header.jpg'>
</div>

<!-- Header -->

<body style="zoom: 1;" onload="disableBack();" onpageshow="if(event.persisted) disableBack();">
	<div id="wrap">
		<form action="AlgemeneKeuring.php" method="POST" onsubmit="return validateForm()">
			<div id="main">
				<div class="container_16">
					<div class="grid_16">
						<header>
							<img src="Image/logo-brouwland-biercompetitie-nl.png" alt="Brouwland Biercompetitie">  
							
							<!-- De "topboxes" bovenaan de pagina van Facebook, Twitter, Youtube en talen -->
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
									<a href="./Keuringsformulier-AlgemeneKeuring.php?taal=1" class="language">NL</a>
								</div>
								<div class="item">
									<a href="./Keuringsformulier-AlgemeneKeuring.php?taal=2" class="language">FR</a>
								</div>
								<div class="item">
									<a href="./Keuringsformulier-AlgemeneKeuring.php?taal=3" class="language">EN</a>
								</div>
							</div>
						</header>

						<div class="clear"></div>
						<!-- navigatiebalk bovenaan (grote groene balk) -->
						<div id="navigatie">
							<nav>
								<a id="menu-button" class="collapsed"></a>
								<ul id="main-menu" class="sm sm-clean collapsed">
									<li>
										<a href="http://www.mijnbier.be/nl/" class="">Home Biercompetitie</a>
									</li>
									<li>
										<a href="./Login.php" class="">Login</a>
									</li>
									<li>
										<a href="./Keuringsformulier-Home.php" class="has-submenu" aria-haspopup="true" class="current">Keuring
											<span class="sub-arrow"></span>
										</a>
										<ul class="sm-nowrap" style="display: none; width: auto; min-width: 14em; max-width: 24em; top: auto; left: auto; margin-left: 0px; margin-top: 0px;">
											<li>
												<a href="./Keuringsformulier-Home.php">Home</a>
											</li>
											<li>
												<a href="./Keuringsformulier-VisueleAspecten-Keuring.php">Visuele Aspecten</a>
											</li>
											<li>
												<a href="./Keuringsformulier-GeurSmaakAssociaties-Keuring.php">Geur- & Smaakassociaties</a>
											</li>
											<li>
												<a href="./Keuringsformulier-AlgemeneKeuring.php">Algemene Informatie</a>
											</li>
										</ul>
										<span class="scroll-up" style="top: auto; left: auto; margin-left: 1px; width: 183.890625px; z-index: 301; margin-top: -184px; display: none;">
											<span class="scroll-up-arrow"></span>
										</span>
										<span class="scroll-down" style="top: auto; left: auto; margin-left: 1px; width: 183.890625px; z-index: 301; margin-top: 184px; display: none;">
											<span class="scroll-down-arrow"></span>
										</span>
									</li>
									<li>
										<a class="has-submenu" aria-haspopup="false">Hulp nodig?
											<span class="sub-arrow"></span>
										</a>
										<ul class="sm-nowrap" style="display: none; width: auto; min-width: 14em; max-width: 24em; top: auto; left: auto; margin-left: 0px; margin-top: 0px;">
											<li>
												<a href="Handleidingen/HandleidingKeurders.pdf" target="_blank">Handleiding</a>
											</li>
											<li>
												<a href="mailto:info@mijnbier.be">Contact</a>
											</li>
										</ul>
									</li>
									<div style="float: right; size: 11px;">
										<li>
											<a href="logout.php">
												<span class="glyphicon glyphicon-log-out"></span> 
												Log out
											</a>
										</li>
									</div>
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<div class="clear"></div>
          
				<div class="container_16">
					<BR>
					<!-- Div voor alert-box weer te geven -->
					<div id="freeow" name="freeow" class="freeow freeow-top-right"></div>
					<form name="htmlform" method="POST" action="VisueleAspecten-Keuring-PHP.php">
					
						<div class="grid_16">
							<h1>Algemene informatie</h1>
						</div>
						<div class="clear"></div>
						
						<!-- onderdeel 'doordrinkbaarheid' -->
						<div id="doordrinkbaarheid"></div>
						<div class="grid_17 minimum-except">
							<?php 
								/* Zorgt voor de verschillende talen, standaard is het nederlands*/
								$TaalID = 1;
								 
								if(isset($_GET["taal"])){
									$TaalID = $_GET["taal"];
								}
								 
								/*De vragen ophalen uit de database in de gewenste taal*/
								$conn = mysqli_connect($servername, $username, $password, $dbname);
								$presentatie = "CALL SP_SelectVragenAK($TaalID)";
								$result = mysqli_query($conn, $presentatie);
								$vragen = array();

								while($row = mysqli_fetch_array($result)){
									$vragen[] = $row['Beschrijving'];
								}
							?>
							<br>
							<h2> <?php print_r(utf8_encode($vragen[0]));?></h2>
							<br>
							<kt1>Klik op de stelling dat van toepassing is op het bier, op vlak van doordrinkbaarheid.</kt1>
							<br>
							<kt1>Er is maar &eacute;&eacute;n stelling mogelijk.</kt1>
							<br><br>
							<?php 
								/*criteria ophalen uit de database in de gewenste taal*/
								$conn = mysqli_connect($servername, $username, $password, $dbname);
								$presentatie = "CALL SP_SelectDoordrinkbaarheid($TaalID)";
								$result = mysqli_query($conn, $presentatie);
								$doordrinkbaarheid = array();

								while($row = mysqli_fetch_array($result)){
									$doordrinkbaarheid[] = $row['Beschrijving'];
								}
							?>
							
							<!-- tiles -->
							<div class="grid_26 minimum-except">
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-green">
												<label>
													<input type="radio" name="doordrinkbaarheid" id="doordrinkbaarheid1" value="28" onclick="getRadioValue(this.id); getElementById('lblDoordrinkbaarheid').innerHTML=doordrinkbaarheidInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#10004;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($doordrinkbaarheid[1]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-orange">
												<label>
													<input type="radio" name="doordrinkbaarheid" id="doordrinkbaarheid2" value="29" onclick="getRadioValue(this.id); getElementById('lblDoordrinkbaarheid').innerHTML=doordrinkbaarheidInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#8767;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($doordrinkbaarheid[2]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-orange">
												<label>
													<input type="radio" name="doordrinkbaarheid" id="doordrinkbaarheid3" value="27" onclick="getRadioValue(this.id); getElementById('lblDoordrinkbaarheid').innerHTML=doordrinkbaarheidInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#8767;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($doordrinkbaarheid[0]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-red">
												<label>
													<input type="radio" name="doordrinkbaarheid" id="doordrinkbaarheid4" value="30" onclick="getRadioValue(this.id); getElementById('lblDoordrinkbaarheid').innerHTML=doordrinkbaarheidInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#10008;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($doordrinkbaarheid[3]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<br><br>
							</div>
						</div>
            
						<!-- Puntenverdeling -->
						<div class="grid_18 minimum-except">
							<br><br>
							<p></p>
							<b class="tile-blue">
								<br>
								<img src="Image/bier-blue-tile.png" alt="Brouwland Biercompetitie">
								<div class="grid_19 minimum-except">
									<table class="inlineTable" style="width: 190px; height: 50px;">
										<tr>
											<td>
												<bb1>Puntenverdeling</bb1>
											</td>
											<td></td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($doordrinkbaarheid[1]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 5 PUNTEN</bb2>
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($doordrinkbaarheid[2]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 3 PUNTEN</bb2>
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($doordrinkbaarheid[0]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 1 PUNT</bb2>
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($doordrinkbaarheid[3]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 0 PUNTEN</bb2>
											</td>
										</tr>
									</table>
								</div>
							</b>
							<p></p>
						</div>
						<div class="clear"></div>
						
						<!-- onderdeel 'balans' -->
						<div class="grid_17 minimum-except">
							<BR>
							<div id="balans"></div>
							<h2> <?php print_r(utf8_encode($vragen[1]));?></h2>
							<br>
							 <kt1>Klik op de stelling dat van toepassing is op het bier, op vlak van balans.</kt1>
							 <br>
							 <kt1>Er is maar &eacute;&eacute;n stelling mogelijk.</kt1>
							 <br><br>
             
							 <?php 
								/* criteria ophalen uit de database in de gewenste taal. */
								$conn = mysqli_connect($servername, $username, $password, $dbname);
								$presentatie = "CALL SP_SelectBalans($TaalID)";
								$result = mysqli_query($conn, $presentatie);
								$Balans = array();

								while($row = mysqli_fetch_array($result)){
									$Balans[] = $row['Beschrijving'];
								}
							?>
			
							<!-- tiles -->
							<div class="grid_26 minimum-except">
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-green">
												<label>
													<input type="radio" name="balans" value="32" id="balans1" onclick="getRadioValue(this.id); getElementById('lblBalans').innerHTML=balansInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
													<span>&#10004;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Balans[1]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-orange">
												<label>
													<input type="radio" name="balans" value="33" id="balans2" onclick="getRadioValue(this.id); getElementById('lblBalans').innerHTML=balansInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
													<span>&#8767;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Balans[2]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-orange">
												<label>
													<input type="radio" name="balans" value="31" id="balans3" onclick="getRadioValue(this.id); getElementById('lblBalans').innerHTML=balansInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
													<span>&#8767;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Balans[0]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-red">
												<label>
													<input type="radio" name="balans" value="34" id="balans4" onclick="getRadioValue(this.id); getElementById('lblBalans').innerHTML=balansInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
													<span>&#10008;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Balans[3]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>			
								<br><br>
							</div>
						</div>             
             
						<!-- puntenverdeling -->
						<div class="grid_18 minimum-except">
							<br><br>
							<p></p>
							<b class="tile-blue">
								<br>
								<img src="Image/bier-blue-tile.png" alt="Brouwland Biercompetitie">
								<div class="grid_19 minimum-except">
						
									<table class="inlineTable" style="width: 190px; height: 50px;">
										<tr>
											<td><bb1>Puntenverdeling</bb1></td>
											<td></td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Balans[1]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 5 PUNTEN</bb2>
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Balans[2]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 3 PUNTEN</bb2>
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Balans[0]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 1 PUNT</bb2>
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Balans[3]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 0 PUNTEN</bb2>
											</td>
										</tr>
									</table>
								</div>
							</b>
							<p></p>
						</div>
          
						<div class="clear"></div>
						
						<!-- onderdeel 'basissmaak' -->
						<div class="grid_17 minimum-except">
							<BR>
							<div id="basissmaak"></div>
							<h2> <?php print_r(utf8_encode($vragen[2]));?></h2>
							<br>
							<kt1>Duid aan of de smaken zwak, matig, sterk of niet van toepassing zijn.</kt1>
							<br>
							<kt1>Gelieve daarna een subtotaal in te vullen, gebaseerd op de keuze dat u hieronder maakt.</kt1>
							<br><br>
							<table id="myTable1">
								<?php
									/*criteria ophalen uit de database in de gewenste taal.*/
									$conn = mysqli_connect($servername, $username, $password, $dbname);
									$query = "CALL SP_SelectBasissmaakVragen($TaalID);";
									$sqlquery = mysqli_query($conn, $query);

									$conn = mysqli_connect($servername, $username, $password, $dbname);

									$query1 = "CALL SP_SelectCriteriaAK($TaalID)";
									$sqlquery1 = mysqli_query($conn, $query1);

									$array = array();
									$array1 = array();

									while ($row = mysqli_fetch_array($sqlquery1)) {
										$array[] = $row['Beschrijving'];
										$array1[] = $row['CriteriaID'];
									}
								 ?>
								<tr>
									<td>
										<label>
											<sa><span></span></sa>
										</label>
									</td>
									<td>
										<div id="tile-orange-header">
											<label>
												<sa>
													<span><?php print_r(mb_strtoupper(utf8_encode($vragen[2]), 'UTF-8'));?></span>
												</sa>
											</label>
										</div>    				
									</td>
									<?php
										/* Gaat een tabel automatisch vullen aan de hand van de gegevens in de database. 
										Wordt er een record in de database bijgevoegd, gaat de tabel automatisch groter worden.*/
										$i = 0;
										while ($row = mysqli_fetch_array($sqlquery)) {
											$class = ($i == 0) ? "" : "alt";
											echo "<tr class=\"".$class."\">";
											echo "<td style= \"text-align: right; vertical-align:middle; padding-right: 60px; \"><i><strong>".utf8_encode($row['Beschrijving'])." </strong></i></td>";
											echo "<td>";
											echo	"<div id=\"smaak\">";
											echo	"<select id=\"".utf8_encode($row['VraagID'])."G\" name=\"".utf8_encode($row['VraagID'])."\" class=\"inputveld\" style= \"margin-top: 10px\" >";
											echo		"<option value=\"\"  \"text-align: middle; \">----------- GEUR -----------</option>";
											echo			"<option value=" . utf8_encode($array1[3]) . ">" . utf8_encode($array[3]) . "</option>";
											echo			"<option value=" . utf8_encode($array1[0]) . ">" . utf8_encode($array[0]) . "</option>";
											echo			"<option value=" . utf8_encode($array1[1]) . ">" . utf8_encode($array[1]) . "</option>";
											echo			"<option value=" . utf8_encode($array1[2]) . ">" . utf8_encode($array[2]) . "</option>";		
											echo	"</select>";
											echo	"</div>";
											echo "</td>";
											echo "</tr>";
											$i = ($i==0) ? 1:0;
										}
									?>
								</tr>
								<tr>
									<td>
										<label>
											<sa><span></span></sa>
										</label>
									</td>
									<td>
										<div id="tile-orange-header-subtotal">
											<label>
												<sa>
													<span>SUBTOTAAL</span>
												</sa>
											</label>
										</div>    				
									</td>
								</tr>
								<tr>
									<td>
									</td>
									<td>
										<!-- plaats waar je de punten kan ingeven -->
										<form action="AlgemeneKeuring.php" method="POST">
											<div id="tile-orange-subtotal-Taste">
												<input style="margin-left: 3px;" type="text" name="txtPuntenBasissmaak" id="txtPuntenBasissmaak" onchange= "getSmaak1(this.value); getElementById('lblBasissmaak').innerHTML=basissmaakInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
											</div>
											<div id="tile-orange-subtotal-Taste-points">
												<label style="width:35px; height:72px; padding:25px 8px; font-size: 12px;">
													OP
												</label>
											</div>	
											<div id="tile-orange-subtotal-Taste-points">
												<label style="padding:23px 8px;">
													5
												</label>
											</div>	
										</form>			
									</td>
								</tr>
							</table>
						</div>             
     
						<div class="clear"></div>
              
						<!-- onderdeel 'mondgevoel' -->
						<div class="grid_17 minimum-except">
							<BR><BR>
							<div id="mondgevoel">
								<h2> <?php print_r(utf8_encode($vragen[3]));?></h2>
								<br>
								 <kt1>Duid aan of het mongevoel zwak, matig, sterk of niet van toepassing is.</kt1>
								 <br>
								 <kt1>Gelieve daarna een subtotaal in te vullen, gebaseerd op de keuze dat u hieronder maakt.</kt1>
								 <br><br>
								<div class="grid_26 minimum-except"></div>
								<table id="myTable2">
									<?php
										/*Criteria ophalen uit de database in de gewenste taal*/
										$conn = mysqli_connect($servername, $username, $password, $dbname);
										$query = "CALL SP_SelectMondgevoelVragen($TaalID);";
										$sqlquery = mysqli_query($conn, $query);

										$conn = mysqli_connect($servername, $username, $password, $dbname);

										$query1 = "CALL SP_SelectCriteriaAK($TaalID)";
										$sqlquery1 = mysqli_query($conn, $query1);

										$array = array();
										$array1 = array();

										while ($row = mysqli_fetch_array($sqlquery1)) {
											$array[] = $row['Beschrijving'];
											$array1[] = $row['CriteriaID'];
										}
									 ?>
									<tr>
										<td>
											<label>
												<sa><span></span></sa>
											</label>
										</td>
										<td>
											<div id="tile-orange-header">
												<label>
													<sa>
														<span><?php print_r(strtoupper($vragen[3]));?></span>
													</sa>
												</label>
											</div>    				
										</td>
										<?php
											/* Gaat een tabel automatisch vullen aan de hand van de gegevens in de database. 
												Wordt er een record in de database bijgevoegd, gaat de tabel automatisch groter worden.*/
											$i = 0;
											while ($row = mysqli_fetch_array($sqlquery)) {
												$class = ($i == 0) ? "" : "alt";
												echo "<tr class=\"".$class."\">";
												echo "<td style= \"text-align: right; vertical-align:middle; padding-right: 60px; \"><i><strong>".utf8_encode($row['Beschrijving'])." </strong></i></td>";
												echo "<td>";
												echo	"<div id=\"smaak\">";
												echo	"<select id=\"".utf8_encode($row['VraagID'])."\" name=\"".utf8_encode($row['VraagID'])."\" class=\"inputveld\" style= \"margin-top: 10px\" >";
												echo		"<option value=\"\"  \"text-align: middle; \">----------- GEUR -----------</option>";
												echo			"<option value=" . utf8_encode($array1[3]) . ">" . utf8_encode($array[3]) . "</option>";
												echo			"<option value=" . utf8_encode($array1[0]) . ">" . utf8_encode($array[0]) . "</option>";
												echo			"<option value=" . utf8_encode($array1[1]) . ">" . utf8_encode($array[1]) . "</option>";
												echo			"<option value=" . utf8_encode($array1[2]) . ">" . utf8_encode($array[2]) . "</option>";		
												echo	"</select>";
												echo	"</div>";
												echo "</td>";
												echo "</tr>";
												$i = ($i==0) ? 1:0;
											}
										?>
										</tr>
										<tr>
											<td>
												<label>
													<sa><span></span></sa>
												</label>
											</td>
											<td>
												<div id="tile-orange-header-subtotal">
													<label>
														<sa><span>SUBTOTAAL</span></sa>
													</label>
												</div>    				
											</td>
										</tr>
										<tr>
											<td>
											</td>
											<td>
												<!-- plaats waar je punten kunt ingeven -->
												<div id="tile-orange-subtotal-Taste">
													<input style="margin-left: 3px;" type="text" name="txtMondgevoel" id="txtPuntenMondgevoel" onchange= "getSmaak2(this.value); getElementById('lblMondgevoel').innerHTML=mondgevoelInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
												</div>
												<div id="tile-orange-subtotal-Taste-points">
													<label style="width:35px; height:72px; padding:25px 8px; font-size: 12px;">
														OP
													</label>
												 </div>	
												 <div id="tile-orange-subtotal-Taste-points">
													<label style="padding:23px 8px;">
														5
													</label>
												 </div>				
											</td>
										</tr>
								</table>					
							</div>
						</div>
             
						<div class="clear"></div>
						
						<!-- onderdeel 'nasmaak' -->
						<div class="grid_17 minimum-except">
							<BR><BR>
							<div id="nasmaak">
								<h2> <?php print_r(utf8_encode($vragen[4]));?></h2>
								<br>
								<kt1>Duid aan of de nasmaak zwak, matig, sterk of niet van toepassing is.</kt1>
								<br>
								<kt1>Gelieve daarna een subtotaal in te vullen, gebaseerd op de keuze dat u hieronder maakt.</kt1>
								<br><br>            
								<div class="grid_26 minimum-except"></div>		
								<table id="myTable3">
									<?php
										/*Criteria opvragen uit de database in de gewenste taal*/
										$conn = mysqli_connect($servername, $username, $password, $dbname);
										$query = "CALL SP_SelectNasmaakVragen($TaalID);";
										$sqlquery = mysqli_query($conn, $query);

										$conn = mysqli_connect($servername, $username, $password, $dbname);

										$query1 = "CALL SP_SelectCriteriaAK($TaalID)";
										$sqlquery1 = mysqli_query($conn, $query1);

										$array = array();
										$array1 = array();

										while ($row = mysqli_fetch_array($sqlquery1)) {
											$array[] = $row['Beschrijving'];
											$array1[] = $row['CriteriaID'];
										}
									 ?>
									<tr>
										<td>
											<label>
												<sa>
													<span></span>
												</sa>
											</label>
										</td>
										<td>
											<div id="tile-orange-header">
												<label>
													<sa>
														<span>SMAAK</span>
													</sa>
												</label>
											</div>    				
										</td>
										<?php
											/* Gaat een tabel automatisch vullen aan de hand van de gegevens in de database. 
												Wordt er een record in de database bijgevoegd, gaat de tabel automatisch groter worden.*/
											$i = 0;
											while ($row = mysqli_fetch_array($sqlquery)) {
												$class = ($i == 0) ? "" : "alt";
												echo "<tr class=\"".$class."\">";
												echo "<td style= \"text-align: right; vertical-align:middle; padding-right: 60px; \"><i><strong>".utf8_encode($row['Beschrijving'])." </strong></i></td>";
												echo "<td>";
												echo	"<div id=\"smaak\">";
												echo	"<select id=\"".utf8_encode($row['VraagID'])."\" name=\"".utf8_encode($row['VraagID'])."\" class=\"inputveld\" style= \"margin-top: 10px\" >";
												echo		"<option value=\"\"  \"text-align: middle; \">----------- GEUR -----------</option>";
												echo			"<option value=" . utf8_encode($array1[3]) . ">" . utf8_encode($array[3]) . "</option>";
												echo			"<option value=" . utf8_encode($array1[0]) . ">" . utf8_encode($array[0]) . "</option>";
												echo			"<option value=" . utf8_encode($array1[1]) . ">" . utf8_encode($array[1]) . "</option>";
												echo			"<option value=" . utf8_encode($array1[2]) . ">" . utf8_encode($array[2]) . "</option>";		
												echo	"</select>";
												echo	"</div>";
												echo "</td>";
												echo "</tr>";
												$i = ($i==0) ? 1:0;
											}
										?>
									</tr>
									<tr>
										<td>
											<label>
												<sa>
													<span></span>
												</sa>
											</label>
										</td>
										<td>
											<div id="tile-orange-header-subtotal">
												<label>
													<sa>
														<span>SUBTOTAAL</span>
													</sa>
												</label>
											</div>    				
										</td>
									</tr>
									<tr>
										<td>
										</td>
										<td>
											<!-- plaats waar je punten kunt ingeven -->
											<div id="tile-orange-subtotal-Taste">
												<input style="margin-left: 3px;" type="text" name="txtNasmaak" id="txtPuntenNasmaak" onchange= "getSmaak3(this.value); getElementById('lblNasmaak').innerHTML=nasmaakInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
											</div>
											<div id="tile-orange-subtotal-Taste-points">
												<label style="width:35px; height:72px; padding:25px 8px; font-size: 12px;">
													OP
												</label>
											 </div>	
											 <div id="tile-orange-subtotal-Taste-points">
												<label style="padding:23px 8px;">
													15
												</label>
											 </div>				
										</td>
									</tr>
								</table>	
							</div>
						</div>
             
						<div class="clear"></div>
						
						<!-- onderdeel 'creativiteit' -->
						<div id="creativiteit"></div>
						<div class="grid_17 minimum-except">
							<br>
							<h2> <?php print_r(utf8_encode($vragen[5]));?></h2>
							<br>
							<kt1>Klik op de stelling dat van toepassing is op het bier, op vlak van creativiteit.</kt1>
							<br>
							<kt1>Er is maar &eacute;&eacute;n stelling mogelijk.</kt1>								
							<br><br>
		
							<?php 
								/*Criteria opvragen uit de database in de gewenste taal*/
								$conn = mysqli_connect($servername, $username, $password, $dbname);
								$presentatie = "CALL SP_SelectCreativiteit($TaalID)";
								$result = mysqli_query($conn, $presentatie);
								$Creavititeit = array();

								while($row = mysqli_fetch_array($result)){
									$Creavititeit[] = $row['Beschrijving'];
								}
							?>
			
							<!-- tiles -->
							<div class="grid_26 minimum-except">
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-green">
												<label>
													<input type="radio" name="creativiteit" id="creativiteit1" value="135" onclick="getRadioValue(this.id); getElementById('lblCreativiteit').innerHTML=creativiteitInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#10004;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Creavititeit[1]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-orange">
												<label>
													<input type="radio" name="creativiteit" id="creativiteit2" value="136" onclick="getRadioValue(this.id); getElementById('lblCreativiteit').innerHTML=creativiteitInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#8767;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Creavititeit[2]), 'UTF-8'));?></</kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-orange">
												<label>
													<input type="radio" name="creativiteit" id="creativiteit3" value="134" onclick="getRadioValue(this.id); getElementById('lblCreativiteit').innerHTML=creativiteitInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#8767;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Creavititeit[0]), 'UTF-8'));?></</kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-red">
												<label>
													<input type="radio" name="creativiteit" id="creativiteit4" value="137" onclick="getRadioValue(this.id); getElementById('lblCreativiteit').innerHTML=creativiteitInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#10008;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Creavititeit[3]), 'UTF-8'));?></</kt1>
										</td>													
									</tr>
								</table>
								<br><br>
							</div>
						</div>
             
						<!-- Puntenverdeling -->
						<div class="grid_18 minimum-except">
							<br><br>
							<p></p>
							<b class="tile-blue">
								<br>
								<img src="Image/bier-blue-tile.png" alt="Brouwland Biercompetitie">									
								<div class="grid_19 minimum-except">
									<table class="inlineTable" style="width: 190px; height: 50px;">
										<tr>
											<td>
												<bb1>Puntenverdeling</bb1>
											</td>
											<td></td>
										</tr>
										<tr>												
											<td>
												<bb2><?php print_r(utf8_encode($Creavititeit[1]));?>::</bb2>
											</td>
											<td>
												<bb2>+ 5 PUNTEN</bb2>
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Creavititeit[2]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 3 PUNTEN</bb2>												
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Creavititeit[0]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 1 PUNT</bb2>
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Creavititeit[3]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 0 PUNTEN</bb2>
											</td>
										</tr>
									</table>
								</div>
							</b>
							<p></p>
						</div>
            
						<div class="clear"></div>
						
						<!-- onderdeel 'complexiteit' -->
      					<div id="complexiteit"></div>
						<div class="grid_17 minimum-except">
							<br>
							<h2> <?php print_r(utf8_encode($vragen[6]));?></h2>
							<br>
							<kt1>Klik op de stelling dat van toepassing is op het bier, op vlak van complexiteit.</kt1>
							<br>
							<kt1>Er is maar &eacute;&eacute;n stelling mogelijk.</kt1>
							<br><br>
		
							<?php 
								/*Criteria opvragen uit de database in de gewenste taal*/
								$conn = mysqli_connect($servername, $username, $password, $dbname);
								$presentatie = "CALL SP_SelectComplexiteit($TaalID)";
								$result = mysqli_query($conn, $presentatie);
								$Complexiteit = array();
									
								while($row = mysqli_fetch_array($result)){
									$Complexiteit[] = $row['Beschrijving'];
								}
							?>
			
							<!-- tiles -->
							<div class="grid_26 minimum-except">
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-green">
												<label>
													<input type="radio" name="complexiteit" id="complexiteit1" value="139" onclick="getRadioValue(this.id); getElementById('lblComplexiteit').innerHTML=complexiteitInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#10004;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Complexiteit[1]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-orange">
												<label>
													<input type="radio" name="complexiteit" id="complexiteit2" value="140" onclick="getRadioValue(this.id); getElementById('lblComplexiteit').innerHTML=complexiteitInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#8767;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Complexiteit[2]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-orange">
												<label>
													<input type="radio" name="complexiteit" id="complexiteit3" value="138" onclick="getRadioValue(this.id); getElementById('lblComplexiteit').innerHTML=complexiteitInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#8767;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Complexiteit[0]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-red">
												<label>
													<input type="radio" name="complexiteit" id="complexiteit4" value="141" onclick="getRadioValue(this.id); getElementById('lblComplexiteit').innerHTML=complexiteitInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#10008;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Complexiteit[3]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<br><br>
							</div>
						</div>
             
						<!-- puntenverdeling -->
						<div class="grid_18 minimum-except">
							<br><br>
							<p></p>
							<b class="tile-blue">
								<br>
								<img src="Image/bier-blue-tile.png" alt="Brouwland Biercompetitie">
								<div class="grid_19 minimum-except">
									<table class="inlineTable" style="width: 190px; height: 50px;">
										<tr>
											<td>
												<bb1>Puntenverdeling</bb1>
											</td>
											<td></td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Complexiteit[1]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 5 PUNTEN</bb2>
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Complexiteit[2]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 3 PUNTEN</bb2>
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Complexiteit[0]));?>:</bb2>
											</td>
											<td>	
												<bb2>+ 1 PUNT</bb2>
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Complexiteit[3]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 0 PUNTEN</bb2>
											</td>
										</tr>
									</table>									
								</div>
							</b>
							<p></p>
						</div>
				
						<div class="clear"></div>
            
						<!-- onderdeel 'VoldoetAanType' -->
						<div id="voldoetAanType"></div>
						<div class="grid_17 minimum-except">
							<br>
							<h2> <?php print_r(utf8_encode($vragen[7]));?></h2>
							<br>
							<kt1>Klik op de stelling dat van toepassing is op het bier, op vlak van voldoet het bier aan het opgegeven type.</kt1>
							<br>
							<kt1>Er is maar &eacute;&eacute;n stelling mogelijk.</kt1>
							<br><br>
							<?php 
								/*Criteria ophalen uit database in de gewenste taal*/
								$conn = mysqli_connect($servername, $username, $password, $dbname);
								$presentatie = "CALL SP_SelectType($TaalID)";
								$result = mysqli_query($conn, $presentatie);
								$Type = array();
									while($row = mysqli_fetch_array($result)){
									$Type[] = $row['Beschrijving'];
								}
							?>
							
							<!-- tiles -->
							<div class="grid_26 minimum-except">
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-green">
												<label>
													<input type="radio" name="voldoetAanType" id="type1" value="143" onclick="getRadioValue(this.id); getElementById('lblType').innerHTML=typeInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#10004;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Type[1]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-orange">
												<label>
													<input type="radio" name="voldoetAanType" id="type2" value="144" onclick="getRadioValue(this.id); getElementById('lblType').innerHTML=typeInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#8767;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Type[2]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-orange">
												<label>
													<input type="radio" name="voldoetAanType" id="type3" value="142" onclick="getRadioValue(this.id); getElementById('lblType').innerHTML=typeInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#8767;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Type[0]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<table class="inlineTable">
									<tr>
										<td>
											<div id="rd-button-red">
												<label>
													<input type="radio" name="voldoetAanType" id="type4" value="145" onclick="getRadioValue(this.id); getElementById('lblType').innerHTML=typeInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
													<span>&#10008;</span>
												</label>
											</div>
										</td>													  
									</tr>
									<tr>
										<td>
											<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($Type[3]), 'UTF-8'));?></kt1>
										</td>													
									</tr>
								</table>
								<br><br>
							</div>
						</div>
             
						<!-- puntenverdeling -->
						<div class="grid_18 minimum-except">
							<br><br>
							<p></p>
							<b class="tile-blue">
								<br>
								<img src="Image/bier-blue-tile.png" alt="Brouwland Biercompetitie">
								<div class="grid_19 minimum-except">					
									<table class="inlineTable" style="width: 190px; height: 50px;">
										<tr>
											<td>
												<bb1>Puntenverdeling</bb1>
											</td>
											<td></td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Type[1]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 5 PUNTEN</bb2>
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Type[2]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 3 PUNTEN</bb2>
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Type[0]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 1 PUNT</bb2>
											</td>
										</tr>
										<tr>
											<td>
												<bb2><?php print_r(utf8_encode($Type[3]));?>:</bb2>
											</td>
											<td>
												<bb2>+ 0 PUNTEN</bb2>
											</td>
										</tr>
									</table>						
								</div>
							</b>
							<p></p>
						</div>
           
						<div class="clear"></div>
						
						<!-- subtotaal -->
						<div class="grid_17 minimum-except">
							<BR><BR>
							<h2> Subtotaal</h2>
							<br>
							<kt1>Hieronder kan u het subtotaal vinden van de door u gegeven punten voor het keuringsonderdeel 'Algemene informatie'.</kt1>
							<br>
							<kt1>U kan de punten nog altijd wijzigen, het subtotaal wordt automatisch aangepast.</kt1>
							<br><br>	
							<div class="grid_25 minimum-except">
								<table style="width: 585px;">
									<tr>
										<td>
											<div class="grid_21 minimum-except">             
												<div id="tile-orange-subtotal-category">
													<label style="width:170px; height:45px">
														<sa href="#" class="scrollToDoordrinkbaarheid">
															<span><?php print_r(utf8_encode($vragen[0]));?></span>
														</sa>
													</label>
												</div>			 
												<div id="tile-orange-subtotal-category">
													<label style="width:170px; height:45px">
														<sa href="#" class="scrollToBalans">
															<span><?php print_r(utf8_encode($vragen[1]));?></span>
														</sa>
													</label>
												</div>
												<div id="tile-orange-subtotal-category">
													<label style="width:170px; height:45px">
														<sa href="#" class="scrollToBasissmaak">
															<span><?php print_r(utf8_encode($vragen[2]));?></span>
														</sa>
													</label>
												</div>
												<div id="tile-orange-subtotal-category">
													<label style="width:170px; height:45px">
														<sa href="#" class="scrollToMondgevoel">
															<span><?php print_r(utf8_encode($vragen[3]));?></span>
														</sa>
													</label>
												</div>
												<div id="tile-orange-subtotal-category">
													<label style="width:170px; height:45px">
														<sa href="#" class="scrollToNasmaak">
															<span><?php print_r(utf8_encode($vragen[4]));?></span>
														</sa>
													</label>
												</div>			 
												<div id="tile-orange-subtotal-category">
													<label style="width:170px; height:45px">
														<sa href="#" class="scrollToCreativiteit">
															<span><?php print_r(utf8_encode($vragen[5]));?></span>
														</sa>
													</label>
												</div>
												<div id="tile-orange-subtotal-category">
													<label style="width:170px; height:45px">
														<sa href="#" class="scrollToComplexiteit">
															<span><?php print_r(utf8_encode($vragen[6]));?></span>
														</sa>
													</label>
												</div>			 
												<div id="tile-orange-subtotal-category">
													<label style="width:170px; height:45px">
														<sa href="#" class="scrollToType">
															<span><?php print_r(utf8_encode($vragen[7]));?></span>
														</sa>
													</label>
												</div>			 
											</div>
										</td>
										<td>
											<div class="grid_22 minimum-except">
												<div id="tile-orange-subtotal-categoryp">
													<label style="height:45px; padding:7px 2px">
														<span>
															<label id="lblDoordrinkbaarheid">0</label>
														</span>
													</label>
												</div>		 
												<div id="tile-orange-subtotal-categoryp">
													<label style="height:45px; padding:7px 2px">
														<span>
															<label id="lblBalans">0</label>
														</span>
													</label>
												</div>
												<div id="tile-orange-subtotal-categoryp">
													<label style="height:45px; padding:7px 2px">
														<span>
															<label id="lblBasissmaak">0</label>
														</span>
													</label>
												</div>
												<div id="tile-orange-subtotal-categoryp">
													<label style="height:45px; padding:7px 2px">
														<span>
															<label id="lblMondgevoel">0</label>
														</span>
													</label>
												</div>			 
												<div id="tile-orange-subtotal-categoryp">
													<label style="height:45px; padding:7px 2px">
														<span>
															<label id="lblNasmaak">0</label>
														</span>
													</label>
												</div>			 
												<div id="tile-orange-subtotal-categoryp">
													<label style="height:45px; padding:7px 2px">
														<span>
															<label id="lblCreativiteit">0</label>
														</span>
													</label>
												</div>			 
												<div id="tile-orange-subtotal-categoryp">
													<label style="height:45px; padding:7px 2px">
														<span>
															<label id="lblComplexiteit">0</label>
														</span>
													</label>
												</div>	 
												<div id="tile-orange-subtotal-categoryp">
													<label style="height:45px; padding:7px 2px">
														<span>
															<label id="lblType">0</label>
														</span>
													</label>
												</div>
											</div>
										</td>
										<td>
											<div class="grid_21 minimum-except">
												<div id="tile-orange-subtotal-total" style="height:456px">
													<label style="padding:150px 5px">
														<span>
															<label id="totaal">0</label>
														</span> 
													</label>
												</div>
											</div>
										</td>
										<td> 		
											<div class="grid_23 minimum-except">
												<div id="tile-orange-subtotal-total-text" style="height:456px">
													<label style="padding:150px 1px">
														<span>OP</span> 
													</label>
												</div>
											</div>
										</td>
										<td>
											<div class="grid_21 minimum-except">
												<div id="tile-orange-subtotal-total" style="height:456px">
													<label style="padding:150px 5px">
														<span>50</span> 
													</label>
												</div>
											 </div>
										</td>
									</tr>
								</table>
							</div>
						</div>
          
						<div class="grid_17 minimum-except">
							<br>
							<kt1>
								<strong>Klik op volgende als u het subtotaal hebt nagekeken en goedgekeurd.</strong>
							</kt1>
						</div>
						<div class="clear"></div>
						<br><br><br><br>           
						<div class="grid_24 minimum-except">							
							<button type="submit" class="next-btn" name="b1" >
								Volgende<span class="glyphicon glyphicon-chevron-right"></span>
							</button>
						</div>
						<br><br><br><br>
					</form>
				</div>
			</div>
			<div class="clear"></div>
	 
			<div id="footer">
				<div class="footer-box">
					<div class="item first">
						<a href="http://www.brouwland.com" target="_blank">
							<img src="Image/logo-brouwland.png" alt="Brouwland">
						</a>
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
						<a href="./Keuringsformulier-AlgemeneKeuring.php?taal=3" class="language">EN</a>
						<a href="./Keuringsformulier-AlgemeneKeuring.php?taal=2" class="language">FR</a>
						<a href="./Keuringsformulier-AlgemeneKeuring.php?taal=1" class="language">NL</a>
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

