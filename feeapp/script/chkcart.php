<?php
require_once('../../req/config.php');
session_start();
//$cartitem=mysqli_real_escape_string($con,$_POST['schname']);
		$xquery="select count(*) as total from cart_table where feeclient_id='".$_SESSION['clientid']."' and cart_status=0";
					  $output=mysqli_query($con,$xquery);
					   if(mysqli_num_rows($output))
					   {
						   while($rows=mysqli_fetch_assoc($output))
						   {
							   $total=$rows['total'];
							   echo $total;
						   }
					   }
                    else{echo 0; }
?>