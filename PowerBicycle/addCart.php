<?php
	session_start();
	if(!isset($_GET['pid']) or !isset($_SESSION['email'])){
		exit('非法訪問！');
	}
	$amount = $_GET['amount'];
	$pid = $_GET['pid'];
	$uid = $_SESSION['user_id'];
	
	include("conn.php");
	if (!isset($_SESSION['orderid'])){

	  $oid= date('ymd').substr(time(),-5).substr(microtime(),2,5);
	  
	  $_SESSION['orderid']=$oid;
	  $xsql = "insert into [dbo].[order](order_id, user_id) values('".$oid."', $uid) ";
	  $ysql = "insert into [dbo].[OrderList](order_id, produce_id, amount) values('".$oid."', $pid, $amount)";
		try {
	  		$input = $dbh->prepare($xsql);
	  		$input->execute();
	  		$put = $dbh->prepare($ysql);
	  		$put->execute();
		} catch(PDOException $e){
			unset($_SESSION['orderid']);
			exit ('資料庫寫入失敗！'.$e->getMessage());
		}
	
	} else {
		$ssql = "update [dbo].[OrderList] set amount=amount+$amount where order_id='".$_SESSION['orderid']."' and produce_id=$pid";
		$update  = $dbh->exec($ssql);
		if($update === 0) {
			$xsql = "insert into [dbo].[OrderList](order_id, produce_id, amount) values('".$_SESSION['orderid']."',$pid,$amount)";
			try {
		  		$input = $dbh->prepare($xsql);
				$input->execute();
			} catch(PDOException $e){
				exit ('資料庫寫入失敗！'.$e->getMessage());
			}
		}
	}

	echo "<script>location.assign('cart.php?ok=1#portfolio')</script>"
?>