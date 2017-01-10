<?php include("top.php")
?>
<script>

window.onload=function(){
    var oTxt=document.getElementById('email');
    var pwd = document.getElementById("password");
    var pwd2 = document.getElementById("password2");
    
    oTxt.onblur=function() {
        var email=oTxt.value.replace(/^\s+|\s+$/g,"").toLowerCase();
        var reg=/^[a-z0-9](\w|\.|-)*@([a-z0-9]+-?[a-z0-9]+\.){1,3}[a-z]{2,4}$/i;
 
        if (email.match(reg)==null && oTxt.value != "") {
            alert("請輸入有效的Email地址!");
			oTxt.focus();
        };
    }
    
    pwd2.onblur = function() {
    	if (pwd.value != "" && pwd2.value != "") {
    		if(pwd.value != pwd2.value){
    			
    			alert("前後密碼不一致，請重新輸入!");
    			pwd2.focus();
    			
    		}
    	}
    }
    pwd.onblur = function() {
    	if (pwd.value != "" && pwd2.value != "") {
    		if(pwd.value != pwd2.value){
    			alert("前後密碼不一致，請重新輸入!");
    			pwd.focus();
    		}
    	}
    }
    
}

</script>

<!-- Contact Section -->
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2 class="section-heading">
					Register page
				</h2>
				<h3 class="section-subheading text-muted">
					請填寫下面帶 * 號的信息，以注冊賬戶
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<form name="userRegister" id="contactForm" action="signup.php"  method="post" novalidate>
					<div class="row">
						<div class="col-md-3">
						</div>
						<div class="col-md-6 text-center">
							<div class="form-group">
								<input name="username" type="text" class="form-control" placeholder="Your Name *" id="username" required data-validation-required-message="Please enter your name.">
								<p class="help-block text-danger">
								</p>
							</div>
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
							<div class="form-group">
								<input name="password2" type="password" class="form-control" placeholder="Confirm Password *" id="password2" required data-validation-required-message="Please enter your password again.">
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
								注冊
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php
include ("bottom.php");
?>