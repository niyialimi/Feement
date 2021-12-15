<?php
require_once('../req/config.php');
session_start();
$actcode=$_GET['actcode'];
$email=$_GET['email'];
if($email && $actcode)
{
	echo $email." ".$actcode;
	$confirm="update feeclient_table set feeclient_acctstatus=1 where activation_code='".$actcode."' and feeclient_email='".$email."'";
	$success=mysqli_query($con,$confirm);
	if($success)
	{
		header('location: ../accountactive.php');
	}
	else
	{
		echo 'Account Cant be activated at the moment';
	}
}
?>