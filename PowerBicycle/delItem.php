<?php
session_start();
if(!isset($_GET["pid"]) or !isset($_GET["oid"]) or !isset($_SESSION['email']) or !isset($_SESSION['orderid']))
{
	exit('非法訪問！');
}

$pid = $_GET["pid"];
$oid = $_GET["oid"];

$dsql = "delete from [dbo].[OrderList] where order_id='".$oid."' and produce_id = $pid";
try {
	include("conn.php");
	$del = $dbh->prepare($dsql);
	$del->execute();

	echo "<script>location.assign('cart.php?del=1#portfolio')</script>";
} catch(PDOException $e) {
	exit('刪除失敗！' . $e -> getMessage());
}
?>