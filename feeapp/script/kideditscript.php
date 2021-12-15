<?php
require_once("../../req/config.php");
session_start();
$kidfname=ucfirst(mysqli_real_escape_string($con,$_POST['fname']));
$kidlname=ucfirst(mysqli_real_escape_string($con,$_POST['lname']));
$kidmname=ucfirst(mysqli_real_escape_string($con,$_POST['mname']));
$kidgrade=mysqli_real_escape_string($con,$_POST['stdgrade']);
$kidstatus=mysqli_real_escape_string($con,$_POST['status']);
$kidschool=mysqli_real_escape_string($con,$_POST['school']);
$clientid=mysqli_real_escape_string($con,$_POST['clientid']);
$kidid=mysqli_real_escape_string($con,$_POST['kidid']);
if($kidstatus=='Activate' || $kidstatus=='Active'){$kidstatus=1;}else{$kidstatus=0;}
//echo $kidstatus;
if($kidlname && $kidid && $clientid)
{
	$update="update feestudent_table set std_lname='$kidlname',std_fname='$kidfname',std_mname='$kidmname',std_grade='$kidgrade',std_status='$kidstatus',std_sch='$kidschool' where std_id='$kidid' and feeclient_id='$clientid'";
	//$update="update sms_emptab set emp_lname='$lname' where emp_id='$empid'";
	$result2=mysqli_query($con,$update);
		if($result2)
		{
			echo 'OK';
		}else {echo 'NOTOK'; die (mysqli_error($con));}
}
?>