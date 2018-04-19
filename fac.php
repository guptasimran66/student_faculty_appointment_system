<?php
 error_reporting(0);
   include('session.php');

$femail = $_SESSION['login_user'];

   $sqlm = "SELECT * FROM facultyapp WHERE facname= '$femail'";
           $resultm = mysql_query($sqlm);
       $rowm = mysql_fetch_array($resultm);

   if(isset($_POST['submit2']) && !empty($_POST['number']) && !empty($_POST['date']) && !empty($_POST['stime']) && !empty($_POST['etime']) && !empty($_POST['reason'])) {

         $number = $_POST['number'];
         $date = $_POST['date'];
         $stime = $_POST['stime'];
         $etime = $_POST['etime'];
         $reason = $_POST['reason'];
         $email = $_SESSION['login_user'];
         $type = $_SESSION['type'];


   $sql = "INSERT INTO lhrequest (email,type,numb,kdate,stime,etime,reason) VALUES ('$email','$type', '$number', '$date' , '$stime','$etime', '$reason')";
           $result = mysql_query($sql);
       $row = mysql_fetch_array($result);

       $count = mysql_num_rows($result);

   //the matched result must be equal to 1
   if($count == 1) {
            header("location: ./canny_campus/student.php");
            exit();
         }
   else {
            $error = "ERROR: Request not sent";
         }
   }
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Faculty portal</title>

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
  body {
    background: url("./images/header1.jpg") no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    <!--background-color: #f5f5f5;-->
  }
  form {
  z-index: 1100;
  }
  table {
  z-index: 1100;
  }
  nav {font-family: Arial, sans-serif;
}
  </style>

</head>
<body>

  <nav role="navigation" class="transparent">

    <div class="nav-wrapper container">
     <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons menux">menu</i></a>
     <span></span>
      <ul class="right hide-on-med-and-down biitch">
        <ul class="dropdown-button dropdown-content" id="dropdown_blog">
        </ul>

       <li>
       <form>
        <div class="input-field sonofbitch">
          <input id="search" type="search" required>
          <label for="search"></label>
        </div>
      </form></li>
      <li><a class="dropdown-button" href="#" data-activates="dropdown_nri"><?php echo $login_session; ?></a></li>
      <li><a href="#" class="black-text">PROFILE</a></li>
      <li><a href="#" class="black-text">NOTIFICATIONS</a></li>
      <li><a href="#" class="black-text">CHANGE PASSWORD</a></li>
      <li><a class="dropdown-button" href="#" data-activates="dropdown_india"></a></li>
      <li><a class="dropdown-button" href="#" data-activates="dropdown_blog"></a></li>
        <li><a href="logout.php" class="black-text">LOGOUT</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Profile</a></li>
        <li><a href="#">LT booking History</a></li>
        <li><a href="#">Change password</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>



    <div class="container">
    <div class="row center"><br>
      <h2 class="header center"><span style="color:red;">CANNY CAMPUS</span>
        <h5 class="header col s12 light">Welcomes You on Faculty Portal</h5>
      </div>
    </div>
  <div class="container">

    <div class="section">
      <div class="row center">
        <div class="col s12 m6 chota">
        <ul class="collapsible" data-collapsible="accordion">
      <li class="x1">
      <div data-target="stud" class="modal-trigger btn-large waves-effect brown lighten-1" id="download-button">RESPOND TO REQUEST</div>
      </li></ul></div>


        <div id="stud" class="modal">
            <div class="modal-content">
              <h4>Appointment Requests</h4>
 <form>
              <div><table><tr><th> Name </th><th> Appointment date </th><th> Appointment time </th><th> Reason </th><th colspan="2"> Action</th></tr>
         <tr><td><?php echo $rowm['semail'];?></td><td><?php echo $rowm['dateq'];?></td><td><?php echo $rowm['timeq'];?></td><td><?php echo $rowm['reason'];?></td><td><select size="1">
      <option disabled selected>Pending</option>
      <option value="1">Approve</option>
      <option value="2">Disapprove</option>
    </select></td></tr><br></table></div>
 <span style="text-align:center"><button class='col s4 btn btn-large waves-light' type="submit" value="update" name="update">Update</button></span></form>
    </div></div>

        <!--<strong>Get Appointment</strong>
         <div class="row">
          <form class="col s12" name="ry" action="" method="post">
            <div class="row">
        <div class="input-field col s6">
          <input placeholder="Somya" id="first_name" type="Number" class="validate">
          <label for="first_name">Teacher</label>
        </div></div>
        <div class="row">
    <div class="input-field col s6">
      <input placeholder="DD-MM-YY" id="first_name" type="text" class="validate">
      <label for="first_name">Date</label>
    </div></div>
    <div class="row">
<div class="input-field col s6">
  <input placeholder="HH:MM" id="first_name" type="text" class="validate">
  <label for="first_name">Time</label>
</div></div>

            <div class="row">
              <div class="input-field col s12">
                <input name="city" id="username" type="text" class="validate" autocomplete="on" required="">
                <label for="username">Reason</label>
              </div>
            </div>
            <button class="btn waves-effect waves-light" value="submit" type="submit" name="submit">Send Request</button>
          </form>
        </div>-->

        <div class="col s12 m6 chota">
        <ul class="collapsible" data-collapsible="accordion">
        <li class="x2">
      <div class="collapsible-header btn-large waves-effect waves-light brown lighten-1"; id="download-button">Book Lecture Halls</div>
      <div class="collapsible-body" style="background-color:#fff">
        <div id="contents"><b>

         <div class="row">
           <form class="col s12" name="ry" action="" method="post">
             <div class="row">
         <div class="input-field col s6">
           <input placeholder="" id="first_name" type="number" class="validate" name="number">
           <label for="first_name">Number of Participants</label>
         </div></div>

         <div class="row">
     <div class="input-field col s6">
         <input type="date" class="datepicker" required="" name="date">
       <label for="first_name">date of event</label>
     </div></div>
     <div class="row">
 <div class="input-field col s6">
   <input placeholder="hh:mm" id="first_name" type="text" class="validate" name="stime" >
   <label for="first_name">Start time of event</label>
 </div></div>

 <div class="row">
 <div class="input-field col s6">
   <input placeholder="hh:mm" id="first_name" type="text" class="validate" name="etime">
   <label for="first_name">End time of event</label>
 </div></div>
 <div class="row">
 <div class="input-field col s6">
 <input  id="first_name" type="text" class="validate" name="reason">
 <label for="first_name">Reason</label>
 </div></div>
     <!--
         <div class="row">
         <div class="input-field col s6">
         <input placeholder="Male/Female" id="first_name" type="text" class="validate">
         <label for="first_name">Gender</label>
         </div></div>
         <div class="row">
         <div class="input-field col s6">
         <input placeholder="CSE" id="first_name" type="text" class="validate">
         <label for="first_name">Department</label>
         </div></div>
         <div class="row">
         <div class="input-field col s6">
         <input id="first_name" type="text" class="validate">
         <label for="first_name">Experience</label>
         </div></div>
         <div class="row">
         <div class="input-field col s6">
         <input placeholder="8239210295" id="first_name" type="text" class="validate">
         <label for="first_name">Mobile No.</label>
         </div></div>
             <div class="row">
               <div class="input-field col s12">
                 <input id="email" name="email" autocomplete="on" type="email" class="validate" required="">
                 <label for="email">Institute Email</label>
               </div>
             </div>
             <div class="row">
               <div class="input-field col s12">
                 <textarea name="quest" id="textarea" class="materialize-textarea validate" required=""></textarea>
                 <label for="textarea">Area of Research</label>
               </div></div>
                 <div class="row">
                   <div class="input-field col s12">
                     <textarea name="quest" id="textarea" class="materialize-textarea validate" required=""></textarea>
                     <label for="textarea">Preffered Visiting Hours and Days</label>
                   </div></div>-->
             <button class="btn waves-effect waves-light" value="submit2" type="submit" name="submit2">Submit</button>
           </form>
        </div>
        </div>



      </div>
        </li>
        </ul>
        </div>
        </div>
        <!--<div class="center">
        <ul class="collapsible" data-collapsible="accordion">
        <li class="x3">
        <div class="collapsible-header btn-large waves-effect waves-light greyf" id="download-button">Have a question, Ask it!</div>
        <div class="collapsible-body">

<div id="contents"><b>
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
    $quest=$_POST['quest'];
    $city=$_POST['city'];
    $q="INSERT INTO formaui(email,quest,city) VALUES ('$email', '$quest', '$city')";
    $query_run=mysqli_query($p,$q);
    require_once 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';
    $mail->SMTPSecure = 'tls';

    $mail->From = 'noreply@gmail.com';
    $mail->FromName = 'Advise Us India';
    $mail->addAddress('mudithkr@hotmail.com', 'Mudit');
    $mail->addAddress($email);
    $mail->addReplyTo($email);
    $mail->WordWrap = 50;
    $mail->isHTML(true);

    $mail->Subject = 'Query on Advise us India';
    $mail->Body    = '<b>Query:</b>'.$quest.'<div><font color="red"><br>
    from: email- '.$email.'<br>City: '.$city.'<br> </div>';

    if(!$mail->send()) {
      echo '<b><center>Query not submitted.<br>ERROR..</center></b>. $mail->ErrorInfo';
    }

    echo '<b><center>Your query is Submitted.</center></b>';
}


}
?>
 <div class="row">
  <form class="col s12" name="ry" action="" method="post">
    <div class="row">
      <div class="input-field col s12">
        <textarea name="quest" id="textarea" class="materialize-textarea validate" placeholder="(If You Wish to Provide Your Name And Mobile Number, Then Enter it at the End of Your Question)" required=""></textarea>
        <label for="textarea">Your Question</label>
      </div></div>
    <div class="row">
      <div class="input-field col s12">
        <input id="email" name="email" autocomplete="on" type="email" class="validate" required="">
        <label for="email">Email</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input name="city" id="username" type="text" class="validate" autocomplete="on" required="">
        <label for="username">City</label>
      </div>
    </div>
    <button class="btn waves-effect waves-light" value="submit" type="submit" name="submit">Submit</button>
  </form>
</div>
</div>
</div>
</div>
</li>
</ul>
      </div>
    </div>
  </div>-->
<br><br><br><br><br><br><br><br><br><br><br>

<section class="footer brown">
      <div class="container">
    <div class="footer-copyright">
      Copyright © 2016 Canny Campus. All rights reserved.<span style="float:right">Beta Version</span>
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
