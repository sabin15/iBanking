<?php
include ('db_connect.php');
$server_name = "18.206.243.25";
$user_name = "ibanking";
$password = "Delta@1234";
$database_name = "ibanking";
// Create connection
$conn = new mysqli($server_name, $user_name, $password,$database_name);


//Account Balance
function get_account_balance($accountNumber){


    $query = "SELECT * FROM account WHERE number=$accountNumber LIMIT 1";
    global $conn;
    $result = mysqli_query($conn,$query);
    if($result){
        $account = mysqli_fetch_assoc($result);
        if ($account) { // if account exists
            return $account['balance'];
        }
    }

    return 0;
}

//Credit Balance
function get_credit_balance()
{

}


//Interest
function get_interest($accountNumber)
{
    $query = "SELECT * FROM account WHERE number=$accountNumber LIMIT 1";
    global $conn;
    $result = mysqli_query($conn,$query);
    if($result){
        $account = mysqli_fetch_assoc($result);
        if ($account) { // if account exists
            return $account['interest'];
        }
    }

    return 0;
}








