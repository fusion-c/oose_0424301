<?php 
	session_start();
	if (!isset($_SESSION['email'])) {
		exit('非法訪問！');
	}
include("top.php");

?>
<script>

window.onload=function(){
	var uset =document.getElementById('user');
    var phone = document.getElementById("phone");
    var address = document.getElementById("address");

}
</script>
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
        <h2 class="section-heading">信息填寫</h2>
        <h3 class="section-subheading text-muted">Fill in.</h3>
      </div>
    </div>
    
    
    <div class="row">
       <table class="table table-striped">
   <caption style="text-align:center"><strong>商品清單</strong></caption>
   <thead>
      <tr>
         <th class="text-center">商品名称</th>
         <th class="text-center">單價</th>
         <th class="text-center">訂購數量</th>
      </tr>
   </thead>
   <tbody>
   <?php
	  include("conn.php");
	  	$sum = 0;
		$am = 0;
		
	  	$oid = $_SESSION['orderid'];
		$uid = $_SESSION['user_id'];
		$asql = "select p.name, p.price, p.produce_id, ol.amount from
 				produce p, [OrderList] ol
				where ol.[order_id] = '$oid' and p.[produce_id] = ol.[produce_id]";
		$stmt = $dbh->prepare($asql);
		$stmt->execute();

		while($ru = $stmt->fetch()) {
			$pid = $ru['produce_id'];
   ?>
      <tr>
         <td class="text-center"><?php echo $ru["name"] ?></td>
         <td class="text-center"><?php printf('NT$ %.0f', $ru['price']) ?></td>
         <td class="text-center"><?php echo $ru["amount"] ?></td>
      </tr>
      <?php 
      	$sum += $ru["amount"] * $ru['price'];
      	$am += $ru["amount"];
      	$_SESSION['total'] = $sum;
      	}
	  ?>
	<tr>
         <td class="text-center"><strong><?php printf("小計(%d 件商品)， 總共：%.0f元", $am, $sum); ?></strong></td>
      </tr>
   </tbody>
	</table>
  </div>
  
    <form name="write" id="write" action="SubmitOrder.php" method="post" novalidate>
    <div class="row">
		<div class="col-lg-8 col-lg-offset-2">
		<strong>*收件人：</strong>
		<input type="text" id="user" name="user" class="form-control" />
								<div class="col-lg-12 text-center">
									<br />
						</div>
		<strong>*聯係電話：</strong>
		<input type="text" id="phone" name="phone" class="form-control"/>
		</div>
						<div class="col-lg-12 text-center">
									<br />
						</div>
		<div class="col-lg-8 col-lg-offset-2">
		<strong>*收件地址：</strong>
		<input type="text" id="address" name="address" class="form-control"/>
		</div>
		<br />
						<div class="col-lg-12 text-center">
									<br />
						</div>
		<div  class="col-lg-8 col-lg-offset-2">
		<strong>*付款方式：</strong>    <div class="btn-group" data-toggle="buttons-radio">
      		<button type="button" class="btn btn-primary">貨到付款</button>
      		<button type="button" class="btn btn-primary">超商取貨/付款</button>
      		<button type="button" class="btn btn-primary">信用卡付款</button>
    		</div>
    	</div >
    </div>
								<p class="help-block text-danger">
									<br />
									<br />
									<br />
								</p>
					
   <div class="row">
  <div class="text-center">
  	<button type="button" name ="comeback"  onClick="history.back(-1);" class="btn btn-xl">
		返回
	</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button type="submit" name ="oid"  value=<?php echo "'".$_SESSION['orderid']."'"?> class="btn btn-xl">
			提交訂單
		</button>
	</div>
	</div>
</form>
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