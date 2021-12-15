<?php
session_start();
require_once('../../req/config.php');
$id=$_GET['id'];
$clientid=$_GET['client'];
$dquery = "delete from feeschool_table where sch_id='$id' and feeclient_id='$clientid'";
 $result = mysqli_query($con,$dquery) or die(mysqli_error($con));
 if($result)
 {

	 echo "deleted";
 }else echo "notdeleted";
 //}
?>