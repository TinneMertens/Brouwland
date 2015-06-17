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

		<link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/style.css" media="screen">
		<link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/grid.css" media="screen">
        <link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/nav.css" media="screen">
        <link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/normalize.css" media="screen">
        <link rel="stylesheet" type="text/css" href="http://193.191.187.253:8052/CSS/print.css" media="print"> 
        <link rel='stylesheet' href='http://193.191.187.253:8052/CSS/bootstrap.min.css'>
        

		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
		
		<script src="http://bootstrapdocs.com/v2.0.2/docs/assets/js/bootstrap-collapse.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="http://193.191.187.253:8052/js/jquery-2.1.1.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-2.1.1.min.js"><\/script>')</script>
        <script src="http://193.191.187.253:8052/js/global.js" type="text/javascript"></script>		
		<script src="http://193.191.187.253:8052/js/jquery.smartmenus.js" type="text/javascript"></script>
		<script src="http://193.191.187.253:8052/js/nav.js" type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.js" type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js" type="text/javascript"></script>
		
		<!-- Include Bootstrap Datepicker -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
		<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>	
		
		<!-- freeow -->
		<link rel="stylesheet" type="text/css" href="CSS/freeow/freeow.css" />		
		<script type="text/javascript" src="js/jquery.freeow.js"></script>	
		
		<?php 
		
			include 'DAL.php';

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			
			$DataSQL =  "SELECT * FROM tbldatakeuringopen";
			$DataSQLResult = mysqli_query($conn, $DataSQL);
			$DataRow = mysqli_fetch_array($DataSQLResult);
			
			$startDate = $DataRow['BeginDatum'];
			$endDate = $DataRow['EindDatum'];
			$startHour = $DataRow['BeginUur'];
			$endHour = $DataRow['EindUur'];
		?>
		
		<script>
		function message() {
			$("#freeow").freeow("Openstelling keuring", "De keuring is momenteel toegankelijk van <?php echo $startDate; ?>, <?php echo $startHour; ?>u tot <?php echo $endDate; ?>, <?php echo $endHour; ?>u.", {
					classes: ["osx", "pushpin"],
					autoHide: false
			});
		}
		
		window.onload = message;
		
		function validateString(string) {
			if (string === "" || string === null)
			{
				return true;
			}
		}
				
		function validateForm() {
			var startDate = document.forms["form1"]["startdate"].value;
			var endDate = document.forms["form1"]["enddate"].value;
			var startHour = document.forms["form1"]["starthour"].value;
			var endHour = document.forms["form1"]["endhour"].value;
			
			if (
			validateString(startDate) || 
			validateString(endDate) || 
			validateString(startHour) || 
			validateString(endHour)
			)
			{
				$("#freeow").freeow("Opgepast", "Gelieve alle velden in te vullen alvorens u de data opslaat.", {
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

<div id='head'><img src='http://193.191.187.253:8052/Image/bg-header.jpg'></div>

<!-- Header -->


<body style="zoom: 1;">

<!-- Vervang hieronder de '#' door de PHP-file die jullie willen laten uitvoeren als er op de 'submit-knop' geklikt wordt -->

<form name="form1" action="./OpenstellingKeuringCode.php" method="POST" onsubmit="return validateForm()">
    <div id="wrap">
    	<div id="main">
		
          <div class="container_16">
            <div class="grid_16">
                <header>
                <img src="http://193.191.187.253:8052/Image/logo-brouwland-biercompetitie-nl.png" alt="Brouwland Biercompetitie">
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
            </div>
            </div>
            <div class="clear"></div>

<!--             Hier wordt de container geopend waarin tekst, foto's, enzo in geplaatst kunnen worden. -->
            
            <div class="container_16">
            <br>
            <div class="grid_16"><h1>Openstelling keuring</h1></div>
            <div id="freeow" class="freeow freeow-top-right"></div>
			<div class="grid_9 minimum-except">
			<br>
			<strong><kt>Hier kan u instellen tussen welke data de keuring toegankelijk mag zijn voor de keurders.</kt></strong>
			
			<br><br>
				
			<div class="form-item1" style="width:100px">
              Begindatum:
            </div>
            <div class="form-item2">   
			  <div class="form-group" >
					<div class="col-xs-5 date">
						<div class="input-group input-append date" id="datePicker1">
							<input type="text" class="form-control" name="startdate" style="width: 130px;"/>
							<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
						</div>
					</div>
				</div>	
			</div> 
			<div class="clear"></div>
			
			<br>
			
			<div class="form-item1" style="width:100px">
              Beginuur:
            </div>
            <div class="form-item2" style="margin-left: 16px;">
				<div class="input-group input-append date" id="idstarthour">
					<input name="starthour" type=time min=00:00 max=23:59 style="border-radius: 5px; padding-left: 10px; font-size:14px;">
				</div>	
			</div> 
            <div class="clear"></div>
			
			<br><br>
			
			<div class="form-item1" style="width:100px">
              Einddatum:
            </div>
            <div class="form-item2">  
			  <div class="form-group" >
					<div class="col-xs-5 date">
						<div class="input-group input-append date" id="datePicker2">
							<input type="text" class="form-control" name="enddate" style="width: 130px;"/>
							<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
						</div>
					</div>
				</div>
			</div> 
            <div class="clear"></div>
			
			<br>
			
			<div class="form-item1" style="width:100px">
              Einduur:
            </div>
            <div class="form-item2" style="margin-left: 16px;">
				<div class="input-group input-append date" id="idendhour">
					<input name="endhour" type=time min=00:00 max=23:59 style="border-radius: 5px; padding-left: 10px; font-size:14px;">
				</div>	
			</div> 
            <div class="clear"></div>
			
			   <br><br><br><br>
              <input type="submit" value="Instellingen opslaan " name="Submit1" class="form-btn">
            </div>
            
              <div class="clear"></div>
            
              </div>
              </div>
              </div>
			<div class="clear"></div>
          <BR>
	   <BR>
	 <BR>
	 
	 <script>
		$(document).ready(function() {
			$('#datePicker1')
				.datepicker({
					format: 'dd/mm/yyyy'
				})
				.on('changeDate', function(e) {
					// Revalidate the date field
					$('#eventForm').formValidation('revalidateField', 'date');
				});
		});
		
		$(document).ready(function() {
			$('#datePicker2')
				.datepicker({
					format: 'dd/mm/yyyy'
				})
				.on('changeDate', function(e) {
					// Revalidate the date field
					$('#eventForm').formValidation('revalidateField', 'date');
				});
		});
	</script>

     <div id="footer">     <div class="footer-box">
     	<div class="item first"><a href="http://www.brouwland.com" target="_blank"><img src="http://193.191.187.253:8052/Image/logo-brouwland.png" alt="Brouwland"></a></div>
        <div class="item questions"><i class="fa fa-comments fa-2x btn-nolink"></i> Nog vragen?<p>Neem contact op via <span class="emailCloak"><a href="mailto:info@mijnbier.be">info@mijnbier.be</a></span></p></div>
        <div class="item last">
          <a href="../fr/" class="language"><span class="fa-stack fa-lg">FR</span></a>
          <a href="http://www.facebook.com/mijnbier" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x fa-inverse"></i><i class="fa fa-facebook-square fa-stack-1x btn-facebook"></i></span></a>
		  <a href="https://twitter.com/MijnEigenBier" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x fa-inverse"></i><i class="fa fa-twitter fa-stack-1x btn-twitter"></i></span></a>
          <a href="http://www.youtube.com/bierbrouwen" target="_blank"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x fa-inverse"></i><i class="fa fa-youtube fa-stack-1x btn-youtube"></i></span></a>
        </div>
     </div>
</div>
</form>
</body>
</html>
