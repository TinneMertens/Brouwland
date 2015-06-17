<select name="City2" id="City2" type="text" class="required inputveld" maxlength="100" aria-required="true">
              
<?php
include 'DAL.php';
					
$conn = mysqli_connect($servername, $username, $password, $dbname);

$CityJuist = $_GET['nameSec'];

$sql = "SELECT Postcode, Gemeente FROM tblpostcodes WHERE Postcode = '$CityJuist'; ";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['Gemeente'] . "'>" . $row['Postcode'] . " - " . $row['Gemeente'] . "</option>";
}

?>
</select>
