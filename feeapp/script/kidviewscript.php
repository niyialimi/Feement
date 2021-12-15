<?php
session_start();
require_once('../../req/config.php');
$id=$_GET['id'];
	$viewquery = "select * from feestudent_table where std_id='$id'";
	$result=mysqli_query($con,$viewquery);
	if(mysqli_num_rows($result))
		{
			while ($rows = mysqli_fetch_array($result))
			{
			 $status=$rows['std_status'];if($status==1){$status='Active';}else{$status='Inactive';}
			 $pics=$rows['std_image'];if($pics==''){$pics='../../assets/faces/avatar5.png';}
			
			echo '<table width="69%" class="table table-responsive table-bordered table-striped" id="table">
  <tr>
<td width="28%" height="21" rowspan="3">
<img class="img-thumbnail" width="200px" height="200px" src="'.$pics.'">
</td>
<td width="19%">Kid School</td>
<td width="53%" height="9">'.$rows['std_sch'].$id.'</td>
</tr>
  <tr>
    <td>Kid Grade</td>
    <td height="10">'.$rows['std_grade'].'</td>
  </tr>
  <tr>
    <td>Kid Status</td>
    <td height="21">'.$status.'</td>
  </tr>
  <tr>
    <td height="21"><strong>'.$rows['std_lname']." ".$rows['std_fname']." ".$rows['std_mname'].'</strong></td>
    <td>Registrastion Date</td>
    <td height="21">'.$rows['reg_date'].'</td>
</tr>
</table>';
			//echo $fullname;	
			
			 
			}
		}
		
?>