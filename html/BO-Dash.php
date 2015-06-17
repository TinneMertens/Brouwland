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
			
	$selectTeams = "SELECT * FROM tblteams";
	$resultTeams = mysqli_query($conn, $selectTeams);
	$countTeams = mysqli_num_rows($resultTeams);
	
	$selectDeelnemers = "SELECT * FROM tbldeelnemers";
	$resultDeelnemers = mysqli_query($conn, $selectDeelnemers);
	$countDeelnemers = mysqli_num_rows($resultDeelnemers);
	
	$selectHobbybier = "SELECT * FROM tblteams WHERE Categorie = 1";
	$resultHobbybier = mysqli_query($conn, $selectHobbybier);
	$countHobbybier = mysqli_num_rows($resultHobbybier);
	
	$selectStudentenbier = "SELECT * FROM tblteams WHERE Categorie = 2";
	$resultStudentenbier = mysqli_query($conn, $selectStudentenbier);
	$countStudentenbier = mysqli_num_rows($resultStudentenbier);
	
	$selectKeurders = "SELECT * FROM tblkeurders";
	$resultKeurders = mysqli_query($conn, $selectKeurders);
	$countKeurders = mysqli_num_rows($resultKeurders);
	
	$selectLandBE = "SELECT * FROM tblkapiteingegevens WHERE Land = '1'";
	$resultLandBE = mysqli_query($conn, $selectLandBE);
	$countLandBE = mysqli_num_rows($resultLandBE);
	
	$selectLandNL = "SELECT * FROM tblkapiteingegevens WHERE Land = '2'";
	$resultLandNL = mysqli_query($conn, $selectLandNL);
	$countLandNL = mysqli_num_rows($resultLandNL);
	
	$selectGeslachtM = "SELECT * FROM tbldeelnemers WHERE Geslacht = 'M'";
	$resultGeslachtM = mysqli_query($conn, $selectGeslachtM);
	$countGeslachtM = mysqli_num_rows($resultGeslachtM);
	
	$selectGeslachtV = "SELECT * FROM tbldeelnemers WHERE Geslacht = 'V'";
	$resultGeslachtV = mysqli_query($conn, $selectGeslachtV);
	$countGeslachtV = mysqli_num_rows($resultGeslachtV);	
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

		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
		<link href='http://tablesorter.com/docs/css/jq.css' rel='stylesheet' type='text/css'>
		<link href='http://tablesorter.com/themes/blue/style.css' rel='stylesheet' type='text/css'>
		
		
		<script src="http://bootstrapdocs.com/v2.0.2/docs/assets/js/bootstrap-collapse.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="js/jquery-2.1.1.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-2.1.1.min.js"><\/script>')</script>
        <script src="js/global.js" type="text/javascript"></script>		
		<script src="js/jquery.smartmenus.js" type="text/javascript"></script>
		<script src="js/nav.js" type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.js" type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="http://tablesorter.com/__jquery.tablesorter.min.js"></script> 
		
		<!-- freeow -->
		<link rel="stylesheet" type="text/css" href="CSS/freeow/freeow.css" />		
		<script type="text/javascript" src="js/jquery.freeow.js"></script>
		
		<link href="js/morris/morris-0.4.3.min.css" rel="stylesheet" />
		<!-- Custom Styles-->
		<link href="CSS/custom-styles.css" rel="stylesheet" />
		<!-- Google Fonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
		
		
		<!-- Morris Chart Js -->
		<script src="js/morris/raphael-2.1.0.min.js"></script>
		<script src="js/morris/morris.js"></script>
		<!-- Custom Js -->
		<script src="js/custom-scripts.js"></script>
		
	<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

	
    <script type="text/javascript">
	 <!-- TABLE RESPONSIVE -->
	  
	 $(function()
            {
                $("#tablesorter-demo").tablesorter();
            }
     );
	
	
      // Load the Visualization API and the controls package.
      google.load('visualization', '1.0', {'packages':['controls']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawDashboard);

      // Callback that creates and populates a data table,
      // instantiates a dashboard, a range slider and a pie chart,
      // passes in the data and draws it.
      function drawDashboard() {

        // Create our data table.
        var data = google.visualization.arrayToDataTable([
          ['Name', 'Nationaliteiten Teams'],
          ['België' , <?php echo $countLandBE; ?>],
          ['Nederland', <?php echo $countLandNL; ?>]
        ]);

        // Create a dashboard.
        var dashboard = new google.visualization.Dashboard(
            document.getElementById('dashboard_div'));

        // Create a range slider, passing some options
        var donutRangeSlider = new google.visualization.ControlWrapper({
          'controlType': 'NumberRangeFilter',
          'containerId': 'filter_div',
          'options': {
            'filterColumnLabel': 'Nationaliteiten Teams'
          }
        });

        // Create a pie chart, passing some options
        var pieChart = new google.visualization.ChartWrapper({
          'chartType': 'PieChart',
          'containerId': 'chart_div',
          'options': {
            'width': 510,
            'height': 300,
            'pieSliceText': 'value',
            'legend': 'right'
          }
        });

        // Establish dependencies, declaring that 'filter' drives 'pieChart',
        // so that the pie chart will only display entries that are let through
        // given the chosen slider range.
        dashboard.bind(donutRangeSlider, pieChart);

        // Draw the dashboard.
        dashboard.draw(data);
      }

	   google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Geslacht', 'Aantal'],
          ['Man',     <?php echo $countGeslachtM; ?>],
          ['Vrouw',      <?php echo $countGeslachtV; ?>]
        ]);

        var options = {
          pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'left'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
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
            
            <div class="container_16">
            <br>
			<div class="clear"></div>
            <div class="grid_16"><h1>Informatie Teams</h1></div>
            <div class="clear"></div>
			<div class="grid_9 minimum-except">
			<br>
			Op deze pagina kan u informatie over de ingeschreven teams terugvinden.<br><br><br>
			
			</div>
			<div class="grid_16">
			<div style="display: inline-block; width: 200px; margin-right: 30px;">
                <div class="panel panel-primary text-center no-boder bg-color-green">
                    <div class="panel-body">
                        <i class="fa fa-user fa-5x"></i>
                        <h2 class="timer" data-from="0" data-to="<?php echo $countTeams; ?>" data-speed="1000"><?php echo $countTeams; ?></h2>
                    </div>
                    <div class="panel-footer back-footer-green">
						<strong>
							Teams
						</strong>
                    </div>
                </div>
			</div>
			
			<div style="display: inline-block; width: 200px; margin-right: 30px;">
                <div class="panel panel-primary text-center no-boder bg-color-green">
                    <div class="panel-body">
                        <i class="fa fa-users fa-5x"></i>
                        <h2><?php echo $countDeelnemers; ?></h2>
                    </div>
                    <div class="panel-footer back-footer-green">
                        <strong>
							Deelnemers
						</strong>
                    </div>
                </div>
			</div>
			
			<div style="display: inline-block; width: 200px; margin-right: 30px;">
                <div class="panel panel-primary text-center no-boder bg-color-green">
                    <div class="panel-body">
                        <i class="fa fa-home fa-5x"></i>
                        <h2><?php echo $countHobbybier; ?></h2>
                    </div>
                    <div class="panel-footer back-footer-green">
						<strong>
							Teams Hobbybier
						</strong>
                    </div>
                </div>
			</div>
			
			<div style="display: inline-block; width: 200px; margin-right: 30px;">
                <div class="panel panel-primary text-center no-boder bg-color-green">
                    <div class="panel-body">
                        <i class="fa fa-graduation-cap fa-5x"></i>
                        <h2><?php echo $countStudentenbier; ?></h2>
                    </div>
                    <div class="panel-footer back-footer-green">
                        <strong>
							Teams Studentenbier
						</strong>
                    </div>
                </div>
			</div>
			
			<div style="display: inline-block; width: 200px; margin-right: 20px;">
                <div class="panel panel-primary text-center no-boder bg-color-green">
                    <div class="panel-body">
                        <i class="fa fa-user-secret fa-5x"></i>
                        <h2><?php echo $countKeurders; ?></h2>
                    </div>
                    <div class="panel-footer back-footer-green">
                        <strong>
							Keurders
						</strong>
                    </div>
                </div>
			</div>			
			<br><br>
			
			<div style="display: inline-block; width: 550px; margin-right: 35px;" align="left">
                <div class="panel panel-primary text-center no-boder bg-color-green">
                    <div class="panel-body">
						<!--Div that will hold the dashboard-->
						<div id="dashboard_div">
						  <!--Divs that will hold each control and chart-->
						  <div id="filter_div"></div>
						  <div id="chart_div"></div>
						</div>
                    </div>
                    <div class="panel-footer back-footer-green">
						<strong>
							Nationaliteiten Teams
						</strong>
                    </div>
                </div>
			</div>
			
			<div style="display: inline-block; width: 550px;">
                <div class="panel panel-primary text-center no-boder bg-color-green">
                    <div class="panel-body">
						<div id="piechart_3d" style="width: 510px; height: 327px;"></div>
                    </div>
                    <div class="panel-footer back-footer-green">
						<strong>
							Geslacht Deelnemers
						</strong>
                    </div>
                </div>
			</div>

			
			<br><br>
			
			<table class="table table-bordered" style="width: 1140px;"> 
					<thead> 
                    <tr>
						<th>Team ID</th>
						<th>Teamnaam</th>
						<th>Categorie</th>
						<th>Cursus</th>
						<th>Deelnemers Cursus </th>
						<th>Inleveradres</th>
                    </tr>
					</thead>
					<tbody>
			<?php
				while ($row1 = mysqli_fetch_array($resultTeams)) 
				{
					$TeamIDNow = $row1['TeamID'];
					$selectCursus = "SELECT * FROM tblcursussen WHERE TeamID = ($TeamIDNow)";
					$resultCursus = mysqli_query($conn, $selectCursus);
				
					while ($row2 = mysqli_fetch_array($resultCursus))
					{
			?>
                    <tr id= "team">
						<?php
							if ($row1['Categorie'] == 1)
							{
								$categorie = "Hobbybier";
							}
							else
							{
								$categorie = "Studentenbier";
							}
						?>
					
					
                        <td><?php echo $row1['TeamID'] ?></td>
						<td><?php echo $row1['TeamNaam'] ?></td>
						<td><?php echo $categorie; ?></td>
						<td><?php echo $row2['Cursusdatum'] ?></td>
						
						<?php 
							if ($row2['AantalPersonen'] == 1)
							{
								$persoon = " Persoon";
							}
							else
							{
								$persoon = " Personen";
							}
						?>
						
						<td><?php echo $row2['AantalPersonen'] . $persoon; ?> </td>
						<td><?php echo $row1['InleverAdress'] ?></td>
                    </tr>
			<?php
					}
				}
			?>
			<tbody>
			</table>   
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
