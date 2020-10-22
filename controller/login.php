<?php
    include ('db_connect.php');
    if($_POST){
		
      
      $email=mysqli_escape_string($conn,$_POST['email']);
      $password=mysqli_escape_string($conn,$_POST['password']);
      $type=mysqli_escape_string($conn,$_POST['type']);
      $user_check_query='';
      
      if($type=='student'){
        $user_check_query = "SELECT * FROM student WHERE email='$email'  LIMIT 1";
      }
      else
      {
        //$user_check_query = "SELECT * FROM staff WHERE email='$email'  LIMIT 1";
        $user_check_query = "SELECT * FROM staff S JOIN appoint_staff A WHERE S.id=A.staff_id AND S.email='$email'  LIMIT 1";
        

      } 

      $result = mysqli_query($conn, $user_check_query);
      $user = mysqli_fetch_assoc($result);

      if ($user) { // if user exists
          if ($user['email'] === $email) {
              $auth=password_verify($password, $user['password']);
              if ($auth) {
                  session_start();
                  $_SESSION['username'] = $user['name'];
                  $_SESSION['logged'] = true;
                  
                  if ($type=='student'){
                    $_SESSION['user_id']=$user['student_id'];
                    $_SESSION['type']=$type;
                  }
                  else{
                    $_SESSION['type']=$user['position'];
                    $_SESSION['user_id']=$user['staff_id'];
                  }
                  echo true;
                  //header("Location:/udw/index.php");
                    
              } else {
                  echo false;
              }
          }
      }
      else
          echo 'User Doesnot exists';
  
}
