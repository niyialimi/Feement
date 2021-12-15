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
        <title> FeeApp View Student </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
       	<link rel="icon" type="image/png" href="../../assets/favicon.png">
        <link rel="stylesheet" href="../../css/feevendor.css">
        <link rel="stylesheet" href="../../css/app-css.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <style>
       #message{
		position:absolute;
		top:40%;
		left:10%;
		width:400px;
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
                                 <?php if($_SESSION['acctstatus']==0){echo 'Inactive Account';}else {echo 'Active Account';}?> &nbsp;</a></li>
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
                                    </div> <span class="name">
                                      <?php echo $_SESSION['fname']; ?>
                                    </span> </a>
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
                                <li>
                                    <a href="payment.php"> <i class="fa fa-credit-card"></i> Make Payment</a>                                    
                                </li>
                                <li class="active">
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
                                <h1 class="title" align="center"><i class="fa fa-table"></i>   Transaction <a href="payment.php" class="btn btn-primary pull-right"><i class="fa fa-list"></i>  Payment</a></h1>
                            </div>
  <div class="row">
      <div class="col-md-3">
            <div class="styled-select lightgreen semi-square">
              <select id="sel1">
                <option>Filter By</option>
                <option value="Student Name">Student Name</option>
                <option value="Date">Date</option>
                <option value="Student Grade">Student Grade</option>
              </select>
              </div>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-3"></div>
          <div class="col-md-3">
          	<div class="input-group">
              <div class="input-group-addon">Search</div>
              <input type="text" class="form-control" name="search" id="searchinput" onKeyUp="searchQuery()" placeholder="Input Search Query">
            </div>
          </div>
      
    </div>
    <p>&nbsp;</p>
    
 <div class="table-responsive">
   <table width="100%" class="table table-bordered table-striped" id="myTable" >
    <thead class="thead-default">
    <tr>
    	<th class="text-center">S/N</th>
        <th class="text-center">Transaction Number</th>
    	<th class="text-center">Student Name</th>    	
        <th class="text-center">Student School</th>
        <th class="text-center">Student Grade</th>
        <th class="text-center">Pay Item</th>
        <th class="text-center">Amount Paid</th>
        <th class="text-center">Pay Type</th>
        <th class="text-center">Pay Method</th>
        <th class="text-center">Status</th>    
        <th class="text-center">Pay Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
	$max_char 	= 20;
	//echo substr($text, 0, $max_char) . '...';
   $sn=1;
   $newquery="select cart_table.*,transact_table.* from cart_table inner join transact_table on cart_table.feeclient_id=transact_table.feeclient_id and cart_table.student_id=transact_table.std_id where cart_table.feeclient_id='".$_SESSION['clientid']."' and cart_table.student_id group by transact_table.tr_id";
   $output=mysqli_query($con,$newquery);
   if(mysqli_num_rows($output))
   {
	   while($rows=mysqli_fetch_assoc($output))
	   {
		   
			$_SESSION['stdid']=$rows['std_id'];	
			$_SESSION['stdgrade']=$rows['student_grade'];
			$_SESSION['trnum']=$rows['tr_num'];
			$_SESSION['stdschool']=$rows['student_sch'];
			$_SESSION['paymentfor']=$rows['payment_for'];			
			$_SESSION['feepaid']=$rows['amount_paid'];
			$_SESSION['feedue']=$rows['amount_due'];
			$_SESSION['paymtd']='Card Payment';
			$bal=($_SESSION['feedue'])-($_SESSION['feepaid']);
			if($bal==0){$_SESSION['paytype']='Full';}else{$_SESSION['paytype']='Part';}
			$_SESSION['status']='Settled';
			$_SESSION['paydate']=$rows['tr_date'];
			
  ?>
  
    <tr>
    	<td align="center"><?php echo $sn; ?></td>
        <td align="center"><?php echo $_SESSION['trnum']; ?></td>
        <td align="center"><?php echo $_SESSION['stdid']; ?></td>        
        <td align="center"><?php echo $_SESSION['stdschool']; ?></td>
        <td align="center"><?php echo $_SESSION['stdgrade']; ?></td>        
        <!--td align="center"><?php echo substr($_SESSION['hospital'],0, $max_char). '...'; ?></td-->
        <td align="center"><?php echo $_SESSION['paymentfor']; ?></td> 
        <td align="center"><?php echo $_SESSION['feepaid']; ?></td> 
        <td align="center"><?php echo $_SESSION['paytype']; ?></td>
        <td align="center"><?php echo $_SESSION['paymtd']; ?></td> 
        <td align="center"><?php echo $_SESSION['status']; ?></td> 
        <td align="center"><?php echo $_SESSION['paydate']; ?></td> 
        
    </tr>
    
   
     <!--modal-->
 <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Kid Full Detail 
            </h4>
         </div>
         
         <div class = "modal-body">
            <div id="display"></div>
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal">
               Close
            </button>
            <!--a href="editkid.php?id=<?php echo $_SESSION['stdid']; ?>" class="btn btn-primary pull-right"><i class="fa fa-edit"></i>  Edit Kid's Details</a-->
             
            
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div>
<!-- /.modal -->
 
<!--modal2-->
 <div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   
   <div class = "modal-dialog modal-lg">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Edit Kid's Details
            </h4>
         </div>
         
         <div class = "modal-body">
            <div id="display2"></div>
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal">
               Close
            </button>
            <button type = "submit" id="editallbut" class = "btn btn-primary">
               Edit Details &nbsp;&nbsp; <i class="fa fa-edit"></i>
            </button>
            
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div>
<!-- /.modal2 -->

<?php
	$sn++;
	   }
   }
   else
   {
	?> 
    <tr>
    <td colspan="11" align="center"><i class="fa fa-times"></i><?php echo "No Record Yet";?></td>
    </tr> 
    <?php } ?>
    
      </tbody>
    </table><div id="message"></div>
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
               </div></div>
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
       <script>
	   		function searchQuery() {
			  sel1 = document.getElementById("sel1").value;
			  
			  var input1, filter, table, tr, td, i, col;
			  input1 = document.getElementById("searchinput");
			  filter = input1.value.toUpperCase();
			  table = document.getElementById("myTable");
			  tr = table.getElementsByTagName("tr");
			
			  // Loop through all table rows, and hide those who don't match the search query
			  if(sel1=='Student Name')
			  {
				   col=2;
			  }else if(sel1=='Date')
			  {
				  col=10;
			  }else if(sel1=='Student Grade')
			  {
				  col=4;
			  }else alert('Select A Filter');
			  for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[col];
				if (td) {
				  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					  
					tr[i].style.display = "";
				  } else {
					tr[i].style.display = "none";
				  }
				}
			  }
			}
		
$(document).ready(function() {
   $('#sel1').css('color','black ');
   $('#sel1').change(function() {
      var current = $('#sel1').val();
      if (current != 'null') {
          $('#sel1').css('color','black');
      } else {
          $('#sel1').css('color','white');
      }
   }); 
});
		
	   </script>
    </body>

</html>