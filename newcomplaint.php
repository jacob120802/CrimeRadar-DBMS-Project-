<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
session_start();
include("connect.php");
$victim_name = $_POST['victim_name'];
$victim_no = $_POST["victim_no"];
$victim_address = $_POST['victim_address'];
$complaint_type = $_POST['complaint_type'];
$complaint_desc = $_POST['complaint_desc'];
$accused_name = $_POST['accused_name'];
$evidence = $_POST['evidence'];
$substation_id = $_POST['substation'];
$station_id= $_POST['station'];
$userid = $_SESSION['complainer_id'];
$sql = "SELECT * from complainer WHERE username = '$_SESSION[username]'";
$qsql = mysqli_query($con,$sql);
$rs = mysqli_fetch_assoc($qsql);

$stmt = $con->prepare("INSERT INTO complaint (substation_id,station_id,complainer_id,victims_name,victim_phoneno,victim_address,accused,complaint_type,complaint_detail,evidence) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssss", $substation_id, $station_id, $rs['complainer_id'], $victim_name, $victim_no, $victim_address, $accused_name, $complaint_type, $complaint_desc, $evidence);
$stmt->execute();


// $sql = 'INSERT INTO complaint (substation_id,station_id,complainer_id,victims_name,victim_phoneno,victim_address,accused,complaint_type,complaint_detail,evidence) values ('.$substation_id.','.$station_id.',10,'.$victim_name.','.$victim_no.','.$victim_address. ','.$accused_name.','.$complaint_type.','.$complaint_desc.','.$evidence.')';
// $sql = "INSERT INTO complaint (substation_id,station_id,complainer_id,victims_name,victim_phoneno,victim_address,accused,complaint_type,complaint_detail,evidence) values ('$_POST[substation]','$_POST[station]'," .$userid. ",'$_POST[victim_name]','$_POST[victim_no]','$_POST[victim_address]','$_POST[accused_name]','$_POST[complaint_type]','$_POST[complaint_desc]','$_POST[evidence]')";
//     $qsql = mysqli_query($con, $sql);

// $result = mysqli_query($con, $sql);

header("location:home.php");

?>