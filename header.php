
<?php error_reporting(0); ?>
<?php

	$connk=mysql_connect('localhost','root','root');
	$connk_db=mysql_select_db('canny_campus',$connk);

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  $data = mysql_real_escape_string($data);
	  return $data;
	}
	if(!$connk_db){
		die("error");
		}
?>

