<?php
require_once("../../req/config.php");
session_start();
$clientid=mysqli_real_escape_string($con,$_POST['clientid']);
$modid=ucfirst(mysqli_real_escape_string($con,$_POST['catid']));

	$icon=$_FILES['profileImg']['name'];
$modname=ucfirst(mysqli_real_escape_string($con,$_POST['modname']));
$modulestatus=ucfirst(mysqli_real_escape_string($con,$_POST['modulestatus']));
if($modulestatus=='Enable'||$modulestatus=='Enabled'){$modulestatus=1;}else {$modulestatus=0;}
$installstatus=mysqli_real_escape_string($con,$_POST['installstatus']);
if($installstatus=='Enable' || $installstatus=='Enabled'){$installstatus=1;}else {$installstatus=0;}

	if($modname && $modname && $clientid)
	{
		if($icon=='')
		{
		$update="update category_table set cat_name='$modname',cat_status='$modulestatus',cat_installment='$installstatus' where cat_id='$modid' and feeclient_id='$clientid'";
		//$update="update sms_emptab set emp_lname='$lname' where emp_id='$empid'";
		$result2=mysqli_query($con,$update);
			if($result2)
			{
				echo 'OK';
			}else {echo 'NOTOK'; die (mysqli_error($con));}
		}
		else
		{
			$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["profileImg"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["profileImg"]["type"] == "image/png") || ($_FILES["profileImg"]["type"] == "image/jpg") || ($_FILES["profileImg"]["type"] == "image/jpeg")
) && ($_FILES["profileImg"]["size"] < (100000*1024))//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions))

{
	if ($_FILES["profileImg"]["error"] > 0)
	{
	echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
	}
		else
		{
			if (file_exists("assets/catlogo/" . $_FILES["profileImg"]["name"]))
			{
			echo $_FILES["profileImg"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
			}
		else
		{			
		$icon="assets/catlogo/" . $_FILES["profileImg"]["name"];
			$update="update category_table set cat_name='$modname',cat_status='$modulestatus',cat_installment='$installstatus',cat_logo='$icon' where cat_id='$modid' and feeclient_id='$clientid'";
					$sourcePath = $_FILES['profileImg']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../../assets/catlogo/".$_FILES['profileImg']['name']; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ;
		$result2=mysqli_query($con,$update);
			if($result2)
			{
				echo 'OK';
			}else {echo 'NOTOK'; die (mysqli_error($con));}
		}
		}
}
		}
	}

?>