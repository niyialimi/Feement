<?php
require_once('../../req/config.php');
session_start();
echo $_SESSION['clientid'];		
	echo '<table class="table table-condensed table-hover table-bordered" cellpadding="10px" id="cartTable">
                                <thead>
                                    <tr>
                                    	<th><input type="checkbox" class="custom-checkbox" id="selectall" checked></th>
                                        
                                        <th>S/N</th>
                                        <th>Student Name</th>
                                        <th>Student Class</th>
                                        <th>Paying For</th>
                                        <th>Amount Due (NGN)</th>
                                        <th>Amount To Pay (NGN)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>  '; 
	$xquery="select cart_table.*,feestudent_table.* from cart_table inner join feestudent_table on cart_table.student_id=feestudent_table.std_id where cart_table.feeclient_id='6' and cart_table.cart_status=0";

		$output=mysqli_query($con,$xquery);
	   if(mysqli_num_rows($output))
					   {                             
                            										
									$_SESSION['total']=0;$sn=0;
									
										while($row=mysqli_fetch_array($output))
											{
												$sn++;
												//$_SESSION['kidschid']=$row['sch_id'];
												$_SESSION['kidid']=$row['std_id'];
												$_SESSION['lname']=$row['std_lname'];
												$_SESSION['fname']=$row['std_fname'];
												$_SESSION['grade']=$row['student_grade'];
												$_SESSION['schname']=$row['student_sch'];
												$_SESSION['amountdue']=$row['amount_due'];
												$_SESSION['amountpaid']=$row['amount_paid'];
												$_SESSION['payfor']=$row['payment_for'];
												$_SESSION['fullname']=$_SESSION['lname']." ".$_SESSION['fname'];
												$_SESSION['total']=$_SESSION['total']+$_SESSION['amountpaid'];
												$_SESSION['charge']=round(($_SESSION['total']*0.015),2);
											
                                echo '<tbody>
                                <tr>
                                	<td><input type="checkbox" name="kids[]" id="kids" class="case custom-checkbox" value="'.$_SESSION['kidid'].'" checked></td>
                                    <td>'.$sn;
                                   echo '<input type="hidden" class="nam" name="stdname[]" id="stdname" value="'.$_SESSION['fullname'].'">
                                    <input type="hidden" class="stid" name="stdid[]" id="stdid" value="'.$_SESSION['kidid'].'"></td>
                                    <td>'. $_SESSION['lname'].' '.$_SESSION['fname'].' </td>
                                    <td>'.$_SESSION['grade'].'<input type="hidden" class="schname" name="kidschname[]" id="kidschname" value="'.$_SESSION['schname'].'"><input type="hidden" name="grade" id="grade" value="'.$_SESSION['grade'].'"> </td>
                                    
                                    <td>'.$_SESSION['grade'].'
									</td>
                                    <td>'.$_SESSION['payfor'].'
									 
                                             <input type="hidden" name="pemail" id="pemail" class="form-control" value="'.$_SESSION['email'].'"></td>
                                      
                                <td>'.$_SESSION['amountdue'].'</td>
								<td>'.$_SESSION['amountpaid'].'</td>
                                
                                                
                                  <td><a class="btn btn-sm btn-outline-danger deleteitem" id="deleteitem" data-id="'.$_SESSION['kidid'].'" data-name="'.$_SESSION['fullname'].'" data-toggle="tooltip" data-placement="bottom" title="Remove Item From Cart">
                <i class="fa fa-trash-o" style="color:%23e8cecc"></i>
                
            </a></td>
                                </tr>';
                                
									
									}
								
                              echo '<tr><td colspan="6" align="right"><span><strong>Subtotal</strong></span></td><td colspan="2" id="subtotal">'.$_SESSION['total'].'</td></tr>
                                <tr><td colspan="6" align="right"><span><strong>Transaction Charge</strong></span></td><td colspan="2"> '.$_SESSION['charge'].'</td></tr>
                                <tr><td colspan="6" align="right"><span><strong>Total</strong></span></td><td colspan="2">
                                <input type="hidden" name="total" id="total" class="tot" value="'.sprintf("%01.2f",$_SESSION['total']+$_SESSION['charge']).'">
								'.sprintf("%01.2f",$_SESSION['total']+$_SESSION['charge']).'</td></tr>
                                </tbody>
                                </table>
                                <div class="form-group" align="center"><button type="button" name="checkout" id="checkout" onClick="payWithPaystack()" class="btn btn-success" data-loading-text="<i class=fa fa-circle-o-notch fa-spin></i>">Proceed To Checkout  <i class="fa fa-arrow-circle-o-right"></i></button>&nbsp;&nbsp;&nbsp;&nbsp; <button type="submit" name="addtocart" id="addtocart" class="btn btn-primary" data-loading-text="<i class=fa fa-circle-o-notch fa-spin></i>">Add To Cart  <i class="fa fa-shopping-cart"></i></button> </div>
                                </div>';
											
									
					   }
					   else
					   {
						   echo '0';
					   }
?>
