<?php
require_once('../../req/config.php');
session_start();
$kidfname=ucfirst(mysqli_real_escape_string($con,$_POST['fname']));
$kidlname=ucfirst(mysqli_real_escape_string($con,$_POST['lname']));
$kidmname=ucfirst(mysqli_real_escape_string($con,$_POST['mname']));
$kidgrade=mysqli_real_escape_string($con,$_POST['stdgrade']);
$kidstdidty=mysqli_real_escape_string($con,$_POST['stdidty']);
$kidschool=mysqli_real_escape_string($con,$_POST['school']);
$clientid=mysqli_real_escape_string($con,$_POST['clientid']);
$kidstatus=1;
$regdate=date('Y-m-d');

$sl="INSERT INTO feestudent_table (std_lname,std_fname,std_mname,std_grade,std_idty,std_sch,std_status,feeclient_id,reg_date) VALUES ('$kidlname','$kidfname','$kidmname','$kidgrade','$kidstdidty','$kidschool','$kidstatus','$clientid','$regdate')";

				if(mysqli_query($con,$sl))
						{
							//echo "<span id='success'><b>New Staff Added Successfully</b></span>	";		
							$response['status'] = 'success';  
							$response['message'] = 'Your Kid Has been added to your Account';  
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