<?php 
session_start();
?>
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
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.js" type="text/javascript"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js" type="text/javascript"></script>
		
	<!-- freeow - alertbox bij error -->
	<link rel="stylesheet" type="text/css" href="CSS/freeow/freeow.css" />		
	<script type="text/javascript" src="js/jquery.freeow.js"></script>		
		
	<script type="text/javascript">
		
		<!-- Koppeling met PHP code (controle flesnummer) -->
		$(document).ready(function () {
			var checkInput = decodeURIComponent(document.location.href.substring(document.location.href.indexOf("check=") + 6));
			
			if (checkInput === "false" ) {
						$("#freeow").freeow("Opgepast", "Gelieve de flesnummer in te geven van het bier dat u is toegewezen.", {
							classes: ["osx", "notice"],
							autoHide: false
						});
						return false;
					}
					else{
						return true;
					}
		});
		
		<!-- Controleert of dat er geen letters, bewerkingen, ... ingevuld werden in het inputfield.  -->
		function validateForm() {
			var flesnummerInput = document.getElementById("flesnummer").value;
				
			if (flesnummerInput === null || flesnummerInput === "") {
				$("#freeow").freeow("Opgepast", "Gelieve de flesnummer in te geven van het bier dat u moet keuren.", {
					classes: ["osx", "notice"],
					autoHide: false
				});
				return false;
			}
			else{
				if(isNaN(flesnummerInput)){
					$("#freeow").freeow("Opgepast", "Gelieve een geldige flesnummer in te geven.", {
						classes: ["osx", "notice"],
						autoHide: false
					});							
					document.getElementById("flesnummer").value = "";
				}
				else {
					return true;
				}
			}
		}
		
		<!-- Voorkomt dat we terug kunnen gaan met de back pijltjes van de browser. -->
		window.history.forward();
		function disableBack() 
		{
			 window.history.forward();
		}
		</script>
		
		<?php
		
			/*Als de session keurderid leeg is kan je niet in de voorkeuring geraken.
			Dit controleert of er een keurder is aangemeld, zo ja kan je keuren, zo nee word je geleid naar de login pagina. */
		session_start();
			if(empty($_SESSION['KeurderID']))
			{
				header('Location: http://193.191.187.253:8052/Login.php?session=false');
				exit;
			}
			
			include 'CheckOpenstellingKeuring.php';		
		?>

</head>

<!-- Header -->
<!-- Hier wordt de bg-header (zie style.css -> head) op de pagina geplaatst. -->

<div id='head'><img src='Image/bg-header.jpg'></div>

<body style="zoom: 1;" onload="disableBack();" onpageshow="if(event.persisted) disableBack();">
<!-- form action zorgt ervoor dat de PHP code wordt gekoppeld. -->
<form action="FlesnummerCode.php" method="POST" onsubmit="return validateForm()">
    <div id="wrap">
        <div id="main">
		
        <div class="container_16">
            <div class="grid_16">
                <!-- De "topboxes" bovenaan de pagina van Facebook, Twitter, Youtube en Frans -->
				<header>
					<img src="Image/logo-brouwland-biercompetitie-nl.png" alt="Brouwland Biercompetitie">
					<div id="topbox">
						<div class="item">
							<a href="http://www.facebook.com/mijnbier" target="_blank">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x fa-inverse"></i>
									<i class="fa fa-facebook-square fa-stack-1x btn-facebook"></i>
								</span>
							<a>
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
				<!-- De navigatiebalk -->
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
		
		<!-- /Header -->
        <div class="clear"></div>
			   
		<!-- body -->
		<!-- freeow zorgt ervoor dat de error messages in de rechterbovenhoek worden weergegeven. -->
		<div id="freeow" class="freeow freeow-top-right"></div>
            <div class="container_16">
				<br>
				<div class="grid_16">
					<h1>Flesnummer</h1>
				</div>
				<br>
				<div class="clear"></div>
           
				<div class="grid_9 minimum-except">
					<h5>
						<strong>Gelieve het flesnummer van het bier dat u is toegewezen in te geven.</strong>
					</h5>
					<br>
					<div class="form-item1">
						<strong>Flesnummer</strong>
					</div>
					<div class="form-item2">
						<input name="flesnummer" id="flesnummer" type="text" class="required inputveld" maxlength="100" aria-required="true">
					</div>
					<br><br><br><br><br><br><br><br>
				</div>
     	    
				<div class="grid_24 minimum-except">
					<button type="submit" class="next-btn" name="btnNext">
						Volgende<span class="glyphicon glyphicon-chevron-right"></span>
					</button>
				</div>
				<div class="clear"></div>
				<br><br>
			</div>
		</div>
		<div class="clear"></div>     	
		<!-- /body -->
		
		<!-- footer -->
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
				<!-- topboxes onderaan de pagina -->
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
