<?php
	session_start();
	if (!isset($_SESSION['email'])) {
		exit('非法訪問！');
	}
include("top.php");
?>

<!-- Header -->
<header>
  <div class="container">
    <div class="intro-text">
      <div class="intro-lead-in">Welcome To Our Shop!</div>
      <div class="intro-heading">The revolution has arrived!</div>
      <a href="#portfolio" class="page-scroll btn btn-xl"> <span class="glyphicon glyphicon-arrow-down"></span> &nbsp;
      Your Order</a> </div>
  </div>
</header>

<!-- Portfolio Grid Section -->
<section id="portfolio" class="bg-light-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading">訂單頁面</h2>
        <h3 class="section-subheading text-muted">Order page.</h3>
      </div>
    </div>
    <div class="row">
      <?php if (isset($_GET['sub'])){ ?>
      <div class="alert alert-success text-center">
        <button class="close" data-dismiss="alert" type="button">×</button>
        	訂單已提交，且已發送確認E-mail到你的信箱，請注意查收，你可以在一小時内取消訂單
      </div>
      <?php } ?>

      <?php
	   if (isset($_GET['delok']) && isset($_GET['did'])) {
	  ?>
         <div class="alert alert-success text-center">
        <button class="close" data-dismiss="alert" type="button">×</button>
        	<?php echo $_GET['did'];?> 號訂單已取消
        </div>
	<?php
		}
	?>

    <table class="table table-striped">
   <caption style="text-align:center"><strong>所有訂單</strong></caption>
   <thead>
      <tr>
         <th class="text-center">訂單編號</th>
         <th class="text-center">收件人</th>
         <th class="text-center">總價</th>
         <th class="text-center">下訂時間</th>
		 <th class="text-center">取消訂單</th>
      </tr>
   </thead>
   <tbody>
   <?php
	  	include("conn.php");
		$uid = $_SESSION['user_id'];
		$wsql = "select order_id, addressee, total_price, order_time from [dbo].[order]
				where user_id = $uid and is_submit = (1) ";
		$stmt = $dbh->prepare($wsql);
		$stmt->execute();

		while($loop = $stmt->fetch()) {
			$oid = $loop['order_id'];
   		?>
      <tr>
         <td class="text-center"><?php echo $loop['order_id']; ?></td>
         <td class="text-center"><?php echo $loop['addressee']; ?></td>
         <td class="text-center"><?php printf('NT$ %.0f',$loop['total_price']); ?></td>
         <td class="text-center"><?php echo substr($loop['order_time'], 0,16); ?> </td>
         <td class="text-center"><?php echo "<a href='delOrder.php?oid=".$oid."'>取消</a>"; ?></td>
      </tr>
      <?php
	  	}
	  ?>
   </tbody>
</table>
  </div>


  <div class="text-center">
  	<button type="button" name ="comeback"  onClick="location.assign('index.php');" class="btn btn-xl">
		返回首頁
	</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	</div>
</section>

<?php include("bottom.php"); ?>
<!-- Portfolio Modals -->
<!-- Use the modals below to showcase details about your portfolio projects! -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/agency.js"></script>
</body>
</html>
