<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
session_start();
include("connect.php");
?>
<?php
if(!isset($_SESSION['login_id']) && !isset($_SESSION['username']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM complaint WHERE complaint_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Complaint record deleted successfully...');</script>";
		echo "<script>window.location='viewcomplaint.php';</script>";
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VIEW COMPLAINTS</title>
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
            <li><a class="dropdown-item" href="viewcomplaint.php">My Complaints</a></li>
            <li><a class="dropdown-item" href="complainerprofile.php">My Profile</a></li>
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
						
<h3 class="underline"><span>View Complaint Records</span></h3>

<p class="mb30">


<table id="datatablefixcolumn"  class="table table-striped table-bordered">
    
	<thead>
		<tr>		
        <th>Sn No:</th>
			<th>Complaint No.</th>		
			<th>Complaint date</th>		
			<th>Complainer</th>		
			<th>Station</th>		
			<th>Complaint Type</th>					
			<th>Accused</th>			
			<th>Victim</th>	
            <th>Evidence</th>									
			<th style='width: 80px;'>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
        $a = 0;
		$sql = "SELECT complaint.*,substation.substation_name,substation.contact_no,substation.substation_addresss, station.state,substation.city, complainer.name,complainer.username, complainer.mobile FROM complaint LEFT JOIN substation on complaint.substation_id=substation.substation_id LEFT JOIN station ON station.station_id=substation.station_id LEFT JOIN complainer ON complainer.complainer_id=complaint.complainer_id";
		if(isset($_SESSION['username']))
		{
			$sql = $sql . " WHERE complainer.username='$_SESSION[username]' ";
		}
		if(isset($_GET['complainerid']))
		{
			$sql = $sql . " WHERE complaint.complainer_id='$_GET[complainerid]' ";
		}
        $qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_assoc($qsql))
		{
            $a++;
			echo "<tr>
            <td>$a</td>		
					<td>$rs[complaint_id]</td>	
					<td>" . date("d-M-Y h:i A",strtotime($rs['complaint_date'])) ."</td>	
					<td>$rs[name]<br>$rs[username]<br>$rs[mobile]</td>	
					<td>$rs[substation_name],<br>$rs[city], $rs[state]</td>	
					<td>$rs[complaint_type]</td>					
					<td>$rs[accused]</td>			
					<td>Name::$rs[victims_name]<br>Ph.No:$rs[victim_phoneno]<br>Address:$rs[victim_address]</td>
                    <td>$rs[evidence]</td>									
					<td>";
			if(isset($_SESSION['login_id']))
			{
			echo "<a href='viewcomplaint.php?delid=$rs[complaint_id]'onclick='return confirmdel()' class='btn btn-danger' style='width: 70px;'>Delete</a><hr>";
			}
			echo "<a href='comcomplaintacknowledgementreport.php? goid=$rs[complaint_id]' class='btn btn-info' style='width: 70px;'>View</a>";
			echo "</td></tr>";
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