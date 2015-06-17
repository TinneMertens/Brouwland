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
	
	$selectTeams = "CALL SP_SelectFlesjes ();";
	$resultTeams = mysqli_query($conn, $selectTeams);
	
	$FlesnummerCount = 0;
						
	while ($row = mysqli_fetch_array($resultTeams)) {
		$FlesnummerCount += 1;
	}
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
			var checkInput = decodeURIComponent(getQueryVariable("kt")); //Keurder toegevoegd
			var firstname = decodeURIComponent(getQueryVariable("fn")); //Firstname
			var lastname = decodeURIComponent(getQueryVariable("ln")); //Lastname
			var fullname = firstname + ' ' + lastname;
			var checkInput2 = decodeURIComponent(getQueryVariable("ibt")); //Info bier toegevoegd
			var checkInput3 = decodeURIComponent(getQueryVariable("okg")); //Openstelling keuring gewijzigd
			
			if (checkInput === "true" ) {
				$("#freeow").freeow("Keurder toegevoegd", "De keurder '" + fullname + "' is succesvol toegevoegd.", {
					classes: ["osx", "pushpin"],
					autoHide: false
				});
			}
			
			if (checkInput2 === "true" ) {
				$("#freeow").freeow("Info toegevoegd", "De door u ingegeven extra informatie is succesvol toegevoegd aan het bier.", {
					classes: ["osx", "pushpin"],
					autoHide: false
				});
			}
			
			if (checkInput3 === "true" ) {
				$("#freeow").freeow("Data gewijzigd", "De data voor de openstelling van de keuring is succesvol gewijzigd.", {
					classes: ["osx", "pushpin"],
					autoHide: false
				});
			}			
		});
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
            
            <div class="container_16" style="height:300px">
            <br>
            <div class="grid_16"><a href="./BO-Dash.php"><h1><i class="fa fa-cog fa-spin"></i> Backoffice</h1></a></div>
			
			<div id="freeow" class="freeow freeow-top-right"></div>
            
			<div class="grid_9 minimum-except">
			<br>
			<div id="rd-button-orange">
   				<label>
      				<button type="submit" class="bo-btn" onclick="location.href='./BO-KeurdersToevoegen.php'">
      					Keurders toevoegen
      				</button>
   				</label>
			</div>
			
			<div id="rd-button-orange">
   				<label>
      				<button type="submit" class="bo-btn" onclick="location.href='./BO-FlesnummersToevoegen.php'">
      					<span class="badge"><?php echo $FlesnummerCount; ?></span> &nbsp Flessen toevoegen aan teams
      				</button>
   				</label>
			</div>		
			
			<div id="rd-button-orange">
   				<label>
      				<button type="submit" class="bo-btn" onclick="location.href='./BO-InfoToevoegen.php'">
      					Info bieren toevoegen
      				</button>
   				</label>
			</div>
			
			<div id="rd-button-orange">
   				<label>
      				<button type="submit" class="bo-btn"onclick="location.href='./BO-BierenToekennen.php'">
      					Bieren toekennen
      				</button>
   				</label>
			</div>
			
			<div id="rd-button-orange">
   				<label>
      				<button type="submit" class="bo-btn" onclick="location.href='./BO-ResultatenWeergeven.php'">
      					Resultaten weergeven
      				</button>
   				</label>
			</div>
			
			<div id="rd-button-orange">
   				<label>
      				<button type="submit" class="bo-btn" onclick="location.href='./BO-OpenstellingKeuring.php'">
      					Keuring openstellen
      				</button>
   				</label>
			</div>
			
            </div>
            
              <div class="grid_6 minimum-except">
              <br>
			  <br>
			  <br>
			  <br>
			  <br>
            	<p></p><figure><img src="Image/pic-bierbrouwen-11.jpg" alt="Brouwland Biercompetitie" class="img-default" width="400" height="250"></figure><p></p>
              </div>
              <div class="clear"></div>
            
            
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

</body>
</html>
