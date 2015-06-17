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
		
		<script src="/Check-Team-Address-Phone-Mail.php" type="text/javascript"></script>
		
		<!-- freeow -->
		<link rel="stylesheet" type="text/css" href="CSS/freeow/freeow.css" />		
		<script type="text/javascript" src="js/jquery.freeow.js"></script>			
		
		<script>
		function validateString(string) {
			if (string === "" || string === null)
			{
				return true;
			}
		}
				
		function validateForm() {
			var firstname = document.forms["form1"]["Firstname"].value;
			var lastname = document.forms["form1"]["Lastname"].value;
			var address = document.forms["form1"]["Address"].value;
			var zip = document.forms["form1"]["Zip"].value;
			var city = document.forms["form1"]["City"].value;
			var country = document.forms["form1"]["Country"].value;
			var phone = document.forms["form1"]["Phone"].value;
			var email = document.forms["form1"]["Email"].value;
			var gender = document.forms["form1"]["Gender"].value;
		
			var errorCount = 0;
			
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
				$("#freeow").freeow("Opgepast", "Gelieve alle velden in te vullen alvorens u verder gaat.", {
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
            
			<form name="form1" action="KeurdersToevoegenCode.php" method="POST" onsubmit="return validateForm()">
            <div class="container_16">
			<div id="freeow" name="freeow" class="freeow freeow-top-right"></div>
            <br>
            <div class="grid_16"><h1>Keurder toevoegen</h1></div>
            
			<div class="grid_9 minimum-except">
			<br>
			<kt>Hieronder kan u de informatie invullen dat nodig is om een keurder te kunnen toevoegen.</kt>
			
			<br><br>
			<div class="form-item1" style="width:105px">
              Voornaam<span class="red">*</span>
            </div>
            <div class="form-item2">
                <input name="Firstname" type="text" class="required inputveld" maxlength="100" aria-required="true" >
            </div> 
			
			<div class="form-item1" style="width:105px">
              Familienaam<span class="red">*</span>
            </div>
            <div class="form-item1">
                <input name="Lastname" type="text" class="required inputveld" maxlength="100" aria-required="true" >
            </div> 
            
			<div class="clear"></div>
			
			<div class="form-item1" style="width:105px">
              Adres<span class="red">*</span>
            </div>
            <div class="form-item2">
                <input name="Address" type="text" class="required inputveld" maxlength="100" aria-required="true" onchange="getAddress(this.value, this.name);">
            </div> 
	
			<div class="form-item1" style="width:105px">
				Land<span class="red">*</span>
			</div>
			
			<div class="form-item1">
				<select name="Country" id="Country" type="text" class="required inputveld" maxlength="100" aria-required="true">
					<option value=''>
						<a>
							<i>Kies uw land</i>.
						</a>
					</option>
					<?php
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						$sql = "SELECT * FROM tbllanden";
						$result = mysqli_query($conn, $sql);
						while ($row = mysqli_fetch_array($result)) {
							echo "<option value='" . $row['LandID'] . "'>" . utf8_encode($row['Land']) .  "</option>";
						}
					?>
				</select>
            </div>
			
			<div class="form-item1" style="width:105px">
              Postcode<span class="red">*</span>
            </div>
            <div class="form-item2">
                <input name="Zip" id="Zip" type="text" class="required inputveld" maxlength="100" aria-required="true" >
            </div> 
			
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
			
			<div class="form-item1" style="width:105px">
				Stad/Gemeente<span class="red">*</span>
            </div>
			
            <div id="div1-wrapper" class="form-item1">
                <div id="CityRefresh" >
					<select name="City" id="City" type="text" class="required inputveld" maxlength="100" aria-required="true" >
						<option value='CityInput'><a><i>Vul eerst de postcode in</i>.</a></option>
					</select>
				</div>
            </div> 
	
            <!--<div id="CountryRefresh" class="form-item1">
                <input name="Country" type="text" class="required inputveld" maxlength="100" aria-required="true" >
            </div>--> 
            
			<div class="clear"></div>
			
			<div class="form-item1" style="width:105px">
              GSM<span class="red">*</span>
            </div>
            <div class="form-item2">
                <input name="Phone" type="text" class="required inputveld" maxlength="100" aria-required="true" onchange="getPhone(this.value, this.name);">
            </div> 
			
			<div class="form-item1" style="width:105px">
              Email<span class="red">*</span>
            </div>
            <div class="form-item1">
                <input name="Email" type="text" class="required inputveld" maxlength="100" aria-required="true" onchange="getEmail(this.value, this.name);">
            </div> 
            
			<div class="clear"></div>
			
			<div class="form-item1" style="width:105px">
              Geslacht<span class="red">*</span>
            </div>
            <div class="form-item2">
                <select name="Gender" type="text" class="required inputveld" maxlength="100" aria-required="true" >
                	<option value="M">M</option>
                	<option value="V">V</option>
                </select>
            </div> 
	
			<div class="clear"></div>
			
              <br><br><br>
              <input type="submit" value="Keurder toevoegen" name="Submit1" class="form-btn">
            </div>
            
              <div class="clear"></div>
            
            
              </div>
              </div>
              </div>
	 <div class="clear"></div>
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
