<?php require('header.php') ?>
<?php include 'controller/login.php' ?>
<script>
  $(document).ready(function() {
  $('#login-form').submit(function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: '/udw/controller/login.php',
      data: $(this).serialize(),
      success: function(data)
      {
          console.log(data)
          if (data == true) {
            window.location = 'index.php';
          }
          else {
            alert('Invalid Credentials');
            console.log(data);
          }
      }
  });
});
});
  
</script>

    <div class="container login-form">
      <div class="jumbotron col-sm-6">
        <form class="form-horizontal" method='post' action="" enctype="multipart/form-data" id="login-form">
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email" placeholder="Please enter email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="pwd" name="password" placeholder="Please enter password">
            </div>
          </div>
          <div class="radio">
            <label class="radio-inline"><input type="radio" name="type" value="student"checked>Student</label>
            <label class="radio-inline"><input type="radio" name="type" value="staff">Staff</label>
            <br><br>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input class="btn btn-success" type="submit" value="Login">
            </div>
          </div>
        </form>
      </div>
    </div>

<?php require('footer.php') ?>
