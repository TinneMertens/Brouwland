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
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta property="og:title" content="Brouwland Biercompetitie">
    <meta property="og:description" content="Maak kans op 500 liter van je eigen bier! Surf snel naar www.mijnbier.be en schrijf je in!">
    <meta property="og:image" content="http://www.mijnbier.be/facebook/img/avatar2-nl.jpg">
    <meta property="og:url" content="http://www.mijnbier.be/inscription/default.cshtml?nav=3&amp;lang=nl">
    <meta property="og:locale" content="nl_NL">

	<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.scrollTo-min.js"></script>
	<link rel="stylesheet" type="text/css" href="./CSS/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/grid.css" media="screen">
    <link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/nav.css" media="screen">
    <link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/normalize.css" media="screen">
    <link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/print.css" media="print"> 
    <link rel='stylesheet' href='http://193.191.187.253:8052/CSS/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/Tile.css" media="screen">
        
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
		
	<script src="http://bootstrapdocs.com/v2.0.2/docs/assets/js/bootstrap-collapse.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="http://193.191.187.253:8052/js/global.js" type="text/javascript"></script>		
	<script src="http://193.191.187.253:8052/js/jquery.smartmenus.js" type="text/javascript"></script>
	<script src="http://193.191.187.253:8052/js/nav.js" type="text/javascript"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.js" type="text/javascript"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js" type="text/javascript"></script>  

	<!-- freeow -->
	<link rel="stylesheet" type="text/css" href="CSS/freeow/freeow.css" />		
	<script type="text/javascript" src="js/jquery.freeow.js"></script>
	
	<?php
		/* Zorgt voor de verschillende talen, standaard is het nederlands*/
		$TaalID = 1;
		if(isset($_GET["taal"]))
		{						
			$TaalID = $_GET["taal"];
		}

		/* bescrhijving en criteria's opvragen uit de database in de gewenste taal*/
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$query = "CALL SP_SelectSmaakEnGeurWaarneembaarNeutraal($TaalID);";
		$sqlquery = mysqli_query($conn, $query);

		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$query1 = "CALL SP_SelectSmaakEnGeurDropDownLists($TaalID)";
		$sqlquery1 = mysqli_query($conn, $query1);

		$array = array();
		$array1 = array();

		while ($row = mysqli_fetch_array($sqlquery1)) {
			$array[] = $row['Beschrijving'];
			$array1[] = $row['CriteriaID'];
		}							
	?>
	<script>
		teller = 0;
		
		function myFunction1() {
			
    		var table = document.getElementById("myTable1");
    		var row = table.insertRow(table.rows.length);
    		var cell1 = row.insertCell(0);
    		var cell2 = row.insertCell(1);
    		var cell3 = row.insertCell(2);
			
			geur = '<select id="' + teller + 'G" name="' + teller + 'G" class="inputveld" style="margin-top: 10px">';
			geur += '<option  >----------- GEUR -----------</option>';
			geur += '<option value="' + <?php echo $array1[0]; ?> + '"><?php echo utf8_encode($array[0]); ?></option>';
			geur += '<option value="' + <?php echo $array1[1]; ?> + '"><?php echo utf8_encode($array[1]); ?></option>';
			geur += '<option value="' + <?php echo $array1[2]; ?> + '"><?php echo utf8_encode($array[2]); ?></option>';
			geur += '<option value="' + <?php echo $array1[3]; ?> + '"><?php echo utf8_encode($array[3]); ?></option>';
			geur += '</select>';
			
			smaak = '<select id="' + teller + 'S" name="' + teller + 'S" class="inputveld" style="margin-top: 10px">';
			smaak += '<option  >----------- SMAAK -----------</option>';
			smaak += '<option value="' + <?php echo $array1[0]; ?> + '"><?php echo utf8_encode($array[0]); ?></option>';
			smaak += '<option value="' + <?php echo $array1[1]; ?> + '"><?php echo utf8_encode($array[1]); ?></option>';
			smaak += '<option value="' + <?php echo $array1[2]; ?> + '"><?php echo utf8_encode($array[2]); ?></option>';
			smaak += '<option value="' + <?php echo $array1[3]; ?> + '"><?php echo utf8_encode($array[3]); ?></option>';
			smaak += '</select>';
			
    		cell1.innerHTML = '<input name="' + teller + 'ExtraSmaakGeur" type="text" class="inputveld required" maxlength="100" aria-required="true" style= "margin-top: 10px; float: right; margin-right: 60px;">';
    		cell2.innerHTML = geur;
    		cell3.innerHTML = smaak;
			
			teller++;
			document.getElementById("ExtraInfo").value = teller;
		}
		
		function myFunction2() {
    		var table = document.getElementById("myTable2");
    		var row = table.insertRow(table.rows.length);
    		var cell1 = row.insertCell(0);
    		var cell2 = row.insertCell(1);
    		var cell3 = row.insertCell(2);
			
			geur = '<select id="' + teller + 'G" name="' + teller + 'G" class="inputveld" style="margin-top: 10px">';
			geur += '<option  >----------- GEUR -----------</option>';
			geur += '<option value="' + <?php echo $array1[0]; ?> + '"><?php echo utf8_encode($array[0]); ?></option>';
			geur += '<option value="' + <?php echo $array1[1]; ?> + '"><?php echo utf8_encode($array[1]); ?></option>';
			geur += '<option value="' + <?php echo $array1[2]; ?> + '"><?php echo utf8_encode($array[2]); ?></option>';
			geur += '<option value="' + <?php echo $array1[3]; ?> + '"><?php echo utf8_encode($array[3]); ?></option>';
			geur += '</select>';
			
			smaak = '<select id="' + teller + 'S" name="' + teller + 'S" class="inputveld" style="margin-top: 10px">';
			smaak += '<option  >----------- SMAAK -----------</option>';
			smaak += '<option value="' + <?php echo $array1[0]; ?> + '"><?php echo utf8_encode($array[0]); ?></option>';
			smaak += '<option value="' + <?php echo $array1[1]; ?> + '"><?php echo utf8_encode($array[1]); ?></option>';
			smaak += '<option value="' + <?php echo $array1[2]; ?> + '"><?php echo utf8_encode($array[2]); ?></option>';
			smaak += '<option value="' + <?php echo $array1[3]; ?> + '"><?php echo utf8_encode($array[3]); ?></option>';
			smaak += '</select>';
    			
    		cell1.innerHTML = '<input id="' + teller + 'ExtraSmaakGeur" name="' + teller + 'ExtraSmaakGeur" type="text" class="inputveld required" maxlength="100" aria-required="true" style= "margin-top: 10px; float: right; margin-right: 60px;">';
    		cell2.innerHTML = geur;
    		cell3.innerHTML = smaak;
			
			teller ++;
			
			document.getElementById("ExtraInfo").value = teller;
		}
		
		var puntenGeur = "";
		var puntenSmaak = "";
		var subtotal = 0;
			
		//subtotaal berekenen
		function calculateSubtotal() {
			subtotal = parseInt(1*puntenGeur) + parseInt(1*puntenSmaak);
		}

		//zorgt ervoor dat de functionaliteit van het back pijltje van de browser niet meer werkt
		window.history.forward();
		function disableBack(){
			 window.history.forward();
		}
		
		//controleert dat er iets is ingvuld in de infput fields voor de punten
		function validateForm() {
			var text = "";
			var errorCount = 0;
				
			if (puntenGeur === null || puntenGeur === "") {
				errorCount += 1;
				text += "- Geur<br>";
			}
			if (puntenSmaak === null || puntenSmaak === "") {
				errorCount += 1;
				text += "- Smaak<br>";
			}
				
			//showt een error message
			if (errorCount > 0) {
				$("#freeow").freeow("Opgepast", "Gelieve nog punten toe te kennen voor de volgende keuringsonderdelen alvorens u verder gaat:<br>" + text, {
					classes: ["osx", "notice"],
					autoHide: false
				});
				return false;
			}
			else{
				return true;
			}
		}
			
		//controleert dat de punten bij het onderdeel geur tussen 0 en 25 liggen en dat er geen letters of bewerkingen zijn ingevud
		function getGeur(val){
			if(val < 0 || val > 25){
				$("#freeow").freeow("Opgepast", "Gelieve een getal in te geven tussen 0 en 25", {
					classes: ["osx", "notice"],
					autoHide: false
				});						
				document.getElementById("txtPunten1").value = "";
			}
			else{
				if(isNaN(val)){
					$("#freeow").freeow("Opgepast", "Gelieve een getal in te geven tussen 0 en 25", {
						classes: ["osx", "notice"],
						autoHide: false
					});	
					document.getElementById("txtPunten1").value = "";
				}
				else {
					puntenGeur = val;
				}
			}
		}
		
		//controleert dat de punten bij het onderdeel smaak tussen 0 en 15 liggen en dat er geen letters of bewerkingen zijn ingevud
		function getSmaak(val){
			if(val < 0 || val > 15){		
				$("#freeow").freeow("Opgepast", "Gelieve een getal in te geven tussen 0 en 15", {
					classes: ["osx", "notice"],
					autoHide: false
				});	
				document.getElementById("txtPunten2").value = "";
			}
			else{
				if(isNaN(val)){
					$("#freeow").freeow("Opgepast", "Gelieve een getal in te geven tussen 0 en 15", {
						classes: ["osx", "notice"],
						autoHide: false
					});	
					document.getElementById("txtPunten2").value = "";
				}
				else {
					puntenSmaak = val;
				}
			}
		}
	</script>	
 </head>

<!-- Header -->
<!-- Hier wordt de bg-header (zie style.css -> head) op de pagina geplaatst. -->

<div id='head'><img src='http://193.191.187.253:8052/Image/bg-header.jpg'></div>

<!-- Header -->

<body style="zoom: 1;" onload="disableBack();" onpageshow="if(event.persisted) disableBack();">
    <div id="wrap">
        <div id="main">
			<div class="container_16">
				<div class="grid_16">
					<header>
						<img src="http://193.191.187.253:8052/Image/logo-brouwland-biercompetitie-nl.png" alt="Brouwland Biercompetitie">
						
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
								<a href="./Keuringsformulier-GeurSmaakAssociaties-Keuring.php?taal=1" class="language">NL</a>
							</div>   
							<div class="item">
								<a href="./Keuringsformulier-GeurSmaakAssociaties-Keuring.php?taal=2" class="language">FR</a>
							</div>
							<div class="item">
								<a href="./Keuringsformulier-GeurSmaakAssociaties-Keuring.php?taal=3" class="language">EN</a>
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
			<form action="http://193.191.187.253:8052/GeurEnSmaakPHP.php" method="POST" onsubmit="return validateForm()">
				<div class="container_16">
					<BR>
					<!-- Div voor alert-box weer te geven -->
					<div id="freeow" name="freeow" class="freeow freeow-top-right"></div>			  
					<div class="grid_16">
						<h1>Geur&#8259;  & Smaakassociaties</h1>
					</div>
					<div class="clear"></div>
<!--              Keuringsonderdeel 'Waarneembaar - Neutraal' -->
					<div class="grid_17 minimum-except">
						<br>
						<h2 id="waarneembaar-neutraal"> Waarneembaar - Neutraal</h2>
						<br>
						<kt1>Duid aan of de geuren en smaken zwak, matig, sterk of niet van toepassing zijn.</kt1>
						<br><br>
						
						<input type="hidden" name="ExtraInfo" id="ExtraInfo"></input>
						
						<table id="myTable1" style="width: 850px; overflow: auto;">
							<tr>
								<td>
									<div id="tile-orange-header-empty">
										<label>
											<sa><span></span></sa>
										</label>
									</div>
								</td>
								<td>
									<div id="tile-orange-header">
										<label>
											<sa><span>GEUR</span></sa>
										</label>
									</div>
								</td>
								<td>
									<div id="tile-orange-header">
										<label>
											<sa><span>SMAAK</span></sa>
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
										 echo "<td style= \"text-align: right; vertical-align:middle; padding-right: 60px; \"><i><strong>". utf8_encode($row['Beschrijving'])." </strong></i></td>";
										 echo "<td>";
										 echo	"<div id=\"geur\">";
										 echo	"<select id=\"".$row['VraagID']."G\" name=\"".$row['VraagID']."G\" class=\"inputveld\" style= \"margin-top: 10px\" >";
										 echo		"<option value=\"\"  \"text-align: middle; \">----------- GEUR -----------</option>";
										 echo			"<option value=" . $array1[0] . ">" . utf8_encode($array[0]) . "</option>";
										 echo			"<option value=" . $array1[1] . ">" . utf8_encode($array[1]) . "</option>";
										 echo			"<option value=" . $array1[2] . ">" . utf8_encode($array[2]) . "</option>";
										 echo			"<option value=" . $array1[3] . ">" . utf8_encode($array[3]) . "</option>";		
										 echo	"</select>";
										 echo	"</div>";
										 echo "</td>";
										 echo "<td>";
										 echo	"<div id=\"smaak\">";
										 echo	"<select id=\"".$row['VraagID']."S\" name=\"".$row['VraagID']."S\" class=\"inputveld\" style= \"margin-top: 10px\" >";
										 echo		"<option value=\"\">---------- SMAAK -----------</option>";
										 echo			"<option value=" . $array1[0] . ">" . utf8_encode($array[0]) . "</option>";
										 echo			"<option value=" . $array1[1] . ">" . utf8_encode($array[1]) . "</option>";
										 echo			"<option value=" . $array1[2] . ">" . utf8_encode($array[2]) . "</option>";
										 echo			"<option value=" . $array1[3] . ">" . utf8_encode($array[3]) . "</option>";			
										 echo	"</select>";
										 echo	"</div>";
										 echo "</td>";
										 echo "</tr>";
										 $i = ($i==0) ? 1:0;
									 }
								?>
							</tr>
						</table>
						<br>
						<div id="txtBox" style="display: none; text-align: right;">
							<input name="ExtraSmaakGeur" type="text" class="inputveld required" maxlength="100" aria-required="true" style= "margin-top: 10px; float: right; margin-right: 60px;">			
						</div>
				
						<button onclick="myFunction1()" type="button" class="form-btn">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Voeg Geur/Smaak toe 
						</button>
						<br><br>
					</div>
					<div class="clear"></div>

<!--              Keuringsonderdeel 'Afwijkingen - Fouten - Speciaal' -->
					<div class="grid_17 minimum-except">
						<br>
						<h2 id="afwijkingen-fouten-speciaal"> Afwijkingen - Fouten - Speciaal</h2>
						<br>
						<kt1>Duid aan of de geuren en smaken zwak, matig, sterk of niet van toepassing zijn.</kt1>
						<br><br>
             
						<table id="myTable2" style="width: 850px; overflow: auto;">
							<?php
								/*criteria's ophalen uit de database in de gewenste taal.*/
								include 'DAL.php';
								$conn = mysqli_connect($servername, $username, $password, $dbname);
								$query1 = "CALL SP_SelectSmaakEnGeurAfwijkingenFoutenSpeciaal($TaalID);";
								$sqlquery1 = mysqli_query($conn, $query1);	
							?>
							<tr>
								<td>
									<div id="tile-orange-header-empty">
										<label>
											<sa><span></span></sa>
										</label>
									</div>
								</td>
								<td>
									<div id="tile-orange-header">
										<label>
											<sa><span>GEUR</span></sa>
										</label>
									</div>
								</td>
								<td>
									<div id="tile-orange-header">
										<label>
											<sa><span>SMAAK</span></sa>
										</label>
									</div>    				
								</td>
								<?php
									/* Gaat een tabel automatisch vullen aan de hand van de gegevens in de database. 
										Wordt er een record in de database bijgevoegd, gaat de tabel automatisch groter worden.*/
									$i = 0;
									 while ($row = mysqli_fetch_array($sqlquery1)) {
										 $class = ($i == 0) ? "" : "alt";
										 echo "<tr class=\"".$class."\">";
										 echo "<td style= \"text-align: right; vertical-align:middle; padding-right: 60px; \"><i><strong>".utf8_encode($row['Beschrijving'])." </strong></i></td>";
										 echo "<td>";
										 echo	"<div id=\"geur\">";
										 echo	"<select id=\"".$row['VraagID']."G\" name=\"".$row['VraagID']."G\" class=\"inputveld\" style= \"margin-top: 10px\" >";
										 echo		"<option value=\"\"  \"text-align: middle; \">----------- GEUR -----------</option>";
										 echo			"<option value=" . $array1[0] . ">" . utf8_encode($array[0]) . "</option>";
										 echo			"<option value=" . $array1[1] . ">" . utf8_encode($array[1]) . "</option>";
										 echo			"<option value=" . $array1[2] . ">" . utf8_encode($array[2]) . "</option>";
										 echo			"<option value=" . $array1[3] . ">" . utf8_encode($array[3]) . "</option>"	;	
										 echo	"</select>";
										 echo	"</div>";
										 echo "</td>";
										 echo "<td>";
										 echo	"<div id=\"smaak\">";
										 echo	"<select id=\"".$row['VraagID']."S\" name=\"" .$row['VraagID']."S\" class=\"inputveld\" style= \"margin-top: 10px\" >";
										 echo		"<option value=\"\">---------- SMAAK -----------</option>";
										 echo			"<option value=" . $array1[0] . ">" . utf8_encode($array[0]) . "</option>";
										 echo			"<option value=" . $array1[1] . ">" . utf8_encode($array[1]) . "</option>";
										 echo			"<option value=" . $array1[2] . ">" . utf8_encode($array[2]) . "</option>";
										 echo			"<option value=" . $array1[3] . ">" . utf8_encode($array[3]) . "</option>"	;			
										 echo	"</select>";
										 echo	"</div>";
										 echo "</td>";
										 echo "</tr>";
										 $i = ($i==0) ? 1:0;
									 }
								?>
							</tr>
						</table>
						<br>
						<div id="txtBox" style="display: none; text-align: right;">
							<input name="ExtraSmaakGeur" type="text" class="inputveld required" maxlength="100" aria-required="true" style= "margin-top: 10px; float: right; margin-right: 60px;">			
						</div>
						<button onclick="myFunction2()" type="button" class="form-btn">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Voeg Geur/Smaak toe
						</button>
					</div>

					<div class="clear"></div>            
 
					<!-- 'Subtotaal' -->
					<div class="grid_17 minimum-except">
						<BR><BR>
						<h2>Subtotaal</h2>
						<br>
						<kt1>Hieronder kan u de punten ingeven voor het keuringsonderdeel 'Geur &amp; Smaakassociaties'.</kt1>
						<br>
						<kt1>Vergeet zeker niet om punten toe te kennen voor zowel geur als smaak.</kt1>
						<br><br>	
             
						<div class="grid_25 minimum-except">
							<table style="width: 720px">
								<tr>
									<td>
										<div class="grid_21 minimum-except">
											<div id="tile-orange-subtotal-category">
												<label style="width:250px; height:50px; padding:11px">
													<sa href="#" class="scrollToPresentatie"
														><span>ONDERDEEL: GEUR</span>
													</sa>
												</label>
											</div>
											<div id="tile-orange-subtotal-category">
												<label style="width:250px; height:50px; padding: 11px">
													<sa href="#" class="scrollToKoolzuur">
														<span>ONDERDEEL: SMAAK</span>
													</sa>
												</label>
											</div>
										</div>
									</td>
									<td>
										<div class="grid_22 minimum-except">
											<div id="tile-orange-subtotal-categoryp">
												<input type="text" name="txtPunten1" id="txtPunten1" style="width:55px; height:55px; background:#ff8300; padding:10px 15px; color:#fff" onchange= "getGeur(this.value); calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
											</div>
											<div id="tile-orange-subtotal-categoryp">
												<input type="text" name="txtPunten2" id="txtPunten2" style="width:55px; height:55px; background:#ff8300; padding:10px 15px; color:#fff" onchange= "getSmaak(this.value); calculateSubtotal(); getElementById('totaal').innerHTML=subtotal;">
											</div>
										</div>
									</td>
									<td>
										<div class="grid_22 minimum-except">
											<div id="tile-orange-subtotal-categoryp">
												<label style="height: 50px; padding: 18px 15px">
													/25
												</label>
											</div>
											<div id="tile-orange-subtotal-categoryp">
												<label style="height:50px; padding:18px 15px">
													/15
												</label>
											</div>
										</div>
									</td>
									<td>
										<div class="grid_21 minimum-except">
											<div id="tile-orange-subtotal-total">
												<label id="totaal" style="height:114; padding:35px 45px">
													 0
												</label>
											</div>
										</div>
									</td>
									<td>
										 <div class="grid_23 minimum-except">
											 <div id="tile-orange-subtotal-total-text">
												<label style="height:114; padding:50px 10px">
													OP
												</label>
											 </div>
										</div>
									</td>
									<td>
										<div class="grid_21 minimum-except">
											<div id="tile-orange-subtotal-total">
												<label style="height:114; padding:35px 45px">
													40
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
						<button type="submit" class="next-btn" name="b1">
							Volgende<span class="glyphicon glyphicon-chevron-right"></span>
						</button>
					</div>
					<br><br><br><br>
				</div>
			</form>
		</div>
		<div class="clear"></div>
	 
		<div id="footer">
			<div class="footer-box">
				<div class="item first">
					<a href="http://www.brouwland.com" target="_blank">
						<img src="http://193.191.187.253:8052/Image/logo-brouwland.png" alt="Brouwland">
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
					<a href="./Keuringsformulier-GeurSmaakAssociaties-Keuring.php?taal=2" class="language">FR</a>
					<a href="./Keuringsformulier-GeurSmaakAssociaties-Keuring.php?taal=3" class="language">EN</a>
					<a href="./Keuringsformulier-GeurSmaakAssociaties-Keuring.php?taal=1" class="language">NL</a>
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
</body>
</html>
