<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
session_start();
include("connect.php");
if(!isset($_SESSION['login_id'])){
    header('location:coplogin.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PRISONER DETAIL</title>
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
                            <li class="nav-item"><a class="nav-link" href="dashboard.php">DASHBOARD</a></li>
                            <li class="nav-item"><a class="nav-link" href="copprofile.php">PROFILE</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="signup.php">More </a></li> -->
                            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">MENU</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="viewcomplaint.php">View Complaints</a></li>
            <li><a class="dropdown-item" href="viewcomplainer.php">View Complainers</a></li>
          </ul>
        </li>
                            <li class="nav-item"><a class="btn btn-danger" href="logout.php">LOGOUT</a></li> 
                    </ul>
                </div>
            </div>
        </nav>  
    </header>
        <!-- Start Breadcrumb Section -->
        <section class="breadcrumb-section parallax" style="background-image: url(assets/images/bg/breadcrumb4.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <h1>CRIMINAL DATABASE</h1>
                        </div>
                    </div>
                </div>
            </div>
        <center>
        <section class="pad50" style="background-color: rgba(250, 250, 250, 1); width: 90%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-section">
						
<h3 class="underline"><span>View Prisoner Details</span></h3>

<p class="mb30">


<table id="datatable"  class="table table-striped table-bordered">
	<thead>
		<tr>			
			<th><h5>Prisoner Image</h5></th>
			<th><h5>Prisoner Name</h5></th>			
			<th><h5>Section</h5></th>			
			<th><h5>Crime Details</h5></th>			
			<th><h5>Prisoner Address</h5></th>		
			<th><h5>Prisoner Document</h5></th>			
			<th><h5>AnyNote</h5></th>	
		</tr>
	</thead>
	<tbody>
		<?php
		$sql = "SELECT * FROM prisoner";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			echo "<tr>					
						<td><center><img src='docprisoner/$rs[prisonerimg]' style='width: 120px;height: 120px;'></center></td>
						<td>$rs[prisonername]</td>			
						<td>$rs[section]</td>			
						<td>$rs[crimedetails]</td>			
						<td>$rs[prisoneraddress]</td>	
						<td>
                        <center>
						<a href='docprisoner/$rs[prisinerdocument]' class='btn btn-info' style='width: 80%'>Download</a>
						</center>
                        </td>			
						<td>$rs[anynote]</td>	
			</tr>";
		}
	?>
	</tbody>
</table>
</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </center>
    </br>
    </br>
    </br>
        </section>
        <!-- End Text & image Section -->
        <footer>
            <h3 class="footer_text">Crime Report Management System | © All Rights Reserved | Developed by Jacob & Jayant </h3>
        </footer>
    </body>
</html> 