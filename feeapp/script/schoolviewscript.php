<?php
session_start();
require_once('../../req/config.php');
$id=$_GET['id'];
$clientid=$_GET['client'];
	$viewquery = "select * from feeschool_table where sch_id='$id' and feeclient_id='$clientid'";
	$result=mysqli_query($con,$viewquery);
	if(mysqli_num_rows($result))
		{
			while ($rows = mysqli_fetch_array($result))
			{
			 $status=$rows['school_status'];if($status==1){$status='Active';}else{$status='Inactive';}
			 //$pics=$rows['std_image'];if($pics==''){$pics='../../assets/faces/avatar5.png';}
			
			echo '<table width="69%" class="table table-responsive table-bordered table-striped" id="table">
  <tr>
<td width="19%">School Name</td>
<td width="53%" height="21">'.$rows['school_name'].'</td>
</tr>
  <tr>
    <td>School Phone</td>
    <td height="10">'.$rows['school_phone'].'</td>
  </tr>
  <tr>
    <td>School Address</td>
    <td height="21">'.$rows['school_address'].'</td>
  </tr>
  <tr>
    <td>School Status</td>
    <td height="21">'.$status.'</td>
  </tr>
  <tr>
    <td>Registrastion Date</td>
    <td height="21">'.$rows['reg_date'].'</td>
  </tr>
  <tr align="center">
    <td height="21" colspan="2">Account Details</td>
  </tr>
  <tr>
    <td>Bank Name</td>
    <td height="21">'.$rows['school_bank'].'</td>
  </tr>
  <tr>
    <td>Acoount Name</td>
    <td height="21">'.$rows['school_name'].'</td>
  </tr>
  <tr>
    <td>Account Number</td>
    <td height="21">'.$rows['bank_acct_num'].'</td>
  </tr>
</table>';
			//echo $fullname;	
			
			 
			}
		}
		
?>