<?php

include 'DAL.php';

session_start();

//TeamID
//$TeamID = $_SESSION["TeamID"];

//Team Name
//$TeamName = $_SESSION["TeamName"];

		//Openen van MySQLi-connectie.
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
			$cat = 0;
			$catstring = "";
			
			include 'DAL.php';
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			$query4 = "SELECT Categorie, teamid FROM tblteams where teamid = 203";
			$sqlquery4 = mysqli_query($conn, $query4);
			while($result = mysqli_fetch_array($sqlquery4)){
				 $cat = $result['Categorie'];
				 $teamid = $result['teamid'];
				 $result['Categorie'];
				 
				 if($cat == 1){
					$catstring = "Hobby";
				 }
				 else {
					$catstring = "Student";
				 }
			}
			
			//Ophalen gegevens van visuele aspecten
			include 'DAL.php';
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			$query1 = "SELECT * FROM tblvisueleaspectenflesje where flesjesID = 8";
			$sqlquery1 = mysqli_query($conn, $query1);
			
			
			$nrfles = 0;
			$Presentatie = array();
			$Koolzuur = array();
			$Helderheid = array();
			$Schuimkraag = array();

			while ($row = mysqli_fetch_array($sqlquery1)) {
				$nrfles = $row['FlesjesID'];
				$Presentatie[] = $row['Presentatie'];
				$Koolzuur[] = $row['Koolzuur'];
				$Helderheid[] = $row['Helderheid'];
				$Schuimkraag[] = $row['Schuimkraag'];
			}	
			
			
			//Ophalen gegevens van geur-smaak associaties
			include 'DAL.php';
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			$query2 = "SELECT * FROM tblgeurensmaakassociaties where flesjesID = 8";
			$sqlquery2 = mysqli_query($conn, $query2);
		
			$Geur = array();
			$Smaak = array();
			
			while ($row = mysqli_fetch_array($sqlquery2)) {
				$Geur[] = $row['PuntenGeur'];
				$Smaak[] = $row['PuntenSmaak'];
			}
			
			
			//Ophalen gegevens van algemene keuring
			include 'DAL.php';
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			$query3 = "SELECT * FROM tblalgemenekeuring where flesjesID = 8";
			$sqlquery3 = mysqli_query($conn, $query3);
		
			$Creativiteit = array();
			$Type = array();
			$Balans = array();
			$Complexiteit = array();
			$Basissmaak = array();
			$Mondgevoel = array();
			$Nasmaak = array();
			$Doordrinkbaarheid = array();
			
			while ($row = mysqli_fetch_array($sqlquery3)) {
				$Creativiteit[] = $row['Creativiteit'];
				$Type[] = $row['VoldoetAanType'];
				$Balans[] = $row['Balans'];
				$Complexiteit[] = $row['Complexiteit'];
				$Basissmaak[] = $row['Basissmaak'];
				$Mondgevoel[] = $row['Mondgevoel'];
				$Nasmaak[] = $row['Nasmaak'];
				$Doordrinkbaarheid[] = $row['Doordrinkbaarheid'];
			}
			
			
			//Ophalen gegevens van algemene keuring
			include 'DAL.php';
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			$query5 = "SELECT * FROM tblresultaten where FlesjesID = 8";
			$sqlquery5 = mysqli_query($conn, $query5);
		
			$ID = array();
			$FlesID = array();	
			$KeurderID = array();
			$VCID = array();
			$Score = array();
			$EI = array();
			
			while ($row = mysqli_fetch_array($sqlquery5)) {
				$ID[] = $row['ID'];
				$FlesID[] = $row['FlesjesID'];
				$KeurderID[] = $row['KeurderID'];
				$VCID[] = $row['VraagCriteriaID'];
				$Score[] = $row['Score'];
				$EI[] = $row['ExtraInfo'];
				
			}
			
				$pID = array();
				$vraagID = array();	
				$criteriaID = array();
				$punten = array();
				$info = array();
			
			foreach( $VCID as $id)
			{
			
							// Ophalen gegevens van algemene keuring
				include 'DAL.php';
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				$query5 = "SELECT * FROM tblvragencriteriapunten where ID = '$id'";
				$sqlquery5 = mysqli_query($conn, $query5);
			


				
				while ($row = mysqli_fetch_array($sqlquery5)) {
					$pID[] = $row['ID'];
					$vraagID[] = $row['vraggID'];
					$criteriaID[] = $row['criteriaID'];
					$punten[] = $row['punten'];
					$info[] = $row['ExtraInfo'];
				}
			}
			

						
						
			error_reporting(E_ALL);
			set_time_limit(0);

			date_default_timezone_set('Europe/Brussels');
			set_include_path(get_include_path() . PATH_SEPARATOR . './Classes/');

			include 'PHPExcel-develop\Classes\PHPExcel/IOFactory.php';

			$fileType = 'Excel2007';
			$fileName = 'Template_Keuringsverslag_NIET-Finalist.xlsx';

			// Read the file
			$objReader = PHPExcel_IOFactory::createReader($fileType);
			$objReader->setIncludeCharts(true);
			$objPHPExcel = PHPExcel_IOFactory::load($fileName);

			$colNumber = PHPExcel_Cell::columnIndexFromString("AA");
			print $colNumber . "<br>";
			$colString = PHPExcel_Cell::stringFromColumnIndex(10);
			print $colString;
		
		$c = 3;
		for($i = 0; $i < count($Presentatie); $i++){
			
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('B'.$c, $teamid)
						->setCellValue('C'.$c, $catstring)
						->setCellValue('E'.$c, $nrfles)
						->setCellValue('F'.$c, $Presentatie[$i])
						->setCellValue('G'.$c, ($Koolzuur[$i] + $Helderheid[$i] + $Doordrinkbaarheid[$i]))
						->setCellValue('H'.$c, $Schuimkraag[$i])
						->setCellValue('I'.$c, $Geur[$i])
						->setCellValue('J'.$c, $Smaak[$i])
						->setCellValue('K'.$c, ($Creativiteit[$i] + $Type[$i]))
						->setCellValue('L'.$c, ($Complexiteit[$i] + $Balans[$i]))
						->setCellValue('M'.$c, ($Basissmaak[$i] + $Mondgevoel[$i]))
						->setCellValue('N'.$c, $Nasmaak[$i]);
			$c++;
		}
		
			$colNumber = PHPExcel_Cell::columnIndexFromString('AA');
			for(i=0; i<= count($VCID); i++){
				var $row = 41;
				if($info[i] == 'geur')
				{
					for(j=2; j<= $colNumber; j+=2)
					{
						$colstring = PHPExcel_Cell::stringFromColumnIndex(j);
						$objPHPExcel->setActiveSheetIndex(0)
									->setCellValue($colstring . $row, $punten[i];
					}
				}
				$row++;
			}

			
			// Write the file
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
			$objWriter->setIncludeCharts(true);
			$objWriter->save($fileName);
		
		//----------------------------------------------------------------------------------------------------------------------------

		
		?>