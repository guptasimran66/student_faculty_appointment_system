<?php 

session_start();
session_destroy();

include('header.php');

if(isset($_POST['name']) && !empty($_POST['date'])
               && !empty($_POST['time']) && !empty($_POST['reason'])) {
      
      $name = $_POST['name'];
      $date = $_POST['date']; 
      $time = $_POST['time'];
      $reason = $_POST['reason'];

      $email = 


$sql = "INSERT INTO facultyapp VALUES ('$email', $name', '$date' , '$time', '$reason')";
        $result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		
		$count = mysql_num_rows($result);
      
//the matched result must be equal to 1
if($count == 1) {
         $_SESSION['login_user'] = $email; 
         
         header("location: ./canny campus/student.php");
         exit();
      }
else {
         $error = "Your Email or Password is invalid";
      }


if($admin == "fac") {
//injection protection
$sql = "SELECT * FROM faculty
        WHERE email='$email'
        and password='$password'";
        $result = mysql_query($sql);
$row = mysql_fetch_array($result);
$active = $row['active'];
$count = mysql_num_rows($result);
      
//the matched result must be equal to 1
if($count == 1) {
         $_SESSION['login_user'] = $email;
         
         header("location: ./canny campus/fac.php");
         exit();
      }
else {
         $error = "Your Email or Password is invalid";
      }
}
}
?>