<?php

	session_start();
	session_unset(); 
	session_destroy();
	echo '<script language="javascript">';
	echo 'alert("U bent succesvol afgemeld.")';
	echo '</script>';
	header('Location: ./LogoutMessage.php');

	exit;
	
?>