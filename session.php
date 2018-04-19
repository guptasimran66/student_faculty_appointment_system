<?php
   include('../header.php');
   session_start();

   $user_check = $_SESSION['login_user'];
   $user_db = $_SESSION['type'];

   $ses_sql = mysql_query("select * from $user_db where email = '$user_check' ");

   $row = mysql_fetch_array($ses_sql);

   $login_session = $row['email'];

   if(!isset($_SESSION['login_user'])){
      header("location: ../login.php");
   }
?>
