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
        <title> FeeApp Payment Module </title>
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
                                  <?php if($_SESSION['acctstatus']==0 && $_SESSION['vstatus']==0){echo 'Inactive Account';}else {echo 'Active Account';}?> &nbsp;</a></li>
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
                                    <a href="viewschool.php"> <i class="fa fa-university"></i> My School </a>
                                    
                                </li>
                                <li class="active">
                                    <a href="payitem.php"> <i class="fa fa-credit-card"></i> Payment Module</a>                                    
                                </li>
                                <li>
                                    <a href="transact.php"> <i class="fa fa-money"></i> Transactions</a>
                                    
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-comment"></i> Inbox <i class="fa arrow"></i> </a>
                                    <ul>
                                        <li> <a href="admininbox.php">My Inbox</a>
    								</li>
                                        <li> <a href="adminsendmessage.php">Send Message</a>
    								</li>
                                    </ul>
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
               <?php if($_SESSION['acctstatus']==0 && $_SESSION['vstatus']==0){echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-minus-sign pull-left"></span>&nbsp;&nbsp;Your Account is Inactive, Please Confrim Your E-mail to Complete your Registration; Inactive account do not have access to Full functionality</div>';} else if($_SESSION['acctstatus']==1 && $_SESSION['vstatus']==0){echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-minus-sign pull-left"></span>&nbsp;&nbsp;Your Email has been confirmed and your Account await Verification; Please be Patient</div>';}else { ?>
                <div></div>
                    <section class="section">
                        <div class="row sameheight-container"></div>
                        <div class="card card-block sameheight-item">
                            <div class="title-block">
                                <h1 class="title" align="center"><i class="fa fa-credit-card"></i>   School Payment Module <a href="#" class="btn btn-primary pull-right" id="moduleoverlay" data-toggle="tooltip" data-placement="bottom" title="Create New Fee"><i class="fa fa-plus"></i>  Create New Fee</a></h1>
  <p>&nbsp;</p>                              
  <div class="row">
 <div class="col-md-3"></div>
 <div class="col-md-6">
 <form id="selsch" name="selsch">
 <select class="form-control form-control-lg" name="adminsch" id="adminsch">
 <option value="">School Name</option>
            <?php 
		 	$chksql="select feeschool_table.school_name,sch_id from feeschool_table where feeclient_id='".$_SESSION['clientid']."'";
			$res=mysqli_query($con,$chksql);
			if(mysqli_num_rows($res))
			{
				while($rows=mysqli_fetch_array($res))
				{
					echo '<option value="'.$rows['sch_id'].'">'.$rows['school_name'].'</option>';
				}
			}
 ?>
 </select>
 <input type="hidden" name="clientid" id="clientid" value="<?php echo $_SESSION['clientid']; ?>">
 </form>
  </div> 
 <div class="col-md-3"></div>

</div>
    <div id="displayitem" style="margin-top:3%;">
        
           <!--?php 
		   echo '<div class="col-md-2 col-sm-6"> 
             <div class="cardc">
             <a href="#" class="lk">
              <img src="../../assets/school.png" alt="Pay Icon" style="width:100%">
              <div class="container">
                <p align="center">Add New Payment</p>
              </div>
              </a>
             </div> 
           </div>   ';
		   ?-->
         
              
     </div>
 
    
</div>
</div>
 
 
 
              </section>
                    <?php }?>
                    
 <!--modal-->
 <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Create New Fee 
            </h4>
         </div>
         <form id="module-form" action="../script/addcategory.php" enctype="multipart/form-data"  class="modform"  method="POST" role="form" data-toggle="validator">
         <div class = "modal-body">
         
         <div class="form-group"><label class="control-label" for="paymod">Fee Name</label> <input type="text" class="form-control" name="modname" id="modname" placeholder="Payement Module Name" data-error="Cannot be left empty" required> 
              <div class="help-block with-errors"></div>
           </div>
           <div class="form-group">
            <select class="form-control form-control-lg" id="schlname" name="schlname" required>
            <option value="">School Name</option>
            <?php 
		 	$chksql="select school_name,sch_id from feeschool_table where feeclient_id='".$_SESSION['clientid']."'";
			$res=mysqli_query($con,$chksql);
			if(mysqli_num_rows($res))
			{
				while($rows=mysqli_fetch_array($res))
				{
					echo '<option value="'.$rows['sch_id'].'">'.$rows['school_name'].$rows['sch_id'].'</option>';
				}
			}
		 ?>
                 
                                                        
           </select>
             
          <input type="hidden" name="clientid" id="clientid" value="<?php echo $_SESSION['clientid']; ?>">            
         </div>
         <div id="message"></div>
         <div class="form-group"><label class="control-label" for="acctno">Fee Icon</label><br> <input type="file" name="profileImg" id="profileImg" placeholder="Icon Image is optional"> 
           </div>
           
           <div class="form-group"><label class="control-label" for="">Fee Status</label> &nbsp;&nbsp;&nbsp;<br>
            <div class="btn-group" data-toggle="buttons">
								  <label class="btn btn-primary active">
									<input type="radio" name="modulestatus" value="1" id="modulestatus" autocomplete="off" checked> Enable
								  </label>
								  <label class="btn btn-primary">
									<input type="radio" name="modulestatus" value="0" id="modulestatus" autocomplete="off"> Disable
								  </label>
								  </div>
           </div>
           
           <div class="form-group"><label class="control-label" for="">Allow Installment</label> &nbsp;&nbsp;&nbsp;<br>
            <div class="btn-group" data-toggle="buttons">
								  <label class="btn btn-primary active">
									<input type="radio" name="installstatus" value="1" id="installstatus" autocomplete="off" checked> Enable
								  </label>
								  <label class="btn btn-primary">
									<input type="radio" name="installstatus" value="0" id="installstatus" autocomplete="off"> Disable
								  </label>
								  </div>
           </div>           
          
         </div>
          <div class = "modal-footer" id="setcategory">
           	<button type = "button" class = "btn btn-danger" data-dismiss = "modal">
               Clear
            </button>
            <button type = "submit" name="savemodule" id="savemodule" class = "btn btn-primary">
               Save New Fee
            </button>
            
         </div>
         </form>
         <div id="setpayment">
         <h4 align="center"><strong>Set Fee Amount</strong></h4>
         <div class="form-group">
        
         <form id="module-form" action="../script/addfee.php" enctype="multipart/form-data"  class="modform"  method="POST" role="form" data-toggle="validator">
          <table width="60%" class="table table-striped" id="myTable">
                    	
                        <tr>
                           <td  align="center"><input type="checkbox" id="selectall" checked/></td>
                            <td  align="center"><strong>Class</strong></td>
                            <td  align="center"><strong>Amount</strong></td>                            
                         </tr>
                   
                    	<tr>
                        <td align="center"><input type="checkbox" name="schs[]" id="schs" class="case" value="1" checked/> </td>
                           <td align="center">JSS 1<input type="hidden" class="clname" value="JSS 1" name="classname[]" id="classname"></td>
                           <td align="center"><input type="text" class="form-control amt" name="amount[]" id="amount" placeholder="0.00"></td>
                        </tr>
                        
                        <tr>
                        <td align="center"><input type="checkbox" name="schs[]" id="schs" class="case" value="2" checked/> </td>
                           <td align="center">JSS 2<input type="hidden" class="clname" value="JSS 2" name="classname[]" id="classname"></td>
                           <td align="center"><input type="text" class="form-control amt" name="amount[]" id="amount" placeholder="0.00"></td>
                        </tr>
                        
                        <tr>
                       	   <td align="center"><input type="checkbox" name="schs[]" id="schs" class="case" value="3" checked/> </td>
                           <td align="center">JSS 3<input type="hidden" class="clname" value="JSS 3" name="classname[]" id="classname"></td>
                           <td align="center"><input type="text" class="form-control amt" name="amount[]" id="amount" placeholder="0.00"></td>
                        </tr>
                    	<tr>
                    	   <td align="center"><input type="checkbox" name="schs[]" id="schs" class="case" value="4" checked/> </td>
                           <td align="center">SSS 1<input type="hidden" class="clname" value="SSS 1" name="classname[]" id="classname"></td>
                           <td align="center"><input type="text" class="form-control amt" name="amount[]" id="amount" placeholder="0.00"></td>
                        </tr>
                        
                        <tr>
                    	   <td align="center"><input type="checkbox" name="schs[]" id="schs" class="case" value="5" checked/> </td>
                           <td align="center">SSS 2<input type="hidden" class="clname" value="SSS 2" name="classname[]" id="classname"></td>
                           <td align="center"><input type="text" class="form-control amt" name="amount[]" id="amount" placeholder="0.00"></td>
                        </tr>
                        
                        <tr>
                    	   <td align="center"><input type="checkbox" name="schs[]" id="schs" class="case" value="6" checked/> </td>
                           <td align="center">SSS 3<input type="hidden" class="clname" value="SSS 3" name="classname[]" id="classname"></td>
                           <td align="center"><input type="text" class="form-control amt" name="amount[]" id="amount" placeholder="0.00"></td>
                        </tr>
                </table>
                <div id="msg"></div>
                <div class = "modal-footer">
                    <button type = "button" class = "btn btn-danger" data-dismiss = "modal">
                       Close
                    </button>
                     <button type = "button" name="savefee" id="savefee" class = "btn btn-primary">
                       Save Fee Amount
                    </button>   
                  </div>
                  </form>
                </div>
                </div>
            
        
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div>
<!-- /.modal -->


                 
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
        <script src="schadminapp.js"></script>
       <script type="text/javascript">
		$(document).ready(function(){
			$("#selectall").change(function(){
			  $(".case").prop('checked', $(this).prop("checked"));
			  });
			  });
	  </script> 
      <script>
 $(document).ready(function(e){
	$("#adminsch").change(function(){
		//checking
			var schid=$(this).val(); 
			var clientid=selsch.clientid.value;
				 //alert(schid+' '+clientid);
		$.ajax({
	  	type: 'POST',
		url: '../script/loadfees.php',
		data: {schid:schid,clientid:clientid},		
		dataType:'html',
		  success: function(returndata){
			 $('#displayitem').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#displayitem').html(returndata);
		  }
		  
		}); return false;
			
		});
});
 </script>  

    </body>

</html>