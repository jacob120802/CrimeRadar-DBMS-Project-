<?php
$login=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=='POST')
{
  include 'connect.php';
  $login_id=$_POST['login_id'];
  $password=$_POST['password'];
  $sql ="SELECT * FROM cop WHERE login_id='$login_id' and password='$password' and status='Active'";
  $result=mysqli_query($con,$sql);
  if($result){
    $row=mysqli_fetch_array($result);
    if($row["designation_id"]>"1"){
      $login=1;
      session_start();
      $_SESSION['login_id']=$login_id;
      $rw = mysqli_fetch_assoc($result);
      $_SESSION['substation_id'] = $rw['substation_id'];
      header('location:dashboard.php');
    }
    elseif($row["designation_id"]=="1"){
      $login=1;
      session_start();
      $_SESSION['login_id']=$login_id;
      header('location:admindashboard.php');
    }
    else{
        $invalid=1;
    }
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COP LOGIN PAGE</title>
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
                    <ul class="navbar-nav ms-auto">
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
    <img class="bg" src="a.jpeg">
    <?php
    if($login)
    {
      echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> You are successfully Logged In.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
     <?php
    if($invalid)
    {
      echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error!</strong> Invalid Credentials.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    <div class="container4">
    <center class="title_deg mt-3">COP LOGIN PAGE</center>
        <form class="login_form"  action="coplogin.php" method="post" >
            <div class="mb-3 me-3 ">
                <label class="form-label">Login ID</label>
                <input type="text" class="form-control" placeholder="Enter your login id"name="login_id" required>
            </div>
            <div class="mb-3 me-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger ">Login</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </div>
    <footer>
            <h3 class="footer_text">Crime Report Management System | © All Rights Reserved | Developed by Jacob & Jayant </h3>
        </footer>
  </body>
</html>