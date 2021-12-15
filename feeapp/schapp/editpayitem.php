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
                                <h1 class="title" align="center"><i class="fa fa-edit"></i>   Edit Fee <a href="payitem.php" class="btn btn-primary pull-right" id="moduleoverlay" data-toggle="tooltip" data-placement="bottom" title="Create New Fee">  Fee List</a></h1>
  <p>&nbsp;</p>                              
      <div class="row">
             <div class="col-md-6">             	
             <div class="panel panel-success">
             <div class="panel-heading">&nbsp;</div>
              <div class="panel-body">
              <h4 align="center"><strong>Edit Payment Item</strong></h4>
                	<form action="../script/editfeescript.php" enctype="multipart/form-data"  id="editfee-form"  method="POST" role="form" data-toggle="validator">
         <div class = "modal-body">
        <?php
			$id=$_GET['id'];
			$chksql="select * from category_table where cat_id='$id' and feeclient_id='".$_SESSION['clientid']."'";
			$res=mysqli_query($con,$chksql);
			if(mysqli_num_rows($res))
			{
				while($rows=mysqli_fetch_array($res))
				{
				 $catlogo=$rows['cat_logo'];
				 $_SESSION['catid']=$rows['cat_id'];
				 $_SESSION['schid']=$rows['sch_id'];
				 $status=$rows['cat_status'];if($status==1){$status='Enabled';$newstatus='Disable';}else if($status==0){$status='Disabled';$newstatus='Enable';}
					
					$installstatus=$rows['cat_installment'];if($installstatus==1){$installstatus='Enabled';$newinstallstatus='Disable';}else {$installstatus='Disabled';$newinstallstatus='Enable';}
					if($catlogo==''){$catlogo='../../assets/faces/avatar5.png';}else{$catlogo=$catlogo;}
			
		?>
         <div class="form-group"><label class="control-label" for="paymod">Fee Name</label> <input type="text" class="form-control" name="modname" id="modname" value="<?php echo $rows['cat_name']; ?>" placeholder="Payement Module Name" data-error="Cannot be left empty" required> 
              <div class="help-block with-errors"></div>
           </div>           
         <div id="message"></div>
         <div class="form-group"><label class="control-label" for="acctno">Fee Icon</label><br>
         <div id="image_preview"><img id="previewing" src="<?php echo "../../".$catlogo; ?>" style="width:100px; height:100px; cursor:pointer;" width="100px" height="100px" class="img-thumbnail"/></div>
          <input type="file" name="profileImg" id="file" placeholder="Icon Image is optional"> 
           </div>
           
           <div class="form-group"><label class="control-label" for="">Fee Status</label> &nbsp;&nbsp;&nbsp;<br>
            <div class="btn-group" data-toggle="buttons">
								  <label class="btn btn-primary active">
									<input type="radio" name="modulestatus" value="<?php echo $status; ?>" id="modulestatus" autocomplete="off" checked> <?php echo $status; ?>
								  </label>
								  <label class="btn btn-primary">
									<input type="radio" name="modulestatus" value="<?php echo $newstatus; ?>" id="modulestatus" autocomplete="off"> <?php echo $newstatus; ?>
								  </label>
								  </div>
           </div>
           
           <div class="form-group"><label class="control-label" for="">Allow Installment</label> &nbsp;&nbsp;&nbsp;<br>
            <div class="btn-group" data-toggle="buttons">
								  <label class="btn btn-primary active">
									<input type="radio" name="installstatus" value="<?php echo $installstatus; ?>" id="installstatus" autocomplete="off" checked> <?php echo $installstatus; ?>
								  </label>
								  <label class="btn btn-primary">
									<input type="radio" name="installstatus" value="<?php echo $newinstallstatus; ?>" id="installstatus" autocomplete="off"> <?php echo $newinstallstatus; ?>
								  </label>
								  </div>
           </div>   
           <input type="hidden" name="clientid" id="clientid" value="<?php echo $_SESSION['clientid']; ?>">
           <input type="hidden" name="catid" id="catid" value="<?php echo $rows['cat_id']; ?>">        
          <?php
		  		}
			}
		  ?>
         </div>
         
          <div align="center" id="setcategory">
          <div id="returnmessage"></div>
           	<button type = "reset" class = "btn btn-danger" data-dismiss = "modal">
               Clear
            </button>
            <button type = "submit" name="editfee" id="editfee" class = "btn btn-primary">
               Save Changes
            </button>
            
         </div>
         
         </form>
              </div>
            </div>
             
             
              </div> 
           <div class="col-md-6">
           <div class="panel panel-success">
           <div class="panel-heading">&nbsp;</div>
            <div class="panel-body">
                 <h4 align="center"><strong>Edit Fee Amount</strong></h4>
                 
                
                 <form action="" name="amtedit" enctype="multipart/form-data" id="editamount-form"  class="edamtform"  method="POST" role="form" data-toggle="validator">
                 <?php 
				 	$selclass="select * from fee_table where cat_id='".$_SESSION['catid']."' and feeclient_id='".$_SESSION['clientid']."'";
							$rest=mysqli_query($con,$selclass);
							if(mysqli_num_rows($rest))
							{
				 ?>
                  <table width="60%" class="table table-striped" id="myTable">
                    	
                        <tr>
                        
                           <td  align="center"><input type="checkbox" id="selectall" checked style="display:none"/></td>
                            <td  align="center"><strong>Class</strong></td>
                            <td  align="center"><strong>Amount</strong></td>
                         </tr>
                   			<?php
							
								while($rows=mysqli_fetch_array($rest))
								{
						?>
                    	<tr>
                        <td align="center"><input type="checkbox" name="schs[]" id="schs" class="case" value="<?php echo $rows['fee_id']; ?>" checked style="display:none"/> </td>
                           <td align="center"><?php echo $rows['fee_class']; ?><input type="hidden" class="clname" value="<?php echo $rows['fee_class']; ?>" name="classname[]" id="classname"></td>
                           <td align="center"><input type="text" class="form-control amt" name="amount[]" id="amount" value="<?php echo $rows['fee_amount']; ?>" placeholder="0.00">
                           <input type="hidden" name="schid[]" id="schid" class="schidt" value="<?php echo $_SESSION['schid']; ?>">
         				   <input type="hidden" name="catid[]" id="catid" class="catidt" value="<?php echo $_SESSION['catid']; ?>">
                           </td>
                        </tr>
                        
                         <?php
								}
							?></table> 
                         <div id="msg"></div>
               			 <div align="center">                      
                         <button type = "button" name="editamount" id="editamount" class = "btn btn-primary">
                           Edit Amount
                        </button>	
                        </div>								
						<?php	}else
							{
						?>
                         
                        <!-- table for edit ends-->
                        <table width="60%" class="table table-striped" id="myTable">
                         <tr>
                        <input type="hidden" name="schid[]" id="schid" class="schidt" value="<?php echo $_SESSION['schid']; ?>">
         				   <input type="hidden" name="catid[]" id="catid" class="catidt" value="<?php echo $_GET['id']; ?>">
                           <td  align="center"><input type="checkbox" id="selectall" checked style="display:none"/></td>
                            <td  align="center"><strong>Class</strong></td>
                            <td  align="center"><strong>Amount</strong></td>
                         </tr>
                        <tr>
                        <td align="center"><input type="checkbox" name="schs[]" id="schs" class="case" value="<?php echo $_GET['id']; ?>" checked/> </td>
                           <td align="center">JSS 1<input type="hidden" class="clname" value="JSS 1" name="classname[]" id="classname"></td>
                           <td align="center"><input type="text" class="form-control amt" name="amount[]" id="amount" placeholder="0.00"></td>
                        </tr>
                        
                        <td align="center"><input type="checkbox" name="schs[]" id="schs" class="case" value="<?php echo $_GET['id']; ?>" checked/> </td>
                           <td align="center">JSS 2<input type="hidden" class="clname" value="JSS 2" name="classname[]" id="classname"></td>
                           <td align="center"><input type="text" class="form-control amt" name="amount[]" id="amount" placeholder="0.00"></td>
                        </tr>
                        
                        <tr>
                       	   <td align="center"><input type="checkbox" name="schs[]" id="schs" class="case" value="<?php echo $_GET['id']; ?>" checked/> </td>
                           <td align="center">JSS 3<input type="hidden" class="clname" value="JSS 3" name="classname[]" id="classname"></td>
                           <td align="center"><input type="text" class="form-control amt" name="amount[]" id="amount" placeholder="0.00"></td>
                        </tr>
                    	<tr>
                    	   <td align="center"><input type="checkbox" name="schs[]" id="schs" class="case" value="<?php echo $_GET['id']; ?>" checked/> </td>
                           <td align="center">SSS 1<input type="hidden" class="clname" value="SSS 1" name="classname[]" id="classname"></td>
                           <td align="center"><input type="text" class="form-control amt" name="amount[]" id="amount" placeholder="0.00"></td>
                        </tr>
                        
                        <tr>
                    	   <td align="center"><input type="checkbox" name="schs[]" id="schs" class="case" value="<?php echo $_GET['id']; ?>" checked/> </td>
                           <td align="center">SSS 2<input type="hidden" class="clname" value="SSS 2" name="classname[]" id="classname"></td>
                           <td align="center"><input type="text" class="form-control amt" name="amount[]" id="amount" placeholder="0.00"></td>
                        </tr>
                        
                        <tr>
                    	   <td align="center"><input type="checkbox" name="schs[]" id="schs" class="case" value="<?php echo $_GET['id']; ?>" checked/> </td>
                           <td align="center">SSS 3<input type="hidden" class="clname" value="SSS 3" name="classname[]" id="classname"></td>
                           <td align="center"><input type="text" class="form-control amt" name="amount[]" id="amount" placeholder="0.00"></td>
                        </tr>
                        </table>
                         <!--table for add ends-->
                        <div id="msg"></div>
               			 <div align="center">
                         <button type = "reset" class = "btn btn-danger" data-dismiss = "modal">
                           Clear
                        </button>
                         <button type = "button" name="savefee" id="savefee" class = "btn btn-primary">
                           Save Fee Amount
                        </button>  
                         </div>
                       <?php
							}
					   ?>
               
                
                  </form>
                </div>                
             </div>
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
 <script>
$(document).ready(function (e) {
// Function to preview image after validation
$(function() {
$("#file").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','noimage.png');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});
function imageIsLoaded(e) {
$("#file").css("color","green");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '250px');
$('#previewing').attr('height', '230px');
};
});

 $("#previewing").click(function() {
			$("input[id='file']").click();
		});
</script>
    </body>

</html>