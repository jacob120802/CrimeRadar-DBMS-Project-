<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ABOUT US</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="63.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
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
    <div class="section1">
    <label class="img_text2">ABOUT US</label>
    <img class="imgt" src="16.jpeg">
    </div>
    <div class="cont3">
        <div class="row">
            <div class="col-md-2">  
            <div class="image-flex-jacob">
                <div class="jacob-image mt-5">
                    <img src="jacob.png" alt="Jacob" style="border-radius: 7px;">
                </div>
                <div class="image-caption">
                    Jacob Abraham<br />
                    Founder, CrimeRadar
                </div>
            </div>
            </div>
            <div class="col-md-6">
                <center><h2>Hola Folks!</h2></center>
                <p>We are a team of Freshers who are pursuing our interests in the field of Web Development & Database Management. We are using this as our first project to enter the vast field of Web Development & Database Management and learn it in depth.<br/>
                 By means of this project, We plan to will reduce the paperwork of the Police Station and makes the process handling of records easier. Here Complainer can easily lodge a complaint, and Cop can maintain & retrieve all the records like criminal records, complaint records, case history, many more very conviniently. This web application decreases human effort and makes the system less time consuming.</p>
            </div>
            <div class="col-md-2">
            <div class="image-flex-jayant">
                <div class="jayant-image mt-5">
                    <img src="jayant.png" alt="Jayant" style="border-radius: 7px;">
                </div>
                <div class="image-caption">
                    Jayant Apte<br />
                    Founder, CrimeRadar
                </div>
            </div>
            </div>
        </div>
    </div>
    <section class="pad100">
            <div class="container">
                    <div class="section-title text-center">
                        <h2>Drop Us a Message<br/><p></p></h2>
                    </div>
                <div class="row">
                <div class="col-md-6 ms-5">
                    <form id="contactForm" class="contact-form" method="post" role="form" action="https://formsubmit.co/jacob120802@gmail.com">
                        <div class="messages"></div>
                        <div class="controls ">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Name *" required="required" data-error="Name is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Email Address" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <input id="form_phone" type="text" name="phone" class="form-control" placeholder="Phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <input id="form_subject" type="text" name="subject" class="form-control" placeholder="Subject *" required="required" data-error="Subject is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group ms-2">
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Message *" required="required" data-error="Please,leave us a message." style="min-height: 120px;"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="text-center">
                                    <input type="hidden" name="_next" value="http://localhost/crime/about.php">
                                    <input type="submit" class="btn btn-danger mb30" value="Send message">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <center class="text-muted"><center> <strong>(*These fields are required.)</strong></center>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 mbl-mar-top mx-5 ">
                    <div class="feature-5">
                            <div class="media-body">
                                <a href="#"><h4>Address</h4></a>
                                <div class="feature-text">
                                    <p>3rd Floor, City Light Building,<br/>Mangalore - 575003.</p>
                                </div>
                            </div>
                    </div>
                    <div class="feature-5">
                            <div class="media-body">
                                <a href="#"><h4>E-mail</h4></a>
                                <div class="feature-text">
                                    <p>jacob120802@gmail.com<br/>jayantapte34@gmail.com</p>
                                </div>
                            </div>
                    </div>
                    <di class="feature-5">
                            <div class="media-body">
                                <a href="#"><h4>Phone</h4></a>
                                <div class="feature-text">
                                    <p>+919421012095<br/>+919921836102</p>
                                </div>
                            </div>
                    </div>
                </div>
                </div>
                
            </div>
        </section>

    <footer>
            <h3 class="footer_text">Crime Report Management System | © All Rights Reserved | Developed by Jacob & Jayant </h3>
    </footer>
    </body>
</html>