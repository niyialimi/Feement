<?php
require_once('../../req/config.php');
session_start();
$schid=mysqli_real_escape_string($con,$_POST['schid']);
$clientid=mysqli_real_escape_string($con,$_POST['clientid']);
$_SESSION['clientid'];
$chksql="select * from category_table where feeclient_id='".$clientid."' and sch_id='$schid'";
			$res=mysqli_query($con,$chksql);
			if(mysqli_num_rows($res))
			{
				echo '<div class="row">';
				while($rows=mysqli_fetch_array($res))
				{
					$feelogo=$rows['cat_logo'];
					if($feelogo==''){$feelogo='assets/faces/avatar5.png';}else{$feelogo=$feelogo;}
					 echo '<div class="col-md-2 col-sm-3 col-xs-6" style="margin-top:15px;"> 
							 <div class="cardc">
							 <a href="#" id="feecard" data-id="'.$rows['cat_id'].'" style="font-weight:bold; text-decoration:none;">
							  <img src="../../'.$feelogo.'" alt="Pay Icon" style="width:100%">
							  <div class="container">
								<p align="center">'.$rows['cat_name'].'</p>
							  </div>
							  </a>
							 </div> 
						   </div>  ';
		   
				}
				echo '</div>';
			}
			else
			{
				echo '<div align="center"><strong><span style="color:red">No Payment found for selected School</span></strong></div>';
			}
?>