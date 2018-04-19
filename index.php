<?php error_reporting(0); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
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
div.transbox {
    margin: 30px;
    background-color: #ffffff;
    border: 1px solid black;
    opacity: 0.7;
}
div.input-group input[type=text] {
    width: 600px;
    box-sizing: border-box;
    border: 2px solid #eeeeee;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 0px 20px 0px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
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
        <li><a class="page-scroll" href="./about.html">ABOUT US</a></li>
        <li><a class="page-scroll" href="#contact">CONTACT US</a></li>
        <li><a class="page-scroll" href="#googleMap">LOCATE US</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Container (HOME Section) -->
<div id="band" class="container text-center">

  <div class="background">
    <div class="transbox">
      <h1 style="color:red; font-size:200%;"><b>WELCOME TO CANNY CAMPUS</b></h1>
      <p style="color:red; font-size:140%;"><em> Connect - Resolve - Reconnect </em></p>
      <p style="color:black; font-size:150%;">This app is about an efficient interaction between the faculty and the students and acts as a mulitpurpose platform for students.It enables students to easily know about the availability of faculties and different lecture halls. It helps in reducing the time taken to commute to and fro, by teachers setting theri status available or busy and students finding an apt time for meeting.We have created a fictional band website.</p>
      <br>
    </div>
  </div>

  <div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
		      <div class="input-group">
            <div class="input-group-btn search-panel">
                <button type="button" class="btn btn-primary dropdown-toggle brown" data-toggle="dropdown">
                    	<span id="search_concept">Search By</span> <span class="caret"></span>
                </button>

                <ul class="dropdown-menu" role="menu">
                      <li><a href="#dept">Department</a></li>
                      <li><a href="#aoi">Areas of Interest</a></li>
                      <li><a href="#fac">Faculty</a></li>
                      <li class="divider"></li>
                      <li><a href="#all">Others</a></li>
                </ul>

            </div>
                 <span>
            <input type="hidden" name="search_param" value="all" id="search_param">
           <input type="text" class="form-control" name="x" placeholder="Search term..."></span>

            <span class="input-group-btn">
              <button class="btn btn-primary brown" type="button"><span class="glyphicon glyphicon-search"></span></button>
            </span>

          </div>
        </div>
    </div>
  </div>
</div>

<!-- Container (CONTACT Section) -->
<div id="contact" class="container">
  </br></br></br></br></br></br></br></br></br></br></br></br>
  <?php

      if(isset($_POST['submit']))
      {
           $empty=0;
           foreach($_POST as $key => $value)
      {
          if(!isset($value) || empty($value) || $_SERVER["REQUEST_METHOD"] != "POST")
      {
          echo "<center><b>****Please fill all the fields****</b></center>";
          $empty=1;
          break;
      }
    }
    if($empty!=1)
    {
      $email=$_POST['email'];
      $name=$_POST['name'];
      $comments=$_POST['comments'];
      require_once 'canny_campus/PHPMailer/PHPMailerAutoload.php';
      $mail = new PHPMailer;

      $mail->isSMTP();
      $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'cannycampus@gmail.com';
      $mail->Password = 'coolgroups';
      $mail->SMTPSecure = 'tls';

      $mail->From = 'noreply@gmail.com';
      $mail->FromName = 'Canny Campus';
      $mail->addAddress($email);
      $mail->addReplyTo($email);
      $mail->WordWrap = 50;
      $mail->isHTML(true);

      $mail->Subject = 'Query on Canny Campus';
      $mail->Body    = '<b>Query:</b>'.$comments.'<div><font color="red"><br>
      from: email- '.$email.'<br>Name: '.$name.'<br> </div>';

      if(!$mail->send()) {
        echo '<b><center>Query not submitted.<br>ERROR..</center></b>. $mail->ErrorInfo';
      }

      echo '<b><center>Your query is Submitted.</center></b>';
  }


  }
  ?>
  <h3 class="text-center">Contact</h3>
  </br>
  <div class="row">
    <div class="col-md-4">
        <p>Any Queries? -Drop a note.</p>
        <p><span class="glyphicon glyphicon-map-marker"></span> Jaipur, India </p>
        <p><span class="glyphicon glyphicon-phone"></span> Phone: +141 5191711/5191712/09 </p>
        <p><span class="glyphicon glyphicon-envelope"></span> Email: info@lnmiit.ac.in </p>
  	    <p><span class="glyphicon glyphicon-laptop"></span> Website: www.lnmiit.ac.in </p>
    </div>
    <form method="post" action="index.php">
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit" name="submit" value="submit">Send</button>
        </div>
      </div>
    </div></form>
  </div>
</div>

<center><div id="googleMap" style="height:500px;width:80%;"></div></center>

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

<!-- Add Google Maps -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
$(document).ready(function(e){
$('.search-panel .dropdown-menu').find('a').click(function(e) {
  e.preventDefault();
  var param = $(this).attr("href").replace("#","");
  var concept = $(this).text();
  $('.search-panel span#search_concept').text(concept);
  $('.input-group #search_param').val(param);
});
});
</script>
<script>
var myCenter = new google.maps.LatLng(26.934035, 75.922158);

function initialize() {
var mapProp = {
center:myCenter,
zoom:16,
scrollwheel:true,
draggable:true,
mapTypeId:google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
position:myCenter,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
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
