<?php
require_once("../../req/config.php");
$cartid=$_GET["cartid"];
$dquery = "delete from cart_table where cart_id='$cartid' ";
 $result = mysqli_query($con,$dquery) or die(mysqli_error($con));
 if($result)
 {
	 echo 'deleted';
 
 }else
 {
	 echo 'not-deleted';
 }
?>