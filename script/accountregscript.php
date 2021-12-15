<?php
require_once('../req/config.php');
session_start();
$c_fname=ucfirst(mysqli_real_escape_string($con,$_POST['firstname']));
$c_lname=ucfirst(mysqli_real_escape_string($con,$_POST['lastname']));
$c_email=mysqli_real_escape_string($con,$_POST['email']);
$c_phone=mysqli_real_escape_string($con,$_POST['cphone']);
$c_role=mysqli_real_escape_string($con,$_POST['crole']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$password=password_hash($password,PASSWORD_BCRYPT);
if($c_role=='parent')
{$c_vstatus=1;}else{$c_vstatus=0;}
$c_acctstatus=0;
$regdate=date('Y-m-d');
$activationcode=md5($c_email.time()).md5( rand(0,1000) );
//echo $activationcode.'<br>'.$c_role.' '.$c_phone;
$logsql="select * from feeclient_table where feeclient_email='$c_email' or feeclient_phone='$c_phone' ";
$result=mysqli_query($con,$logsql);
if (mysqli_num_rows($result))
{
	$response['status'] = 'error';  
	$response['message'] = 'An Error Occured While Adding Record, Possible error include:E-Mail or Phone Number is already in use';  
	header('Content-type: application/json'); 							
	echo json_encode($response);			
	/*echo "<script type=text/javascript>alert('Sorry, The Email or Phone Number is in use');</script>";
	echo "<script type=text/javascript>window.location='../signup.php'</script>";*/
}else
{

$sl="INSERT INTO feeclient_table (feeclient_fname,feeclient_lname,feeclient_email,feeclient_phone,feeclient_role,feeclient_vstatus,activation_code,feeclient_acctstatus,password,reg_date) VALUES ('$c_fname','$c_lname','$c_email','$c_phone','$c_role','$c_vstatus','$activationcode','$c_acctstatus','$password','$regdate')";

				if(mysqli_query($con,$sl))
						{
							//echo "<span id='success'><b>New Staff Added Successfully</b></span>	";		
								$stitle='Account Verification';
								$to = $c_email;//'softapp@localhost.feement';
								$subject = 'Account Verification';
								$url="<a href=http://localhost/feement/script/accountactivation.php?actcode=".$activationcode."&email=".$c_email.">http://localhost/feement/script/accountactivation.php?actcode=".$activationcode."&email=".$c_email."</a>";
							
								
	$body="<span style=color: #b20838;font-weight: bold;font-family: Arial, Helvetica, sans-serif;font-size: 12px;>Hi Nath Welcome OnBoard<p>Feement is a Payment Platform that help you Pay all Kid's tutio at one click, regardless of their School, Class, Tution difference.</p><p><strong>Please Click the button Below to Activate Your Account or click on the link bellow the button</strong></p><p align=center><a href=http://localhost/feement/script/accountactivation.php?actcode=".$activationcode."&email=".$c_email."><img src=http://localhost/feement/assets/confirm.png></a></p><p>".$url."</p></span>
  ";
								$htmlContent = "
								<div style='background:#fefefe; border: 1px solid #e4e4e4; -webkit-border-radius:10px; -moz-border-radius: 10px; border-radius:10px; padding-left:5px; padding-right:5px; padding-bottom:5px; font-family: 'Tangerine', serif;'>
  <table cellspacing=0 style= width: 600px; height: auto;>
											<tr style=background: #eee; align='center'>
												<td align='center' width=213 height=71 align=center><strong><img src=http://localhost/feement/assets/logosmall.png></strong></td>
											</tr>
											
											<tr style=background: fff;>
												<td height=91 colspan=2 align=left>".$body."</td>
											</tr>
											
											
											<tr><td colspan=2 align=left style=font-size:12px><br>DISCLAIMER:<br>
								
								<p>This message contains confidential information and is intended only for the individual named. If you are not the named addressee you should not disseminate, distribute or copy this e-mail. Please notify the sender immediately by e-mail if you have received this e-mail by mistake and delete this e-mail from your system. </p><hr><p align=left><strong>Click Once...Pay All</strong></p><p align=left>Feement Team</p></td></tr>
										</table></div>
										";
								
								// Set content-type header for sending HTML email
								$headers = "MIME-Version: 1.0" . "\r\n";
								$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								
								// Additional headers
								$headers .= 'From: Admin <mails@localhost.feement>' . "\r\n";
								$headers .= 'Reply-To:  Admin <mails@localhost.feement>'. "\r\n";
								// Send email
								//echo $htmlContent;
								if(@mail($to,$subject,$htmlContent,$headers)){
								//echo 'OK';
								$response['status'] = 'success';  
								$response['message'] = 'Congratulation! Your Account has Been Created and an Mail Has Been Sent, Check your Inbox or Spam Mails';  
								header('Content-type: application/json'); 							
								echo json_encode($response);
										
								}
								else{
									$response['status'] = 'error';  
									$response['message'] = 'An Error Occured While Adding Record, Possible error include: E-Mail or Phone Number is already in use';  
									header('Content-type: application/json'); 							
									echo json_encode($response);
									//echo 'NOTOK';
	echo '</body> 
</html>';								}
								
							
						}
						else{
							//echo "<span id='invalid'><b>An Error just occured; please try again</b></span>	";
							$response['status'] = 'error';  
							$response['message'] = 'An Error Occured While Adding Record, Possible error include:E-Mail or Phone Number is already in use';  
							header('Content-type: application/json'); 							
							echo json_encode($response);						
								 //die(mysqli_error($con));
						}
}
?>