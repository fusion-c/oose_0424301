<?php include("top.php")
?>
<!-- Contact Section -->
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2 class="section-heading">
					Login page
				</h2>
				<h3 class="section-subheading text-muted">
					請輸入你的郵箱地址與密碼。
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<form name="userlogin" id="contactForm" action="login.php"  method="post" novalidate>
					<div class="row">
						<div class="col-md-3">
						</div>
						<div class="col-md-6 text-center">
							<div class="form-group">
								<input name="email" type="text" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
								<p class="help-block text-danger">
								</p>
							</div>
							<div class="form-group">
								<input name="password" type="password" class="form-control" placeholder="Your Password *" id="password" required data-validation-required-message="Please enter your password.">
								<p class="help-block text-danger">
								</p>
							</div>
						</div>
						<div class="clearfix">
						</div>
						<div class="col-lg-12 text-center">
							<div id="success">
							</div>
							<button type="submit" name ="submit" class="btn btn-xl">
								OK
							</button>
						</div>
					</div>
				</form>
				<div class="col-lg-12 text-center">
					<br />
					<h3 class="text-muted">
						什麽，沒有賬號！那就注冊一個吧。
					</h3>
					<button type="submit" onclick="location.href='reg.php';" class="btn btn-xl">
						去注冊
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
include ("bottom.php");
?>