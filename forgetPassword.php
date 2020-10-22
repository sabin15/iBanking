<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
      if(isset($_SESSION['logged']) && $_SESSION['logged']){
        header("Location:dashboard.php");
      }
  } 
  
?>
<?php require('header.php') ?>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" method='post' action="#" enctype="multipart/form-data" id="login-form">
					<span class="login100-form-title p-b-33">
						Reset Password
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="text-center">
						<span class="auth_failure" id="auth_failure_txt">
							
						</span>
					</div>
          

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Reset Password
						</button>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Remember password ?
						</span>

						<a href="login.php" class="txt2 hov1">
							Sign In
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
  <?php require('footer.php') ?>