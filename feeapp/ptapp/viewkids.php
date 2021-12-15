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
                                <li class="active">
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
                                <h1 class="title" align="center"><i class="fa fa-user"></i>   View Kid(s) <a href="appkids.php" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>  Add New Kid</a></h1>
                            </div>
 <div class="table-responsive">
   <table width="100%" class="table table-bordered table-striped" id="kidTable" >
    <thead class="thead-default">
    <tr>
    	<th width="7%" class="text-center">S/N</th>
    	<th width="19%" class="text-center">Student Name</th>    	
        <th width="34%" class="text-center">Student School</th>
        <th width="16%" class="text-center">Student Grade</th>
        <th width="9%" class="text-center">Status</th>    
        <th width="15%" class="text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	$max_char 	= 20;
	//echo substr($text, 0, $max_char) . '...';
   $sn=1;
   $newquery="select * from feestudent_table where feeclient_id='".$_SESSION['clientid']."'  order by std_id";
   $output=mysqli_query($con,$newquery);
   if(mysqli_num_rows($output))
   {
	   while($rows=mysqli_fetch_assoc($output))
	   {
		   
			$_SESSION['stdid']=$rows['std_id'];			
			$_SESSION['stdlname']=$rows['std_lname'];
			$_SESSION['stdfname']=$rows['std_fname'];
			$_SESSION['stdmnamename']=$rows['std_mname'];
			$_SESSION['stdgrade']=$rows['std_grade'];
			$_SESSION['stdidty']=$rows['std_idty'];
			$_SESSION['stdschool']=$rows['std_sch'];
			$_SESSION['stdstatus']=$rows['std_status'];
			$_SESSION['clientid']=$rows['feeclient_id'];			
			$_SESSION['stdimage']=$rows['std_image'];
			$fullname=$_SESSION['stdlname']." ".$_SESSION['stdfname'];
			
  ?>
  
    <tr>
    	<td><?php echo $sn; ?></td>
        <td><?php echo $fullname; ?></td>
        <td><?php echo $_SESSION['stdschool']; ?></td>
        <td><?php echo $_SESSION['stdgrade']; ?></td>        
        <!--td><?php echo substr($_SESSION['hospital'],0, $max_char). '...'; ?></td-->
        
        <td><?php if ($_SESSION['stdstatus']==1){echo 'Active';} else {echo 'Inactive';}  ?></td>
        <td>
        
           
            <a class="btn btn-sm btn-outline-info viewbut" id="viewbut" data-id="<?php echo $_SESSION['stdid']; ?>" data-name="<?php echo $fullname; ?>" data-toggle="tooltip" data-placement="bottom" title="View Kid's Full Detail">
                <i class="fa fa-eye" style="color:#cce4e8"></i>
                
            </a>
            
            <a class="btn btn-sm btn-outline-success editbut" id="editbut" data-id="<?php echo $_SESSION['stdid']; ?>" data-name="<?php echo $fullname; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Kid's Detail">
                <i class="fa fa-edit" style="color:#d5e8cc"></i>
                
            </a>
            
           
            
            <a class="btn btn-sm btn-outline-danger deletebut" id="deletebut" data-id="<?php echo $_SESSION['stdid']; ?>" data-name="<?php echo $fullname; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete Kid's Record">
                <i class="fa fa-trash-o" style="color:#e8cecc"></i>
                
            </a>
            
           
        </td>
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
    <td colspan="8" align="center"><i class="fa fa-times"></i><?php echo "No Record Yet";?></td>
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
$(document).ready(function (e) {
// Function to preview image after validation
$(function() {
	$("#my_file").click(function() {alert('here');});
$("#my_file").change(function() {
	
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
</script>
  <script>
        $("#previewing").click(function() {
			$("input[id='my_file']").click();
		});
        </script>
        
       
    </body>

</html>