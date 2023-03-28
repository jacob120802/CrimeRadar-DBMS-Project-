<?php
$success=0;
$user=0;
$showError = false;
if($_SERVER['REQUEST_METHOD']=='POST')
{
  include 'connect.php';
  $name=$_POST['name'];
  $username=$_POST['username'];
  $gender=$_POST['gender'];
  $mobile=$_POST['mobile'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  /* $sql="insert into cop (username,password) values('$username','$password')";
  $result=mysqli_query($con,$sql);
  if($result){
    echo"Data inserted sucessfully";
  }
  else{
    die(mysqli_error($con));
  } */
  $sql="Select * from complainer where username='$username'";
  $result=mysqli_query($con,$sql);
  if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
      //echo"User already exist";
      $user=1;
    }
    else{
      if (($password == $cpassword)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "insert into complainer (name,username,gender,mobile,password) values('$name','$username','$gender','$mobile','$hash')";
        $result = mysqli_query($con, $sql);
        if ($result) {
          //echo"SignUp sucessfully";
          $success = 1;
          header('location:login.php');
        } else {
          die(mysqli_error($con));
        }
      }
      else {
          $showError = "Passwords do not match";
      } 
    }
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COMPLAINER SIGN-UP PAGE</title>
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
    if($user)
    {
      echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Ohh no Sorry!</strong> User already exist.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    <?php
    if($success)
    {
      echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> You are successfully Signed Up.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    <div class=container5 ">
      <center class="title_deg mt-3">COMPLAINER SIGN-UP PAGE</center>
    <div class="login_form">
      <center>Already a member? <a href="login.php">Log in</a><br/></p></center>
        <form action="signup.php" method="post" >
            <div class="mb-3 me-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" required>
            </div> 
            <div class="mb-3 me-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="username" autocomplete="off" required>
            </div>
            <div class="mb-3 me-3">
                <label class="form-label">Gender:   </label>
                <input type="radio" name="gender" value="m"> Male   
                <input type="radio" name="gender" value="f"> Female   
                <input type="radio" name="gender" value="o"> Others   
              </div> 
              <div class="mb-3 me-3">
                <label class="form-label">Mobile No.</label>
                <input type="text" class="form-control" placeholder="Enter your mobile no" name="mobile" autocomplete="off" required>
            </div>
            <div class="mb-3 me-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
            </div>
            <div class="mb-3 me-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Enter your password again" name="cpassword" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger ">Sign Up</button>
            </div>
        </form>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <footer>
            <h3 class="footer_text">Crime Report Management System | © All Rights Reserved | Developed by Jacob & Jayant </h3>
        </footer>
  </body>
</html>