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
		
	<!-- freeow -->
	<link rel="stylesheet" type="text/css" href="CSS/freeow/freeow.css" />		
	<script type="text/javascript" src="js/jquery.freeow.js"></script>		
		
	<script type="text/javascript">

		$(document).ready(function(){
			//Click event to scroll to 'Presentatie'
			$('.scrollToPresentatie').click(function(){
				$('html,body').animate({scrollTop:$('#presentatie').position().top}, 'slow');
				return false;
			});

			//Click event to scroll to 'Koolzuur'
			$('.scrollToKoolzuur').click(function(){
				$('html,body').animate({scrollTop:$('#koolzuur').position().top}, 'slow');
				return false;
			});		

			//Click event to scroll to 'Helderheid'
			$('.scrollToHelderheid').click(function(){
				$('html, body').animate({scrollTop:$('#helderheid').position().top}, 'slow');
				return false;
			});	

			//Click event to scroll to 'Schuimkraag'
			$('.scrollToSchuimkraag').click(function(){
				$('html, body').animate({scrollTop:$('#schuimkraag').position().top}, 'slow');
				return false;
			});											
		});

		//zorgt ervoor dat de functionaliteit van het back pijltje van de browser niet meer werkt	
		window.history.forward();
		function disableBack() 
		{
		 	window.history.forward();
		}

		//Variabelen aanmaken om subtotaal van dit keuringsonderdeel weer te geven.
		var presentatieInput = "";
		var koolzuurInput = "";
		var helderheidInput = "";
		var schuimkraagInput = "";
		var goed = 0;
		var pres2 = 0;
		var pres3 = 0;
		var pres= 0;
		var subtotal = 0;

		//Functie dat de waarde van de tegels gaat ophalen bij de verschillende sub-keuringsonderdelen.
		function getRadioValue(id) {
			
			//presentatie
			if(id == "presentatie1" || id == "presentatie2" || id == "presentatie3"  || id == "presentatie4" ){
				presentatieInput = 3;
			}
				
			if(id == "presentatie1"){
				presentatieInput;
			} 
			
			if(id == "presentatie2"){
				if(document.getElementById("presentatie2").checked == true){
					presentatieInput -= 1;
				}
				else{
					presentatieInput += 1;
				}
			}
			
			if(id == "presentatie3"){
				if(document.getElementById("presentatie3").checked == true){
					presentatieInput -= 1;
				}
				else{
					presentatieInput += 1;
				}
			}
			
			if(id == "presentatie4"){
				if(document.getElementById("presentatie4").checked == true){
					presentatieInput -= 1;
				}
				else{
					presentatieInput += 1;
				}
			}

			//koolzuur
			switch(id){
				case "koolzuur1":
					koolzuurInput = 0;
					break;
				case "koolzuur2":
					koolzuurInput = 1;
					break;
				case "koolzuur3":
					koolzuurInput = 2;
					break;
				case "koolzuur4":
					koolzuurInput = 1;
					break;
				case "koolzuur5":
					koolzuurInput = 0;
					break;
			}
				
			//helderheid
			switch(id){
				case "helderheid1":
					helderheidInput = 0;
					break;
				case "helderheid2":
					helderheidInput = 2;
					break;
			}
				
			//schuimkraag
			switch(id){
				case "schuimkraag1":
					schuimkraagInput = 3;
					break;
				case "schuimkraag2":
					schuimkraagInput = 2;
					break;
				case "schuimkraag3":
					schuimkraagInput = 1;
					break;
				case "schuimkraag4":
					schuimkraagInput = 0;
					break;
				case "schuimkraag5":
					schuimkraagInput = 0;
					break;
			}								
		}

			//Functie dat het uiteindelijke subtotaal van dit keuringsonderdeel gaat berekenen.
			function calculateSubtotal() {
				subtotal = parseInt(1*presentatieInput) + parseInt(1*koolzuurInput) + parseInt(1*helderheidInput) + parseInt(1*schuimkraagInput);
			}
			
			//Functie dat controleert dat de keuringsonderdelen beoordeelt zijn.
			function validateForm() {
				var text = "";
				var errorCount = 0;
				
				if (presentatieInput === null || presentatieInput === "") {
					errorCount += 1;
					text += "- Presentatie<br>";
				}
				if (koolzuurInput === null || koolzuurInput === "") {
					errorCount += 1;
					text += "- Koolzuur<br>";
				}
				if (helderheidInput === null || helderheidInput === "") {
					errorCount += 1;
					text += "- Helderheid<br>";
				}
				if (schuimkraagInput === null || schuimkraagInput === "") {
					errorCount += 1;
					text += "- Schuimkraag<br>";
				}
				
				//Geeft de error message weer
				if (errorCount > 0) {
					$("#freeow").freeow("Opgepast", "Gelieve de volgende keuringsonderdelen aan te vullen, alvorens u verder gaat:<br><br>" + text, {
						classes: ["osx", "notice"],
						autoHide: false
					});
					return false;
				}
				else{
					return true;
				}
			}
	</script>  
				
</head>

<!-- Header -->
<!-- Hier wordt de bg-header (zie style.css -> head) op de pagina geplaatst. -->

<div id='head'><img src='Image/bg-header.jpg'></div>

<!-- Header -->

<body style="zoom: 1;" onload="disableBack();" onpageshow="if(event.persisted) disableBack();">
<form action="VisueleAspecten-Keuring-PHP.php" method="POST" onsubmit="return validateForm()">
    <div id="wrap">   
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
								<a href="./Keuringsformulier-VisueleAspecten-Keuring.php?taal=1" class="language">NL</a>
							</div>
							<div class="item">
								<a href="./Keuringsformulier-VisueleAspecten-Keuring.php?taal=2" class="language">FR</a>
							</div>
							<div class="item">
								<a href="./Keuringsformulier-VisueleAspecten-Keuring.php?taal=3" class="language">EN</a>
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
									<a href="#" class="has-submenu" aria-haspopup="true">
										Hulp nodig?
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
				
				<!-- form zorgt ervoor dat de php code van de visuele aspecten kan aangeroepen worden -->
				<form name="htmlform" method="POST" action="VisueleAspecten-Keuring-PHP.php">
					<div class="grid_16">
						<h1>Visuele aspecten</h1>
					</div>
				  
					<div class="clear"></div>

					<!-- Keuringsonderdeel 'Presentatie' -->
					<div id="presentatie"></div>
					<div class="grid_17 minimum-except">
				 
						<?php 
							/* Zorgt voor de verschillende talen, standaard is het nederlands*/
							$TaalID = 1;
							 
							if(isset($_GET["taal"])){
								$TaalID = $_GET["taal"];
							}
						 
							/* Oproepen van omschrijvingen in de gevraagde taal. */
							//connectie met de database
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							//oproepen van stored procedure
							$presentatie = "CALL SP_selectVragenVA($TaalID)";
							$result = mysqli_query($conn, $presentatie);
							$vragen = array();

							while($row = mysqli_fetch_array($result)){
								$vragen[] = $row['beschrijving'];
							}
						?>
						<br>
						<h2> <?php print_r(utf8_encode($vragen[0]));?></h2>
						<br>
						<kt1>Klik op de stelling dat van toepassing is op het bier, op vlak van presentatie.</kt1>
						<br>
						<kt1>Meerdere stellingen zijn mogelijk.</kt1>
						<br><br>
					
						<?php 
							/*Oproepen van de criteria's in de gewenste taal*/
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$presentatie = "CALL SP_SelectPresentatie($TaalID)";
							$result = mysqli_query($conn, $presentatie);
							$rows = array();

							while($row = mysqli_fetch_array($result)){
								$rows[] = $row['Beschrijving'];
							}										
						?>
					
						<!-- tiles -->
						<div class="grid_26 minimum-except">
							<table class="inlineTable">
								<tr>
									<td>
										<div id="ck-button-green">
											<label>
												<input type="checkbox" name="presentatie1" id="presentatie1" value="3" onclick="getRadioValue(this.id); getElementById('lblPresentatie').innerHTML=presentatieInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
												<span>&#10004;</span>
											</label>
										</div>
									</td>													  
								</tr>
								<tr>
									<td>
										<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[0]), 'UTF-8'));?></kt1>
									</td>													
								</tr>
							</table>
							<table class="inlineTable">
								<tr>
									<td>
										<div id="ck-button-red">
											<label>
												<input type="checkbox" name="presentatie2" id="presentatie2" value="-1" onclick="getRadioValue(this.id); getElementById('lblPresentatie').innerHTML=presentatieInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
												<span>&#10008;</span>
											</label>
										</div>
									</td>													  
								</tr>
								<tr>
									<td>
										<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[1]), 'UTF-8'));?></kt1>
									</td>													
								</tr>
							</table>
							<table class="inlineTable">
								<tr>
									<td>
										<div id="ck-button-red">
											<label>
												<input type="checkbox" name="presentatie3" id="presentatie3" value="-1" onclick="getRadioValue(this.id); getElementById('lblPresentatie').innerHTML=presentatieInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
												<span>&#10008;</span>
											</label>
										</div>
									</td>													  
								</tr>
								<tr>
									<td>
										<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[2]), 'UTF-8'));?></kt1>
									</td>													
								</tr>
							</table>
							<table class="inlineTable">
								<tr>
									<td>
										<div id="ck-button-red">
											<label>
												<input type="checkbox" name="presentatie4" id="presentatie4" value="-1" onclick="getRadioValue(this.id); getElementById('lblPresentatie').innerHTML=presentatieInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
												<span>&#10008;</span>
											</label>
										</div>
									</td>													  
								</tr>
								<tr>
									<td>
										<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[3]), 'UTF-8'));?></kt1>
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
						<b class="tile-blue" style="height:140px">
							<br>
							<img src="Image/bier-blue-tile.png" alt="Brouwland Biercompetitie">
							<div class="grid_19 minimum-except">
							
								<table class="inlineTable" style="width: 190px">
									<tr>
										<td><bb1>Puntenverdeling</bb1></td>
										<td></td>
									</tr>
									<tr>
										<td><bb2><?php print_r(utf8_encode($rows[0]));?>:</bb2></td>
										<td><bb2>+ 3 PUNTEN</bb2></td>
									</tr>
									<tr>
										<td><bb2><?php print_r(utf8_encode($rows[1]));?>:</bb2></td>
										<td><bb2>- 1 PUNT</bb2></td>
									</tr>
									<tr>
										<td><bb2><?php print_r(utf8_encode($rows[2]));?>:</bb2></td>
										<td><bb2>- 1 PUNT</bb2></td>
									</tr>
									<tr>
										<td><bb2><?php print_r(utf8_encode($rows[3]));?>:</bb2></td>
										<td><bb2>- 1 PUNT</bb2></td>
									</tr>
								</table>
							</div>
						</b>
						<p></p>
					</div>
							
				<div class="clear"></div>
				
				<!-- Keuringsonderdeel 'koolzuur' -->
				<div class="grid_17 minimum-except">
					<BR>
					<div id="koolzuur"></div>
					<h2> <?php print_r(utf8_encode($vragen[1]));?></h2>
					<br>
					<kt1>Klik op de stelling dat van toepassing is op het bier, op vlak van de hoeveelheid koolzuur.</kt1>
					<br>
					<kt1>Er is maar &eacute;&eacute;n stelling mogelijk.</kt1>
					<br>
					<br>
				 
					<div class="grid_26 minimum-except">
				
						<?php 
							/* Oproepen van de criteria's in de gewenste taal */
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$presentatie = "CALL SP_SelectKoolzuur($TaalID)";
							$result = mysqli_query($conn, $presentatie);
							$rows = array();

							while($row = mysqli_fetch_array($result)){
								$rows[] = $row[0];
							}						
						?>
					
					<!-- tiles -->
						<table class="inlineTable">
							<tr>
								<td>
									<div id="rd-button-red">
										<label>
											<input type="radio" name="koolzuur" id="koolzuur1" value="6" onclick="getRadioValue(this.id); getElementById('lblKoolzuur').innerHTML=koolzuurInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
											<span>&#10008;</span>
										</label>
									</div>
								</td>													  
							</tr>
							<tr>
								<td>
									<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[1]), 'UTF-8'));?></kt1>
								</td>												
							</tr>
						</table>
						<table class="inlineTable">
							<tr>
								<td>
									<div id="rd-button-orange">
										<label>
											<input type="radio" name="koolzuur" id="koolzuur2" value="7" onclick="getRadioValue(this.id); getElementById('lblKoolzuur').innerHTML=koolzuurInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
											<span>&#8767;</span>
										</label>
									</div>
								</td>													  
							</tr>
							<tr>
								<td>
									<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[2]), 'UTF-8'));?></kt1>
								</td>													
							</tr>
						</table>
						<table class="inlineTable">
							<tr>
								<td>
									<div id="rd-button-green">
										<label>
											<input type="radio" name="koolzuur" id="koolzuur3" value="5" onclick="getRadioValue(this.id); getElementById('lblKoolzuur').innerHTML=koolzuurInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
											<span>&#10004;</span>
										</label>
									</div>
								</td>													  
							</tr>
							<tr>
								<td>
									<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[0]), 'UTF-8'));?></kt1>
								</td>													
							</tr>
						</table>
						<table class="inlineTable">
							<tr>
								<td>
									<div id="rd-button-orange">
										<label>
											<input type="radio" name="koolzuur" id="koolzuur4" value="8" onclick=" getRadioValue(this.id); getElementById('lblKoolzuur').innerHTML=koolzuurInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
											<span>&#8767;</span>
										</label>
									</div>
								</td>													  
							</tr>
							<tr>
								<td>
									<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[3]), 'UTF-8'));?></kt1>
								</td>													
							</tr>
						</table>			
						<table class="inlineTable">
							<tr>
								<td>
									<div id="ck-button-red">
										<label>
											<input type="radio" name="koolzuur" id="koolzuur5" value="9" onclick=" getRadioValue(this.id); getElementById('lblKoolzuur').innerHTML=koolzuurInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
											<span>&#10008;</span>
										</label>
									</div>
								</td>													  
							</tr>
							<tr>
								<td>
									<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[4]), 'UTF-8'));?></kt1>
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
									<td><bb2><?php print_r(utf8_encode($rows[1]));?>:</bb2></td>
									<td><bb2>+ 0 PUNTEN</bb2></td>
								</tr>
								<tr>
									<td><bb2><?php print_r(utf8_encode($rows[2]));?>:</bb2></td>
									<td><bb2>+ 1 PUNT</bb2></td>
								</tr>
								<tr>
									<td><bb2><?php print_r(utf8_encode($rows[0]));?>:</bb2></td>
									<td><bb2>+ 2 PUNTEN</bb2></td>
								</tr>
								<tr>
									<td><bb2><?php print_r(utf8_encode($rows[3]));?>:</bb2></td>
									<td><bb2>+ 1 PUNT</bb2></td>
								</tr>
								<tr>
									<td><bb2><?php print_r(utf8_encode($rows[4]));?>:</bb2></td>
									<td><bb2>+ 0 PUNTEN</bb2></td>
								</tr>
							</table>
						</div>
					</b>
					<p></p>
				</div>
				
				<div class="clear"></div>
				 
				<!-- onderdeel 'helderheid' -->
				<div class="grid_17 minimum-except">
					<BR>
					<div id="helderheid"></div>
					<h2> <?php print_r(utf8_encode($vragen[2]));?></h2>
					<br>
					<kt1>Klik op de stelling dat van toepassing is op het bier, op vlak van helderheid. Er is maar &eacute;&eacute;n stelling mogelijk.</kt1>
					<br>
					<kt1>Gelieve eventuele extra informatie aan te vinken dat van toepassing is op het bier.</kt1>
					<br><br>
				 
					<div class="grid_26 minimum-except">
						<?php 
							/* Oproepen van de criteria's in de gewenste taal*/
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$presentatie = "CALL SP_SelectHelderheid($TaalID)";
							$result = mysqli_query($conn, $presentatie);
							$rows = array();

							while($row = mysqli_fetch_array($result)){
								$rows[] = $row['Beschrijving'];
							}
						?>
					<!-- tiles -->
						<table class="inlineTable">
							<tr>
								<td>
									<div id="rd-button-red">
										<label>
											<input type="radio" name="helderheid" id="helderheid1" value="17" onclick="getRadioValue(this.id); getElementById('lblHelderheid').innerHTML=helderheidInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
											<span>&#10008;</span>
										</label>
									</div>
								</td>													  
							</tr>
							<tr>
								<td>
									<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[7]), 'UTF-8'));?></kt1>
								</td>													
							</tr>
						</table>
						<table class="inlineTable">
							<tr>
								<td>
									<div id="rd-button-green">
										<label>
											<input type="radio" name="helderheid" id="helderheid2" value="10" onclick="getRadioValue(this.id); getElementById('lblHelderheid').innerHTML=helderheidInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
											<span>&#10004;</span>
										</label>
									</div>
								</td>													  
							</tr>
							<tr>
								<td>
									<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[0]), 'UTF-8'));?></kt1>
								</td>													
							</tr>
						</table>
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
									<td><bb2><?php print_r(utf8_encode($rows[7]));?>:</bb2></td>
									<td><bb2>+ 0 PUNTEN</bb2></td>
								</tr>
								<tr>
									<td><bb2><?php print_r(utf8_encode($rows[0]));?>:</bb2></td>
									<td><bb2>+ 2 PUNTEN</bb2></td>
								</tr>
							</table>	
						</div>
					</b>
					<p></p>
				</div>
				 
				<!-- extra informatie helderheid -->
				<div class="grid_26 minimum-except">
					<div class="box-info">
						<kt1><strong>EXTRA INFORMATIE</strong></kt1>
						<br><br>
						<kt1>Hier kan u nog extra informatie aanduiden dat van toepassing is op het bier.</kt1>
						<br><br>
						
					<!-- tiles -->
						<div class="grid_20 minimum-except">
							<table style="width:250px">
								<tr>
									<td>
										<div class="form-item8">
											<div id="ck-button-green-mini">
												<label>
													<input type="checkbox" name="ExtraHelderheid1" value="Briljant"/>
													<span>&#10004;</span>
												</label>
											</div>
										</div>
									</td>	
									<td style="width:80%" align="right">
										<p><i><?php print_r(utf8_encode($rows[1]));?></i></p>
									</td>												  
								</tr>
							</table>
							<table style="width:250px">
								<tr>
									<td>
										<div class="form-item8">
											<div id="ck-button-green-mini">
												<label>
													<input type="checkbox" name="ExtraHelderheid2" value="Helder"/>
													<span>&#10004;</span>
												</label>
											</div>
										</div>
									</td>	
									<td style="width:80%" align="right">
										<p><i><?php print_r(utf8_encode($rows[2]));?></i></p>
									</td>												  
								</tr>
							</table>

							 <table style="width:250px">
								<tr>
									<td>
										<div class="form-item8">
											<div id="ck-button-green-mini">
												<label>
													<input type="checkbox" name="ExtraHelderheid3" value="Tweeschijn"/>
													<span>&#10004;</span>
												</label>
											</div>
										</div>
									</td>	
									<td style="width:80%" align="right">
										<p><i><?php print_r(utf8_encode($rows[3]));?></i></p>
									</td>												  
								</tr>
							</table>
						</div>

						<div class="grid_20 minimum-except">
							<table style="width:250px">
								<tr>
									<td>
										<div class="form-item8">
											<div id="ck-button-green-mini">
												<label>
													<input type="checkbox" name="ExtraHelderheid4" value="Mistig"/>
													<span>&#10004;</span>
												</label>
											</div>
										</div>
									</td>	
									<td style="width:80%" align="right">
										<p><i><?php print_r(utf8_encode($rows[4]));?></i></p>
									</td>												  
								</tr>
							</table>
							
							<table style="width:250px">
								<tr>
									<td>
										<div class="form-item8">
											<div id="ck-button-green-mini">
												<label>
													<input type="checkbox" name="ExtraHelderheid5" value="Melkachtig"/>
													<span>&#10004;</span>
												</label>
											</div>
										</div>
									</td>	
									<td style="width:80%" align="right">
										<p><i><?php print_r(utf8_encode($rows[5]));?></i></p>
									</td>												  
								</tr>
							</table>
							 <table style="width:250px">
								<tr>
									<td>
										<div class="form-item8">
											<div id="ck-button-green-mini">
												<label>
													<input type="checkbox" name="ExtraHelderheid6" value="Troebel"/>
													<span>&#10004;</span>
												</label>
											</div>
										</div>
									</td>	
									<td style="width:80%" align="right">
										<p><i><?php print_r(utf8_encode($rows[6]));?></i></p>
									</td>												  
								</tr>
							</table>
						</div>
					</div>
				</div>
				 
				<div class="clear"></div>
				  
				<!-- onderdeel 'schuimkraag' -->
				<div class="grid_17 minimum-except">
					<BR><BR>
					<div id="schuimkraag">
						<h2> <?php print_r(utf8_encode($vragen[3]));?></h2>
						<br>
						<kt1>Klik op de stelling dat van toepassing is op het bier, op vlak van de schuimkraag. Er is maar &eacute;&eacute;n stelling mogelijk.</kt1>
						<br>
						<kt1>Gelieve eventuele extra informatie aan te vinken dat van toepassing is op het bier.</kt1>
						<br><br>
						<div class="grid_26 minimum-except"></div>
						<?php 
							/*Oproepen van de criteria's in de gewenste taal*/
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$presentatie = "CALL SP_SelectSchuimkraag($TaalID)";
							$result = mysqli_query($conn, $presentatie);
							$rows = array();

							while($row = mysqli_fetch_array($result)){
								$rows[] = $row['Beschrijving'];
							}
						?>
					<!-- tiles -->
						<table class="inlineTable">
							<tr>
								<td>
									<div id="rd-button-green">
										<label>
											<input type="radio" name="Schuimkraag" id="schuimkraag1" value="18" onclick="getRadioValue(this.id); getElementById('lblSchuimkraag').innerHTML=schuimkraagInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
											<span>&#10004;</span>
										</label>
									</div>
								</td>													  
							</tr>
							<tr>
								<td>
									<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[0]), 'UTF-8'));?></kt1>
								</td>													
							</tr>
						</table>
						<table class="inlineTable">
							<tr>
								<td>
									<div id="rd-button-orange">
										<label>
											<input type="radio" name="Schuimkraag" id="schuimkraag2" value="19" onclick="getRadioValue(this.id); getElementById('lblSchuimkraag').innerHTML=schuimkraagInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
											<span>&#8767;</span>
										</label>
									</div>
								</td>													  
							</tr>
							<tr>
								<td>
									<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[1]), 'UTF-8'));?></kt1>
								</td>													
							</tr>
						</table>
						<table class="inlineTable">
							<tr>
								<td>
									<div id="rd-button-orange">
										<label>
											<input type="radio" name="Schuimkraag" id="schuimkraag3" value="20" onclick="getRadioValue(this.id); getElementById('lblSchuimkraag').innerHTML=schuimkraagInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
											<span>&#8767;</span>
										</label>
									</div>
								</td>													  
							</tr>
							<tr>
								<td>
									<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[2]), 'UTF-8'));?></kt1>
								</td>													
							</tr>
						</table>
						<table class="inlineTable">
							<tr>
								<td>
									<div id="ck-button-red">
										<label>
											<input type="radio" name="Schuimkraag" id="schuimkraag4" value="21" onclick="getRadioValue(this.id); getElementById('lblSchuimkraag').innerHTML=schuimkraagInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
											<span>&#10008;</span>
										</label>
									</div>
								</td>													  
							</tr>
							<tr>
								<td>
									<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[3]), 'UTF-8'));?></kt1>
								</td>													
							</tr>
						</table>		
						<table class="inlineTable">
							<tr>
								<td>
									<div id="ck-button-red">
										<label>
											<input type="radio" name="Schuimkraag" id="schuimkraag5" value="22" onclick="getRadioValue(this.id); getElementById('lblSchuimkraag').innerHTML=schuimkraagInput; calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;"/>
											<span>&#10008;</span>
										</label>
									</div>
								</td>													  
							</tr>
							<tr>
								<td>
									<kt1 class="tile-text"><?php print_r(mb_strtoupper(utf8_encode($rows[4]), 'UTF-8'));?></kt1>
								</td>													
							</tr>
						</table>
						<br><br>
					</div>

					<!-- puntenverdeling -->
					<div class="grid_26 minimum-except">
						<div class="box-info">
							<kt1>
								<strong>EXTRA INFORMATIE</strong>
							</kt1>
							<br><br>
							<kt1>Hier kan u nog extra informatie aanduiden dat van toepassing is op het bier.</kt1>
							<br><br>
							<div class="grid_20 minimum-except">
								<table style="width:250px">
									<tr>
										<td>
											<div class="form-item8">
												<div id="ck-button-green-mini">
													<label>
														<input type="checkbox" name="SchuimkraagExtra1" value="Ongelijkmatig schuim"/>
														<span>&#10004;</span>
													</label>
												</div>
											</div>
										</td>	
										<td style="width:80%" align="right">
											<p>
												<i><?php print_r(utf8_encode($rows[5]));?></i>
											</p>
										</td>												  
									</tr>
								</table>
								<table style="width:250px">
									<tr>
										<td>
											<div class="form-item8">
												<div id="ck-button-green-mini">
													<label>
														<input type="checkbox" name="SchuimkraagExtra2" value="Mousse"/>														
														<span>&#10004;</span>
													</label
												</div>
											</div>
										</td>	
										<td style="width:80%" align="right">
											<p>
												<i><?php print_r(utf8_encode($rows[6]));?></i>
											</p>
										</td>												  
									</tr>
								</table>
							</div>
							<div class="grid_20 minimum-except">
								<table style="width:250px">
									<tr>
										<td>
											<div class="form-item8">
												<div id="ck-button-green-mini">
													<label>
														<input type="checkbox" name="SchuimkraagExtra3" value="Romig"/>
														<span>&#10004;</span>
													</label>
												</div>
											</div>
										</td>	
										<td style="width:80%" align="right">
											<p>
												<i><?php print_r(utf8_encode($rows[7]));?></i>
											</p>
										</td>												  
									</tr>
								</table>
								<table style="width:250px">
									<tr>
										<td>
											<div class="form-item8">
												<div id="ck-button-green-mini">
													<label>
														<input type="checkbox" name="SchuimkraagExtra3" value="Glasplakkend"/>
														<span>&#10004;</span>
													</label>
												</div>
											</div>
										</td>	
										<td style="width:80%" align="right">
											<p>
												<i><?php print_r(utf8_encode($rows[8]));?></i>
											</p>
										</td>												  
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<!-- puntenverdeling -->
				<div class="grid_18 minimum-except">
					<br><br><br>
					<p></p>
					<b class="tile-blue" style="height:130">
						<br>
						<img src="Image/bier-blue-tile.png" alt="Brouwland Biercompetitie">
						<div class="grid_19 minimum-except">			
							<table class="inlineTable" style="width: 190px; height: 55px;">
								<tr>
									<td>
										<bb1>Puntenverdeling</bb1>
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<bb2><?php print_r(utf8_encode($rows[0]));?>:</bb2>
									</td>
									<td>
										<bb2>+ 3 PUNTEN</bb2>
									</td>
								</tr>
								<tr>
									<td>
										<bb2><?php print_r(utf8_encode($rows[1]));?>:</bb2>
									</td>
									<td>
										<bb2>+ 2 PUNTEN</bb2>
									</td>
								</tr>
								<tr>
									<td>
										<bb2><?php print_r(utf8_encode($rows[2]));?>:</bb2>
									</td>
									<td>
										<bb2>+ 1 PUNT</bb2>
									</td>
								</tr>
								<tr>
									<td>
										<bb2><?php print_r(utf8_encode($rows[3]));?>:</bb2>
									</td>
									<td>
										<bb2>+ 0 PUNTEN</bb2>
									</td>
								</tr>
								<tr>
									<td>
										<bb2><?php print_r(utf8_encode($rows[4]));?>:</bb2>
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
			   
				</form>
				
				<!-- subtotaal -->
				<div class="grid_17 minimum-except">
					<BR><BR>
					<h2> Subtotaal</h2>
					<br>
					<kt1>Hieronder kan u het subtotaal vinden van de door u gegeven punten voor het keuringsonderdeel 'Visuele aspecten'.</kt1>
					<br>
					<kt1>U kan de punten nog altijd wijzigen, het subtotaal wordt automatisch aangepast.</kt1>
					<br><br>	
				 
					<div class="grid_25 minimum-except">
						<table style="width: 563px;">
							<tr>
								<td>
									<div class="grid_21 minimum-except">
										<div id="tile-orange-subtotal-category" style="height:45px">
											<label>
												<sa href="#" class="scrollToPresentatie">
													<span><?php print_r(utf8_encode($vragen[0]));?></span>
												</sa>
											</label>
										</div>
										<div id="tile-orange-subtotal-category" style="height:45px">
											<label>
												<sa href="#" class="scrollToKoolzuur">
													<span><?php print_r(utf8_encode($vragen[1]));?></span>
												</sa>
											</label>
										</div>
										<div id="tile-orange-subtotal-category" style="height:45px">
											<label>
												<sa href="#" class="scrollToHelderheid">
													<span><?php print_r(utf8_encode($vragen[2]));?></span>
												</sa>
											</label>
										</div>
										<div id="tile-orange-subtotal-category" style="height:45px">
											<label>
												<sa href="#" class="scrollToSchuimkraag">
													<span><?php print_r(utf8_encode($vragen[3]));?></span>
												</sa>
											</label>
										</div>
									</div>
								</td>
								<td>
									<div class="grid_22 minimum-except">	 
										<div id="tile-orange-subtotal-categoryp" style="height:45px">
											<label style="padding:7px 2px">
												<span>
													<label id="lblPresentatie">0</label>
												</span> 
											</label>
										</div>
										<div id="tile-orange-subtotal-categoryp" style="height:45px">
											<label style="padding:7px 2px">
												<span>
													<label id="lblKoolzuur">0</label>
												</span>
											</label>
										</div>
										<div id="tile-orange-subtotal-categoryp" style="height:45px">
											<label style="padding:7px 2px">
												<span>
													<label id="lblHelderheid">0</label>
												</span>
											</label>
										</div>
										<div id="tile-orange-subtotal-categoryp" style="height:45px">
											<label style="padding:7px 2px">
												<span>
													<label id="lblSchuimkraag">0</label>
												</span>
											</label>
										</div>
									</div>
								</td>
								<td>
									<div class="grid_21 minimum-except">
										 <div id="tile-orange-subtotal-total" style="height:198px">
											<label style="padding:20px 3px">
												<span>
													<label id="totaal">0</label>
												</span> 
											</label>
										 </div>
									</div>
								</td>
								<td>
									<div class="grid_23 minimum-except">
										<div id="tile-orange-subtotal-total-text" style="height:198px">
											<label style="padding:25px 1px">
												<span>OP</span> 
											</label>
										</div>
									</div>
								</td>
								<td>
									<div class="grid_21 minimum-except">
										<div id="tile-orange-subtotal-total" style="height:198px">
											<label style="padding:20px 3px">
												<span>10<!--Hiertussen moet code voor de totale punten komen--></span> 
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
					<a href="./Keuringsformulier-VisueleAspecten-Keuring.php?taal=3" class="language">EN</a>
					<a href="./Keuringsformulier-VisueleAspecten-Keuring.php?taal=2" class="language">FR</a>
					<a href="./Keuringsformulier-VisueleAspecten-Keuring.php?taal=1" class="language">NL</a>
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
