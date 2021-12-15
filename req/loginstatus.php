<?php
function userCheck()
{
    return (isset($_SESSION['login']) && $_SESSION['login']=true && isset($_SESSION['email']) && isset($_SESSION['password']));
}

if(!userCheck())
    {
		header("Location: ../../index.php");
		exit();
	}

?>