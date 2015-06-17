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
			
	$selectFlesnr = "SELECT FlesjesID FROM tblflesjes ORDER BY FlesjesID";
	$resultFlesnr = mysqli_query($conn, $selectFlesnr);
	
	$selectKeurders = "SELECT * FROM tblkeurders";
	$resultKeurders = mysqli_query($conn, $selectKeurders);
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
			//Message dat flessen aan keurder zij toegevoegd.
			
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
				var checkInput = decodeURIComponent(getQueryVariable("bt"));
				
				if (checkInput === "true" ) {
					$("#freeow").freeow("Flesjes Toegevoegd", "De flesjes zijn succesvol aan de keurder toegevoegd.", {
						classes: ["osx", "pushpin"],
						autoHide: false
					});
				}
			});
		
		
			//Checkboxes
			$(function () {
				$('.button-checkbox').each(function () {

					// Settings
					var $widget = $(this),
						$button = $widget.find('button'),
						$checkbox = $widget.find('input:checkbox'),
						color = $button.data('color'),
						settings = {
							on: {
								icon: 'glyphicon glyphicon-check'
							},
							off: {
								icon: 'glyphicon glyphicon-unchecked'
							}
						};

					// Event Handlers
					$button.on('click', function () {
						$checkbox.prop('checked', !$checkbox.is(':checked'));
						$checkbox.triggerHandler('change');
						updateDisplay();
					});
					$checkbox.on('change', function () {
						updateDisplay();
					});

					// Actions
					function updateDisplay() {
						var isChecked = $checkbox.is(':checked');

						// Set the button's state
						$button.data('state', (isChecked) ? "on" : "off");

						// Set the button's icon
						$button.find('.state-icon')
							.removeClass()
							.addClass('state-icon ' + settings[$button.data('state')].icon);

						// Update the button's color
						if (isChecked) {
							$button
								.removeClass('btn-default')
								.addClass('btn-' + color + ' active');
						}
						else {
							$button
								.removeClass('btn-' + color + ' active')
								.addClass('btn-default');
						}
					}

					// Initialization
					function init() {

						updateDisplay();

						// Inject the icon if applicable
						if ($button.find('.state-icon').length == 0) {
							$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
						}
					}
					init();
				});
			});	
		</script>
		
		<!-- Zorgt voor collapse-functie -->
		<script type="text/javascript">
			$(document).on('click', '.panel div.clickable', function (e) {
				var $this = $(this);
				if (!$this.hasClass('panel-collapsed')) {
					$this.parents('.panel').find('.panel-body').slideUp();
					$this.addClass('panel-collapsed');
					$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
				} else {
					$this.parents('.panel').find('.panel-body').slideDown();
					$this.removeClass('panel-collapsed');
					$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
				}
			});
			$(document).ready(function () {
				$('.panel-heading span.clickable').click();
				$('.panel div.clickable').click();
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
            
			<form name="form1" action="BierenToekennenCode.php" method="POST">
            <div class="container_16">
			<div id="freeow" class="freeow freeow-top-right"></div>
            <br>
            <div class="grid_16"><h1>Bieren toekennen</h1></div>
            
			<div class="grid_9 minimum-except">
			<br>
			<kt><b>Klik op de flesnummers van de bieren waaraan u een keurder wilt toekennen</b></kt>
			
			<br><br>
			</div>
			<div class="col-md-8">
				<div class="panel panel-default" style="width: 400px;">
					<div class="panel-heading clickable">
						<h2 class="panel-title" style="font-size: 13px;">Flessen</h2>
						<span class="pull-right">
							<i class="glyphicon glyphicon-chevron-down"></i>
						</span>
					</div>
					<div class="panel-body" style="display: none;">	
				  <div>
				  <table style="width:100%">
				  <tr>
				  <?php
						$count = 0;
						
						while ($row = mysqli_fetch_array($resultFlesnr)) {
							$count += 1;
							echo '<td style="text-align:center;">';
							echo '<span class="button-checkbox">';
							echo '<button type="button" class="btn btn-primary active" data-color="primary" style="margin-top: 15px;">';
							echo '<i class="state-icon glyphicon glyphicon-check">';
							echo '</i>';
							echo "&nbsp;Fles " . $row['FlesjesID'];
							echo '</button>';
							echo '<input name="FlesjesID' . $count . '" value="' . $row['FlesjesID'] . '" type="checkbox" class="hidden">';
							echo '</span>' . " ";
							echo '</td>';
							
							if (is_int($count / 3))
							{
								echo '</tr>';
								echo '<tr>';
							}
						}
					?>
				</tr>	
				</table>
              </div> 
			  </div>
			</div>
			</div>
			<div class="clear"></div>
			
			<div class="grid_9 minimum-except">
			<br>
			<kt><b>Kies een keurder die dit bier gaat keuren.</b></kt><br><br>
			<div class="clear"></div>
			 <div class="form-item1" style="width:100px">
             
             Keurder:<span class="red">*</span>
              </div>
     		<div class="form-item2">
     			<select name="Keurder" type="text" class="required inputveld" maxlength="100" aria-required="true" >
				<?php
					while ($row = mysqli_fetch_array($resultKeurders)) {
						echo "<option value='" . $row['KeurdersID'] . "'>" . $row['Voornaam'] . " " . $row['Familienaam'] . "</option>";
					}
				?>
                </select>
     		</div>
			
			<div class="clear"></div>
			
				<div style="display: none;">
					<input name="AantalFlessen" id="AantalFlessen" type="text" class="required inputveld" maxlength="100" aria-required="true" value="<?php echo $count; ?>">
				</div>
				
				<div class="clear"></div>
			
               <br><br>
              <button style= "margin-left: 0px;" type="submit" class="previous-btn" name="b1">
	 				Keurder toekennen
	 			</button>
				<br><br>
            </div>
            
              <div class="clear"></div>
			  
			<div class="grid_9 minimum-except">
			<br><br><br>
			<script>
				$(function() {
				  $(".research tr:not(.accordion)").hide();
				  $(".research tr:first-child").show();
				  $(".research tr.accordion").click(function(){
				  $(this).nextAll("tr").fadeToggle("fast");
					});
				  });
			</script>
			
			<h1>Overzicht Keurders</h1>
            <div>
			<br>
			<kt><b>Klik op een keurder om te kunnen bekijken welke bier ze moeten keuren.</b></kt>
			
			<br><br><br>
			</div>
			<?php
				$KeurdersInfoQuery = "SELECT KeurdersID, Voornaam, Familienaam FROM tblkeurders";
				$KeurdersInfoSQL = mysqli_query($conn, $KeurdersInfoQuery);
				
				
			?>
			
			<table class="table table-striped table-hover; research" style="border-collapse:collapse;">
                    <tr>
						<th class="active">Keurder ID</th>
						<th class="active">Naam keurder</th>
                    </tr>
			<?php
				
				while ($row1 = mysqli_fetch_array($KeurdersInfoSQL)) 
				{
					$FlesnummersString = "";
					
					$KeurderIDNOW = $row1['KeurdersID'];
					$FlesjesPerKeurderQuery = "SELECT FlesjesID FROM tblflesjeskeurders WHERE KeurdersID = ($KeurderIDNOW)";
					$FlesjesPerKeurderSQL = mysqli_query($conn, $FlesjesPerKeurderQuery);
				
					while ($row2 = mysqli_fetch_array($FlesjesPerKeurderSQL)) 
					{
						$FlesID = $row2['FlesjesID'];
						$FlesnummersString .=  strval($FlesID) . str_repeat('&nbsp;', 3);
					}
				
					if ($FlesnummersString == "")
					{
						$FlesnummersString = "Geen flessen.";
					
			?>
				<tbody>
                    <tr id= "keurder" class="accordion" style="cursor: pointer;">
                        <td class="danger"><?php echo $row1['KeurdersID'] ?></td>
						<td class="danger"><?php echo $row1['Voornaam'] . " " . $row1['Familienaam']?></td>
                    </tr>
					<tr>
                        <td><strong>Flesnummers:  </strong><i> <?php echo str_repeat('&nbsp;', 2) . $FlesnummersString ?></i></td>
						<td> </td>
                    </tr>
				</tbody>
			<?php
					}
					else
					{
			?>
				<tbody>
                    <tr id= "keurder" class="accordion" style="cursor: pointer;">
                        <td class="success"><?php echo $row1['KeurdersID'] ?></td>
						<td class="success"><?php echo $row1['Voornaam'] . " " . $row1['Familienaam']?></td>
                    </tr>
					<tr>
                        <td><strong>Flesnummers:  </strong><i> <?php echo str_repeat('&nbsp;', 2) . $FlesnummersString ?></i></td>
						<td> </td>
                    </tr>
				</tbody>			
			<?php
					}
				}
			?>
            </table>
			<br><br>
			</div>
            
              </div>
              </div>
              </div>
			  <br>
	 <div class="clear"></div>

	

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
