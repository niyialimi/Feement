<?php
require_once('../../req/config.php');
session_start();
$rowCount = count($_POST["schs"]);
//echo $rowCount;

$date= date('Y-m-d');
for($i=0;$i<$rowCount;$i++) 
{
	$feeid=$_POST["schs"][$i];
	$schid=$_POST["schid"][$i];
	$catid=$_POST["catid"][$i];
	$classname=$_POST["classname"][$i];//$classname=$_POST["classname"][$schid-1]; //when using without ajax
	$amount=$_POST["amount"][$i];//$amount=$_POST["amount"][$schid-1];//when using without ajax
	
	//echo $schid." ".$classname." ".$amount."<br>";
	if($schid && $amount)
	{
		$xquery="update fee_table set fee_amount='$amount' where fee_class='$classname' and cat_id='$catid' and fee_id='$feeid'";
		$xresult=mysqli_query($con,$xquery);
		if($xresult)
		{
			echo 'OK';
		}
		else{die(mysqli_error($con));}//echo 'NOTOK';}
	}
}
?>