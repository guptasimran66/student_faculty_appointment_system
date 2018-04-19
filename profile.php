<?php
   include('session.php');
error_reporting(0);
 $email = $_SESSION['login_user'];
              $sqlg="SELECT * FROM student WHERE email='$email'";
              $resultg = mysql_query($sqlg);
       $rowg = mysql_fetch_array($resultg);
if(isset($_POST['update']){
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

?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
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
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
      html{
        font-family: GillSans, Calibri, Trebuchet, sans-serif;
      }
      </style>
    </head>

    <body>
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper" style="background-color:#3B5998">
            <a href="#!" class="brand-logo"><?php echo $rowg['fname']. " " .$rowg['lname']; ?></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="#!">Home</a></li>
              <li><a class='dropdown-button ' href='#' data-activates='history'>History</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div>
        </nav>
        <ul id='history' class='dropdown-content'>
    <li><a href="#!">LT Booking</a></li>
    <li><a href="#!">Faculty Appt.</a></li>
  </ul>
      </div>
      <div class="row">

      <div class="col s12 m4 l3" >
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
              <img src="images/default.jpg" alt="" class="circle responsive-img">
          </div>
        </div>
        <div class="row" >
          <p>Name: <?php echo $rowg['fname'] . " " . $rowg['lname'];?></p>
          <p>Email: <?php echo $rowg['email'];?></p>
          <p>Batch: <?php echo $rowg['year'];?></p>
          <p>Contact: <?php echo $rowg['mobile'];?></p>
        </div>
      </div>
      <div class="col s12 m8 l9" style="background-color:#F1F1F1">
        <center><h3>Edit Profile</h3></center>
        <form class="col s12" name="ry" action="" method="post">
          <div class="row">
              <div class="input-field col s6">
                <input  id="first_name" type="text" class="validate" name="fname">
                <label for="first_name"><?php echo $rowg['fname']; ?></label>
              </div>
              <div class="input-field col s6">
                <input id="last_name" type="text" class="validate" name="lname">
                <label for="last_name"><?php echo $rowg['lname']; ?></label>
              </div>
            </div>
          <div class="row">
            <div class="input-field col s6">
              <input type="date" class="datepicker" required="">
              <label for="username"><?php echo $rowg['dob']; ?></label>
            </div>
        <div class="input-field col s6">
          <select>
            <option value="" ><?php echo $rowg['gender']; ?></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
          <label>Gender</label>
        </div></div>
        <div class="row">
      <div class="input-field col s6">
        <select>
          <option value="" disabled selected><?php echo $rowg['branch']; ?></option>
          <option value="1">CSE</option>
          <option value="2">ECE</option>
          <option value="2">CCE</option>
          <option value="2">MME</option>
          <option value="2">Mechanical</option>
        </select>
        <label>Branch</label>
      </div>
            <div class="input-field col s6">
         <select >
           <optgroup label="PG">
             <option value=""disabled selected><?php echo $rowg['year']; ?></option>
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
              <label for="email"><?php echo $rowg['email']; ?></label>
            </div>
            <div class="input-field col s6">
              <input name="city" id="username" type="text" class="validate" autocomplete="on" required="">
              <label for="username"><?php echo $rowg['mobile']; ?></label>
            </div>
          </div><br><br>
          <center><button class="btn waves-effect waves-light" value="submit" type="submit" name="submit">Update</button></center>
        </form>
      </div>

    </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
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
