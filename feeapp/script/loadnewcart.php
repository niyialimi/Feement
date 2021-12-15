<?php
require_once('../../req/config.php');
session_start();
$sch=mysqli_real_escape_string($con,$_POST['schname']);
		$kidselect="select * from feeschool_table where school_name='".$sch."' ";
		$reslt=mysqli_query($con,$kidselect);
			if(mysqli_num_rows($reslt))
					{
						while($row=mysqli_fetch_array($reslt))
							{
									 $_SESSION['kidschid']=$row['sch_id'];
							}
					}
					
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
                            										
									$_SESSION['total']=0;$sn=0;
									$cartselect="select feestudent_table.*,feeschool_table.* from feestudent_table inner join feeschool_table on feestudent_table.std_sch=feeschool_table.school_name where feeschool_table.sch_id='".$_SESSION['kidschid']."' and feestudent_table.feeclient_id='".$_SESSION['clientid']."' ";
									$rt=mysqli_query($con,$cartselect);
									if(mysqli_num_rows($rt))
									{
										while($row=mysqli_fetch_array($rt))
											{
												$sn++;
												//$_SESSION['kidschid']=$row['sch_id'];
												$_SESSION['kidid']=$row['std_id'];
												$_SESSION['lname']=$row['std_lname'];
												$_SESSION['fname']=$row['std_fname'];
												$_SESSION['grade']=$row['std_grade'];
												$_SESSION['schname']=$row['school_name'];
												$_SESSION['schbank']=$row['school_bank'];
												$_SESSION['acctnum']=$row['bank_acct_num'].'<br>';
												$_SESSION['fullname']=$_SESSION['lname']." ".$_SESSION['fname'];
													
												
								
                                echo '<tbody>
                                <tr>
                                	<td><input type="checkbox" name="kids[]" id="kids" class="case custom-checkbox" value="'.$_SESSION['kidid'].'" checked></td>
                                    <td>'.$sn;
                                   echo '<input type="hidden" class="nam" name="stdname[]" id="stdname" value="'.$_SESSION['fullname'].'">
                                    <input type="hidden" class="stid" name="stdid[]" id="stdid" value="'.$_SESSION['kidid'].'"></td>
                                    <td>'. $_SESSION['lname'].' '.$_SESSION['fname'].' </td>
                                    <td>'.$_SESSION['grade'].'<input type="hidden" class="schname" name="kidschname[]" id="kidschname" value="'.$_SESSION['schname'].'"><input type="hidden" name="grade" id="grade" value="'.$_SESSION['grade'].'"> </td>
                                    
                                    <td>';
									 $getfee="select cat_id,cat_name,cat_installment from category_table where cat_id= '".$_POST['payname']."' and sch_id='".$_SESSION['kidschid']."'";//
												$ans=mysqli_query($con,$getfee);
												if(mysqli_num_rows($ans))
												{
														while($ross=mysqli_fetch_array($ans))
														{
															$_SESSION['catid']=$ross['cat_id'];
															$_SESSION['catinstallment']=$ross['cat_installment'];
															echo $_SESSION['catname']=$ross['cat_name'];	
														}
												} 
                                               echo  '<input type="hidden" name="payfor" id="payfor" class="catname form-control" value="'.$_SESSION['catname'].'">
                                                <input type="hidden" name="schbank" id="schbank" class="form-control" value="'.$_SESSION['schbank'].'"></td>
                                    <td>';
									$getamount="select fee_amount,fee_id from fee_table where cat_id= '".$_SESSION['catid']."' and fee_class='".$_SESSION['grade']."' and sch_id='".$_SESSION['kidschid']."'";
												$output=mysqli_query($con,$getamount);
												if(mysqli_num_rows($output))
												{
														while($ro=mysqli_fetch_array($output))
														{
															
															$_SESSION['feeid']=$ro['fee_id'];
															echo $_SESSION['feeamount']=$ro['fee_amount'];	
															if($_SESSION['feeamount']>0){$_SESSION['total']=round(($_SESSION['total']+$_SESSION['feeamount']),2);}$_SESSION['charge']=round(($_SESSION['total']*0.015),2);
														}
												}else {echo $_SESSION['feeamount']=0;$_SESSION['charge']=0;} 
                                               echo '<input type="hidden" name="schacct" id="schacct" class="form-control" value="'.$_SESSION['acctnum'].'"> <input type="hidden" name="pemail" id="pemail" class="form-control" value="'.$_SESSION['email'].'"></td>
                                      
                                <td>';if($_SESSION['catinstallment']==1){
									echo '<input type="text" name="amountpaid[]" id="amountpaid" class="form-control amt" style="width:150px;" value="'.$_SESSION['feeamount'].'" placeholder="Amount to pay"><span id="errmsg"></span>'; }else{ echo '<input type="text" name="amountpaid[]" id="amountpaid" class="form-control amt" style="width:150px;" placeholder="Amount to pay" value="'.$_SESSION['feeamount'].'" readonly>'; }
                                    echo '</td>
                                
                                                
                                  <td><a class="btn btn-sm btn-outline-danger deleteitem" id="deleteitem" data-id="'.$_SESSION['kidid'].'" data-name="'.$_SESSION['fullname'].'" data-toggle="tooltip" data-placement="bottom" title="Remove Item From Cart">
                <i class="fa fa-trash-o" style="color:#e8cecc"></i>
                
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
?>
