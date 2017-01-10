<?php
    header("Content-Type: text/html; charset=utf8");

	if (!isset($_POST['submit'])) {
		exit('非法訪問！');
	}

	$email =  htmlspecialchars($_POST['email']);
	$password = $_POST['password'];

	include ('conn.php');
	$sql = "select user_id,username,leval from [user] where email='$email' and password='$password'";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	$result = $stmt->fetch();

	if ($result != false) {
		session_start();
		$_SESSION['email'] = $email;
		$_SESSION['user_id'] = $result['user_id'];
		$_SESSION['username'] = $result['username'];
		$_SESSION['leval'] = $result['leval'];
		
		if ($result['leval'] == true){
			header("Location:admin.php");
		} else {
			header("Location:index.php");
		}
	} else {
		$sql2 = "select email from [user] where email='$email'";
		$check = $dbh->prepare($sql2);
		$check->execute();
		$r = $check->fetch();
		
		if ($r == false){
			echo '<script>alert("不存在這個用戶")</script>';
		} else {
			echo '<script>alert("密碼錯誤！")</script>';
		}
		
		echo "<script>history.back(-1);</script>";
	}
?>
