<?php
require_once('../../req/config.php');
session_start();
$modname=ucfirst(mysqli_real_escape_string($con,$_POST['modname']));
$schlname=ucfirst(mysqli_real_escape_string($con,$_POST['schlname']));
$clientid=mysqli_real_escape_string($con,$_POST['clientid']);

$modulestatus=ucfirst(mysqli_real_escape_string($con,$_POST['modulestatus']));
$installstatus=mysqli_real_escape_string($con,$_POST['installstatus']);
$icon=$_FILES['profileImg']['name'];
$regdate=date('Y-m-d');
if($modname && $icon =='' && $clientid && $schlname)
{
$sl="INSERT INTO category_table (sch_id,feeclient_id,cat_name,cat_status,cat_installment,cat_logo,create_date) VALUES ('$schlname','$clientid','$modname','$modulestatus','$installstatus','$icon','$regdate')";

				if(mysqli_query($con,$sl))
						{
							//echo "<span id='success'><b>New Staff Added Successfully</b></span>	";		
							$response['status'] = 'success';  
							$response['message'] = 'Payment Module Added To Your School Account';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
			
							
						}
						else{
							//echo "<span id='invalid'><b>An Error just occured; please try again</b></span>	";
							$response['status'] = 'error';  
							$response['message'] = 'An Error Occured While Adding Module, Please try Again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);						
							//die(mysqli_error($con));
						}

}else
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
		$sl="INSERT INTO category_table (sch_id,feeclient_id,cat_name,cat_status,cat_installment,cat_logo,create_date) VALUES ('$schlname','$clientid','$modname','$modulestatus','$installstatus','$icon','$regdate')";
					$sourcePath = $_FILES['profileImg']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../../assets/catlogo/".$_FILES['profileImg']['name']; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ;
					if(mysqli_query($con,$sl))
						{
							//echo "<span id='success'><b>New Staff Added Successfully</b></span>	";		
							$response['status'] = 'success';  
							$response['message'] = 'Payment Module Added To Your School Account';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
			
							
						}
						else{
							//echo "<span id='invalid'><b>An Error just occured; please try again</b></span>	";
							$response['status'] = 'error';  
							$response['message'] = 'An Error Occured While Adding Module, Please try Again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);						
							//die(mysqli_error($con));
						}
		}
	 }
	}
}
?>