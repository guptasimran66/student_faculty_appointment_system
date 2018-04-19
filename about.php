<?php error_reporting(0); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>About</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link rel="stylesheet"  type="text/css" href="./css/style.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
<link rel="icon" href="./images/favicon.ico" type="image/x-icon">
<style>
</style>
</head>

<body id="homePage" data-spy="scroll" data-target=".navbar" data-offset="10"  background-image: url("header1.jpg")>

<!--MAIN PAGE -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">

    <div class="navbar-header">
      <a href="http://www.lnmiit.ac.in"><img class="img-responsive" src="./images/logo.png" alt="lnmiit logo" height="90px" width="150px"></a>

    <a class="navbar-brand page-scroll" href="#homePage">CANNY CAMPUS</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="./canny_campus/signup.php" id="sign_up"><span class="glyphicon glyphicon-user" ></span>SIGN UP</a></li>
      <li><a href="./login.php" id="log_in"><span class="glyphicon glyphicon-log-in">LOGIN</span></a></li>
    </ul>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a class="page-scroll" href="#band">HOME</a></li>
        <li><a class="page-scroll" href="#band">ABOUT US</a></li>
        <li><a class="page-scroll" href="#contact">CONTACT US</a></li>
        <li><a class="page-scroll" href="#googleMap">LOCATE US</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" class="page-scroll"href="#homePage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <div class="main">
    <div class="content">
      <div class="footer-grids">

        <div class="footer one">
          <h3>OUR TEAM</h3>
          <img src="images/team.jpg"></img>
          <p>Product Owner - Simran Gupta</p>
          <p>Other Members - Pooja Biyani, Srishti Bhardwaj, Somya S. Jain, Mudit Sharma, Sammriddh Kulshresta</p>
        </div>

        <div class="footer two">
          <h3>KEEP CONNECTED</h3>
          <ul>
            <li><a class="fb" href="#">Like us on Facebook</a></li>
            <li><a class="fb1" href="#">Follow us on Twitter</a></li>
            <li><a class="fb2" href="#">Add us on Google Plus</a></li>
            <li><a class="fb3" href="#">Follow us on Instagram</a></li>
            <li><a class="fb4" href="#">Follow us on Pinterest</a></li>
          </ul>
        </div>

      <div class="copy-right-grids">
        <div class="copy-right">
            <p class="footer-gd">© 2016 Canny Campus. All Rights Reserved.</p>
        </div>
        <div class="copy-right">
          <ul>
            <li><a href="#">Application Information</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms & Conditions</a></li>
          </ul>
        </div>
        <div class="clear"></div>
      </div>
      
    </div>
  </div>
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });
  });
})
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

<script type="text/javascript">
  $('#sign_up').on('click',function(){
    window.open($(this).attr('href'));
  });
  $('#log_in').on('click',function(){
    window.open($(this).attr('href'));
  });
</script>
</body>
</html>
