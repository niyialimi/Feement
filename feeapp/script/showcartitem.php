<?php
require_once('../../req/config.php');
session_start();
//$cartitem=mysqli_real_escape_string($con,$_POST['schname']);
		$xquery="select cart_table.*,feestudent_table.std_fname,feestudent_table.std_lname from cart_table inner join feestudent_table on cart_table.student_id=feestudent_table.std_id where cart_table.feeclient_id='".$_SESSION['clientid']."' and cart_table.cart_status=0";
					  $output=mysqli_query($con,$xquery);
					   if(mysqli_num_rows($output))
					   {	
					   		$total=0;
					   		$_SESSION['amount']=true;
						   $cart_box = '<ul class="cart-products-loaded">';
							$total = 0;
						   while($rows=mysqli_fetch_assoc($output))
						   {
							   $cartid=$rows['cart_id'];
							   $stdfname=$rows['std_fname'];
							   $stdlname=$rows['std_lname'];
							   $amountpaid=$rows['amount_paid'];
							   $stdid=$rows['student_id'];
							   $payfor=$rows['payment_for'];
							   $fullname=$stdlname.' '.$stdfname;
							$cart_box .=  "<li> $fullname (Payment : $payfor |Amount : &#8358; $amountpaid ) &mdash; <a href=\"#\" class=\"remove-item\" data-id=\"$cartid\">&times;</a></li>";
						//$subtotal = ($product_price * $product_qty);
						$total = ($total + $amountpaid);
						   }
						   $cart_box .= "</ul>";
		$cart_box .= '<div class="cart-products-total">Subtotal : &#8358;'.sprintf("%01.2f",$total).' &nbsp;<u><a href="viewcart.php" title="Review Cart and Check-Out">Check-out</a></u></div>';
		echo $cart_box;
					   }
                    else{echo 'No Item In Cart'; }
?>