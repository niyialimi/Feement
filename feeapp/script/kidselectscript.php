<?php
require_once('../../req/config.php');
session_start();
$schname=$_POST['schname'];

if(isset ($schname))
{
$stdoutput='';
 $xquery='select std_id,std_lname,std_fname,std_grade,std_sch,std_status from feestudent_table where std_sch="'.$schname.'" and feeclient_id="'.$_SESSION['clientid'].'" ';
 $output=mysqli_query($con,$xquery);
  if(mysqli_num_rows($output))
   {
	   echo "<option>Select</option>";
	   while($rows=mysqli_fetch_array($output))
	   {
									   $_SESSION['sid']=$rows['std_id'];
									   $_SESSION['stdlname']=$rows['std_lname'];
									   $_SESSION['stdfname']=$rows['std_fname'];
									   $_SESSION['stdgrade']=$rows['std_grade'];
									   $_SESSION['stdstatus']=$rows['std_status'];
					
     echo '<option value="'.$_SESSION['sid'].'">'.$_SESSION['stdlname']." ".$_SESSION['stdfname'].'</option>';
                         
                         
							   }
						   }
						   else'';
						   
}


?>