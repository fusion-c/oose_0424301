<?php
session_start();
if(!isset($_GET["oid"]) or !isset($_SESSION['email']))
{
	exit('非法訪問！');
}

$oid = $_GET['oid'];

$delsql = "delete from [dbo].[order] where order_id='$oid'";
try {
	include("conn.php");
	$del = $dbh->prepare($delsql);
	$del->execute();

	echo "<script>location.assign('order.php?did=$oid&delok=1#portfolio')</script>";
} catch(PDOException $e) {
	exit('刪除失敗！' . $e -> getMessage());
}
?>