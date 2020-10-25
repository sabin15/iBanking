<?php
    include 'db_connect.php';
    include 'functions.php';
    

    $errors=array();

	if($_POST){
        $name=mysqli_escape_string($conn, $_POST['name']);
        $email=mysqli_escape_string($conn,$_POST['email']);
        $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
		$address=mysqli_escape_string($conn,$_POST['address']);
        $phone=mysqli_escape_string($conn,$_POST['phone']);
        $dob = mysqli_escape_string($conn,$_POST['customer-dob']);
        $dob_formatted = dateFormatter($dob);

        

        $email_check_query = "SELECT * FROM customer WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $email_check_query);
        $user = mysqli_fetch_assoc($result);
                
        if ($user) { // if email exists
            array_push($errors, "Email already exists");
            echo "Email already exists";
        }
                    
                
        if (count($errors) == 0) {
            $sql2="INSERT INTO account(type, balance) VALUES('savings',0)";
            $result2=mysqli_query($conn,$sql2);
            if($result2){
                $account_number = mysqli_insert_id($conn);
                $sql="INSERT INTO customer(name, email, password, phone, address, dob,account) VALUES('$name', '$email', '$password' ,'$phone', '$address', '$dob_formatted','$account_number')";

                $result=mysqli_query($conn,$sql);

                if($result){
                    echo true;
                    //echo "Added new user successfully";
                    //header('location: /udw/login.php');
                }
            }

            else{
                array_push($errors, "Server Error.");
                echo $errors[0].$conn -> error;
            }
        }         
		
	}
	

?>