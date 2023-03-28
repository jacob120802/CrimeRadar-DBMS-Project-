<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='c';
$db_port = "3307";
$con=mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE, $db_port);
if(!$con){
    die(mysqli_error($con));
}
?>