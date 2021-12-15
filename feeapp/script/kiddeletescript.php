<?php
session_start();
require_once('../../req/config.php');
$id=$_GET['id'];
$dquery = "delete from feestudent_table where std_id='$id' ";
 $result = mysqli_query($con,$dquery) or die(mysqli_error($con));
 if($result)
 {
/*	 $dquery2 = "delete from sms_newpost where emp_id='$empid' ";
 $result2 = mysqli_query($con,$dquery2) or die(mysqli_error($con));
 if ($result2)
 {	
	 $dquery3 = "delete from sms_message where emp_id='$empid' ";
	 $result3 = mysqli_query($con,$dquery3) or die(mysqli_error($con));
	 if($result3)
	 {*/
	 echo "deleted";
	// }
 }else echo "notdeleted";
 //}
?>