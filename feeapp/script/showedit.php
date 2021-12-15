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
			 $status=$rows['std_status'];if($status==1){$status='Active';$newstatus='Deactivate';}else{$status='Inactive';$newstatus='Activate';}
			 $pics=$rows['std_image'];if($pics==''){$pics='../../assets/faces/avatar5.png';}
			
			echo ' <form id="kidedit-form" action="" enctype="multipart/form-data"  class="kidedit"  method="POST" role="form" data-toggle="validator">
			<div class="table-responsive"><table width="100%" class="table table-bordered table-striped" id="table">
  <tr>
<td width="28%" height="21" rowspan="3" align="center">
	<div id="image_preview"><img id="previewing" src="'.$pics.'" style="width:150px; height:150px; cursor:pointer;" width="150px" height="150px" class="img-thumbnail"/></div>
	
    <input type="file" name="profileImg" name="my_file" id="my_file" style="" />	
</td>
<td width="53%" height="9"><div class="form-group"> <label class="control-label" for="school">Student School</label> <input type="text" class="form-control" name="school" id="school" value="'.$rows['std_sch'].'" placeholder="Student School" data-error="School cannot be empty" required> </td>
</tr>
  <tr>
    <td height="10">
	<label class="control-label" for="grade">Student Grade</label>                       
           			 <select class="form-control form-control-lg" name="stdgrade" id="stdgrade">
						 <option value="'.$rows['std_grade'].'">'.$rows['std_grade'].'</option>
                  	 	  <option value="KG">KG</option>
                          <option value="Nursery 1">Nursery 1</option>
                          <option value="Nursery 2">Nursery 2</option>
                          <option value="Nursery 3">Nursery 3</option>
                          <option value="Primary 1">Primary 1</option>
                          <option value="Primary 2">Primary 2</option>
                          <option value="Primary 3">Primary 3</option>
                          <option value="Primary 4">Primary 4</option>
                          <option value="Primary 5">Primary 5</option>
                          <option value="Primary 6">Primary 6</option>
                          <option value="Junior Secondary School 1">Junior Secondary School 1</option>
                          <option value="Junior Secondary School 2">Junior Secondary School 2</option>
                          <option value="Junior Secondary School 3">Junior Secondary School 3</option>
                          <option value="Senior Secondary School 1">Senior Secondary School 1</option>
                          <option value="Senior Secondary School 2">Senior Secondary School 2</option>
                          <option value="Senior Secondary School 3">Senior Secondary School 3</option>
                  </select>
	</td>
  </tr>
  <tr>
    <td height="21"><input type="hidden" name="realstatus" id="realstatus" value="'.$status.'">Account Status (Status can be changed by clicking the Green button below) &nbsp;&nbsp;&nbsp;<strong>'.$status.'</strong><br><br>
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
                                <div class="form-group"> <label class="control-label" for="lastname">Last Name</label> <input type="text" class="form-control" name="lname" id="lname" placeholder="Student Surname/Lastname" value="'.$rows['std_lname'].'" data-error="Lastname cannot be empty" required> <div class="help-block with-errors"></div></div>
                                <div class="form-group"> <label class="control-label" for="firstname">First Name</label> <input type="text" class="form-control" name="fname" id="fname" value="'.$rows['std_fname'].'" placeholder="Student Firstname" data-error="Firstname cannot be empty" required> <div class="help-block with-errors"></div></div>
                               <div class="form-group"><label class="control-label" for="middlename">Middle Name</label> <input type="text" class="form-control" name="mname" id="mname" value="'.$rows['std_mname'].'" placeholder="Middlename (Optional)"> </div>
	</td>
    <td height="21">'.$rows['reg_date'].'</td>
	<input type="hidden" name="kidid" id="kidid" value="'.$rows['std_id'].'">
	<input type="hidden" name="clientid" id="clientid" value="'.$_SESSION['clientid'].'">
</tr>
</table></div></form>';
			}
		}
		
?>
