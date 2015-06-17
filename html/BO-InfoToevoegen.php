<?php 		
	session_start();

	/*Als de session BrouwlandID leeg is kan je niet in de Backoffice geraken.
	Dit controleert of er een personeelslid van Brouwland is aangemeld, zo nee word je geleid naar de login pagina. */
		
	if(empty($_SESSION['BrouwlandID']))
	{
		header('Location: http://193.191.187.253:8052/Login.php?session=false');
		exit;
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
		$(document).ready(function () {
			var checkInput = decodeURIComponent(document.location.href.substring(document.location.href.indexOf("check=") + 6));
			
			if (checkInput === "false" ) {
						$("#freeow").freeow("Verkeerd Flesnummer", "Gelieve een flesnummer in te geven dat bestaat.", {
							classes: ["osx", "notice"],
							autoHide: false
						});
						return false;
					}
					else{
						return true;
					}
		});
		
		
		function getFlesnummer(val){
			if(isNaN(val)){
				$("#freeow").freeow("Opgepast", "Gelieve een correct flesnummer in te geven.", {
					classes: ["osx", "notice"],
					autoHide: false
				});	
				document.getElementById("flesnummer").value = "";
			}
			else
			{
				var FlesnummerInput = document.getElementById('flesnummer');
				function useValue() {
					   var FlesnummerInfoValue = FlesnummerInput.value;

					   $("#FlesInfoRefresh").load("http://193.191.187.253:8052/FlesInfo.php?flesnummer=" + FlesnummerInfoValue);
				}

				FlesnummerInput.onchange = useValue;  
				FlesnummerInput.onblur = useValue;
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
            
			<form action="InfoToevoegenCode.php" method="POST" onsubmit="return validateForm()">
            <div class="container_16">
            <br>
			
			<!-- Div voor alert-box weer te geven -->

			<div id="freeow" name="freeow" class="freeow freeow-top-right"></div>
			
            <div class="grid_16"><h1>Info bieren toevoegen</h1></div>
            
			<div class="grid_9 minimum-except">
			<br>
			<kt>Vul de flesnummer in van het bier waaraan u extra informatie wil toekennen</kt>
			
			<br><br>
			<div class="form-item1" style="width:100px">
             
              Flesnummer<span class="red">*</span>
              </div>
              <div class="form-item2">
                <input name="flesnummer" id="flesnummer" type="text" class="required inputveld" maxlength="100" aria-required="true" onchange= "getFlesnummer(this.value);" >
              </div> 
			
			<div class="clear"></div>
			

			
			 <div class="form-item1">
             
              Extra informatie:<span class="red">*</span>
              </div>
              <div class="clear"></div>
              
<!--               	<input name="txtinfo" class="textarea"></input> -->
			   <div id="FlesInfoRefresh">
               <textarea name="txtinfo" class="textarea3" placeholder="Geef hier uw extra informatie in." rows="5" cols="45"></textarea>
			   </div>
              <div class="clear"></div>
              <br>
              <input type="submit" value="Informatie toevoegen" name="Submit1" class="form-btn">
            </div>
            
              <div class="grid_6 minimum-except">
              <br>
            	<p></p><figure><img src="Image/pic-jury.jpg" alt="Brouwland Biercompetitie" class="img-default" width="400" height="250"></figure><p></p>
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
