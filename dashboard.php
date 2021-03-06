<?php
include 'controller/get_account_details.php';
    if(!isset($_SESSION)) 
    { 
        session_start();
        if(!isset($_SESSION['username'])){
          header("Location:http://127.0.0.1/ibanking/login.php");
        }         
      
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Simple Admin Dashboard</title>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 90px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            z-index: 99;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 11.5rem;
                padding: 0;
            }
        }
            
        .navbar {
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
        }

        @media (min-width: 767.98px) {
            .navbar {
                top: 0;
                position: sticky;
                z-index: 999;
            }
        }

        .sidebar .nav-link {
            color: #333;
        }

        .sidebar .nav-link.active {
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">
                Bank Of Australia
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-12 col-md-4 col-lg-2">
            <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
        </div>
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                  Hello, <?php echo $_SESSION['username']; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><a class="dropdown-item" href="#">Messages</a></li>
                  <li><a class="dropdown-item" href="controller/logout.php">Sign out</a></li>
                </ul>
              </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="dashboard.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span class="ml-2">Dashboard</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="cards.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <span class="ml-2">Cards</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="payment.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                            <span class="ml-2">Payments</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="payment.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            <span class="ml-2">Reports</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                            <span class="ml-2">Contacts</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                            <span class="ml-2">Settings</span>
                          </a>
                        </li>
                      </ul>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Overview</li>
                    </ol>
                </nav>
                
                <div class="row my-4">
                    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Account</h5>
                            <div class="card-body">
                              <h5 class="card-title"><?php echo '$'. number_format(get_account_balance($_SESSION['account_number']))?></h5>
                              <!-- <p class="card-text">Feb 1 - Apr 1, United States</p> -->
                              <p class="card-text text-success">Total Balance</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Credit</h5>
                            <div class="card-body">
                              <h5 class="card-title">$10,235.67</h5>
                              <!-- <p class="card-text">Feb 1 - Apr 1, United States</p> -->
                              <p class="card-text text-success">Available Credit</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Interest</h5>
                            <div class="card-body">
                              <h5 class="card-title"><?php echo get_interest($_SESSION['account_number']). "%"?></h5>
                              <!-- <p class="card-text">Feb 1 - Apr 1, United States</p> -->
                              <p class="card-text text-success">Rate of Interest</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Min. Balance</h5>
                            <div class="card-body">
                              <h5 class="card-title">$200</h5>
                              <!-- <p class="card-text">Feb 1 - Apr 1, United States</p> -->
                              <p class="card-text text-danger">Min. Balance</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include('includes/transactions.php')?>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Transaction Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <!-- Transaction Detail ======================================================================================== -->
                        <div class="row p-t-5 p-b-5">
                          <div class="col-md-3">
                            <h6 class="payment_txt">Transaction Details</h6>
                          </div>
                          <div class="col-md-9">
                              <hr>
                              
                          </div>
                        </div>
                          <div class="row p-t-5 p-b-5">
                            <!-- Transaction ID -->

                            <div class="col-md-3">
                              <span class="trans_view_title">Transaction ID</span> <br>
                              <span id="trans_id"></span>
                            </div>


                            <div class="col-md-1">
                            </div>

                            <!-- Transaction Date -->
                            <div class="col-md-3">
                              <span class="trans_view_title">Transaction Date</span> <br>
                              <span id="trans_date"></span>
                            </div>
                          </div>

                          <div class="row p-t-5 p-b-5">
                            <!-- Currency -->

                            <div class="col-md-3">
                              <span class="trans_view_title">Currency</span> <br>
                              <span>AUD</span>
                            </div>


                            <div class="col-md-1">
                            </div>

                            <!-- Transaction Amount -->
                            <div class="col-md-3">
                              <span class="trans_view_title">Amount</span> <br>
                              <span id="trans_amount"></span>
                              <br><br>
                            </div>
                            
                          </div>
                          <!-- End Transaction Detail =====================================================================================-->



                          <!-- Sender Details =============================================================================================-->
                          <div class="row p-t-5 p-b-5">
                            <div class="col-md-3">
                                <h6 class="payment_txt">Sender Details</h6>
                            </div>
                            <div class="col-md-9">
                                <hr>
                                <br>
                            </div>
                          </div>

                          <div class="row p-t-5 p-b-5">
                            <!-- Bank Name -->

                            <div class="col-md-3">
                              <span class="trans_view_title">Bank Name</span> <br>
                              <span>Bank of Australia</span>
                            </div>


                            <div class="col-md-1">
                            </div>

                            <!-- Account Number -->
                            <div class="col-md-3">
                              <span class="trans_view_title">Account Number</span> <br>
                              <span id="sender_acc_number"></span>
                            </div>

                            <div class="col-md-1">
                            </div>

                            <!-- Account Name -->
                            <div class="col-md-3">
                              <span class="trans_view_title">Account Name</span> <br>
                              <span>Sabin Shrestha</span>
                              <br><br>
                            </div>
                          </div>     
                          <!-- End Sender Details =============================================================================================-->   

                          <!-- Receiver Details =============================================================================================-->
                          <div class="row p-t-5 p-b-5">
                            <div class="col-md-3">
                                <h6 class="payment_txt">Receiver Details</h6>
                            </div>
                            <div class="col-md-9">
                                <hr>
                                <br>
                            </div>
                          </div>

                          <div class="row p-t-5 p-b-5">
                            <!-- Bank Name -->

                            <div class="col-md-3">
                              <span class="trans_view_title">Bank Name</span> <br>
                              <span>Bank of Australia</span>
                            </div>


                            <div class="col-md-1">
                            </div>

                            <!-- Account Number -->
                            <div class="col-md-3">
                              <span class="trans_view_title">Account Number</span> <br>
                              <span id="receiver_acc_number"></span>
                            </div>

                            <div class="col-md-1">
                            </div>

                            <!-- Account Name -->
                            <div class="col-md-3">
                              <span class="trans_view_title">Account Name</span> <br>
                              <span>Prashant Pokhrel</span>
                            </div>
                          </div>     
                          <!-- End Receiver Details =============================================================================================-->         
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      
                      </div>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-12 col-xl-12">
                          <div class="card">
                              <h5 class="card-header">Transaction this year</h5>
                              <div class="card-body">
                                  <div id="traffic-chart"></div>
                              </div>
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
        new Chartist.Line('#traffic-chart', {
            labels: ['January', 'February', 'March', 'April', 'May', 'June','July','August','Sep','Oct','Nov','Dec'],
            series: [
                [23000, 25000, 19000, 34000, 56000, 64000,95000,65000,34000,55000,88000,78900,55789]
            ]
            }, {
            low: 0,
            showArea: true
        });
    </script>
</body>
</html>