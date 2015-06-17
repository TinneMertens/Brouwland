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
			var checkInput = decodeURIComponent(getQueryVariable("ku"));
			var firstname = decodeURIComponent(getQueryVariable("fn"));
			var lastname = decodeURIComponent(getQueryVariable("ln"));
			var fullname = firstname + ' ' + lastname;
			
			if (checkInput === "true" ) {
				$("#freeow").freeow("Gegevens gewijzigd", "De gegevens van '" + fullname + "' zijn succesvol gewijzigd.", {
					classes: ["osx", "pushpin"],
					autoHide: false
				});
			}
		});			
		
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
				$("#freeow").freeow("Opgepast", "Gelieve alle velden in te vullen alvorens u uw gegevens opslaat.", {
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
		
		<?php
		
		//Session starten
		session_start();
		
		//Connectie met database maken
		include 'DAL.php';
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		//KeurderID opvragen
		$KeurderID = $_SESSION['KeurderID'];
		
		//Gegevens Keurder opvragen met behulp van KeurderID
		$KeurderGegevens = "SELECT * FROM tblkeurders WHERE tblkeurders.KeurdersID  = ($KeurderID)";
		$KeurderResult = mysqli_query($conn, $KeurderGegevens);
		$KeurderRow = mysqli_fetch_array($KeurderResult);
		
		//Postnummer van Keurder opvragen
		$PostnummerSQL = $KeurderRow['Postnummer'];
		$ZipSQL = "SELECT Postcode FROM tblpostcodes WHERE tblpostcodes.Postnummer  = ($PostnummerSQL)";
		$KeurderZip = mysqli_query($conn, $ZipSQL);
		$KeurderZipRow = mysqli_fetch_array($KeurderZip);
		
		//Land opvragen
		$LandSQL = $KeurderRow['Land'];
		$CountrySQL = "SELECT * FROM tbllanden WHERE tbllanden.LandID  = ($LandSQL)";
		$KeurderCountry = mysqli_query($conn, $CountrySQL);
		$KeurderCountryRow = mysqli_fetch_array($KeurderCountry);

		?>

</head>

<!-- Header -->
<!-- Hier wordt de bg-header (zie style.css -> head) op de pagina geplaatst. -->

<div id='head'><img src='Image/bg-header.jpg'></div>

<!-- Header -->


<body style="zoom: 1;">
    <div id="wrap">
    	<div id="main">
		
          <div class="container_16">
		  <div id="freeow" class="freeow freeow-top-right"></div>
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
					<div id="navigatie"><nav>
					<a id="menu-button" class="collapsed"></a>
					<ul id="main-menu" class="sm sm-clean collapsed">
					  <li><a href="http://www.mijnbier.be/nl/" class="">Home Biercompetitie</a></li>
					  <li><a href="./Login.php" class="">Login</a></li>
					  <li><a href="./AccountKeurder.php" class="current">Account</a></li>

					  <li><a class="has-submenu" aria-haspopup="false">Hulp nodig?<span class="sub-arrow"></i></span></a>
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
					  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
						</div>
					  
					</ul>
					</nav>
					</div>
            </div></div>
            <div class="clear"></div>

<!--             Hier wordt de container geopend waarin tekst, foto's, enzo in geplaatst kunnen worden. -->
         
	<?php 
	session_start();
	/*Als de session keurderid leeg is kan je niet op de pagina geraken.
	Dit controleert of er een keurder is aangemeld.*/
		
	if(empty($_SESSION['KeurderID']))
	{
	?>	
		
        <div class="container_16">
            <br>
            <div class="grid_16"><h1>Account Gegevens</h1></div>
				<div class="grid_9 minimum-except">
					<br>
					<kt>Gelieve eerst aan te melden alvorens u uw gegevens kan wijzigen.</kt>
						<div class="clear">
					</div>
					<BR><BR><BR><BR><BR><BR><BR><BR><BR>
					<a href="./Login.php"><i><strong>Klik hier om in te loggen.</strong></i></a>
                </div>
            </div>
		<div class="clear">
	</div>
    <BR><BR>	

	<?php	
		
	}
	else
	{
				
	?>
            <div class="container_16">
			<form name="form1" action="KeurdersUpdatenCode.php" method="POST" onsubmit="return validateForm()">
            <br>
            <div class="grid_16"><h1>Account Gegevens</h1></div>
            <div id="freeow" name="freeow" class="freeow freeow-top-right"></div>
			<div class="grid_9 minimum-except">
			<br>
			<kt>Hieronder kan u de gegevens die gekoppeld zijn aan uw account raadplegen.</kt>
			
			<br><br>
			<div class="form-item1" style="width:105px">
              Voornaam<span class="red">*</span>
            </div>
            <div class="form-item2">
                <input name="Firstname" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KeurderRow['Voornaam']); ?>">
            </div> 
			
			<div class="form-item1" style="width:105px">
              Familienaam<span class="red">*</span>
            </div>
            <div class="form-item1">
                <input name="Lastname" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KeurderRow['Familienaam']); ?>">
            </div> 
            
			<div class="clear"></div>
			
			<div class="form-item1" style="width:105px">
              Adres<span class="red">*</span>
            </div>
            <div class="form-item2">
                <input name="Address" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KeurderRow['Adres']); ?>">
            </div> 
	
			<div class="form-item1" style="width:105px">
              Land<span class="red">*</span>
            </div>
			<div class="form-item1">
				<select name="Country" id="Country" type="text" class="required inputveld" maxlength="100" aria-required="true">
					<option value="<?php $KeurderCountryNow = utf8_encode($KeurderCountryRow['LandID']);  echo $KeurderCountryNow; ?>">
						<?php echo utf8_encode($KeurderCountryRow['Land']) ?>
					</option>
					
					<?php
						$sql = "SELECT * FROM tbllanden";
						$result = mysqli_query($conn, $sql);

						while ($row = mysqli_fetch_array($result)) {
							if ($row['LandID'] != $KeurderCountryNow)
							{
								echo "<option value='" . $row['LandID'] . "'>" . utf8_encode($row['Land']) .  "</option>";
							}
						}
					?>
				</select>
			</div>
			
			<div class="form-item1" style="width:105px">
              Postcode<span class="red">*</span>
            </div>
            <div class="form-item2">
                <input name="Zip" id="Zip" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KeurderZipRow['Postcode']); ?>">
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
            <div id="div1-wrapper">
                <div id="CityRefresh" class="form-item1">
					<select name="City" id="City" type="text" class="required inputveld" maxlength="100" aria-required="true">
						<option value="<?php echo utf8_encode($KeurderRow['Postnummer']); ?>"><a><i><?php echo utf8_encode($KeurderRow['Stad']); ?></i></a></option>
					</select>
				</div>
            </div> 
            
			<div class="clear"></div>
			
			<div class="form-item1" style="width:105px">
              GSM<span class="red">*</span>
            </div>
            <div class="form-item2">
                <input name="Phone" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KeurderRow['GSM']); ?>">
            </div> 
			
			<div class="form-item1" style="width:105px">
              Email<span class="red">*</span>
            </div>
            <div class="form-item1">
                <input name="Email" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KeurderRow['Email']); ?>">
            </div> 
            
			<div class="clear"></div>
			
			<div class="form-item1" style="width:105px">
              Geslacht<span class="red">*</span>
            </div>
            <div class="form-item2">
                <select name="Gender" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo utf8_encode($KeurderRow['Geslacht']); ?>">
                	<option value="<?php echo utf8_encode($KeurderRow['Geslacht']); ?>"><?php echo utf8_encode($KeurderRow['Geslacht']); ?></option>
					<?php 
						if ($KeurderRow['Geslacht'] == "M")
						{
							$OtherGender = "V";
						}
						else
						{
							$OtherGender = "M";
						}
					?>
                	<option value="<?php echo $OtherGender; ?>"><?php echo $OtherGender; ?></option>
                </select>
            </div> 
	
			<div class="clear"></div>
			<br>
			<a href="./ChangePassword.php"><i><strong>Klik hier om uw wachtwoord te wijzigen.</strong></i></a>
			
              <br><br><br>
              <input type="submit" name="Submit1" class="form-btn" value="Gegevens wijzigen "/>
            </div>
            
              <div class="clear"></div>
            
            
              </div>
              </div>
              </div>
	 <div class="clear"></div>
          <BR>
		  </form>
		  
	<?php
	}
	?>
	
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
