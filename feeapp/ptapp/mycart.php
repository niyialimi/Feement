<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');
require_once('../../req/loginstatus.php');
?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> FeeApp Make Payment </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
       	<link rel="icon" type="image/png" href="../../assets/favicon.png">
        <link rel="stylesheet" href="../../css/feevendor.css">
        <link rel="stylesheet" href="../../css/app-css.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
     #map {
        height: 400px;
        width: 100%;
       }
	   #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

   
      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }


    </style>

    </head>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
    			<i class="fa fa-bars"></i>
    		</button> </div>
                    <div class="header-block header-block-search hidden-sm-down">
                        <form role="search">
                            <div class="input-container"> <i class="fa fa-search"></i> <input type="search" placeholder="Search">
                                <div class="underline"></div>
                            </div>
                        </form>
                    </div>
                    <div class="header-block header-block-nav">
                      <ul class="nav-profile">
                       <li class="notifications new">
                                 <?php if($_SESSION['acctstatus']==0){echo 'Inactive Account';}else {echo 'Active Account';}?> &nbsp;</a><span class="profile dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="name"><?php echo $_SESSION['fname']; ?></span></a></span></li>
                            <li class="notifications new">
                                <a href="" data-toggle="dropdown"> <i class="fa fa-bell-o"></i> <sup>
    			      <span class="counter">XX</span>
    			    </sup> </a>
                                <div class="dropdown-menu notifications-dropdown-menu">
                                    <ul class="notifications-container">
                                        <li>
                                            <a href="" class="notification-item">
                                                <div class="img-col">
                                                    <div class="img" style="background-image: url('../../assets/faces/avatar5.png')"></div>
                                                </div>
                                                <div class="body-col">
                                                    <p> <span class="accent">Zack Alien</span> pushed new commit: <span class="accent">Fix page load performance issue</span>. </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="notification-item">
                                                <div class="img-col">
                                                    <div class="img" style="background-image: url('../../assets/faces/avatar5.png')"></div>
                                                </div>
                                                <div class="body-col">
                                                    <p> <span class="accent">Amaya Hatsumi</span> started new task: <span class="accent">Dashboard UI design.</span>. </p>
                                                </div>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                    <footer>
                                        <ul>
                                            <li> <a href="">
                                            View All
                                          </a> </li>
                                        </ul>
                                    </footer>
                                </div>
                            </li>
                            <li class="profile dropdown">
                              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                              <div class="img" style="background-image: url('../../assets/faces/avatar5.png')"> 
                                  </div>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#"> <i class="fa fa-user icon"></i> Profile </a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-bell icon"></i> Notifications </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php"> <i class="fa fa-power-off icon"></i> Logout </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
  							<div class="log"><img src="../../assets/logosmall.png"></div></div>
                        <nav class="menu">
                            <ul class="nav metismenu" id="sidebar-menu">
                                <li>
                                    <a href="apphome.php"> <i class="fa fa-home"></i> Dashboard </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-users"></i> My Kids <i class="fa arrow"></i> </a>
                                     <ul>
                                        <li> <a href="appkids.php">Add New Kid</a>
    								</li>
                                        <li> <a href="viewkids.php">View All</a>
    								</li>
                                    </ul>
                                </li>
                                <li class="active">
                                    <a href="payment.php"> <i class="fa fa-credit-card"></i> Make Payment</a>                                    
                                </li>
                                <li>
                                    <a href="transactz.php"> <i class="fa fa-money"></i> Transactions</a>
                                    
                                </li>
                                <li>
                                    <a href="forum.php"> <i class="fa fa-comments"></i> Forum </a>                                    
                                </li>
                                <li>
                                    <a href="logout.php"> <i class="fa fa-power-off"></i> Logout</a>
                                    
                                </li>
                               
                            </ul>
                        </nav>
                    </div>
                    </div>
                </aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <article class="content dashboard-page">
                <?php if($_SESSION['acctstatus']==0){echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-minus-sign pull-left"></span>&nbsp;&nbsp;Your Account is Inactive, Activate your account to add your kid(s) please Check your Mail to activate; Inactive account do not have access to Full functionality</div>';}else{ ?>
                <div></div>
                    <section class="section">
                        <div class="row sameheight-container"></div>
                        <div class="card card-block sameheight-item">
                          <div class="title-block">
                                <h1 class="title" align="center"><i class="fa fa-shopping-cart"></i>  My Cart <!--a href="payment.php" class="btn btn-primary pull-right" data-toggle="tooltip" data-placement="bottom" title="Payment List"><i class="fa fa-list"></i>  </a-->&nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-primary pull-right cart-box" id="cart-info" data-toggle="tooltip" data-placement="bottom" title="View Cart"><i class="fa fa-shopping-cart"></i>  </a></h1>           
          <div class="shopping-cart-box">
        <a href="#" class="close-shopping-cart-box" >Close</a>
        <h3>My Cart</h3>
            <div id="shopping-cart-results">
            </div>
        </div>
 
                                
                            </div>
                            <?php
								$kidselect="select * from feeschool_table where school_name='".$_GET['sch']."' ";
									$reslt=mysqli_query($con,$kidselect);
									if(mysqli_num_rows($reslt))
									{
										while($row=mysqli_fetch_array($reslt))
											{
												 $_SESSION['kidschid']=$row['sch_id'];
												 $_SESSION['kidschname']=$row['school_name'];
											}
									}
							?>
                            <div class="row">
                             <div class="col-md-2"></div>
                            <form name="thisform" id="kpform" class="kpform1"> 
                            <div class="col-md-4">
                            	<select class="form-control form-control-lg" name="schname" id="schname">
                                
                                <?php									
									$clselect="select * from feestudent_table where feeclient_id='".$_SESSION['clientid']."' GROUP BY std_sch";
									$result=mysqli_query($con,$clselect);
									if(mysqli_num_rows($result))
									{
										while($rows=mysqli_fetch_array($result))
										{
											$_SESSION['school']=$rows['std_sch'];
											if ($_SESSION['school']==$_GET['sch'])
											{
												echo '<option value="'.$_SESSION['school'].'" selected>'.$_SESSION['school'].'</option>';
											}else
											{
											
									?>
                                    <option value="<?php echo  $_SESSION['school'] ?>"><?php echo $_SESSION['school'] ?></option>
                                    <?php
											}
										}
									}
									
								 ?>
                                	
                                </select>
                            </div>
                            <div class="col-md-4"><select class="form-control form-control-lg" name="payname" id="payname">
                            <?php //cat_id='".$_GET['catid']."' and 
								$kidselect="select * from category_table where sch_id='".$_SESSION['kidschid']."' ";
									$reslt=mysqli_query($con,$kidselect);
									if(mysqli_num_rows($reslt))
									{
										while($row=mysqli_fetch_array($reslt))
											{
												 $_SESSION['catname']=$row['cat_name'];
												 $_SESSION['catid']=$row['cat_id'];
												 if($_SESSION['catid']==$_GET['catid'])
												 {
												 echo '<option value="'.$_SESSION['catid'].'" selected>'.$_SESSION['catname'].$_SESSION['catid'].'</option>';}else
												 {
													 echo '<option value="'.$_SESSION['catid'].'">'.$_SESSION['catname'].$_SESSION['catid'].'</option>';
												 }
											}
										
									}
							?>
                            </select></div>
                            <div class="col-md-2"></div>
                            </form>
                            </div>
                            
                            
                            <div id="displayitem" class="" style="margin-top:3%;" align="center">
                            <div class="row">
                             <div class="col-md-offset-2 col-md-8 col-sm-12">
                              <div class="panel panel-success">
                                  <div class="panel-heading">My Cart Item(s)<span class="pull-right"><!--?php echo $_GET['sch'];  ?--></span></div>
                                  <div class="panel-body">
                             <form action="../script/cartprocess.php" name="cart" class="form-item" enctype="multipart/form-data" method="post" role="form">
                             <div id="displaynewcart" class="table-responsive"></div>
                             <div id="displaycart" align="center" class="table-responsive">
                            	<table class="table table-condensed table-hover table-bordered" cellpadding="10px" id="cartTable">
                                <thead>
                                    <tr>
                                    	<th><input type="checkbox" class="custom-checkbox" id="selectall" checked></th>
                                        
                                        <th>S/N</th>
                                        <th>Student Name</th>
                                        <th>Student Class</th>
                                        <th>Paying For</th>
                                        <th>Amount Due (NGN)</th>
                                        <th>Amount To Pay (NGN)</th>
                                    </tr>
                                </thead>
                                
                            	<?php 									
									$sn=0;$_SESSION['total']=0;
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
												$_SESSION['fullname']=$_SESSION['lname']." ".$_SESSION['fname']
													
												
								?>
                                <tbody>
                                <tr>
                                	<td><input type="checkbox" name="kids[]" id="kids" class="case custom-checkbox" value="<?php echo $_SESSION['kidid']; ?>" checked></td>
                                    <td><?php echo $sn; ?>
                                    <input type="hidden" class="nam" name="stdname[]" id="stdname" value="<?php echo $_SESSION['fullname']; ?>">
                                    <input type="hidden" class="stid" name="stdid[]" id="stdid" value="<?php echo $_SESSION['kidid']; ?>"></td>
                                    <td><?php echo $_SESSION['lname'].' '.$_SESSION['fname']; ?></td>
                                    <td><?php echo $_SESSION['grade']; ?><input type="hidden" class='schname' name="kidschname[]" id="kidschname" value="<?php echo $_SESSION['schname']; ?>"><input type="hidden" name="grade" id="grade" value="<?php echo $_SESSION['grade']; ?>"> </td>
                                    
                                    <td><?php $getfee="select cat_id,cat_name,cat_installment from category_table where cat_id= '".$_GET['catid']."' and sch_id='".$_SESSION['kidschid']."'";
												$ans=mysqli_query($con,$getfee);
												if(mysqli_num_rows($ans))
												{
														while($ross=mysqli_fetch_array($ans))
														{
															$_SESSION['catid']=$ross['cat_id'];
															$_SESSION['catinstallment']=$ross['cat_installment'];
															echo $_SESSION['catname']=$ross['cat_name'];	
														}
												} ?>
                                                 <input type="hidden" name="payfor" id="payfor" class="catname form-control" value="<?php echo $_SESSION['catname']; ?>">
                                                <input type="hidden" name="schbank" id="schbank" class="form-control" value="<?php echo $_SESSION['schbank']; ?>"></td>
                                    <td>
									<?php 
									$getamount="select fee_amount,fee_id from fee_table where cat_id= '".$_SESSION['catid']."' and fee_class='".$_SESSION['grade']."' and sch_id='".$_SESSION['kidschid']."'";
												$output=mysqli_query($con,$getamount);
												if(mysqli_num_rows($output))
												{
														while($ro=mysqli_fetch_array($output))
														{	
															
															$_SESSION['feeid']=$ro['fee_id'];
															echo $_SESSION['feeamount']=$ro['fee_amount'];	
															$_SESSION['total']=$_SESSION['total']+$_SESSION['feeamount'];
														}
												}else {echo $_SESSION['feeamount']=0;} ?>
                                                <input type="hidden" name="schacct" id="schacct" class="form-control" value="<?php echo $_SESSION['acctnum']; ?>"> <input type="hidden" name="pemail" id="pemail" class="form-control" value="<?php echo $_SESSION['email']; ?>"></td>
                                      
                                <td><?php if($_SESSION['catinstallment']==1){ ?><input type="text" name="amountpaid[]" id="amountpaid" class="form-control amt" style="width:150px;" value="<?php echo $_SESSION['feeamount']; ?>" placeholder="Amount to pay"><span id="errmsg"></span><?php }else{?> <?php echo '<input type="text" name="amountpaid[]" id="amountpaid" class="form-control amt" style="width:150px;" placeholder="Amount to pay" value="'.$_SESSION['feeamount'].'" readonly>'; } ?></td>
                                
                                                
                                  <!--td><a class="btn btn-sm btn-outline-danger deleteitem" id="deleteitem" data-id="<?php echo $_SESSION['kidid']; ?>" data-name="<?php echo $_SESSION['fullname']; ?>" data-toggle="tooltip" data-placement="bottom" title="Remove Item From Cart">
                <i class="fa fa-trash-o" style="color:#e8cecc"></i>
                
            </a></td-->
                                </tr>
                                <?php
											}
											
									}
									
								?>
                                <tr><td colspan="6" align="right"><span><strong>Subtotal</strong></span></td><td colspan="2" id="subtotal"><?php echo"<strong>".$_SESSION['total']."</strong>"; ?></td></tr>
                                <tr><td colspan="6" align="right"><span><strong>Transaction Charge</strong></span></td><td colspan="2"><?php echo"<strong>".$_SESSION['charge']=round(($_SESSION['total']*0.015),2)."</strong>"; ?></td></tr>
                                <tr><td colspan="6" align="right"><span><strong>Total</strong></span></td><td colspan="2">
                                <input type="hidden" name="total" id="total" class="tot" value="<?php echo round(($_SESSION['total']+$_SESSION['charge']),2); ?>">
								<?php echo"<strong>".($_SESSION['total']+$_SESSION['charge'])."</strong>"; ?></td></tr>
                                </tbody>
                                </table>
                                <div class="form-group" align="center"><button type="button" name="proceed" id="proceed" onClick="payWithRave()" class="btn btn-success" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>">Proceed To Checkout  <i class="fa fa-arrow-circle-o-right"></i></button>&nbsp;&nbsp;&nbsp;&nbsp; <button type="button" name="addtocart" id="addtocart" class="btn btn-primary" data-loading-text="Adding...">Add To Cart  <i class="fa fa-shopping-cart"></i></button> </div>
                                </div>
                                <div id="showdata"></div>
                                </form>
                                    </div>
                                   </div>
                                 </div>
                                </div>
                            </div>
                        </div>
                        
                    </section>
                    <?php }?>
                    
                    
                </article>
                <footer class="footer">                    
                    <div class="footer-block author">
                        <ul>
                         <li>School Payment App by <a href="http://feement.com"><strong><?php echo $_SESSION['companyname']; ?></strong></a> </li>
                          
                        </ul>
                    </div>
                </footer>       
        </div>
        </div>
               
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        
         <script src="../../js/feevendor.js"></script>
        <script src="../../js/feeapp.js"></script>
        <script src="../../js/validator.js"></script>
        <script src="ptapp.js"></script>
       <!--Flutterwave--> <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
       <!--paystack--> <script src="https://js.paystack.co/v1/inline.js"></script>
        <script type="text/javascript">
		$(document).ready(function(){
			$("#selectall").change(function(){
			  $(".case").prop('checked', $(this).prop("checked"));
			  });
			  });
	  </script> 
        <script>
		 $(document).ready(function(e){
		$("#schname").change(function(){
			var schname=$(this).val();
			//alert(schname);
			$('#displaycart').empty();
			$('#displaynewcart').empty();
			$('#showdata').empty();
			if(schname!='')
			{
		$.ajax({
	  	type: 'POST',
		url: '../script/setnewpayment.php',
		data: {schname:schname},		
		dataType:'html',
		  success: function(returndata){
			  
			 $('#payname').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#payname').html('<option value="">Select Payment</option>');
		  }
		  
		}); return false;
			}else
			{
				//$('#payname').html('<option value="">Select Payment</option>');
			}
			
		});
		
		$("#payname").change(function(){
			var payname=$(this).val();
			var schname=thisform.schname.value;
			//alert(payname);
			$('#displaycart').empty();
			$('#displaynewcart').empty();
			$('#showdata').empty();
			if(payname!='')
			{
		$.ajax({
	  	type: 'POST',
		url: '../script/loadnewcart.php',
		data: {schname:schname,payname:payname},		
		dataType:'html',
		  success: function(returndata){
			  
			 $('#displaynewcart').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#displaynewcart').html(returndata);
		  }
		  
		}); return false;
			}else
			{
				//$('#payname').html('<option value="">Select Payment</option>');
			}
			
		});
	
});
 $(document).ready(function () {
            $("[id*=amountpaid]").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    $(this).closest('tr').find($("[id*=errmsg]")).html("Digits Only").show().fadeOut("slow");
                    return false;
                }
				
				$("[id*=amountpaid]").keyup(function(ev){
					/*var i; var tot=0;
					var len = $('#cartTable tr').length;
					var first_row = $('#cartTable tr').eq(1); 
					var subtotal_row = $('#cartTable tr').eq(len - 3);
					var trcharge_row = $('#cartTable tr').eq(len - 2);
					var total_row = $('#cartTable tr').eq(len - 1);					
					var j=(len-3);
					var first_row = $('#cartTable tr').eq(2);
					for(i=1;i<j; i++)
					{
						var row_no=$('#cartTable tr').eq(i);
					//var amountToPay=row_no.find('td:eq(5)').text();
					var amountToPay=row_no.find('.amt').val();
					tot += Number(amountToPay) ||0;
					var tr_chtot=(tot*0.015).toFixed(2);if(tr_chtot>=2000){tr_chtot=2000.00;}else{tr_chtot=Number(tr_chtot);}
					totalpay=tot+tr_chtot;
					}
					subtotal_row.find('td:eq(1)').text(tot.toFixed(2));
					trcharge_row.find('td:eq(1)').text(tr_chtot.toFixed(2));
					total_row.find('td:eq(1)').text(totalpay.toFixed(2));*/
					//alert(subtotal);
					
					});
					
            });
			
			/* var len = $('#cartTable tr').length;
			var first_row = $('#cartTable tr').eq(1); 
			var subtotal_row = $('#cartTable tr').eq(len - 3);
			var trcharge_row = $('#cartTable tr').eq(len - 2);
			var total_row = $('#cartTable tr').eq(len - 1);
			var subtotal=subtotal_row.find('td:eq(1)').text();
			var amountToPay;var i;*/
			
 });
 $(document).ready(function(){
	 				$('#showdata').empty();
					var i; var tot=0;
					var len = $('#cartTable tr').length;
					var first_row = $('#cartTable tr').eq(1); 
					var subtotal_row = $('#cartTable tr').eq(len - 3);
					var trcharge_row = $('#cartTable tr').eq(len - 2);
					var total_row = $('#cartTable tr').eq(len - 1);					
					var j=(len-3);
					var first_row = $('#cartTable tr').eq(2);
					for(i=1;i<j; i++)
					{
						var row_no=$('#cartTable tr').eq(i);
					//var amountToPay=row_no.find('td:eq(5)').text();
					var amountToPay=row_no.find('.amt').val();
					tot += Number(amountToPay) ||0;
					var tr_chtot=(tot*0.015).toFixed(2);if(tr_chtot>=2000){tr_chtot=2000.00;}else{tr_chtot=Number(tr_chtot);}
					totalpay=tot+tr_chtot;
					}
					subtotal_row.find('td:eq(1)').text(tot.toFixed(2));
					trcharge_row.find('td:eq(1)').text(tr_chtot.toFixed(2));
					total_row.find('td:eq(1)').text(totalpay.toFixed(2));
	 
	 });
 $(document).on('keyup blur', '#amountpaid', function(evt){
	 				$('#showdata').empty();
	 				var i; var tot=0;
					var len = $('#cartTable tr').length;
					var first_row = $('#cartTable tr').eq(1); 
					var subtotal_row = $('#cartTable tr').eq(len - 3);
					var trcharge_row = $('#cartTable tr').eq(len - 2);
					var total_row = $('#cartTable tr').eq(len - 1);					
					var j=(len-3);
					var first_row = $('#cartTable tr').eq(2);
					for(i=1;i<j; i++)
					{
						var row_no=$('#cartTable tr').eq(i);
					//var amountToPay=row_no.find('td:eq(5)').text();
					var amountToPay=row_no.find('.amt').val();
					tot += Number(amountToPay) ||0;
					var tr_chtot=(tot*0.015).toFixed(2);if(tr_chtot>=2000){tr_chtot=2000.00;}else{tr_chtot=Number(tr_chtot);}
					totalpay=tot+tr_chtot;
					}
					subtotal_row.find('td:eq(1)').text(tot.toFixed(2));
					trcharge_row.find('td:eq(1)').text(tr_chtot.toFixed(2));
					total_row.find('td:eq(1)').text(totalpay.toFixed(2));
	 
	 });
 $(document).on('change', '#payname', function(ev){
					$('#showdata').empty();
				    var i; var tot=0;
					var len = $('#cartTable tr').length;
					var first_row = $('#cartTable tr').eq(1); 
					var subtotal_row = $('#cartTable tr').eq(len - 3);
					var trcharge_row = $('#cartTable tr').eq(len - 2);
					var total_row = $('#cartTable tr').eq(len - 1);					
					var j=(len-3);
					var first_row = $('#cartTable tr').eq(2);
					for(i=1;i<j; i++)
					{
						var row_no=$('#cartTable tr').eq(i);
					//var amountToPay=row_no.find('td:eq(5)').text();
					var amountToPay=row_no.find('.amt').val();
					tot += Number(amountToPay) ||0;
					var tr_chtot=(tot*0.015).toFixed(2);if(tr_chtot>=2000){tr_chtot=2000.00;}else{tr_chtot=Number(tr_chtot);}
					totalpay=tot+tr_chtot;
					}
					subtotal_row.find('td:eq(1)').text(tot.toFixed(2));
					trcharge_row.find('td:eq(1)').text(tr_chtot.toFixed(2));
					total_row.find('td:eq(1)').text(totalpay.toFixed(2));
					//alert(subtotal);
	 });
 </script>
 <script>
 //Show Items in Cart
 
 </script> 
    </body>

</html>