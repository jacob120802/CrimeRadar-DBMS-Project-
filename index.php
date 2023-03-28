<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CRIME MANAGEMENT SYSTEM</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="63.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body>
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
                    <ul class="navbar-nav ms-auto" >
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="news.php">News</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="signup.php">Report</a></li> -->
                            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Report</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="login.php">Login as Complainer</a></li>
            <li><a class="dropdown-item" href="signup.php">Sign Up as Complainer</a></li>
          </ul>
        </li>
                            <li class="nav-item"><a class="btn btn-primary" href="coplogin.php">COP LOGIN</a></li> 
                    </ul>
                </div>
            </div>
        </nav>  
    </header>
    <div class="mainbody">
        <div class="section1">
        <label class="img_text">CRIME REPORT MANAGEMENT SYSTEM</label>
        <img class="main_img" src="10.png">
        </div>
        <div class="cont">
            <div class="row">
                <div class="col-md-4">
                    <img class="welcome_img" src="9.png">
                </div>
                <div class="col-md-8">
                    <h2><br>Welcome to CrimeRadar!</h2>
                    <p>CrimeRadar is a Crime Report Management System website which will reduce the paperwork of the Police Station.This project is maintained in a single server and it makes handling of records easier. Here Complainer can lodge a complaint, and Cop can maintain, add and retrieve all the records like criminal record, complaint record, case history, many more in a single database system.</p>
                </div>
            </div>
        </div>
        <center>
            <h2><br>IMPORTANT MODULES</h2>
        </center>
                <div class="cont2">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                                    <img class="module" src="6.png">
                                    <div class="team-name"><h4>Cop </h4> </div>
                                    <p>This module allows Admin to assign Cop Accounts. He can also edit and delete Cop details. Admin is the main user of the system. Cops has limited authority. Cops has to login to the system by entering given UserName and Password. Cop can maintain, add and retrieve all the case related records like criminal record, complaint record, case details and update their profile details and can change their account password.
                                    </p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                                    <img class="module" src="7.png">
                                    <div class="team-name"><h4>Complaint  </h4> </div>
                                    <p>Any public members can file complaint through online by entering Complaint reason, evidence, complaint details, complaint type, etc. Even police department can file complaint from their account if anyone gives complaint directly by visiting police station. Complaint can be closed anytime if both parties agrees. If the complaint not closed in 2-3 days then the cops has right to add the complaint to FIR. .</p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                                    <img class="module" src="8.png">
                                    <div class="team-name"><h4>Complainer </h4> </div>
                                    <p>This module stores complainer profile details. Complainer needs to register to the system. After the login complainer can file or lodge complaint in the complaint section. Complainer can view complaint status, fir status, crime details, charge sheet details, etc.</p>
                        </div>
                    </div>
                </div>
            
            <footer>
                <h3 class="footer_text">Crime Report Management System | © All Rights Reserved | Developed by Jacob & Jayant </h3>
            </footer>
        </div>
</body>
</html>