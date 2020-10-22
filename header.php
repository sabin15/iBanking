<!DOCTYPE html>
<html>
<head>
  <title>iBanking</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
  <link rel="stylesheet" type="text/css" href="style/style.css"> 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<body>
    <div class= "container-fluid">
        <header>
            <div class="logo">
            </div>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                <div class = "navbar-header">
                    <a class="navbar-brand">University of Do Well</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <!-- <li class="active"><a href="login.php">Login</a></li> -->
                    <!-- <li><a href="register.php">Register</a></li> -->
                    <li><a href="unit-details.php">Unit Details</a></li>
                    
                    
                    
                    <?php
                        if(isset($_SESSION['logged']) && $_SESSION['logged'] && $_SESSION['type']=='dc'){
                            echo '<li class="dropdown">';
                            echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">Master Lists';
                            echo '<span class="caret"></span></a>';
                            echo '<ul class="dropdown-menu">';
                            echo '<li><a href="masterunits.php">Units</a></li>';
                            echo '<li><a href="masterlist.php">Academic Staffs</a></li>';                      
                            echo '</ul>';
                            echo '</li>';
                            echo '<li><a href="manage-timetable.php">Manage Timetable</a></li>';
                            echo '<li><a href="enrolled_students.php">Students</a></li>';
                            echo '<li><a href="edit_staff.php">Staff</a></li>';  
                        }
                     ?>
                    <?php
                        if(isset($_SESSION['logged']) && $_SESSION['logged'] && $_SESSION['type']=='uc'){
                            echo '<li class="dropdown">';
                            echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">Management';
                            echo '<span class="caret"></span></a>';
                            echo '<ul class="dropdown-menu">';
                            echo '<li><a href="uc_management.php">Student/Tutors</a></li>';
                            echo '<li><a href="masterlist-uc.php">Manage Staff</a></li>';
                            echo '</ul>';
                            echo '</li>';
                            echo '<li><a href="manage-timetable.php">Manage Timetable</a></li>';
                            echo '<li><a href="enrolled_students.php">Students</a></li>';
                            echo '<li><a href="edit_staff.php">Staff</a></li>';                           
                            
                        }
                     ?>

                    <?php
                        if(isset($_SESSION['logged']) && $_SESSION['logged'] && ($_SESSION['type']=='lecturer' || $_SESSION['type']=='tutor')){
                            echo '<li class="dropdown">';
                            echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">Management';
                            echo '<span class="caret"></span></a>';
                            echo '<ul class="dropdown-menu">';                    
                            echo '</ul>';
                            echo '</li>';
                            echo '<li><a href="edit_staff.php">Staff</a></li>';
                            echo '<li><a href="enrolled_students.php">Students</a></li>';  
                            
                        }
                     ?>

                    
                      <?php
                        if(isset($_SESSION['logged']) && $_SESSION['logged'] && $_SESSION['type']=='student'){
                            echo '<li><a href="enrollment.php">Enrollment</a></li>';
                            echo '<li><a href="timetable.php">Timetable</a></li>';
                            
                            
                        }
                     ?>




                    <!-- <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">MasterList
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="masterlist.php">Academic Staffs</a></li>
                        <li><a href="masterunits.php">Master Units</a></li>
                        <li><a href="masterlist-uc.php">Manage Staff</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Management
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="lecturer.php">Lecturer</a></li>
                        <li><a href="uc_management.php">UC</a></li>                        
                        </ul>
                    </li>
                    <li><a href="manage-timetable.php">Manage Timetable</a></li> -->
                    
                </ul>         
                <ul class="nav navbar-nav navbar-right">
                    
                   
                        <?php 
                            if(isset($_SESSION['logged']) && $_SESSION['logged'])
                            { 
                                echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> '.$_SESSION["username"].' ['.$_SESSION["type"].$_SESSION["user_id"].']';
                                echo '<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                <li><a href="controller/logout.php">Logout</a></li>                        
                                </ul></li>';                                

                            }
                            else
                            {
                                echo '<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>';
                                echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in">Login</span>';
                            }
                        ?></a>
                    </li>
                </ul>
                
            </div>
            </nav>
                
        </header>
