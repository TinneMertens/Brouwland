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
	<script>
		//zorgt ervoor dat de functionaliteit van het back pijltje van de browser niet meer werkt
		window.history.forward();
	    function disableBack(){
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
	<form action="AlgemeenTotaal.php" method="POST">
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
									<a href="./Keuringsformulier-AlgemeenTotaal.php?taal=1" class="language">NL</a>
								</div>
								<div class="item">	
									<a href="./Keuringsformulier-AlgemeenTotaal.php?taal=2" class="language">FR</a>
								</div>
								<div class="item">
									<a href="./Keuringsformulier-AlgemeenTotaal.php?taal=3" class="language">EN</a>
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
										<a href="./Registratie.php" class="" >Deelnemen</a>
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
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				
				<!-- Algmeen totaal -->
				<div class="container_16">
					<BR>
					<div class="grid_16">
						<h1>Algemeen totaal</h1>
					</div>
					<div class="clear"></div>
					<div class="grid_17 minimum-except">          
						<kt1>Hieronder kan u het algemeen totaal van de punten van het keuringsformulier vinden.</kt1><br>
						<br>	
						<div class="grid_25 minimum-except">
							<?php 
								/* Zorgt voor de verschillende talen, standaard is het nederlands*/
								$TaalID = 1;
								 
								if(isset($_GET["taal"])){
									$TaalID = $_GET["taal"];
								}
								 
								 
								$flesjesID = $_SESSION['flesnummer'];
							  
								$keurderID = $_SESSION['KeurderID']; 
							?>
							<table style="width:820px;">
								<tr>
									<td>
										<div class="grid_21 minimum-except">           
											<div id="tile-orange-subtotal-category">
												<label style="width:300px; height:50px; padding:10px">
													<span>Subtotaal Visuele aspecten</span>
												</label>
											</div>			 
											<div id="tile-orange-subtotal-category">
												<label style="width:300px; height:50px; padding:10px">
													<span>Subtotaal Geur</span>
												</label>
											</div>
											<div id="tile-orange-subtotal-category">
												<label style="width:300px; height:50px; padding:10px">
													<span>Subtotaal Smaak</span>
												</label>
											</div>
											<div id="tile-orange-subtotal-category">
												<label style="width:300px; height:50px; padding:10px">
													<span>Subtotaal Algemene Informatie</span>
												</label>
											</div>
										</div>
									</td>
									<td>
										<div class="grid_22 minimum-except">
											<?php 
												//ophalen van de punten van de visuele aspecten
												$conn = mysqli_connect($servername, $username, $password, $dbname);
												$PuntVA = "CALL SP_SumVisueleAspecten($flesjesID, ($keurderID))";
												$VA = mysqli_query($conn, $PuntVA);
												$point = mysqli_fetch_row($VA);
											?>            
											<div id="tile-orange-subtotal-categoryp">
												<label style="height:50px; padding:10px 3px">
													<span>
														<label id="lblVisueleAspecten"><?php echo $point[0];?></label>
													</span>
												</label>
											</div>		 
											 <?php 
												//ophalen van de punten van de geur
												$conn = mysqli_connect($servername, $username, $password, $dbname);
												$PuntVA = "CALL SP_SelectGeur($flesjesID, ($keurderID))";
												$VA = mysqli_query($conn, $PuntVA);
												$geur = mysqli_fetch_row($VA);
												
											?>
											<div id="tile-orange-subtotal-categoryp">
												<label style="height:50px; padding:10px 3px">
													<span><label id="lblGeur"><?php echo $geur[0];?></label></span>
												</label>
											</div>
											<?php 
												//ophalen van de punten van de smaak
												$conn = mysqli_connect($servername, $username, $password, $dbname);
												$PuntVA = "CALL SP_SelectSmaak($flesjesID, ($keurderID))";
												$VA = mysqli_query($conn, $PuntVA);
												$smaak = mysqli_fetch_row($VA);
											?>
											<div id="tile-orange-subtotal-categoryp">
												<label style="height:50px; padding:10px 3px">
													<span><label id="lblSmaak"><?php echo $smaak[0];?></label></span>
												</label>
											</div>		 
											<?php 
												//ophalen van de punten van de algemene keuring
												$conn = mysqli_connect($servername, $username, $password, $dbname);
												$PuntVA = "CALL SP_SumAlgemeneKeuring($flesjesID, ($keurderID))";
												$VA = mysqli_query($conn, $PuntVA);
												$AK = mysqli_fetch_row($VA);
												
											?>
											<div id="tile-orange-subtotal-categoryp">
												<label style="height:50px; padding:10px 3px">
													<span><label id="lblAlgemeneInfo"><?php echo $AK[0];?></label></span>
												</label>
											</div>		 
										</div>
									</td>
									<td>
										<div id="tile-orange-subtotal-categoryp">
											<label style="height:50px; padding:10px 0px">
												<span>op</span>
											</label>
										</div>			 
										<div id="tile-orange-subtotal-categoryp">
											<label style="height:50px; padding:10px 0px">
												<span>op</span>
											</label>
										</div>			 
										<div id="tile-orange-subtotal-categoryp">
											<label style="height:50px; padding:10px 0px">
												<span>op</span>
											</label>
										</div>			 
										<div id="tile-orange-subtotal-categoryp">
											<label style="height:50px; padding:10px 0px">
												<span>op</span>
											</label>
										</div>
									</td>
									<td>
										<div id="tile-orange-subtotal-categoryp">
											<label style="height:50px; padding:10px 0px">
												<span>10</span>
											</label>
										</div>			 
										<div id="tile-orange-subtotal-categoryp">
											<label style="height:50px; padding:10px 0px">
												<span>25</span>
											</label>
										</div>			 
										<div id="tile-orange-subtotal-categoryp">
											<label style="height:50px; padding:10px 0px">
												<span>15</span>
											</label>
										</div>			 
										<div id="tile-orange-subtotal-categoryp">
											<label style="height:50px; padding:10px 0px">
												<span>50</span>
											</label>
										</div>
									</td> 
									<td>
										<div class="grid_21 minimum-except">
											<?php 
												//eindtotaal
												$result = $point[0] + $geur[0] + $smaak[0] + $AK[0];
											?>
											<div id="tile-orange-subtotal-total" style="height:246px">
												<label style="padding:40px 5px">
													<span>
														<label id="lblTotaal"><?php echo $result;?></label>
													</span> 
												</label>
											</div>
										</div>
									</td>
									<td>            		
										<div class="grid_23 minimum-except">
											<div id="tile-orange-subtotal-total-text" style="height:246px">
												<label style="padding:40px 1px">
													<span>OP</span> 
												</label>
											</div>
										</div>
									</td>         		
									<td>
										<div class="grid_21 minimum-except">
											<div id="tile-orange-subtotal-total" style="height:246px">
												<label style="padding:40px 0px">
													<span>100</span> 
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
							<strong>Klik op 'Volgende' om verder te gaan met de keuring.</strong>
						</kt1>
					</div>
					<div class="clear"></div>
					<br><br><br><br>           
					<div class="grid_24 minimum-except">
						<form action="AlgemeenTotaal.php" method="POST">
							<button type="submit" class="next-btn" name="delete" >
								Volgende<span class="glyphicon glyphicon-chevron-right"></span>
							</button>
						</form>
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

