<?php

	session_start();
	include 'DAL.php';
	include 'DALLogin.php';

	if(isset($_POST['Submit1'])){

		//Ophalen Teamnaam uit textfield.
		$TeamName = $_POST["Teamnaam"];
		
		//Ophalen ingevoerd wachtwoord uit textfield.
		$Pass = $_POST["Wachtwoord"];
		
		$Pass = mysqli_real_escape_string($conn, $Pass);
		
		echo "<p>" . $TeamName . "</p>";
		echo "<p>" . $Pass . "</p>";
		
		//Openen van MySQLi-connectie.
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		// To protect MySQL injection (more detail about MySQL injection)
		$myusername = stripslashes($TeamName);
		$mypassword = stripslashes($Pass);
		$myusername = mysqli_real_escape_string($conn, $myusername);
		$mypassword = mysqli_real_escape_string($conn, $mypassword);
		$mypassword = md5($mypassword);
		
		$selectTeamNaam = "SELECT * FROM tblteams WHERE TeamNaam ='$myusername'";
		$selectKeurderNaam = "SELECT * FROM tblkeurders WHERE Gebruikersnaam ='$myusername'";
		$selectBrouwlandNaam = "SELECT * FROM tblbrouwland WHERE Gebruikersnaam ='$myusername'";
		
		$resultTeam=mysqli_query($conn, $selectTeamNaam);
		$resultKeurder=mysqli_query($conn, $selectKeurderNaam);
		$resultBrouwland=mysqli_query($conn, $selectBrouwlandNaam);
		
		$countTeam=mysqli_num_rows($resultTeam);
		$countKeurder=mysqli_num_rows($resultKeurder);
		$countBrouwland=mysqli_num_rows($resultBrouwland);
		
		if($countTeam == 1)
		{
			$sqlTeam="SELECT * FROM tblteams WHERE TeamNaam='$myusername' and Wachtwoord='$mypassword'";
			$resultRowTeam=mysqli_query($conn, $sqlTeam);
			
			// Mysql_num_row is counting table row
			$countRowTeam=mysqli_num_rows($resultRowTeam);
			
			$TeamID = "SELECT TeamID FROM tblteams WHERE tblteams.Teamnaam = '$TeamName'";
			
			//Uitvoeren query.
			if(mysqli_query($conn, $TeamID))
			{
				echo "Records (Login) added successfully. \n";
			} 
			else
			{
				echo "ERROR (Login): Could not able to execute: " . mysqli_error($conn);
			}
			
			// If result matched $myusername and $mypassword, table row must be 1 row
			if($countRowTeam==1)
			{
				header("location:./Home.php");
				$_SESSION["TeamID"] = $TeamID;
				$_SESSION["TeamName"] = $TeamName;
				exit;
			}
			else 
			{
				header("location:./Login.php?check=false");
			}
		}
		else
		{
			if ($countKeurder == 1)
			{
				$sql="SELECT * FROM tblkeurders WHERE Gebruikersnaam='$myusername' and Wachtwoord='$mypassword'";
				$resultRowKeurder=mysqli_query($conn, $sql);
				
				// Mysql_num_row is counting table row
				$countRowKeurder=mysqli_num_rows($resultRowKeurder);
				
				if($countRowKeurder == 1)
				{
					$KeurderID = "SELECT KeurdersID FROM tblkeurders WHERE tblkeurders.Gebruikersnaam = '$TeamName'";
					
					//Uitvoeren query.
					if(mysqli_query($conn, $KeurderID))
					{
						echo "Records (keurdersID) added successfully. \n";
					} 
					else
					{
						echo "ERROR (Login): Could not able to execute: " . mysqli_error($conn);
					}
					
					// If result matched $myusername and $mypassword, table row must be 1 row
					$_SESSION['KeurderID'] = $KeurderID;
					$_SESSION['KeurderNaam'] = $myusername;
					echo $KeurderID;
					header("location:./Keuringsformulier-Home.php");
					exit;
				}
				else 
				{
					header("location:http:./Login.php?check=false");
				}
			}
			else
			{
				if ($countBrouwland == 1) 
				{
					$sqlBrouwland="SELECT * FROM tblbrouwland WHERE Gebruikersnaam='$myusername' and Wachtwoord='$mypassword'";
					$resultRowBrouwland=mysqli_query($conn, $sqlBrouwland);
					
					// Mysql_num_row is counting table row
					$countRowBrouwland=mysqli_num_rows($resultRowBrouwland);
					
					if($countRowBrouwland == 1)
					{
						$BrouwlandID = "SELECT BrouwlandID FROM tblbrouwland WHERE tblbrouwland.Gebruikersnaam = '$TeamName'";
							
						//Uitvoeren query.
						if(mysqli_query($conn, $BrouwlandID))
						{
							echo "Records (BrouwlandID) added successfully. \n";
						} 
						else
						{
							echo "ERROR (Login): Could not able to execute: " . mysqli_error($conn);
						}
						
						// If result matched $myusername and $mypassword, table row must be 1 row
						$_SESSION['BrouwlandID'] = $BrouwlandID;
						$_SESSION['BrouwlandNaam'] = $myusername;
						echo $BrouwlandID;
						header("location:./Backoffice.php");
						exit;
					}
					else 
					{
						header("location:http:./Login.php?check=false");
					}
				}
				else
				{
					header("location:http:./Login.php?check=false");
				}
			}
		}
	}
		

	
?>