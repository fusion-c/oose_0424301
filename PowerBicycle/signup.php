<?php
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit'])){
        exit("非法訪問！");
    }

    $name= htmlspecialchars($_POST['username']);
    $email= htmlspecialchars($_POST['email']);
    $password=$_POST['password'];

    include ('conn.php');
    $add="insert into [user](email,username,password) values ('$email','$name','$password')";
    $stmt = $dbh->exec($add);

    if ($stmt){
        echo "<script>alert('注冊成功,你可以用你的Email登入這個賬戶了！')</script>";
		echo "<script>location.assign('loginAndReg.php')</script>";
    }else{
        echo "<script>alert('注冊失敗，這個用戶已以及其email已存在！')</script>";
		echo "<script>location.assign('reg.php')</script>";
    }
?>
