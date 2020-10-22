<?php require('header.php') ?>
<!--customer Form-->

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100 p-l-35 p-r-35 p-t-65 p-b-50">
      <span class="login100-form-title p-b-33">
						User Registration
			</span>
      <form class="form-horizontal" method='post' action="" enctype="multipart/form-data" id="customer_form">
            <!--======================================================================================================================================-->
            <div class="form-group">
              <label class="control-label col-sm-3 txt1" for="customer-name">Name *</label>
              <div class="col-sm-9">
                <div class="input-group">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </div>
                <input type="text" class="form-control" id="customer-name" name="name" placeholder="Please enter Name" required>
              </div>
              </div>
            </div>
            <!--======================================================================================================================================-->
            <div class="form-group">
              <label class="control-label col-sm-3 txt1" for="customer-email">Email *</label>
              <div class="col-sm-9">
                <div class="input-group">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-envelope"></span>
                </div>
                <input type="email" class="form-control" id="customer-email" name="email" placeholder="Please enter email" required>
              </div>
              </div>
            </div>
            <!--======================================================================================================================================-->
            <div class="form-group">
              <label class="control-label col-sm-3 txt1" for="customer-pwd">Password *</label>
              <div class="col-sm-9">
                <div class="input-group">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-lock"></span>
                </div>
                <input type="password" class="form-control" id="customer-pwd" placeholder="Enter password" minlength="6" maxlength="12" required>
              </div>
              </div>
            </div>
            <!--======================================================================================================================================-->
            <div class="form-group">
              <label class="control-label col-sm-3 txt1" for="confirm-customer-pwd">Confirm Password *</label>
              <div class="col-sm-9">
                <div class="input-group">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-lock"></span>
                </div>
                <input type="password" class="form-control" id="confirm-customer-pwd" name="password" placeholder="Confirm password" minlength="6" maxlength="12" required>
              </div>
              </div>
            </div>
            <!--======================================================================================================================================-->
            <div class="form-group">
              <label class="control-label col-sm-3 txt1" for="customer-address">Address</label>
              <div class="col-sm-9">
                <div class="input-group">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-home"></span>
                </div>
                <input type="text" class="form-control" id="customer-address" name="address" placeholder="Address">
              </div>
              </div>
            </div>
            <!--======================================================================================================================================-->

            <div class="form-group ">
            <label class="control-label col-sm-3 txt1 requiredField" for="date">DOB </label>
            <div class="col-sm-9">
              <div class="input-group">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </div>
              <input type="text" class="form-control" id="customer-dob" name="customer-dob" placeholder="MM/DD/YYYY" />
              </div>
            </div>
            </div>
            <!--======================================================================================================================================-->

            <div class="form-group">
              <label class="control-label col-sm-3 txt1" for="customer-phone">Phone </label>
              <div class="col-sm-9">
                <div class="input-group">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-earphone"></span>
                </div>
                <input type="number" class="form-control" id="customer-phone" name="phone" placeholder="Phone Number" maxlength="10">
              </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
              <input type="submit" value="Register" class="btn btn-success btn-lg btn-block">
                  <!--<button type="submit" class="btn btn-success">Register  <span class="glyphicon glyphicon-arrow-right"></span></button> -->
              </div>
            </div>
          </form>
          <div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Already have account ?
						</span>

						<a href="login.php" class="txt2 hov1">
							Sign In
						</a>
					</div>
				
		</div>
	</div>
</div>


   

<script>
  $(document).ready(function() {
  $('#customer_form').submit(function(e) {
    e.preventDefault();
    console.log($(this).serialize());
    $.ajax({
      type: "POST",
      url: 'http://127.0.0.1/ibanking/controller/register.php',
      data: $(this).serialize(),
      success: function(response)
      {       
          if (response == true) {
            alert("data added successsfully");
            window.location = 'login.php';
          }
          else {
            alert(response);
          }
      }
  });
});
});
  
</script>

<?php require('footer.php') ?>
