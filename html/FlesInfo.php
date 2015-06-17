<textarea name="txtinfo" class="textarea3" placeholder="Geef hier uw extra informatie in." rows="5" cols="45">
              
<?php
include 'DAL.php';
					
$conn = mysqli_connect($servername, $username, $password, $dbname);

$FlesnummerID = $_GET['flesnummer'];

$sql = "SELECT ExtraInfo FROM tblflesjes WHERE FlesjesID = $FlesnummerID; ";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);

echo $row['ExtraInfo'];


echo "</textarea>";
?>

