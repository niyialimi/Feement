<?php
require_once('../../req/config.php');
session_start();
$ftopic=ucfirst(mysqli_real_escape_string($con,$_POST['ftopic']));
$fcontent=ucfirst(mysqli_real_escape_string($con,$_POST['fcontent']));
$postdate=date('Y-m-d');
$posttime=date('h:s a');
$client=$_SESSION['clientid'];
if($ftopic && $fcontent)
{
$sl="INSERT INTO forum_table (feeclient_id,topic,content,post_time,post_date) VALUES ('$client','$ftopic','$fcontent','$posttime','$postdate')";
if(mysqli_query($con,$sl))
						{
							//echo "<span id='success'><b>New Staff Added Successfully</b></span>	";		
							$response['status'] = 'success';  
							$response['message'] = 'Message Posted';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
			
							
						}
						else{
							//echo "<span id='invalid'><b>An Error just occured; please try again</b></span>	";
							$response['status'] = 'error';  
							$response['message'] = 'An Error Occured While Adding New Post';  
							header('Content-type: application/json'); 							
							echo json_encode($response);						
							//die(mysqli_error($con));
						}
}
?>