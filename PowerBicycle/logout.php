<?php
session_start();

if(isset($_SESSION['email']))
{
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
	unset($_SESSION['email']);
	unset($_SESSION['leval']);
	unset($_SESSION['in']);
	unset($_SESSION['orderid']);
	//unset($_POST['submit']);
    echo '<script>alert("登出成功!")</script>';
	echo '<script>location.assign("index.php")</script>';
}

?>