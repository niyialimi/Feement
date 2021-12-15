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
        <title> FeeApp Client Page </title>
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
                                <li class="active">
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
                <?php if($_SESSION['acctstatus']==0){echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-minus-sign pull-left"></span>&nbsp;&nbsp;Your Account is Inactive please Check your Mail to activate; Inactive account do not have access to Full functionality</div>';} ?>
                <div></div>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col col-xs-12 col-sm-12 col-md-6 col-xl-5 stats-col">
                                <div class="card sameheight-item stats" data-exclude="xs">
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h4 class="title"> Account Analysis </h4>
                                            <!--p class="title-description">  <a href=""></a> </p-->
                                        </div>
                                        <div class="row row-sm stats-container">
                                            <div class="col-xs-12 col-sm-6 stat-col">
                                                <div class="stat-icon"> <i class="fa fa-users"></i> </div>
                                                <div class="stat">
                                                    <div class="value">
													<?php
													  $xquery="select count(*) as total from feestudent_table where feeclient_id='".$_SESSION['clientid']."'";
													  $output=mysqli_query($con,$xquery);
													   if(mysqli_num_rows($output))
													   {
														   while($rows=mysqli_fetch_assoc($output))
														   {
															   $total=$rows['total'];
															   echo $total;
														   }
													   }
													  ?>
                                                     </div>
                                                    <div class="name"> Kids Registered </div>
                                                </div> <progress class="progress stat-progress" value="100" max="100">
            					<div class="progress">
            						<span class="progress-bar" style="width: 100%;"></span>
            					</div>
            				</progress> </div>
                                            <div class="col-xs-12 col-sm-6 stat-col">
                                                <div class="stat-icon"> <i class="fa fa-money"></i> </div>
                                                <div class="stat">
                                                    <div class="value"> 
                                             <?php
											$xquery="select count(*) as total from transact_table where feeclient_id='".$_SESSION['clientid']."'";
											  $output=mysqli_query($con,$xquery);
											   if(mysqli_num_rows($output))
											   {
												   while($rows=mysqli_fetch_assoc($output))
												   {
													   $total=$rows['total'];
													   echo $total;
												   }
											   }
											  ?>
                                                     </div>
                                                    <div class="name"> Transactions Made </div>
                                                </div> <progress class="progress stat-progress" value="100" max="100">
            					<div class="progress">
            						<span class="progress-bar" style="width: 100%;"></span>
            					</div>
            				</progress> </div>
                                            <div class="col-xs-12 col-sm-6  stat-col">
                                                <div class="stat-icon"> <i class="fa fa-credit-card"></i> </div>
                                                <div class="stat">
                                                    <div class="value"> &#8358;
                                             <?php
										  $xquery="select sum(amount_paid) as total from cart_table where feeclient_id='".$_SESSION['clientid']."' and cart_status=1";
										  $output=mysqli_query($con,$xquery);
										   if(mysqli_num_rows($output))
										   {
											   while($rows=mysqli_fetch_assoc($output))
											   {
												   $total=$rows['total'];
												   echo $total;
											   }
										   }
										  ?>
                                                     </div>
                                                    <div class="name"> Paid In Total </div>
                                                </div> <progress class="progress stat-progress" value="100" max="100">
            					<div class="progress">
            						<span class="progress-bar" style="width: 100%;"></span>
            					</div>
            				</progress> </div>
                                            <div class="col-xs-12 col-sm-6  stat-col">
                                                <div class="stat-icon"> <i class="fa fa-comment"></i> </div>
                                                <div class="stat">
                                                    <div class="value"> X </div>
                                                    <div class="name"> Message In Inbox </div>
                                                </div> <progress class="progress stat-progress" value="100" max="100">
            					<div class="progress">
            						<span class="progress-bar" style="width: 100%;"></span>
            					</div>
            				</progress> </div>
                                            <div class="col-xs-12 col-sm-6  stat-col">
                                                <div class="stat-icon"> <i class="fa fa-list-alt"></i> </div>
                                                <div class="stat">
                                                    <div class="value"> X
                                                    <!--?php
													
										$clselect="select (count(distinct std_sch)) as total from feestudent_table where feeclient_id='".$_SESSION['clientid']."' GROUP BY std_sch";
									$result=mysqli_query($con,$clselect);
									if(mysqli_num_rows($result))
									{
										while($rows=mysqli_fetch_array($result))
										{
											echo $total=$rows['total'];
										}
									}
													?-->
                                                     </div>
                                                    <div class="name"> People Invited </div>
                                                </div> <progress class="progress stat-progress" value="100" max="100">
            					<div class="progress">
            						<span class="progress-bar" style="width: 100%;"></span>
            					</div>
            				</progress> </div>
                                            <div class="col-xs-12 col-sm-6 stat-col">
                                                <div class="stat-icon"> <i class="fa fa-dollar"></i> </div>
                                                <div class="stat">
                                                    <div class="value"> &#8358; 
                                                <?php
										  $xquery="select amount_paid from cart_table where feeclient_id='".$_SESSION['clientid']."' and cart_status=1 order by cart_id desc limit 1";
										  $output=mysqli_query($con,$xquery);
										   if(mysqli_num_rows($output))
										   {
											   while($rows=mysqli_fetch_assoc($output))
											   {
												   $total=$rows['amount_paid'];
												   echo $total;
											   }
										   }
										  ?>
                                                    </div>
                                                    <div class="name"> Last Payment Made </div>
                                                </div> <progress class="progress stat-progress" value="100" max="100">
            					<div class="progress">
            						<span class="progress-bar" style="width: 100%;"></span>
            					</div>
            				</progress> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-xs-12 col-sm-12 col-md-6 col-xl-7 history-col">
                                <div class="card sameheight-item" data-exclude="xs">
                                    <div class="card-header card-header-sm bordered">
                                        <div class="header-block">
                                            <h3 class="title">Last Few Transactions</h3>                                            
                                        </div>
                                        <div class="header-block pull-right"> <a href="payment.php" class="btn btn-primary btn-sm rounded pull-right">
                            New Payment
                        </a> </div>
                                       
                                    </div>
                                    <div class="card-block table-responsive">
                                    
                                    	<table width="100%" class="table table-hover" id="myTable" >
                                        <thead class="thead-default">
                                        <tr>
                                            <th class="text-center">Transaction Number</th>
                                            <th class="text-center">Student Name</th>
                                            <th class="text-center">Pay Item</th>
                                            <th class="text-center">Amount Paid (&#8358;)</th>
                                            <th class="text-center">Pay Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <?php
										$max_char 	= 20;
										//echo substr($text, 0, $max_char) . '...';
									   $sn=1;
									   $newquery="select cart_table.*,transact_table.* from cart_table inner join transact_table on cart_table.feeclient_id=transact_table.feeclient_id and cart_table.student_id=transact_table.std_id where cart_table.feeclient_id='".$_SESSION['clientid']."' and cart_table.student_id group by transact_table.tr_id limit 5";
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
												//$selstd="select std_fname, std_lname from feestudent_table";
												
									  ?>
									  
										<tr>
											<td align="center"><?php echo $_SESSION['trnum']; ?></td>
											<td align="center"><?php echo $_SESSION['stdid']; ?></td>  
											<td align="center"><?php echo $_SESSION['paymentfor']; ?></td> 
											<td align="center"><?php echo $_SESSION['feepaid']; ?></td> 
											<td align="center"><?php echo $_SESSION['paydate']; ?></td> 
											
										</tr>
										<?php
										   }
									   }
										?>						
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    <section class="section map-tasks">
                        <div class="row sameheight-container">
                            <div class="col-md-8">
                                <div class="card sameheight-item" data-exclude="xs,sm">
                                    <div class="card-header">
                                        <div class="header-block">
                                            <h4 class="title"> Latest Discussion Board Update </h4>
                                        </div>
                                         <div class="header-block pull-right"> <a href="forum.php" class="btn btn-primary btn-sm rounded pull-right">
                            View All
                        </a> </div>
                                    </div>
                                    <div class="card-block">
                                        <!--div id="dashboard-sales-map" style="width: 100%; height: 400px;"></div-->
                                <?php
								require_once('../../req/config.php');
								//$forumselect="select * from forum_table limit 2";
								$forumselect="select forum_table.*,feeclient_table.feeclient_lname,feeclient_table.feeclient_fname from forum_table inner join feeclient_table limit 2";
																	$rt=mysqli_query($con,$forumselect);
																	if(mysqli_num_rows($rt))
																	{
																		while($row=mysqli_fetch_array($rt))
																			{
																				echo '<div id="forumbox">
																				<div id="forumcontent"><img src="../../assets/faces/avatar51.png" width="50" height="50" class="img-circle"><span><strong>'.$row['feeclient_lname']." ".$row['feeclient_fname'].'  |   <i class="fa fa-pencil-square-o"></i>  '.$row['post_time'].'</strong></span><p><font class="posttitle">'.$row['topic'].'</font><br><font class="postcontent">'.$row['content'].'</font></p></div></div>';
																			}
																	}
								?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card tasks sameheight-item" data-exclude="xs,sm">
                                    <div class="card-header bordered">
                                        <div class="header-block">
                                            <h3 class="title"> Tasks </h3>
                                        </div>
                                        <div class="header-block pull-right"> <a href="" class="btn btn-primary btn-sm rounded pull-right">
                            Add new
                        </a> </div>
                                    </div>
                                    <div class="card-block">content here</div>
                                </div>
                            </div>
                        </div>
                    </section>
                </article>
                <footer class="footer">                    
                    <div class="footer-block author">
                        <ul>
                          <li>School Payment App by <a href="http://feement.com" target="_blank"><strong><?php echo $_SESSION['companyname']; ?></strong></a> </li>
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
        
    </body>

</html>