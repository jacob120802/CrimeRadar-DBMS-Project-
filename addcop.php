<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
session_start();
include("connect.php");
if(!isset($_SESSION['login_id'])){
    header('location:coplogin.php');
}
if(isset($_POST['submit']))
{
	$filename = rand() . $_FILES["img"]["name"];
	move_uploaded_file($_FILES["img"]["tmp_name"],"imgcop/".$filename);
	//Update Statement starts here
	if(isset($_GET['editid']))
	{
		$sql ="UPDATE cop SET cop_name='$_POST[cop_name]',substation_id='$_POST[substation_id]',designation_id='$_POST[designation_id]'";
		if($_FILES["img"]["name"] != "")
		{
		$sql = $sql . ",img='$filename'";
		}
		$sql = $sql . ",cop_pofile='$_POST[cop_pofile]',gender='$_POST[gender]',contact_no='$_POST[contact_no]',email_id='$_POST[email_id]',login_id='$_POST[login_id]',password='$_POST[password]',status='$_POST[status]' WHERE cop_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Cop Profile updated successfully!');</script>";
		}		
	}
	//Update Statement ends here
	//Insert statemetn starts here
	else
	{
		$sql ="INSERT INTO cop (cop_name,substation_id,designation_id,img,cop_pofile,gender,contact_no,email_id,login_id,password,status)values('$_POST[cop_name]','$_POST[substation_id]','$_POST[designation_id]','$filename','$_POST[cop_pofile]','$_POST[gender]','$_POST[contact_no]','$_POST[email_id]','$_POST[login_id]','$_POST[password]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Cop record inserted successfully!');</script>";
			echo "<script>window.location='viewcop.php';</script>";
		}
	}
}
?>
<?php
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM cop WHERE cop_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>    
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADD COP</title>
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
                            <h1>ADD COP</h1>
                        </div>
                    </div>
                </div>
            </div>
    </section>
        <!-- End Breadcrumb Section -->
<form method="post" action="">		
        <section class="pad-t100 pad-b70">
                <div class="row">
                    <center>
					<div class="col-md-11">
                        <div class="feature-4">
<div class="intro-text">
	<p>
<div class="row">
	<div class="col-md-2">Cop Name</div>
	<div class="col-md-10">
	<input type="text" name="cop_name" id="cop_name" class="form-control" value="<?php echo $rsedit['cop_name']; ?>">
	</div>
</div><br>

<div class="row">
	<div class="col-md-2">Sub-Station</div>
	<div class="col-md-10">
<select name="substation_id" id="substation_id" class="form-control">
	<option value="">Select Sub-Station</option>
	<?php
	$sqlstation = "SELECT * FROM substation WHERE status='Active'";
	$qsqlstation = mysqli_query($con,$sqlstation);
	while($rsstation = mysqli_fetch_array($qsqlstation))
	{
		if($rsstation['substation_id'] == $rsedit['substation_id'])
		{
			echo "<option value='$rsstation[substation_id]' selected>$rsstation[substation_name]</option>";
		}
		else
		{
			echo "<option value='$rsstation[substation_id]'>$rsstation[substation_name]</option>";
		}
	}
	?>
</select>
	</div>
</div><br>


<div class="row">
	<div class="col-md-2">Designation</div>
	<div class="col-md-10">
	<select name="designation_id" id="designation_id" class="form-control">
		<option value="">Select Designation</option>
		<?php
		$sqldesignation = "SELECT * FROM designation WHERE status='Active'";
		$qsqldesignation = mysqli_query($con,$sqldesignation);
		while($rsdesignation = mysqli_fetch_array($qsqldesignation))
		{
			if($rsdesignation['designation_id'] == $rsedit['designation_id'])
			{
			echo "<option value='$rsdesignation[designation_id]' selected>$rsdesignation[designation_type]</option>";
			}
			else
			{
			echo "<option value='$rsdesignation[designation_id]'>$rsdesignation[designation_type]</option>";
			}
		}
		?>
	</select>
	</div>
</div><br>

<div class="row">
	<div class="col-md-2">Image</div>
	<div class="col-md-10">
	<input type="file" name="img" id="img" class="form-control">
	<?php
	if(isset($_GET['editid']))
	{
		echo "<img src='imgcop/$rsedit[img]' style='width: 150px; height: 175px;'>";
	}
	?>
	</div>
</div><br>

<div class="row">
	<div class="col-md-2">Cop Profile</div>
	<div class="col-md-10">
		<textarea name="cop_pofile" id="cop_pofile" class="form-control"><?php echo $rsedit['cop_pofile']; ?></textarea>
	</div>
</div><br>

<div class="row">
	<div class="col-md-2">Gender</div>
	<div class="col-md-10">
	<select name="gender" id="gender" class="form-control">
		<option value="">Select Gender</option>
		<?php
		$arr = array("Male","Female");
		foreach($arr as $val)
		{
			if($val == $rsedit['gender'])
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
	<div class="col-md-2">Contact No</div>
	<div class="col-md-10">
	<input type="text" name="contact_no" id="contact_no" class="form-control" value="<?php echo $rsedit['contact_no']; ?>">
	</div>
</div><br>


<div class="row">
	<div class="col-md-2">Email Id</div>
	<div class="col-md-10">
	<input type="text" name="email_id" id="email_id" class="form-control" value="<?php echo $rsedit['email_id']; ?>">
	</div>
</div><br>


<div class="row">
	<div class="col-md-2">Login Id</div>
	<div class="col-md-10">
	<input type="text" name="login_id" id="login_id" class="form-control" value="<?php echo $rsedit['login_id']; ?>">
	</div>
</div><br>
<div class="row">
	<div class="col-md-2">Password</div>
	<div class="col-md-10">
	<input type="password" name="password" id="password" class="form-control" value="<?php echo $rsedit['password']; ?>">
	</div>
</div><br>
<div class="row">
	<div class="col-md-2">Confirm Password</div>
	<div class="col-md-10">
	<input type="password" name="cpassword" id="cpassword" class="form-control" value="<?php echo $rsedit['password']; ?>">
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
									<br>
									<div class="row">
											<div class="col-md-12">
											<center><input type="submit" name="submit" id="submit" class="form-control btn btn-danger" style="width: 250px;" ></center>
											</div>
									</div><br>
								</p>
                        </div>
                    </div>
                </div>
										</center>
            </div>
        </section>
		</form>
    <footer>
            <h3 class="footer_text">Crime Report Management System | © All Rights Reserved | Developed by Jacob & Jayant </h3>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>