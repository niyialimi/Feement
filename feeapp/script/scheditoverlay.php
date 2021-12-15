<?php
session_start();
require_once('../../req/config.php');
$id=$_GET['id'];
	$viewquery = "select * from feeschool_table where sch_id='$id'";
	$result=mysqli_query($con,$viewquery);
	if(mysqli_num_rows($result))
		{
			while ($rows = mysqli_fetch_array($result))
			{
			 $status=$rows['school_status'];if($status==1){$status='Active';$newstatus='Deactivate';}else{$status='Inactive';$newstatus='Activate';}
			 //$pics=$rows['std_image'];if($pics==''){$pics='../../assets/faces/avatar5.png';}
			
			echo ' <form id="schedit-form" action="" enctype="multipart/form-data"  class="schedit"  method="POST" role="form" data-toggle="validator">
			<div class="table-responsive"><table width="100%" class="table table-bordered" id="table">
  <tr>
<td width="53%" height="9" colspan="2"><div class="form-group"> <label class="control-label" for="school">Student Name</label> <input type="text" class="form-control" name="school" id="school" value="'.$rows['school_name'].'" placeholder="Student Name" data-error="School cannot be empty" readonly> </div></td>
</tr>
  
  <tr>
    <td height="21" colspan="2"><input type="text" name="realstatus" id="realstatus" value="'.$status.'">Account Status (Status can be changed by clicking the Green button below) &nbsp;&nbsp;&nbsp;<strong>'.$status.'</strong><br><br>
	<div class="btn-group" data-toggle="buttons">
		  <label class="btn btn-primary active"">
			<input type="radio" class="myradio" name="status" id="status" value="'.$status.'" autocomplete="off"> '.$status.'
		  </label>
		<label class="btn btn-primary">
			<input type="radio" class="myradio" name="status" id="status" value="'.$newstatus.'" autocomplete="off"> '.$newstatus.'
		</label>
	 </div>
	</td>
  </tr>
  <tr>
    <td height="21"><strong></strong>
                                <div class="form-group"> <label class="control-label" for="Phone">Phone Number</label> <input type="text" class="form-control" name="schphn" id="schphn" placeholder="School Contact Number" value="'.$rows['school_phone'].'" data-error="Lastname cannot be empty" required> <div class="help-block with-errors"></div></div>
                                <div class="form-group"> <label class="control-label" for="Bank Name">School Bank</label> <input type="text" class="form-control" name="bankname" id="bankname" value="'.$rows['school_bank'].'" placeholder="School Bank Name" data-error="Firstname cannot be empty" required> <div class="help-block with-errors"></div></div>
                               <div class="form-group"><label class="control-label" for="Account Number">Account Number</label> <input type="text" class="form-control" name="acctnum" id="acctnum" value="'.$rows['bank_acct_num'].'" placeholder="Bank Account Number"> </div>
	</td>
    <td height="21"><div class="form-group"> <label class="control-label" for="address">School Address</label><textarea rows="9" class="form-control" name="schaddress" id="schaddress">'.$rows['school_address'].'</textarea></div></td>
	<input type="hidden" name="schid" id="schdid" value="'.$rows['sch_id'].'">
	<input type="hidden" name="clientid" id="clientid" value="'.$_SESSION['clientid'].'">
</tr>
</table></div></form>';
			

			 
			}
		}
		
?>
