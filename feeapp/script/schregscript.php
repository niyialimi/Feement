<?php
require_once('../../req/config.php');
session_start();
$bankname=ucfirst(mysqli_real_escape_string($con,$_POST['bankname']));
$acctno=ucfirst(mysqli_real_escape_string($con,$_POST['acctno']));
$mobileno=ucfirst(mysqli_real_escape_string($con,$_POST['mobileno']));
$schaddress=mysqli_real_escape_string($con,$_POST['schaddress']);
$schoolname=mysqli_real_escape_string($con,$_POST['schoolname']);
$clientid=mysqli_real_escape_string($con,$_POST['clientid']);
$schtatus=1;
$regdate=date('Y-m-d');

$sl="INSERT INTO feeschool_table (feeclient_id,school_name,school_address,school_phone,school_bank,bank_acct_num,school_status,reg_date) VALUES ('$clientid','$schoolname','$schaddress','$mobileno','$bankname','$acctno','$schtatus','$regdate')";

				if(mysqli_query($con,$sl))
						{
							//echo "<span id='success'><b>New Staff Added Successfully</b></span>	";		
							$response['status'] = 'success';  
							$response['message'] = 'Your School Has been added to your Account';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
			
							
						}
						else{
							//echo "<span id='invalid'><b>An Error just occured; please try again</b></span>	";
							$response['status'] = 'error';  
							$response['message'] = 'An Error Occured While Adding Record, Please try Again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);						
								 //die(mysqli_error($con));
						}

?>