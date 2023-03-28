<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
session_start();
include("connect.php");
if(isset($_SESSION['login_id']) && !isset($_SESSION['username']))
{
	$sql ="SELECT * FROM complaint ";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_num_rows($qsql) >= 1)
	{
		$rspro = mysqli_fetch_array($qsql);
		$_SESSION['complaint_id'] = $rspro['complaint_id'];
	}
	else
	{
		echo "<script>alert('You have entered invalid login credentials..');</script>";
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AKNOWLEDGEMENT</title>
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
    <?php
$sqledit = "SELECT complaint.*,substation.substation_name,substation.contact_no,substation.substation_addresss, station.state,substation.city, complainer.name,complainer.username, complainer.mobile FROM complaint LEFT JOIN substation on complaint.substation_id=substation.substation_id LEFT JOIN station ON station.station_id=substation.station_id LEFT JOIN complainer ON complainer.complainer_id=complaint.complainer_id WHERE complaint.complaint_id='$_GET[goid]'";
$qsqledit = mysqli_query($con,$sqledit);
$rsedit = mysqli_fetch_array($qsqledit);
?>     
        <!-- Start Breadcrumb Section -->
        <section class="breadcrumb-section parallax" style="background-image: url(assets/images/bg/breadcrumb4.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <h1>Complaint Acknowledgement Receipt</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Section -->
        <center>
        <form method="post" action="" id="printableArea" style="background-color: white; color: black; width:80%;">
        <!-- Start About Section -->
        <section class="pad-t100 pad-b90">
            <div class="container" style="padding-left: 125px;padding-right: 125px;">
                <div class="row">
					<div class="col-md-12">
                        <div class="feature-4" style="padding:20px;">
		<center>
			<h3><?php echo $rsedit['substation_name']; ?></h3>
			<p><?php echo $rsedit['substation_addresss']; ?>,<br><?php echo $rsedit['city']; ?>, <?php echo $rsedit['state']; ?><br>Ph. No. <?php echo $rsedit['contact_no']; ?></p>
		</center>	<hr>
<div class="intro-text">
	<p>
<div class="row">
<div class="col-md-12">
<center style="padding: 15px; color: maroon;"><h2>Complaint Letter</h2></center><hr>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6" ">
		<b style="color: blue;">Complaint No. </b>
		<?php echo $rsedit['complaint_id']; ?><br><br>
		<b style="color: blue;">Complaint Date: </b><br>
		<?php echo date("d-M-Y",strtotime($rsedit['complaint_date'])); ?>
		<?php echo date("h:i A",strtotime($rsedit['complaint_date'])); ?>
		</div>
		<div class="col-md-6">
		<b style="color: blue;">Victims detail:</b>
		<p>
		<?php echo $rsedit['victims_name']; ?><br>
		<?php echo $rsedit['victim_address']; ?><br>
		<?php echo $rsedit['victim_phoneno']; ?>'
		</p>
		</div>
</div>
<hr><br>
<div class="row">
	<div class="col-md-12">
		<label  style="color: blue;">Complaint Subject:</label> <?php echo $rsedit['complaint_type']; ?><br><br>
		<?php echo $rsedit['complaint_detail']; ?>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md">
		<b  style="color: blue;">Accuser detail:</b><br>
		<?php echo $rsedit['accused']; ?><br>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-6">
		<b style="color: blue;">Photo Evidence:</b>
		<br>
		<?php 
if($rsedit['photo_evidence'] == "")
{
	echo $img =  "<img src='images/112.png' style='width: 100%; height: 350px'>";
}
else if(file_exists("images/".$rsedit['photo_evidence']))
{
	echo $img =  "<img src='images/$rsedit[photo_evidence]' class='img' style='width: 100%; height: 350px'>";
}
else
{
	echo $img = "<img src='images/112.png' style='width: 100%; height: 350px'>";
}
		?>
	</div>
    <div class="col-md-6">
		<br><br><b  style="color: blue;">Evidence:</b><br><?php echo $rsedit['evidence']; ?>
	</div>
</div>
<br><hr>
<div class="row">
		<div>
		<b style="color: blue;">Complainer detail:</b>
		<p>
		<?php echo $rsedit['name']; ?><br>
		<?php echo $rsedit['username']; ?><br>
		<?php echo $rsedit['mobile']; ?>
		</p>
		</div>
</div>
<br><hr>
<?php
if($rsedit['status'] == "Active")
{
?>
<div class="row">
		<div class="col-md-12">
		<b style="color: blue;">Police station Response-</b>
		<p>
		<b>Note from Police Station : </b><?php echo $rsedit['anynote']; ?><br>
		<b>Complaint Status: </b><?php echo $rsedit['status']; ?>
		</p>
		</div>
</div>
<hr>
<?php
}
else
{
?>
<div class="row">
		<div class="col-md-12"><br>
		<center><b style="color: red;">Complaint not processed yet...</b></center>
		</div>
</div>
<?php
}
?>

	</p>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->
		
		
    </form>
        </center>

        <form method="post" action="">

        <!-- Start About Section -->
        <section class="">
            <div class="container" style="padding-left: 125px;padding-right: 125px;">
                <div class="row">
					<div class="col-md-12">
                        <div class="feature-4" style="padding:10px;">

<div class="intro-text">
	<div class="row">
		<div class="col-md-12">
		<center><input type="button" name="submit" id="submit" value="Print" class="form-control btn btn-danger" style="width: 250px;"  onclick="printDiv('printableArea')" ></center>
		</div>
	</div>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->
		
		
    </form>
    <footer>
            <h3 class="footer_text">Crime Report Management System | © All Rights Reserved | Developed by Jacob & Jayant </h3>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html> 
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
     window.print();

     document.body.innerHTML = originalContents;
     style.innerHTML = `
  color: blueviolet;
  `;
}
</script>