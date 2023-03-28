<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
session_start();
include("connect.php");
if(isset($_POST['submit']))
{
 	$sql ="UPDATE complainer  SET name='$_POST[name]',username='$_POST[email_id]',mobile='$_POST[phoneno]' WHERE username='$_SESSION[username]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Complainer Profile updated successfully');</script>";
		echo "<script>window.location='complainerprofile.php';</script>";
	}
	else
	{
		echo "<script>alert('Failed to update Complainer Profile');</script>";
		// echo "<script>window.location='complainerprofile.php';</script>";
	}
}
?>
<?php
if(isset($_SESSION['username']))
{
	$sqlcopprofile = "SELECT * FROM complainer WHERE username='$_SESSION[username]'";
	$qsqlcopprofile = mysqli_query($con,$sqlcopprofile);
    // echo var_dump($qsqlcopprofile = mysqli_query($con, $sqlcopprofile));
	$rscopprofile = mysqli_fetch_array($qsqlcopprofile);
    $name=$rscopprofile['name'];
    $email_id=$rscopprofile['username'];
    $phoneno=$rscopprofile['mobile'];
    $password=$rscopprofile['password'];
}
?>  
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COMPLAINER PROFILE</title>
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
        <!-- Start Breadcrumb Section -->
        <section class="breadcrumb-section parallax" style="background-image: url(60.png); background-repeat: no-repeat;
  background-size: 1270px 175px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <h1 style="color:maroon; text-align: end;">Complainer Profile</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Section -->
<form method="post" action="">
        <!-- Start About Section -->
        <section class="pad-t100 pad-b70">
            <div class="container">
                <div class="row">
					<div class="col-md-12">
                        <div class="feature-4">
	<hr>
<div class="intro-text">
	<p>
	
<div class="row">
	<div class="col-md-2">Name</div>
	<div class="col-md-10">
	<input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>" >
	</div>
</div><br>

<div class="row">
	<div class="col-md-2">Username</div>
	<div class="col-md-10">
	<input type="text" name="email_id" id="email_id" class="form-control" value="<?php echo $email_id; ?>">
	</div>
</div><br>

<div class="row">
	<div class="col-md-2">Phone No.</div>
	<div class="col-md-10">
	<input type="text" name="phoneno" id="phoneno" class="form-control" value="<?php echo $phoneno; ?>">
	</div>
</div><br>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-10">
	<input type="submit" name="submit" id="submit" class="form-control btn btn-danger" style="width: 250px;" value="Update Profile" >
	</div>
</div><br>

	</p>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		</form>
        <footer>
            <h3 class="footer_text">Crime Report Management System | © All Rights Reserved | Developed by Jacob & Jayant </h3>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>