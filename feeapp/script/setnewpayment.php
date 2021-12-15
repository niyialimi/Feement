<?php
require_once('../../req/config.php');
session_start();
$schname=mysqli_real_escape_string($con,$_POST['schname']);
$selsch="select sch_id from feeschool_table where school_name='$schname'";
$rs=mysqli_query($con,$selsch);
if(mysqli_num_rows($rs))
{
	while($rows=mysqli_fetch_array($rs))
		{
			$_SESSION['schid']=$rows['sch_id'];
		}
//$clientid=mysqli_real_escape_string($con,$_POST['clientid']);
$schid=$_SESSION['schid'];
$_SESSION['clientid'];
$chksql="select * from category_table where sch_id='$schid'";
			$res=mysqli_query($con,$chksql);
			if(mysqli_num_rows($res))
			{
				echo "<option>Select</option>";
				while($rows=mysqli_fetch_array($res))
				{
					$_SESSION['catname']=$rows['cat_name'];
					$_SESSION['catid']=$rows['cat_id'];
					echo '<option value="'.$_SESSION['catid'].'">'.$_SESSION['catname'].$_SESSION['catid'].'</option>';
		   
				}
				
			}
			else
			{
				echo '<div align="center"><strong><span style="color:red">No Payment found for selected School</span></strong></div>';
			}
}else
{
	echo '<div align="center"><strong><span style="color:red">No Payment found for selected School</span></strong></div>';
}
?>