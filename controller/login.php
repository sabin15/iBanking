<?php
    include ('db_connect.php');
    if($_POST){      
      $email=mysqli_escape_string($conn,$_POST['email']);
      $password=mysqli_escape_string($conn,$_POST['pass']);
      $user_check_query = "SELECT * FROM login WHERE email='$email'  LIMIT 1";
      

      $result = mysqli_query($conn, $user_check_query);
      $user = mysqli_fetch_assoc($result);

      if ($user) { // if user exists
          if ($user['email'] === $email) {
              echo true;                    
          } else {
                  echo false;
            }
      }
      else
          echo 'User Doesnot exists';
    };