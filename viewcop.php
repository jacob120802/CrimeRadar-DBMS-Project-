<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
session_start();
include("connect.php");
if(!isset($_SESSION['login_id'])){
    header('location:coplogin.php');
}
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM cop WHERE cop_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Cop record deleted successfully...');</script>";
		echo "<script>window.location='viewcop.php';</script>";
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COP RECORDS</title>
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
                            <li class="nav-item"><a class="nav-link" href="admindashboard.php">DASHBOARD</a></li>
                            <li class="nav-item"><a class="nav-link" href="copprofile.php">PROFILE</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="signup.php">More </a></li> -->
                            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">MENU</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="viewcop.php">COP RECORDS</a></li>
            <li><a class="dropdown-item" href="viewsubstation.php">VIEW SUB-STATIONs</a></li>
            <li><a class="dropdown-item" href="viewstation.php">VIEW STATIONs</a></li>
          </ul>
        </li>
                            <li class="nav-item"><a class="btn btn-danger" href="logout.php">LOGOUT</a></li> 
                    </ul>
                </div>
            </div>
        </nav>  
    </header>
    <section class="pad50" style="background-color: rgba(250, 250, 250, 1);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-section">
						
<h3 class="underline"><span>View Cop Records<br><br><a href='addcop.php' class='btn btn-danger' style='width: 175px;'>Add a New Cop?</a></span></h3>

<p class="mb30">


<table id="datatable"  class="table table-striped table-bordered">
<thead>
<tr>		
	<th><h5>Image</h5></th>		
	<th><h5>Cop Name</h5></th>			
	<th><h5>Sub-Station</h5></th>			
	<th><h5>Designation</h5></th>				
	<th><h5>Gender</h5></th>			
	<th><h5>Contact Detail</h5></th>			
	<th><h5>Login ID</h5></th>				
	<th><h5>Status</h5></th>
	<th><h5>Action</h5></th>
</tr>
</thead>
<tbody>
<?php
$sql = "SELECT cop.*,designation.designation_type,substation.substation_name FROM cop LEFT JOIN substation on cop.substation_id=substation.substation_id LEFT JOIN designation ON designation.designation_id=cop.designation_id";
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
		if($rs['img'] == "")
		{
			$img = "assets/images/No-Image-Available.png";
		}
		else if(file_exists('imgcop/'.$rs['img']))
		{
			$img = 'imgcop/'.$rs['img'];
		}
		else
		{
			$img = "assets/images/No-Image-Available.png";
		}
	echo "<tr>			
				<td><img src='$img' style='width: 70px; height: 75px;' ></td>		
				<td>$rs[cop_name]</td>			
				<td>$rs[substation_name]</td>			
				<td>$rs[designation_type]</td>			
				<td>$rs[gender]</td>			
				<td>
				<b>Ph. No.</b> $rs[contact_no]<br>
				<b>Email:</b> $rs[email_id]
				</td>
				<td>$rs[login_id]</td>					
				<td>$rs[status]</td>
	
	<td>
	
	<a href='addcop.php?editid=$rs[0]' class='btn btn-warning' style='width: 75px;'>Edit</a>
				
	<a href='viewcop.php?delid=$rs[0]'onclick='return confirmdel()' class='btn btn-danger' style='width: 75px;'>Delete</a>
				
	</td>
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
    <footer>
            <h3 class="footer_text">Crime Report Management System | © All Rights Reserved | Developed by Jacob & Jayant </h3>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html> 
<script>
function confirmdel()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>