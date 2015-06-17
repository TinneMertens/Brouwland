	
	<?php 		
		include 'DAL.php';
		
		//Hier wordt de MySL-connectie geopend
		$conn = mysqli_connect($servername, $username, $password, $dbname);
				
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
				
		$selectTeams = "SELECT TeamNaam FROM tblteams";
		$resultTeams = mysqli_query($conn, $selectTeams);
		
	?>

		var Teamnamen = [];
		
	<?php
							
		while ($row = mysqli_fetch_array($resultTeams)) {
			$Team = $row['TeamNaam'];
	?>

		Teamnamen.push("<?php echo $Team; ?>");
		
	<?php

		}
		
	?>
	

		function validateEmail(email) {
			var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			if (re.test(email))
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		
		function validateAddress(address) {
			var re = /[a-zA-Z]+ [0-9]/;
			if (re.test(address))
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		
		function validatePhone(phone) {
			var re1 = /^((\+|00)32\s?|0)(\d\s?\d{3}|\d{2}\s?\d{2})(\s?\d{2}){2}$/;
			var re2 = /^((\+|00)32\s?|0)4(60|[789]\d)(\s?\d{2}){3}$/;
			var re3 = /^(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)/
			if ((re1.test(phone)) || (re2.test(phone)) || (re3.test(phone)))
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		
		function getEmail(val, name){
			if(validateEmail(val) == false)
			{
				$("#freeow").freeow("Opgepast", "Het emailadres '" + val + "' dat u ingaf is niet correct. Gelieve een correct emailadres in te geven.", {
					classes: ["osx", "notice"],
					autoHide: false
				});	
				
				document.forms["form1"][name].value = "";
			}
		}
		
		function getAddress(val, name){
			if(validateAddress(val) == false)
			{
				$("#freeow").freeow("Opgepast", "Het adres '" + val + "' is niet correct. Gelieve een correct adres in te geven.<br>Bijvoorbeeld: 'Dorpstraat 11'.", {
					classes: ["osx", "notice"],
					autoHide: false
				});	
				
				document.forms["form1"][name].value = "";
			}
		}
		
		function getTeams(val, name){
			if ((jQuery.inArray( val, Teamnamen ) === -1) || ((jQuery.inArray( val, Teamnamen )) === "-1"))
			{
			}
			else
			{
				$("#freeow").freeow("Opgepast", "De teamnaam '" + val + "' is al in gebruik. Gelieve een andere teamnaam te kiezen. ", {
				classes: ["osx", "notice"],
				autoHide: false
				});	
				document.forms["form1"][name].value = "";
			}
		}
		
		function getPhone(val, name){
			if(validatePhone(val) == false)
			{
				$("#freeow").freeow("Opgepast", "Het telefoonnummer '" + val + "' is niet correct. Gelieve een correct telefoonnummer in te geven.<br>Bijvoorbeeld: '0412345678' of '031234567'.", {
					classes: ["osx", "notice"],
					autoHide: false
				});	
				
				document.forms["form1"][name].value = "";
			}
		}
		
