<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="shortcut icon" href="63.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>News </title>
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
                    <ul class="navbar-nav ms-auto"  >
                            <li class="nav-item"><a class="nav-link" href="index.php" style="color: black;">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php"style="color: black;">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="news.php"style="color: black;">News</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="signup.php">Report</a></li> -->
                            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"style="color: black;">Report</a>
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
<div class="container0 m-1">
    <div class="d-flex justify-content-center mb-3" ><img src="91.png" width="1250px" height="220"></div>
    <div class="col-12 d-flex justify-content-center">
        <div class="input-group mb-3" style="width: 60%;transform: scale(1.0);">
            <input type="text" class="form-control shadow" id="keyword" placeholder="What you looking for ?" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-danger shadow" type="button" onclick="getnews()" id="button-addon2">Search</button>
          </div>
    </div>
   
</div>
      <div class="container0 ms-5 mb-2 me-5 mt-3" >
        <div class="d-flex justify-content-center">
          <div class="spinner-border text-danger" id="load_ui" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
        <div class="posts" >

        </div>
      </div>
        
          
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
      getnews();
      function getnews(){
        $(".posts").text("");
        var keyword = $("#keyword").val();
        if(keyword==''){
          keyword="crimes";
        }
        var url = "https://newsapi.org/v2/everything?q="+keyword+"&apiKey=9fcd4a29749c412e8d846bfa7ac3df07";
        $("#load_ui").hide();
        $.get(url,(response)=>{
      $("#load_ui").hide();
      console.log(response.articles[0]);
      for(i=0;i<6;i++){
        var html = ` <div class="card mb-5 shadow " style="background-color: #DC5F00">
          <div class="row g-0 mt-4">
            <div class="col-md-4 mt-4 ms-5 ">
              <img src="${response.articles[i].urlToImage}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-7 mb-1">
              <div class="card-body">
                <h5 class="card-title">${response.articles[i].title}</h5>
                <p class="card-text" style="color: black;" >${response.articles[i].content.slice(0,200)}</p>
                <p style="color: maroon" class="card-text"><small class="text">${response.articles[i].publishedAt} | ${response.articles[i].source.name} - ${response.articles[i].author}</small></p>
            <a href="${response.articles[i].url}" target="_blank" class="btn btn-primary">Read More</a>
            <p></p>
              </div>
            </div>
          </div>
        </div>`;
        $(".posts").append(html);
      }
    });
      }
    </script>
    <footer>
            <h3 class="footer_text">Crime Report Management System | © All Rights Reserved | Developed by Jacob & Jayant </h3>
        </footer>
</body>
</html>