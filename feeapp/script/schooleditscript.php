<?php
require_once("../../req/config.php");
session_start();
$schphn=ucfirst(mysqli_real_escape_string($con,$_POST['schphn']));
$bankname=ucfirst(mysqli_real_escape_string($con,$_POST['bankname']));
$acctnum=ucfirst(mysqli_real_escape_string($con,$_POST['acctnum']));
$schid=mysqli_real_escape_string($con,$_POST['schid']);
$schstatus=mysqli_real_escape_string($con,$_POST['status']);
$schaddress=mysqli_real_escape_string($con,$_POST['schaddress']);
$clientid=mysqli_real_escape_string($con,$_POST['clientid']);
$kidid=mysqli_real_escape_string($con,$_POST['kidid']);
if($schtatus=='Activate' || $schstatus=='Active'){$schstatus=1;}else{$schstatus=0;}
//echo $kidstatus;
if($schphn && $schid && $clientid)
{
	$update="update feeschool_table set school_phone='$schphn',school_address='$schaddress',school_bank='$bankname',bank_acct_num='$acctnum',school_status='$schstatus' where sch_id='$schid' and feeclient_id='$clientid'";
	//$update="update sms_emptab set emp_lname='$lname' where emp_id='$empid'";
	$result2=mysqli_query($con,$update);
		if($result2)
		{
			echo 'OK';
		}else {echo 'NOTOK'; die (mysqli_error($con));}
}
?>