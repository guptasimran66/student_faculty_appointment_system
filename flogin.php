<?php
	if(isset($_POST['login']))
	{
		if(isset($_POST['email']) && !empty($_POST['email']))
		{	
			if(isset($_POST['password']) && !empty($_POST['password']))
			{
				if(isset($_POST['admin']) )
				{
					$email = $_POST['email'];
					$password = $_POST['password'];
					$admin = $_POST['admin'];
					if($admin == 'std')//student
					{
						$query = "SELECT * FROM student WHERE email = ".$email." AND password =".$password."";
						if($data = mysql_fetch_array(mysql_query($query)))
						{
							$_SESSION['name'] = $data['fname']+$data['lname'];
							echo "DONE";
						}
						else
						{
							$error = "Invalid Credentials. Try Again.!";
						}						
					}
					else if($admin == 'fac') //faculty
					{ 
						$query = "SELECT * FROM faculty WHERE email = ".$email." AND password =".$password."";
						if($data = mysql_fetch_array(mysql_query($query)))
						{
							$_SESSION['name'] = $data['fname']+$data['lname'];
							echo "DONE";
						}
						else
						{
							$error = "Invalid Credentials. Try Again.!";
						}
					} 
				}
				else
				{
					$error = "Please Select One Option.!";
				}
			}
			else
			{
				$error = "Please Enter Your Password";
			}
		}
		else
		{
			$error ="Please Enter Your Email Id.!";
		}
	}
?>