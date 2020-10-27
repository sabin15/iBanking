<?php
    include 'db_connect.php';
    include 'functions.php';

    
	if($_POST){
        $sender_acc_number=mysqli_escape_string($conn, $_POST['sender_account_number']);
        $receiver_acc_number=mysqli_escape_string($conn,$_POST['beneficiary_acount_number']);
        
        $description=mysqli_escape_string($conn,$_POST['transaction_detail']);
        $amount=mysqli_escape_string($conn,$_POST['transaction_amount']);
        $timestamp = date("Y-m-d H:i:s");

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        
        //Turning off autocommit
        mysqli_autocommit($conn, FALSE);
        
        
        //Checking Balance of Sender
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
            
            //Receiver Account Validation --> Checking if receiver account is valid or not
            $receiver_acc_check_query = "SELECT * FROM account WHERE number='$receiver_acc_number'  LIMIT 1";
            $result = mysqli_query($conn, $receiver_acc_check_query);
            $receiver = mysqli_fetch_assoc($result);

            if ($receiver) { // if Receiver Account exists
                
                //Debiting the customer account balance
                $updated_debit_balance = $current_balance - $amount;
                echo "\n New balance: ".$updated_balance;           
                $debit_query = "UPDATE account SET balance='$updated_debit_balance' WHERE number='$sender_acc_number'";
                $trans_update_query="INSERT INTO transaction(sender_acc_number, receiver_acc_number, amount, description,timestamp) VALUES('$sender_acc_number', '$receiver_acc_number', '$amount', '$description','$timestamp')";
                $credit_query = "UPDATE account SET balance=balance+'$amount' WHERE number='$receiver_acc_number'";
                try{
                    $debit_result = mysqli_query($conn,$debit_query);
                    $credit_result = mysqli_query($conn,$trans_update_query);
                    $trans_result = mysqli_query($conn,$credit_query);
                    
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
                    
            }else
                echo 'Receiver Account Does Not Exists.';
            
        }else{
            echo "Insufficient Balance";
        }
        mysqli_close($conn);
       

        
    }else{
        echo "No Post data";
    }
	

?>