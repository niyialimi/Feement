<?php

echo '
<html> 
  <body>
  <head>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
  </head>';

			$activationcode='4646gfdgbyusdvbyubdscuiue87373';
								$stitle='Account Verification';
								$to = 'softapp@localhost.feement';
								$subject = 'Account Verification';
								$url="<a href=http://localhost/feement/feeapp/schapp/accountactivation.php?actcode=".$activationcode."&emal=".$c_email.">http://localhost/feement/feeapp/schapp/accountactivation.php?actcode=".$activationcode."&emal=".$c_email."</a>";
							
								
	$body="<span style=color: #b20838;font-weight: bold;font-family: Arial, Helvetica, sans-serif;font-size: 12px;>Hi Nath Welcome OnBoard<p>Feement is a Payment Platform that help you Pay all Kid's tutio at one click, regardless of their School, Class, Tution difference.</p><p><strong>Please Click the button Below to Activate Your Account or click on the link bellow the button</strong></p><p align=center><a href=http://localhost/feement/feeapp/schapp/accountactivation.php><img src=http://localhost/feement/assets/confirm.png></a></p><p>".$url."</p></span>
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
								echo 'OK';
								
										
								}
								else{
									$response['status'] = 'error';  
									$response['message'] = 'An Error Occured While Adding Record, Possible error include: E-Mail or Phone Number is already in use';  
									header('Content-type: application/json'); 							
									echo json_encode($response);
									//echo 'NOTOK';
	echo '</body> 
</html>';								}
?>