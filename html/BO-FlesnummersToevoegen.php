<?php 		
	session_start();
	include 'DAL.php';

	/*Als de session BrouwlandID leeg is kan je niet in de Backoffice geraken.
	Dit controleert of er een personeelslid van Brouwland is aangemeld, zo nee word je geleid naar de login pagina. */
		
	if(empty($_SESSION['BrouwlandID']))
	{
		header('Location: http://193.191.187.253:8052/Login.php?session=false');
		exit;
	}
	
	//Hier wordt de MySL-connectie geopend
	$conn = mysqli_connect($servername, $username, $password, $dbname);
			
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
			
	$selectFlesnr = "SELECT FlesjesID FROM tblflesjes";
	$resultFlesnr = mysqli_query($conn, $selectFlesnr);
	
	$FlesnummerCount = 1;
	
?>

	<script>var flesnummers = [];</script>
	
<?php
						
	while ($row = mysqli_fetch_array($resultFlesnr)) {
		$fles = $row['FlesjesID'];
		$FlesnummerCount += 1;
?>

	<script>flesnummers.push("<?php echo $fles; ?>");</script>
	
<?php

	}
	
	$selectTeams = "CALL SP_SelectFlesjes ();";
	$resultTeams = mysqli_query($conn, $selectTeams);
	
?>

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
<!--         <link rel="stylesheet" type="text/css" href="CSS/switchToggle.css" media="screen"> -->
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
		$(document).ready(function () {
			var checkInput = decodeURIComponent(document.location.href.substring(document.location.href.indexOf("ft=") + 3));
			
			if (checkInput === "true" ) {
					$("#freeow").freeow("Flessen toegevoegd", "De flessen zijn succesvol toegevoegd.", {
						classes: ["osx", "pushpin"],
						autoHide: false
					});
			}
			
			console.log(flesnummers);
		});
		
		var idElement = "";
		
		function getID(id) {
			idElement = id;
		}
		
		function getFlesnummer(val){
			if(isNaN(val)){
				$("#freeow").freeow("Opgepast", "Gelieve een correct flesnummer in te geven.", {
					classes: ["osx", "notice"],
					autoHide: false
				});	
				document.getElementById(idElement).value = "";
			}
			else
			{
				if ((jQuery.inArray( val, flesnummers ) === -1) || ((jQuery.inArray( val, flesnummers )) === "-1"))
				{
				}
				else
				{
					$("#freeow").freeow("Opgepast", "Dit flesnummer is al in gebruik. Gelieve een ander flesnummer te kiezen. ", {
					classes: ["osx", "notice"],
					autoHide: false
					});	
					document.getElementById(idElement).value = "";
				}
			}
		}
		
		function validateForm() {
			var AantalFlessen = document.getElementById("countFlesnummer").value;
			
			var count = 0;
			var errorCount = 0;
			
			while (count < AantalFlessen)
			{
				count++;
				var flesnaam = "Flesnummer" + count;
				var input = document.getElementById(flesnaam).value;
				
				if (input == null || input == "") {
					errorCount++;
				}
			}
			
			if (errorCount > 0) {
					$("#freeow").freeow("Opgepast", "Gelieve in elk invulveld een correct flesnummer in te geven alvorens u verder gaat.", {
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


<body style="zoom: 1;">
    <div id="wrap">
    	<div id="main">
		
          <div class="container_16">
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
				<div id="navigatie">
				<nav>
					<a id="menu-button" class="collapsed"></a>
					<ul id="main-menu" class="sm sm-clean collapsed">
<!-- 					  <li><bo>Backoffice</bo></li> -->
					  	<li><a href="./Backoffice.php" class="has-submenu" aria-haspopup="true" class="current">Backoffice homepage<span class="sub-arrow"> </i></span></a>
							<ul class="sm-nowrap" style="display: none; width: auto; min-width: 14em; max-width: 24em; top: auto; left: auto; margin-left: 0px; margin-top: 0px;">
							  <li><a href="./BO-KeurdersToevoegen.php">Keurders Toevoegen</a></li>
							  <li><a href="./BO-FlesnummersToevoegen.php">Flessen toevoegen aan teams</a></li>
							  <li><a href="./BO-InfoToevoegen.php">Info Bieren Toevoegen</a></li>
							  <li><a href="./BO-BierenToekennen.php">Bieren Toekennen</a></li>
							  <li><a href="./BO-ResultatenWeergeven.php">Resultaten Weergeven</a></li>
							  <li><a href="./BO-OpenstellingKeuring.php">Keuring Openstellen</a></li>
							</ul><span class="scroll-up" style="top: auto; left: auto; margin-left: 1px; width: 183.890625px; z-index: 301; margin-top: -184px; display: none;"><span class="scroll-up-arrow"></span></span><span class="scroll-down" style="top: auto; left: auto; margin-left: 1px; width: 183.890625px; z-index: 301; margin-top: 184px; display: none;"><span class="scroll-down-arrow"></span></span>
						</li>
					     <li><a href="http://www.mijnbier.be/nl/" class="">Website biercompetitie</a></li>
				
				<div style="float: right; size: 11px;">
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
				</div>
				
				</ul>
				</nav>
				</div>
            </div></div>
            <div class="clear"></div>


<!--             Hier wordt de container geopend waarin tekst, foto's, enzo in geplaatst kunnen worden. -->
            
			<form name = "FlesnummerForm" action="FlesnummersToevoegenCode.php" method="POST" onsubmit="return validateForm()">
            <div class="container_16">
            <br>
			
			<!-- Div voor alert-box weer te geven -->

			<div id="freeow" name="freeow" class="freeow freeow-top-right"></div>
			
            <div class="grid_16"><h1>Flessen toevoegen aan teams</h1></div>
            
			<div class="grid_9 minimum-except">
			<br>
			<kt>Vul een flesnummer in bij de teamnummers dat u aan elkaar wil koppelen, of laat de gegevens ongewijzigd. Klik vervolgens op 'Gegevens opslaan'.</kt>
			
			<br><br><br>
            
			
			<table class="table table-striped table-hover; research" style="border-collapse:collapse;">
                    <tr>
						<th class="active">Team ID</th>
						<th class="active">Teamnaam</th>
						<th class="active">Flesnummer</th>
                    </tr>
			<?php
				$count = 0;
				while ($row1 = mysqli_fetch_array($resultTeams)) 
				{
					$count += 1;
					$FlesnummerCount += 1;
					
			?>
				<tbody>
                    <tr id= "keurder">
                        <td><?php echo $row1['TeamID'] ?></td>
						<td><?php echo $row1['TeamNaam'] ?></td>
						<td>
						<input id ="Flesnummer<?php echo $count ?>" name="Flesnummer<?php echo $count ?>" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo $FlesnummerCount ?>" onchange= "getID(this.id); getFlesnummer(this.value);"><a onclick="refresh<?php echo $count ?>();" style="cursor: pointer;"><span class="glyphicon glyphicon-refresh"></span><a>
						</td>
                    </tr>
					<div style="display: none;"><input name="TeamID<?php echo $count ?>" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo $row1['TeamID'] ?>"></div>
					
					<script>
					var originalFlesnummer<?php echo $count ?> = "<?php echo $FlesnummerCount ?>";
					
					function refresh<?php echo $count ?>()
					{
						document.getElementById("Flesnummer<?php echo $count ?>").value = originalFlesnummer<?php echo $count ?>;
					}
					</script>
				</tbody>
			<?php

				}
				
				if ($count == 0)
				{
			?>
				<tbody>
					<tr>
						<td colspan="3" class="active"> </td>
					</tr>
                    <tr>
                        <td colspan="3" class="active"><i><strong>Alle flessen zijn toegevoegd en toegekend aan een team.</strong></i></td>
                    </tr>
					<tr>
						<td colspan="3" class="active"> </td>
					</tr>
				</tbody>
				
				<script>
				$(document).ready(function () {
					document.getElementById("Submit1").style.visibility = "hidden";
				});
				</script>
			<?php
				}
			?>
			</table>   
			  <div style="display: none;"><input id = "countFlesnummer" name="countFlesnummer" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo $count; ?>"></div>
              <div class="clear"></div>
              <br><br>
              <input type="submit" value="Gegevens opslaan" id="Submit1" name="Submit1" class="form-btn">
            </div>
            
              <div class="clear"></div>
            
            
              </div>
              </div>
              </div>
	 <div class="clear"></div>
          <BR>
	   <BR>
	 <BR>
	

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
