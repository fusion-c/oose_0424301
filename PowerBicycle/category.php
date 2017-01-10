<?php
	session_start();
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
        <h2 class="section-heading">分類</h2>
        <h3 class="section-subheading text-muted">category.</h3>
      </div>
    </div>
    <div class="row text-center">
    	<?php 
    		include("conn.php");
			
			$csql = "select [category] from [dbo].[produce]";
			$stmt = $dbh->prepare($csql);
			$stmt->execute();
			
							$shift = 0;
			while($cate = $stmt->fetch()) {
				$shift++;
				$ct =$cate["category"];
    	?>
    		

      	<button type="button" name ="comeback"  onClick=<?php echo "location.assign('show.php?cate=$ct#portfolio');"?> class="btn btn-danger">
		<?php echo $cate["category"];?>
		</button>&nbsp;&nbsp;

		
		<?php 
			if($shift % 5 == 0) {
				echo "<br /><br />";
			}
			} ?>
 	 </div>

<br /><br /><br /><br />
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
