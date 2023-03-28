<!DOCTYPE html>
<html>
    <?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
session_start();
include("connect.php");
?>
<head>

</head>
<body>

<?php
$q = intval($_GET['q']);
$sql_stmt = "SELECT substation_id,substation_name from substation where station_id=" . $q;
echo $q;
$result = mysqli_query($con, $sql_stmt);
while ($row = mysqli_fetch_assoc($result)) {
echo '<option value="' . $row["substation_id"] . '">' . $row["substation_name"] . '</option>';
}
?>
</html>
