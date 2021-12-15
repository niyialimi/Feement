<?php
require_once('../../req/config.php');
session_start();
 $rowCount=count($_POST['kids']);
$clientid=$_SESSION['clientid'];
$cartstatus=0;
$sn=1;	
$output='';
for($i=0;$i<$rowCount;$i++) 
{
	
	 $stdid=$_POST["kids"][$i];
	 $stdname=$_POST["stdname"][$i];
	 $schname=$_POST["schname"][$i];
	 $grade=$_POST["grade"][$i];
	 $payfor=$_POST["payfor"][$i];
	 $amountdue=$_POST["amountdue"][$i];
	 $amountpaid=$_POST["amountpaid"][$i];
	 $cartdate= date('Y-m-d');
	 
	if($stdid && $amountpaid && $clientid)
	{
		if($amountdue>0 && $amountpaid>0)
		{
			$xquery="INSERT INTO cart_table (feeclient_id,student_id,student_sch,student_grade,payment_for,amount_due,amount_paid,cart_status,date_added) VALUES ('$clientid','$stdid','$schname','$grade','$payfor','$amountdue','$amountpaid','$cartstatus','$cartdate')";
			$result=mysqli_query($con,$xquery);
			if($result)
				{
					//echo 'OK';
					$output .='OK';
				}
				else {$output .='NOTOK';}
		}else{$output .='NOTOK';}
		
	}
}echo $output;
?>