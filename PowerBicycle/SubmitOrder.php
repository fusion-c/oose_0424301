<?php
	session_start();
	if (!isset($_SESSION['email']) or !isset($_POST['oid'])) {
		exit('非法訪問！');
	}

	$oid = $_POST['oid'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$addressee = $_POST['user'];
	$total = $_SESSION['total'];

	include("conn.php");
	try{
		$osql = "update [dbo].[order] set phone='".$phone."' ,addressee='".$addressee."' ,
				address = '".$address."' , is_submit = (1), total_price = $total , order_time = getdate()
				where order_id = '".$oid."'";
		$sub  = $dbh->prepare($osql);
	  	$sub->execute();
	} catch(PDOException $e) {
		exit ('資料庫寫入失敗！'.$e->getMessage());
	}

	$username = $_SESSION['username'];
	$themail = "$username 用戶你好。你的 $oid 號訂單已經提交成功。 \n 總價爲：$total 元；收件人爲：$addressee ；
				收件地址是：$address ，請你注意查收。在訂單提交的一個小時内你可以取消訂單";

	require './mail/PHPMailer-master/PHPMailerAutoload.php';
	$mail  = new PHPMailer();

	$mail->CharSet    ="UTF-8";                 //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置为 UTF-8
	$mail->IsSMTP();                            // 设定使用SMTP服务
	$mail->SMTPAuth   = true;                   // 启用 SMTP 验证功能
	$mail->SMTPSecure = "ssl";                  // SMTP 安全协议
	$mail->Host       = "smtp.gmail.com";       // SMTP 服务器
	$mail->Port       = 465;                    // SMTP服务器的端口号
	$mail->Username   = "qq1042399761@gmail.com";  // SMTP服务器用户名
	$mail->Password   = "4672433atm";        // SMTP服务器密码
	$mail->SetFrom('qq1042399761@gmail.com', 'The Let\'sgo shop');    // 设置发件人地址和名称
	$mail->AddReplyTo("qq1042399761@gmail.com", "haolang");

	$mail->Subject    = 'let\'sgo 商店訂單確認郵件';                     // 设置邮件标题
	$mail->AltBody    = "为了查看该邮件，请切换到支持 HTML 的邮件客户端";

	$mail->MsgHTML($themail);                         // 设置邮件内容
	$mail->AddAddress($_SESSION['email'], $_SESSION['username']);

	if(!$mail->Send()) {
	    echo "发送失败：" . $mail->ErrorInfo;
	} else {
	    echo "恭喜，邮件发送成功！";
	}

	unset($_SESSION['orderid']);
	unset($_SESSION['total']);
	echo "<script>location.assign('order.php?sub=1#portfolio')</script>";
?>
