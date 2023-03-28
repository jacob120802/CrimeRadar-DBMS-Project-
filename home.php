<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
session_start();
include("connect.php");
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COMPLAINER DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="63.png" type="image/x-icon">
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
                            <li class="nav-item"><a class="nav-link" href="home.php">DASHBOARD</a></li>
                            <li class="nav-item"><a class="nav-link" href="insertcomplaint.php">REGISTER COMPLAINT</a></li>
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
    <div class="section1">
    <label class="img_text1">
    <h1 class="text-center  mt-2" >Welcome 
        <?php echo $_SESSION['username'];?>
        <?php echo $_SESSION['complainer_id'];?>
    !</h1>
    </label>
        <img class="main_img" src="16.png">
        </div>
<!-- Start Team Member Section -->
<section class="pad-t100 pad-b70">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="section-title  mb-5 text-center">
				<h3>COMPLAINER DASHBOARD<br/></h3>
			</div>
		</div>
	</div>
	<div class="row">
    <div class="col-md-4 mb-4 col-sm-4">
			<div class="team-member-1">
				<div >
        <a href="complainerprofile.php"><img class="img-responsive" src="61.png" STYLE="width: 100%;height: 250px;"></a>
				</div>
				<div class="team-info">
					<div class="team-name">MY PROLILE</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-4 col-sm-4">
			<div class="team-member-1">
				<div >
        <a href="insertcomplaint.php"><img class="img-responsive" src="94.png" STYLE="width: 100%;height: 250px;"></a>
				</div>
				<div class="team-info">
					<div class="team-name">REGISTER A COMPLAINT</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-4 col-sm-4">
			<div class="team-member-1">
				<div >
        <a href="viewcomcomplaint.php"><img class="img-responsive" src="93.png" STYLE="width: 100%;height: 250px;"></a>
				</div>
				<div class="team-info">
					<div class="team-name">MY COMPLAINT REPORTS</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- End Team Member Section -->
        <footer>
            <h3 class="footer_text">Crime Report Management System | © All Rights Reserved | Developed by Jacob & Jayant </h3>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html> 