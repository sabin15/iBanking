<?php
    include 'db_connect.php';
    include 'functions.php';

    
	$sender_acc_number=100006;
        $receiver_acc_number=8888888;
        
        $description='testing testing';
        $amount=2;
       

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        
        //Turning off autocommit
        mysqli_autocommit($conn, FALSE);
        
        
        //Checking Balance
        $balance_check_query = "SELECT * FROM account WHERE number='$sender_acc_number'";
        $result = mysqli_query($conn, $balance_check_query);
        $customer = mysqli_fetch_assoc($result);
        $current_balance = 0;
        if($customer){
            echo $customer['balance'];
            $current_balance = $customer['balance'];

        }else{
            echo "Invalid Account Number: ";
        }

        //Checking if the balace is sufficient to initiate the transaction
        if($current_balance >= $amount){
            // Proceding Transaction by debiting the acccount and then updating the transaction table
            //Debiting the customer account balance
            $updated_balance = $current_balance - $amount;
            echo "\n New balance: ".$updated_balance;
            
            
            
            $debit_query = "UPDATE account SET balance='$updated_balance' WHERE number='$sender_acc_number'";
            $trans_update_query="INSERT INTO transaction(sender_acc_number, receiver_acc_number, amount, description,timestamp) VALUES('$sender_acc_number', '$receiver_acc_number', '$amount', '$description','curdate()')";
            try{
                $result = mysqli_query($conn,$debit_query);
                $result = mysqli_query($conn,$trans_update_query);
                echo "Query Success";
                //Now committing the transaction
                if(!mysqli_commit($conn)){
                    echo "Commit  failed.Rolling Back...";
                    mysqli_rollback($conn);
                    
                }else{  
                    echo "--- Transaction Successful ---";         

                }

            }catch(mysqli_sql_exception $e){
                
                echo "Error".$e;
            }
            

            


        }else{
            echo "Insufficient Balance";
        }
        mysqli_close($conn);
	

?>