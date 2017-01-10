<?php 
if(!isset($_GET["cate"])) {
	exit("訪問錯誤！");
}
include("top.php");

	$cate = $_GET['cate'];
?>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Our Shop!</div>
                <div class="intro-heading">The revolution has arrived!</div>
                <a href="#portfolio" class="page-scroll btn btn-xl">
                 <span class="glyphicon glyphicon-arrow-down"></span> &nbsp;
                Our Products</a>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo $cate ?></h2>
                    <h3 class="section-subheading text-muted">Latest Products.</h3>
                </div>
            </div>

            <!--
            	作者：fusion_c@foxmail.com
            	时间：2016-05-29
            	描述：展示商品
            -->
            <div class="row">
            <?php
            	include("conn.php");
				$countSql = "SELECT COUNT(*) FROM dbo.produce where category = '$cate'";
				$q = $dbh->query($countSql);
				$rows = $q->fetch();
				$len = $rows[0];
				
				$per = 9;
				$pages = ceil($len/$per);
				
				if (!isset($_GET["page"])){
        			$page=1; 
    			} else {
       				 $page = intval($_GET["page"]);
    			}
				$start = ($page-1)*$per;
				$end = $start + $per;
				
				$psql = "select * from dbo.pagingI($start,$end) where category = '$cate'";
				$stm = $dbh->query($psql);
				
				while($result = $stm->fetch()) {
					$img = explode(';',$result['picture']);
					$pid = $result["produce_id"];
            ?>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href= <?php echo '"#portfolioModal'.$pid.'"'?> class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src= <?php echo '"img/portfolio/'.$img[0].'"'?> class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4> <?php echo $result['name']?> </h4>
                        <p class="text-muted"> <?php printf('NT$ %.0f', $result['price'])?> </p>
                    </div>
                </div>
                <?php
					}
				?>
			<!--
            	展示結束
           -->
            </div>
        </div>
    </section>


	<div class="text-center">
    <?php
    	echo '<ul class="pagination pagination-lg">';
		echo '<li><a href=?page=1#portfolio>&laquo;</a></li>';
		for( $i=1 ; $i <= $pages ; $i++ ) {
            echo "<li><a href=?page=".$i."#portfolio>".$i."</a></li>";
        }
		
		echo "<li><a href=?page=$pages#portfolio>&raquo;</a></li>\n</ul>\n";
    ?>
    </div>
<!-- 分頁 -->
    
    <!-- Portfolio Modal 1 -->
    <?php 
		$tsql = "select * from dbo.pagingAll($start,$end) where category = '$cate'";
		$stmt = $dbh->query($tsql);
		while($result = $stmt->fetch()) {
			$img = explode(';',$result['picture']);
			$pid = $result["produce_id"];
	?>
    <div class="portfolio-modal modal fade" id=<?php echo '"portfolioModal'.$pid.'"'?> tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2><?php echo $result['name']?></h2>
                            <p class="item-intro text-muted"><?php printf('NT$ %.0f', $result['price'])?></p>
                            <img class="img-responsive img-centered" src=<?php echo '"img/portfolio/'.$img[0].'"'?> alt="">
                            <p><?php echo $result['introduction']?></p>
                            
                            <form name="addCart" id="addCart" action=<?php echo '"addCart.php?pid='.$pid.'"'?> method="get" novalidate>
                            <p><div style="text-align:center">
         						數量：&nbsp;<input id="amount" name="amount"  type="text" width="10" value="1" placeholder="請輸入訂購數">
      						</div></p>
                            <ul class="list-inline"> 
                                <li>上架時間：<?php echo substr($result['added_time'],0,16)?>&nbsp;</li>
                                <li>價格：<?php printf('NT$ %.0f', $result['price'])?>&nbsp;</li>
                                <li>分類：<?php echo $result['category']?></li>
                            </ul>
							<?php 
									if(isset($_SESSION["email"]) && $_SESSION["email"] != "") {
							?>
                          <button type="submit" name ="pid" value=<?php echo $pid?> class="btn btn-primary">
                             	<span class="glyphicon glyphicon-shopping-cart"></span>
                               	加入購物車</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             <?php }?>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i>　關閉　</button>
                        </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
	
		}
	?>

    
    
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
