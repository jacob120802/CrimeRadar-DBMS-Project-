<?php
include "connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REPORT COMPLAINT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="63.png" type="image/x-icon">
    <style>
            input{
                /* height:10px; */
                /* margin:auto; */
            }
            .form-control{
                width:60%;
                
            }
            label{
                margin-left:-700px;
            }
    </style>
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
                            <li class="nav-item"><a class="nav-link" href="complaint.php">REGISTER COMPLAINT</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="signup.php">More </a></li> -->
                            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">REPORTS</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="login.php">Login as Complainer</a></li>
            <li><a class="dropdown-item" href="signup.php">Sign Up as Complainer</a></li>
          </ul>
        </li>
                            <li class="nav-item"><a class="btn btn-danger" href="logout.php">LOGOUT</a></li> 
                    </ul>
                </div>
            </div>
        </nav>  
    </header>
      <center>
         <h2>REPORT A CRIME</h2>
                             <form id="contactForm" class="contact-form" method="post" role="form" action="complaint.php">
                        <div class="messages"></div>
                        <div class="controls ">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" name="name" class="form-control" placeholder="Name *" required="required" data-error="Name is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Username</label>
                                        <input id="username" type="text" name="username" class="form-control" placeholder="Email *" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Mobile Number</label>
                                        <input id="mobile type="text" name="phone" class="form-control" placeholder="Phone *">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Substation</label>
                                        <input id="substation" type="text" name="substation" class="form-control" placeholder="Substation *" required="required" data-error="Subject is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="station">Station</label>
                                        <input id="station" type="text" name="station" class="form-control" placeholder="Station *" required="required" data-error="Subject is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="complainType">Complaint Type</label>
                                        <input id="complaintType" type="text" name="complaintType" class="form-control" placeholder="Complaint Type *" required="required" data-error="Subject is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Complaint Detail</label>
                                        <input id="complaintDetail" type="text" name="complaintDetail" class="form-control" placeholder="Complaint Detail *" required="required" data-error="Subject is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="substation">Substation</label>
                                        <input id="substation" type="text" name="address" class="form-control" placeholder="Address" required="required" data-error="Subject is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="complaintDate">Complaint Date</label>
                                        <input id="complaintDate" type="date" name="complaintDate" class="form-control" placeholder="Complaint Date" required="required" data-error="Subject is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="acccused">Substation</label>
                                        <input id="accused" type="text" name="accused" class="form-control" placeholder="Name of accused" required="required" data-error="Subject is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="evidence">Evidence</label>
                                        <input id="evidence" type="text" name="evidence" class="form-control" placeholder="Evidence" required="required" data-error="Subject is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                <div class="form-group ms-2">
                                <label for="name">Note</label>
                                        <textarea id="anynote" name="anynote" class="form-control" placeholder="Please leave us a note ..." required="required" data-error="Please,leave us a message." style="min-height: 120px;"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="text-center"
                                    <input type="hidden" name="_next" value="http://localhost/crime/about.php">
                                    <input type="submit" class="btn btn-danger mb30" value="Send message">
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
      </center>
    <footer>
            <h3 class="footer_text">Crime Report Management System | © All Rights Reserved | Developed by Jacob & Jayant </h3>
    </footer>
 </body>
</html>