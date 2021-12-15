<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');

?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> FeeApp Add New School </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
       	<link rel="icon" type="image/png" href="../../assets/favicon.png">
        <link rel="stylesheet" href="../../css/feevendor.css">
        <link rel="stylesheet" href="../../css/app-css.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <style>
      
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
                    <?php 
								$chkpr="select feeclient_id,feeclient_acctstatus,feeclient_fname from feeclient_table where feeclient_email='".$_GET['email']."' and feeclient_role='".$_GET['crole']."'";
								$chkres=mysqli_query($con,$chkpr);
								if(mysqli_num_rows($chkres))
								{
									while($rows=mysqli_fetch_array($chkres))
									{
										$_SESSION['feeclientid']=$rows['feeclient_id'];
										$_SESSION['fname']=$rows['feeclient_fname'];
										$_SESSION['acctstatus']=$rows['feeclient_acctstatus'];
									}
								}
							?>
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
                                    <a href="logout.php"> <i class="fa fa-power-off"></i> Logout</a>
                                    
                                </li>
                               
                            </ul>
                        </nav>
                    </div>
                    </div>
                </aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <article class="content dashboard-page">
                <div class="alert alert-info" role="alert">
                  An Email Has Been sent to your Mail, Please Check Your Mail to Activate your Account
                </div>
                <?php if($_SESSION['acctstatus']==0){echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-minus-sign pull-left"></span>&nbsp;&nbsp;Your Account is Inactive, Please Confrim Your E-mail to Complete your Registration; Inactive account do not have access to Full functionality</div>';}?>
                <div></div>
                    <section class="section">
                        <div class="row sameheight-container"></div>
                        <div class="card card-block sameheight-item">
                            <div class="title-block">
                                <h1 class="title" align="center"><i class="fa fa-university"></i>   Add New School </h1>
                            </div>
                            
    <form id="schreg-form" action=""enctype="multipart/form-data"  class="schsigup"  method="POST" role="form" data-toggle="validator">
    <input type="hidden" name="clientid" id="clientid" value="<?php echo $_SESSION['feeclientid']; ?>">
                                <div class="form-group"> <label class="control-label" for="schname">Registered Email</label> <input type="text" class="form-control" name="email" id="email" value="<?php echo $_GET['email']; ?>" readonly> <div class="help-block with-errors"></div></div>
                                
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
                       <!--div class="row">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">                      
                       <label class="control-label" for="grade">Student Grade</label>                       
           			 <textarea rows="2" class="form-control"></textarea>
            
            		<div class="help-block with-errors"></div>
         		 </div>                   
                 
                   <div class="form-group col-xs-12 col-md-6 col-lg-6">
                       <label class="control-label" for="studentid">Student ID</label>                  
                    <input type="text" name="stdidty" id="stdidty" class="form-control" placeholder="Student ID (Optional)">
                   <div class="help-block with-errors"></div>
                  </div>
                  
                 </div> <!-- /.row -->  
                 
                 <div class="form-group"> <label class="control-label" for="school">Student School</label> <input type="text" class="form-control" name="schoolname" id="schoolname" placeholder="Student School" data-error="School cannot be empty" required> <div class="help-block with-errors"></div></div>
                

                 
    <div id="map"></div><br><br>
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

<div id="message"></div>
                          <div class="form-group" align="center"> <button type="submit" name="schreg" id="schreg" class="btn btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Adding New Record">Create School</button> </div>     
   </form>
                        </div>
                    </section>
                    <!--?php }?-->
                    
                    
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
        <script src="schadminapp.js"></script>
        
        

    </body>

</html>