<!DOCTYPE html>
<?php
//include("conn.php");
	header("Content-Type: text/html; charset=utf8");
?>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Let's go單車配件商店</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Power Bicycle</a>
            </div>
			<!--<?php session_start(); ?>-->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">首頁</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="category.php#portfolio">分類</a>
                    </li>
					<?php
                    	if (isset($_SESSION["email"]) && $_SESSION["email"] != "")
			   	 		{
			    	?>
                    	<li>
                        	<a class="page-scroll" href="cart.php#portfolio">購物車</a>
                    	</li>
                    	<li>
                        	<a class="page-scroll" href="order.php#portfolio">訂單</a>
                    	</li>
                    <?php
                    		if ($_SESSION['leval'] == true) {
                    ?>
			    			<li>
								<a class="page-scroll" href="admin.php">管理頁面</a>
							</li>
					<?php } ?>
			    		<li>
							<a class="page-scroll" href="logout.php">登出</a>
						</li>
			    	<?php
			    			if (isset($_SESSION["username"]) && $_SESSION["username"] != "" && !isset($_SESSION["in"]))
			    			{
								$_SESSION["in"] = 0;
			    				$theName = $_SESSION['username'];
								echo '<script>alert("歡迎 '.$theName.' 的到來！")</script>';
							}
						} else { ?>
                    	<li>
                        	<a class="page-scroll" href="loginAndReg.php">登入 | 注冊</a>
                    	</li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>