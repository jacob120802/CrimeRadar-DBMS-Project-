<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
session_start();
include("connect.php");
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
if (isset($_POST['submit'])) 
{
    $sql = "INSERT INTO complaint (substation_id,station_id,complainer_id,victims_name,victim_phoneno,victim_address,accused,complaint_type,complaint_detail,evidence) values ('$_POST[substation]','$_POST[station]'," . $_SESSION['uid'] . ",'$_POST[victim_name]','$_POST[victim_no]','$_POST[victim_address]','$_POST[accused_name]','$_POST[complaint_type]','$_POST[complaint_desc]','$_POST[evidence]')";
    $qsql = mysqli_query($con, $sql);
    echo mysqli_error($con);
    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('complaint inserted successfully');</script>";
        echo "<script>window.location='viewstation.php';</script>";
    }
}
?>

<!DOCTYPE html>


<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERT COMPLAINTS</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="63.png" type="image/x-icon">
    <style>
        select{
            width: 78vw;
            height: 9vh;
        }
    </style>
</head>

<script>
    function showSubStation(str) {
      if (str == "") {
        document.getElementById("substation").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("substation").innerHTML = this.responseText;


            }
          }
        };
        xmlhttp.open("GET","substation.php?q="+str,true);
        xmlhttp.send();
      }
      
    
    function getValue()
    {
        var e = document.getElementById("station");
        var value = e.value;
        console.log(value);
        showSubStation(value);
    }
    
    
    </script> 

<body >
    <header>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img class="x" src="logo.png" alt="Bootstrap" width="300" height="75">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="home.php">DASHBOARD</a></li>
                        <li class="nav-item"><a class="nav-link" href="insertcomplaint.html">REGISTER COMPLAINT</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="signup.php">More </a></li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">REPORTS</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="viewcomcomplaint.php">My Complaints</a></li>
                                <li><a class="dropdown-item" href="complainerprofile.php">My Profile</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="btn btn-danger" href="logout.php">LOGOUT</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="complaint">
        <center class="title">REPORT A COMPLAINT</center>
        <form class="login" method="post" action="newcomplaint.php">
            Victim Name:
            <input class="form-control" type="text" name="victim_name" id="">
            <br><br>Victim Phone Number:
            <input class="form-control" type="text" name="victim_no" id="">
            <br><br>Victim Address:
            <input class="form-control" type="text" name="victim_address" id="">
            <br><br>Station:<br>
            <select name="station" id="station" onchange="getValue()">
                <option disabled selected value>Select a station</option>
                <?php
                $sql = "SELECT state,station_id FROM station";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row["station_id"] . '">' . $row["state"] . '</option>';
                }
                ?>
            </select>
            <!-- <input id="station" type="text" name="station" class="form-control" placeholder="Station *" required="required" data-error="Subject is required."> -->
            <br><br>Sub-Station:
            <select name="substation" id="substation">
                <!-- <option value="1">2323</option> -->
            
            </select>
            <br><br>
            Complaint Type:
            <input class="form-control" type="text" name="complaint_type" id="">
            <br><br>Complaint Description:
            <input class="form-control" type="text" name="complaint_desc" id="" style="min-height: 120px;">
            <br><br>Accused Name:
            <input class="form-control" type="text" name="accused_name" id="">

            <br><br>Evidence:
            <input class="form-control" type="text" name="evidence" id="" >
            <br><br>
            <center>
                <input class="btn btn-danger" type="submit" value="submit">
            </center>
        </form>
    </div>
    <footer>
        <h3 class="footer_text">Crime Report Management System | © All Rights Reserved | Developed by Jacob & Jayant </h3>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>