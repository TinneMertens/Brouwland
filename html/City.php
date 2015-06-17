<?php
include 'DAL.php';
					
$conn = mysqli_connect($servername, $username, $password, $dbname);

$City = $_GET['city'];
$Country = $_GET['country'];
$Name = $_GET['name'];

echo '<select name="' . $Name . '" id="' . $Name . '" type="text" class="required inputveld" maxlength="100" aria-required="true">';

$sql = "SELECT Postcode, Gemeente, Postnummer FROM tblpostcodes WHERE Postcode = '$City' AND Land = '$Country';";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['Postnummer'] . "'>" . $row['Postcode'] . " - " . $row['Gemeente'] . "</option>";
}
echo "</select>";
?>

