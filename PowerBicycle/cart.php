<?php 
	session_start();
	if (!isset($_SESSION['email'])) {
		exit('非法訪問！');
	}
include("top.php");
	$cnt = 0;
?>

<!-- Header -->
<header style="background-image:url(./img/cart.jpg)">
  <div class="container">
    <div class="intro-text">
      <div class="intro-lead-in">Welcome To Our Shop!</div>
      <div class="intro-heading">The revolution has arrived!</div>
      <a href="#portfolio" class="page-scroll btn btn-xl"> <span class="glyphicon glyphicon-arrow-down"></span> &nbsp;
      Your Cart</a> </div>
  </div>
</header>

<!-- Portfolio Grid Section -->
<section id="portfolio" class="bg-light-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading">購物車頁面</h2>
        <h3 class="section-subheading text-muted">Shopping cart page.</h3>
      </div>
    </div>
    <div class="row">
      <?php if(isset($_GET['ok'])) { ?>
      <div class="alert alert-success text-center">
        <button class="close" data-dismiss="alert" type="button">×</button>
        	商品已加入購物車，你可以 <a href=index.php#portfolio  style='color:blue'>訂購其他商品</a> </div>
      <?php } else if(isset($_GET['del'])) {?>
      <div class="alert alert-info text-center">
        <button class="close" data-dismiss="alert" type="button">×</button>
        	刪除成功！</div>
    </div>
    <?php } ?>
    
    <table class="table table-striped">
   <caption style="text-align:center"><strong>購物清單</strong></caption>
   <thead>
      <tr>
         <th class="text-center">商品名称</th>
         <th class="text-center">單價</th>
         <th class="text-center">訂購數量</th>
         <?php 
			if(isset($_SESSION['orderid'])) {
		 ?>
         	<th class="text-center">   </th>
         <?php } ?>
      </tr>
   </thead>
   <tbody>
   <?php 
   	if(!isset($_SESSION['orderid'])){   ?>
		<div class="alert alert-success text-center">
        <button class="close" data-dismiss="alert" type="button">×</button>
        現在你還沒有訂購任何商品</div>
   <?php
	} else {
	  include("conn.php");
	  	$oid = $_SESSION['orderid'];
		$uid = $_SESSION['user_id'];
		$asql = "select p.name, p.price, p.produce_id, ol.amount from
 				produce p, [OrderList] ol
				where ol.[order_id] = '$oid' and p.[produce_id] = ol.[produce_id]";
		$stmt = $dbh->prepare($asql);
		$stmt->execute();

		while($ru = $stmt->fetch()) {
			$cnt++;
			$pid = $ru['produce_id'];

   ?>
      <tr>
         <td class="text-center"><?php echo $ru["name"] ?></td>
         <td class="text-center"><?php printf('NT$ %.0f', $ru['price']) ?></td>
         <td class="text-center"><?php echo $ru["amount"] ?></td>
         <td class="text-center"><?php echo "<a href='delItem.php?oid=$oid&pid=$pid'>刪除</a>"?></td>
      </tr>
      <?php 	}
	  		}
	  ?>
   </tbody>
</table>
  </div>
  
  <form name="write" id="write" action="writeInfo.php#portfolio" method="get" novalidate>
  <div class="text-center">
  	<button type="button" name ="comeback"  onClick="history.back(-1);" class="btn btn-xl">
		返回
	</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     	<?php if($cnt === 0) { ?>	
     	<button type="submit" name ="tijiao" disabled="disabled" class="btn btn-xl">
			提交
		</button>
		<?php } else { ?>
		<button type="submit" name ="tijiao" value=<?php echo "'".$_SESSION['orderid']."'"?> class="btn btn-xl">
			提交
		</button>
		<?php } ?>
	</div>
	</form>
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