<?php
session_start();
require_once("req/config.php");
//echo $_SESSION['login']." ".$_SESSION['email']." ".$_SESSION['password'];
if($_SESSION['role']=="parent")
{
	header("Location:feeapp/ptapp/apphome.php");
}
else if($_SESSION['role']=="school")
{
	header("Location:feeapp/schapp/apphome.php");
}
else if($_SESSION['role']=="organization")
{
	header("Location:feeapp/orgapp/apphome.php");
}
?>