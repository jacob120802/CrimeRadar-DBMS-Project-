<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
session_start();
include("connect.php");
if(!isset($_SESSION['login_id'])){
    header('location:coplogin.php');
}
if(isset($_POST['submit']))
{
	//Update Statement starts here
	if(isset($_GET['editid']))
	{
		$sql ="UPDATE station SET state='$_POST[state]',description='$_POST[description]',status='$_POST[status]' WHERE station_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('state record updated successfully');</script>";
            echo "<script>window.location='viewstation.php';</script>";
		}	
	}
	//Update Statement ends here
	//Insert statemetn starts here
	else
	{
		$sql ="INSERT INTO station (state,description,status)values('$_POST[state]','$_POST[description]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('state record inserted successfully');</script>";
			echo "<script>window.location='viewstation.php';</script>";
		}	
	}
	//Insert statemetn ends here

}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM station WHERE station_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VIEW STATIONs</title>
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
    <section class="breadcrumb-section parallax" style="background-image: url(assets/images/bg/breadcrumb4.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <h1>ADD STATE </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		</form>
        <!-- End Breadcrumb Section -->


        <!-- Start About Section -->
		<form method="post" action="" >
        <section class="pad-t100 pad-b70">
                <div class="row">
                    <center>
					<div class="col-md-11">
                        <div class="feature-4">
	
<div class="intro-text">
	<p>

<div class="row">
	<div class="col-md-2">State</div>
	<div class="col-md-10">
	<input name="state" id="state" class="form-control" type="text" value="<?php echo $rsedit['state']; ?>">
	</div>
</div><br>


<div class="row">
	<div class="col-md-2">Description</div>
	<div class="col-md-10">
		<textarea name="description" id="description" class="form-control"><?php echo $rsedit['description']; ?> </textarea>
	</div>
</div><br>

<div class="row">
	<div class="col-md-2">Status</div>
	<div class="col-md-10">
	<select name="status" id="status" class="form-control">
		<option value="">Select Status</option>
		<?php
		$arr = array("Active","Inactive");
		foreach($arr as $val)
		{
			if($val == $rsedit['status'])
			{
			echo "<option value='$val' selected>$val</option>";
			}
			else
			{
			echo "<option value='$val'>$val</option>";
			}
		}
		?>
	</select>
	</div>
</div><br>




<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-10">
	<input type="submit" name="submit" id="submit" class="form-control btn btn-danger" style="width: 250px;" >
	</div>
</div><br>

	</p>
</div>

                        </div>
                    </div>
                    </center>
                </div>
            
        </section>
        <footer>
            <h3 class="footer_text">Crime Report Management System | © All Rights Reserved | Developed by Jacob & Jayant </h3>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html> 