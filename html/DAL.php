<?php


// $link = mysql_connect('127.0.0.1:3306', 'root', '');
// mysql_select_db('brouwland', $link);
// mysql_set_charset('UTF-8', $link);

$servername = "127.0.0.1";
$username = "root";
$password = "BestTeamEver";
$dbname = "brouwland";
 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";


?>