<?php
$db_hostname='localhost';
$db_username='root';
$db_password='';
$db_databasename='fee_payment';

/*$db_sitename='';
$site_title='';
$site_charset='utf-8';
$site_copyrights='©';
$site_keywords='';
$site_description='';

$admin_email='support@.com';*/

$con = @mysqli_connect ($db_hostname, $db_username, $db_password) OR die ('Could not connect to MySQL: ' . mysqli_error($con));
 
@mysqli_select_db ($con,$db_databasename) OR die('Could not select the database: ' . mysqli_error($con) ); 

?>