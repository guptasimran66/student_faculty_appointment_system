<?php
 error_reporting(0);
session_start();
//connect and select DB
include('../header.php');

if (isset($_POST['submit1'])) {
  # code...
//transfer values sent from form
$admin="student";
$fname = $_POST['fname'];
$password = $_POST['password'];
$lname = $_POST['lname'];
$dob = $_POST['dob'];
$sex = $_POST['g'];
$branch = $_POST['branch'];
$year = $_POST['year'];
$email = $_POST['email'];
$mobno = $_POST['mobno'];
if (strlen($password) < 8)
    {
        $error = "Password must be at least 8 characters";
    }
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // check if email looks valid
    {
        $error = "Please enter a valid email";
    }
// checking if all variables have some values
else if(!empty($email)
            && !empty($password) && !empty($fname) && !empty($lname) && !empty($year) && !empty($branch)) {
  //injection protection

$sql = "SELECT * FROM student
        WHERE email='$email'";
$result = mysql_query($sql);

//count the number of rows found with the given info
$count = mysql_num_rows($result);

//the matched result must be equal to 1
if ($count == 1) {
  echo "Account Already exists";
  echo PHP_EOL;
    header("Location: ../login.php");
    exit();
}
else {
    $sqll = "Insert into student (fname, lname, password, dob, gender, branch, year, email, mobile) values('$fname','$lname','$password','$dob','$g','$branch','$year','$email','$mobno')";
    $resultt = mysql_query($sqll) or die($sqll."<br/><br/>".mysql_error());;
    $roww = mysql_fetch_array($resultt);
    $countt  = mysql_num_rows($resultt);
    if($count == 1) {
     $_SESSION['login_user'] = $email;
         $_SESSION['type']=$admin;
     header("location: student.php");
     exit();
  }
else {
     $error = "ERROR: Request not sent";
  }
}
}
}
if (isset($_POST['submit2'])) {
  # code...
//transfer values sent from form
$admin="faculty";
$fname = $_POST['fname'];
$password = $_POST['password'];
$lname = $_POST['lname'];
$sex = $_POST['g'];
$branch = $_POST['branch'];
$email = $_POST['email'];
$exp =$_POST['exp'];
$mobno = $_POST['mobno'];
$aror = $_POST['areaOf'];
$meetin = $_POST['meetin'];
if (strlen($password) < 8)
    {
        $error = "Password must be at least 8 characters";
    }
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // check if email looks valid
    {
        $error = "Please enter a valid email";
    }
// checking if all variables have some values
else if(!empty($email)
            && !empty($password) && !empty($fname) && !empty($lname) && !empty($branch)) {
  //injection protection

$sqls = "SELECT * FROM faculty
        WHERE email='$email'";
$resultm = mysql_query($sqls);

//count the number of rows found with the given info
$countm = mysql_num_rows($resultm);

//the matched result must be equal to 1
if ($countm == 1) {
  echo "Account Already exists";
  echo PHP_EOL;
    header("Location: ../login.php");
    exit();
}
else {
    $sqlp = "Insert into faculty (fname, lname, pass, exp, gender, depart, aor, email, mobile, preff) values('$fname','$lname','$password','$exp','$sex','$branch','$aror','$email','$mobno','$meetin')";
    $resultp = mysql_query($sqlp);
    $rowp = mysql_fetch_array($resultp);
    $countp  = mysql_num_rows($resultp);
    if($countp == 1) {
     $_SESSION['login_user'] = $email;
         $_SESSION['type']= $admin;
     header("location: ./fac.php");
     exit();
  }
else {
     $error = "ERROR: Request not sent";
  }
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SIGN UP</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="CSS/footer.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="icon" href="./images/favicon.ico" type="image/x-icon">

<script type="text/javascript">
  $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );</script>
  <style>
  form {
  z-index: 1100;
  background-color: #ffffff;
}
table {
  z-index: 1100;
  background-color: #ffffff;
}
  nav {
    background-image: url("./images/signup.jpg");
}
body {
  background: url("./images/header1.jpg") no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
</head>
<body>

  <nav role="navigation" class="transparent">

  </nav>
    <div class="container">
    <div class="row center"><br>
      <h1 class="header center" style=""><span style="color:red">CANNY CAMPUS</span></h1>
        <h5 class="header col s12 light">Sign-Up As:</h5>
      </div>
    </div>
  <div class="container">

    <div class="section">
      <div class="row center">
        <div class="col s12 m6 chota">
        <ul class="collapsible">
      <li class="x1">
      <div data-target="student" class="modal-trigger safronf btn-large waves-effect brown lighten-1" id="download-button">STUDENT</div>
        </li>
        </ul>
        </div>



<!--student modal-->


        <div id="student" class="modal">
            <div class="modal-content">
              <h4>Student Signup</h4>
              <div class="row">
  <form class="col s12" name="ry" action="" method="post">
    <div class="row">
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate" name="fname">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" name="lname">
          <label for="last_name">Last Name</label>
        </div>
      </div>
    <div class="row">
      <div class="input-field col s6">
        <input type="date" class="datepicker" required="" name="dob">
        <label for="username">Date of Birth</label>
      </div>
    </div>
    <div class="row">
  <div class="input-field col s6">
    <select name="g">
      <option value="" disabled selected>Choose your option</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <label>Gender</label>
  </div></div>
  <div class="row">
<div class="input-field col s6">
  <select name="branch">
    <option value="" disabled selected>Choose your option</option>
    <option value="1">CSE</option>
    <option value="2">ECE</option>
    <option value="2">CCE</option>
    <option value="2">MME</option>
    <option value="2">Mechanical</option>
  </select>
  <label>Branch</label>
</div></div>
    <div class="row">
      <div class="input-field col s6">
   <select name="year">
     <optgroup label="PG">
       <option value="1">Y14</option>
       <option value="2">Y15</option>
     </optgroup>
     <optgroup label="UG">
     <option value="4">Y12</option>
       <option value="3">Y13</option>
       <option value="4">Y14</option>
       <option value="4">Y15</option>
       <option value="4">Y16</option>
     </optgroup>
   </select>
   <label>Year</label>
 </div></div>
    <div class="row">
      <div class="input-field col s6">
        <input id="email" name="email" autocomplete="on" type="email" class="validate" required="">
        <label for="email">Institute Email</label>
      </div>
    </div>

     <div class="row">
      <div class="input-field col s6">
        <input id="password" name="password" autocomplete="off" type="password" class="validate" required="">
        <label for="email">Password</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input name="mobno" id="username" type="text" class="validate" autocomplete="on" required="">
        <label for="username">Mobile Number</label>
      </div>
    </div>
   <button class='col s12 btn btn-large waves-effect waves-light' type="submit1" value="submit1" name="submit1">Submit</button>
  </form>
</div>
            </div>
          </div>
        <div class="col s12 m6 chota">
        <ul class="collapsible" data-collapsible="accordion">
        <li class="x2">
      <div data-target="faculty" class="modal-trigger greenf btn-large waves-effect brown lighten-1" id="download-button">FACULTY</div>

        </li>
        </ul>
        </div>

        <!--student modal-->


                <div id="faculty" class="modal">
                    <div class="modal-content">
                      <h4>Faculty Signup</h4>
                      <div class="row">
          <form class="col s12" name="ry" action="" method="post">
            <div class="row">
                <div class="input-field col s6">
                  <input  id="first_name" type="text" class="validate" name="fname">
                  <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                  <input id="last_name" type="text" class="validate" name="lname">
                  <label for="last_name">Last Name</label>
                </div>
              </div>
            <div class="row">
          <div class="input-field col s6">
            <select name="g">
              <option value="" disabled selected>Choose your option</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
            <label >Gender</label>
          </div></div>
          <div class="row">
        <div class="input-field col s6">
          <select name="branch">
            <option value="" disabled selected>Choose your option</option>
            <option value="CSE">CSE</option>
            <option value="ECE">ECE</option>
            <option value="CCE">CCE</option>
            <option value="MME">MME</option>
            <option value="Mechanical">Mechanical</option>
            <option value="HSS">HSS</option>
          </select>
          <label>Department</label>
        </div></div>
        <div class="row">
          <div class="input-field col s6">
            <input id="last_name" type="number" class="validate" name="exp">
            <label for="last_name">Experience</label>
          </div>
        </div></div>
            <div class="row">
              <div class="input-field col s6">
                <input id="email" name="email" autocomplete="on" type="email" class="validate" required="">
                <label for="email">Institute Email</label>
              </div>
            <div class="input-field col s6">
              <input id="password" name="password" autocomplete="on" type="password" class="validate" required="">
              <label for="email">Password</label>
            </div></div>
            <div class="row">
              <div class="input-field col s6">
                <input name="mobno" id="username" type="text" class="validate" autocomplete="on" required="">
                <label for="username">Mobile Number</label>
              </div>
            </div>
            <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" name="areaOf"></textarea>
          <label for="textarea1">Area of Research</label>
        </div>
      </div><div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" name="meetin"></textarea>
          <label for="textarea1">Preferred visiting hours and days</label>
        </div>
      </div>
          <button class='col s12 btn btn-large waves-effect waves-light' type="submit" value="submit2" name="submit2">Submit</button>
          </form>
        </div>
                    </div>
                  </div>
        </div>

    </div>
  </div>
<br><br><br><br><br><br><br><br><br>

<section class="footer brown">
      <div class="container">
    <div class="footer-copyright">
      <strong>Copyright © 2016 Canny Campus. All rights reserved.</strong><span style="float:right">Beta Version</span>
      </div>
    </div>
</section>



  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/footer.js"></script>
  <script> $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });</script>
<script>
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 100 // Creates a dropdown of 15 years to control year
  });</script>
  <script>
  $(document).ready(function() {
  $('select').material_select();
});</script>
  </body>
</html>
