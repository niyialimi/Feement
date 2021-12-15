<?php
session_start();
require_once("../req/config.php");

$email=mysqli_real_escape_string($con,$_POST['username']);
$acctpassword=mysqli_real_escape_string($con,$_POST['password']);

if($email && $acctpassword )
{
	$logsql="select * from feeclient_table where feeclient_email='$email'";
	$result=mysqli_query($con,$logsql);
	if (mysqli_num_rows($result))
	{
		while($rows=mysqli_fetch_assoc($result))
		{
			
			$_SESSION['email']=$rows['feeclient_email'];
			$_SESSION['fname']=$rows['feeclient_fname'];
			$_SESSION['lname']=$rows['feeclient_lname'];
			$_SESSION['vstatus']=$rows['feeclient_vstatus'];
			$_SESSION['acctstatus']=$rows['feeclient_acctstatus'];
			$_SESSION['password']=$rows['password'];
			$_SESSION['clientid']=$rows['feeclient_id'];
			$_SESSION['role']=$rows['feeclient_role'];
			
if (password_verify($acctpassword,$_SESSION['password'])) {
			if($_SESSION['role']){$_SESSION['login']=true;}
					//echo "<span id='success'><b>Logged In</b></span>	";	
					echo 'valid';
					
					
				
} else {
					
					//echo "<span id='invalid'><b>Invalid Credientials Supplied, Please Check</b></span>	";
					echo 'notvalid';
					
					
}
			
			
		}
	}
	else 
			{					
				echo 'notvalid';				
			}
	
}

?>