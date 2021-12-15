<?php
require_once('../../req/config.php');
session_start();

//echo $_SESSION['catid']." ".$_SESSION['schidty'];
$rowCount = count($_POST["schs"]);
//echo $rowCount;

$date= date('Y-m-d');
for($i=0;$i<$rowCount;$i++) 
{
	$schs=$_POST["schs"][$i];
	$classname=$_POST["classname"][$i];//$classname=$_POST["classname"][$schid-1]; //when using without ajax
	$amount=$_POST["amount"][$i];//$amount=$_POST["amount"][$schid-1];//when using without ajax
	
	//echo $schid." ".$classname." ".$amount."<br>";
	if($schs!=1 && $schs!=2 && $schs!=3 && $schs!=4 && $schs!=5 && $schs!=6)
	{
		$xquery="INSERT INTO fee_table (cat_id,sch_id,feeclient_id,fee_class,fee_amount,fee_create_date) VALUES ('$schs','".$_SESSION['schidty']."','".$_SESSION['clientid']."','$classname','$amount','$date')";
		$xresult=mysqli_query($con,$xquery);
		if($xresult)
		{
			echo 'New Fee Added.';
		}
		else{echo 'Could Not Add New Fee.';}
	}
	
	else
	{
		$chkcat="select sch_id,cat_id from category_table where feeclient_id='".$_SESSION['clientid']."'";
$rest=mysqli_query($con,$chkcat);
	if(mysqli_num_rows($rest))
		{
			while($rows=mysqli_fetch_array($rest))
			{
				$_SESSION['catid']=$rows['cat_id'];
				$_SESSION['schidty']=$rows['sch_id'];
			}
		}
		$xquery="INSERT INTO fee_table (cat_id,sch_id,feeclient_id,fee_class,fee_amount,fee_create_date) VALUES ('".$_SESSION['catid']."','".$_SESSION['schidty']."','".$_SESSION['clientid']."','$classname','$amount','$date')";
		$xresult=mysqli_query($con,$xquery);
		if($xresult)
		{
			echo 'New Fee Added.';
		}
		else{echo 'Could Not Add New Fee.';}
	}
	
}
?>