<?php
    if(!isset($_SESSION)) 
    { 
        session_start();
        if(!isset($_SESSION['username'])){
          header("Location:http://127.0.0.1/ibanking/login.php");
        }         
      
    } 
?>
<?php require('main_header.php') ?>
<?php require('main_nav.php') ?>
    
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Payment</li>
                    </ol>
                </nav>
                
                <div class="row my-4">
                    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Debit Card</h5>
                            <div class="card-body">
                              <h4 class="card-title">$5,040.23</h4>
                              <p class="card-text">5467 6656 4896</p>
                              <p class="card-text text-success">04/24</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Credit Card</h5>
                            <div class="card-body">
                              <h4 class="card-title">$5,040.23</h4>
                              <p class="card-text">5467 6656 4896</p>
                              <p class="card-text text-success">04/24</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Corporate Card</h5>
                            <div class="card-body">
                              <h4 class="card-title">$5,040.23</h4>
                              <p class="card-text">5467 6656 4896</p>
                              <p class="card-text text-success">04/24</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Master Card</h5>
                            <div class="card-body">
                              <h4 class="card-title">$5,040.23</h4>
                              <p class="card-text">5467 6656 4896</p>
                              <p class="card-text text-success">04/24</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Fund Transfer</h5>
                            <div class="card-body">
                            <form class="form-horizontal" method='post' action="#" enctype="multipart/form-data" id="payment_form">

                                <div class="form-group">
                                    <div class="row">
                                        
                                        <div class="col-md-2">
                                            <h6 class="payment_txt">SENDER DETAILS</h6>
                                        </div>
                                        <div class="col-md-9">
                                            <hr>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row p-t-5 p-b-5">
                                        <div class="col-md-2">
                                            <label for="account_number"> Account Number </label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="sender_account_number" value="<?php echo $_SESSION['account_number'];?>" readonly="readonly" />
                                        </div>

                                        <div class="col-md-1">                                        
                                        </div>

                                        <div class="col-md-2">
                                            <label for="account_number"> Transaction Amount </label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="transaction_amount">
                                        </div>
                                        <br><br><br><br><br>
                                    </div>

                                <div class="form-group">
                                    <div class="row">
                                        <br><br>
                                        <div class="col-md-2">
                                            <h6 class="payment_txt">BENEFICIARY DETAILS</h6>
                                        </div>
                                        <div class="col-md-9">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row p-t-5 p-b-5">
                                        <div class="col-md-2">
                                            <label for="account_number"> Account Number </label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="beneficiary_acount_number">
                                        </div>

                                        <div class="col-md-1">                                        
                                        </div>

                                        <div class="col-md-2">
                                            <label for="account_number"> Account Name </label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="beneficiary_account_name">
                                        </div>
                                    </div>
                                    <div class="row p-t-5 p-b-5">
                                        <div class="col-md-2">
                                            <label for="Beneficiary_bank"> Bank Name </label>
                                        </div>

                                        <div class="col-md-3">
                                            <select class="form-control beneficiary_bank_name" searchable="Search here.." name="beneficiary_bank_name" disabled>
                                                <option value="" disabled selected>Bank Name</option>
                                                <option value="1">Common Wealth Bank</option>
                                                <option value="2">National Australian Bank (NAB)</option>
                                                <option value="3">Westpac Bank</option>
                                                <option value="4">Bank of Queensland</option>
                                                <option value="4">Macquarie Bank</option>
                                                <option value="5">Bendigo Bank</option>
                                                <option value="6" selected>Bank of Australia</option>
                                            </select>        
                                        </div>

                                        <div class="col-md-1">                                        
                                        </div>

                                        <div class="col-md-2">
                                            <label for="account_number"> Transaction Detail </label>
                                        </div>

                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="transaction_detail">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row p-t-20 p-b-20">
                                        <div class="col-md-9"></div>

                                        <div class="col-md-2">
                                            <input type="submit" value="Transfer" class="btn btn-success btn-lg btn-block">
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <footer class="pt-5 d-flex justify-content-between">
                    <span>Copyright © 2019-2020 </span>
                    <ul class="nav m-0">
                        <li class="nav-item">
                          <a class="nav-link text-secondary" aria-current="page" href="#">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-secondary" href="#">Terms and conditions</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-secondary" href="#">Contact</a>
                        </li>
                      </ul>
                </footer>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    

<script>
  $(document).ready(function() {
  $('#payment_form').submit(function(e) {
    e.preventDefault();
    console.log($(this).serialize());
    $.ajax({
      type: "POST",
      url: 'http://127.0.0.1/ibanking/controller/payment.php',
      data: $(this).serialize(),
      success: function(response)
      {       
          if (response == true) {
            alert("transaction successsful");
            window.location = 'http://127.0.0.1/ibanking/payment.php';
          }
          else {
            alert(response);
          }
      }
  });
});
});
  
</script>


</body>
</html>