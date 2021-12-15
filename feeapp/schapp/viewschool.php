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
        <title> FeeApp View School </title>
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
                                    <a href="viewschool.php"> <i class="fa fa-university"></i> My School  </a>
                                    
                                </li>
                                <li>
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
                                <h1 class="title" align="center"><i class="fa fa-university"></i>   My School(s) <a href="#" class="btn btn-primary pull-right" id="newschbut" data-toggle="tooltip" data-placement="bottom" title="Add New School"><i class="fa fa-university"></i>  </a></h1>
                            </div>
 <div class="table-responsive">
   <table width="100%" class="table table-bordered table-striped" id="myTable" >
    <thead class="thead-default">
    <tr align="center">
    	<th width="7%" class="text-center">S/N</th>
    	<th width="19%" class="text-center">School Name</th> 
        <th width="16%" class="text-center">Date Created</th>
        <th width="9%" class="text-center">Status</th>    
        <th width="15%" class="text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	$max_char 	= 20;
	//echo substr($text, 0, $max_char) . '...';
   $sn=1;
   $newquery="select * from feeschool_table where feeclient_id='".$_SESSION['clientid']."'  order by sch_id";
   $output=mysqli_query($con,$newquery);
   if(mysqli_num_rows($output))
   {
	   while($rows=mysqli_fetch_assoc($output))
	   {
		   
			$_SESSION['schid']=$rows['sch_id'];			
			$_SESSION['schoolname']=$rows['school_name'];
			$_SESSION['regdate']=$rows['reg_date'];	
			$_SESSION['schoolstatus']=$rows['school_status'];
			
  ?>
  
    <tr>
    	<td align="center"><?php echo $sn; ?></td>
        <td align="center"><?php echo $_SESSION['schoolname']; ?></td>
        <td align="center"><?php echo $_SESSION['regdate']; ?></td>
        <!--td align="center"><?php echo substr($_SESSION['hospital'],0, $max_char). '...'; ?></td-->
        
        <td align="center"><?php if ($_SESSION['schoolstatus']==1){echo 'Active';} else {echo 'Inactive';}  ?></td>
        <td align="center">
        
           
            <a class="btn btn-sm btn-outline-info viewbut" id="viewbut" data-id="<?php echo $_SESSION['schid']; ?>" data-client="<?php echo $_SESSION['clientid']; ?>" data-toggle="tooltip" data-placement="bottom" title="View School Full Detail">
                <i class="fa fa-search" style="color:#cce4e8"></i>
                
            </a>
            
            <a class="btn btn-sm btn-outline-success editbut" id="editbut" data-id="<?php echo $_SESSION['schid']; ?>" data-client="<?php echo $_SESSION['clientid']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit School Detail">
                <i class="fa fa-edit" style="color:#d5e8cc"></i>
                
            </a>
            
           
            
            <a class="btn btn-sm btn-outline-danger deletebut" id="deletebut" data-id="<?php echo $_SESSION['schid']; ?>" data-client="<?php echo $_SESSION['clientid']; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete School Record">
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
               School Full Detail 
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
 <div class="modal fade bs-example-modal-lg" id="addnewModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   
   <div class = "modal-dialog modal-lg">
      <div class = "modal-content">
       <form id="schreg-form" action=""enctype="multipart/form-data"  class="schsigup"  method="POST" role="form" data-toggle="validator">  
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Add New School
            </h4>
         </div>
         
         <div class = "modal-body">
            
    <input type="hidden" name="clientid" id="clientid" value="<?php echo $_SESSION['clientid']; ?>">
                                <div class="form-group"> <label class="control-label" for="schname">Registered Email</label> <input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" readonly> <div class="help-block with-errors"></div></div>
                                
                                <div class="row"> 
                                <div class="form-group col-xs-12 col-md-6 col-lg-6">
                                <label class="control-label" for="firstname">Bank Name</label> 
                                <select class="form-control form-control-lg" id="bankname" name="bankname">
                                  <option value="">Select Your Bank</option>
                                   <option value="Access Bank">Access Bank</option>
                                   <option value="Diamond Bank">Diamond Bank</option>
                                   <option value="Eco Bank">Eco Bank</option>
                                   <option value="FCMB">FCMB</option>
                                   <option value="First Bank">First Bank</option>
                                   <option value="GTBank">GTBank</option>
                                   <option value="Heritage Bank">Heritage Bank</option>
                                   <option value="IBTC Bank">IBTC Bank</option>
                                   <option value="Keystone Bank">Keystone Bank</option>
                                   <option value="Skye Bank">Skye Bank</option>
                                   <option value="Sterlin Bank">Sterlin Bank</option>
                                   <option value="U.B.A">U.B.A</option>
                                   <option value="Union Bank">Union Bank</option>
                                   <option value="Unity Bank">Unity Bank</option>
                                   <option value="Wema Bank">Wema Bank</option>
                                   <option value="Zenith Bank">Zenith Bank</option>                          
                                 </select>
                                <div class="help-block with-errors"></div></div>
                              <div class="form-group col-xs-12 col-md-6 col-lg-6"><label class="control-label" for="acctno">Account Number</label> <input type="text" class="form-control" name="acctno" id="acctno" placeholder="School Bank Account Number" data-error="School cannot be empty" required> 
                               <div class="help-block with-errors"></div>
                               </div>
                             </div><!--row-->
                    <div class="row">
                       <div class="form-group col-xs-12 col-md-6 col-lg-6">
                         <label class="control-label" for="phoneno">Phone Number</label> <input type="text" class="form-control" name="mobileno" id="mobileno" placeholder="School Mobile Number" data-error="Mobile Number cannot be empty" required> 
                             <div class="help-block with-errors"></div>
                       </div>
                  <div class="form-group col-xs-12 col-md-6 col-lg-6">                      
                       <label class="control-label" for="grade">School Address</label>                       
           			 <textarea rows="2" name="schaddress" id="schaddress" class="form-control"></textarea>
            
            		<div class="help-block with-errors"></div>
       		 	</div>                   
                 </div><!--row-->
                      
                 <div class="form-group"> <label class="control-label" for="school">Student School</label> <input type="text" class="form-control" name="schoolname" id="schoolname" placeholder="Student School" data-error="School cannot be empty" required> <div class="help-block with-errors"></div></div>
                

                 
    <div id="map"></div><br><br>
    

<div id="message"></div>
                      
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal">
               Close
            </button>
           <button type="submit" name="schreg" id="schreg" class="btn btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Adding New Record">Create School</button>
            
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div>
<!-- /.modal2 -->

<!--modal3-->
<div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   
   <div class = "modal-dialog modal-lg">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Edit School Details
            </h4>
         </div>
         
         <div class = "modal-body">
            <div id="display2"></div>
            <div id="message"></div>
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal">
               Close
            </button>
            <button type = "submit" id="editschbut" class = "btn btn-primary">
               Edit Details &nbsp;&nbsp; <i class="fa fa-edit"></i>
            </button>
            
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div>
<!-- /.modal3 -->

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
        <script src="schadminapp.js"></script>
        <script>
     
      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('schoolname');
        var searchBox = new google.maps.places.SearchBox(input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIo-S_P-QNugIvDMuo_XIpzqS9GmL0jAQ&libraries=places&callback=initAutocomplete"
         async defer></script>
        

    </body>

</html>