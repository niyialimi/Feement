<?php
require_once('../../req/config.php');
session_start();
$cartstatus=1;
$clientid=6;//$_SESSION['clientid'];
$rowCount=count($_POST['kids']);
$output='';

if($rowCount)
{
	for($i=0;$i<$rowCount;$i++) 
	{
	     $trnum = rand(0000000000,1000000000);
		 $stdid=$_POST["kids"][$i];
		 $ksid=$_POST["ksid"][$i];
		 $ksname=$_POST["ksname"][$i];
		 $cartid=$_POST["cartid"][$i];
		 $cartdate= date('Y-m-d');
		 $cartdate= date('Y-m-d');
		 $paymtd='Card Payment';
	$update="update cart_table set cart_status='$cartstatus' where feeclient_id='".$clientid."' and cart_id='$cartid' and cart_status=0";	
	$result2=mysqli_query($con,$update);
		if($result2)
		{
			$xquery="INSERT INTO transact_table (tr_num,feeclient_id,std_id,sch_id,sch_name,pay_mtd,tr_date) VALUES('$trnum','$clientid','$stdid','$ksid','$ksname','$paymtd','$cartdate')";
			$result=mysqli_query($con,$xquery);
			if($result)
				{
					//echo 'OK';
					$output .='OK';
				}
				else {$output .=die (mysqli_error($con));}
		
		}else {echo 'NOTOK'; die (mysqli_error($con));}
	}echo $output;
	
}
?>