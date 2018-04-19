<?php error_reporting(0); ?>

<?php
error_reporting(0);
session_start();

include('header.php');

if(isset($_POST['submit']) && !empty($_POST['email'])
               && !empty($_POST['password']) && !empty($_POST['admin'])) {

      $email = $_POST['email'];
      $password = $_POST['password'];
      $admin = $_POST['admin'];

if($admin == "student") {

$sql = "SELECT * FROM student WHERE email='$email' and password='$password'";
        $result = mysql_query($sql);
		$row = mysql_fetch_array($result);

		$count = mysql_num_rows($result);

//the matched result must be equal to 1
if($count == 1) {
         $_SESSION['login_user'] = $email;
         $_SESSION['type']=$admin;

         header("location: canny_campus/student.php");
         exit();
      }
else {
         $error = "Your Email or Password is invalid";
      }
}
if($admin == "faculty") {
//injection protection
$sqln = "SELECT * FROM faculty WHERE email='$email' and pass='$password'";
        $resultn = mysql_query($sqln);
$row = mysql_fetch_array($resultn);
$active = $row['active'];
$countn = mysql_num_rows($resultn);

//the matched result must be equal to 1
if($countn == 1) {
         $_SESSION['login_user'] = $email;
         $_SESSION['type'] = $admin;
         header("location: canny_campus/fac.php");
         exit();
      }
else {
         $error = "Your Email or Password is invalid";
      }
}
}
?>
<html>

<head>
  <title>Login</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link rel="stylesheet"  type="text/css" href="./css/Style.css">
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
<link rel="icon" href="./images/favicon.ico" type="image/x-icon">
  <style>
  body {
    background-image: url("./images/header1.jpg");	}
	form {
  		z-index: 1100;
	}
	table {
	  	z-index: 1100;
	}
	h4 {
		letter-spacing: 2px;
	}
	div.icon {
    position: relative;
    right: 80px;
    color: black;
}
</style>
</head>

<body>
	<main>
	<div class='icon' align="right">
		<p>Watch us on Youtube</p>
		<a href="https://www.youtube.com/user/kissaboutvolume/videos?shelf_id=0&view=0&sort=dd"><img class="img-responsive" src="./images/YouTube-icon-small.png" alt="Youtube" height="60px" width="60px"></a>
	</div>
	<center>
		<div class="container" style = "padding-top: 0px">
        	<div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 0px 48px 0px 48px; border: 1px solid #EEE;">
          		<form class="col s12" method="post" action="">
            		<center>
            		<div class='row'><h4>Log in to continue<h4></div>
            		</center>
	            	<div class='row'>
	       				<div class='input-field col s12'>
                			<input class='validate' type='email' name='email' id='email' />
                			<label for='email'>Enter your email</label>
              			</div>
            		</div>
            		<div class='row'>
              			<div class='input-field col s12'>
                			<input class='validate' type='password' name='password' id='password' />
                			<label for='password'>Enter your password</label>
              			</div>
              			<label style='float: right;'>
						<a class='pink-text' href='#!'><b>Forgot Password?</b></a>
						</label>
		            </div>
		            <div class='row'>
              			<div class='input-field col s24'>
                			<input name="admin" type="radio" id="student" value="student" />
                			<label for="student">Student</label>
              			</div>
              			<div class='input-field col s24'>
                			<input name="admin" type="radio" id="faculty" value="faculty" />
                			<label for="faculty">Faculty</label>
              			</div>
            		</div>
 		           <br/>
 		           <center>
 		           <div class='row'>
                		<button class='col s12 btn btn-large waves-effect brown' type="submit" value="submit" name="submit">Login</button>
                		<br/><p>Not registered?</p>
		                <a href="./canny_campus/signup.html">Create account</a>
		           </div>
		           </center>
          		</form>
        	</div>
      	</div>
    </center>

  	</main>

  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>

</html>
