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
                                <h1 class="title" align="center"><i class="fa fa-credit-card"></i>  Payment Checkout <a href="payment.php" class="btn btn-primary pull-right" data-toggle="tooltip" data-placement="bottom" title="Payment List"><i class="fa fa-list"></i>  </a></h1>           
          <div class="shopping-cart-box">
        <a href="#" class="close-shopping-cart-box" >Close</a>
        <h3>My Cart</h3>
            <div id="shopping-cart-results">
            </div>
        </div>
 
                                
                            </div>
                           
                            
                            <div id="displayitem" class="" style="margin-top:3%;" align="center">
                            <div class="row">
                             <div class="col-md-offset-2 col-md-8">
                              <div class="panel panel-success">
                                  <div class="panel-heading">My Cart Item(s)<span class="pull-right"></span></div>
                                  <div class="panel-body">
                             <form action="../script/cartprocess.php" name="cart" class="form-item" enctype="multipart/form-data" method="post" role="form">
                             <div id="displaynewcart" class="table-responsive"></div>
                             <div id="displaycart" align="center" class="table-responsive">
                            	
                               <table class="table table-condensed table-hover table-bordered" cellpadding="10px" id="cartTable">
                                <thead>
                                    <tr>
                                    	<th><input type="checkbox" class="custom-checkbox" id="selectall" checked style="display:none;"></th>
                                        
                                        <th>S/N</th>
                                        <th>Student Name</th>
                                        <th>Student Class</th>
                                        <th>Paying For</th>
                                        <th>Amount Due (NGN)</th>
                                        <th>Amount To Pay (NGN)</th>
                                    </tr>
                                </thead>  
	<?php $xquery="select cart_table.*,feestudent_table.* from cart_table inner join feestudent_table on cart_table.student_id=feestudent_table.std_id where cart_table.feeclient_id='".$_SESSION['clientid']."' and cart_table.cart_status=0";

		$output=mysqli_query($con,$xquery);
	   if(mysqli_num_rows($output))
					   {                             
                            										
											$total=0;$sn=0;
									
										while($row=mysqli_fetch_array($output))
											{
												$sn++;
												//$_SESSION['kidschid']=$row['sch_id'];
												$kidid=$row['std_id'];
												$cartid=$row['cart_id'];
												$_SESSION['lname']=$row['std_lname'];
												$_SESSION['fname']=$row['std_fname'];
												$_SESSION['grade']=$row['student_grade'];
												$_SESSION['schname']=$row['student_sch'];
												$amountdue=$row['amount_due'];
												$amountpaid=$row['amount_paid'];
												$payfor=$row['payment_for'];
												$_SESSION['fullname']=$_SESSION['lname']." ".$_SESSION['fname'];
												$total=sprintf("%01.2f",$total+$amountpaid);
												$charge=sprintf("%01.2f",($total*0.015));
											
                                echo '<tbody>
                                <tr>
                                	<td><input type="checkbox" name="kids[]" id="kids" class="case custom-checkbox" value="'.$kidid.'" checked style="display:none;"></td>
                                    <td>'.$sn;
                                   echo '<input type="hidden" class="nam" name="stdname[]" id="stdname" value="'.$_SESSION['fullname'].'">
                                    <input type="hidden" class="stid" name="stdid[]" id="stdid" value="'.$kidid.'"></td>
                                    <td>'. $_SESSION['fullname'].' </td>
                                    <td>'.$_SESSION['grade'].$cartid.'<input type="hidden" class="schname" name="kidschname[]" id="kidschname" value="'.$_SESSION['schname'].'"><input type="hidden" name="grade" id="grade" value="'.$_SESSION['grade'].'">
									<input type="hidden" name="cartid[]" id="cartid" class="ctid" value="'.$cartid.'">
									 </td>
                                   
									</td>
                                    <td>'.$payfor.'
									 
                                             <input type="hidden" name="pemail" id="pemail" class="form-control" value="'.$_SESSION['email'].'"></td>';
                                  $sch=$_SESSION['schname'];
								$kidselect="select * from feeschool_table where school_name='".$sch."' ";
								$reslt=mysqli_query($con,$kidselect);
									if(mysqli_num_rows($reslt))
											{
												while($row=mysqli_fetch_array($reslt))
													{
															 $_SESSION['ksid']=$row['sch_id'];
															 $_SESSION['kidschname']=$row['school_name'];
															 $schbank=$row['school_bank'];
															 $schacctnum=$row['bank_acct_num'];
														
													}
											}    
                              echo ' <td>'.$amountdue.'<input type="hidden" name="kidschid[]" id="kidschid" class="ksid" value="'.$_SESSION['ksid'].'"><input type="hidden" name="ksname[]" id="ksname" class="ksname" value="'.$_SESSION['kidschname'].'"></td>
								<td>'.$amountpaid.'</td>
                                
                                                
                                 
                                </tr>';
                                
									
								}										
                              echo '<tr><td colspan="6" align="right"><span><strong>Subtotal</strong></span></td><td colspan="2" id="subtotal">'.$total.'</td></tr>
                                <tr><td colspan="6" align="right"><span><strong>Transaction Charge</strong></span></td><td colspan="2"> '.$charge.'</td></tr>
                                <tr><td colspan="6" align="right"><span><strong>Total</strong></span></td><td colspan="2">
                                <input type="hidden" name="total" id="total" class="tot" value="'.sprintf("%01.2f",$total+$charge).'">
								'.sprintf("%01.2f",$total+$charge).'</td></tr>';
                   
								
					   }
					   else
					   {
						   echo 'An Error Just Occured';
					   }?>
                       </tbody>
                                </table>
                                <div class="form-group" align="center" id="process"><button type="button" name="checkout" id="checkout" onClick="payWithRave()" class="btn btn-success" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>">Checkout Now  <i class="fa fa-arrow-circle-o-right"></i></button> </div>
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
        <!--Flutterwave test--> <script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
       <!--paystack--> <!--script src="https://js.paystack.co/v1/inline.js"></script-->
        <script type="text/javascript">
		$(document).ready(function(){
			$("#selectall").change(function(){
			  $(".case").prop('checked', $(this).prop("checked"));
			  });
			  });
	  </script> 
        <script>
 /*$(document).ready(function(){
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
					var amountToPay=row_no.find('td:eq(6)').val();
					alert(amountToPay);
					tot += Number(amountToPay) ||0;
					var tr_chtot=(tot*0.015).toFixed(2);if(tr_chtot>=2000){tr_chtot=2000.00;}else{tr_chtot=Number(tr_chtot);}
					totalpay=tot+tr_chtot;
					}
					subtotal_row.find('td:eq(1)').text(tot.toFixed(2));
					trcharge_row.find('td:eq(1)').text(tr_chtot.toFixed(2));
					total_row.find('td:eq(1)').text(totalpay.toFixed(2));
					
	 });*/
 </script>
 <script>
 			
	 var len = $('#cartTable tr').length;var total = $('#cartTable tr').eq(len - 1).find('td:eq(1)').text();
	 var kschid = $('#cartTable tr').eq(len - 3).find('.ksid').val();
var email=$('#pemail').val();
	amount=parseInt(total);
	/*Flutterwave Starts*/
		const API_publicKey = "FLWPUBK-48b12a99ebe008ea18f74e0778e173b2-X";//test acct
		
		// real acct const API_publicKey = "FLWPUBK-48b12a99ebe008ea18f74e0778e173b2-X";

    function payWithRave() {
        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: email,
			customer_phone: "2348168905925",
            amount: amount,
            currency: "NGN",
            txref: "ft"+ Math.floor((Math.random() * 1000000000) + 1),
            subaccounts: [
              {
                id: "RS_2A83F3874D0488084AED96317F8EC29A",
		           transaction_split_ratio:"5",
                transaction_charge_type: "flat",
                transaction_charge: "100"

      
              },
			  {
                id: "RS_2A83F3874D0488084AED96317F8EC29A",
		           transaction_split_ratio:"5",
                transaction_charge_type: "flat",
                transaction_charge: "100"

      
              }
            ],
            meta: [{
                metaname: "School Payment",
                metavalue: "AP1234"
            }],
            onclose: function() {},
            callback: function(response) {
                var txref = response.tx.txRef; // collect flwRef returned and pass to a 					server page to complete status check.
                console.log("This is the response returned after a charge", response);
                if (
                    response.tx.chargeResponseCode == "00" ||
                    response.tx.chargeResponseCode == "0"
                ) {
                    // redirect to a success page
					//alert('Payment Successful');
                } else {
                    // redirect to a failure page.
					//alert('Payment Error');
                }

                x.close(); // use this to close the modal immediately after payment.
            }
        });
    }

 
 </script> 
    </body>

</html>